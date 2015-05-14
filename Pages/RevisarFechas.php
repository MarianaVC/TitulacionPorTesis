<?php
/**
* User: Mariana
* Date: 17/04/2015
* Página inicial del perfil del alumno.
*/
session_set_cookie_params(0);
session_start(); //---> session_start() sirve para que la sesión esté activa.
require_once '../Clases/Conexion.php';
require_once '../Clases/SecretariaTecnica.php';
require_once '../Clases/Alumno.php';
require_once '../Clases/SRO.php';
require_once '../Clases/Notificacion.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Facultad de Estudios Superiores Acatlán</title>
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
		<link rel="stylesheet" href="assets/css/ace.min.css" />
		<link rel="stylesheet" href="assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script src="assets/js/jquery-1.11.2.js"></script>
		<script src="assets/js/bootstrap.js"></script>
	</head>
	<body>
		<div class="container">
			<?php require_once 'navbarST.php';?>
			<div class="main-container ">
				<div class="sidebar" id="sidebar">
					<ul class="nav nav-list">
						<li class="active">
							<a href="PerfilST.php">
								<i class="icon-dashboard"></i>
								<span class="menu-text"> Inicio </span>
							</a>
						</li>
						<li>
							<a href="NuevoDT.php">
								<i class="icon-bolt"></i>
								<span class="menu-text"> Nuevo DT </span>
							</a>
						</li>
						<li>
							<a href="NuevoSinodal.php" class="dropdown-toggle">
								<i class="icon-bolt"></i>
								<span class="menu-text"> Nuevo Sinodal </span>
							</a>
						</li>
						<li>
							<a href="RevisarSRO.php">
								<i class="icon-list"></i>
								<span class="menu-text"> Revisar SRO </span>
							</a>
						</li>
						<li>
							<a href="RevisarNTT.php" class="dropdown-toggle">
								<i class="icon-list"></i>
								<span class="menu-text"> Revisar NTT </span>
							</a>
						</li>
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-edit"></i>
								<span class="menu-text"> Exámenes</span>
								<b class="arrow icon-angle-down"></b>
							</a>
							<ul class="submenu">
								<li>
									<a href="RevisarFechas.php">
										<i class="icon-double-angle-right"></i>
										Revisar fechas
									</a>
								</li>
								<li>
									<a href="RegistrarResultados.php">
										<i class="icon-double-angle-right"></i>
										Registrar Resultados
									</a>
								</li>
							</ul>
						</li>
					</div>
					<div class="page-content">
						<div class="page-header position-relative" style="padding-left: 250px">
							<h1>
							Próximas fechas de exámenes profesionales
							</h1>
							</div><!--/.page-header-->
							<div class="row-fluid">
								<div class="span12">
									<!--PAGE CONTENT BEGINS-->
									<div class="row-fluid">
										<div class="span11" style="padding-left : 250px">
											<div class="space"></div>
											<div id="calendar"></div>
										</div>
									</div>
								</div>
							</div>
							<div>
								<br>
							</div>
							<div>
								<br>
							</div>
							<div>
								<br>
							</div>
							
						</div>
						
					</div>
					<div class="container">
						<?php require_once'footer.php' ?>
					</div>
					
					<!--basic scripts-->
					<!--[if !IE]>-->
					<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
					<!--<![endif]-->
					<!--[if IE]>
					<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
					<![endif]-->
					<!--[if !IE]>-->
					<script type="text/javascript">
					window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
					</script>
					<!--<![endif]-->
					<!--[if IE]>
					<script type="text/javascript">
					window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
					</script>
					<![endif]-->
					<script type="text/javascript">
					if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
					</script>
					<script src="assets/js/bootstrap.min.js"></script>
					<!--page specific plugin scripts-->
					<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>
					<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
					<script src="assets/js/fullcalendar.min.js"></script>
					<script src="assets/js/bootbox.min.js"></script>
					<!--ace scripts-->
					<script src="assets/js/ace-elements.min.js"></script>
					<script src="assets/js/ace.min.js"></script>
					<!--inline scripts related to this page-->
					<script type="text/javascript">
						$(function() {
					/* initialize the external events
					-----------------------------------------------------------------*/
					$('#external-events div.external-event').each(function() {
					// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
					// it doesn't need to have a start or end
					var eventObject = {
						title: $.trim($(this).text()) // use the element's text as the event title
					};
					// store the Event Object in the DOM element so we can get to it later
					$(this).data('eventObject', eventObject);
					// make the event draggable using jQuery UI
					$(this).draggable({
						zIndex: 999,
						revert: true,      // will cause the event to go back to its
						revertDuration: 0  //  original position after the drag
					});
					
					});
					/* initialize the calendar
					-----------------------------------------------------------------*/
					var date = new Date();
					var d = date.getDate();
					var m = date.getMonth();
					var y = date.getFullYear();
					
					var calendar = $('#calendar').fullCalendar({
					events: [
					{
						title: '305176145 SALON P201',
						start: new Date(y, m, 1),
						className: 'label-important'
					},
					{
						title: '351245789 AULA MAGNA',
						start: new Date(y, m, d-5),
						className: 'label-success'
					},
					{
						title: '305178948 AULA MAGNA',
						start: new Date(y, m, d-3, 16, 0),
						className: 'label-success'
					}]
					,
					editable: true,
					droppable: true, // this allows things to be dropped onto the calendar !!!
					drop: function(date, allDay) { // this function is called when something is dropped
					
						// retrieve the dropped element's stored Event Object
						var originalEventObject = $(this).data('eventObject');
						var $extraEventClass = $(this).attr('data-class');
						
						
						// we need to copy it, so that multiple events don't have a reference to the same object
						var copiedEventObject = $.extend({}, originalEventObject);
						
						// assign it the date that was reported
						copiedEventObject.start = date;
						copiedEventObject.allDay = allDay;
						if($extraEventClass) copiedEventObject['className'] = [$extraEventClass];
						
						// render the event on the calendar
						// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
						$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
						
						// is the "remove after drop" checkbox checked?
						if ($('#drop-remove').is(':checked')) {
							// if so, remove the element from the "Draggable Events" list
							$(this).remove();
						}
						
					}
					,
					selectable: true,
					selectHelper: true,
					select: function(start, end, allDay) {
						
						bootbox.prompt("New Event Title:", function(title) {
							if (title !== null) {
								calendar.fullCalendar('renderEvent',
									{
										title: title,
										start: start,
										end: end,
										allDay: allDay
									},
									true // make the event "stick"
								);
							}
						});
						
						calendar.fullCalendar('unselect');
						
					}
					,
					eventClick: function(calEvent, jsEvent, view) {
						var form = $("<form class='form-inline'><label>Change event name &nbsp;</label></form>");
						form.append("<input autocomplete=off type=text value='" + calEvent.title + "' /> ");
						form.append("<button type='submit' class='btn btn-small btn-success'><i class='icon-ok'></i> Save</button>");
						
						var div = bootbox.dialog(form,
							[
							{
								"label" : "<i class='icon-trash'></i> Delete Event",
								"class" : "btn-small btn-danger",
								"callback": function() {
									calendar.fullCalendar('removeEvents' , function(ev){
										return (ev._id == calEvent._id);
									})
								}
							}
							,
							{
								"label" : "<i class='icon-remove'></i> Close",
								"class" : "btn-small"
							}
							]
							,
							{
								// prompts need a few extra options
								"onEscape": function(){div.modal("hide");}
							}
						);
						
						form.on('submit', function(){
							calEvent.title = form.find("input[type=text]").val();
							calendar.fullCalendar('updateEvent', calEvent);
							div.modal("hide");
							return false;
						});
						
					
						//console.log(calEvent.id);
						//console.log(jsEvent);
						//console.log(view);
						// change the border color just for fun
						//$(this).css('border-color', 'red');
					}
					
					});
					})
					</script>
					<script type="text/javascript">
					if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
					</script>
					<script src="assets/js/bootstrap.min.js"></script>
					<script src="assets/js/bootstrap.min.js"></script>
					<!--page specific plugin scripts-->
					<!--[if lte IE 8]>
					<script src="assets/js/excanvas.min.js"></script>
					<![endif]-->
					<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>
					<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
					<script src="assets/js/jquery.slimscroll.min.js"></script>
					<script src="assets/js/jquery.easy-pie-chart.min.js"></script>
					<script src="assets/js/jquery.sparkline.min.js"></script>
					<script src="assets/js/flot/jquery.flot.min.js"></script>
					<script src="assets/js/flot/jquery.flot.pie.min.js"></script>
					<script src="assets/js/flot/jquery.flot.resize.min.js"></script>
					<!--ace scripts-->
					<script src="assets/js/ace-elements.min.js"></script>
					<script src="assets/js/ace.min.js"></script>
				</body>
			</html>