<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['content'] = $this->load->view('web/home', array(), TRUE);
		$this->load->view('web/base', $data);
	}

	public function mapping_global()
	{
		$data['data'] = $this->peta_klaster->read(array('jenis' => 'global'))->result();
		$data['content'] = $this->load->view('web/mapping', $data, TRUE);
		$this->load->view('web/base', $data);
	}

	public function mapping_motor()
	{
		$data['data'] = $this->peta_klaster->read(array('jenis' => 'pencurian-motor'))->result();
		$data['content'] = $this->load->view('web/mapping', $data, TRUE);
		$this->load->view('web/base', $data);
	}

	public function mapping_ringan()
	{
		$data['data'] = $this->peta_klaster->read(array('jenis' => 'pencurian-ringan'))->result();
		$data['content'] = $this->load->view('web/mapping', $data, TRUE);
		$this->load->view('web/base', $data);
	}
}
