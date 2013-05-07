<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('status_publish'))
{
	//fungsi untuk menentukan status publish 
    function status_publish($status_id)
    {
		if($status_id == 1){
			$status = "Publish";
		}else{
				$status = "Un Publish";
			 }
        return $status;
    }

}

if ( ! function_exists('thumb_image'))
{
	function thumb_image($folder,$file,$width,$height)
	{
		
		$base = base_url();
		$paths = "<img src='".$base."myupload/".$folder."/".$file."' width='".$width."' height='".$height."' >";
		
		return $paths;
	}
}

if ( ! function_exists('thumb_image1'))
{
	function thumb_image1($file,$width,$height)
	{
		
		$base = base_url();
		$paths = "<img src='".$base."myupload/thumbs/".$file."' width='".$width."' height='".$height."' >";
		return $paths;
	}
}

if ( ! function_exists('status'))
{
	//fungsi untuk menentukan status generic
    function status($var_id,$default,$value1,$value2)
    {
		if($var_id == $default){
			$callback = $value1;
		}else{
				$callback = $value2;
			 }
        return $callback;
    }

}

if ( ! function_exists('usericon'))
{
	//fungsi untuk menentukan status generic
    function usericon($var_id)
    {
		if($var_id == '1'){
			$path = "<img title='Premium' src='".base_url().'assets/images/user_suit.png'."'>";
		}else{
				$path = "<img title='public' src='".base_url().'assets/images/user_red.png'."'>";
			 }
        return $path;
    }

}

if ( ! function_exists('publish_icon'))
{
	//fungsi untuk menentukan status generic
    function publish_icon($var_id)
    {
		if($var_id == '1'){
			$path = "<img title='Publish' src='".base_url().'assets/images/lightbulb.png'."'>";
		}else{
				$path = "<img title='Un publish' src='".base_url().'assets/images/lightbulb_off.png'."'>";
			 }
        return $path;
    }

}


if (! function_exists('zebra')){

	//fungsi untuk menentukan table row class 
	function zebra($no){
		if($no % 2 == 1){
			$tr_class = "<tr>";
			
		} else {
			$tr_class = "<tr class='alt'>";
		}
		
		return $tr_class;
	}
	
}

if (! function_exists('getFileExtension')){

	//fungsi untuk mendapatkan extensi dari file
	function getFileExtension($filename){
  		return substr($filename, strrpos($filename, '.'));
	}

}

if (! function_exists('tanggal')){
	function tanggal($date){
		$date = date('d M Y', strtotime($date));
		return $date;
	}
}

if(! function_exists('prettyUrl')){
	function prettyUrl($id,$title,$date){
		$dateYear = explode("-", $date); 	
		$str = strtolower($title);
		$url = base_url().'articles/'.$dateYear[0]."/".$id."-".url_title($str)."";
		return $url;
	}			
}

if(! function_exists('word_cencor')){
	function word_cencor($teks){
		/* get instace singleton of ci model */
		$CI =& get_instance();
		$CI->load->model('word_filter_m');
		
		$bad_word = $CI->word_filter_m->get_all();
		
		foreach($bad_word as $row){
			$teks = str_ireplace($row['word'], $row['replace'], $teks);
		}		
		return $teks;
	}
	
}


?>