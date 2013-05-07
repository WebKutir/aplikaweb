			
			<div id="innerlogin">
			
            	<form method=POST action="<?php echo base_url()."webmin/auth"; ?>">
                	<p>Enter your username:</p>
                	<input type="text" name="username" value="" size="30" class="logininput" />
                    <p>Enter your password:</p>
                	<input type="password" name="password" value="" size="30" class="logininput" />
                   
                   	<input type="submit" class="loginbtn" value="Login" /><br />
                    <p><a href="#" title="Forgoteen Password?">Forgotten Password?</a></p>
                </form>
            </div>