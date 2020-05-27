<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">


	<body>
		

		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			<div class="sidebar" id="sidebar">
                <?php
                  
                 include $usermenu; 

                ?>
               
                <!--/.nav-list-->
			</div>

			<div class="main-content">
				<div class="breadcrumbs" id="breadcrumbs">
					<ul class="breadcrumb">
                        <li>
							<i class="icon-home home-icon"></i>
							<a href="#"><?=$text[4];?></a>

							<span class="divider">
								<i class="icon-angle-right arrow-icon"></i>
							</span>
						</li>
						<li class="active"><?=$text[15];?></li>
					</ul><!--.breadcrumb-->
                    <div class="nav-search" id="nav-search">
						<div class="btn-group">
                            <button class="btn btn-small btn-transperant">
                                <?php foreach($language as $language){echo $language->fld_language; }?>
                            </button>

                            <button data-toggle="dropdown" class="btn btn-small btn-transperant dropdown-toggle">
                                                    <i class="icon-angle-down"></i>
                            </button>

                            <ul class="dropdown-menu dropdown-yellow pull-right">
                                <?php foreach($languages as $language){ ?>
                                <li>
                                    <a href="<?=base_url();?>index.php/Dashboard/chanege_language/<?=$language->fld_language_id;?>" ><?=$language->fld_language;?></a>
                                </li>
                                <?php } ?>

                            </ul>
					   </div>
					</div><!--#nav-search-->
                    
					
				</div>

				<div class="page-content">
                
				</div><!--/.page-content--> 
			</div><!--/.main-content-->
		</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>

		<!--basic scripts-->

		<!--[if !IE]>-->

		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/moment.js"></script>
		<!--<![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]>-->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?=base_url(); ?>assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!--<![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='<?=base_url(); ?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?=base_url(); ?>assets/js/bootstrap.min.js"></script>

		<!--page specific plugin scripts-->

		<!--ace scripts-->

		<script src="<?=base_url(); ?>assets/js/ace-elements.min.js"></script>
		<script src="<?=base_url(); ?>assets/js/ace.min.js"></script>

		<!--inline scripts related to this page-->
        <script>
            $(document).ready(function() {
                var datetime = null,
                    date = null;

                function update () {
                    date = moment(new Date())
                    datetime.html(date.format('dddd, MMMM Do YYYY, h:mm:ss a'));
                };

                    datetime = $('#datetime')
                    update();
                    setInterval(update, 1000);      
            });
        </script>
	</body>
</html>
