<?php
/**
 * @package Codeigniter
 * @subpackage Jalan
 * @category Model
 * @author Agung Dirgantara <agungmasda29@gmail.com>
 */

namespace Angeli;

class Jalan extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->set_table('jalan');
	}
}

/* End of file Jalan.php */
/* Location : ./application/models/Jalan.php */