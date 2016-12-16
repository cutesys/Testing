<?php
$id=$_GET['uid'];
session_start(); 
ob_start();
include('connection.php');
if(!isset($_SESSION['id']))
{
	header('Location:index.php');
}

$resEmp = $db->selectQuery("SELECT * FROM `sm_employee` WHERE `employee_id`='$id'");
if (count($resEmp)) {
    $employee_firstname = $resEmp[0]['employee_firstname'];
    $employee_middlename = $resEmp[0]['employee_middlename'];
    $employee_lastname = $resEmp[0]['employee_lastname'];
    $employee_company = $resEmp[0]['employee_company'];
    $employee_designation = $resEmp[0]['employee_designation'];
	$employee_fee = $resEmp[0]['employee_fee'];
	$employee_salary = $resEmp[0]['employee_salary'];
    $employee_nationality = $resEmp[0]['employee_nationality'];
    $employee_visatype = $resEmp[0]['employee_visatype'];
    $employee_gender = $resEmp[0]['employee_gender'];
    $employee_dob = $resEmp[0]['employee_dob'];
	$employee_doj1 = explode("-",$resEmp[0]['employee_joining_date']);
    $employee_doj=$employee_doj1[2]."/".$employee_doj1[1]."/".$employee_doj1[0];
    $employee_remarks = $resEmp[0]['employee_remarks'];
    $employee_peraddress1 = $resEmp[0]['employee_peraddress1'];
    $employee_peraddress2 = $resEmp[0]['employee_peraddress2'];
    $employee_perdoor = $resEmp[0]['employee_perdoor'];
    $employee_percity = $resEmp[0]['employee_percity'];
    $employee_perstate = $resEmp[0]['employee_perstate'];
    $employee_perzip = $resEmp[0]['employee_perzip'];
    $employee_resiaddress1 = $resEmp[0]['employee_resiaddress1'];
    $employee_resiaddress2 = $resEmp[0]['employee_resiaddress2'];
    $employee_residoor = $resEmp[0]['employee_residoor'];
    $employee_resicity = $resEmp[0]['employee_resicity'];
    $employee_resistate = $resEmp[0]['employee_resistate'];
    $employee_zip = $resEmp[0]['employee_zip'];
    $employee_email = $resEmp[0]['employee_email'];
    $employee_phone = $resEmp[0]['employee_phone'];
    $employee_emcontact = $resEmp[0]['employee_emcontact'];
    $sponsor_id = $resEmp[0]['sponsor_id'];
}
$dpImg = "";
$resLogo = $db->selectQuery("SELECT * FROM `sm_employee_files` WHERE `file_title`='Profile_Picture' AND `employee_id`='$id'");

if (count($resLogo)) {
    $dpImg = $resLogo[0]['file_name'];
} else {
    $dpImg = "assets/images/profile-default.png";
}

 ?>
<!DOCTYPE html>
<html>
<head>
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <title></title>
  <meta name="keywords" content="Sponsor Management" />
  <meta name="description" content="Sponsor Management Software">
  <meta name="author" content="Mindwrap">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Font CSS (Via CDN) -->
  <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>

  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">

  <!-- Admin Forms CSS -->
  <link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-forms/css/admin-forms.min.css">

  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/img/favicon.ico">
  <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>

  <!-- Plugin CSS  -->
  <link rel="stylesheet" type="text/css" href="vendor/plugins/fullcalendar/fullcalendar.min.css" media="screen">
  <link rel="stylesheet" type="text/css" href="vendor/plugins/magnific/magnific-popup.css">

  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">

  <!-- Admin Forms CSS -->
  <link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-forms/css/admin-forms.css">

  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/img/favicon.ico">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

</head>


   <body  onload="window.print()">
      <!-- End: Topbar -->

      <!-- Begin: Content -->
      <section id="content" class="table-layout animated fadeIn">

        <!-- begin: .tray-left -->

        <!-- end: .tray-left -->

        <!-- begin: .tray-center -->
        <div class="tray tray-center">

          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-visible" id="spy3">
                <div class="panel-heading">
                  <div class="panel-title hidden-xs" style="margin-left:250px;">
                    <span class="glyphicon glyphicon-tasks"></span><b>EMPLOYEE DETAILS</b></div>
                </div>
                  <br><br><br>
                <div class="panel-body pn" style="overflow:auto !important;"   >
                 
                  <table class="table table-striped table-hover" id="" cellspacing="5" width="100%">
				 
                    <thead>
                      <tr>
                        <td><b>Name</b></td><td style="width:40px;">:</td>
                        <td><?php echo $employee_firstname; ?>  <?php echo $employee_middlename ; ?>  <?php echo $employee_lastname ; ?> </td>
					  </tr>
					  <tr>
                      <td><b>Company Name</b></td><td style="width:40px;">:</td>
					   <?php
                       $cmpName = $db->selectQuery("SELECT `company_name` FROM `sm_company` WHERE `company_id`='$employee_company'");
                       ?>
					  <td><?php echo $cmpName[0]['company_name']; ?></td>
                      </tr>
					   <tr>
                      <td><b>Designation</b></td><td style="width:40px;">:</td>
					  <td><?php echo $employee_designation;?></td>
                      </tr>
					   <tr>
                      <td><b>Fee</b> </td><td style="width:40px;">:</td>
					  <td><?php echo $employee_fee;?></td>
                      </tr>
					   <tr>
                      <td><b>Salary</b> </td><td style="width:40px;">:</td>
					  <td><?php echo $employee_salary;?></td>
                      </tr>
					   <tr>
                      <td><b>Nationality</b> </td><td style="width:40px;">:</td>
					  <td><?php echo $employee_nationality;?></td>
                      </tr>
					   <tr>
                      <td><b>Visatype</b> </td><td style="width:40px;">:</td>
					  <td><?php echo $employee_visatype;?></td>
                      </tr>
					   <tr>
                      <td><b>Gender</b> </td><td style="width:40px;">:</td>
					  <td><?php echo $employee_gender;?></td>
                      </tr>
					   <tr>
                      <td><b>Dob</b> </td><td style="width:40px;">:</td>
					  <td><?php echo $employee_dob;?></td>
                      </tr>
					   <tr>
                      <td><b>Remarks</b> </td><td style="width:40px;">:</td>
					  <td><?php echo $employee_remarks;?></td>
                      </tr>
					   <tr>
                      <td><b>Permanant Address</b></td><td style="width:40px;">:</td>
					  <td><?php echo $employee_peraddress1;?></td>
					  
                      </tr>
					  <tr>
                      <td><b></b></td><td style="width:40px;"></td>
					  <td><?php echo $employee_peraddress2;?></td>
					  
                      </tr>
					  <tr>
                      <td><b></b></td><td style="width:40px;"></td>
					  <td><?php echo $employee_perdoor;?></td>
					  
                      </tr>
					  <tr>
                      <td><b></b></td><td style="width:40px;"></td>
					  <td><?php echo $employee_percity;?></td>
					  
                      </tr>
					  <tr>
                      <td><b></b></td><td style="width:40px;"></td>
					  <td><?php echo $employee_perstate;?></td>
					  
                      </tr>
					  <tr>
                      <td><b></b></td><td style="width:40px;"></td>
					  <td><?php echo $employee_perzip;?></td>
					  
                      </tr>
					 
					  
					   <tr>
                      <td><b>Residential Address </b></td><td style="width:40px;">:</td>
					  <td><?php echo $employee_resiaddress1;?></td></tr>
					   <tr>
                      <td><b></b></td><td style="width:40px;"></td>
					  <td><?php echo $employee_resiaddress2;?></td>
					  </tr>
					   <tr>
                      <td><b></b></td><td style="width:40px;"></td>
					  <td><?php echo $employee_residoor;?></td>
					  </tr>
					   <tr>
                      <td><b></b></td><td style="width:40px;"></td>
					  <td><?php echo $employee_resicity;?></td>
					  </tr>
					   <tr>
                      <td><b></b></td><td style="width:40px;"></td>
					  <td><?php echo $employee_resistate;?></td>
					  </tr>
					   <tr>
                      <td><b></b></td><td style="width:40px;"></td>
					  <td><?php echo $employee_zip;?></td>
					  </tr>
					  
					  
                      
					  <tr>
                      <td><b>Email </b></td><td style="width:40px;">:</td>
					  <td><?php echo $employee_email;?></td>
                      </tr>
					  <tr>
                      <td><b>Phone </b></td><td style="width:40px;">:</td>
					  <td><?php echo $employee_phone;?></td>
                      </tr>
					  <tr>
                      <td><b>Emergency Contact </b></td><td style="width:40px;">:</td>
					  <td><?php echo $employee_emcontact;?></td>
                      </tr>
					   <tr>
                      <td><b>Date of joining </b></td><td style="width:40px;">:</td>
					  <td><?php echo $employee_doj;?></td>
                      </tr>
                    </thead>

                      <tbody>


                      </tbody>
                  </table>
                    
                    <table class="table table-striped table-hover" id="" cellspacing="5" width="100%">
                        <thead>

					    <?php
                                                $docc = $db->selectQuery("select * from sm_employee_documents where employee_id=$id and status=1");
												if(count($docc)>0)
												{
													echo '<span class="glyphicon glyphicon-tasks"></span><h3>Document Details</h3></div>';
												}
												else
												{
													echo'';
												}
                                                if (count($docc)) {
                                                    for ($i = 0; $i < count($docc); $i++) {
                                                       $document_title = $docc[$i]['document_title'];
                                                        $doc_data = $docc[$i]['document_data'];
                                                        $document_start_date1 = explode("-",$docc[$i]['document_start_date']);
                                                        $document_start_date=$document_start_date1[2]."/".$document_start_date1[1]."/".$document_start_date1[0];
                                                        $document_end_date1 = explode("-",$docc[$i]['document_end_date']);
                                                        $document_end_date=$document_end_date1[2]."/".$document_end_date1[1]."/".$document_end_date1[0];
                                                        ?>


                                                        <tr>
                                                          
                                                                <td width="20%"><b><?php echo $document_title; ?></b>:</td>
                                                                <td width="20%"><?php echo $doc_data; ?></td>
                                                           
                                                           
                                                                <td width="20%"><b>Issue Date</b>:</td>
                                                                <td width="20%"><?php echo $document_start_date; ?></td>
                                                            

                                                           
                                                                <td width="20%"><b>Expiry Date</b>:</td>
                                                                <td width="20%"><?php echo $document_end_date; ?></td>
                                                            

                                                        </tr>
														
                                                        <?php
                                                    }
                                                }
                                                ?>
					 
                    </thead>

                    <tbody>

                    
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            

            
          </div>

        </div>
        <!-- end: .tray-center -->

      </section>
      <!-- End: Content -->

    </section>

    <!-- Start: Right Sidebar -->

    <!-- End: Right Sidebar -->

  </div>
       <style type="text/css" media="print">
          @page 
    {
        size:  auto;  
        margin: 5mm; 
    }

    html
    {
        background-color: #FFFFFF; 
        margin: 0px;  
    }

    body
    {
       
        margin: 10mm 15mm 10mm 15mm; 
    }
      </style>
  <!-- End: Main -->
  

  <!-- BEGIN: PAGE SCRIPTS -->

  <!-- jQuery -->
  <script src="vendor/jquery/jquery-1.11.1.min.js"></script>
  <script src="vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

  <!-- Datatables -->
  <script src="vendor/plugins/datatables/media/js/jquery.dataTables.js"></script>

  <!-- Datatables Tabletools addon -->
  <script src="vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>

  <!-- Datatables ColReorder addon -->
  <script src="vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>

  <!-- Datatables Bootstrap Modifications  -->
  <script src="vendor/plugins/datatables/media/js/dataTables.bootstrap.js"></script>

  <!-- Theme Javascript -->
  <script src="assets/js/utility/utility.js"></script>
  <script src="assets/js/demo/demo.js"></script>
  <script src="assets/js/main.js"></script>
  <script type="text/javascript">
  jQuery(document).ready(function() {

    "use strict";

    // Init Theme Core    
    Core.init();

    // Init Demo JS  
    Demo.init();

    // Init DataTables
    $('#datatable').dataTable({
      "sDom": 't<"dt-panelfooter clearfix"ip>',
      "oTableTools": {
        "sSwfPath": "vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
      }
    });

    $('#datatable2').dataTable({
      "aoColumnDefs": [{
        'bSortable': false,
        'aTargets': [-1]
      }],
      "oLanguage": {
        "oPaginate": {
          "sPrevious": "",
          "sNext": ""
        }
      },
      "iDisplayLength": 5,
      "aLengthMenu": [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"]
      ],
      "sDom": '<"dt-panelmenu clearfix"lfr>t<"dt-panelfooter clearfix"ip>',
      "oTableTools": {
        "sSwfPath": "vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
      }
    });

    $('#datatable3').dataTable({
      "aoColumnDefs": [{
        'bSortable': false,
        'aTargets': [-1]
      }],
      "oLanguage": {
        "oPaginate": {
          "sPrevious": "",
          "sNext": ""
        }
      },
      "iDisplayLength": 5,
      "aLengthMenu": [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"]
      ],
      "sDom": '<"dt-panelmenu clearfix"Tfr>t<"dt-panelfooter clearfix"ip>',
      "oTableTools": {
        "sSwfPath": "vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
      }
    });

    $('#datatable4').dataTable({
      "aoColumnDefs": [{
        'bSortable': false,
        'aTargets': [-1]
      }],
      "oLanguage": {
        "oPaginate": {
          "sPrevious": "",
          "sNext": ""
        }
      },
      "iDisplayLength": 5,
      "aLengthMenu": [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"]
      ],
      "sDom": 'T<"panel-menu dt-panelmenu"lfr><"clearfix">tip',

      "oTableTools": {
        "sSwfPath": "vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
      }
    });

    // Multi-Column Filtering
    $('#datatable5 thead th').each(function() {
      var title = $('#datatable5 tfoot th').eq($(this).index()).text();
      $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" />');
    });

    // DataTable
    var table5 = $('#datatable5').DataTable({
      "sDom": 't<"dt-panelfooter clearfix"ip>',
      "ordering": false
    });

    // Apply the search
    table5.columns().eq(0).each(function(colIdx) {
      $('input', table5.column(colIdx).header()).on('keyup change', function() {
        table5
          .column(colIdx)
          .search(this.value)
          .draw();
      });
    });

    // ABC FILTERING
    var table6 = $('#datatable6').DataTable({
      "sDom": 't<"dt-panelfooter clearfix"ip>',
      "ordering": false
    });

    var alphabet = $('<div class="dt-abc-filter"/>').append('<span class="abc-label">Search: </span> ');
    var columnData = table6.column(0).data();
    var bins = bin(columnData);

    $('<span class="active"/>')
      .data('letter', '')
      .data('match-count', columnData.length)
      .html('None')
      .appendTo(alphabet);

    for (var i = 0; i < 26; i++) {
      var letter = String.fromCharCode(65 + i);

      $('<span/>')
        .data('letter', letter)
        .data('match-count', bins[letter] || 0)
        .addClass(!bins[letter] ? 'empty' : '')
        .html(letter)
        .appendTo(alphabet);
    }

    $('#datatable6').parents('.panel').find('.panel-menu').addClass('dark').html(alphabet);

    alphabet.on('click', 'span', function() {
      alphabet.find('.active').removeClass('active');
      $(this).addClass('active');

      _alphabetSearch = $(this).data('letter');
      table6.draw();
    });

    var info = $('<div class="alphabetInfo"></div>')
      .appendTo(alphabet);

    var _alphabetSearch = '';

    $.fn.dataTable.ext.search.push(function(settings, searchData) {
      if (!_alphabetSearch) {
        return true;
      }
      if (searchData[0].charAt(0) === _alphabetSearch) {
        return true;
      }
      return false;
    });

    function bin(data) {
      var letter, bins = {};
      for (var i = 0, ien = data.length; i < ien; i++) {
        letter = data[i].charAt(0).toUpperCase();

        if (bins[letter]) {
          bins[letter]++;
        } else {
          bins[letter] = 1;
        }
      }
      return bins;
    }

    // ROW GROUPING
    var table7 = $('#datatable7').DataTable({

      "columnDefs": [{
        "visible": false,
        "targets": 2
      }],
      "order": [
        [2, 'asc']
      ],
      "sDom": 't<"dt-panelfooter clearfix"ip>',
      "displayLength": 25,
      "drawCallback": function(settings) {
        var api = this.api();
        var rows = api.rows({
          page: 'current'
        }).nodes();
        var last = null;

        api.column(2, {
          page: 'current'
        }).data().each(function(group, i) {
          if (last !== group) {
            $(rows).eq(i).before(
              '<tr class="row-label ' + group.replace(/ /g, '').toLowerCase() + '"><td colspan="5">' + group + '</td></tr>'
            );
            last = group;
          }
        });
      }
    });

    // Order by the grouping
    $('#datatable7 tbody').on('click', 'tr.row-label', function() {
      var currentOrder = table7.order()[0];
      if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
        table7.order([2, 'desc']).draw();
      } else {
        table7.order([2, 'asc']).draw();
      }
    });

    $('#datatable8').DataTable({
      "sDom": 'Rt<"dt-panelfooter clearfix"ip>',
    });

		// COLLAPSIBLE ROWS
		function format ( d ) {
	    // `d` is the original data object for the row
	    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
          '<td class="fw600 pr10">Full name:</td>'+
          '<td>'+d.name+'</td>'+
        '</tr>'+
        '<tr>'+
          '<td class="fw600 pr10">Extension:</td>'+
          '<td>'+d.extn+'</td>'+
        '</tr>'+
        '<tr>'+
          '<td class="fw600 pr10">Extra info:</td>'+
          '<td>And any further details here (images etc)...</td>'+
        '</tr>'+
      '</table>';
		}
		 
    var table = $('#datatable9').DataTable({
      "sDom": 'Rt<"dt-panelfooter clearfix"ip>',
      "ajax": "vendor/plugins/datatables/examples/data_sources/objects.txt",
      "columns": [
        {
          "className":      'details-control',
          "orderable":      false,
          "data":           null,
          "defaultContent": ''
        },
        { "data": "name" },
        { "data": "position" },
        { "data": "office" },
        { "data": "salary" }
      ],
      "order": [[1, 'asc']]
    });
     
    // Add event listener for opening and closing details
    $('#datatable9 tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      var row = table.row( tr );

      if ( row.child.isShown() ) {
        // This row is already open - close it
        row.child.hide();
        tr.removeClass('shown');
      }
      else {
        // Open this row
        row.child( format(row.data()) ).show();
        tr.addClass('shown');
      }
    });


    // MISC DATATABLE HELPER FUNCTIONS

    // Add Placeholder text to datatables filter bar
    $('.dataTables_filter input').attr("placeholder", "Enter Terms...");


  });
  </script>
  <!-- END: PAGE SCRIPTS -->

</body>

</html>
