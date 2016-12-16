<?php
$page = "calendar";
$sub="";
include("./file_parts/header.php");
?>
<!-- ====================================================
================= CONTENT ===============================
===================================================== -->

<link rel="stylesheet" href="assets/js/vendor/animsition/css/animsition.min.css">
<link rel="stylesheet" href="assets/js/vendor/fullcalendar/fullcalendar.css">
<style>
    .fc-time {
        display: none;
    }

    .head_color {
        color: #0a6aa1;
    }

    hr {
        margin-top: 0px !important;
    }

    #ui-id-1 {
        color: #16a085;
    }

    .ui-dialog .ui-dialog-titlebar {
        padding: 1em !important;
    }
</style>
<section id="content">

    <div class="page page-full page-calendar">

        <div class="tbox tbox-sm">
            <!-- left side -->
            <div class="tcol w-lg bg-tr-white lt b-r">
                <!-- left side header-->
                <div class="p-15 bg-white">
                    <button type="button" class="btn btn-greensea btn-xs mb-10 pull-right b-0" data-toggle="modal"
                            href="#cal-new-event">
                        <i class="fa fa-plus"></i>
                    </button>
                    <h4 class="custom-font text-default m-0">Events</h4>
                </div>
                <!-- /left side header -->
                <!-- left side body -->
                <div class="p-15 collapse collapse-xs collapse-sm" id="external-events">
                    <?php
                    $custid = $_SESSION['id'];
                    $cal = $db->selectQuery("select * from event where custid='$custid' ORDER BY `id` DESC LIMIT 10");
                    if (count($cal)) {
                        for ($ce = 0; $ce < count($cal); $ce++) {
                            $date_cal = $cal[$ce]['date'];
                            $title = $cal[$ce]['title'];
                            ?>
                            <div class="p-10 mb-10 event-control b-l b-2x b-greensea">
                                <?php echo $title; ?>
                                <a id="event_edit" class="pull-right" href="event_edit.php?id=<?php echo $cal[$ce]['id']; ?>"><i class="fa fa-pencil" ></i></a>
                                <a id="event_del"  onclick="delete_id('<?php echo $cal[$ce]['id']; ?>')" class="pull-right text-muted" data-toggle="modal" data-target="#delEvnt" data-options="splash-ef-3"><i class="fa fa-trash-o" style="margin-right:5px;"></i></a>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <!-- /left side body -->
            </div>
            <!-- /left side -->
            <!-- right side -->
            <div class="tcol">

                <!-- right side header -->
                <div class="p-15 bg-white">
                    <div class="pull-right">
                        <button type="button" class="btn btn-sm btn-default" id="change-view-today">today</button>
                        <div class="btn-group">
                            <button class="btn btn-default btn-sm" id="change-view-day">Day</button>
                            <button class="btn btn-default btn-sm" id="change-view-week">Week</button>
                            <button class="btn btn-default btn-sm" id="change-view-month">Month</button>
                        </div>
                    </div>
                    <h4 class="custom-font text-default m-0">Calendar</h4>
                </div>
                <!-- /right side header -->


                <!-- right side body -->
                <div class="p-15">

                    <div id='calendar'></div>

                </div>
                <!-- /right side body -->


            </div>
            <!-- /right side -->


        </div>

    </div>

</section>
<!--/ CONTENT -->
</div>
<!--/ Application Content -->
<!-- Modal -->
<div id="eventContent" title="Event Details" style="display:none;">
    <!--<a href="" title="edit" class="edit_calendar"><i class="fa fa-pencil"></i></a>-->
    <a href="" title="Delete" class="delete_calendar"><i class="fa fa-trash"></i></a>	<a href="javascript:void(0)" title="Edit" class="events_edit"><i class="fa fa-pencil"></i></a>
    <input type="hidden" id="event_del_id" />
    <div id="eventContent" title="Event Details">

        <div id="eventInfo"></div>
        <div class="row">
            <div class="col-md-12">
                <label class="head_color"><b>Coordinator </b></label>
                <p id="eventCoordinator"></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <label class="head_color"><b>Contact E-mail </b></label>
                <p id="eventEmail"></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <label class="head_color"><b>Event Date </b></label>
                <p id="eventDate"></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <label class="head_color"><b>Description</b></label>
                <p id="eventDescription"></p></strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <label class="head_color"><b>Company</b></label>
                <p id="eventCompany"></p></strong>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="cal-new-event" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font">Add New Events</h3>
            </div>
            <form role="form" id="add-event" method="post" name="add-event">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label">Event Coordinator *</label>
                            <input type="text" class="form-control" id="event_coordinator" name="event_coordinator" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Contact Email *</label>
                            <input type="text" class="form-control" id="contact_email" name="contact_email" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Event Date * </label>
                            <div class='input-group datepicker w-6s20 mt-10' data-format="L">
                                <input type="text" id="event_date" name="event_date" class="form-control" required=""/>
                                <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Event Time * </label>
                            <input type="" id="event_time" name="event_time" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Company * </label>
                        <select id="company" name="company" class="form-control" >
                            <option value="" selected="">Select</option>
                            <?php
                            $adCom = $db->selectQuery("SELECT `company_name` FROM `sm_company`");
                            if (count($adCom)) {
                                for ($cm = 0; $cm < count($adCom); $cm++) {
                                    ?>
                                    <option
                                        value="<?php echo $adCom[$cm]['company_name']; ?>"><?php echo $adCom[$cm]['company_name']; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Event Title *</label>
                        <input type="text" class="form-control" id="event-title" name="event-title" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Description *</label>
                        <textarea class="form-control" id="event_description" name="event_description" ></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="event_btn" id="event_btn" class="btn btn-success" value="Add event"/>
                    <button class="btn btn-lightred btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i
                            class="fa fa-arrow-left"></i> Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal splash fade" id="delEvnt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font">Sure To Remove This Record ?</h3>
            </div>
            <input type="hidden" id="hid_del" value=""/>
            <div class="modal-body">

                <!--                <p>This sure is a fine modal, isn't it?</p>

                 <p>Modals are streamlined, but flexible, dialog prompts with the minimum required functionality and smart defaults.</p>-->
            </div>
            <div class="modal-footer">
                <button class="btn btn-default btn-border" id="del_btn">Yes</button>
                <button class="btn btn-default btn-border" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


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

<script src="assets/js/vendor/fullcalendar/lib/moment.min.js"></script>
<script src="assets/js/vendor/fullcalendar/lib/jquery-ui.custom.min.js"></script>
<script src="assets/js/vendor/fullcalendar/fullcalendar.min.js"></script>
<script src="assets/js/vendor/daterangepicker/moment.min.js"></script>
<script src="assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="assets/js/jquerysession.js"></script>

<script src="http://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css"/>

<!--/ vendor javascripts -->


<!-- ============================================
============== Custom JavaScripts ===============
============================================= -->
<script src="assets/js/main.js"></script>
<!--/ custom javascripts -->


<script>
    function delete_id(id) {
        $.session.set('delete_seesion', id);
        $('#hid_del').val($.session.get('delete_seesion'));

    }
    $('#del_btn').click(function () {
        var event_id = $('#hid_del').val();
        $.ajax({
            url: "delete_event.php",
            type: "POST",
            data: {event_id: event_id},
            success: function (data) {
                location.href = "calendar.php";
            }
        });
    });
    $('.delete_calendar').click(function () {
        var event_id = $(this).siblings('#event_del_id').val();
        $.ajax({
            url: "delete_event.php",
            type: "POST",
            data: {event_id: event_id},
            success: function () {
               location.href = "calendar.php";
            }
        });
    });
    /* ************** Edit Event ***************** */		/*$('.events_edit').click(function () {        var event_id = $(this).siblings('#event_del_id').val();        $.ajax({			            url: "event_edit.php",            type: "POST",            data: {event_id: event_id,cust_id: <?php echo $_SESSION['id']; ?>},            success: function (event_array) {			//$('#add-event').html(data);			//$('#cal-new-event').modal('show');			//alert(event_array.coordinator);							//$("#event_coordinator").html(data.coordinator);               /* $("#eventCoordinator").html(event.coordinator);                $("#eventEmail").html(event.email);                $("#eventDate").html(event.start);                $("#eventCompany").html(event.company);*/								  /*location.href = "event_edit.php";            }        });*/    /*}); */

   /* $('#del_btn').click(function () {
        var event_id = $('#hid_del').val();
        $.ajax({
            url: "delete_event.php",
            type: "POST",
            data: {event_id: event_id},
            success: function (data) {
                location.href = "calendar.php";
            }
        });
    });*/
</script>


<!-- ===============================================
============== Page Specific Scripts ===============
================================================ -->
<script>
    $(window).load(function () {

        $('#calendar').fullCalendar({
            header: {
                left: 'prev',
                center: 'title',
                right: 'next'
            },
            eventClick: function (event, jsEvent, view) {
                //set the values and open the modal
                $("#eventDescription").html(event.description);
                $("#eventCoordinator").html(event.coordinator);
                $("#eventEmail").html(event.email);
                $("#eventDate").html(event.start);
                $("#eventCompany").html(event.company);
                $('#event_del_id').val(event.id);
                $('.edit_calendar').attr('href',"calendar_edit.php?id="+event.id);								$('.edit_calendar').attr('href',"edit_event.php?id="+event.id);								$('.events_edit').attr('href',"event_edit.php?id="+event.id)
                //$("#eventLink").attr('href', event.url);
                $("#eventContent").dialog({modal: true, title: event.title});
            },
            //defaultDate: '2015-02-12',
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar
            drop: function () {
                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove();
                }
            },
            eventLimit: true, // allow "more" link when too many events
            events: "calendar_ajax.php"
        });
        // Hide default header
        //$('.fc-header').hide();


        // Previous month action
        $('#cal-prev').click(function () {
            $('#calendar').fullCalendar('prev');
        });
        // Next month action
        $('#cal-next').click(function () {
            $('#calendar').fullCalendar('next');
        });
        // Change to month view
        $('#change-view-month').click(function () {
            $('#calendar').fullCalendar('changeView', 'month');
            // safari fix
            $('#content .main').fadeOut(0, function () {
                setTimeout(function () {
                    $('#content .main').css({'display': 'table'});
                }, 0);
            });
        });
        // Change to week view
        $('#change-view-week').click(function () {
            $('#calendar').fullCalendar('changeView', 'agendaWeek');
            // safari fix
            $('#content .main').fadeOut(0, function () {
                setTimeout(function () {
                    $('#content .main').css({'display': 'table'});
                }, 0);
            });
        });
        // Change to day view
        $('#change-view-day').click(function () {
            $('#calendar').fullCalendar('changeView', 'agendaDay');
            // safari fix
            $('#content .main').fadeOut(0, function () {
                setTimeout(function () {
                    $('#content .main').css({'display': 'table'});
                }, 0);
            });
        });
        // Change to today view
        $('#change-view-today').click(function () {
            $('#calendar').fullCalendar('today');
        });
        /* initialize the external events
         -----------------------------------------------------------------*/
        $('#external-events .event-control').each(function () {

            // store data so the calendar knows to render an event upon drop
            $(this).data('event', {
                title: $.trim($(this).text()), // use the element's text as the event title
                stick: true // maintain when user navigates (see docs on the renderEvent method)
            });
            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true, // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });
        });
        $('#external-events .event-control .event-remove').on('click', function () {
            $(this).parent().remove();
        });
        $('#event_btn').click(function () {
            var event_coordinator = $('#event_coordinator').val();
            var company = $('#company').val();
            var event_title = $('#event-title').val();
            var description = $('#event_description').val();
            var event_time = $('#event_time').val();
            var event_date = $('#event_date').val();
            var contact_email = $('#contact_email').val();
            $.ajax({
                url: "calendar_events.php",
                type: "post",
                data: {
                    event_coordinator: event_coordinator,
                    company: company,
                    event_title: event_title,
                    description: description,
                    event_time: event_time,
                    event_date: event_date,
                    contact_email: contact_email
                },
                success: function (data) {
                window.location.href = "calendar.php";
                }
            });
        });

        // Submitting new event form
        $('#add-event').submit(function (e) {

            e.preventDefault();
            var form = $(this);
            var newEvent = $('<div class="event-control p-10 mb-10">' + $('#event-title').val() + '<a class="pull-right text-muted event-remove"><i class="fa fa-trash-o"></i></a></div>');
            $('#external-events .event-control:last').after(newEvent);
            $('#external-events .event-control').each(function () {

                // store data so the calendar knows to render an event upon drop
                $(this).data('event', {
                    title: $.trim($(this).text()), // use the element's text as the event title
                    stick: true // maintain when user navigates (see docs on the renderEvent method)
                });
                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 999,
                    revert: true, // will cause the event to go back to its
                    revertDuration: 0  //  original position after the drag
                });
            });
            $('#external-events .event-control .event-remove').on('click', function () {
                $(this).parent().remove();
            });
            form[0].reset();
            $('#cal-new-event').modal('hide');
        });
    });</script>
<!--/ Page Specific Scripts -->


<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function (b, o, i, l, e, r) {
        b.GoogleAnalyticsObject = l;
        b[l] || (b[l] =
            function () {
                (b[l].q = b[l].q || []).push(arguments)
            });
        b[l].l = +new Date;
        e = o.createElement(i);
        r = o.getElementsByTagName(i)[0];
        e.src = '../../www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e, r)
    }(window, document, 'script', 'ga'));
    ga('create', 'UA-XXXXX-X', 'auto');
    ga('send', 'pageview');
</script>

</body>

<!-- Mirrored from www.tattek.sk/minovate-noAngular/calendar.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Jun 2016 08:44:57 GMT -->
</html>
