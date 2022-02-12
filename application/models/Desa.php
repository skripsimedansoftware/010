<?php
/**
 * @package Codeigniter
 * @subpackage Desa
 * @category Model
 * @author Agung Dirgantara <agungmasda29@gmail.com>
 */

namespace Angeli;

class Desa extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->set_table('desa');
	}
}

/* End of file Desa.php */
/* Location : ./application/models/Desa.php */