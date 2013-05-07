<?php 
$config_themes = $this->config->item('themes');
$images = $config_themes['myupload_services']; 
?>

<style type="text/css">
    
    #content { width: 960px; margin: 40px auto; }
    
    
    /* SaaS Pricing Chart CSS: */
    
    .attr-col { margin: 110px 0 0; float: left; width: 200px; }
    .attr-col ul { background: #f4f4f4; font-weight: bold; font-size: 13px; border: 1px solid #d6d6d6; border-width: 1px 0px 1px 1px; -webkit-border-top-left-radius: 5px; -webkit-border-bottom-left-radius: 5px; -moz-border-radius-topleft: 5px; -moz-border-radius-bottomleft: 5px; border-top-left-radius: 5px; border-bottom-left-radius: 5px; }
    .attr-col ul li { text-align: right; padding: 0 10px; border-bottom: 1px solid #d6d6d6; line-height: 45px; display: block; }
    .attr-col ul li.last { border-bottom: none; }
    .pt-table { padding-left: 163px; display: block; position: relative; }
    .pt-body { padding: 10px 0 0; }
    .pt-rows li { display: block; overflow: hidden;background: #fff; border-left: 2px solid #ccc; border-right: 2px solid #ccc; border-bottom: 1px solid #d9d9d9;  }
    .pt-rows li span { width: 24%; text-align: center; float: left; border-right: 1px solid #d9d9d9; display: block; line-height: 45px; height: 45px; }
    .pt-rows li.title { background: #666; font-size: 22px; color: #fff; font-weight: bold; -webkit-border-top-left-radius: 5px; -moz-border-radius-topleft: 5px; border-top-left-radius: 5px; border-bottom: 2px solid #555; border-width: 0 0 2px; }
    .pt-rows li.title span { line-height: 50px; height: 50px; border: none; padding: 0 1px; text-shadow: 2px 2px #444; }
    .pt-rows li.fees { border-bottom: 1px solid #ccc; }
    .pt-rows li.fees span { line-height: 48px; height: 48px; background: #f7f7f7; font-size: 34px; font-weight: 700; font-family: Georgia, Arial, sans-serif; color: #4172a5; text-shadow: 2px 2px #fff; }
    .pt-rows li span.pt-yes { background: url('assets/themes/default/yes-no.gif') no-repeat center 12px; }
    .pt-rows li span.pt-no { background: url('assets/themes/default/yes-no.gif') no-repeat center -38px; }
    .pt-rows li.fin { border-bottom: 2px solid #d9d9d9; -webkit-border-bottom-right-radius: 5px; -webkit-border-bottom-left-radius: 5px; -moz-border-radius-bottomright: 5px; -moz-border-radius-bottomleft: 5px; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px; height: 85px; }
    .pt-rows li span.pt-3x { width: 72%; float: left; text-align: center; border: none; }
    .pt-special { width: 23%; position: absolute; right: 0; top: 0; }
    .pt-special .pt-rows { padding-left: 0px; border-radius: 5px; -webkit-border-radius: 5px; -moz-border-radius: 5px; border: 1px solid #a2b7ca; background: #f4faff;     -moz-box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); -webkit-box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); padding-bottom: 10px; }
    .pt-special .pt-rows li { border-width: 0 0 1px; background: transparent; }
    .pt-special .pt-rows li.title { height: 58px; margin: 1px; background: #d0ebfe; color: #2a719d; font-size: 30px; line-height: 65px; text-align: center; border-bottom: 1px solid #bfd4e6; border-width: 0 0 1px; text-shadow: 2px 2px #e6f5ff; }
    .pt-special .pt-rows li.fees { border-bottom: 1px solid #bcd8ec; }
    .pt-special .pt-rows li.fees span { background: #ecf6fe; }
    .pt-special .pt-rows li.fin { border: none; text-align: center; }
    .pt-special .pt-rows li span { border: none; width: 100%; }
    .pt-special .pt-rows li.fin .big-button { background: #3a8bd0; top: 22px; }
    .pt-special .pt-rows li.fin .big-button:hover { background: #50a6ef; }

    /* Simple Button CSS: */
    .big-button { font-size: 24px !important; line-height: 50px; font-weight: 700; color: #fff !important; padding: 10px 20px; background: #4a980d; text-shadow: 2px 2px rgba(0, 0, 0, 0.3); border-radius: 5px; -moz-border-radius: 5px; -webkit-border-radius: 5px; border: 1px solid #407718; text-decoration: none !important; position: relative; top: 18px; }
    .big-button:hover { color: #fff; -moz-box-shadow: 0 0 20px #fffc00; -webkit-box-shadow: 0 0 20px #fffc00; box-shadow: 0 0 20px #fffc00; background: #6fbb2f; }
    .big-button:active { position: relative; top: 1px; }

    </style>

<div class="body_resize_bottom">

            <h2>Paket Harga</h2>
            <p>Beberapa paket yang kami tawarkan, kami berusaha menyelaraskan budget dan selera anda:</p>

         <!-- ========================================================================================================= -->
    <div id="content">
           <div class="price-chart">
            <div class="attr-col">
                <ul>
                    <li>150Mb Hosting:</li>
                    <li>Basic Page:</li>
                    <li>Gallery:</li>
                    <li>Slider:</li>
                    <li>Product Catalog:</li>
                    <li class="last">Custom Design Theme:</li>
                </ul>
            </div>
            <div class="pt-table">  
                <div class="pt-body">
                    <ul class="pt-rows">
                        <li class="title"><span>Basic</span><span>Standart</span><span>Premium</span><span>Hidden Column</span></li>
                        <li class="fees"><span>700 rb</span><span>900 rb</span><span>1.300 rb</span><span>$25</span></li>
                        <li><span class="pt-yes"></span><span class="pt-yes"></span><span class="pt-yes"></span><span class="pt-yes"></span></li>
                        <li><span class="pt-yes"></span><span class="pt-yes"></span><span class="pt-yes"></span><span class="pt-yes"></span></li>
                        <li><span class="pt-yes"></span><span class="pt-yes"></span><span class="pt-yes"></span><span class="pt-yes"></span></li>
                        <li><span class="pt-no"></span><span class="pt-yes"></span><span class="pt-yes"></span><span class="pt-yes"></span></li>
                        <li><span class="pt-no"></span><span class="pt-no"></span><span class="pt-yes"></span><span class="pt-yes"></span></li>
                        <li><span class="pt-no"></span><span class="pt-no"></span><span class="pt-no"></span><span>2 Licenses</span></li>
                        <li class="fin"><span class="pt-3x"><a href="<?php echo base_url().'contact';?>" class="big-button">Order Now</a></span></li>
                    </ul>
                </div>
                <div class="pt-special">
                    <ul class="pt-rows">
                        <li class="title">Special Plan</li>
                        <li class="fees"><span>Custom</span></li>
                        <li><span>&gt 150 Mb </span></li>
                        <li><span class="pt-yes"></span></li>
                        <li><span class="pt-yes"></span></li>
                        <li><span class="pt-yes"></span></li>
                        <li><span class="pt-yes"></span></li>
                        <li><span class="pt-yes"></span></li>
                        <li class="fin"><a href="<?php echo base_url().'contact';?>" class="big-button">Call Now</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
  		 <!-- ================================================================================================================= -->

		  
		  

          <div class="clr"></div>
</div>