<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="apple-touch-icon" sizes="57x57" href="../favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="../favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicons/favicon-16x16.png">
    <link rel="manifest" href="../favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <title>NIOB Admin</title>
    <!-- Bootstrap Core CSS -->
    <link href="../static/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../static/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="../static/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="../static/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="../static/plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../static/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="../static/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../static/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="../static/css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="fix-header">
<!-- ============================================================== -->
<!-- Preloader -->
<!-- ============================================================== -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
    </svg>
</div>
<!-- ============================================================== -->
<!-- Wrapper -->
<!-- ============================================================== -->
<div id="wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header">
            <div class="top-left-part">
                <!-- Logo -->
                <a class="logo" href="index.php">
                    <b><img src="../img/logo-rsz.png" alt="home" class="light-logo" /></b>
                </a>
            </div>
        </div>
    </nav>
    <!-- End Top Navigation -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav slimscrollsidebar">
            <div class="sidebar-head">
                <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
            </div>
            <ul class="nav" id="side-menu">
                <li style="padding: 70px 0 0;">
                    <a href="index.php" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Home</a>
                </li>
                <!--<li>-->
                <!--<a href="profile.html" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Profile</a>-->
                <!--</li>-->
                <li>
                    <a href="payments.php" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i>Payments</a>
                </li>
                <li>
                    <a href="paymentTypes.php" class="waves-effect"><i class="fa fa-credit-card fa-fw" aria-hidden="true"></i>Payment Types</a>
                </li>
                <li>
                    <a href="grades.php" class="waves-effect"><i class="fa fa-graduation-cap fa-fw" aria-hidden="true"></i>Cadres</a>
                </li>
                <li>
                    <a href="members.php" class="waves-effect"><i class="fa fa-users fa-fw" aria-hidden="true"></i>Members</a>
                </li>
            </ul>
            <!--            <div class="center p-20">-->
            <!--                <a href="https://wrappixel.com/templates/ampleadmin/" target="_blank" class="btn btn-danger btn-block waves-effect waves-light">Upgrade to Pro</a>-->
            <!--            </div>-->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Left Sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page Content -->
    <!-- ============================================================== -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Update Grade</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <h6 class="caption" style="float: right"><a href="../logout.php">&nbsp;Sign Out</a></h6>
                    <ol class="breadcrumb">
                        <li><a href="grades.php">Cadres</a></li>
                        <li class="active">Update</li> |
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <!-- .row -->
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="white-box">
                        <?php
                            require('../dbconnect.php');
                            if(!isset($_GET['id']) || empty($_GET['id'])) {
                                header("Location: paymentTypes.php");
                            };
                            $id = $_GET['id'];
                            $query = "SELECT * FROM `cadres` WHERE id='$id'";
                            $result = mysqli_query($connection, $query);

                            if (mysqli_num_rows($result) == 1) {
                                $row = $result->fetch_assoc();
                        ?>
                        <form class="form-horizontal form-material" method="post" action="update_grade.php" id="gradeForm">
                            <div class="form-group">
                                <label class="col-md-12" for="name">Name</label>
                                <div class="col-md-12">
                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                    <input type="text" placeholder="Fellow" name="name" class="form-control form-control-line" value="<?php echo $row['name'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="class" class="col-md-12">Membership Status</label>
                                <div class="col-md-12">
                                    <select name="class" id="class" class="form-control form-control-line">
                                        <option value="registered"<?php echo $row['class'] == 'registered' ? 'selected': ''?>>Registered</option>
                                        <option value="non_registered"<?php echo $row['class'] == 'non_registered' ? 'selected': ''?>>Non Registered</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="price" class="col-md-12">Price</label>
                                <div class="col-md-12">
                                    <input type="number" class="form-control form-control-line" name="price" id="price" value="<?php echo $row['price'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success" style="float: right">Save</button>
                                </div>
                            </div>
                        </form>
                        <?php } else { header("Location: paymentTypes.php"); }?>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center"> 2017 &copy; NIOB </footer>
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- jQuery -->
<script src="../static/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="../static/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="../static/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<!--slimscroll JavaScript -->
<script src="../static/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="../static/js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="../static/js/custom.min.js"></script>
<script>
    <?php session_start(); if (isset($_SESSION['message'])) { ?>
    alert('<?php $msg = $_SESSION['message']['data'];  echo $msg; unset($_SESSION['message']);?>');
    <?php } ?>
</script>
</body>

</html>
