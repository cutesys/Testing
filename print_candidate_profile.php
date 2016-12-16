<?php
$id=$_GET['uid'];
session_start(); 
ob_start();
include('connection.php');
if(!isset($_SESSION['id']))
{
	header('Location:index.php');
}

$resCandi = $db->selectQuery("SELECT * FROM `sm_candidate` WHERE `candidate_id`='$id'");
if (count($resCandi)) {
    $candidate_code = $resCandi[0]['candidate_code'];
    $agent_code = $resCandi[0]['agent_code'];
    $candidate_added_by = $resCandi[0]['candidate_added_by'];
    $candidate_firstname = $resCandi[0]['candidate_firstname'];
    $candidate_middlename = $resCandi[0]['candidate_middlename'];
    $candidate_lastname = $resCandi[0]['candidate_lastname'];
    $candidate_gender = $resCandi[0]['candidate_gender'];
    $candidate_marital_status = $resCandi[0]['candidate_marital_status'];
    $candidate_dob = $resCandi[0]['candidate_dob'];
    $candidate_doorno = $resCandi[0]['candidate_doorno'];
    $candidate_nationality = $resCandi[0]['candidate_nationality'];
    $candidate_state = $resCandi[0]['candidate_state'];
    $candidate_city = $resCandi[0]['candidate_city'];
    $candidate_zipcode = $resCandi[0]['candidate_zipcode'];
    $candidate_email = $resCandi[0]['candidate_email'];
    $candidate_phone = $resCandi[0]['candidate_phone'];
    $candidate_status = $resCandi[0]['candidate_status'];
    $candidate_interview_status = $resCandi[0]['candidate_interview_status'];
}
/*$dpImg = "";
$resLogo = $db->selectQuery("SELECT * FROM `sm_candidate_files` WHERE `file_name`='Candidate_Picture' AND `file_status`='1' AND `candidate_id`='$id'");
 
	$display_name = ""; 
	$select_name = $db->selectQuery("SELECT `candidate_added_by` FROM `sm_candidate` WHERE `candidate_id`='$id'");
	if(!empty($select_name))
	{
		$display_name = $select_name[0]['candidate_added_by'];
	}
if (count($resLogo)){	
	if($display_name == 'agent')
	{
		$dpImgs = str_replace("../","",$resLogo[0]['file_path']);
	} else {
		$dpImgs = $resLogo[0]['file_path'];
	}
if (file_exists($dpImgs)) {
    $dpImg = $dpImgs;
} else {
	$dpImg = "assets/images/profile-default.png";
}
} else {
    $dpImg = "assets/images/profile-default.png";
}*/
 ?>
<!DOCTYPE html>
<html>
<head>
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <title>SME</title>
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
                    <span class="glyphicon glyphicon-tasks"></span><b>Candidate Details</b></div>
                </div>
                  <br><br><br>
                <div class="panel-body pn" style="overflow:auto !important;"   >
                 
                  <table class="table table-striped table-hover" id="" cellspacing="5" width="100%">
				 
                    <thead>
                      <tr>
                        <td><b>Name</b></td><td style="width:40px;">:</td>
                        <td><?php echo $candidate_firstname; ?>  <?php echo $candidate_middlename ; ?>  <?php echo $candidate_lastname ; ?> </td>
					  </tr>
					 <?php /*  <tr>
                      <td><b>Company Name</b></td><td style="width:40px;">:</td>
					   <?php
                       $cmpName = $db->selectQuery("SELECT `company_name` FROM `sm_company` WHERE `company_id`='$employee_company'");
                       ?>
					  <td><?php echo $cmpName[0]['company_name']; ?></td>
                      </tr> */ ?>
					   <tr>
                      <td><b>Candidate ID</b></td><td style="width:40px;">:</td>
					  <td><?php echo $candidate_code;?></td>
                      </tr>
					   <tr>
                      <td><b>Marital Status</b></td><td style="width:40px;">:</td>
					  <td><?php echo $candidate_marital_status;?></td>
                      </tr>
					   <tr>
                      <td><b>Gender</b> </td><td style="width:40px;">:</td>
					  <td><?php echo $candidate_gender;?></td>
                      </tr>
					   <tr>
                      <td><b>Date of Birth</b> </td><td style="width:40px;">:</td>
						<?php
						$candidate_dob1 = explode("-", $candidate_dob);
						$candidate_dobs = $candidate_dob1[2] . "/" . $candidate_dob1[1] . "/" . $candidate_dob1[0];
						?>
					  <td><?php echo $candidate_dobs;?></td>
                      </tr>
					   <tr>
                      <td><b>Nationality</b> </td><td style="width:40px;">:</td>
					  <td><?php echo $candidate_nationality;?></td>
                      </tr>
					   <tr>
                      <td><b>Address</b> </td><td style="width:40px;">:</td>
					  <td><?php echo $candidate_doorno;?></td>
                      </tr>
					   <tr>
                      <td><b>City</b> </td><td style="width:40px;">:</td>
					  <td><?php echo $candidate_city;?></td>
                      </tr>
					   <tr>
                      <td><b>Region/State</b> </td><td style="width:40px;">:</td>
					  <td><?php echo $candidate_state;?></td>
                      </tr>
					   <tr>
                      <td><b>Zip code</b> </td><td style="width:40px;">:</td>
					  <td><?php echo $candidate_zipcode;?></td>
                      </tr>
					   <tr>
                      <td><b>E-mail</b></td><td style="width:40px;">:</td>
					  <td><?php echo $candidate_email;?></td>
                      </tr>
					  <tr>
                      <td><b>Phone</b></td><td style="width:40px;"></td>
					  <td><?php echo $candidate_phone;?></td>
                      </tr>
					  
					  
					  
					  
					   
					  <?php 
						$qualif = $db->selectQuery("SELECT * FROM `sm_candidate_qualifications` WHERE `candidate_id`='$id'");
						if (count($qualif)) {
						?>
					  <tr>
                      <td><h4><b>Qualifications Details</b></h4></td><td style="width:40px;"></td>
                      </tr>
					<?php
						for ($qi = 0; $qi < count($qualif); $qi++) {
					?>
					  <tr>
                      <td><b>Qualification <?php echo $nq = $qi + 1; ?></b></td><td style="width:40px;">:</td>
					  <td><?php echo $qualif[$qi]['qualification_name']; ?></td>
                      </tr>
					  <tr>
                      <td><b>Status </b></td><td style="width:40px;">:</td>
					  <td><?php echo $qualif[$qi]['qualification_status']; ?></td>
                      </tr>
					<?php } } ?> 
					<!--</thead>
						<tbody>


                      </tbody>
                  </table>
				  
				  <table class="table table-striped table-hover" id="" cellspacing="5" width="100%">
                        <thead> -->
					
					<?php 
						$appli = $db->selectQuery("SELECT * FROM `sm_candidate_application` WHERE `candidate_id`='$id'");
						if (count($appli)) {
					?>
					<tr>
                      <td><h4><b>Applied For</b></h4></td><td style="width:40px;"></td>
                      </tr>
					<?php
						for ($qi = 0; $qi < count($appli); $qi++) {
					?>
					<?php $select_interview = $db->selectQuery("SELECT `interview_name` FROM `sm_interview` WHERE `interview_id`='".$appli[$qi]['interview_id']."'");
						  if (count($select_interview)) {  
					?>
						<tr>
                      <td><b>Interview <?php echo $nq = $qi + 1; ?></b></td><td style="width:40px;">:</td>
					  <td><?php echo @$select_interview[0]['interview_name']; ?></td>
                      </tr>
					  <?php } ?>
					  <tr>
                      <td><b>Job Position <?php echo $nq = $qi + 1; ?></b></td><td style="width:40px;">:</td>
					  <td><?php echo $appli[$qi]['application_job_position']; ?></td>
                      </tr>
					  <tr>
                      <td><b>Job Category <?php echo $nq = $qi + 1; ?></b></td><td style="width:40px;">:</td>
					  <td><?php echo $appli[$qi]['application_job_category']; ?></td>
                      </tr>
					  <tr>
                      <td><b>Skills <?php echo $nq = $qi + 1; ?></b></td><td style="width:40px;">:</td>
					  <td><?php echo $appli[$qi]['application_skills']; ?></td>
                      </tr>
					<?php } } ?>
					
					</thead>
						<tbody>


                      </tbody>
                  </table>
				  
				  
				  <table class="table table-striped table-hover" id="" cellspacing="5" width="100%">
				  <?php $docum = $db->selectQuery("SELECT * FROM `sm_candidate_documents` WHERE `candidate_id`='$id'");
						if (count($docum)) { ?>
					<tr>
                      <td><h4><b>Document Details</b></h4></td><td style="width:40px;"></td>
                      </tr>	
					  <?php
						for ($doc = 0; $doc < (count($docum)); $doc++) { 
					?>
					<tr>
					<td><?php echo $docum[$doc]['documents_title']; ?></td><td style="width:40px;">:</td><td><?php echo $docum[$doc]['documents_data']; ?></td> 
					<?php if($docum[$doc]['documents_title'] != 'ID Card'){ ?>
					<td><b>Commencing Date : </b><?php echo $docum[$doc]['documents_start_date']; ?><b> End Date : </b> <?php echo $docum[$doc]['documents_end_date']; ?></td>
					<?php } ?>
					</tr>
					<?php } } ?>
					<tbody>
                      </tbody>
                  </table>
				  
				  <table class="table table-striped table-hover" id="" cellspacing="5" width="100%">
                        <thead> 
						
					
					<?php /*<tr>
                      <td><h4><b>Experience Details</b></h4></td><td style="width:40px;"></td>
                      </tr>*/ ?>
					<?php 
					$experience = $db->selectQuery("SELECT * FROM `sm_candidate_experience` WHERE `candidate_id`='$id'");
                    if (count($experience)) {
                       
					?>
					 <?php /*  
					 <tr>
                      <td><b>Company Name <?php echo $exps = $exp + 1; ?></b></td><td style="width:40px;">:</td>
					  <td><?php echo $experience[$exp]['experience_company']; ?></td>
                      </tr>
					  
					  <tr>
                      <td><b>Designation <?php echo $exps = $exp + 1; ?></b></td><td style="width:40px;">:</td>
					  <td><?php echo $experience[$exp]['experience_designation']; ?></td>
                      </tr> */ ?>
					  
					  <?php /* <tr>
                      <td><b>Company Name </b></td><td style="width:20px;">:</td><td><?php echo $experience[$exp]['experience_company']; ?></td>
					  <td><b>From</b> : <?php echo $datetime1->format("d/m/Y"); ?> <b>To</b> : <?php echo $datetime2->format("d/m/Y"); ?> </td>
					  <?php /* <td><?php echo $exper; ?></td> */ ?>
					  <?php /*<td><b>Designation </b></td><td style="width:20px;">:</td><td><?php echo $experience[$exp]['experience_designation']; ?></td>
                      </tr> */ ?>
					  <ul style="list-style-type:none" ><li><h4>Experience Details</h4></li></ul>
					  <?php  for ($exp = 0; $exp < count($experience); $exp++) { ?>
					  <?php
						$datetime1 = new DateTime($experience[$exp]['experience_from']);
						$datetime2 = new DateTime($experience[$exp]['experience_to']);
						?>
						<?php
						$interval = $datetime1->diff($datetime2);
						$exper = $interval->format('%y years %m months and %d days')
						?>
					  <ul style="list-style-type:none">
						<li><b>Company Name:</b> <?php echo $experience[$exp]['experience_company']; ?></li>
						<li><b>From :</b> <?php echo $datetime1->format("d/m/Y"); ?> To : <?php echo $datetime2->format("d/m/Y"); ?></li>
						<li><b>Designation :</b> <?php echo $experience[$exp]['experience_designation']; ?></li>
						<li><b>Experience:</b> <?php echo $exper; ?></li>
					  </ul>
					<?php } } ?>
					
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
