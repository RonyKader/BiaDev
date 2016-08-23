<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Login - <?php echo $this->config->item('branding_name');?>  Student Management System </title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!--basic styles-->

		<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="manager-assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!--page specific plugin styles-->

		<!--fonts-->

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!--ace styles-->

		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-responsive.min.css" />

		<!--[if lt IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
	</head>

	<body class="login-layout">
		<div class="container-fluid" id="main-container">
			<div id="main-content">
				<div class="row-fluid">
					<div class="span12">
						<div class="login-container">
							<div class="row-fluid">
								<div class="center">
                                                                    <img class="nav-user-photo" src="<?php echo base_url();?>assets/images/bialogo.png" alt="Admin's Photo" />
									<h1>
                                    	<i class="icon-lock  green"></i>
										<span class="white"> <?php echo $this->config->item('branding_name');?> Student Management System</span>
									</h1>
								</div>
							</div>

							<div class="space-6"></div>

<!--                                                        <input type="text" id="txturllink" name="txturllink" value="$this->session->userdata('urllink')"/>-->
							<div class="row-fluid">
								<div class="position-relative">
									<div id="login-box" class="visible widget-box no-border">
										<div class="widget-body">
											<div class="widget-main">
                                                <?php if($alert_message != "") {?> 
                                                    <h4 class="header red lighter bigger">
                                                    <i class="icon-lock  red"></i>
													<?php echo $alert_message;?>
                                                <?php }else{?>
                                                <h4 class="header blue lighter bigger">
													<i class="icon-lock  green"></i>
													Please enter your information
                                                    <?php }?>
												</h4>

												<div class="space-6"></div>

												<form action="" method="post">
													<fieldset>
														<label>
															<span class="block input-icon input-icon-right">
																<input type="text" class="span12" placeholder="Username" name="username" value="<?php if (get_cookie('username')){ echo get_cookie('username');}?>" />
																<i class="icon-user"></i>
															</span>
														</label>

														<label>
															<span class="block input-icon input-icon-right">
																<input type="password" class="span12" placeholder="Password" name="password" value="" />
																<i class="icon-lock"></i>
															</span>
														</label>

														<div class="space"></div>

														<div class="row-fluid">
															<label class="span8">
																<input type="checkbox" name="rememberme" value="Y" <?php if (get_cookie('username')) { ?>checked="checked"<?php } ?>/>
																<span class="lbl"> Remember Me</span>
															</label>

															<button  class="span4 btn btn-small btn-primary">
																<i class="icon-key"></i>
																Login
															</button>
														</div>
													</fieldset>
												</form>
											</div><!--/widget-main-->

											<div class="toolbar clearfix">
											</div>
										</div><!--/widget-body-->
									</div><!--/login-box-->
								</div><!--/position-relative-->
							</div>
						</div>
					</div><!--/span-->
				</div><!--/row-->
			</div>
		</div><!--/.fluid-container-->

		<!--basic scripts-->

		<script src="<?php echo base_url();?>assets/js/jquery-1.9.1.min.js"></script>
		<!--page specific plugin scripts-->

	</body>
</html>

