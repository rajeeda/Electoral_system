<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style type="text/css">
 .chzn-container .chzn-results  {
 /*.chosen-drop .chosen-results {*/
max-height: 90px !important; 
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
                    <ul class="breadcrumb">
                        <li>
                            <i class="icon-home home-icon"></i>
                            <a href="#"><?=$text[4];?></a>

                            <span class="divider">
                                <i class="icon-angle-right arrow-icon"></i>
                            </span>
                        </li>
                        <li class="active"> <?=$text[56];?></li>
                    </ul><!--.breadcrumb-->
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
                        <div class="widget-box transparent">
                            <div class="widget-body" >
                                <div id="customer_create_msg"></div>
                                
                                <form class="form-horizontal" action="" id="create_custome" name="create_customer" method="post">
                                    <div class="widget-main">
                                        <div class="row-fluid">
                                                                                                                                       
                                              <div class="control-group" >
                                                    <label class="control-label" for="group">
                                                       Customer Type<span class="red"></span>:
                                                    </label>
                                                    <div class="controls">
                                                        <select  class="chzn-select" id="type" name="type" data-placeholder="">
                                                            <option value=""/>                                                            
                                                             <?php foreach($type as $typ){ ?>
                                                                <option value="<?=$typ->id; ?>"/><?=$typ->fld_cus_type; ?>
                                                            <?php } ?>
                                                        </select>
                                                        <?php echo form_error('branch'); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="honorific">
                                                        <!-- Honorific -->Title<span class="red"></span>:
                                                    </label>
                                                    <div class="controls">
                                                        <select  class="chzn-select input-mini" id="honorific" name="honorific" data-placeholder="">
                                                             <option value=""/>
                                                             <option value=""/>Mr
                                                             <option value=""/>Mrs
                                                             <option value=""/>Ms
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="control-group">

                                                    
                                                    <label class="control-label" for="name">
                                                        <!-- Name -->Name<span class="red">*</span>:
                                                        
                                                    </label>
                                                    <div class="controls">
                                                        
                                                        <input type="text" id="name" name="name" placeholder="Name with initials" value="<?=set_value('name'); ?>">
                                                        
                                                        <?php echo form_error('name'); ?>
                                                        <div><small class="text-info">Name should be this format (ABC Example)</small></div>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="full_name">
                                                        Full Name <span class="red">*</span>:
                                                    </label>
                                                    <div class="controls">
                                                        <input type="text" id="full_name" name="full_name" placeholder="Full name" value="<?=set_value('full_name'); ?>"/>
                                                        <?php echo form_error('full_name'); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="nic">
                                                        NIC<span class="red">*</span>:
                                                    </label>
                                                    <div class="controls">
                                                        <input type="text" id="nic" name="nic" placeholder="NIC Number" value="<?=set_value('nic'); ?>">
                                                        <?php echo form_error('nic'); ?>
                                                        <div><small class="text-info">NIC should be this format (123456789V or 123456789012)</small></div>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="address">
                                                        Address<span class="red">*</span>:
                                                    </label>
                                                    <div class="controls">
                                                        <input type="text" id="address" name="address" placeholder="Address" value="<?=set_value('address'); ?>">
                                                        <?php echo form_error('address'); ?>
                                                    </div>
                                                </div>

                                                






                                                <div class="control-group">
                                                    <label class="control-label" for="tp">
                                                        Telephone <span class="red"></span>:
                                                    </label>
                                                    <div class="controls">
                                                        <input type="text" id="tp" name="tp" placeholder="Tele-Phone Number" value="<?=set_value('tp'); ?>">
                                                        <?php //echo form_error('tp'); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="email">
                                                         Email <span class="red"></span>:
                                                    </label>
                                                    <div class="controls">
                                                        <input type="text" id="email" name="email" placeholder="Email Address" value="<?=set_value('email'); ?>">
                                                        <?php //echo form_error('email'); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="gender">
                                                         Gender <span class="red">*</span>:
                                                    </label>
                                                    <div class="controls">
                                                        <select  class="chzn-select" id="gender" name="gender" data-placeholder="">
                                                            <option value=""/>
                                                            <option value="No"/> No Gender 
                                                            <option value="Male"/> Male 
                                                            <option value="Female"/> Female 
                                                        </select>
                                                        <?php echo form_error('gender'); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="dob">
                                                         Date Of Birth <span class="red"></span>:
                                                    </label>
                                                    <div class="controls">
                                                        <input type="text" class="date-picker" id="dob" name="dob"  data-date-format="yyyy-mm-dd" placeholder="Date Of Birth" value="<?=set_value('dob'); ?>">
                                                        <?php echo form_error('dob'); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="passport">
                                                         Passport <span class="red"></span>:
                                                    </label>
                                                    <div class="controls">
                                                        <input type="text" id="passport" name="passport" placeholder="Passport Number" value="<?=set_value('passport'); ?>">
                                                        <?php echo form_error('passport'); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="dl">
                                                         Driving License <span class="red"></span>:
                                                    </label>
                                                    <div class="controls">
                                                        <input type="text" id="dl" name="dl" placeholder="Driving License Number" value="<?=set_value('dl'); ?>">
                                                        <?php echo form_error('dl'); ?>
                                                    </div>
                                                </div>
                                                
                                                <div class="control-group">
                                                    <label class="control-label" for="occupation">
                                                        Occupation <span class="red"></span>:
                                                    </label>
                                                    <div class="controls">
                                                        <input type="text" id="occupation" name="occupation" placeholder="Occupation" value="<?=set_value('occupation'); ?>">
                                                        <?php echo form_error('occupation'); ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="blood">
                                                        Blood Group <span class="red"></span>:
                                                    </label>
                                                    <div class="controls">
                                                        <input type="text" id="blood" name="blood" placeholder="Blood Group" value="<?=set_value('blood'); ?>">
                                                        <?php echo form_error('branch'); ?>
                                                    </div>
                                                </div>
                                              
                                                
                                    <div class="control-group" id="el_div">
                                    <label class="control-label" for="group">
                                    Electoral Division<span class="red"></span>:
                                    </label>
                                    <div class="controls">
                                        <select  class="chzn-select" id="electoral_division" name="electoral_division" data-placeholder="">
                                            <option value=""/>                                                            
                                            <?php foreach($elect_division as $ds){ ?>
                                            <option value="<?=$ds->electoral_division_id; ?>"/><?=$ds->name; ?>
                                                            <?php } ?>
                                        </select>
                                                        <?php echo form_error('branch'); ?>
                                    </div>
                                    </div>      
                                             
                                             
                                        <div class="control-group" id="ds_div">
                                        <label class="control-label" for="group">
                                            DS Division<span class="red"></span>:
                                        </label>
                                        <div class="controls">
                                            <select  class="chzn-select" id="ds_division" name="ds_division" data-placeholder="">
                                                <option value=""/>                                                            
                                                 <?php foreach($ds_division as $ds){ ?>
                                                                <option value="<?=$ds->fld_id; ?>"/><?=$ds->fld_division; ?>
                                                            <?php } ?>
                                            </select>
                                                        <?php echo form_error('branch'); ?>
                                        </div>
                                        </div> 
                                                <div class="control-group" id="gn_div">
                                                    <label class="control-label" for="group">
                                                        GN Division<span class="red"></span>:
                                                    </label>
                                                    <div class="controls">
                                                        <select  class="chzn-select" id="gn_division" name="gn_division" data-placeholder="">
                                                            <option value=""/>                                                                                                                    
                                                        </select>
                                                        <?php echo form_error('branch'); ?>
                                                    </div>
                                                </div>                                                
                                                                                       
                                                <div class="control-group">
                                                    <label class="control-label" for="active">
                                                        Active<span class="red">*</span>:
                                                    </label>
                                                    <div class="controls">
                                                        <select  class="chzn-select" id="active" name="active" data-placeholder="">
                                                            <option value="1"/>Active
                                                            <option value="0"/>Deactive
                                                        </select>
                                                        <?php echo form_error('branch'); ?>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="space"></div>
                                    <div class="space"></div>
                                    <div class="space"></div>
                                    <div class="space"></div>
                                    <div class="space"></div>
                                    <div class="widget-toolbox padding-10 clearfix navbar-fixed-bottom">
                                            <div class="row-fluid">
                                                
                                                <button class="btn btn-small btn-success pull-right" id="sumbit" type="submit" >
                                                        <!-- Save -->Save
                                                        <i class="icon-save"></i>
                                                </button>
                                                <span id="print_name3">
                                                <a class="btn btn-small btn-warning pull-right" id="cancel" href="<?=base_url()?>index.php/Customer_create_ctrl">
                                                        <i class="icon-remove"></i>
                                                        <!-- Cancel -->Cancel
                                                </a>
                                                </span>
                                            </div>
								        </div><!--/widget-footer-->
                                </form>
                            </div>
                        </div>
                    </div><!--/.row-fluid-->
                </div><!--/.page-content-->
            </div><!--/.main-content-->
        </div><!--/.main-container-->

        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
            <i class="icon-double-angle-up icon-only bigger-110"></i>
        </a>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript">
            window.jQuery || document.write("<script src='<?php echo base_url(); ?>assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
        </script>

        <script type="text/javascript">
            if("ontouchend" in document) document.write("<script src='<?php echo base_url(); ?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
        </script>
        <script src='<?php echo base_url(); ?>assets/js/bootstrap.min.js'></script>

        <!--page specific plugin scripts-->
        
        <script src="<?=base_url(); ?>assets/js/chosen.jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.ui.touch-punch.min.js"></script>
        <script src="<?=base_url(); ?>assets/js/jquery.validate.min.js"></script>
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
                if(window.ActiveXObject || "ActiveXObject" in window){
                    $('body').prepend('<div class="alert alert-block alert-danger"><button type="button" class="close red" data-dismiss="alert">close</button>You are using an &nbsp;<strong class="red">unsupported browser or your browser</strong> might be in the Compatibility View mode...</div>') ;    
                }
                
                var datetime = null,
                    date = null;

                function update () {
                    date = moment(new Date())
                    datetime.html(date.format('dddd, MMMM Do YYYY, h:mm:ss a'));
                };

                    datetime = $('#datetime')
                    update();
                    setInterval(update, 1000);
			    $(".se-pre-con").fadeOut("slow");
                $(".chzn-select").chosen();
                $('.date-picker').datepicker().next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
				//////validation ///////
				$('#create_custome').validate({
                    errorElement: 'span',
                    errorClass: 'help-inline row-fluid',
                    focusInvalid: false,
                    rules: {
                     
                        type: {
                            required: true,
                        },
						name: {
                            required: true,
                        },
						full_name: {
                            required: true,
                        },
						nic: {
                            required: function(element){
                                if($('#type').val()=='Children Member' || $('#type').val()=='Group' || $('#type').val()=='Center' || $('#type').val()=='Institiut'){
                                   // console.log($('#type').val());
                                    return false;
                                }else{
                                   // console.log($('#type').val());
                                    return true;
                                }
                            },
                             remote: {
                                url: "Customer_create_ctrl/check_nic_no",
                                type: "post",
                                data: {
                                  nic: function() {
                                    return $( "#nic" ).val();
                                  }
                                },
                                error: function(e){
                                   console.log(e)
                                }
                            } 
                        },
                        address: {
                            required: true,
                        },
						gender: {
                            required: true,
                        },
						active: {
                            required: true,
                        },
                    },
            
                    messages: {
                       
                        type: {
                            required: "value is required",
                            },
					    name: {
                            required: "value is required",
                            },
				 full_name: {
                            required: "value is required",
                            },
						nic: {
                            required: "value is required",
                            remote : "NIC No already Exist",
                            },
					address: {
                            required: "value is required",
                            },
					 gender: {
                            required: "value is required",
                            },	
					active: {
                            required: "value is required",
                            },									
                                                                      
                    },
                    invalidHandler: function (event, validator) { //display error alert on form submit   
                        $('.alert-error', $('.login-form')).show();
                    },
            
                    highlight: function (e) {
                        $(e).closest('.control-group').removeClass('success').addClass('error');
                    },
            
                    success: function (e) {
                        $(e).closest('.control-group').removeClass('error').addClass('success');
                        $(e).remove();
                    },
            
                    errorPlacement: function (error, element) {
                        if(element.is(':checkbox') || element.is(':radio')) {
                            var controls = element.closest('.controls');
                            if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
                            else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
                        }
                        else if(element.is('.select2')) {
                            error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
                        }
                        else if(element.is('.chzn-select')) {
                            error.insertAfter(element.siblings('[class*="chzn-container"]:eq(0)'));
                        }
                        else error.insertAfter(element);
                    },
            
                    submitHandler: function (form) {
                       create_new_customer(); 
                    },
                    invalidHandler: function (form) {
                    }
                });

				/////end validation ////
                function create_new_customer(){
                    alert("in");
                    var name                   = $('#name').val(); 
                    var honorific              = $('#honorific').val();  
                    var full_name              = $('#full_name').val();  
                    var address                = $('#address').val();  
                    var nic                    = $('#nic').val();  
                    var tp                     = $('#tp').val();  
                    var email                  = $('#email').val();  
                    var gender                 = $('#gender').val();  
                    var blood                  = $('#blood').val();  
                    var active                 = $('#active').val();  
                    var dl                     = $('#dl').val();  
                    var dob                    = $('#dob').val();  
                    var passport               = $('#passport').val(); 
                    var occupation             = $('#occupation').val();  
                    var gn_division            = $('#gn_division').val();
                    var electoral_division     = $('#electoral_division').val();
                    var ds_division            = $('#ds_division').val();
                    var type                   = $('#type').val();

					//add data through ajax//
					   $.ajax({
                            type: 'POST',
                            url:'<?=base_url();?>index.php/Customer_create_ctrl/add_new_customer2',
                            dataType: 'json',
                            data:{
                            'name':name,
                            'type':type,
                            'honorific':honorific,
                            'full_name':full_name,
                            'address':address,
                            'nic':nic,
                            'tp':tp,
                            'email':email,
                            'gender':gender,
                            'blood':blood,
                            'active':active,
                            'dl':dl,
                            'dob':dob,
                            'passport':passport,
                            'occupation':occupation,
                            'electoral_division':electoral_division,
                            'gn_division':gn_division,
                            'ds_division':ds_division},
                            beforeSend: function() {
                                $(".se-pre-con").fadeIn("slow");
                            },
                            complete: function() {
                                $(".se-pre-con").fadeOut("slow");
                            },
                            success: function(response){
							    console.log(response)
                                console.log(response.status)
								console.log(response.message)
								console.log(response.cus_no)
								
								if(response.status==true){
								  $('#customer_create_msg').append("<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><i class='icon-ok'></i><strong>"+response.message+"</strong><div class='space'></div><div><i class='icon-link'></i><a href='<?=base_url()?>index.php/Customer_ctrl/edit_customer/"+response.cus_no+"/1'><span class='info'>Add more details for this customer please click here..</span></a></div></div>");
								}
								else{
								  $('#customer_create_msg').append("<div class='alert alert-block alert-error'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><i class='icon-alert'></i><strong>"+response.message+"</strong></div>");
								}
								clear_form();
                            },
                            error: function(e){
                                console.log(e);
								clear_form();
                            }
                    }); 
					//ending add data through ajax //
				}
				
				function clear_form(){


				    $('#name').val(''); 
					$('#honorific').val('');  
					$('#full_name').val('');  
					$('#address').val('');  
					$('#nic').val('');  
					$('#tp').val('');  
					$('#email').val('');  
					
					$('#gender').val('');
					$('#blood').val('');  
										
					$('#type').val('');
					
					$('#active').val('');  
					$('#dl').val('');  
					$('#dob').val('');  
					$('#passport').val(''); 
					$('#occupation').val('');  

				}
				
               

                $("#ds_division").on("change",function(){
                    var ds_id=$(this).val();
                    get_gnList(ds_id);
                });
                
                
                
                $('#nic').on('change' ,function () {
                    var mem_nic_set="";
                    var mem_nic1=$(this).val().length;
                    var nic=$(this).val();
                    var month = ['31', '29', '31', '30', '31', '30', '31', '31', '30', '31', '30', '31'];
                    if(mem_nic1==10){
                        var mem_nic3=nic.toString().substr(0, 2);
                        var mem_nic4=nic.toString().substr(2, 3);
                        var mem_nic5= parseInt(mem_nic4);
                        if(mem_nic5>500){
                            var mem_nic5=mem_nic5-500;
                        }
                        var mo = 0;
                        var da = 0;
                        for (var i = 0; i < month.length; i++) {
                            if (mem_nic5 < month[i]) {
                                mo = i + 1;
                                da = mem_nic5;
                                if(mem_nic5==0){
                                    mo = i;
                                    mem_nic5 = month[i-1];
                                }
                                break;
                            } else {
                                mem_nic5 = mem_nic5 - month[i];
                            }
                        }
                        mem_nic3="19"+mem_nic3;
                        mem_nic_set=(mem_nic3+"-"+mo+"-"+mem_nic5);
                    }
                    else if(mem_nic1==12){
                        var mem_nic3=nic.toString().toString().substr(0, 4);
                        var mem_nic4=nic.toString().toString().substr(4, 3);
                        var mem_nic5= parseInt(mem_nic4);
                        if(mem_nic5>500){
                            var mem_nic5=mem_nic5-500;
                        }
                        var mo = 0;
                        var da = 0;
                        for (var i = 0; i < month.length; i++) {
                            if (mem_nic5 < month[i]) {
                                mo = i + 1;
                                da = mem_nic5;
                                if(mem_nic5==0){
                                    mo = i;
                                    mem_nic5 = month[i-1];
                                }
                                break;
                            } else {
                                mem_nic5 = mem_nic5 - month[i];
                            }
                        }
                        mem_nic_set=(mem_nic3+"-"+mo+"-"+mem_nic5);
                    }          
                    $("#dob").val(mem_nic_set);    
                });
                
			});



function get_dsList(branch){

                    $('#ds_division option').remove().trigger("liszt:updated");
                    $('#ds_division').append('<option val=""> </option>').trigger("liszt:updated");
                    $('#gn_division option').remove().trigger("liszt:updated");
                    $('#gn_division').append('<option val=""> </option>').trigger("liszt:updated");
                    $.ajax({
                            type: 'POST',
                            url:'<?=base_url();?>index.php/Customer_create_ctrl/get_ds_division',
                            dataType: 'json',
                            data:{'branch':branch},
                            beforeSend: function() {
                                $(".se-pre-con").fadeIn("slow");
                            },
                            complete: function() {
                                $(".se-pre-con").fadeOut("slow");
                            },
                            success: function(response){
                                
                                $(response).each(function(index, ds) { 
                                    $('#ds_division').append("<option value='"+ds.fld_id+"'>"+ds.fld_division+" </option>");
                                });
                                $('#ds_division').trigger("liszt:updated");
                            },
                            error: function(e){
                               console.log(e);
                            }
                            
                    });
}

function get_gnList(ds_id){

                    $('#gn_division option').remove().trigger("liszt:updated");
                    $('#gn_division').append('<option val=""> </option>').trigger("liszt:updated");
                    $.ajax({
                            type: 'POST',
                            url:'<?=base_url();?>index.php/Customer_create_ctrl/get_gn_division',
                            dataType: 'json',
                            data:{'ds_id':ds_id},
                            beforeSend: function() {
                                $(".se-pre-con").fadeIn("slow");
                            },
                            complete: function() {
                                $(".se-pre-con").fadeOut("slow");
                            },
                            success: function(response){
                                
                                $(response).each(function(index, gn) { 
                                    $('#gn_division').append("<option value='"+gn.fld_id+"'>"+gn.fld_division+" </option>");
                                });
                                $('#gn_division').trigger("liszt:updated");
                            },
                            error: function(e){
                               console.log(e);
                            }
                            
                    });
}

function get_foList(branch){
                $('#fo option').remove().trigger("liszt:updated");
                $('#fo').append('<option val=""> </option>').trigger("liszt:updated");
                    $.ajax({
                            type: 'POST',
                            url:'<?=base_url();?>index.php/Customer_create_ctrl/get_branch_fo',
                            dataType: 'json',
                            data:{'branch':branch},
                            beforeSend: function() {
                                $(".se-pre-con").fadeIn("slow");
                            },
                            complete: function() {
                                $(".se-pre-con").fadeOut("slow");
                            },
                            success: function(response){
                                console.log(response)
                                $(response).each(function(index, customer) { 
                                    $('#fo').append("<option value='"+customer.fld_customer_no+"'>"+customer.fld_customer_no+"-"+customer.fld_customer_name+" </option>");
                                });
                                $('#fo').trigger("liszt:updated");
                            },
                            error: function(e){
                               console.log(e);
                            }
                            
                });   

}
		</script>
	</body>
</html>
