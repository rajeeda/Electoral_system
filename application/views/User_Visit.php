<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style type="text/css">
 .chzn-container .chzn-results  {
 /*.chosen-drop .chosen-results {*/
max-height: 90px !important; 
}
</style>
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
						<li class="active">Visit</li>
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
         <div class="row-fluid">
                    <div class="span8">
                    	
                    <div class="row-fluid">
                        <div class="alert alert-block blue ">                           
						<center>
	
                            <i class="icon-user"> </i>
                            <strong>
                                <?=$customer_name;?>
                                
                            </strong> 
						</center>
                        </div>
                                          
                    </div>
                    <?php if(isset($gn_division)){ ?>
                        <div class="row-fluid">
                        <div class="alert alert-block blue ">                           
						<center>
	
                            <i class="icon-user"> </i>
                            <strong>
                                <?=$gn_division;?>
                                
                            </strong> 
						</center>
                        </div>
                                          
                    </div>
                <?php } ?>
            </div>

        </div>
 <form class="form-horizontal" action="" id="sumbit_a_visit" name="sumbit_a_visit" method="post"> 
                <div class="span6" style="text-align: left;"> 
                    <div class="row-fluid">
                        <a href="<?=base_url()?>index.php/User_Visit_Ctrl/add_new_visit" class="btn btn-large btn-info pull-right" id="sumbit" type="submit" >
                                                        <!-- New -->New
                        <i class="icon-refresh"></i>
                    </a>
                    </div>
                    <br>
                    <br>
                	 <div class="row-fluid">
                	 	
                            <div class="control-group" style="text-align: center;">
                                <label class="control-label" for="house_no">
                                House Number <span class="red">*</span>:
                                </label>
                                <div class="controls">
                                    <select  class="chzn-select" id="house_no" name="house_no" 
                                    data-placeholder="">
                                        <option value="" data-total_votes=""/>                                        
                                        <?php foreach($house_list as $ds){ ?>
                                        <option value="<?=$ds->house_id; ?>" data-total_votes="<?=$ds->total_votes; ?>"/>
                                        <?=$ds->house_number;  } ?>
                                    </select>
                                     <?php echo form_error('branch'); ?>
                                </div>  
                            </div>   
                       
                	 </div>
                	 <div class="row-fluid">
                	 	<div class="control-group" style="text-align: center;">
                            <label class="control-label" for="passport">
                            Total votes <span class="red"></span>:
                            </label> 
                            <div class="controls">
                            <input type="text" readonly="" id="total_votes" name="total_votes" placeholder="Total votes " value="<?=set_value('total_votes'); ?>">
                            </div> 
                        </div>
                	 </div>
                	
                	 <div class="row-fluid">
                	 	 <div class="control-group" style="text-align: center;">
                            <label class="control-label" for="passport">
                            potential votes <span class="red"></span>:
                            </label>  
                            <div class="controls">
                            <input type="text" id="potential_votes" name="potential_votes" placeholder="potential votes " value="<?=set_value('potential_votes'); ?>">
                            <?php echo form_error('potential_votes'); ?>
                            </div>     
                        </div>
                	 </div>
					<div class="row-fluid">
                	 	 <div class="control-group" style="text-align: center;">
                            <label class="control-label" for="passport">
                            confirm votes <span class="red"></span>:
                            </label>                         
                            <div class="controls">
                            <input type="text" id="confirm_votes" name="confirm_votes" placeholder="confirm votes " value="<?=set_value('confirm_votes'); ?>">
                            <?php echo form_error('confirm_votes'); ?>
                            </div>
                        </div>
                                               
                	 </div>
                 

                    <div class="row-fluid" style="text-align: center;">
                                                
                    <button class="btn btn-large btn-info center" id="sumbit" type="submit" >
                                                        <!-- Submit -->Submit
                    <i class="icon-refresh"></i>
                    </button>
                                              
                    </div>
                    </div> 
                </form>
                    </div> 
                    <span class="span6"></span> 


				</div><!--/.page-content--> 
			</div><!--/.main-content-->
        <!-- </form> -->

		<!-- 	 <div class="widget-toolbox padding-10 clearfix navbar-fixed-bottom">
                <div class="row-fluid" style="text-align: center;">
                                                
                    <button class="btn btn-large btn-info center" id="sumbit" type="submit" >
                                                        Submit
                    <i class="icon-refresh"></i>
                    </button>
                                              
                    </div>
				</div>
		</div> -->


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
        <script>
            $(document).ready(function() {
                var datetime = null,
                    date = null;

                function update () {
                    date = moment(new Date())
                    datetime.html(date.format('dddd, MMMM Do YYYY, h:mm:ss a'));
                };

                $(".chzn-select").chosen();

                    datetime = $('#datetime')
                    update();
                    setInterval(update, 1000);  


                $('#sumbit_a_visit').validate({
                    errorElement: 'span',
                    errorClass: 'help-inline row-fluid',
                    focusInvalid: false,
                    rules: {
                        house_no: {
                            required: true,
                        },
                        potential_votes: {
                            required: true,
                        },
                        confirm_votes: {
                            required: true,
                        },
                    },
            
                    messages: {
                       
                        house_no: {
                            required: "value is required",
                            },
                        potential_votes: {
                            required: "value is required",
                            },
                        confirm_votes: {
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
                       sumbit_visit_form(); 
                    },
                    invalidHandler: function (form) {
                    }
                });  

                $('#house_no').on('change',function(){
                 var total_votes= $('#house_no option:selected').data('total_votes'); 
                 $('#total_votes').val(total_votes);
                });

              
            });

            function sumbit_visit_form(){
                    alert("in");
                    var house_no              = $('#house_no').val();  
                    var potential_votes              = $('#potential_votes').val();  
                    var confirm_votes                = $('#confirm_votes').val();  
    

                    //add data through ajax//
                       $.ajax({
                            type: 'POST',
                            url:'<?=base_url();?>index.php/User_Visit_Ctrl/sumbit_visit_form',
                            dataType: 'json',
                            data:{
                            'house_no':house_no,
                            'potential_votes':potential_votes,
                            'confirm_votes':confirm_votes
                            },
                            beforeSend: function() {
                                $(".se-pre-con").fadeIn("slow");
                            },
                            complete: function() {
                                $(".se-pre-con").fadeOut("slow");
                            },
                            success: function(response){
                                console.log(response)
                               
                                
                                if(response.status==true){
                                  // alert("ok");
                                  swal("Updated!", "successfully saved data!", "success")
                                }
                                else{

                                 
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


                    $('#house_no').val('');  
                    $('#potential_votes').val('');  
                    $('#confirm_votes').val('');  
                    $('#total_votes').val('');  
                     $('#house_no').children('option').first().prop('selected', true).trigger("liszt:updated");
                     

            }




        </script>
	</body>
</html>
