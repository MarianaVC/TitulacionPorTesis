<div class="container">
	<?php require_once 'header.php';?>
	<div class="navbar" >
		<div class="navbar-inner">
			<div class="container-fluid">
				<a href="#" class="brand">
					<small>
					<i class="icon-group"></i>
					Perfil Alumno
					</small>
					</a><!--/.brand-->
					<ul class="nav ace-nav pull-right">
						<li class="grey">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-tasks"></i>
								<span class="badge badge-grey">4</span>
							</a>
						</li>
						<li class="purple">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-bell-alt icon-animated-bell"></i>
								<span class="badge badge-important">8</span>
							</a>
							<ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-closer">
								<li>
									<a href="#">
										<i class="btn btn-mini btn-primary icon-user"></i>
										Bob just signed up as an editor ...
									</a>
								</li>
								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-mini no-hover btn-success icon-shopping-cart"></i>
												New Orders
											</span>
											<span class="pull-right badge badge-success">+8</span>
										</div>
									</a>
								</li>							</ul>
							</li>
							<li class="green">
								<a data-toggle="dropdown" class="dropdown-toggle" href="#">
									<i class="icon-envelope icon-animated-vertical"></i>
									<span class="badge badge-success">5</span>
								</a>
								<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
								</ul>
							</li>
							<li class="light-blue">
								<a data-toggle="dropdown" href="#" class="dropdown-toggle">
									<img class="nav-user-photo" src="assets/avatars/avatar2.png" alt="Jason's Photo" />
									<span class="user-info">
										
										<small><?php echo $_SESSION['nombre']." ".$_SESSION['apaterno']." ".$_SESSION['amaterno'] ?></small>
										
									</span>
									<i class="icon-caret-down"></i>
								</a>
								<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
																	</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<br>