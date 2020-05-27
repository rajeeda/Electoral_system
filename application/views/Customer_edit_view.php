<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?=$text[70];?></title>

        <meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!--basic styles-->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/browser.png">
		<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" />
		
        
        <!--[if IE 7]>
          <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
        <![endif]-->

        <!--page specific plugin styles-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.gritter.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/preloader.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/chosen.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui-1.10.3.custom.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/select2.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-editable.css" />
        <!--fonts-->

        <!--fonts-->
				<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300" />
                <!--fonts-->
                

        <!--ace styles-->

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-skins.min.css" />

        <!--[if lte IE 8]>
          <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
        <![endif]-->

        <!--inline styles related to this page-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <style rel="stylesheet">
    input[type="checkbox"], input[type="radio"] {
        opacity: 0.9;
        margin-top: 10px;
        margin-left: 5px;
        }
    </style>

    <body>
      

                <div class="main-container container-fluid">
            <a class="menu-toggler" id="menu-toggler" href="#">
                <span class="menu-text"></span>
            </a>

            <div class="sidebar" id="sidebar">
                <?php
                  
                 include $usermenu; 

                ?><!--/.nav-list-->
            </div>

            <div class="main-content">
                <div class="breadcrumbs" id="breadcrumbs">
                   
                    <div class="nav-search" id="nav-search">
                        <div class="btn-group">
                            <button class="btn btn-small btn-transperant">
                                <?php foreach($language as $language){echo $language->fld_language; }?>
                            </button>

                            <button data-toggle="dropdown" class="btn btn-small btn-transperant dropdown-toggle">
                                                    <i class="icon-angle-down"></i>
                            </button>

                            <ul class="dropdown-menu dropdown-yellow">
                                <?php foreach($languages as $language){ ?>
                                <li>
                                    <a href="<?=base_url();?>index.php/Customer_create_ctrl/chanege_language/<?=$language->fld_language_id;?>" ><?=$language->fld_language;?></a>
                                </li>
                                <?php } ?>

                            </ul>
                       </div>
                    </div><!--#nav-search-->
                </div>
                
                <div class="page-content">
                    <div class="se-pre-con"></div>
                    <div class="row-fluid">
                        <?php
                            $page                      =$page_id;
                            $customer_no               =$cus_no;
                            $customer_name             ="";
                            $customer_full_name        ="";
                            $customer_address          ="";
                            $customer_nic              ="";
                            $customer_tp               ="";
                            $customer_email            ="";
                            $customer_gender           ="";
                            $customer_status           ="";
                            $customer_branch_id        ="";
                            $customer_branch_name      ="";
                            $customer_fo_id            ="";
                            $customer_fo_name          ="";
                            $customer_group_id         ="";
                            $customer_group_name       ="";
                            $customer_center_id        ="";
                            $customer_center_name      ="";
                            $customer_blood            ="";
                            $customer_photo            ="customer_documents/customer_images/default_profile.jpg";
                            $customer_signature        ="customer_documents/customer_images/images.png";
                            $customer_type             ="";
                            $customer_active           ="";
                            $customer_dl               ="";
                            $customer_dob              ="";
                            $customer_passport         ="";
                            $customer_lat              ="";    
                            $customer_log              ="";
                            $customer_occuption        ="";
                            $customer_calendar_type_id ="";
                            $customer_calendar_type    ="";
                            $fld_other_lan_id = "";
                            $fld_other_name = "";
                            $fld_other_address = "";
                            
                            $active                    =["Deactive","Active"];
                            
                            foreach($cus_info as $row){

                                $customer_name             =$row->fld_customer_name;
                                $customer_full_name        =$row->fld_customer_full_name;
                                $customer_address          =$row->fld_customer_address;
                                $customer_nic              =$row->fld_customer_nic;
                                $customer_tp               =$row->fld_customer_tel;
                                $customer_email            =$row->fld_customer_email;
                                $customer_gender           =$row->fld_customer_gender;
                                $customer_blood            =$row->fld_customer_blood;
                                $customer_occuption        =$row->fld_customer_occupation;
                                $customer_type             =$row->fld_customer_type;    
                                $customer_dob              =$row->fld_customer_dob;    
                                $customer_passport         =$row->fld_customer_passport;    
                                $customer_dl               =$row->fld_customer_dl_no;    
                                $customer_active           =$row->fld_customer_active; 
                                
                                
                            }
                        ?>
                        <div class="widget-box transparent">
                            <div class="widget-body">
                            <?php if($this->session->flashdata('success')){ ?>
                                <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
                            </div>
                            <?php } 

                            else if($this->session->flashdata('error')){  ?>
                                  <div class="alert alert-danger">
                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                        <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
                                    </div>
                            <?php } ?>
                                <?php echo validation_errors(); ?>
                                <?php if($this->session->flashdata('msg')){
                                    echo $this->session->flashdata('msg');
                                } ?>
                                <form class="form-horizontal" action="<?=base_url()?>index.php/Customer_ctrl/save_edit_customer/<?=$customer_no ?>" id="validation-form" name="customer_form" method="post">
                                    <input type="hidden" name="customer" id="customer" value="<?=$customer_no ?>">
                                    <div class="widget-main">
                                        <div class="row-fluid">
                                            <div class="span6">
                                                
                                              
                                                <div class="control-group">
                                                    <label class="control-label" for="type">
                                                        <!-- Type --><?=$lables[22]; ?><span class="red">*</span>:
                                                    </label>
                                                    <div class="controls">
                                                        <select  class="chzn-select" id="type" name="type" data-placeholder="">
                                                             <option value="<?=$customer_type ?>"/><?=$customer_type ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="name">
                                                        <!-- Name --><?=$lables[3]; ?><span class="red">*</span>:
                                                    </label>
                                                    <div class="controls">
                                                        <input type="text" id="name" name="name" placeholder="Name with initials" value="<?=$customer_name ?>">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="full_name">
                                                        <!-- Full Name --><?=$lables[18]; ?><span class="red">*</span>:
                                                    </label>
                                                    <div class="controls">
                                                        <input type="text" id="full_name" name="full_name" placeholder="Full name" value="<?=$customer_full_name ?>">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="nic">
                                                        <!-- NIC --><?=$lables[6]; ?><span class="red">*</span>:
                                                    </label>
                                                    <div class="controls">
                                                        <input type="text" id="nic" name="nic" placeholder="NIC Number" value="<?=$customer_nic ?>">
                                                        <div><small class="text-info"><?=$lables[21]; ?><!-- NIC should be this format (123456789V or 123456789012) --></small></div>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="address">
                                                        <!-- Address --><?=$lables[4]; ?><span class="red">*</span>:
                                                    </label>
                                                    <div class="controls">
                                                        <input type="text" id="address" name="address" placeholder="Address" value="<?=$customer_address ?>"><br>
                                                        <a href="<?=base_url()?>index.php/Customer_ctrl/customer_location/<?=$customer_no?>" target="_blank" class="btn btn-mini btn-info"><i class="icon-map-marker bigger-110"></i> <!-- Location --><?=$lables[54]; ?> </a>
                                                        &nbsp
                                                        <a href="https://www.google.lk/maps/dir//<?=$customer_lat?>,<?=$customer_log?>" target="_blank" class="btn btn-mini btn-info"><i class="icon-map-marker bigger-110"></i><?=$lables[55]; ?> <!-- View Map Directions --></a>
                                                        
                                                    </div>
                                                </div>


                                                  <hr>
                                                <p><?php echo $text[134]; ?></p>
                                                            
                                                <div class="control-group">
                                                      <label class="control-label" for="form-field-1"><!-- Customer Name--><?=$lables[31];?></label>

                                                      
                                                    
                                                </div>


                                                

                                                
                                                <hr>


                                                <div class="control-group">
                                                    <label class="control-label" for="tp">
                                                        <!-- Tele-Phone --><?=$lables[5]; ?><span class="red">*</span>:
                                                    </label>
                                                    <div class="controls">
                                                        <input type="text" id="tp" name="tp" placeholder="Tele-Phone Number" value="<?=$customer_tp ?>">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="email">
                                                        <!-- Email --><?=$lables[7]; ?><span class="red"></span>:
                                                    </label>
                                                    <div class="controls">
                                                        <input type="text" id="email" name="email" placeholder="Email Address" value="<?=$customer_email ?>">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="dob">
                                                        <!-- Date Of Birth --><?=$lables[8]; ?><span class="red"></span>:
                                                    </label>
                                                    <div class="controls">
                                                        <input type="text" class="date-picker" id="dob" name="dob"  data-date-format="yyyy-mm-dd" placeholder="Date Of Birth" value="<?=$customer_dob ?>">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="passport">
                                                        <!-- Passport --><?=$lables[41]; ?><span class="red"></span>:
                                                    </label>
                                                    <div class="controls">
                                                        <input type="text" id="passport" name="passport" placeholder="Passport Number" value="<?=$customer_passport ?>">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="dl">
                                                        <!-- Driving License --><?=$lables[42]; ?><span class="red"></span>:
                                                    </label>
                                                    <div class="controls">
                                                        <input type="text" id="dl" name="dl" placeholder="Driving License Number" value="<?=$customer_dl ?>">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="gender">
                                                        <!-- Gender --><?=$lables[54]; ?><span class="red">*</span>:
                                                    </label>
                                                    <div class="controls">
                                                        <select  class="chzn-select" id="gender" name="gender" data-placeholder="">
                                                            <option value="<?=$customer_gender ?>"/><?=$customer_gender ?>
                                                            <option value="Male"/><!-- Male --><?=$lables[38]; ?>
                                                            <option value="Female"/><!-- Female --><?=$lables[39]; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="occupation">
                                                        <!-- Occupation --><?=$lables[43]; ?><span class="red"></span>:
                                                    </label>
                                                    <div class="controls">
                                                        <input type="text" id="occupation" name="occupation" placeholder="Occupation" value="<?=$customer_occuption ?>">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="blood">
                                                        <!-- Blood Group --><?=$lables[44]; ?><span class="red"></span>:
                                                    </label>
                                                    <div class="controls">
                                                        <input type="text" id="blood" name="blood" placeholder="Blood Group" value="<?=$customer_blood ?>">
                                                    </div>
                                                </div>
                                               
                                                
                                              
                                             
                                            
                                                <div class="control-group">
                                                    <label class="control-label" for="active">
                                                        <!-- Active --><?=$lables[53]; ?><span class="red">*</span>:
                                                    </label>
                                                    <div class="controls">
                                                        <select  class="chzn-select" id="active" name="active" data-placeholder="">
                                                            <!-- <option value="<?=$customer_active ?>"/><?=$active[$customer_active] ?> -->
                                                                <?php 
                                                                if($customer_active == 1)
                                                                {
                                                                ?>
                                                                    <option value="1" selected /><!-- Active --><?=$lables[53]; ?>
                                                                    <option value="0"/><!-- Deactive --><?=$lables[52]; ?>
                                                                <?php
                                                                }
                                                                else if($customer_active == 0)
                                                                {
                                                                ?>
                                                                    <option value="1"/><!-- Active --><?=$lables[53]; ?>
                                                                    <option value="0" selected /><!-- Deactive --><?=$lables[52]; ?>
                                                                <?php
                                                                }
                                                                else
                                                                {
                                                                ?>
                                                                    <option value="1"/><!-- Active --><?=$lables[53]; ?>
                                                                    <option value="0"/><!-- Deactive --><?=$lables[52]; ?>
                                                                <?php
                                                                }
                                                                ?> 
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="span6">
                                               
                                                <div class="space-6"></div>
                                                <div class="space-6"></div>
                                                <div class="space-6"></div>
                                                <div class="row-fluid">
                                                    <div class="tabbable">
                                                        
                                                       

                                                        <br><div class="control-group">

                                                            <label class="control-label" for="center">
                                                                <!-- With Close Account --><?=$lables[62]; ?>:
                                                            </label>
                                                            <input type="checkbox" name="all_acc" id="all_acc" value="1" >
                                                        </div> <br>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-toolbox padding-10 clearfix navbar-fixed-bottom">
                                            <div class="row-fluid">
                                                
                                                <button class="btn btn-small btn-success pull-right" id="sumbit" type="submit" >
                                                        Save
                                                        <i class="icon-save"></i>
                                                </button>
                                                <span id="print_name3">
                                                <button class="btn btn-small btn-warning pull-right" id="cancel" type="buton" onclick="window.reload()">
                                                        <i class="icon-remove"></i>
                                                        Cancel
                                                </button>
                                                </span>
                                            </div>
								        </div><!--/widget-footer-->
                                </form>
                            </div>
                        </div>
                    </div><!--/.row-fluid-->
                    <div class="row-fluid">
                        <div class="space-6"></div>
                        <div class="row-fluid">
				            <div class="tabbable">
								<ul class="nav nav-tabs padding-18">
								    <li class="active">
								        <a data-toggle="tab" href="#family"><!-- Family Information --><?=$lables[74]?></a>
								    </li>
								    <li>
								        <a data-toggle="tab" href="#guranty_for_loan"><!-- Guaranty for loans --><?=$lables[75]?></a>
								    </li>
                                    <li>
								        <a data-toggle="tab" href="#other_data"><!-- Other Information --><?=$lables[76]?></a>
								    </li>
                                    <li>
								        <a data-toggle="tab" href="#documents"><!-- Documents --><?=$lables[77]?></a>
								    </li>

								    <li>
								        <a data-toggle="tab" href="#rating"><!-- Rating --><?=$lables[102]?></a>
								    </li>
								</ul>

				                <div class="tab-content no-border padding-24">
								    <div id="family" class="tab-pane in active">
                                        <?php if ($page==1){?>
                                        <div class="widget-box ">
                                            <div class="widget-header widget-header-small header-color-blue">
                                                <h6>
                                                    <i class="icon-add"></i>
                                                    <!-- Add New Family Member --><?=$lables[82]?>

                                                </h6>
                                                <span class="widget-toolbar">
                                                    <a href="#" data-action="collapse">
                                                        <i class="icon-chevron-up"></i>
                                                    </a>
                                                </span>
                                            </div>
                                            <div class="widget-body">
                                                <div class="widget-main">
                                                    <form class="form-horizontal" action="<?=base_url()?>index.php/Customer_ctrl/add_family/<?=$customer_no ?>" id="validation-form" name="customer_form" method="post">
                                                        <div class="row-fluid">
                                                            <div class="span3">
                                                                <label for="name"><!-- Customer Name --><?=$lables[31]?></label>
                                                                <select class="chzn-select" id="name" name="name" data-placeholder="Select a Customer Name..." disabled>
                                                                    <option value="<?=$customer_no?>"/><?=$customer_name?>
                                                                </select>
                                                            </div>
                                                            <div class="span3">
                                                                <label for="relation"><!-- Relation Type --><?=$lables[79]?> <span class="red">*</span></label>
                                                                <select class="chzn-select" id="relation" name="relation" data-placeholder="Select a Relation Type...">
                                                                    <option value=""/>
                                                                    <?php foreach($relations as $row){ ?>
                                                                    <option value="<?=$row->fld_id?>"/> <?=$row->fld_relation?>           
                                                                    <?php } ?>
                                                                    </select>
                                                            </div>
                                                            <div class="span3">
                                                                <label for="branch"><!-- Branch Name --> <?=$lables[80]?><span class="red">*</span></label>
                                                                <select  class="chzn-select" id="branch" name="branch" data-placeholder="">
                                                                    <option value=""/>
                                                                    <option value="<?=$customer_branch_id ?>"/><?=$customer_branch_name ?>
                                                                    <?php foreach($branches as $branch){ ?>
                                                                    <option value="<?=$branch->fld_branch_id?>"/> <?=$branch->fld_branch_name?>           
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="span3">
                                                                <label for="family"><!-- Family Member --><?=$lables[81]?> <span class="red">*</span></label>
                                                                <select class="chzn-select" id="family_name" name="family" data-placeholder="Select a Family Member...">
                                                                    <option value=""/>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="space-6"></div>
                                                        <div class="row-fluid ">
                                                            <button class="btn btn-small btn-success full-right" type="submit"><!-- Add Family Member --><?=$lables[82]?></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }?>
                                        <table id="family_table" class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th><!-- Image --><?=$lables[83]?></th>
                                                    <th><!-- Name --><?=$lables[3]?></th>
                                                    <th><!-- Type --><?=$lables[22]?></th>
                                                    <th><!-- Relation --><?=$lables[80]?></th>
                                                    <th><!-- NIC --><?=$lables[6]?></th>
                                                    <th><!-- Address --><?=$lables[4]?></th>
                                                    <th><!-- Tele-Phone --><?=$lables[5]?></th>
                                                    <!--<th>Gender</th>
                                                    <th>Status</th>
                                                    <th>Ocupation</th>-->
                                                    <th><!-- More --><?=$lables[85]?></th>
                                                </tr>
                                            </thead>
                                            <tbody><?php if(sizeof($family_info)==0){ ?>
                                                <tr id="no_guar_data">
                                                    <td colspan="12"><!-- No Family details --><?=$lables[103]?></td>
                                                </tr>
                                                <?php } else {  foreach($family_info as $row){ ?>
                                                <tr>
                                                    <td><?=$row->fld_customer_no ?></td>
                                                    <td><img width="50px" alt="profile image" src="<?=base_url()?>uploads/<?=$row->fld_customer_photo ?>" /></td>
                                                    <td><?=$row->fld_customer_name ?></td>
                                                    <td><?=$row->fld_customer_type ?></td>
                                                    <td><?=$row->fld_relation ?></td>
                                                    <td><?=$row->fld_customer_nic ?></td>
                                                    <td><?=$row->fld_customer_address ?></td>
                                                    <td><?=$row->fld_customer_tel ?></td>
                                                    
                                                    <td><a href="<?=base_url()?>index.php/Customer_ctrl/edit_customer/<?=$row->fld_customer_no ?>/1" target="_blank" class="btn btn-info btn-mini" role="button"  data-toggle="modal"><i class="icon-edit"></i></a></td>
                                                </tr>
                                                <?php }} ?>
                                               
                                            </tbody>
                                        </table>    
								    </div>
                                    <div id="guranty_for_loan" class="tab-pane">
                                        <table id="guaranty_table" class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th><!-- Customer NO --><?=$lables[86]?></th>
                                                    <th><!-- Customer Name --><?=$lables[31]?></th>
                                                    <th><!-- Loan Number --><?=$lables[87]?></th>
                                                    <th><!-- Loan Name --><?=$lables[88]?></th>
                                                    <th><!-- Balance --><?=$lables[66]?></th>
                                                    <th><!-- Interest --><?=$lables[89]?></th>
                                                    <th><!-- Penalty --><?=$lables[70]?></th>
                                                    <th><!-- Pass Due --><?=$lables[69]?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(sizeof($gur_loans)==0){ ?>
                                                <tr id="no_guar_data">
                                                    <td colspan="8">No Guaranty details</td>
                                                </tr>
                                                <?php } else { 
                                                            foreach($gur_loans as $row){ ?>
                                                                <tr>
                                                                        <td><?=$row->fld_customer_no ?></td>
                                                                        <td><?=$row->fld_customer_name ?></td>
                                                                        <td><?=$row->fld_account_id ?></td>
                                                                        <td><?=$row->fld_glname ?></td>
                                                                        <td><?=$row->fld_interest ?></td>
                                                                        <td><?=$row->fld_penalty ?></td>
                                                                        <td><?=$row->fld_pass_due ?></td>
                                                                </tr>
                                                <?php     }
                                                } ?>
                                            </tbody>
                                        </table>  
                                        
								    </div>
                                    
                                       
                                    <div id="other_data" class="tab-pane">
                                        <?php if ($page==1){?>
                                        <div class="widget-box ">
                                            <div class="widget-header widget-header-small header-color-blue">
                                                <h6>
                                                    <i class="icon-add"></i>
                                                    <!-- Add New Other Data --><?=$lables[91]?>
                                                </h6>
                                                <span class="widget-toolbar">
                                                    <a href="#" data-action="collapse">
                                                        <i class="icon-chevron-up"></i>
                                                    </a>
                                                </span>
                                            </div>
                                            <div class="widget-body">
                                                <div class="widget-main">
                                                    <form class="form-horizontal" action="<?=base_url()?>index.php/Customer_ctrl/add_other/<?=$customer_no ?>" id="validation-form" name="customer_form" method="post">
                                                        <div class="row-fluid">
                                                            <div class="span3">
                                                                <label for="other_name"><!-- Other Data Name --><?=$lables[92]?> </label>
                                                                <select id="other_name" id="other_name" name="other_name" data-placeholder="Select a Data Name...">
                                                                    <option value=""/><!-- Select a Data Name... --><?=$lables[93]?>

                                                                    <?php foreach($others as $row){ ?>
                                                                    <option value="<?=$row->fld_id?>"/><?=$row->fld_other_data_name?>           
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="span3">
                                                                <label for="value"><!-- Value --><?=$lables[94]?></label>
                                                                <input type="text" id="value" name="value"  placeholder="Value"/>
                                                            </div>
                                                        </div>
                                                        <div class="space-6"></div>
                                                        <div class="row-fluid ">
                                                            <button class="btn btn-small btn-success full-right" type="submit"><!-- Add Other Data --><?=$lables[95]?></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }?>
                                        <div class="space"></div>
                                        <?php foreach($other_info as $row){ ?>
                                        
                                        <form class="form-horizontal other_data">
                                            <div class="control-group">
                                                <label class="control-label" for="<?=$row->fld_id?>">
                                                    <?=$row->fld_other_data_name?><span class="red"></span>:
                                                </label>
                                                <div class="controls">
                                                    <input type="text" id="<?=$row->fld_id?>" data-identity="<?=$row->fld_id?>"  placeholder="Enter other data here" value="<?=$row->fld_value?>">
                                                    <button class="btn btn-mini btn-success add_other_data" type="button"><i class="icon-ok"></i></button>
                                                </div>
                                                
                                            </div>
                                        </form>
                                        <?php } ?>
								    </div>
                                    <div id="documents" class="tab-pane">
                                        <?php if ($page==1){?>
                                        <div class="widget-box ">
                                            <div class="widget-header widget-header-small header-color-blue">
                                                <h6>
                                                    <i class="icon-add"></i>
                                                    <!-- Upload New Documents --><?=$lables[96]?>
                                                </h6>
                                                <span class="widget-toolbar">
                                                    <a href="#" data-action="collapse">
                                                        <i class="icon-chevron-up"></i>
                                                    </a>
                                                </span>
                                            </div>
                                            <div class="widget-body">
                                                <div class="widget-main">
                                                    <form class="form-horizontal" action="<?=base_url()?>index.php/Customer_ctrl/add_documents/<?=$customer_no ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                                        <div class="row-fluid">
                                                            <div class="span3">
                                                                <label for="file_name"><!-- Document Name --> <?=$lables[97]?></label>
                                                                <select id="file_name" id="file_name" name="file_name" data-placeholder="Select a Document's Name...">
                                                                    <option value=""/><!-- Select a Document's Name... --><?=$lables[98]?>

                                                                    <?php foreach($documents as $row){ ?>
                                                                    <option value="<?=$row->fld_id?>"/><?=$row->fld_file_name?>           
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="span3">
                                                                <label for="document"><!-- Document --><?=$lables[99]?> </label>
                                                                <input type="file" id="document" name="document"/>
                                                            </div>
                                                        </div>
                                                        <div class="space-6"></div>
                                                        <div class="row-fluid ">
                                                            <button class="btn btn-small btn-success full-right" type="submit"><!-- Upload Document --><?=$lables[100]?></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <div class="space"></div>
                                        <?php foreach($file_info as $row){ ?>
                                        <form class="form-inline" action="<?=base_url()?>index.php/Customer_ctrl/change_documents/<?=$customer_no ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                            <div class="row-fluid">
                                                <div class="span3">
                                                    <lable><?=$row->fld_file_name?>:-<span class="red"></span></lable>
                                                    <a target="_blank" class="" href="<?=base_url()?>uploads/<?=$row->fld_value?>"><!-- View file to click here --><?=$lables[101]?></a>
                                                </div>
                                                <div class="span3">
                                                    <input type="hidden" value="<?=$row->fld_id?>" name="document_id"/>
                                                    <input type="hidden" value="<?=$row->fld_file_id?>" name="document_name"/>
                                                    <input type="file" class="id-input-file-2" name="change_document"/>
                                                    <button type="submit" class="btn btn-success btn-mini">
                                                    <i class="icon-ok bigger-110"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <?php } ?>
								    </div>
                                    <div id="rating" class="tab-pane">
                                        <!-- Ratings --><?=$lables[102]?>
								    </div>
								</div>
				            </div>
                        </div>  
                        <div class="space-6"></div>
                        <div class="space-6"></div>
                        <div class="space-6"></div>
                        <div class="space-6"></div>
                        <div class="space-6"></div>
                    </div>
                </div><!--/.page-content-->
                
            </div><!--/.main-content-->
        </div><!--/.main-container-->

        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
            <i class="icon-double-angle-up icon-only bigger-110"></i>
        </a>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

        <!--<![endif]-->

        <!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

        <!--[if !IE]>-->

        <script type="text/javascript">
            window.jQuery || document.write("<script src='<?php echo base_url(); ?>assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
        </script>

        <!--<![endif]-->

        <!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

        <script type="text/javascript">
            if("ontouchend" in document) document.write("<script src='<?php echo base_url(); ?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
        </script>
        <script src='<?php echo base_url(); ?>assets/js/bootstrap.min.js'></script>

        <!--page specific plugin scripts-->
        
        <script src="<?=base_url(); ?>assets/js/chosen.jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.gritter.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootbox.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.easy-pie-chart.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.hotkeys.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap-wysiwyg.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/date-time/bootstrap-datepicker.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/fuelux/fuelux.spinner.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/x-editable/bootstrap-editable.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/x-editable/ace-editable.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.maskedinput.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/moment.js"></script>
		<!--ace scripts-->

		<script src="<?php echo base_url(); ?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/ace.min.js"></script>

		<!--inline scripts related to this page-->

		<script type="text/javascript">
			$(function() {
                <?php if($page==2){?>
                  $('#branch').prop("disabled",true);
// $('#type').prop("disabled",true);
// $('#name').prop("disabled",true);
// $('#full_name').prop("disabled",true);
// $('#nic').prop("disabled",true);
// $('#address').prop("disabled",true);
// $('#tp').prop("disabled",true);
// $('#email').prop("disabled",true);
// $('#dob').prop("disabled",true);
// $('#passport').prop("disabled",true);
// $('#dl').prop("disabled",true);
// $('#gender').prop("disabled",true);
// $('#occupation').prop("disabled",true);
// $('#blood').prop("disabled",true);
// $('#status').prop("disabled",true);
// $('#fo').prop("disabled",true);
// $('#group').prop("disabled",true);
// $('#center').prop("disabled",true);
// $('#active').prop("disabled",true);
// $('#sumbit').prop("disabled",true);
// $('#cancel').prop("disabled",true);
               <?php }?> 
			    $(".se-pre-con").fadeOut("slow");
                $(".chzn-select").chosen();
                $('.date-picker').datepicker().next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
                <?php if($page==1){?>
				$('#photo').on('click', function(){
					var modal = 
					'<div class="modal hide fade">\
						<div class="modal-header">\
							<button type="button" class="close" data-dismiss="modal">&times;</button>\
							<h4 class="blue">Change Profile Picture</h4>\
						</div>\
						\
						<form class="no-margin" action="<?=base_url()?>index.php/Customer_ctrl/save_image/<?=$customer_no ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">\
						<div class="modal-body">\
							<div class="space-4"></div>\
							<div style="width:75%;margin-left:12%;"><input type="file" name="image" /></div>\
						</div>\
						\
						<div class="modal-footer center">\
							<button type="submit" class="btn btn-small btn-success"><i class="icon-ok"></i> Submit</button>\
							<button type="button" class="btn btn-small" data-dismiss="modal"><i class="icon-remove"></i> Cancel</button>\
						</div>\
						</form>\
					</div>';
					
					
					var modal = $(modal);
					modal.modal("show").on("hidden", function(){
						modal.remove();
					});
			
					var working = false;
			
					var form = modal.find('form:eq(0)');
					var file = form.find('input[type=file]').eq(0);
					file.ace_file_input({
						style:'well',
						btn_choose:'Click to choose new avatar',
						btn_change:null,
						no_icon:'icon-picture',
						thumbnail:'small',
						before_remove: function() {
							//don't remove/reset files while being uploaded
							return !working;
						},
						before_change: function(files, dropped) {
							var file = files[0];
							if(typeof file === "string") {
								//file is just a file name here (in browsers that don't support FileReader API)
								if(! (/\.(jpe?g|png|gif)$/i).test(file) ) return false;
							}
							else {//file is a File object
								var type = $.trim(file.type);
								if( ( type.length > 0 && ! (/^image\/(jpe?g|png|gif)$/i).test(type) )
										|| ( type.length == 0 && ! (/\.(jpe?g|png|gif)$/i).test(file.name) )//for android default browser!
									) return false;
			
								if( file.size > 1100000 ) {//~100Kb
									return false;
								}
							}
			
							return true;
						}
					});
						
				});
                
                $('#signature').on('click', function(){
					var modal = 
					'<div class="modal hide fade">\
						<div class="modal-header">\
							<button type="button" class="close" data-dismiss="modal">&times;</button>\
							<h4 class="blue">Change Signature</h4>\
						</div>\
						\
						<form class="no-margin" action="<?=base_url()?>index.php/Customer_ctrl/save_signature/<?=$customer_no ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">\
						<div class="modal-body">\
							<div class="space-4"></div>\
							<div style="width:75%;margin-left:12%;"><input type="file" name="image" /></div>\
						</div>\
						\
						<div class="modal-footer center">\
							<button type="submit" class="btn btn-small btn-success"><i class="icon-ok"></i> Submit</button>\
							<button type="button" class="btn btn-small" data-dismiss="modal"><i class="icon-remove"></i> Cancel</button>\
						</div>\
						</form>\
					</div>';
					
					
					var modal = $(modal);
					modal.modal("show").on("hidden", function(){
						modal.remove();
					});
			
					var working = false;
			
					var form = modal.find('form:eq(0)');
					var file = form.find('input[type=file]').eq(0);
					file.ace_file_input({
						style:'well',
						btn_choose:'Click to choose new avatar',
						btn_change:null,
						no_icon:'icon-picture',
						thumbnail:'small',
						before_remove: function() {
							//don't remove/reset files while being uploaded
							return !working;
						},
						before_change: function(files, dropped) {
							var file = files[0];
							if(typeof file === "string") {
								//file is just a file name here (in browsers that don't support FileReader API)
								if(! (/\.(jpe?g|png|gif)$/i).test(file) ) return false;
							}
							else {//file is a File object
								var type = $.trim(file.type);
								if( ( type.length > 0 && ! (/^image\/(jpe?g|png|gif)$/i).test(type) )
										|| ( type.length == 0 && ! (/\.(jpe?g|png|gif)$/i).test(file.name) )//for android default browser!
									) return false;
			
								if( file.size > 1100000 ) {//~100Kb
                                    
									return false;
								}
							}
			
							return true;
						}
					});
				
				});
                
                $(document).on("click",".add_other_data",function(){
                    var value=$(this).closest("form").find('input').val();
                    var id=$(this).closest("form").find('input').data('identity');
                    $.ajax({
                            type: 'POST',
                            url:'<?=base_url();?>index.php/Customer_ctrl/update_other',
                            dataType: 'json',
                            beforeSend: function() {
                                $(".se-pre-con").fadeIn("slow");
                            },
                            complete: function() {
                                $(".se-pre-con").fadeOut("slow");
                            },
                            data:{'value':value,'id':id},
                            success: function(response){
                                alert("Successfully Updated.")
                                
                            },
                            error: function(e){
                                 alert("Something wrong please try again..")
                               console.log(e);
                            }
                    });    
                });
                
                $(document).on("change","#branch",function(){
                    var branch = $(this).val();
            
                    $.ajax({
                            type: 'POST',
                            url:'<?=base_url();?>index.php/Customer_ctrl/get_family',
                            dataType: 'json',
                            beforeSend: function() {
                                $(".se-pre-con").fadeIn("slow");
                            },
                            complete: function() {
                                $(".se-pre-con").fadeOut("slow");
                            },
                            data:{'branch':branch},
                            success: function(response){
                                $("#family_name").children('option').remove().trigger("liszt:updated");
                                $("#family_name").append("<option value='0'></option>1");
                                $(response).each(function(index, family) { 
                                    $("#family_name").append("<option value='"+family.fld_customer_no+"'>"+family.fld_customer_no+" - "+family.fld_customer_name+"</option>");
                                });
                                $("#family_name").trigger("liszt:updated");
                            },
                            error: function(e){
                                 alert("Something wrong please try again..")
                               console.log(e);
                            }
                    });    
                });
                <?php }?> 
                $('.id-input-file-1 , .id-input-file-2').ace_file_input({
					no_file:'Change File ...',
					btn_choose:'Change',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false //| true | large
					//whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});
                $('#document').ace_file_input({
					no_file:'Choose File ...',
					btn_choose:'Choose',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false //| true | large
					//whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});
                
                
			});

        $('#all_acc').on('click',function(){

            var customer =$("#customer").val();     
            var all_acc_check  =$("#all_acc").val(); 
            var all_acc = null;

            if ($('#all_acc').is(":checked"))
            {
              all_acc = 1;
            }
            else
            {               
                all_acc =0;
            }



            $("#savings_table tbody").empty();
            $("#loans_table tbody").empty();
            $("#assets_table tbody").empty();
            $("#liabilities_table tbody").empty();

            fetchAcountWithCloseAccountSaving(customer,all_acc);        
            fetchAcountWithCloseAccountLoan(customer,all_acc);        
            fetchAcountWithCloseAccountAssets(customer,all_acc);        
            fetchAcountWithCloseAccountLiabilities(customer,all_acc);        
       });

    function fetchAcountWithCloseAccountSaving(customer,all_acc)
    {
       $.ajax({
           type: 'POST',
           data : {customer:customer,all_acc:all_acc},
           url: '<?php echo base_url(); ?>index.php/Customer_ctrl/fetch_account_with_close_account_saving',
           dataType: 'json',
           success: function(response){  
            $("#savings_table tbody").empty();
           $(response).each(function(index,relatedtjornaldata) 
           {
                $('#savings_table tbody').append("<tr id='no_acc_data'><td style='text-align: center;'>"+relatedtjornaldata.fld_account_id+"</td><td style='text-align: left;'>"+relatedtjornaldata.fld_glname+"</td><td style='text-align: center;'>"+relatedtjornaldata.fld_open_date+"</td><td style='text-align: right;'>"+relatedtjornaldata.fld_balance+"</td><td style='text-align: center;'>"+relatedtjornaldata.fld_last_trans_date+"</td></tr>");
           });
       }
      });

    }

    function fetchAcountWithCloseAccountAssets(customer,all_acc)
    {
       $.ajax({
           type: 'POST',
           data : {customer:customer,all_acc:all_acc},
           url: '<?php echo base_url(); ?>index.php/Customer_ctrl/fetch_account_with_close_account_assets',
           dataType: 'json',
           success: function(response){  
            $("#assets_table tbody").empty();
           $(response).each(function(index,relatedtjornaldata) 
           {
                $('#assets_table tbody').append("<tr id='no_acc_data'><td style='text-align: center;'>"+relatedtjornaldata.fld_account_id+"</td><td style='text-align: left;'>"+relatedtjornaldata.fld_glname+"</td><td style='text-align: center;'>"+relatedtjornaldata.fld_open_date+"</td><td style='text-align: right;'>"+relatedtjornaldata.fld_balance+"</td><td style='text-align: center;'>"+relatedtjornaldata.fld_last_trans_date+"</td></tr>");
           });
       }
      });

    }

     function fetchAcountWithCloseAccountLiabilities(customer,all_acc)
    {
       $.ajax({
           type: 'POST',
           data : {customer:customer,all_acc:all_acc},
           url: '<?php echo base_url(); ?>index.php/Customer_ctrl/fetch_account_with_close_account_liabilities',
           dataType: 'json',
           success: function(response){  
            $("#liabilities_table tbody").empty();
           $(response).each(function(index,relatedtjornaldata) 
           {
                $('#liabilities_table tbody').append("<tr id='no_acc_data'><td style='text-align: center;'>"+relatedtjornaldata.fld_account_id+"</td><td style='text-align: left;'>"+relatedtjornaldata.fld_glname+"</td><td style='text-align: center;'>"+relatedtjornaldata.fld_open_date+"</td><td style='text-align: right;'>"+relatedtjornaldata.fld_balance+"</td><td style='text-align: center;'>"+relatedtjornaldata.fld_last_trans_date+"</td></tr>");
           });
       }
      });

    }

    function fetchAcountWithCloseAccountLoan(customer,all_acc)
    {
       $.ajax({
           type: 'POST',
           data : {customer:customer,all_acc:all_acc},
           url: '<?php echo base_url(); ?>index.php/Customer_ctrl/fetch_account_with_close_account_loan',
           dataType: 'json',
           success: function(response){  
            $("#loans_table tbody").empty();
            $(response).each(function(index,relatedtjornaldata) 
            {
                $('#loans_table tbody').append("<tr id='no_acc_data'><td style='text-align: center;'>"+relatedtjornaldata.fld_account_id+"</td><td style='text-align: left;'>"+relatedtjornaldata.fld_glname+"</td><td style='text-align: center;'>"+relatedtjornaldata.fld_open_date+"</td><td style='text-align: right;'>"+relatedtjornaldata.fld_balance+"</td><td style='text-align: right;'>"+relatedtjornaldata.fld_pass_due+"</td><td style='text-align: right;'>"+relatedtjornaldata.fld_penalty+"</td><td style='text-align: center;'>"+relatedtjornaldata.fld_last_trans_date+"</td></tr>");
           });
        }
      });
    }
		</script>
	</body>
</html>
