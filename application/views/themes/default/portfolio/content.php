<div class="body_resize_bottom">
          <div class="left">
            <h2>Our Work Gallery!</h2>
            <p>Beberapa karya yang telah kami kerjakan</p>
            <div class="bg"></div>
			
			<!-- loop images here -->
            <?php echo isset($portfolio)?$portfolio:""; ?>
            
            
            
          </div>
          <div class="right">
            <h2>Subnavigation</h2>
            <ul>
				<?php foreach($submenu as $submenu) { ?>
						<li> <a href="#"><?php echo $submenu["name"]; ?></a></li>
				<?php } ?>
            </ul>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            
			<?php echo isset($ads)?$ads:""; ?>
			
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <?php echo isset($news)?$news:""; ?>
          </div>
          <div class="clr"></div>
        </div>