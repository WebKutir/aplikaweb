<?php

class Mailer extends Controller {
	
	function __construct()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'hendar.online@googlemail.com',
			'smtp_pass' => '30402149abc',
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		
		$this->email->from('jakasembung@gmail.com', 'jakasembungbung');
		$this->email->to('hendar.online@gmail.com');
		
		$this->email->subject('Pendaftaran Newsletter');
		$this->email->message('
		nama = agung
		alamat = email.yahoo.comp
		terima kasih	
		');

		$this->email->send();

		echo $this->email->print_debugger();
		
		
	}
	
}
/* End of file welcome.php */
/* Location: ./system/application/controllers/milis.php */