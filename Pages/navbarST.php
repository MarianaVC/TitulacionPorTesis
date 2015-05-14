<script src="assets/js/jquery-1.11.2.js"></script>
<script src="assets/js/bootstrap.js"></script>
<?php require_once 'header.php';?>
<div class="navbar"style="width:1170px" >
	<div class="navbar-inner">
		<div class="container-fluid">
			<a href="#" class="brand">
				<small>
				<i class="icon-cog"></i>
				Perfil Secretaría Técnica de Carrera
				</small>
				</a><!--/.brand-->
				<ul class="nav ace-nav pull-right">
					<li class="grey">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#">
							<i class="icon-tasks"></i>
							<span class="badge badge-grey">4</span>
						</a>
						<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
							<li class="nav-header">
								<i class="icon-ok"></i>
								Ultimas noticias:
							</li>
							<li>
								<a href="#">
									<div class="clearfix">
										<span class="pull-left">50 alumnos se han registrado</span>
										<span class="pull-right">50%</span>
									</div>
									<div class="progress progress-mini ">
										<div style="width:65%" class="bar"></div>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<div class="clearfix">
										<span class="pull-left">2 alumnos han solicitado fecha de examen</span>
										<span class="pull-right">35%</span>
									</div>
									<div class="progress progress-mini progress-danger">
										<div style="width:35%" class="bar"></div>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<div class="clearfix">
										<span class="pull-left">Se han agregado 5 usuarios nuevos</span>
										<span class="pull-right">15%</span>
									</div>
									<div class="progress progress-mini progress-warning">
										<div style="width:15%" class="bar"></div>
									</div>
								</a>
							</li>
							<li>
								<li>
									<a href="#">
										Ver noticias en detalle
										<i class="icon-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>
						<li class="purple">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-bell-alt icon-animated-bell"></i>
								<span class="badge badge-important">13</span>
							</a>
							<ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-closer">
								<li class="nav-header">
									<i class="icon-warning-sign"></i>
									13 Notificaciones
								</li>
								<li>
									<a href="RevisarSRO.php">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-mini no-hover btn-success icon-group"></i>
												5 nuevas SRO
											</span>
											<span class="pull-right badge badge-success">+5</span>
										</div>
									</a>
								</li>
								<li>
									<a href="RevisarNTT.php">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-mini no-hover btn-info icon-group"></i>
												5 nuevas NTT
											</span>
											<span class="pull-right badge badge-info">+5</span>
										</div>
									</a>
								</li>
								<li>
									<a href="RevisarFechas.php">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-mini no-hover btn-info icon-calendar"></i>
												3 nuevas fechas
											</span>
											<span class="pull-right badge badge-info">+5</span>
										</div>
									</a>
								</li>
							</ul>
						</li>
						<li class="light-blue">
							<a href="../index.php">
								Cerrar Sesión
								<i class="icon-off"></i>
							</a>
						</li>
						<li class="green">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-envelope icon-animated-vertical"></i>
								<span class="badge badge-success">5</span>
							</a>
							<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
								<li class="nav-header">
									<i class="icon-envelope-alt"></i>
									5 Messages
								</li>
								<li>
									<a href="#">
										<img src="assets/avatars/avatar2.png" class="msg-photo" alt="Alex's Avatar" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Alex:</span>
												Ciao sociis natoque penatibus et auctor ...
											</span>
											<span class="msg-time">
												<i class="icon-time"></i>
												<span>a moment ago</span>
											</span>
										</span>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="assets/avatars/avatar2.png" class="msg-photo" alt="Susan's Avatar" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Susan:</span>
												Vestibulum id ligula porta felis euismod ...
											</span>
											<span class="msg-time">
												<i class="icon-time"></i>
												<span>20 minutes ago</span>
											</span>
										</span>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="assets/avatars/avatar2.png" class="msg-photo" alt="Bob's Avatar" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Bob:</span>
												Nullam quis risus eget urna mollis ornare ...
											</span>
											<span class="msg-time">
												<i class="icon-time"></i>
												<span>3:15 pm</span>
											</span>
										</span>
									</a>
								</li>
								<li>
									<a href="#">
										See all messages
										<i class="icon-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/avatars/avatar2.png"/>
								<span class="user-info">
									<small><?php echo $_SESSION['nombre'];?></small>
								</span>
							</a>
						</li>
						</ul><!--/.ace-nav-->
						</div><!--/.container-fluid-->
						</div><!--/.navbar-inner-->
					</div>
					<script type="text/javascript">
					if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
					</script>
					<script src="assets/js/bootstrap.min.js"></script>
					<script src="assets/js/bootstrap.min.js"></script>
					<!--page specific plugin scripts-->