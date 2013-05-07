<?php
class Sitemaps extends Controller
{
    function __construct()
    {
        parent::Controller();
		
		/* Init load */
		$this->load->model('content_m');
		$this->load->helper(array('text','tools'));
        $this->load->plugin('google_sitemap'); //Load Plugin
		
    }

    function index()
    {
		$sitemap = new google_sitemap; //Create a new Sitemap Object
		
		$page = $this->content_m->get_front_multi_content(
			array(
				"is_view" => FALSE
				,"is_cache"=> FALSE
				,"limit"   => 10  
				,"id"      => 1 //news
				,"id2"     => 11 //coding 
				,"id3"     => 12 //design 
			)
		);
		

		foreach($page as $rowpage): 
		$item = new google_sitemap_item(base_url().prettyUrl($rowpage['id'],$rowpage['title'],$rowpage['date']),date("Y-m-d"), 'daily', '0.6' ); 
		$sitemap->add_item($item);
		endforeach;
		
        
        //$item = new google_sitemap_item(base_url()."compro/services/",date("Y-m-d"), 'weekly', '0.8' ); //Create a new Item
		// $sitemap->add_item($item); //Append the item to the sitemap object
        $sitemap->build("./sitemap.xml"); //Build it...
                
         //Let's compress it to gz
        $data = implode("", file("./sitemap.xml"));
        $gzdata = gzencode($data, 9);
        $fp = fopen("./sitemap.xml.gz", "w");
        fwrite($fp, $gzdata);
        fclose($fp);

        //Let's Ping google
        $this->_pingGoogleSitemaps(base_url()."/sitemap.xml.gz");
    }

    function _pingGoogleSitemaps( $url_xml )
    {
       $status = 0;
       $google = 'www.google.com';
       if( $fp=@fsockopen($google, 80) )
       {
          $req =  'GET /webmasters/sitemaps/ping?sitemap=' .
                  urlencode( $url_xml ) . " HTTP/1.1\r\n" .
                  "Host: $google\r\n" .
                  "User-Agent: Mozilla/5.0 (compatible; " .
                  PHP_OS . ") PHP/" . PHP_VERSION . "\r\n" .
                  "Connection: Close\r\n\r\n";
          fwrite( $fp, $req );
          while( !feof($fp) )
          {
             if( @preg_match('~^HTTP/\d\.\d (\d+)~i', fgets($fp, 128), $m) )
             {
                $status = intval( $m[1] );
                break;
             }
          }
          fclose( $fp );
       }
       return( $status );
    }

}  