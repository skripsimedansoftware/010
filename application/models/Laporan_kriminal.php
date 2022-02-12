<?php
/**
 * @package Codeigniter
 * @subpackage Laporan_kriminal
 * @category Model
 * @author Agung Dirgantara <agungmasda29@gmail.com>
 */

namespace Angeli;

class Laporan_kriminal extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->set_table('laporan-kriminal');
	}
}

/* End of file Laporan_kriminal.php */
/* Location : ./application/models/Laporan_kriminal.php */