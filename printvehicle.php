<?php
$id=$_GET['pid'];
session_start(); 
ob_start();
include('connection.php');
if(!isset($_SESSION['id']))
{
	header('Location:index.php');
}
$resFet = $db->selectQuery("SELECT * FROM `sm_vehicle` WHERE `sponsor_id`='".$_SESSION['id']."' AND `vehicle_auto_id`='$id' ");
if (count($resFet)) {
    for ($rC = 0; $rC < count($resFet); $rC++) {
        $company_name=$resFet[$rC]['vehicle_company'];
        $vehicle_assigned_company=$resFet[$rC]['vehicle_assigned_company'];
        $vehicle_assigned_employee=$resFet[$rC]['vehicle_assigned_employee'];
        $company=$db->selectQuery("SELECT `company_name` FROM `sm_company` WHERE `company_id`='$company_name'");
        $ass_com=$db->selectQuery("SELECT `company_name` FROM `sm_company` WHERE `company_id`='$vehicle_assigned_company'");
        $ass_emp=$db->selectQuery("SELECT CONCAT(employee_firstname, \" \", employee_middlename, \" \", employee_lastname) AS full_name FROM `sm_employee` WHERE `employee_id`='$vehicle_assigned_employee'");
        $vehicle_auto_id = $resFet[$rC]['vehicle_auto_id'];
        $vehicle_id = $resFet[$rC]['vehicle_id'];
		$vehicle_number = $resFet[$rC]['vehicle_number'];
		$vehicle_manufacturer = $resFet[$rC]['vehicle_manufacturer'];
		$vehicle_model = $resFet[$rC]['vehicle_model'];
		$vehicle_purchase_date = $resFet[$rC]['vehicle_purchase_date'];
		$vehicle_engine_number = $resFet[$rC]['vehicle_engine_number'];
		$vehicle_chassis_number = $resFet[$rC]['vehicle_chassis_number'];
		$vehicle_registration_number = $resFet[$rC]['vehicle_registration_number'];
		$vehicle_registration_date = $resFet[$rC]['vehicle_registration_date'];
		$vehicle_registration_expiry = $resFet[$rC]['vehicle_registration_expiry'];
		$vehicle_registered_owner = $resFet[$rC]['vehicle_registered_owner'];
		$vehicle_company = $resFet[$rC]['vehicle_company'];
		$vehicle_owner_qatar_id = $resFet[$rC]['vehicle_owner_qatar_id'];
		$vehicle_insurance_id = $resFet[$rC]['vehicle_insurance_id'];
		$vehicle_insurance_date = $resFet[$rC]['vehicle_insurance_date'];
		$vehicle_insurance_expiry = $resFet[$rC]['vehicle_insurance_expiry'];
		$vehicle_insurance_company = $resFet[$rC]['vehicle_insurance_company'];
		$vehicle_insurance_type = $resFet[$rC]['vehicle_insurance_type'];
		$vehicle_insurance_amount = $resFet[$rC]['vehicle_insurance_amount'];
		$vehicle_assigned_company = $resFet[$rC]['vehicle_assigned_company'];
		//$vehicle_assigned_employee = $resFet[$rC]['vehicle_assigned_employee'];
		$values['company_name'] = $company[0]['company_name'];
        $values['vehicle_assigned_company']=$ass_com[0]['company_name'];
        $vehicle_assigned_employee = $ass_emp[0]['full_name'];
        //$empArray["data"][] = $values;
    }
}

 ?>
 <?php
                         $manName = $db->selectQuery("SELECT `manufacturer_name` FROM `sm_vehicle_manufacturer` WHERE `manufacturer_id`='$vehicle_manufacturer'");
                       ?>
					   <?php
                        $modName = $db->selectQuery("SELECT `model_name` FROM `sm_vehicle_model` WHERE `model_id`='$vehicle_model'");
														 
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
                    <span class="glyphicon glyphicon-tasks"></span><b>VEHICLE DETAILS</b></div>
                </div>
                  <br><br><br>
                <div class="panel-body pn" style="overflow:auto !important;"   >
				 <h4><strong>ABOUT</strong> VEHICLE </h4>
                 
                  <table class="table table-striped table-hover" id="" cellspacing="5" width="90%">
				 
                    <thead>
                      <tr>
                        <td><b>Vehicle ID</b>:</td><td style="width:50px;">:</td>
                        <td><?php echo $vehicle_id; ?> </td>
					  </tr>
					  <tr>
                      <td><b>Vehicle Number</b>:</td><td style="width:50px;">:</td>
					   
					  <td><?php echo $vehicle_number; ?></td>
                      </tr>
					   <tr>
                      <td><b>Manufacturer</b>:</td><td style="width:50px;">:</td>
					  <td><?php echo $manName[0]['manufacturer_name']; ?></td>
                      </tr>
					   <tr>
                      <td><b>Model</b>:</td><td style="width:50px;">:</td>
					  <td><?php echo $modName[0]['model_name']; ?></td>
                      </tr>
					   <tr>
                      <td><b>Purchase Date</b>:</td><td style="width:50px;">:</td>
					  <td><?php echo $vehicle_purchase_date; ?></td>
                      </tr>
					   <tr>
                      <td><b>Engine Number</b>:</td><td style="width:50px;">:</td>
					  <td><?php echo $vehicle_engine_number ; ?></td>
                      </tr>
					   <tr>
                      <td><b>Chassis Number</b>:</td><td style="width:50px;">:</td>
					  <td><?php echo $vehicle_chassis_number ; ?></td>
                      </tr>
					   </thead>

                      <tbody>


                      </tbody>
                  </table>
				   <h4><strong>REGISTRATION</strong> DETAILS</h4>
				   <table class="table table-striped table-hover" id="" cellspacing="5" width="90%">
                        <thead>
					  
					   <tr>
                      <td><b>Registration Number</b>:</td><td style="width:50px;">:</td>
					  <td><?php echo $vehicle_registration_number; ?></td>
                      </tr>
					   <tr>
					   <?php
                                                        $cmpName = $db->selectQuery("SELECT `company_name` FROM `sm_company` WHERE `company_id`='$vehicle_company'");
														 
                                                        ?>
                      <td><b>Company</b>:</td><td style="width:50px;">:</td>
					  <td><?php echo $cmpName[0]['company_name']; ?></td>
                      </tr>
					   <tr>
                      <td><b>Registration Date</b>:</td><td style="width:50px;">:</td>
					  <td><?php echo $vehicle_registration_date ; ?></td>
                      </tr>
					  
					  <tr>
                      <td><b>Registration Expiry Date:</b></td><td style="width:50px;">:</td>
					  <td><?php echo $vehicle_registration_expiry; ?></td>
                      </tr>
					  <tr>
                      <td><b>Registered Owner:</b></td><td style="width:50px;">:</td>
					  <td><?php echo $vehicle_registered_owner ; ?></td>
                      </tr>
					  <tr>
                      <td><b>Owner's Qatar ID:</b></td><td style="width:50px;">:</td>
					  <td><?php echo $vehicle_owner_qatar_id ; ?></td>
                      </tr>
					  </thead>
					  <tbody>


                      </tbody>
                  </table>
					  <h4><strong>INSURANCE</strong> DETAILS</h4>
					  <table class="table table-striped table-hover" id="" cellspacing="5" width="83%">
                        <thead>
					   <tr>
                      <td><b>Insurance Number:</b></td><td style="width:50px;">:</td>
					  <td><?php echo $vehicle_insurance_id ; ?></td>
                      </tr>
					   <tr>
                      <td><b>Insurance Type:</b></td><td style="width:50px;">:</td>
					  <td><?php echo $vehicle_insurance_type ; ?></td>
                      </tr>
					   <tr>
                      <td><b>Insurance Start Date:</b></td><td style="width:50px;">:</td>
					  <td><?php echo $vehicle_insurance_date ; ?></td>
                      </tr>
					   <tr>
                      <td><b>Insurance Expiry Date:</b></td><td style="width:50px;">:</td>
					  <td><?php echo $vehicle_insurance_expiry ; ?></td>
                      </tr>
					   <tr>
                      <td><b>Insurance Company:</b></td><td style="width:50px;">:</td>
					  <td><?php echo $vehicle_insurance_company ; ?></td>
                      </tr>
					   <tr>
                      <td><b>Insurance Amount:</b></td><td style="width:50px;">:</td>
					  <td><?php echo $vehicle_insurance_amount ; ?></td>
                      </tr>
					   <tr>
					   </thead>
					    <tbody>


                      </tbody>
                  </table>
				   <h4><strong>EULA</strong> DETAILS</h4>
				   <table class="table table-striped table-hover" id="" cellspacing="5" width="98%">
                        <thead>
                      <td><b>Vehicle Assigned To:</b></td><td style="width:50px;">:</td>
					  <?php
                      $cmpNameas = $db->selectQuery("SELECT `company_name` FROM `sm_company` WHERE `company_id`='$vehicle_assigned_company'");
					  ?>
					  <td><?php echo $cmpNameas[0]['company_name']; ?></td>
                      </tr>
					   <tr>
                      <td><b>Employee:</b></td><td style="width:50px;">:</td>
					  <td><?php echo $vehicle_assigned_employee ; ?></td>
                      </tr>
					   
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
  <!-- End: Main -->
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
       
        margin: 20mm 15mm 10mm 15mm; 
    }
      </style>

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
