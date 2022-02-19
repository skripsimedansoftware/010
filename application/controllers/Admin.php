<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('template', ['module' => strtolower($this->router->fetch_class())]);
		$this->load->library('kmeans');
		if (empty($this->session->userdata($this->router->fetch_class())))
		{
			if (!in_array($this->router->fetch_method(), ['login', 'register', 'email_confirm', 'forgot_password', 'reset_password']))
			{
				redirect(base_url($this->router->fetch_class().'/login'), 'refresh');
			}
		}
	}

	public function index()
	{
		$this->template->load('home');
	}

	public function login()
	{
		if ($this->input->method() == 'post')
		{
			$this->form_validation->set_rules('identity', 'Email / Nama Pengguna', 'trim|required');
			$this->form_validation->set_rules('password', 'Kata Sandi', 'trim|required');
			if ($this->form_validation->run() == TRUE)
			{
				$user = $this->user->sign_in($this->input->post('identity'), $this->input->post('password'));
				if ($user->num_rows() >= 1)
				{
					$this->session->set_userdata(strtolower($this->router->fetch_class()), $user->row()->id);
					redirect(base_url($this->router->fetch_class()), 'refresh');
				}
				else
				{
					if ($this->user->search($this->input->post('identity'))->num_rows() >= 1)
					{
						$this->session->set_flashdata('login', array('status' => 'failed', 'message' => 'Kata sandi tidak sesuai'));
						redirect(base_url($this->router->fetch_class().'/'.$this->router->fetch_method()), 'refresh');
					}
					else
					{
						$this->session->set_flashdata('login', array('status' => 'failed', 'message' => 'Akun tidak ditemukan'));
						redirect(base_url($this->router->fetch_class().'/'.$this->router->fetch_method()), 'refresh');
					}
				}
			}
			else
			{
				$this->load->view('admin/login');
			}
		}
		else
		{
			$this->load->view('admin/login');
		}
	}

	public function profile($id = NULL, $option = NULL)
	{
		$data['profile'] = $this->user->read(array('id' => (!empty($id))?$id:$this->session->userdata(strtolower($this->router->fetch_class()))))->row();
		switch ($option)
		{
			case 'edit':
				if ($this->input->method() == 'post')
				{
					if ($id !== $this->session->userdata($this->router->fetch_class()) OR $id > $this->session->userdata($this->router->fetch_class()))
					{
						$this->session->set_flashdata('edit_profile', array('status' => 'failed', 'message' => 'Anda tidak memiliki akses untuk mengubah profil orang lain!'));
						redirect(base_url($this->router->fetch_class().'/profile/'.$id) ,'refresh');
					}

					$this->form_validation->set_data($this->input->post());
					$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_is_owned_data[user.email.'.strtolower($this->session->userdata($this->router->fetch_class()).']'));
					$this->form_validation->set_rules('username', 'Nama Pengguna', 'trim|required|callback_is_owned_data[user.username.'.strtolower($this->session->userdata($this->router->fetch_class()).']'));
					$this->form_validation->set_rules('full_name', 'Nama Lengkap', 'trim|required');

					if ($this->form_validation->run() == TRUE)
					{
						$update_data = array(
							'email' => $this->input->post('email'),
							'username' => $this->input->post('username'),
							'full_name' => $this->input->post('full_name')
						);

						if (!empty($this->input->post('password')))
						{
							$update_data['password'] = sha1($this->input->post('password'));
						}

						if (!empty($_FILES['photo']))
						{
							$config['upload_path'] = './uploads/';
							$config['allowed_types'] = 'png|jpg|jpeg';
							$config['file_name'] = url_title('user-profile-'.$id);
							$this->load->library('upload', $config);

							if (!$this->upload->do_upload('photo'))
							{
								$this->session->set_flashdata('upload_photo_error', $this->upload->display_errors());
							}
							else
							{
								// resize
								$config['image_library']	= 'gd2';
								$config['source_image']		= $this->upload->data()['full_path'];
								$config['maintain_ratio']	= TRUE;
								$config['width']			= 160;
								$config['height']			= 160;
								// watermark
								$config['wm_text'] 			= strtolower($this->router->fetch_class());
								$config['wm_type'] 			= 'text';
								$config['wm_font_color'] 	= 'ffffff';
								$config['wm_font_size'] 	= 12;
								$config['wm_vrt_alignment'] = 'middle';
								$config['wm_hor_alignment'] = 'center';
								$this->load->library('image_lib', $config);

								if ($this->image_lib->resize())
								{
									$this->image_lib->watermark();
								}

								$update_data['photo'] = $this->upload->data()['file_name'];
							}
						}

						$this->user->update($update_data, array('id' => $id));
						$this->session->set_flashdata('edit_profile', array('status' => 'success', 'message' => 'Profil berhasil diperbaharui!'));
						redirect(base_url($this->router->fetch_class().'/profile/'.$id) ,'refresh');
					}
					else
					{
						$this->template->load('profile_edit', $data);
					}
				}
				else
				{
					$this->template->load('profile_edit', $data);
				}
			break;

			default:
				$this->template->load('profile', $data);
			break;
		}
	}

	public function desa($option = 'view', $id = NULL)
	{
		switch ($option)
		{
			case 'add':
				if ($this->input->method() == 'post')
				{
					$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
					if ($this->form_validation->run() == TRUE)
					{
						$data = array(
							'nama' => $this->input->post('nama')
						);
						$this->desa->create($data);
						$this->session->set_flashdata('update', 'Data desa berhasil ditambahkan');
						redirect(base_url($this->router->fetch_class().'/desa'), 'refresh');
					}
					else
					{
						$this->template->load('desa/add');
					}
				}
				else
				{
					$this->template->load('desa/add');
				}
			break;

			case 'edit':
				if (!empty($id))
				{
					$detail = $this->desa->read(array('id' => $id));

					if (!empty($detail))
					{
						if ($this->input->method() == 'post')
						{
							$data = array(
								'nama' => $this->input->post('nama')
							);
							$this->desa->update($data, array('id' => $id));
							$this->session->set_flashdata('update', 'Data desa telah diperbaharui');
							redirect(base_url($this->router->fetch_class().'/desa'), 'refresh');
						}
						else
						{
							$data['data'] = $detail->row_array();
							$this->template->load('desa/edit', $data);
						}
					}
					else
					{
						$this->show_error(404, 'Data Tidak Ditemukan');
					}
				}
				else
				{
					$this->show_error(404, 'Data Tidak Ditemukan', 'Data desa tidak ditemukan');
				}
			break;

			case 'delete':
				if (!empty($id))
				{
					$this->desa->delete(array('id' => $id));
					$this->session->set_flashdata('update', 'Data desa berhasil dihapus');
					redirect(base_url($this->router->fetch_class().'/desa'), 'refresh');
				}
				else
				{
					$this->session->set_flashdata('update', 'Data desa tidak ditemukan');
					redirect(base_url($this->router->fetch_class().'/desa'), 'refresh');
				}
			break;

			default:
				$data['data'] = $this->desa->read();
				$this->template->load('desa/home', $data);
			break;
		}
	}

	public function dusun($option = 'view', $id = NULL)
	{
		switch ($option)
		{
			case 'add':
				if ($this->input->method() == 'post')
				{
					$this->form_validation->set_rules('desa', 'Desa', 'trim|required');
					$this->form_validation->set_rules('nama', 'Nama', 'trim|required');

					if ($this->form_validation->run() == TRUE)
					{
						$data = array(
							'desa' => $this->input->post('desa'),
							'nama' => $this->input->post('nama'),
						);
						$this->dusun->create($data);
						$this->session->set_flashdata('update', 'Data dusun berhasil ditambahkan');
						redirect(base_url($this->router->fetch_class().'/dusun'), 'refresh');
					}
					else
					{
						$this->template->load('dusun/add');
					}
				}
				else
				{
					$this->template->load('dusun/add');
				}
			break;

			case 'edit':
				if (!empty($id))
				{
					$detail = $this->dusun->read(array('id' => $id));

					if (!empty($detail))
					{
						if ($this->input->method() == 'post')
						{
							$data = array(
								'desa' => $this->input->post('desa'),
								'nama' => $this->input->post('nama')
							);
							$this->dusun->update($data, array('id' => $id));
							$this->session->set_flashdata('update', 'Data dusun telah diperbaharui');
							redirect(base_url($this->router->fetch_class().'/dusun'), 'refresh');
						}
						else
						{
							$data['data'] = $detail->row_array();
							$this->template->load('dusun/edit', $data);
						}
					}
					else
					{
						$this->show_error(404, 'Data Tidak Ditemukan');
					}
				}
				else
				{
					$this->show_error(404, 'Data Tidak Ditemukan', 'Data dusun tidak ditemukan');
				}
			break;

			case 'delete':
				if (!empty($id))
				{
					$this->dusun->delete(array('id' => $id));
					$this->session->set_flashdata('update', 'Data dusun berhasil dihapus');
					redirect(base_url($this->router->fetch_class().'/dusun'), 'refresh');
				}
				else
				{
					$this->session->set_flashdata('update', 'Data dusun tidak ditemukan');
					redirect(base_url($this->router->fetch_class().'/dusun'), 'refresh');
				}
			break;

			default:
				$data['data'] = $this->dusun->read();
				$this->template->load('dusun/home', $data);
			break;
		}
	}

	public function tkp($option = 'view', $id = NULL)
	{
		switch ($option)
		{
			case 'add':
				if ($this->input->method() == 'post')
				{
					$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
					if ($this->form_validation->run() == TRUE)
					{
						$data = array(
							'jalan' => $this->input->post('jalan'),
							'nama' => $this->input->post('nama')
						);
						$this->tkp->create($data);
						$this->session->set_flashdata('update', 'Data tkp berhasil ditambahkan');
						redirect(base_url($this->router->fetch_class().'/tkp'), 'refresh');
					}
					else
					{
						$this->template->load('tkp/add');
					}
				}
				else
				{
					$this->template->load('tkp/add');
				}
			break;

			case 'edit':
				if (!empty($id))
				{
					$detail = $this->tkp->read(array('id' => $id));

					if (!empty($detail))
					{
						if ($this->input->method() == 'post')
						{
							$data = array(
								'jalan' => $this->input->post('jalan'),
								'nama' => $this->input->post('nama')
							);
							$this->tkp->update($data, array('id' => $id));
							$this->session->set_flashdata('update', 'Data tkp telah diperbaharui');
							redirect(base_url($this->router->fetch_class().'/tkp'), 'refresh');
						}
						else
						{
							$data['data'] = $detail;
							$this->template->load('tkp/edit', $data);
						}
					}
					else
					{
						$this->show_error(404, 'Data Tidak Ditemukan');
					}
				}
				else
				{
					$this->show_error(404, 'Data Tidak Ditemukan', 'Data tkp tidak ditemukan');
				}
			break;

			case 'delete':
				if (!empty($id))
				{
					$this->tkp->delete(array('id' => $id));
					$this->session->set_flashdata('update', 'Data tkp berhasil dihapus');
					redirect(base_url($this->router->fetch_class().'/tkp'), 'refresh');
				}
				else
				{
					$this->session->set_flashdata('update', 'Data tkp tidak ditemukan');
					redirect(base_url($this->router->fetch_class().'/tkp'), 'refresh');
				}
			break;

			default:
				$data['data'] = $this->tkp->read();
				$this->template->load('tkp/home', $data);
			break;
		}
	}

	public function jalan($option = 'view', $id = NULL)
	{
		switch ($option)
		{
			case 'add':
				if ($this->input->method() == 'post')
				{
					$this->form_validation->set_rules('dusun', 'Dusun', 'trim|required');
					$this->form_validation->set_rules('nama', 'Nama', 'trim|required');

					if ($this->form_validation->run() == TRUE)
					{
						$data = array(
							'dusun' => $this->input->post('dusun'),
							'nama' => $this->input->post('nama')
						);
						$this->jalan->create($data);
						$this->session->set_flashdata('update', 'Data jalan berhasil ditambahkan');
						redirect(base_url($this->router->fetch_class().'/jalan'), 'refresh');
					}
					else
					{
						$this->template->load('jalan/add');
					}
				}
				else
				{
					$this->template->load('jalan/add');
				}
			break;

			case 'edit':
				if (!empty($id))
				{
					$detail = $this->jalan->read(array('id' => $id));

					if (!empty($detail))
					{
						if ($this->input->method() == 'post')
						{
							$data = array();
							$this->jalan->update($data, array('id' => $id));
							$this->session->set_flashdata('update', 'Data jalan telah diperbaharui');
							redirect(base_url($this->router->fetch_class().'/jalan'), 'refresh');
						}
						else
						{
							$data['data'] = $detail;
							$this->template->load('jalan/edit', $data);
						}
					}
					else
					{
						$this->show_error(404, 'Data Tidak Ditemukan');
					}
				}
				else
				{
					$this->show_error(404, 'Data Tidak Ditemukan', 'Data jalan tidak ditemukan');
				}
			break;

			case 'delete':
				if (!empty($id))
				{
					$this->jalan->delete(array('id' => $id));
					$this->session->set_flashdata('update', 'Data jalan berhasil dihapus');
					redirect(base_url($this->router->fetch_class().'/jalan'), 'refresh');
				}
				else
				{
					$this->session->set_flashdata('update', 'Data jalan tidak ditemukan');
					redirect(base_url($this->router->fetch_class().'/jalan'), 'refresh');
				}
			break;

			default:
				$data['data'] = $this->jalan->read();
				$this->template->load('jalan/home', $data);
			break;
		}
	}

	public function laporan_kriminal($option = 'view', $id = NULL)
	{
		if (!empty($id))
		{
			$detail = $this->laporan_kriminal->read(array('id' => $id));
		}

		switch ($option)
		{
			case 'add':
				if ($this->input->method() == 'post')
				{
					$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'trim|required');
					$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
					$this->form_validation->set_rules('jenis', 'Jenis Laporan', 'trim|required');
					$this->form_validation->set_rules('desa', 'Nama Desa', 'trim|required');
					$this->form_validation->set_rules('dusun', 'Nama Dusun', 'trim|required');
					$this->form_validation->set_rules('jalan', 'Nama Jalan', 'trim|required');
					$this->form_validation->set_rules('tkp', 'Nama TKP', 'trim|required');
					$this->form_validation->set_rules('nominal_kerugian', 'Nominal Kerugian', 'trim|required');
					$this->form_validation->set_rules('aksi', 'Nominal Kerugian', 'trim|required');
					$this->form_validation->set_rules('detail', 'Detail Kejadian', 'trim|required');

					if ($this->form_validation->run() == TRUE)
					{
						$data = array(
							'nomor_surat' => $this->input->post('nomor_surat'),
							'tanggal' => $this->input->post('tanggal'),
							'jenis' => $this->input->post('jenis'),
							'desa' => $this->input->post('desa'),
							'dusun' => $this->input->post('dusun'),
							'jalan' => $this->input->post('jalan'),
							'tkp' => $this->input->post('tkp'),
							'kerugian_nominal' => $this->input->post('nominal_kerugian'),
							'aksi' => $this->input->post('aksi'),
							'deskripsi' => $this->input->post('detail'),
						);

						$data['tanggal'] = nice_date($data['tanggal'], 'Y-m-d');
						$data['kerugian_nominal'] = str_replace(',', '', $data['kerugian_nominal']);
						$this->laporan_kriminal->create($data);
						$this->session->set_flashdata('update', 'Data laporan kriminal telah ditambahkan');
						redirect(base_url($this->router->fetch_class().'/laporan_kriminal'), 'refresh');
					}
					else
					{
						$this->template->load('laporan_kriminal/add');
					}
				}
				else
				{
					$this->template->load('laporan_kriminal/add');
				}
			break;

			case 'edit':
				if (!empty($id))
				{
					if ($this->input->method() == 'post')
					{

					}
					else
					{
						$data['data'] = $detail->row_array();
						$this->template->load('laporan_kriminal/edit', $data);
					}
				}
				else
				{
					$this->show_error(404, 'Data Tidak Ditemukan', 'Data laporan kriminal tidak ditemukan');
				}
			break;

			case 'delete':
				if (!empty($id))
				{
					$this->laporan_kriminal->delete(array('id' => $id));
					$this->session->set_flashdata('update', 'Data laporan kriminal berhasil dihapus');
				}
				else
				{
					$this->session->set_flashdata('update', 'Data laporan kriminal tidak ditemukan');
				}

				redirect(base_url($this->router->fetch_class().'/laporan_kriminal'), 'refresh');
			break;

			default:
				$data['data'] = $this->laporan_kriminal->read();
				$this->template->load('laporan_kriminal/home', $data);
			break;
		}
	}

	public function json_data($name = NULL, $id = NULL)
	{
		if ($name == 'desa')
		{
			$this->output->set_content_type('application/json')->set_output(json_encode($this->desa->read()->result_array()));
		}
		elseif ($name == 'dusun')
		{
			$this->output->set_content_type('application/json')->set_output(json_encode($this->dusun->read(array('desa' => $id))->result_array()));
		}
		elseif ($name == 'jalan')
		{
			$this->output->set_content_type('application/json')->set_output(json_encode($this->jalan->read(array('dusun' => $id))->result_array()));
		}
		elseif ($name == 'tkp')
		{
			$this->output->set_content_type('application/json')->set_output(json_encode($this->tkp->read(array('jalan' => $id))->result_array()));
		}
		else
		{
			$this->output->set_content_type('application/json')->set_output(json_encode([]));
		}
	}

	public function kmeans_clustering($mode = NULL)
	{
		$laporan_kriminal = $this->laporan_kriminal->read()->result();

		switch ($mode) {
			case 'data_tabular':
				$data['data'] = $laporan_kriminal;
				$this->template->load('kmeans_clustering/table', $data);
			break;

			default:
				$data['data'] = $laporan_kriminal;
				$kmeans = $this->kmeans;
				$kmeans->setAttributes(array(
					'Jenis', 'Desa', 'Dusun', 'Jalan', 'TKP', 'Aksi', 'Nominal Kerugian'
				));

				foreach ($laporan_kriminal as $value)
				{
					switch ($value->aksi) {
						case 'pembunuhan':
							$aksi = 3;
						break;

						case 'pencopetan':
							$aksi = 2;
						break;

						case 'pencurian':
							$aksi = 1;
						break;

						default:
							$aksi = 0;
						break;
					}

					$kmeans->setDataFromArgs(
						($value->jenis == 'pencurian-motor')?1:2,
						$value->desa,
						$value->dusun,
						$value->jalan,
						$value->tkp,
						$aksi,
						$value->kerugian_nominal
					);
				}

				if (!empty($laporan_kriminal))
				{
					$cluster_count = (!empty($this->input->get('cluster_count'))?$this->input->get('cluster_count'):3);
					$centroid = (!empty($this->input->get('centroid'))?explode(',', $this->input->get('centroid')):[2, 3, 4]);

					$kmeans->setClusterCount($cluster_count); // Set amount of cluster
					$kmeans->setCentroid($centroid);
				}

				$data['kmeans'] = $kmeans;
				$this->template->load('kmeans_clustering/home', $data);
			break;
		}
	}

	public function show_error($code = 404, $title = NULL, $message = NULL)
	{
		$this->template->load('error');
	}

	public function import_data($file = NULL, $sheet = NULL)
	{
		$file = FCPATH.'import.xlsx';
		$import = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
		echo "<pre>";
		print_r ($import->getSheetNames());
		echo "</pre>";

		$import->setActiveSheetIndex(0);

		// echo "<pre>";
		// print_r ($import->getActiveSheet());
		// echo "</pre>";

		$import = $import->getActiveSheet()->toArray();

		array_shift($import);
		$import = array_map(function($value) {

			if (!empty($value[1]))
			{
				if (preg_match('/(bunuh)i/', $value[9]))
				{
					$aksi = 'pembunuhan';
				}
				elseif (preg_match('/(copet|jambret)i/', $value[9]))
				{
					$aksi = 'pencopetan';
				}
				elseif (preg_match('/(bunuh)i/', $value[9]))
				{
					$aksi = 'pencurian';
				}
				else
				{
					$aksi = NULL;
				}

				$nama_desa = ucwords(strtolower(trim($value[4])));
				$desa = $this->desa->read(array('nama' => $nama_desa));
				if ($desa->num_rows() >= 1)
				{
					$desa = $desa->row()->id;
				}
				else
				{
					$desa = $this->desa->create(array(
						'nama' => $nama_desa
					), TRUE);
				}

				$nama_dusun = ucwords(strtolower(trim($value[5])));
				$dusun = $this->dusun->read(array('nama' => $nama_dusun));
				if ($dusun->num_rows() >= 1)
				{
					$dusun = $dusun->row()->id;
				}
				else
				{
					$dusun = $this->dusun->create(array(
						'desa' => $desa,
						'nama' => $nama_dusun
					), TRUE);
				}

				$nama_jalan = ucwords(strtolower(trim($value[6])));
				$jalan = $this->jalan->read(array('nama' => $nama_jalan));
				if ($jalan->num_rows() >= 1)
				{
					$jalan = $jalan->row()->id;
				}
				else
				{
					$jalan = $this->jalan->create(array(
						'dusun' => $dusun,
						'nama' => $nama_jalan
					), TRUE);
				}

				$nama_tkp = ucwords(strtolower(trim($value[7])));
				$tkp = $this->tkp->read(array('nama' => $nama_tkp));
				if ($tkp->num_rows() >= 1)
				{
					$tkp = $tkp->row()->id;
				}
				else
				{
					$tkp = $this->tkp->create(array(
						'jalan' => $jalan,
						'nama' => $nama_tkp
					), TRUE);
				}


				return array(
					'nomor_surat' => $value[1],
					'tanggal' => nice_date($value[2], 'Y-m-d'),
					'jenis' => preg_match('/motor/i', $value[3])? 'pencurian-motor':'pencurian-ringan',
					'desa' => $desa,
					'dusun' => $dusun,
					'jalan' => $jalan,
					'tkp' => $tkp,
					'kerugian_nominal' => str_replace(['Rp', ','], '', $value[8]),
					'aksi' => $aksi,
					'deskripsi' => $value[10]
				);
			}
			else
			{
				return FALSE;
			}
		}, $import);

		$import = array_filter($import);

		foreach ($import as $data)
		{
			$this->laporan_kriminal->create($data);
		}

		echo "<pre>";
		print_r ($import);
		echo "</pre>";

	}

	public function export_data()
	{

	}

	public function is_owned_data($val, $str)
	{
		$str = explode('.', $str);
		$data = $this->db->get('user', array($str[1] => $val));
		if ($data->num_rows() >= 1)
		{
			if ($data->row()->id == $str[2])
			{
				return TRUE;
			}
			else
			{
				$this->form_validation->set_message('is_owned_data', lang('form_validation_is_unique'));
				return FALSE;
			}
		}
		else
		{
			return TRUE;
		}

		return FALSE;
	}

	public function logout()
	{
		session_destroy();
		redirect(base_url($this->router->fetch_class().'/login'), 'refresh');
	}

	public function register()
	{
		if ($this->input->method() == 'post')
		{
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]|max_length[40]', array('is_unique' => 'Email sudah terdaftar!'));
			$this->form_validation->set_rules('full_name', 'Nama Lengkap', 'trim|required|max_length[40]');
			$this->form_validation->set_rules('password', 'Kata Sandi', 'trim|required');

			if ($this->form_validation->run() == TRUE)
			{
				$this->user->create(array(
					'email' => $this->input->post('email'),
					'password' => sha1($this->input->post('password')),
					'full_name' => $this->input->post('full_name')
				));

				$this->session->set_flashdata('register', array('status' => 'success', 'message' => 'Pendaftaran berhasil!!'));
				redirect(base_url($this->router->fetch_class().'/login'), 'refresh');
			}
			else
			{
				$this->load->view('admin/register');
			}
		}
		else
		{
			$this->load->view('admin/register');
		}
	}

	public function forgot_password()
	{
		if ($this->input->method() == 'post')
		{
			$search = $this->user->search($this->input->post('identity'));

			if ($search->num_rows() >= 1)
			{
				$code = random_string('numeric', 6);
				$this->load->library('email');
				$this->email->set_alt_message('Reset password');
				$this->email->to($search->row()->email);
				$this->email->from($this->config->item('smtp_user'), 'Skripsi');
				$this->email->subject('Ganti Kata Sandi');
				$data['link'] = base_url($this->router->fetch_class().'/reset_password/'.$code);
				$data['code'] = $code;
				$data['full_name'] = $search->row()->full_name;
				$this->email->message($this->load->view('email/reset_password', $data, TRUE));
				if (!$this->email->send())
				{
					$this->session->set_flashdata('forgot_password', array('status' => 'failed', 'message' => 'Sistem tidak bisa mengirim email!'));
					redirect(base_url($this->router->fetch_class().'/forgot_password'), 'refresh');
				}
				else
				{
					$this->email_confirm->new_code($search->row()->id, $code, 'reset-password');
					$this->session->set_flashdata('forgot_password', array('status' => 'success', 'message' => 'Email permintaan atur ulang kata sandi sudah dikirim, silahkan verifikasi <a href="'.base_url($this->router->fetch_class().'/email_confirm').'">disini</a>'));
					redirect(base_url($this->router->fetch_class().'/forgot_password'), 'refresh');
				}
			}
			else
			{
				$this->session->set_flashdata('forgot_password', array('status' => 'failed', 'message' => 'Sistem tidak menemukan akun!'));
				redirect(base_url($this->router->fetch_class().'/forgot_password'), 'refresh');
			}
		}
		else
		{
			$this->load->view('admin/forgot_password');
		}
	}

	/**
	 * Confirm email
	 *
	 * @param      integer  $code   Confirmation code
	 */
	public function email_confirm($code = NULL)
	{
		$data = array();

		if (!empty($code))
		{
			$data = array('confirm_code' => $code);
		}

		if ($this->input->method() == 'post')
		{
			$data = $this->input->post();
			$this->form_validation->set_rules('confirm_code', 'Confirm Code', 'trim|required');
			if ($this->form_validation->run() == TRUE)
			{
				$email_confirm = $this->email_confirm->review_confirm_code($data['confirm_code']);
				if ($email_confirm->num_rows() >= 1)
				{
					$email_confirm = $email_confirm->row();

					if ($email_confirm->status == 'unconfirmed')
					{
						if (now() < human_to_unix($email_confirm->expire_date))
						{
							if ($email_confirm->type == 'account-activation')
							{
								$this->email_confirm->confirm($data['confirm_code']);
								redirect(base_url($this->router->fetch_class().'/login'), 'refresh');
							}
							elseif ($email_confirm->type == 'reset-password')
							{
								$this->session->set_userdata('reset-password', $email_confirm->user_uid);
								$this->email_confirm->confirm($data['confirm_code']);
								redirect(base_url($this->router->fetch_class().'/reset_password'), 'refresh');
							}
							else
							{
								redirect(base_url(), 'refresh');
							}
						}
						else
						{
							$this->session->set_flashdata('email_confirm', array('status' => 'warning', 'message' => 'Masa waktu kode sudah habis'));
							redirect(base_url($this->router->fetch_class().'/email_confirm'), 'refresh');
						}
					}
					else
					{
						$this->session->set_flashdata('email_confirm', array('status' => 'warning', 'message' => 'Kode sudah pernah digunakan'));
						redirect(base_url($this->router->fetch_class().'/email_confirm'), 'refresh');
					}
				}
				else
				{
					$this->session->set_flashdata('email_confirm', array('status' => 'error', 'message' => 'Kode tidak ditemukan'));
					redirect(base_url($this->router->fetch_class().'/email_confirm'), 'refresh');
				}
			}
			else
			{
				$this->load->view('admin/email_confirm');
			}
		}
		else
		{
			$this->load->view('admin/email_confirm');
		}
	}

	public function reset_password($code = NULL)
	{
		if ($this->input->method() == 'post')
		{
			if ($this->session->has_userdata('reset-password'))
			{
				$this->form_validation->set_rules('new_password', 'Kata Sandi', 'trim|required');
				$this->form_validation->set_rules('repeat_new_password', 'Ulangi Kata Sandi', 'trim|required|matches[new_password]');

				if ($this->form_validation->run() == TRUE)
				{
					if ($this->user->update(array('password' => sha1($this->input->post('new_password'))), array('id' => $this->session->userdata('reset-password'))))
					{
						$this->session->unset_userdata('reset-password');
					}

					redirect(base_url($this->router->fetch_class().'/login'), 'refresh');
				}
				else
				{
					$this->load->view('admin/reset_password');
				}
			}
		}
		else
		{
			if ($this->session->has_userdata('reset-password'))
			{
				$this->load->view('admin/reset_password');
			}
			else
			{
				show_404();
			}
		}
	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
