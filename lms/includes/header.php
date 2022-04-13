<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Library Management System</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
 <!-- jQuery 2.1.3 -->
 <!-- <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script> -->

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo"><b>Library</b>Mgmt<b>System</b></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <!-- <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"></a>
            <span class="sr-only">Toggle navigation</span>
          </a> -->
          <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="logout.php">Logout</a></li>
        </ul>
      </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <!--<img src=".jpg" class="img-circle" alt="User Image" /> -->
              <img src="img/lms.jpg" class="img-circle" alt="lms" >
            </div>
            <div class="pull-left info">
              <p>LMS</p>

              <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
            </div>
          </div>
          <!-- search form 
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
               <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview ">
              <a href="index.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
                <!-- yo thau ma chai menu ko kura halni hai -->
              </a>
               <!-- <ul class="treeview-menu">
                <li><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                <li class="active"><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
              </ul> -->
            </li> 
            <li class="treeview t1">
              <a href="#">
                <i class="fa fa-dashboard "></i> <span>BOOKS</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu tm1">
                <li><a href="bookinsert.php"><i class="fa fa-circle-o"></i>Insert Books</a></li>
                <li class="active"><a href="bookdisplay.php"><i class="fa fa-circle-o"></i>Display Books </a></li>
              </ul>
            </li>
            <li class="treeview t2">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Students</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu tm2">
                <li><a href="studentinsert.php"><i class="fa fa-circle-o"></i>Insert Students</a></li>
                <li class="active"><a href="studentdisplay.php"><i class="fa fa-circle-o"></i>Display Students </a></li>
                
                
              </ul>
            </li>
            <li class="treeview  t3">
              <a href="#">
                <i class="fa fa-dashboard"></i><span>Book Issue</span><i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu tm3">
                <li><a href="bookissueinsert.php"><i class="fa fa-circle-o"></i>Insert Issued Book</a></li>
                <li class="active"><a href="issued_bookdisplay.php"><i class="fa fa-circle-o"></i>Display Issued Books </a></li>
                
              </ul>
            </li>
            <li class=" treeview t4">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Book Return</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu tm4">
                <li><a href="bookreturninsert.php"><i class="fa fa-circle-o"></i>Insert Returned Book</a></li>
                <li class="active"><a href="returned_bookdisplay.php"><i class="fa fa-circle-o"></i>Display returned Books </a></li>
                
              </ul>
            </li>
            
            <li><a href="book_history.php"><i class="fa fa-book"></i>Book History</a></li>
           
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          
        </section>

        <!-- Main content -->
        <section class="content">
         
        <!-- <li class=" treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>BOOKS</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="bookinsert.php"><i class="fa fa-circle-o"></i>Insert Books</a></li>
                <li class="active"><a href="a.php"><i class="fa fa-circle-o"></i>a</a></li>
              </ul>
            </li> -->