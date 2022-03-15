<?php
/**
 * @package Codeigniter
 * @subpackage Peta_klaster
 * @category Model
 * @author Agung Dirgantara <agungmasda29@gmail.com>
 */

namespace Angeli;

class Peta_klaster extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->set_table('peta_klaster');
	}
}

/* End of file Peta_klaster.php */
/* Location : ./application/models/Peta_klaster.php */
