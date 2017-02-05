<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Currency extends CI_Controller{
	
	private $link;
	private $date;
	private $source;

	public function __construct()
	{
		parent::__construct();
		$this->link = "http://www.cbar.az/currencies/";
		$this->date = date('d.m.Y');
		$this->source = $this->link.$this->date.".xml";
		$this->load->model("CurrencyModel");

	}

	public function get()
	{
		 $xml = simplexml_load_file($this->source);

		 $data = $xml->xpath('ValType[@Type="Xarici valyutalar"]');

		 foreach ($data[0]->Valute as $currency) {
		 	echo "1 ".$currency[0]['Code']." ".$currency->Value."<br/>";
		 	if($this->CurrencyModel->check($currency[0]['Code']))
		 	{
		 		$update_data = array(
		 			'name' => $currency->Name,
		 			'code' => $currency[0]['Code'],
		 			'value' => $currency->Value,
		 			'date_modified' => date('Y-m-d H:i:s')
		 		);


		 		$this->CurrencyModel->update($update_data);
		 	}
		 	else
		 	{
		 		$insert_data = array(
		 			'name' => $currency->Name,
		 			'code' => $currency[0]['Code'],
		 			'value' => $currency->Value,
		 			'status'=> 0,
		 			'sort'	=> 1,
		 			'date_modified' => date('Y-m-d H:i:s')
		 		);
		 		$this->CurrencyModel->insert($insert_data);
		 	}
		 }

	}

}

?>
