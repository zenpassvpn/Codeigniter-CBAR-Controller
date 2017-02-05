<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CurrencyModel extends CI_Model{
	
	public $table = 'currency_show';

	public function __construct()
	{
		parent::__construct();
		$this->table = $this->db->dbprefix($this->table);
	}

	public function insert($insert_data)
	{
		return $this->db->insert($this->table, $insert_data);
	}

	public function update($update_data)
	{
		$this->db->where('code', $update_data['code']);
		$this->db->update($this->table, $update_data);

		return true;
	}

	public function check($code)
	{
		$query = $this->db->get_where($this->table, array('code' => $code));
		if($query->num_rows == 1){
			return true;
		}
		else{
			return false;
		}
	}

}
