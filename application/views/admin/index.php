<!DOCTYPE html>
<html lang="en">
<head>
	<!--
		Charisma v1.0.0

		Copyright 2012 Muhammad Usman
		Licensed under the Apache License v2.0
		http://www.apache.org/licenses/LICENSE-2.0

		http://usman.it
		http://twitter.com/halalit_usman
	-->
	<meta charset="utf-8">
	<title>Free HTML5 Bootstrap Admin Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
	<meta name="author" content="Muhammad Usman">

	<!-- The styles -->
	<link  href="<?php echo base_url();?>css/bootstrap-cerulean.css" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
          .message{
              color: #00ff00;
              font-size: 16px;
          }
          .exception{
              color: #ff0000;
              font-size: 16px;
          }
	</style>
	<link href="<?php echo base_url();?>css/bootstrap-responsive.css" rel="stylesheet">
	<link href="<?php echo base_url();?>css/charisma-app.css" rel="stylesheet">
	<link href="<?php echo base_url();?>css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='<?php echo base_url();?>css/fullcalendar.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>css/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='<?php echo base_url();?>css/chosen.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>css/uniform.default.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>css/colorbox.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>css/jquery.cleditor.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>css/jquery.noty.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>css/noty_theme_default.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>css/elfinder.min.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>css/elfinder.theme.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>css/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>css/opa-icons.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>css/uploadify.css' rel='stylesheet'>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="img/favicon.ico">
		
</head>

<body>
		<div class="container-fluid">
		<div class="row-fluid">
		
			<div class="row-fluid">
				<div class="span12 center login-header">
					<h2>Welcome</h2>
				</div><!--/span-->
			</div><!--/row-->
			
			<div class="row-fluid">
				<div class="well span5 center login-box">
					<div class="alert alert-info">
                                            <div class="message">
                                                <?php
                                                    $msg=$this->session->userdata('message');
                                                    if(isset($msg))
                                                    {
                                                        echo $msg;
                                                        $this->session->unset_userdata('message');
                                                    }
                                                ?>
                                            </div>
                                            <div class="exception">
                                                <?php
                                                    $exc=$this->session->userdata('exception');
                                                    if(isset($exc))
                                                    {
                                                        echo $exc;
                                                        $this->session->unset_userdata('exception');
                                                    }
                                                ?>
                                            </div>
						Please login with your Email and Password.
					</div>
                                    <form class="form-horizontal" action="<?php echo base_url();?>porshe_controller/admin_login_check" method="post">
						<fieldset>
							<div class="input-prepend" title="Email" data-rel="tooltip">
								<span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10" name="admin_email_address" id="username" type="text" placeholder="Enter   admin   email   ...." />
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password" data-rel="tooltip">
								<span class="add-on"><i class="icon-lock"></i></span><input class="input-large span10" name="admin_password" id="password" type="password" placeholder="Enter   password   ....." />
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend">
							<label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>
							</div>
							<div class="clearfix"></div>

							<p class="center span5">
							<button type="submit" class="btn btn-primary">Login</button>
							</p>
						</fieldset>
					</form>
				</div><!--/span-->
			</div><!--/row-->
				</div><!--/fluid-row-->
		
	</div><!--/.fluid-container-->

	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<!-- jQuery -->
	<script src="<?php echo base_url();?>js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
	<script src="<?php echo base_url();?>js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
	<script src="<?php echo base_url();?>js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="<?php echo base_url();?>js/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="<?php echo base_url();?>js/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="<?php echo base_url();?>js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="<?php echo base_url();?>js/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="<?php echo base_url();?>js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="<?php echo base_url();?>js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="<?php echo base_url();?>js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="<?php echo base_url();?>js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="<?php echo base_url();?>js/bootstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="<?php echo base_url();?>js/bootstrap-carousel.js"></script>
	<!-- autocomplete library -->
	<script src="<?php echo base_url();?>js/bootstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="<?php echo base_url();?>js/bootstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="<?php echo base_url();?>js/jquery.cookie.js"></script>
	<!-- calander plugin -->
	<script src='<?php echo base_url();?>js/fullcalendar.min.js'></script>
	<!-- data table plugin -->
	<script src='<?php echo base_url();?>js/jquery.dataTables.min.js'></script>

	<!-- chart libraries start -->
	<script src="<?php echo base_url();?>js/excanvas.js"></script>
	<script src="<?php echo base_url();?>js/jquery.flot.min.js"></script>
	<script src="<?php echo base_url();?>js/jquery.flot.pie.min.js"></script>
	<script src="<?php echo base_url();?>js/jquery.flot.stack.js"></script>
	<script src="<?php echo base_url();?>js/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="<?php echo base_url();?>js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="<?php echo base_url();?>js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="<?php echo base_url();?>js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="<?php echo base_url();?>js/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="<?php echo base_url();?>js/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="<?php echo base_url();?>js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="<?php echo base_url();?>js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="<?php echo base_url();?>js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="<?php echo base_url();?>js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="<?php echo base_url();?>js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="<?php echo base_url();?>js/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
	<script src="<?php echo base_url();?>js/charisma.js"></script>
	
		
</body>
</html>
