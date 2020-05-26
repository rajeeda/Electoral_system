<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Colombo');
$today=date("Y-m-d");
?>


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
                            <!--home--><?=$text[4];?>

                            <span class="divider">
                                <i class="icon-angle-right arrow-icon"></i>
                            </span>
                        </li>
                        <li class="active"><!--reciept-->Listing</li>
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
                                    <a href="<?=base_url();?>index.php/Customer_listing_ctrl/chanege_language/<?=$language->fld_language_id;?>" ><?=$language->fld_language;?></a>
                                </li>
                                <?php } ?>

                            </ul>
                       </div>
                    </div><!--#nav-search-->
                    
                    
                </div>

                <div class="page-content">
                    <div class="page-header position-relative">
                        <h1>
                            <!--reciept-->
                            Listing
                            <small>
                                <i class="icon-double-angle-right"></i> Customer Listing
                                <!--new reciept-->
                               
                            </small>
                        </h1>
                    
                        
                    </div><!--/.page-header-->
                    <!---->
                    <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/Customer_listing_ctrl/get_all_customers" method="post" id="frm2" target="_blank">
                                <div class="control-group">
                                  <div class="span9">
                                    <div class="span4">
                                    <label class="control-label" for="form-field-1"><!--Account Name-->Branch :</label>

                                    <div class="controls">
                                        <input type="hidden" name="curdate" id="curdate" value="<?php echo date("Y-m-d");?>">
                                        <select  class="chzn-select" id="branch" name="branch" data-placeholder="">
                                                                <option value="" data-text="All Branches"/>All Branches
                                                                <?php foreach($branch as $branchs){ ?>
                                                                    <option value="<?=$branchs->fld_branch_id ;?>" data-text="<?=$branchs->fld_branch_name ?>"/> <?=$branchs->fld_branch_name ;?>
                                                                <?php } ?>

                                                            </select>
                                    </div>
                                  </div>  
                                      
                                      
                                      <div class="span4">
                                    <label class="control-label" for="form-field-1"><!--Account Name-->Field Officer :</label>

                                    <div class="controls">
                                        <select  class="chzn-select" id="fofficer" name="fofficer" data-placeholder="">
                                                                <option value="" data-text="All Field Officers"/>All Field Officers
                                                                <?php 
                                                                foreach($fo as $fos){
                                                                ?>
                                                                <option value="<?=$fos->fld_customer_no ?>" data-text="<?=$fos->fld_customer_name ?>"/><?=$fos->fld_customer_name ?>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                    </div>
                                  </div>  
                                  
                                 </div>
                                </div>

                                <div class="control-group">
                                  <div class="span9">
                                    <div class="span4">
                                    <label class="control-label" for="form-field-1"><!--Center Name-->Center :</label>

                                    <div class="controls">
                                        <select  class="chzn-select" id="focenter" name="focenter" data-placeholder="">
                                                                <option value="" data-text="All Centers"/>All Centers
                                                                <?php foreach($center as $centers){ ?>
                                                                    <option value="<?=$centers->fld_customer_no ;?>" data-text="<?=$centers->fld_customer_name ?>"/> <?=$centers->fld_customer_name ;?>
                                                                <?php } ?>
                                                            
                                                            </select>
                                    </div>
                                  </div>  
                                      
                                      
                                      <div class="span4">
                                    <label class="control-label" for="form-field-1"><!--Group Name-->Group :</label>

                                    <div class="controls">
                                        <select  class="chzn-select" id="group" name="group" data-placeholder="">
                                                                <option value="" data-text="All Groups"/>All Groups
                                                                <?php foreach($groups as $groupss){ ?>
                                                                    <option value="<?=$groupss->fld_customer_no ;?>" data-text="<?=$groupss->fld_customer_name ?>"/> <?=$groupss->fld_customer_name ;?>
                                                                <?php } ?>
                                                            </select>
                                    </div>
                                  </div>  
                                  
                                 </div>
                                </div>
                              
                               <div class="control-group">
                                  <div class="span9">
                                    <div class="span6">
                                    

                                    <div class="controls">
                                        <a href="#modal-table" role="button" class="green" data-toggle="modal">
                                                 <button class="btn btn-mini btn-info" href="#modal-table" id="search">
                                                <?php //echo $lables[5];?>Search
                                                  <i class="icon-search icon-on-right bigger-110"></i>
                                                 </button></a>
                                            <a href="#modal-table" role="button" class="green" data-toggle="modal">
                                                 <button class="btn btn-mini btn-info" href="#modal-table" id="reset">
                                                <?php echo "Reset";?>
                                                  <i class="icon-refresh icon-on-right bigger-110"></i>
                                                 </button></a>    
                                    </div>
                                  </div>  
                                  <span class="red" id="errmsg"></span>
                                   </div>
                                   </div>
                             
                                  
                              
                                                    <div class="hr hr8 hr-double hr-dotted"></div>

                           
                    <div id="image">
                      <center><img src="<?=base_url();?>assets/img/preloader.gif" /></center>
                    </div>  
                                
                              <!--////////////////////////////////////////////////////////////////////////////////-->
                        <!--    <input type="submit"> -->
                         </form>
                    
                    <!---->
                    <div class="row-fluid">
                            <div class="widget-box transparent">
                                <div class="widget-header-blue">
                                    <!---->
                                    <div class="span12">
                                    <div class="row-fluid">
                                     
                                     <div class="row-fluid">
                                
                                <div class="table-header">
                                    <i class="icon-double-angle-right"></i></span>
                                </div>

                                 <table class="table table-striped table-bordered table-hover" id="sample_table_1">
                                                            <thead>
                                                                <tr>
                                                                    
                                                                    <th>Customer No</th>
                                                                    <th>Name</th>
                                                                    <th>Address</th>
                                                                    <th>NIC No</th>
                                                                    <th>Telephone </th>
                                                                    <th>Join date</th>
                                                                    <th>Sex</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody id="journallisting">
                                                             
                                                            </tbody>
                                                               
                                                        </table>
                            </div>
                                                                                                           
                                   
                                              </div> 
                                           </div>            
                                    <!---->
                                    
                                           
                                </div>

                                <div class="widget-body">
                                   
                                </div><!--/widget-body-->
                            </div><!--/widget-box-->
                    </div> <!--row-fluid-->
                    <div id="modal-form" class="modal hide" tabindex="-1">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="blue bigger"><?= $lables[17];?></h4>
                        </div>

                   

                    <div class="modal-footer" id="model_action">
                        <button class="btn btn-mini btn-warning" data-dismiss="modal">
                            <i class="icon-remove"></i>
                            <?=$lables[12];?>
                        </button>

                        <button class="btn btn-mini btn-success" data-dismiss="modal" id="add_customer"  disabled>
                            <i class="icon-ok"></i>
                            <?=$lables[18];?>
                        </button>
                    </div>
                </div>
                </div><!--/.page-content-->
            </div><!--/.main-content-->
        </div><!--/.main-container-->

        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
            <i class="icon-double-angle-up icon-only bigger-110"></i>
        </a>

        <!--basic scripts-->

        <!--[if !IE]>-->


        

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
        
        
    
        <!--[if lte IE 8]>
          <script src="assets/js/excanvas.min.js"></script>
        <![endif]-->

        

        <!--ace scripts-->

        <!--ace scripts-->

        <script src=<?=base_url('assets/js/ace-elements.min.js');?>></script>
        <script src=<?=base_url('assets/js/ace.min.js');?>></script>
        
    
        <!--page spesific-->
        
        <script src="<?=base_url(); ?>assets/js/fuelux/fuelux.wizard.min.js"></script>
        <script src="<?=base_url(); ?>assets/js/jquery.validate.min.js"></script>
        <script src="<?=base_url(); ?>assets/js/additional-methods.min.js"></script>
        <script src="<?=base_url(); ?>assets/js/bootbox.min.js"></script>
        <script src="<?=base_url(); ?>assets/js/jquery.maskedinput.min.js"></script>
        <script src="<?=base_url(); ?>assets/js/select2.min.js"></script>
        <script src="<?=base_url(); ?>assets/js/date-time/bootstrap-datepicker.min.js"></script>
        <script src="<?=base_url(); ?>assets/js/jquery.autosize-min.js"></script>
        <script src="<?=base_url(); ?>assets/js/jquery.inputlimiter.1.3.1.min.js"></script>
        <script src="<?=base_url(); ?>assets/js/bootstrap-tag.min.js"></script>
        <script src="<?=base_url(); ?>assets/js/chosen.jquery.min.js"></script>
        <script src=<?=base_url('assets/js/jquery.price_format.2.0.min.js');?>></script>
        <script src=<?=base_url('assets/js/jquery.slimscroll.min.js');?>></script>
        <script src="<?=base_url(); ?>assets/js/jquery.gritter.min.js"></script>
        <script src="<?=base_url(); ?>assets/js/angular.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/dataTables.tableTools.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/moment.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#branch').find('option[value=<?=$branch_id?>]').prop('selected', true).trigger("liszt:updated");
                $("#statuss").hide();
                $("#image").fadeOut();
                var datetime = null,
                    date = null;
                $(".chzn-select").chosen();
                function update () {
                    date = moment(new Date())
                    datetime.html(date.format('dddd, MMMM Do YYYY, h:mm:ss a'));
                };

                    datetime = $('#datetime')
                    update();
                    setInterval(update, 1000);
                
                
                get_loan_list();
                  
                //
                

                //
                // if browser is ie display message..
               // $('.date-picker').datepicker();
                var today = $("#today").val();
                $('.date-picker').datepicker({ endDate: today});
                if(window.ActiveXObject || "ActiveXObject" in window){
                    $('body').prepend('<div class="alert alert-block alert-danger"><button type="button" class="close red" data-dismiss="alert">close</button>You are using an &nbsp;<strong class="red">unsupported browser or your browser</strong> might be in the Compatibility View mode...</div>') ;    
                }
                
             
               
                
        $('#branch').change(function (){
            var branch = $("#branch").val();
            
            $('#fofficer').html('');
            if (branch==''){

                $('#fofficer').children('option').remove().trigger("liszt:updated");
                $('#focenter').children('option').remove().trigger("liszt:updated");
                $('#group').children('option').remove().trigger("liszt:updated");

                $('#fofficer').append("<option value=''>All Field Officers</option>"); 
                $('#focenter').append("<option value=''>All Center</option>");
                $('#group').append("<option value=''>All Groups</option>");

                <?php foreach($fo as $fo){ ?>
                $('#fofficer').append("<option value='<?=$fo->fld_customer_no;?> '><?=$fo->fld_customer_name;?></option>");                              
                <?php } ?>
                $('#fofficer').trigger("liszt:updated");

                <?php foreach($center as $centers){ ?>
                $('#focenter').append("<option value='<?=$centers->fld_customer_no;?> '><?=$centers->fld_customer_name;?></option>");                              
                <?php } ?>
                $('#focenter').trigger("liszt:updated");

                <?php foreach($groups as $groupsss){ ?>
                $('#group').append("<option value='<?=$groupsss->fld_customer_no;?> '><?=$groupsss->fld_customer_name;?></option>");                              
                <?php } ?>
                $('#group').trigger("liszt:updated");

            }else{
               $.ajax({
                         type: 'POST',
                         data: {branch:branch},
                          url: '<?php echo base_url(); ?>index.php/Customer_listing_ctrl/get_branch_rel_center',
                     dataType: 'json',
                      success: function(response){
                        $('#focenter').children('option').remove().trigger("liszt:updated");
                        $('#focenter').append("<option value='' >All Centers</option>");  
                          
                      
                          if(response=='no_data')
                              {
                                 $('#focenter').append("<option value=''></option>");
                              }
                          else
                             {
                                $('#focenter').append("<option value=''></option>");
                          $(response).each(function(index, branch_rel) { 
                                
                                $('#focenter').append("<option value='"+branch_rel.fld_customer_no+"' data-text="+branch_rel.fld_customer_name+" >"+branch_rel.fld_customer_name+"</option>");                              
                             });
                             }
                    $('#focenter').trigger("liszt:updated");
                  
                      }
             });
                $.ajax({
                         type: 'POST',
                         data: {branch:branch},
                          url: '<?php echo base_url(); ?>index.php/Customer_listing_ctrl/get_branch_rel_fo',
                     dataType: 'json',
                      success: function(response){
                        $('#fofficer').children('option').remove().trigger("liszt:updated");
                        $('#fofficer').append("<option value='' >All Field Officers</option>");  
                          
                      
                          if(response=='no_data')
                              {
                                 $('#fofficer').append("<option value=''></option>");
                              }
                          else
                             {
                                $('#fofficer').append("<option value=''></option>");
                          $(response).each(function(index, branch_rel) { 
                                
                                $('#fofficer').append("<option value='"+branch_rel.fld_customer_no+"' data-text="+branch_rel.fld_customer_name+" >"+branch_rel.fld_customer_name+"</option>");                              
                             });
                             }
                    $('#fofficer').trigger("liszt:updated");
                      }
             });

                $.ajax({
                         type: 'POST',
                         data: {branch:branch},
                          url: '<?php echo base_url(); ?>index.php/Customer_listing_ctrl/get_branch_rel_group',
                     dataType: 'json',
                      success: function(response){
                        $('#group').children('option').remove().trigger("liszt:updated");
                        $('#group').append("<option value='' >All Groups</option>");  
                          
                      
                          if(response=='no_data')
                              {
                                 $('#group').append("<option value=''></option>");
                              }
                          else
                             {
                                $('#group').append("<option value=''></option>");
                          $(response).each(function(index, branch_rel) { 
                                
                                $('#group').append("<option value='"+branch_rel.fld_customer_no+"' data-text="+branch_rel.fld_customer_name+" >"+branch_rel.fld_customer_name+"</option>");                              
                             });
                             }
                    $('#group').trigger("liszt:updated");
                  
                      }
             });


            }
        }); 
        
        $('#fofficer').change(function (){ 
           var fofficer = $('#fofficer').val();

           $('#focenter').html('');
           if (fofficer==''){
                
                $('#group').children('option').remove().trigger("liszt:updated");
                $('#focenter').children('option').remove().trigger("liszt:updated");
                
                $('#group').append("<option value='' >All Groups</option>");
                $('#focenter').append("<option value=''>All Centers</option>"); 

                <?php foreach($center as $centersss){ ?>
                
                $('#focenter').append("<option value='<?=$centersss->fld_customer_no;?> '><?=$centersss->fld_customer_name;?></option>");                              
                <?php } ?>
                $('#focenter').trigger("liszt:updated");

                <?php foreach($groups as $groupssss){ ?>
                $('#group').append("<option value='<?=$groupssss->fld_customer_no;?> '><?=$groupssss->fld_customer_name;?></option>");                              
                <?php } ?>
                $('#group').trigger("liszt:updated");

            }else{
           $.ajax({
                         type: 'POST',
                         data: {fofficer:fofficer},
                          url: '<?php echo base_url(); ?>index.php/Customer_listing_ctrl/get_fo_rel_Group',
                         dataType: 'json',
                         success: function(response){
                        $('#group').children('option').remove().trigger("liszt:updated");
                        $('#group').append("<option value='' >All Groups</option>");  
                          
                      
                          if(response=='no_data')
                              {

                                $('#group').append("<option value=''></option>");
                              }
                          else
                             {
                                $('#group').append("<option value=''></option>");
                          $(response).each(function(index, branch_rel) { 
                                
                                 $('#group').append("<option value='"+branch_rel.fld_customer_no+"' data-text="+branch_rel.fld_customer_name+" >"+branch_rel.fld_customer_name+"</option>");                              
                             });
                             }
                    $('#group').trigger("liszt:updated");
                  //  $('#lname').trigger("liszt:updated");
                  $
                      }
             });
            
            $.ajax({
                         type: 'POST',
                         data: {fofficer:fofficer},
                          url: '<?php echo base_url(); ?>index.php/Customer_listing_ctrl/get_fo_rel_center',
                     dataType: 'json',
                      success: function(response){
                        $('#focenter').children('option').remove().trigger("liszt:updated");
                        $('#focenter').append("<option value='' >All Centers</option>");  
                          
                      
                          if(response=='no_data')
                              {
                                 $('#focenter').append("<option value=''></option>");
                              }
                          else
                             {
                                $('#focenter').append("<option value=''></option>");
                          $(response).each(function(index, branch_rel) { 
                                
                                $('#focenter').append("<option value='"+branch_rel.fld_customer_no+"' data-text="+branch_rel.fld_customer_name+" >"+branch_rel.fld_customer_name+"</option>");                              
                             });
                             }
                    $('#focenter').trigger("liszt:updated");
                  
                      }
             });        }

        });

        $('#focenter').change(function (){ 
           var focenter = $('#focenter').val();

           $('#group').html('');
           if (focenter==''){
                
                $('#group').children('option').remove().trigger("liszt:updated");
                $('#group').append("<option value=''>All Groups</option>");
                <?php foreach($groups as $groups){ ?>
                
                $('#group').append("<option value='<?=$groups->fld_customer_no;?> '><?=$groups->fld_customer_name;?></option>");                              
                <?php } ?>
                $('#group').trigger("liszt:updated");
            }else{
           $.ajax({
                         type: 'POST',
                         data: {focenter:focenter},
                          url: '<?php echo base_url(); ?>index.php/Customer_listing_ctrl/get_center_rel_group',
                         dataType: 'json',
                         success: function(response){
                        $('#group').children('option').remove().trigger("liszt:updated");
                        $('#group').append("<option value=''>All Groups</option>");  
                          
                      
                          if(response=='no_data')
                              {
                                 $('#group').append("<option value=''></option>");
                              }
                          else
                             {
                                $('#group').append("<option value=''></option>");
                          $(response).each(function(index, branch_rel) { 
                                
                                 $('#group').append("<option value='"+branch_rel.fld_customer_no+"' data-text="+branch_rel.fld_customer_name+" >"+branch_rel.fld_customer_name+"</option>");
                             });
                             }
                    $('#group').trigger("liszt:updated");
                  //  $('#lname').trigger("liszt:updated");
                      }
             });
        }

        });
         
        
        $('#reset').click(function (){
            location.reload();
        });

            
        $('#search').click(function(){
            disabled_change_customer();
            $('#journallisting').children('option').remove().trigger("liszt:updated");
            $('#journallisting').append("<option value=''></option>");
            $("#image").fadeIn();
            $('#journallisting').html("");
            var branch = $('#branch').val();
            var fofficer = $('#fofficer').val();
            var focenter = $('#focenter').val();
            var group = $('#group').val(); 
            var curdate = $('#curdate').val();
                
              // alert(branch)
              //  alert(curdate)
            var stts='';
            var shed='';
                
                
               // alert(branch+" "+lname+"  "+fofficer+" "+status)
                
                if(branch=='' && fofficer=='' && focenter=='' && group=='')
                  
                    {
                                 $.ajax({
                                 type: 'POST',
                                  data: {fofficer:fofficer},
                                  url: '<?php echo base_url(); ?>index.php/Customer_listing_ctrl/get_all_customers',
                                  dataType: 'json',
                                  success: function(response){
                                     $("#image").fadeOut();
                                     if(response=='no_data')
                                      {
                                      $.gritter.add({
                                        title: 'Customer Listing Error',
                                        text: 'No Relevent Customer found!!',
                                        class_name: 'gritter-warning gritter-center'
                                          });
                                      }
                                      else
                                         {
                                          $(response).each(function(index, branch_rel) { 
                                                   if(branch_rel.fld_account_id)
                                                   {
                                                       var loanstts="<span class='label label-success'>Loan</span>";
                                                   }
                                                  else{
                                                    var loanstts="<span class='label label-warning'>No Loans</span>";  
                                                  }
                                                  
                                                  if(branch_rel.fon)
                                                      {
                                                          var fo=branch_rel.fon;
                                                      }
                                                  else
                                                      {
                                                         var fo="No Field Officer"; 
                                                      }
                                  
                                    
                                    $('#journallisting').append("<tr><td>"+branch_rel.fld_customer_no+"</td><td>"+branch_rel.fld_customer_name+"</td><td>"+branch_rel.fld_customer_address+"</td><td>"+branch_rel.fld_customer_nic+"</td><td>"+branch_rel.fld_customer_tel+"</td><td>"+branch_rel.fld_join_date +"</td><td>"+branch_rel.fld_gender+"</td></tr>");                                      
                                 });
                             }
                             get_loan_list(branch,fofficer,focenter,group);
                           }
                         });
                    }
                else
                    {
                        if(branch!=='' && fofficer=='' && focenter=='' && group=='')
                          {
                            
                              $.ajax({
                              type: 'POST',
                              data: {branch:branch},
                              url: '<?php echo base_url(); ?>index.php/Customer_listing_ctrl/get_branch_rel_customers',
                              dataType: 'json',
                              success: function(response){
                                $("#image").fadeOut();
                              if(response=='no_data')
                              {
                                $.gritter.add({
                                title: 'Customer Listing Error',
                                text: 'No Relevant Customer found!!',
                                class_name: 'gritter-warning gritter-center'
                                  });
                              }
                             else
                             {
                              $(response).each(function(index, branch_rel) { 
                                   // console.log( branch_rel.fld_account_id + - +branch_rel.fld_shedule_type)
                                   if(branch_rel.fld_account_id)
                                       {
                                           var loanstts="<span class='label label-success'>Loan</span>";
                                       }
                                  else{
                                    var loanstts="<span class='label label-warning'>No Loans</span>";  
                                  }
                                  
                                  if(branch_rel.fon)
                                      {
                                          var fo=branch_rel.fon;
                                      }
                                  else
                                      {
                                         var fo="No Field Officer"; 
                                      }
                                  
                                    
                                    $('#journallisting').append("<tr><td>"+branch_rel.fld_customer_no+"</td><td>"+branch_rel.fld_customer_name+"</td><td>"+fo+"</td><td>"+branch_rel.fld_customer_address+"</td><td>"+branch_rel.fld_customer_nic+"</td><td>"+branch_rel.fld_customer_tel+"</td><td>"+branch_rel.fld_join_date  +"</td><td>"+branch_rel.fld_gender+"</td></tr>");                             
                                 });
                                     }
                                     get_loan_list(branch,fofficer,focenter,group);
                                   },
                                     error: function(e){
                                         console.log(e)
                                     }
                                 });
                                       
                                      
                                  }
                        else if(branch!=='' && fofficer!=='' && focenter=='' && group=='') 
                            {
                               //using loan name..
                                     $.ajax({
                         type: 'POST',
                         data: {branch:branch , fofficer:fofficer},
                          url: '<?php echo base_url(); ?>index.php/Customer_listing_ctrl/get_branch_and_fo_rel_customers',
                          dataType: 'json',
                          success: function(response){
                             $("#image").fadeOut();
                              if(response=='no_data')
                              {
                                     $.gritter.add({
                                title: 'Customer Listing Error',
                                text: 'No Relevent Customer found!!',
                                class_name: 'gritter-warning gritter-center'
                                  });
                              }
                             else
                              {
                               $(response).each(function(index, branch_rel) { 
                                      if(branch_rel.fld_account_id)
                                       {
                                           var loanstts="<span class='label label-success'>Loan</span>";
                                       }
                                      else{
                                        var loanstts="<span class='label label-warning'>No Loans</span>";  
                                      }
                                      
                                      if(branch_rel.fon)
                                          {
                                              var fo=branch_rel.fon;
                                          }
                                      else
                                          {
                                             var fo="No Field Officer"; 
                                          }
                                      
                                    
                                    $('#journallisting').append("<tr><td>"+branch_rel.fld_customer_no+"</td><td>"+branch_rel.fld_customer_name+"</td><td>"+fo+"</td><td>"+branch_rel.fld_customer_address+"</td><td>"+branch_rel.fld_customer_nic+"</td><td>"+branch_rel.fld_customer_tel+"</td><td>"+branch_rel.fld_join_date  +"</td><td>"+branch_rel.fld_gender+"</td></tr>");                                    
                                 });
                             }
                             get_loan_list(branch,fofficer,focenter,group);
                           }
                         });
                               //end loan name..
                            }
                        else if(branch!=='' && fofficer!=='' && focenter!=='' && group=='')
                            {
                               
                                 $.ajax({
                                 type: 'POST',
                                  data: {branch:branch,fofficer:fofficer,focenter:focenter},
                                  url: '<?php echo base_url(); ?>index.php/Customer_listing_ctrl/get_branch_and_fo_and_center_rel_customers',
                                  dataType: 'json',
                                  success: function(response){
                                     $("#image").fadeOut();
                                     if(response=='no_data')
                                      {
                                      $.gritter.add({
                                        title: 'Customer Listing Error',
                                        text: 'No Relevent Customer found!!',
                                        class_name: 'gritter-warning gritter-center'
                                          });
                                      }
                                      else
                                         {
                                          $(response).each(function(index, branch_rel) { 
                                                   if(branch_rel.fld_account_id)
                                                   {
                                                       var loanstts="<span class='label label-success'>Loan</span>";
                                                   }
                                  else{
                                    var loanstts="<span class='label label-warning'>No Loans</span>";  
                                  }
                                  
                                  if(branch_rel.fon)
                                      {
                                          var fo=branch_rel.fon;
                                      }
                                  else
                                      {
                                         var fo="No Field Officer"; 
                                      }
                                  
                                    
                                    $('#journallisting').append("<tr><td>"+branch_rel.fld_customer_no+"</td><td>"+branch_rel.fld_customer_name+"</td><td>"+fo+"</td><td>"+branch_rel.fld_customer_address+"</td><td>"+branch_rel.fld_customer_nic+"</td><td>"+branch_rel.fld_customer_tel+"</td><td>"+branch_rel.fld_join_date +"</td><td>"+branch_rel.fld_gender+"</td></tr>");                                      
                                 });
                             }
                             get_loan_list(branch,fofficer,focenter,group);
                           }
                         });
                            }
                         else if(branch!=='' && fofficer!=='' && focenter!=='' && group!=='')
                            {
                                 $.ajax({
                                 type: 'POST',
                                 data: {branch:branch,fofficer:fofficer,focenter:focenter,group:group},
                                 url: '<?php echo base_url(); ?>index.php/Customer_listing_ctrl//get_all_rel_customers',
                                 dataType: 'json',
                                 success: function(response){
                                     $("#image").fadeOut();
                                      if(response=='no_data')
                                      {
                                            $.gritter.add({
                                        title: 'Customer Listing Error',
                                        text: 'No Relevent Customer found!!',
                                        class_name: 'gritter-warning gritter-center'
                                          });
                                      }
                                      else
                                         {
                                      $(response).each(function(index, branch_rel) {
                                            if(branch_rel.fld_account_id)
                                                   {
                                                       var loanstts="<span class='label label-success'>Loan</span>";
                                               }
                                          else{
                                            var loanstts="<span class='label label-warning'>No Loans</span>";  
                                          }
                                          
                                          if(branch_rel.fon)
                                              {
                                                  var fo=branch_rel.fon;
                                              }
                                          else
                                              {
                                                 var fo="No Field Officer"; 
                                              }

                                  
                                    $('#journallisting').append("<tr><td>"+branch_rel.fld_customer_no+"</td><td>"+branch_rel.fld_customer_name+"</td><td>"+fo+"</td><td>"+branch_rel.fld_customer_address+"</td><td>"+branch_rel.fld_customer_nic+"</td><td>"+branch_rel.fld_customer_tel+"</td><td>"+branch_rel.fld_join_date+"</td><td>"+branch_rel.fld_gender+"</td></tr>");                            
                                 });
                             }
                             get_loan_list(branch,fofficer,focenter,group);
                           }
                         });
                                //
                                
                            }

                        else if(branch=='' && fofficer!=='' && focenter=='' && group=='')
                            {
                                
                                //
                                  $.ajax({
                                 type: 'POST',
                                 data: {fofficer:fofficer},
                                  url: '<?php echo base_url(); ?>index.php/Customer_listing_ctrl/get_fo_rel_customers',
                                 dataType: 'json',
                                 success: function(response){
                                     $("#image").fadeOut();
                                      if(response=='no_data')
                                      {
                                            $.gritter.add({
                                        title: 'Customer Listing Error',
                                        text: 'No Relevent Customer found!!',
                                        class_name: 'gritter-warning gritter-center'
                                          });
                                      }
                                      else
                                         {
                                      $(response).each(function(index, branch_rel) {
                                            if(branch_rel.fld_account_id)
                                                   {
                                                       var loanstts="<span class='label label-success'>Loan</span>";
                                               }
                                          else{
                                            var loanstts="<span class='label label-warning'>No Loans</span>";  
                                          }
                                          
                                          if(branch_rel.fon)
                                              {
                                                  var fo=branch_rel.fon;
                                              }
                                          else
                                              {
                                                 var fo="No Field Officer"; 
                                              }

                                  
                                    $('#journallisting').append("<tr><td>"+branch_rel.fld_customer_no+"</td><td>"+branch_rel.fld_customer_name+"</td><td>"+fo+"</td><td>"+branch_rel.fld_customer_address+"</td><td>"+branch_rel.fld_customer_nic+"</td><td>"+branch_rel.fld_customer_tel+"</td><td>"+branch_rel.fld_join_date+"</td><td>"+branch_rel.fld_gender+"</td></tr>");                            
                                 });
                             }
                             get_loan_list(branch,fofficer,focenter,group);
                           }
                         });
                                //
                                
                            }

                        else if(branch=='' && fofficer!=='' && focenter!=='' && group=='')
                            {
                                
                                //
                                  $.ajax({
                                 type: 'POST',
                                 data: {fofficer:fofficer,focenter:focenter},
                                  url: '<?php echo base_url(); ?>index.php/Customer_listing_ctrl//get_fo_and_center_rel_customers',
                                 dataType: 'json',
                                 success: function(response){
                                     $("#image").fadeOut();
                                      if(response=='no_data')
                                      {
                                            $.gritter.add({
                                        title: 'Customer Listing Error',
                                        text: 'No Relevent Customer found!!',
                                        class_name: 'gritter-warning gritter-center'
                                          });
                                      }
                                      else
                                         {
                                      $(response).each(function(index, branch_rel) {
                                            if(branch_rel.fld_account_id)
                                                   {
                                                       var loanstts="<span class='label label-success'>Loan</span>";
                                               }
                                          else{
                                            var loanstts="<span class='label label-warning'>No Loans</span>";  
                                          }
                                          
                                          if(branch_rel.fon)
                                              {
                                                  var fo=branch_rel.fon;
                                              }
                                          else
                                              {
                                                 var fo="No Field Officer"; 
                                              }

                                  
                                    $('#journallisting').append("<tr><td>"+branch_rel.fld_customer_no+"</td><td>"+branch_rel.fld_customer_name+"</td><td>"+fo+"</td><td>"+branch_rel.fld_customer_address+"</td><td>"+branch_rel.fld_customer_nic+"</td><td>"+branch_rel.fld_customer_tel+"</td><td>"+branch_rel.fld_join_date+"</td><td>"+branch_rel.fld_gender+"</td></tr>");                            
                                 });
                             }
                             get_loan_list(branch,fofficer,focenter,group);
                           }
                         });
                                //
                                
                            }

                        
                        //2*2 checking..
                        else if(branch=='' && fofficer!=='' && focenter!=='' && group!=='')
                            {
                                //
                                 $.ajax({
                             type: 'POST',
                             data: {fofficer:fofficer,focenter:focenter,group:group},
                              url: '<?php echo base_url(); ?>index.php/Customer_listing_ctrl/get_fo_and_center_and_group_rel_customers',
                              dataType: 'json',
                              success: function(response){
                                 $("#image").fadeOut();
                              if(response=='no_data')
                              {
                                      $.gritter.add({
                                title: 'Customer Listing Error',
                                text: 'No Relevent Customer found!!',
                                class_name: 'gritter-warning gritter-center'
                                  });
                              }
                            else
                             {
                              $(response).each(function(index, branch_rel) { 
                                       if(branch_rel.fld_account_id)
                                       {
                                           var loanstts="<span class='label label-success'>Loan</span>";
                                       }
                                      else{
                                        var loanstts="<span class='label label-warning'>No Loans</span>";  
                                      }
                                      
                                      if(branch_rel.fon)
                                          {
                                              var fo=branch_rel.fon;
                                          }
                                      else
                                          {
                                             var fo="No Field Officer"; 
                                          }
                                  
                                    
                                    $('#journallisting').append("<tr><td>"+branch_rel.fld_customer_no+"</td><td>"+branch_rel.fld_customer_name+"</td><td>"+fo+"</td><td>"+branch_rel.fld_customer_address+"</td><td>"+branch_rel.fld_customer_nic+"</td><td>"+branch_rel.fld_customer_tel+"</td><td>"+branch_rel.fld_join_date+"</td><td>"+branch_rel.fld_gender+"</td></tr>");                                             
                                 });
                             }
                             get_loan_list(branch,fofficer,focenter,group);
                           }
                         });
                                //
                            }
                        else if(branch=='' && fofficer=='' && focenter!=='' && group=='')
                            {
                                //
                                $.ajax({
                                  type: 'POST',
                                  data: {focenter:focenter},
                                  url: '<?php echo base_url(); ?>index.php/Customer_listing_ctrl/get_center_rel_customers',
                                  dataType: 'json',
                                  success: function(response){
                                     $("#image").fadeOut();
                                      if(response=='no_data')
                                      {
                                             $.gritter.add({
                                        title: 'Customer Listing Error',
                                        text: 'No Relevent Customer found!!',
                                        class_name: 'gritter-warning gritter-center'
                                          });
                                      }
                                      else
                                         {
                                          $(response).each(function(index, branch_rel) { 
                                           if(branch_rel.fld_account_id)
                                           {
                                               var loanstts="<span class='label label-success'>Loan</span>";
                                           }
                                          else{
                                            var loanstts="<span class='label label-warning'>No Loans</span>";  
                                          }
                                          
                                          if(branch_rel.fon)
                                              {
                                                  var fo=branch_rel.fon;
                                              }
                                          else
                                              {
                                         var fo="No Field Officer"; 
                                      }
                                  
                                    
                                    $('#journallisting').append("<tr><td>"+branch_rel.fld_customer_no+"</td><td>"+branch_rel.fld_customer_name+"</td><td>"+fo+"</td><td>"+branch_rel.fld_customer_address+"</td><td>"+branch_rel.fld_customer_nic+"</td><td>"+branch_rel.fld_customer_tel+"</td><td>"+branch_rel.fld_join_date+"</td><td>"+branch_rel.fld_gender+"</td></tr>");                                            
                                 });
                             }
                             get_loan_list(branch,fofficer,focenter,group);
                           }
                         });
                                //
                            }
                        
                        else if(branch=='' && fofficer=='' && focenter!=='' && group!=='')
                            {
                                /////
                                 $.ajax({
                                 type: 'POST',
                                 data: {focenter:focenter,group:group},
                                 url: '<?php echo base_url(); ?>index.php/Customer_listing_ctrl/get_center_and_group_rel_customers',
                                 dataType: 'json',
                                 success: function(response){
                                 $("#image").fadeOut();
                                  if(response=='no_data')
                                  {
                                         $.gritter.add({
                                    title: 'Customer Listing Error',
                                    text: 'No Relevent Customer found!!',
                                    class_name: 'gritter-warning gritter-center'
                                      });
                                  }
                                  else
                                     {
                                      $(response).each(function(index, branch_rel) { 
                                              if(branch_rel.fld_account_id)
                                               {
                                                   var loanstts="<span class='label label-success'>Loan</span>";
                                                 }
                                              else{
                                                var loanstts="<span class='label label-warning'>No Loans</span>";  
                                              }
                                              
                                              if(branch_rel.fon)
                                                  {
                                                      var fo=branch_rel.fon;
                                                  }
                                              else
                                                  {
                                                     var fo="No Field Officer"; 
                                                  }
                                  
                                    
                                    $('#journallisting').append("<tr><td>"+branch_rel.fld_customer_no+"</td><td>"+branch_rel.fld_customer_name+"</td><td>"+fo+"</td><td>"+branch_rel.fld_customer_address+"</td><td>"+branch_rel.fld_customer_nic+"</td><td>"+branch_rel.fld_customer_tel+"</td><td>"+branch_rel.fld_join_date+"</td><td>"+branch_rel.fld_gender+"</td></tr>");                                      
                                 });
                             }
                             get_loan_list(branch,fofficer,focenter,group);
                           }
                         });
                                /////
                            }
                         
                         else if(branch=='' && fofficer=='' && focenter=='' && group!=='')
                            {
                               
                                 //////
                                $.ajax({
                         type: 'POST',
                         data: {group:group},
                          url: '<?php echo base_url(); ?>index.php/Customer_listing_ctrl/get_group_rel_customers',
                     dataType: 'json',
                      success: function(response){
                             $("#image").fadeOut();
                              if(response=='no_data')
                              {

                                      $.gritter.add({
                                title: 'Customer Listing Error',
                                text: 'No Relevent Customer found!!',
                                class_name: 'gritter-warning gritter-center'
                                  });
                              }
                          else
                             {
                              $(response).each(function(index, branch_rel) { 
                                     if(branch_rel.fld_account_id)
                                       {
                                           var loanstts="<span class='label label-success'>Loan</span>";
                                       }
                                  else{
                                    var loanstts="<span class='label label-warning'>No Loans</span>";  
                                  }
                                  
                                  if(branch_rel.fon)
                                      {
                                          var fo=branch_rel.fon;
                                      }
                                  else
                                      {
                                         var fo="No Field Officer"; 
                                      }
                                  
                                    
                                    $('#journallisting').append("<tr><td>"+branch_rel.fld_customer_no+"</td><td>"+branch_rel.fld_customer_name+"</td><td>"+fo+"</td><td>"+branch_rel.fld_customer_address+"</td><td>"+branch_rel.fld_customer_nic+"</td><td>"+branch_rel.fld_customer_tel+"</td><td>"+branch_rel.fld_join_date+"</td><td>"+branch_rel.fld_gender+"</td></tr>");                                      
                                 });
                             }
                             get_loan_list(branch,fofficer,focenter,group);
                           }
                         });
                                //////
                                
                            }

                            else if(branch!=='' && fofficer=='' && focenter!=='' && group=='')
                            {
                                //
                                $.ajax({
                                  type: 'POST',
                                  data: {branch:branch,focenter:focenter},
                                  url: '<?php echo base_url(); ?>index.php/Customer_listing_ctrl/get_branch_and_center_rel_customers',
                                  dataType: 'json',
                                  success: function(response){
                                     $("#image").fadeOut();
                                      if(response=='no_data')
                                      {
                                             $.gritter.add({
                                        title: 'Customer Listing Error',
                                        text: 'No Relevent Customer found!!',
                                        class_name: 'gritter-warning gritter-center'
                                          });
                                      }
                                      else
                                         {
                                          $(response).each(function(index, branch_rel) { 
                                           if(branch_rel.fld_account_id)
                                           {
                                               var loanstts="<span class='label label-success'>Loan</span>";
                                           }
                                          else{
                                            var loanstts="<span class='label label-warning'>No Loans</span>";  
                                          }
                                          
                                          if(branch_rel.fon)
                                              {
                                                  var fo=branch_rel.fon;
                                              }
                                          else
                                              {
                                         var fo="No Field Officer"; 
                                      }
                                  
                                    
                                    $('#journallisting').append("<tr><td>"+branch_rel.fld_customer_no+"</td><td>"+branch_rel.fld_customer_name+"</td><td>"+fo+"</td><td>"+branch_rel.fld_customer_address+"</td><td>"+branch_rel.fld_customer_nic+"</td><td>"+branch_rel.fld_customer_tel+"</td><td>"+branch_rel.fld_join_date+"</td><td>"+branch_rel.fld_gender+"</td></tr>");                                            
                                 });
                             }
                             get_loan_list(branch,fofficer,focenter,group);
                           }
                         });
                                //
                            }

                            else if(branch!=='' && fofficer=='' && focenter!=='' && group!=='')
                            {
                                //
                                $.ajax({
                                  type: 'POST',
                                  data: {branch:branch,focenter:focenter,group:group},
                                  url: '<?php echo base_url(); ?>index.php/Customer_listing_ctrl/get_branch_and_center_and_group_rel_customers',
                                  dataType: 'json',
                                  success: function(response){
                                     $("#image").fadeOut();
                                      if(response=='no_data')
                                      {
                                             $.gritter.add({
                                        title: 'Customer Listing Error',
                                        text: 'No Relevent Customer found!!',
                                        class_name: 'gritter-warning gritter-center'
                                          });
                                      }
                                      else
                                         {
                                          $(response).each(function(index, branch_rel) { 
                                           if(branch_rel.fld_account_id)
                                           {
                                               var loanstts="<span class='label label-success'>Loan</span>";
                                           }
                                          else{
                                            var loanstts="<span class='label label-warning'>No Loans</span>";  
                                          }
                                          
                                          if(branch_rel.fon)
                                              {
                                                  var fo=branch_rel.fon;
                                              }
                                          else
                                              {
                                         var fo="No Field Officer"; 
                                      }
                                  
                                    
                                    $('#journallisting').append("<tr><td>"+branch_rel.fld_customer_no+"</td><td>"+branch_rel.fld_customer_name+"</td><td>"+fo+"</td><td>"+branch_rel.fld_customer_address+"</td><td>"+branch_rel.fld_customer_nic+"</td><td>"+branch_rel.fld_customer_tel+"</td><td>"+branch_rel.fld_join_date+"</td><td>"+branch_rel.fld_gender+"</td></tr>");                                            
                                 });
                             }
                             get_loan_list(branch,fofficer,focenter,group);
                           }
                         });
                                //
                            }

                            else if(branch!=='' && fofficer=='' && focenter=='' && group!=='')
                            {
                                //
                                $.ajax({
                                  type: 'POST',
                                  data: {branch:branch,group:group},
                                  url: '<?php echo base_url(); ?>index.php/Customer_listing_ctrl/get_branch_and_group_rel_customers',
                                  dataType: 'json',
                                  success: function(response){
                                     $("#image").fadeOut();
                                      if(response=='no_data')
                                      {
                                             $.gritter.add({
                                        title: 'Customer Listing Error',
                                        text: 'No Relevent Customer found!!',
                                        class_name: 'gritter-warning gritter-center'
                                          });
                                      }
                                      else
                                         {
                                          $(response).each(function(index, branch_rel) { 
                                           if(branch_rel.fld_account_id)
                                           {
                                               var loanstts="<span class='label label-success'>Loan</span>";
                                           }
                                          else{
                                            var loanstts="<span class='label label-warning'>No Loans</span>";  
                                          }
                                          
                                          if(branch_rel.fon)
                                              {
                                                  var fo=branch_rel.fon;
                                              }
                                          else
                                              {
                                         var fo="No Field Officer"; 
                                      }
                                  
                                    
                                    $('#journallisting').append("<tr><td>"+branch_rel.fld_customer_no+"</td><td>"+branch_rel.fld_customer_name+"</td><td>"+fo+"</td><td>"+branch_rel.fld_customer_address+"</td><td>"+branch_rel.fld_customer_nic+"</td><td>"+branch_rel.fld_customer_tel+"</td><td>"+branch_rel.fld_join_date+"</td><td>"+branch_rel.fld_gender+"</td></tr>");                                            
                                 });
                             }
                             get_loan_list(branch,fofficer,focenter,group);
                           }
                         });
                                //
                            }

                            else if(branch=='' && fofficer!=='' && focenter=='' && group!=='')
                            {
                                //
                                $.ajax({
                                  type: 'POST',
                                  data: {fofficer:fofficer,group:group},
                                  url: '<?php echo base_url(); ?>index.php/Customer_listing_ctrl/get_fo_and_group_rel_customers',
                                  dataType: 'json',
                                  success: function(response){
                                     $("#image").fadeOut();
                                      if(response=='no_data')
                                      {
                                             $.gritter.add({
                                        title: 'Customer Listing Error',
                                        text: 'No Relevent Customer found!!',
                                        class_name: 'gritter-warning gritter-center'
                                          });
                                      }
                                      else
                                         {
                                          $(response).each(function(index, branch_rel) { 
                                           if(branch_rel.fld_account_id)
                                           {
                                               var loanstts="<span class='label label-success'>Loan</span>";
                                           }
                                          else{
                                            var loanstts="<span class='label label-warning'>No Loans</span>";  
                                          }
                                          
                                          if(branch_rel.fon)
                                              {
                                                  var fo=branch_rel.fon;
                                              }
                                          else
                                              {
                                         var fo="No Field Officer"; 
                                      }
                                  
                                    
                                    $('#journallisting').append("<tr><td>"+branch_rel.fld_customer_no+"</td><td>"+branch_rel.fld_customer_name+"</td><td>"+fo+"</td><td>"+branch_rel.fld_customer_address+"</td><td>"+branch_rel.fld_customer_nic+"</td><td>"+branch_rel.fld_customer_tel+"</td><td>"+branch_rel.fld_join_date+"</td><td>"+branch_rel.fld_gender+"</td></tr>");                                            
                                 });
                             }
                             get_loan_list(branch,fofficer,focenter,group);
                           }
                         });
                                //
                            }

                            else
                            {
                         
                                      $.gritter.add({
                                title: 'Customer Listing Error',
                                text: 'No Relevent Customer found!!',
                                class_name: 'gritter-warning gritter-center'
                                  });
                              }
                          
                         
                     
                         
                    }
            });

function disabled_change_customer(){
                    $('#journallisting').prop("disabled",true).trigger("liszt:updated");
                    $('#search').prop("disabled",true).trigger("liszt:updated");   
                    $('#branch').prop("disabled",true).trigger("liszt:updated");
                    $('#fofficer').prop("disabled",true).trigger("liszt:updated");
                    $('#focenter').prop("disabled",true).trigger("liszt:updated");
                    $('#group').prop("disabled",true).trigger("liszt:updated");

                }
                
                
                
               function get_loan_list()
             {
             $("#sample_table_1").dataTable().fnDestroy();
             
             //
        
             //
             
             var data_table=$('#sample_table_1').dataTable({
                 
                  dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
                });
                var date = $('#changedday').html();
                var branch_name=$('#branch option:selected').data('text');
                var fo_name=$('#fofficer option:selected').data('text');
                var center_name=$('#focenter option:selected').data('text');
                var group_name=$('#group option:selected').data('text');
                var branch = $('#branch').val();
                var fo = $('#fofficer').val();
                var center = $('#focenter').val();
                var group = $('#group').val();
                var group2='All Groups';
                var center2='All Centers';
                var fo2='All Field Officers';

                if(fo=='')
                {
                  fo_name=fo2;
                }

                if(center=='')
                {
                  center_name=center2;
                }

                if(group=='')
                {
                  group_name=group2;
                }


                var table_tools=new $.fn.dataTable.TableTools(data_table,{
                    sSwfPath:'//cdn.datatables.net/tabletools/2.2.4/swf/copy_csv_xls_pdf.swf',
                    'aButtons':[
                        {
                            'sExtends':'pdf',
                            'sFileName':'Customer Listing Report.pdf',
                            'sTitle': 'Customer Listing Report for branch - '+branch_name+', Field Officer - '+fo_name+ ', Center - ' +center_name+ ', Group - ' +group_name,
                            
                        },
                        'csv',
                        'print',
                        {
                            'sExtends':'xls',
                            'sFileName':'Customer Listing().xls',
                            'sTitle': 'Customer Listing',
                        }
                    ]
                });
                //$('#sTitle').append("<option value='' /> <option value='"+cash_acc.focenter+"'>"+branch_rel.fon+"</option>").trigger("liszt:updated");  
                $(table_tools.fnContainer()).insertBefore('#sample_table_1_length');
             }  
                
                
        });
        </script> 
        
    </body>
</html>