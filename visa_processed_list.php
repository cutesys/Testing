<?php
$page = "visa";
$tab = "process_visa";
$sub = "visa_process_list";
include('file_parts/header.php');

/*$cmpArray = array();

$resFet = $db->selectQuery("SELECT company_id,`company_pid`,company_name,company_address1,company_email,company_status FROM `sm_company` WHERE sponsor_id='" . $_SESSION['id'] . "' AND `company_status`=1");

if (count($resFet)) {

    for ($rC = 0; $rC < count($resFet); $rC++) {
$cmp_id=$resFet[$rC]['company_id'];
        $res_emp=$db->selectQuery("SELECT `employee_id` FROM `sm_employee` WHERE `employee_company`='$cmp_id' AND `employee_status`='1'");
        $values['company_id'] = $resFet[$rC]['company_id'];
        $values['company_pid'] = $resFet[$rC]['company_pid'];
        $values['emp_count']=count($res_emp);
        $values['company_name'] =  htmlspecialchars_decode($resFet[$rC]['company_name']);
        $values['company_address1'] = $resFet[$rC]['company_address1'];
        $values['company_email'] = $resFet[$rC]['company_email'];
        $values['company_status'] = $resFet[$rC]['company_status'];
        $cmpArray["data"][] = $values;

    }

}

/* while ($row = mysql_fetch_assoc($resCom)) {

  $cmpArray["data"][] = $row;

  } */

/*$fp = fopen('assets/extras/company.json', 'w');

fwrite($fp, json_encode($cmpArray));

fclose($fp);*/

?>

<!-- ====================================================

================= CONTENT ===============================

===================================================== -->

<section id="content">



    <div class="page page-shop-products">



        <div class="pageheader">



            <h2>Processed Visa List <span></span></h2>



            <div class="page-bar">



                <ul class="page-breadcrumb">

                    <li>

                        <a><i class="fa fa-home"></i> SME</a>

                    </li>

                    <li>

                        <a href="#">Visa</a>

                    </li>

                    <li>

                        <a href="#">Process Visa</a>

                    </li>
					 <li>

                        <a href="#">Processed Visa List</a>

                    </li>


                </ul>



            </div>



        </div>



        <!-- page content -->

        <div class="pagecontent">





            <!-- row -->

            <div class="row">

                <!-- col -->

                <div class="col-md-12">





                    <!--                    <div class="alert alert-danger">

                                            <strong>Note!</strong> This table have only demo purpose. Data are not loaded from database but from dummy json.

                                        </div>-->





                    <!-- tile -->

                    <section class="tile">



                        <!-- tile header -->

                        <div class="tile-header dvd dvd-btm">

                            <h1 class="custom-font"><strong>Processed Visa </strong> List</h1>

                            <ul class="controls">

                                <!--<li><a href="javascipt:;"><i class="fa fa-plus mr-5"></i> New Company</a></li>-->





                                <li class="dropdown">



                                    <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown">

                                        <i class="fa fa-cog"></i>

                                        <i class="fa fa-spinner fa-spin"></i>

                                    </a>



                                    <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">

                                        <li>

                                            <a role="button" tabindex="0" class="tile-toggle">

                                                <span class="minimize"><i class="fa fa-angle-down"></i>&nbsp;&nbsp;&nbsp;Minimize</span>

                                                <span class="expand"><i class="fa fa-angle-up"></i>&nbsp;&nbsp;&nbsp;Expand</span>

                                            </a>

                                        </li>

                                        <li>

                                            <a role="button" tabindex="0" class="tile-refresh">

                                                <i class="fa fa-refresh"></i> Refresh

                                            </a>

                                        </li>

                                        <li>

                                            <a role="button" tabindex="0" class="tile-fullscreen">

                                                <i class="fa fa-expand"></i> Fullscreen

                                            </a>

                                        </li>

                                    </ul>



                                </li>

                                <li class="remove"><a role="button" tabindex="0" class="tile-close"><i class="fa fa-times"></i></a></li>

                            </ul>

                        </div>

                        <!-- /tile header -->



                        <!-- tile body -->

                        <div class="tile-body">



                            <div class="table-responsive">

                                <table class="table table-striped table-hover table-custom" id="products-list">

                                    <thead>

                                        <tr>

                                           <th>Sl No.</th>
                                            
                                            <th style="width:120px;">Applicant Name</th>
                                            <th style="width:100px;">Reference No.</th>
											<th>Visa Number</th>
											
											<th>Expiry Date</th>
											<th>Balance</th>
											<th style="width:100px;">Status.</th>

                                            <!--<th style="width:160px;">CR Expiry</th>-->

                                            <th style="width:150px;" class="no-sort">Actions</th>

                                        </tr>

                                    </thead>

                                </table>

                            </div>



                        </div>

                        <!-- /tile body -->



                    </section>

                    <!-- /tile -->



                </div>

                <!-- /col -->

            </div>

            <!-- /row -->









        </div>

        <!-- /page content -->



    </div>



</section>



<div class="modal splash fade" id="splash" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h3 class="modal-title custom-font">Sure To Remove This Record ?</h3>

            </div>

            <input type="hidden" id="hid_del" value=""/>

            

            <div class="modal-footer">

                <button class="btn btn-default btn-border" id="sub_btn">Yes</button>

                <button class="btn btn-default btn-border" data-dismiss="modal">Cancel</button>

            </div>

        </div>

    </div>

</div>
<div class="modal splash fade" id="splash1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h3 class="modal-title custom-font">Change Status</h3>

            </div>

            <input type="hidden" id="hid_del" value=""/>
			 <div class="modal-body">
                <label class="form-label">Balance Amount</label>
                <input type="text" class="form-control" name="balance_amount" id="balance_amount" />

            </div>

            <div class="modal-body">



              <label class="form-label">Payment Date</label>
                <input type="text" class="form-control" name="dispatch_date" id="dispatch_date" />


            </div>

            <div class="modal-footer">

                <button class="btn btn-default btn-border" id="sub_btn">Yes</button>

                <button class="btn btn-default btn-border" data-dismiss="modal">Cancel</button>

            </div>

        </div>

    </div>

</div>

<!--/ CONTENT -->

</div>

<!--/ Application Content -->

<!-- ============================================

============== Vendor JavaScripts ===============

============================================= -->

<script src="assets/jquery.min.js"></script>

<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>



<script src="assets/js/vendor/bootstrap/bootstrap.min.js"></script>



<script src="assets/js/vendor/jRespond/jRespond.min.js"></script>



<script src="assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>



<script src="assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>



<script src="assets/js/vendor/animsition/js/jquery.animsition.min.js"></script>



<script src="assets/js/vendor/screenfull/screenfull.min.js"></script>



<script src="assets/js/vendor/datatables/js/jquery.dataTables.min.js"></script>

<script src="assets/js/vendor/datatables/extensions/dataTables.bootstrap.js"></script>

<script src="assets/js/vendor/datatables/extensions/Pagination/input.js"></script>

<script src="assets/js/vendor/date-format/jquery-dateFormat.min.js"></script>

<!--/ vendor javascripts -->









<!-- ============================================

============== Custom JavaScripts ===============

============================================= -->

<script src="assets/js/main.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">

<!--/ custom javascripts -->









<!-- ===============================================

============== Page Specific Scripts ===============

================================================ -->

<script>
$('#dispatch_date').datepicker({dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true});
</script>
<script>

    $(window).load(function () {



        //initialize datatable

        var t =$('#products-list').DataTable({

            "dom": '<"row"<"col-md-8 col-sm-12"<"inline-controls"l>><"col-md-4 col-sm-12"<"pull-right"f>>>t<"row"<"col-md-4 col-sm-12"<"inline-controls"l>><"col-md-4 col-sm-12"<"inline-controls text-center"i>><"col-md-4 col-sm-12"p>>',

            "language": {

                "sLengthMenu": 'View _MENU_ records',

                "sInfo": 'Found _TOTAL_ records',

                "oPaginate": {

                    "sPage": "Page ",

                    "sPageOf": "of",

                    "sNext": '<i class="fa fa-angle-right"></i>',

                    "sPrevious": '<i class="fa fa-angle-left"></i>'

                }

            },

            "pagingType": "input",

            "ajax": 'assets/extras/visa_process.json',

            "order": [[1, "desc"]],

            "columns": [

                

                {"data": "visa_id"},
					{"type": "html",

                    "data": "visa_applicant_name",

                    "render": function (data, type, full, meta) {

                        return '<a href="visa_process.php?visa_id=' + full.visa_id + '" class=""><i class=""></i> ' + data + '</a>';

                    }},
				
				{"data": "visa_ref_no"},
				{"data": "visa_number"},
				

                {

                    "data": "visa_expiry_date",

                    },

                
                
                {"data": "visa_amount_balance"},
                {"data": "visa_status"},


                {

                    "type": "html",

                    "data": "visa_id",

                    "render": function (data,type,full,meta) {

                        // return '<a href="company_profile.php?id=' + data + '" class="btn btn-xs btn-default mr-5"><i class="fa fa-pencil"></i> Edit</a><a href="del_company.php?id=' + data + '" class="btn btn-xs btn-lightred"><i class="fa fa-times"></i> Delete</a>';

                        return '<a  class="btn btn-xs btn-default mr-5" onclick="delete_id(' + data + ','+full.emp_count+')"  data-toggle="modal" data-target="#splash1" data-options="splash-ef-3"><i class="fa fa-money"></i> Pay</a><a onclick="delete_id(' + data + ','+full.emp_count+')" class="btn btn-xs btn-lightred" data-toggle="modal" data-target="#splash" data-options="splash-ef-3"><i class="fa fa-times"></i> Delete</a>';



                    }}

            ],

            "aoColumnDefs": [

                {'bSortable': true, 'aTargets': 0}

            ],

            "drawCallback": function (settings, json) {

                $(".formatDate").each(function (idx, elem) {

                    $(elem).text($.format.date($(elem).text(), "MMM d, yyyy"));

                });

                $('#select-all').change(function () {

                    if ($(this).is(":checked")) {

                        $('#products-list tbody .selectMe').prop('checked', true);

                    } else {

                        $('#products-list tbody .selectMe').prop('checked', false);

                    }

                });

            }

        });

        t.on( 'order.dt search.dt', function () {

            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {

                cell.innerHTML = i+1;

            } );

        } ).draw();        //*initialize datatable

    });

</script>

<!--/ Page Specific Scripts -->



<script type="text/javascript">
 
    function delete_id(id,emp_count)
    {
        $('#hid_del').val(id);
        $('#emp_count').html(emp_count);
    }

    $('#sub_btn').click(function () {

        var pass_val = $('#hid_del').val();

        $.ajax({

            url: "delete_com.php",

            type: "POST",

            data: {pass_val: pass_val},

            success: function (data) {

                window.location = "companylist.php";

            }

        });

    });</script>



</body>



</html>

