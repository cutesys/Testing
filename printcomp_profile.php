<?php
$id=$_GET['com_id'];
session_start(); 
ob_start();
include('connection.php');
if(!isset($_SESSION['id']))
{
	header('Location:index.php');
}

 $resFet = $db->selectQuery("select * from sm_company where company_id='$id' ");

                if (count($resFet)) {

                    for ($rC = 0; $rC < count($resFet); $rC++) {

                        $view_company_name = $resFet[$rC]['company_name'];

                        $view_company_pid = $resFet[$rC]['company_pid'];

                        $view_company_category = $resFet[$rC]['company_category'];

                        $view_company_email = $resFet[$rC]['company_email'];

                        $view_company_id = $resFet[$rC]['company_id'];

                        $view_company_phone = $resFet[$rC]['company_phone'];

                        $view_company_fax = $resFet[$rC]['company_fax'];

                        $view_company_owner = $resFet[$rC]['company_owner'];

                        $view_company_about = $resFet[$rC]['company_about'];

                        $view_company_address1 = $resFet[$rC]['company_address1'];

                        $view_company_address2 = $resFet[$rC]['company_address2'];

                        $view_company_door = $resFet[$rC]['company_door'];

                        $view_company_city = $resFet[$rC]['company_city'];

                        $view_company_region = $resFet[$rC]['company_region'];

                        $view_company_postbox = $resFet[$rC]['company_postbox'];

                        $view_company_sponsorfee = $resFet[$rC]['company_sponsor_fee'];
                    }
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
                    <span class="glyphicon glyphicon-tasks"></span><b>COMPANY DETAILS</b></div>
                </div>
                  <br><br><br>
                <div class="panel-body pn" style="overflow:auto !important;"   >
                 
                  <table class="table table-striped table-hover" id="" cellspacing="6" width="100%">
				 
                    <thead>
                      
					  <tr>
                      <td><b>Company Name</b></td>
					  
					  <td style="width:30px;">:</td><td><?php echo htmlspecialchars_decode($view_company_name); ?></td>
                      </tr>
					   <tr>
                      <td><b>Company ID</b></td>
					  <td style="width:50px;">:</td><td><?php echo $view_company_pid;?></td>
                      </tr>
					   <tr>
                      <td><b>Category</b></td>
					  <td style="width:50px;">:</td><td><?php echo $view_company_category?></td>
                      </tr>
					   <tr>
                      <td><b>Email</b></td>
					  <td style="width:50px;">:</td><td><?php echo $view_company_email;?></td>
                      </tr>
					   <tr>
                      <td><b>Phone</b></td>
					  <td style="width:50px;">:</td><td><?php echo $view_company_phone;?></td>
                      </tr>
					   <tr>
                      <td><b>Fax</b></td>
					  <td style="width:50px;">:</td><td><?php echo $view_company_fax;?></td>
                      </tr>
					   <tr>
                      <td><b>Owner</b></td>
					  <td style="width:50px;">:</td><td><?php echo $view_company_owner;?></td>
                      </tr>
					   <tr>
                      <td><b>About Company</b></td>
					  <td style="width:50px;">:</td><td><?php echo $view_company_about;?></td>
                      </tr>
					   <tr>
                      <td><b>Sponsorship Fee</b></td>
					  <td style="width:50px;">:</td><td><?php echo $view_company_sponsorfee;?></td>
                      </tr>
					   <tr>
                      <td><b>Address</b></td>
					  <td style="width:50px;">:</td><td><?php echo $view_company_address1;?></td>
					  
                      </tr>
					  
					  <tr><td></td><td style="width:50px;"></td><td><?php echo $view_company_address2;?></td></tr>
					  <tr><td></td><td style="width:50px;"></td><td><?php echo $view_company_door;?></td></tr>
					  <tr><td></td><td style="width:50px;"></td><td><?php echo $view_company_city;?></td></tr>
					  <tr><td></td><td style="width:50px;"></td><td><?php echo $view_company_region;?></td></tr>
					  <tr><td></td><td style="width:50px;"></td><td><?php echo $view_company_postbox;?></td></tr>
					   </thead>

                      <tbody>


                      </tbody>
					  </table>
					   <?php
					   $docc = $db->selectQuery("select * from sm_company_contacts where company_id=$id");

												
                                                if (count($docc)) {?>
					   
					   <table class="table table-striped table-hover" id="" cellspacing="5" width="100%">
                        <thead>
						<span class="glyphicon glyphicon-tasks"></span><h3>Contact Details</h3></div>
						<tr>
                                                          
                                                               <td width="50px;"><b>Name</b></td>
                                                               
                                                           
                                                           
                                                                <td width="50px;"><b>Designation</b></td>
                                                                
                                                            

                                                           
                                                                <td width="50px;"><b>Mail</b></td>
                                                                
																
																<td width="50px;"><b>Phone</b></td>
                                                                
                                                            

                                                        </tr>
					  
					    <?php
                                                    for ($i = 0; $i < count($docc); $i++) {
                                                        $contact_designation = $docc[$i]['contact_designation'];
                                                        $contact_name = $docc[$i]['contact_name'];
                                                        $contact_email = $docc[$i]['contact_email'];
                                                        $contact_phone = $docc[$i]['contact_phone'];
                                                        ?>
														
                                                        
														
                                                       
					 
                    </thead>
                    
                    <tbody>
                      <tr>
                        
                         <td width="50px;"><?php echo $contact_name; ?></td>
						 <td width="50px;"><?php echo $contact_designation; ?></td>
						 <td width="50px;"><?php echo $contact_email; ?></td>
						 <td width="50px;"><?php echo $contact_phone; ?></td>
                        
                        
                        
                      
                      </tr>
					   <?php
                                                    }
												
                                                ?>
					  
                    
                    </tbody>
                  </table>
												<?php } ?>
								    <table class="table table-striped table-hover" id="" cellspacing="10" width="100%">
                        <thead>
					  
					  
					    <?php
                                                $cDocs = $db->selectQuery("SELECT * FROM `sm_company_docs` WHERE `company_id`='$id' AND `doc_status`='1'");
												if(count($cDocs)>0)
														{
														echo '<div class="row">

                                                    <div class="form-group col-md-12 legend">

                                                        <h3><strong>Company</strong> Documents</h3>



                                                    </div>

                                                </div>';
												}

                                                if (count($cDocs)) {

                                                    for ($cd = 0; $cd < count($cDocs); $cd++) {

                                                        $cdoc_title = $cDocs[$cd]['doc_title'];
                                                        $cdoc_data = $cDocs[$cd]['doc_data'];
                                                        $cdoc_start1 = explode("-",$cDocs[$cd]['doc_start_date']);

                                                        $cdoc_start=$cdoc_start1[2]."/".$cdoc_start1[1]."/".$cdoc_start1[0];
                                                        $cdoc_end1 = explode("-",$cDocs[$cd]['doc_end_date']);
                                                        $cdoc_end=$cdoc_end1[2]."/".$cdoc_end1[1]."/".$cdoc_end1[0];
                                                        $cdoc_owner = $cDocs[$cd]['doc_owner'];
														$no=$cd+1;
                                                        ?>



                                                        

                                                                <tr>
                                                          
                                                                <td width="40px;"><b><?php echo $no; ?>. <?php echo $cdoc_title; ?></b></td>
																</tr>
																<tr>
																
																<td width="50px;">ID</td>
																<td style="width:50px;">:</td>
                                                                <td width="50px;"><?php echo $cdoc_data; ?></td>
																</tr>
																<tr>
																<td width="50px;">Owner</td>
																<td style="width:50px;">:</td>
                                                                <td width="50px;"><?php echo $cdoc_owner; ?></td>
																</tr>
                                                           
                                                                <tr>
                                                                <td width="50px;">Registration Date</td>
																<td style="width:50px;">:</td>
                                                                <td width="50px;"><?php echo $cdoc_start; ?></td>
																</tr>
                                                            

                                                                <tr>
                                                                <td width="50px;">Renewal Date</td>
																<td style="width:50px;">:</td>
                                                                <td width="50px;"><?php echo $cdoc_end; ?></td>
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
