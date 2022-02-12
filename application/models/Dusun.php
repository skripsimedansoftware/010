<?php
/**
 * @package Codeigniter
 * @subpackage Dusun
 * @category Model
 * @author Agung Dirgantara <agungmasda29@gmail.com>
 */

namespace Angeli;

class Dusun extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->set_table('dusun');
	}
}

/* End of file Dusun.php */
/* Location : ./application/models/Dusun.php */