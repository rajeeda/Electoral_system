<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/browser.png">
    <title>Login</title>
    <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets2/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets2/css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets2/css/iofrm-theme1.css">
<style type="text/css">
#popover{
    cursor: pointer;
}
.form-content form {
    margin-bottom: 0px !important;
}
.popover-header{
    background-color: #79fe31;
}
h4{
    /*color: #478fca;*/
    color: #000000;
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
}
h6{
    color: #ffffff;
}
.form-content {
    background-color: <?php if(isset($color)){echo $color; } ?> !important;
}
</style>

</head>
<body style=" background-color: <?php if(isset($color)){echo $color; } ?>">
   
    <div class="form-body" class="container-fluid">
        <div class="website-logo">

<!-- <div class="span6"> -->
            <a href="index.html">
                <div class="logo">
                    <!-- <img src="<?php echo base_url(); ?>assets2/images/logo.png" alt=""> -->
                    <?php
                     if($comp_logo)
                     {
                    ?>
                    <div class="span2 center">
                                      
                     <span class="loginlogo">
                      <img id="avatar" alt="Alex's Avatar" src="<?=base_url(); ?><?=$comp_logo?>">

                     </span>
                    
                    </div>
                    <?php
                    }
                    
                    ?>
                </div>
            </a>
        <!-- </div> -->
<div class="span10">
           <h4>  <?=$comp_name?></h4>
</div>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <!-- <div class="info-holder">
                        <h3>Vision -</h3>
                        <p>To be an inspiration and a medium for all young people to build a united, prosperous and just society.</p>
                        <h3>Mission -</h3>
                        <p>To mobilize and equip young people to participate fully in society and in the political process to guide the country towards the vision espoused by the United National Party.</p>

                </div> -->
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>CRP SYSTEM</h3>
                        <!-- <h6>Total online accounting solution for microfinance.</h6> -->
                        <!-- <h3>Wijepala Hettiarachchi Social Network</h3> -->
                        <!-- <br> -->
                     

                        <div class="page-links" style="width: 500px;">
                         <div class="form-button">   
                        <!-- <form method="post" action="<?php  //echo base_url('index.php/Make_user_ctrl'); ?>"> -->
                            <!-- <button id="submit1" type="submit" class="ibtn"><font color="black">Register Now</button></font> -->
                            <!-- <p>සාමාජිකයන් </p> --><hr>
                        <!-- </form> -->

                    </div>
                        </div>
                        <?php
                                                if($error['status']=='error'){
                                                ?>
                                                    <div class="alert alert-danger">
                                                        <?=$error['msg']?>
                                                    </div> 
                                                <?php
                                                }
                                                echo form_open('Login/check_login', array('name' => 'myform'));    
                                                ?>
                                                <fieldset>
                                                    <label>
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="text" class="span12" placeholder="Username" name="username"/>
                                                            <i class="icon-user"></i>
                                                        </span>
                                                        <?php echo form_error('username');?>
                                                    </label>

                                                    <label>
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="password" class="span12" placeholder="Password" name="password"/>
                                                            <i class="icon-lock"></i>
                                                        </span>
                                                        <?php echo form_error('password');?>
                                                    </label>

                                                    <div class="space"></div>

                                                    <div class="form-button">
                                                        <div class="clearfix">
                                <button id="submit" type="submit" class="ibtn">Admin Login</button>
                                <a href="<?=base_url();?>index.php/User_login?>" 
                                    class="ibtn">User Login</a>
                                <br>
                                <a class="pop" data-rel="popover" data-placement="bottom" title="Forgot password" data-content="please contact head comitee"><font size="0.5px" color="#ffffff" style="normal">Forgot password?</a></font>
                            </div>
                        </div>

                                                   
                                                </fieldset>
                                            <?php echo form_close(); ?>
                        <div class="other-links">
                           <div class="center">
                                            <label class="muted">Version 1.70 © 2019<br>
                                             Rajeeda Holdings (pvt) Ltd </label>
                                        </div>
                                        <div class="center">
                                            <label class="blue"> 
                                                <a class="btn btn-link" href="//rajeeda.com">Contact us </a>
                                                | 
                                                <a class="btn btn-link" href="//rajeeda.com">About us </a>
                                            </label>
                                        </div>
                            <!-- <a href="https://www.facebook.com/wijepala.hettiarachchi" target="_blank">Facebook</a><a href="#">Google</a><a href="#">Linkedin</a> -->
                        </div>
                    </div>
                </div>
        </div>
    </div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets2/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets2/js/popper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets2/js/main.js"></script>

<script type="text/javascript">
           $('.pop').popover().click(function () {
            setTimeout(function () {
                $('.pop').popover('hide');
            }, 1800);
        });
        </script>

</body>
</html>