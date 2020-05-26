<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Colombo');
$today = date("Y-m-d");
?>

</head>

<body>


<div class="main-container container-fluid">
    <a class="menu-toggler" id="menu-toggler" href="#">
        <span class="menu-text"></span>
    </a>

    <div class="sidebar" id="sidebar">
        <?php include $usermenu; ?><!--/.nav-list-->
    </div>

    <div class="main-content">
        <div class="se-pre-con"></div>
        <div class="breadcrumbs" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="icon-home home-icon"></i>
                    <!--home--><?= $text[4]; ?>
                    <span class="divider">
                                <i class="icon-angle-right arrow-icon"></i>
                            </span>
                </li>
                <li class="active"><!--Customer Details--><?= $text[20]; ?></li>
            </ul><!--.breadcrumb-->
            <div class="nav-search" id="nav-search">
                <div class="btn-group">
                    <button class="btn btn-small btn-transperant">
                        <?php foreach ($language as $language) {
                            echo $language->fld_language;
                        } ?>
                    </button>

                    <button data-toggle="dropdown" class="btn btn-small btn-transperant dropdown-toggle">
                        <i class="icon-angle-down"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-yellow pull-right">
                        <?php foreach ($languages as $language) { ?>
                            <li>
                                <a href="<?= base_url(); ?>index.php/Loan_listing_ctrl/chanege_language/<?= $language->fld_language_id; ?>"><?= $language->fld_language; ?></a>
                            </li>
                        <?php } ?>

                    </ul>
                </div>
            </div><!--#nav-search-->


        </div>

        <div class="page-content">
            <div class="row-fluid">
                <div class="widget-box ">
                    <div class="widget-header widget-header-small header-color-orange">
                        <h6>
                            <i class="icon-filter"></i>
                            Advance Filter 
                        </h6>
                        <span class="widget-toolbar">
                                    <a href="#" data-action="collapse">
                                        <i class="icon-chevron-up"></i>
                                    </a>
                                </span>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <form class="" action="javascript:void(0);" id="validation-form" method="post">
                                <div class="row-fluid">
                                    <div class="span3">
                                        <div class="control-group">
                                            <label for="branch" class="control-label">Select DS Division <span
                                                        class="red">*</span></label>
                                            <select class="chzn-select" id="ds_division" name="ds_division"
                                                    data-placeholder="Select a DS Division...">
                                                <option value=""/>
                                            
                                               
                                                    <option value="All"/>All
                                                

                                                <?php foreach ($ds_division as $ds) { ?>
                                                    <option value="<?= $ds->fld_id ?>"/> <?= $ds->fld_division ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                        
                                    <div class="span3">
                                        <div class="control-group">
                                            <label for="branch" class="control-label">Select Status </label>
                                            <select class="chzn-select" id="status" name="status"
                                                    data-placeholder="Select a Status...">
                                                <option value="All"/>
                                                All 
                                                <option value="1"/>
                                                 Active 
                                                <option value="0"/>
                                                 Deactive 
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="space"></div>
                                <div class="row-fluid">

                                </div>
                                <div class="space"></div>
                                <div class="row-fluid">
                                    <button id="advance_search" class="btn btn-success btn-small" type="submit"> Search 
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="table-header">
                 Details of "Customers"
                </div>
                <table id="table" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th></th>
                        <th> Customer No</th>
                        <th> Customer Image</th>
                        <th> Customer Name </th>
                        <th> Customer Type </th>
                        <th> Customer NIC </th>
                        <th> Customer TP </th>
                        <th> Customer Branch </th>
                        <th> Customer FO </th>
                        <th> Customer Group </th>
                        <th> Customer Center </th>
                        <th> Status </th>
                        <th> Location </th>
                        <th> More </th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>

                    <tfoot>
                    <tr>
                        <th></th>
                        <th> Customer No</th>
                        <th> Customer Image</th>
                        <th> Customer Name </th>
                        <th> Customer Type </th>
                        <th> Customer NIC </th>
                        <th> Customer TP </th>
                        <th> Customer Branch </th>
                        <th> Customer FO </th>
                        <th> Customer Group </th>
                        <th> Customer Center </th>
                        <th> Status </th>
                        <th> Location </th>
                        <th> More </th>
                    </tr>
                    </tfoot>
                </table>
            </div>

        </div><!--/.page-content-->
    </div><!--/.main-content-->
</div><!--/.main-container-->

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
    <i class="icon-double-angle-up icon-only bigger-110"></i>
</a>

<!--basic scripts-->

<!--[if !IE]>-->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<!--<![endif]-->

<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

<!--[if !IE]>-->

<script type="text/javascript">
    window.jQuery || document.write("<script src='<?=base_url(); ?>assets/js/1.8.2/jquery.min.js'>" + "<" + "/script>");
</script>

<!--<![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>" + "<" + "/script>");
</script>
<![endif]-->

<script type="text/javascript">
    if ("ontouchend" in document) document.write("<script src='<?=base_url(); ?>assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>
<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>

<!--page specific plugin scripts-->
<script src="<?= base_url(); ?>assets/js/fuelux/fuelux.wizard.min.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.validate.min.js"></script>
<script src="<?= base_url(); ?>assets/js/additional-methods.min.js"></script>
<script src="<?= base_url(); ?>assets/js/select2.min.js"></script>
<script src="<?= base_url(); ?>assets/js/chosen.jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/process_table/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.dataTables.bootstrap.js"></script>
<script src="<?= base_url(); ?>assets/js/process_table/jquery.dataTables.delay.min.js"></script>

<!--ace scripts-->

<script src="<?= base_url(); ?>assets/js/ace-elements.min.js"></script>
<script src="<?= base_url(); ?>assets/js/ace.min.js"></script>


<!--inline scripts related to this page-->
<script type="text/javascript">
    $(document).ready(function () {
        $(".se-pre-con").fadeOut("slow");
        $(".chzn-select").chosen();

        function format(d) {
            // `d` is the original data object for the row
            return '<ul id="tasks" class="item-list ui-sortable">' +
                '<li class="item-blue clearfix">' +
                '<label class="inline">' +
                '<span class="lbl"><strong>Customer Full Name</strong> : <strong class="blue">' + d.customer_full_name + '</strong></span>' +
                '</label>' +
                '</li>' +

                '<li class="item-blue clearfix">' +
                '<label class="inline">' +
                '<span class="lbl"><strong>Customer Gender</strong> : <strong class="blue">' + d.customer_gender + '</strong></span>' +
                '</label>' +
                '</li>' +
                '<li class="item-blue clearfix">' +
                '<label class="inline">' +
                '<span class="lbl"><strong>Customer Address</strong> : <strong class="blue">' + d.customer_address + '</strong></span>' +
                '</label>' +
                '</li>' +
                '<li class="item-blue clearfix">' +
                '<label class="inline">' +
                '<span class="lbl"><strong>Customer Location</strong> :&nbsp<button type="button" class="btn btn-mini btn-info"  id="customer_location">' +
                '<i class="icon-map-marker bigger-110"></i><a href="<?=base_url()?>index.php/Customer_ctrl/customer_location/' + d.customer_no + '" target="_blank"> Location </a></button>&nbsp' +
                '<button type="button" class="btn btn-mini btn-info"  id="customer_location">' +
                '<i class="icon-map-marker bigger-110"></i><a href="https://www.google.lk/maps/dir//' + d.customer_latitude + ',' + d.customer_longitude + '" target="_blank"> View Map Directions</a></button></strong></span>' +
                '</label>' +
                '</li>' +

                '<li class="item-blue clearfix" >' +
                '<label class="inline">' +
                '<span class="lbl"><strong>Customer Email</strong> : <strong class="blue">' + d.customer_email + '</strong></span>' +
                '</label>' +
                '</li>' +
                '<li class="item-blue clearfix">' +
                '<label class="inline">' +
                '<span class="lbl"><strong>Customer Passport NO</strong> : <strong class="blue">' + d.customer_passport + '</strong></span>' +
                '</label>' +
                '</li>' +
                '<li class="item-blue clearfix">' +
                '<label class="inline">' +
                '<span class="lbl"><strong>Customer Driving License</strong> : <strong class="blue">' + d.customer_driving_license + '</strong></span>' +
                '</label>' +
                '</li>' +
                '<li class="item-blue clearfix" >' +
                '<label class="inline">' +
                '<span class="lbl"><strong>Joined Date</strong> : <strong class="blue">' + d.customer_created + '</strong></span>' +
                '</label>' +
                '</li>' +
                '<li class="item-blue clearfix" >' +
                '<label class="inline">' +
                '<span class="lbl"><strong>Blood Group</strong> : <strong class="blue">' + d.customer_blood + '</strong></span>' +
                '</label>' +
                '</li>' +
                '<li class="item-blue clearfix" >' +
                '<label class="inline">' +
                '<span class="lbl"><strong>Status</strong> : <strong class="blue">' + d.customer_status + '</strong></span>' +
                '</label>' +
                '</li>' +
                '<li class="item-blue clearfix" >' +
                '<label class="inline">' +
                '<span class="lbl"><strong>Occupation</strong> : <strong class="blue">' + d.customer_occupation + '</strong></span>' +
                '</label>' +
                '</li>' +
                '</ul>';
        }

        table = $('#table').DataTable({
            "lengthMenu": [10, 25, 50, 100, 150, 200, 250],
            "oLanguage": {
                "sProcessing": '<div class="se-pre-con"></div>'
            },
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            "pagingType": "full_numbers",
            "deferRender": true,
            "deferLoading": 0,
            // Load data for the table's content from an Ajax source
            "ajax": {
                "data": function (d) {
                    d.branch = $('#ds_division').val();
                    
                    d.status = $('#status').val();
                    

                },
                "url": "<?php echo site_url('Customer_browse_ctrl/ajax_list')?>",
                "type": "POST",


            },

            "columns": [
                {
                    "className": 'details-control',
                    "orderable": false,
                    "data": null,
                    "defaultContent": ''
                },
                {
                    "data": "customer_no"
                },
                {
                    "orderable": false,
                    "data": null
                },
                {
                    "orderable": false,
                    "data": "customer_name"
                },
                {
                    "orderable": false,
                    "data": "customer_type"
                },
                {
                    "orderable": false,
                    "data": "customer_nic"
                },
                {
                    "orderable": false,
                    "data": "customer_tp"
                },
               
                {
                    "orderable": false,
                    "data": null
                },
                {
                    "orderable": false,
                    "data": null
                },
                {
                    "orderable": false,
                    "data": null
                },
                {
                    "orderable": false,
                    "data": null
                },
                {
                    "orderable": false,
                    "data": null,

                },
                   {
                    "orderable": false,
                    "data": null,

                },
                   {
                    "orderable": false,
                    "data": null,

                },
            ],

            "createdRow": function (row, data, index) {
                
                var name = data['customer_name'];
                var customer_no = data['customer_no'];
                $('td', row).eq(0).html('<button type="button" class="btn btn-info btn-mini details-control-btn" ><i class="icon-plus"></i></button><a href="<?=base_url()?>index.php/Customer_ctrl/edit_customer/' + customer_no + '/2" target="_blank" class="btn btn-warning btn-mini view_schedule" role="button" class="green" data-toggle="modal"><i class="icon-eye-open"></i></a>');
                $('td', row).eq(13).html('<a href="<?=base_url()?>index.php/Customer_ctrl/edit_customer/' + customer_no + '/1" target="_blank" class="btn btn-warning btn-mini view_schedule" role="button" class="green" data-toggle="modal"><i class="icon-edit"></i></a>');
               
                $('td', row).eq(10).html('<span class="red">-</span>');
                $('td', row).eq(9).html('<span class="red">-</span>');
                //$('td', row).eq(9).html('<span class="label label-danger"><a href="<?=base_url()?>index.php/Customer_ctrl/customer_location/'+customer_no+'" target="_blank"> Location </a></span>');
               

             // if (active == '1') {
             //        $('td', row).eq(11).html('<span class="label label-success">Active</span>');
             //    }
             //    else if (active == '0') {
             //        $('td', row).eq(11).html('<span class="label label-danger">Deactive</span>');
             //    }
            },
            initComplete: function () {
                var input = $('.dataTables_filter input').unbind(),
                    self = this.api(),
                    $searchButton = $('<button class="btn btn-mini btn-info">')
                        .text('search')
                        .click(function () {
                            self.search(input.val()).draw();
                        }),
                    $clearButton = $('<button class="btn btn-mini btn-warning">')
                        .text('clear')
                        .click(function () {
                            input.val('');
                            $searchButton.click();
                        })
                $('.dataTables_filter').append($searchButton, $clearButton).addClass('form-inline no-padding');
                $('.dataTables_filter input').addClass('input-medium search-query');
            }

        });

        $('#table tbody').on('click', 'td.details-control button.details-control-btn', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var btn = $(this);

            if (row.child.isShown()) {
                btn.removeClass('btn-danger').addClass('btn-info')
                btn.find('i').removeClass('icon-minus').addClass('icon-plus')
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');

            }
          else {
                // Open this row
                btn.removeClass('btn-info').addClass('btn-danger');
                btn.find('i').removeClass('icon-plus').addClass('icon-minus')
                row.child(format(row.data())).show();
                tr.addClass('shown');
            }
        });
        $('#validation-form').validate({

            errorElement: 'span',
            errorClass: 'help-inline row-fluid',
            focusInvalid: false,
            rules: {
                branch: {
                    required: true,
                },
                fo: {
                    required: false,
                },
                status: {
                    required: true,
                },

            },

            messages: {},

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
                if (element.is(':checkbox') || element.is(':radio')) {
                    var controls = element.closest('.controls');
                    if (controls.find(':checkbox,:radio').length > 1) controls.append(error);
                    else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
                }
                else if (element.is('.select2')) {
                    error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
                }
                else if (element.is('.chzn-select')) {
                    error.insertAfter(element.siblings('[class*="chzn-container"]:eq(0)'));
                }
                else error.insertAfter(element);
            },

            submitHandler: function (form) {

                table.ajax.reload();
            },
            invalidHandler: function (form) {
            }
        });
        
        $('#branch').on('change',function () {
            var branch = $(this).val();
            var classBranch = ".branch"+branch;

            $('#fo').find('option').hide().trigger("liszt:updated");

            if(branch=="All"){
                $('#fo').find('option').show().trigger("liszt:updated");
                $('#fo').children('option').first().prop('selected', true).trigger("liszt:updated");

            }
            else{
                $('#fo').find('.first').show().trigger("liszt:updated");
                $('#fo').find('.secound').show().trigger("liszt:updated");
                $('#fo').find(classBranch).show().trigger("liszt:updated");
                $('#fo').children('option').first().prop('selected', true).trigger("liszt:updated");
            }
        })



    });
</script>

</body>
</html>