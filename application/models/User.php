<?php
/**
 * @package Codeigniter
 * @subpackage User
 * @category Model
 * @author Agung Dirgantara <agungmasda29@gmail.com>
 */

namespace Angeli;

class User extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function sign_in($identity, $password) {
		$this->db->where('username', $identity)->where('password', sha1($password));
		return $this->db->get('user');
	}

	public function detail($where) {
		return $this->db->get_where('user', $where);
	}

	public function update($where, $data) {
		return $this->db->update('user', $data, $where);
	}
}

/* End of file User.php */
/* Location : ./application/models/User.php */