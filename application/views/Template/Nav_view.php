
		<style type="text/css">
			.ace-nav>li{line-height:45px;max-height:45px;
	/*2e6589*/
	background:<?php if(isset($color)){echo $color; } ?> !important;
}
		</style>
		<div class="navbar" style="	height:45px; ">
			<div class="navbar-inner" style="background-color:<?php if(isset($color)){ echo $color; }  ?>">
				<div class="container-fluid">
					<a href="#" class="brand">
						<small>
							<i class="icon-leaf"></i>
							<?=$text[2];?> 
						</small>
					</a><!--/.brand-->

					<ul class="nav ace-nav pull-right">
                        <li class="grey">
                            
                        </li>
						<li class="">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php echo base_url(); ?>assets/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small><?=$text[7];?>,</small>
									<?=$this->session->userdata('username');?>
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer" >
								<li >
									<a href="#">
										<i class="icon-cog"></i>
										<?=$text[8];?> 
									</a>
								</li>

								<li>
									<a href=<?php echo base_url('index.php/Profile_ctrl'); ?>>
										<i class="icon-user"></i>
										<?=$text[9];?> 
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href=<?php echo base_url('index.php/Logout'); ?>>
										<i class="icon-off"></i>
										<?=$text[10];?>
									</a>
								</li>
							</ul>
						</li>

					</ul><!--/.ace-nav-->
				</div><!--/.container-fluid-->
			</div><!--/.navbar-inner-->
		</div>
    