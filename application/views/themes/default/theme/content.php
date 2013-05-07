<div class="body_resize_bottom">

    <h2>Pilihan Tema</h2>
    <p>Browse by category</p>
    <div class="bg"></div>

<style>
#centeredmenu {
   float:left;
   width:100%;
   background:#fff;
   border-bottom:4px solid #000;
   overflow:hidden;
   position:relative;
}
#centeredmenu ul {
   clear:left;
   float:left;
   list-style:none;
   margin:0;
   padding:0;
   position:relative;
   left:50%;
   text-align:center;
}
#centeredmenu ul li {
   display:block;
   float:left;
   list-style:none;
   margin:0;
   padding:0;
   position:relative;
   right:50%;
}
#centeredmenu ul li a {
   display:block;
   margin:0 0 0 1px;
   padding:3px 10px;
   background:#ddd;
   color:#000;
   text-decoration:none;
   line-height:1.3em;
}
#centeredmenu ul li a:hover {
   background:#369;
   color:#fff;
}
#centeredmenu ul li a.active,
#centeredmenu ul li a.active:hover {
   color:#fff;
   background:#000;
   font-weight:bold;
}
</style>

<script>
$(document).ready(function(){
    hendarClicker();
    addActive();
});
var hendarClicker = function(){
   $('#centeredmenu li').click(function(){
     var id = $(this).attr("id");
     ajaxProses(id);
   }); 
}

var addActive = function(){
  $('#centeredmenu li a').click(function(){
    $('#centeredmenu li a').removeClass('active');
    $(this).addClass('active');
  });
}

var ajaxProses = function(id){
    // $('#loader').show();
     var stringQuery = 'idx=' + id;
     $.ajax({
        url: 'theme/ajax/',
        data: stringQuery,
        type: 'POST',
        success: function (data) {
            $('#display').html(data); 
        }
    });
}
</script>

    <div id="centeredmenu" style="width:100%;">
    	<ul>
    		<li id="12"><a href="#">Art</a></li>
    		<li id="13"><a href="#">Bussines</a></li>
  			<li id="15"><a href="#">Blog</a></li>
  			<li id="16"><a href="#">Interior</a></li>
  			<li id="18"><a href="#">Medical</a></li>
  			<li id="17"><a href="#">News</a></li>
  			<li id="19"><a href="#">Photograph</a></li>
  			<li id="20"><a href="#">Printing</a></li>
  			<li id="21"><a href="#">Profesional</a></li>
  			<li id="22"><a href="#">Property</a></li>
  			<li id="23"><a href="#">Restourant</a></li>
    	</ul>
    </div>


	<div id="display">
		<!-- loop images here  sdsdsdsd -->
	    <?php echo isset($theme)?$theme:""; ?>
	</div>



	<div class="clr"></div>
</div>            
            
            

          