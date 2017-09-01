<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laravel Demo |  Admin</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?=URL::to("/");?>/public/asset/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?=URL::to("/");?>/public/asset/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?=URL::to("/");?>/public/asset/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?=URL::to("/");?>/public/asset/plugins/datatables/dataTables.bootstrap.css">
	<link rel="stylesheet" href="<?=URL::to("/");?>/public/asset/plugins/select2/select2.min.css">
	<link rel="stylesheet" href="<?=URL::to("/");?>/public/asset/plugins/datepicker/datepicker3.css">
	<link rel="stylesheet" href="<?=URL::to("/");?>/public/asset/plugins/timepicker/bootstrap-timepicker.min.css">
    <script src="<?=URL::to("/");?>/public/asset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="<?=URL::to("/");?>/public/asset/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=URL::to("/");?>/public/asset/plugins/fastclick/fastclick.min.js"></script>
    <script src="<?=URL::to("/");?>/public/asset/dist/js/app.min.js"></script>
    <script src="<?=URL::to("/");?>/public/asset/dist/js/demo.js"></script>
    <script src="<?=URL::to("/");?>/public/asset/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=URL::to("/");?>/public/asset/plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script src="<?=URL::to("/");?>/public/asset/plugins/select2/select2.full.min.js"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<script src="<?=URL::to("/");?>/public/asset/js/jquery.form.js"></script>
    <script src="<?=URL::to("/");?>/public/asset/js/jquery.validate.js"></script>
    <script src="<?=URL::to("/");?>/public/asset/js/bootbox.min.js"></script>
    <script src="<?=URL::to("/");?>/public/asset/js/manual_datatable.js"></script>
    <script src="<?=URL::to("/");?>/public/asset/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="<?=URL::to("/");?>/public/asset/plugins/timepicker/bootstrap-timepicker.min.js"></script>
	<link href="<?=URL::to("/");?>/public/asset/css/dataTables.tableTools.css" rel="stylesheet"/>
	<link href="<?=URL::to("/");?>/public/asset/css/styles.css" rel="stylesheet"/>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
		<header class="main-header">
        <a href="" class="logo">
        <!--   <span class="logo-mini"><b>ZZZ</b></span>  -->
          <span class="logo-lg"><b>Laravel Demo</b> Admin</span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs">Admin</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-footer">
                    <div class="pull-right">					  
                      <a href="<?=URL::to("/");?>/logout" class="btn btn-default btn-flat">Logout</a>
                    </div>                    
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <aside class="main-sidebar">
		<section class="sidebar">
			<ul class="sidebar-menu">
				<li class="treeview">
					<a href="#">
						<i class="fa fa-dashboard"></i><span>Employee Master</span><i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?=URL::to("/");?>/employee"><i class="fa fa-circle-o"></i><span>Employee List</span></i></a></li>
						<li><a href="<?=URL::to("/");?>/employee/addedit"><i class="fa fa-circle-o"></i><span>Employee Add</span></i></a></li>
					</ul>
				</li>
			</ul>		
		</section>
	</aside>