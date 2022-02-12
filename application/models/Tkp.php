<?php
/**
 * @package Codeigniter
 * @subpackage Tkp
 * @category Model
 * @author Agung Dirgantara <agungmasda29@gmail.com>
 */

namespace Angeli;

class Tkp extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->set_table('tkp');
	}
}

/* End of file Tkp.php */
/* Location : ./application/models/Tkp.php */