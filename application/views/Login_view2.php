<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Login</title>

        <meta name="description" content="User login page" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <script type="text/javascript" src="<?php echo base_url(); ?>js/1.4.2/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>js/1.8.2/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>js/highcharts.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery.flot.min.js"></script>

        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />

        <!--basic styles-->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/browser.png">
        <link href="<?=base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?=base_url(); ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?=base_url(); ?>assets/css/font-awesome.min.css" />
        <link rel="stylesheet" href="<?=base_url(); ?>assets/css/login_logo.css" />
        <!--[if IE 7]>
          <link rel="stylesheet" href="<?=base_url(); ?>assets/css/font-awesome-ie7.min.css" />
        <![endif]-->

        <!--page specific plugin styles-->

        <!--fonts-->

        <!--fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300" />
                <!--fonts-->

        <!--ace styles-->

        <link rel="stylesheet" href="<?=base_url(); ?>assets/css/ace.min.css" />
        <link rel="stylesheet" href="<?=base_url(); ?>assets/css/ace-responsive.min.css" />
        <link rel="stylesheet" href="<?=base_url(); ?>assets/css/ace-skins.min.css" />
        <link rel="stylesheet" href="<?=base_url(); ?>assets/css/login_logo.css" />
        <!--[if lte IE 8]>
          <link rel="stylesheet" href="<?=base_url(); ?>assets/css/ace-ie.min.css" />
        <![endif]-->

        <!--inline styles related to this page-->
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
</head>

    <body>
        <div class="main-container container-fluid">
            <div class="main-content">
                <div class="page-content">
                    <div class="row-fluid">
                    
                    
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="span6  widget-container-span">
                                <div class="widget-box">
                                    <div class="widget-header">
                                        <h3>
                                            <span class="blue">CRP</span>
                                            <span class="blue">System Login</span>
                                        </h3> 
                                    </div>
                                    <div class="widget-body">
                                            <div class="widget-main">
                                                <div class="space-6"></div>
                                                <?php
                                                if($error['status']=='error'){
                                                ?>
                                                    <div class="alert alert-danger">
                                                        <?=$error['msg']?>
                                                    </div> 
                                                <?php
                                                }
                                                echo form_open('User_login/check_login', array('name' => 'myform'));    
                                                ?>
                                                <fieldset>
                                                     <div class="control-group " >
                                                    <label>
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="text" class="span12" placeholder="Username" name="username"/>
                                                            <i class="icon-user"></i>
                                                        </span>
                                                        <?php echo form_error('username');?>
                                                    </label>
                                                </div>
                                                <div class="control-group" id="gn_div">
                                                    <label>
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="password" class="span12" placeholder="Password" name="password"/>
                                                            <i class="icon-lock"></i>
                                                        </span>
                                                        <?php echo form_error('password');?>
                                                    </label>
                                                </div>

                                                    <div class="space"></div>

                                                    <div class="clearfix">
                                                        <input type="submit" class="width-35 pull-right btn btn-small btn-primary" value="Login">
                                                    </div>

                                                    <div class="space-4"></div>
                                                </fieldset>
                                            <?php echo form_close(); ?>
                                            <a class="btn-link tooltip-warning" data-rel="popover" data-placement="bottom" title="Forgot password" data-content="please contact your admin to reset your password.">Forgot password?</a>
                                            </div><!--/widget-main-->
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div> 
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <hr class="span10">
                            <div class="widget-box transparent span9">          
                                <div class="widget-body">
                                    <div class="widget-main">
                                        
                                        <div class="center">
                                            <label class="muted">Version 1.0 © 2020, Rajeeda Holdings (pvt) Ltd </label>
                                        </div>
                                        <div class="center">

                                            
                                            <label class="blue"> 
                                                <a class="btn btn-link" href="//rajeeda.com">Contact us </a>
                                                | 
                                                <a class="btn btn-link" href="//rajeeda.com">About us </a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.main-container-->

        <!--basic scripts-->

        <!--[if !IE]>-->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

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
 window.jQuery || document.write("<script src='<?=base_url(); ?>assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

        <script type="text/javascript">
            if("ontouchend" in document) document.write("<script src='<?=base_url(); ?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
        </script>
        <script src="<?=base_url(); ?>assets/js/bootstrap.min.js"></script>

        <!--page specific plugin scripts-->
        <script src="<?=base_url(); ?>assets/js/jquery.easy-pie-chart.min.js"></script>
        <!--ace scripts-->

        <script src="<?=base_url(); ?>assets/js/ace-elements.min.js"></script>
        <script src="<?=base_url(); ?>assets/js/ace.min.js"></script>

        <!--inline scripts related to this page-->

        <script type="text/javascript">
            $(function() { 
                $('[data-rel=popover]').popover({html:true});
            });
            
        </script>
    </body>
</html>
