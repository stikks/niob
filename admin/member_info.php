<?php session_start();
require('../dbconnect.php');

if (!isset($_GET['id'])) {
    echo "<script>location.href='index.php';</script>";
    die();
}

$id = $_GET['id'];
$userQuery = mysqli_query($connection, "SELECT * FROM `niob_info` WHERE id=$id");
$account = $userQuery->fetch_assoc();

if ($account) {
?>
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
    <link rel="icon" type="image/png" sizes="192x192" href="../favicons/android-icon-192x192.png">
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
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css"/>
    <!-- Menu CSS -->
    <link href="../static/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="../static/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="../static/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="../static/plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../static/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css"
          rel="stylesheet">
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
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
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
                <a class="logo" href="../index.php">
                    <b><img src="../img/logo-rsz.png" alt="home" class="light-logo"/></b>
                </a>
            </div>
        </div>
        <!-- /.navbar-header -->
        <!-- /.navbar-top-links -->
        <!-- /.navbar-static-side -->
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
        </div>

    </div>
    <!-- ============================================================== -->
    <!-- End Left Sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page Content -->
    <!-- ============================================================== -->
    <?php ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Account Information</h4>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-8">
                    <h6 class="caption" style="float: right"><a href="../logout.php">Sign Out</a></h6>
                </div>
            </div>
            <!-- /.row -->
            <!-- .row -->
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <div class="white-box">
                        <div class="user-bg">
                            <div class="overlay-box">
                                <div class="user-content">
                                    <?php if (isset($account)) { ?>
                                        <a href="javascript:void(0)"><img
                                                src="file://<?php echo $account['passport'] ?>"
                                                class="thumb-lg img-circle" alt="img"></a>
                                        <h4 class="text-white"><?php echo $account['surname'] ?></h4>
                                    <?php } else { ?>
                                        <a href="javascript:void(0)"><img src="../img/avatar.png"
                                                                          class="thumb-lg img-circle" alt="img"></a>
                                    <?php } ?>
                                    <h5 class="text-white"><?php echo $_SESSION['user'] ?></h5></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-xs-12">
                    <div class="white-box">
                        <form class="form-horizontal form-material" action="updateInfo.php" role="form" method="post"
                              enctype="multipart/form-data">
                            <div>
                                <h3 class="page-header">Membership Information</h3>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="radio-inline">
                                            <input type="radio" name="status" id="status" value="registered" required>
                                            Registered Member
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="status" id="status" value="non_registered" checked> Non Registered Member
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="cadre">Membership Cadre</label>
                                        <select name="membership_cadre" id="cadre" class="form-control form-control-line" required>
                                            <option>Select Membership Cadre</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="reg_no">MNIOB Number</label>
                                        <input type="text" name="member_registration_number"
                                               id="member_registration_number" placeholder="MNIOB Registration Number"
                                               value="<?php if (isset($account)) {
                                                   echo $account['member_registration_number'];
                                               } ?>" class="form-control form-control-line" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="corbon_number">Corbon Number</label>
                                        <div class="input-group mb-2 mb-sm-0">
                                            <div class="input-group-addon">F</div>
                                            <input type="text" name="corbon_number" id="corbon_number"
                                                   placeholder="&nbsp;Corbon Number"
                                                   value="<?php if (isset($account)) {
                                                       echo $account['corbon_number'];
                                                   } ?>" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="col-md-6 input-group date">
                                        <label for="niob_admission_date">NIOB Admission Date</label>
                                        <input type="text" class="form-control" name="niob_admission_date" placeholder="Select NIOB Admission Date"
                                               id="niob_admission_date" value="<?php if (isset($account)) {
                                            echo $account['niob_admission_date'];
                                        } ?>">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h3 class="page-header">Personal Information</h3>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="member_title">Select Title</label>
                                        <select class="form-control form-control-line rmv" name="member_title"
                                                id="member_title" required>
                                            <option value="">Choose Personal Title</option>
                                            <option value='Alhaji' <?php if (isset($account)) {
                                                echo $account['title'] == 'Alhaji' ? 'selected' : '';
                                            } ?>>Alhaji
                                            </option>
                                            <option value='Chief' <?php if (isset($account)) {
                                                echo $account['title'] == 'Chief' ? 'selected' : '';
                                            } ?>>Chief
                                            </option>
                                            <option value='Comrade' <?php if (isset($account)) {
                                                echo $account['title'] == 'Comrade' ? 'selected' : '';
                                            } ?>>Comrade
                                            </option>
                                            <option value='Doctor' <?php if (isset($account)) {
                                                echo $account['title'] == 'Doctor' ? 'selected' : '';
                                            } ?>>Doctor
                                            </option>
                                            <option value='Emperor' <?php if (isset($account)) {
                                                echo $account['title'] == 'Emperor' ? 'selected' : '';
                                            } ?>>Emperor
                                            </option>
                                            <option value='Engineer' <?php if (isset($account)) {
                                                echo $account['title'] == 'Engineer' ? 'selected' : '';
                                            } ?>>Engineer
                                            </option>
                                            <option value='Miss' <?php if (isset($account)) {
                                                echo $account['title'] == 'Miss' ? 'selected' : '';
                                            } ?>>Miss
                                            </option>
                                            <option value='Mr' <?php if (isset($account)) {
                                                echo $account['title'] == 'Mr' ? 'selected' : '';
                                            } ?>>Mr
                                            </option>
                                            <option value='Mrs' <?php if (isset($account)) {
                                                echo $account['title'] == 'Mrs' ? 'selected' : '';
                                            } ?>>Mrs
                                            </option>
                                            <option value='Pastor' <?php if (isset($account)) {
                                                echo $account['title'] == 'Pastor' ? 'selected' : '';
                                            } ?>>Pastor
                                            </option>
                                            <option value='Professor' <?php if (isset($account)) {
                                                echo $account['title'] == 'Professor' ? 'selected' : '';
                                            } ?>>Professor
                                            </option>
                                            <option value='Reverend' <?php if (isset($account)) {
                                                echo $account['title'] == 'Reverend' ? 'selected' : '';
                                            } ?>>Reverend
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label>Surname</label>
                                        <input type="text" placeholder="Surname" name="surname"
                                               value="<?php if (isset($account)) {
                                                   echo $account['surname'];
                                               } ?>" class="form-control form-control-line" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Other Names</label>
                                        <input type="text" name="other_names" placeholder="Other Names"
                                               value="<?php if (isset($account)) {
                                                   echo $account['other_names'];
                                               } ?>" class="form-control form-control-line" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" placeholder="Email Address"
                                               value="<?php if (isset($account)) {
                                                   echo $account['email'];
                                               } ?>" class="form-control form-control-line" name="email" id="email"
                                               required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Phone Number</label>
                                        <input type="text" name="phone" placeholder="Phone Number"
                                               value="<?php echo $account['phone']; ?>"
                                               class="form-control form-control-line" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="gender">Gender</label>
                                        <select name="gender" id="gender" class="form-control form-control-line"
                                                required>
                                            <option value="">Select Gender</option>
                                            <option value="male" <?php if (isset($account)) {
                                                echo $account['gender'] == 'male' ? 'selected' : '';
                                            } ?>>Male
                                            </option>
                                            <option value="female" <?php if (isset($account)) {
                                                echo $account['gender'] == 'female' ? 'selected' : '';
                                            } ?>>Female
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="religion">Religion</label>
                                        <select name="religion" id="religion" class="form-control form-control-line">
                                            <option value="">Select Religion</option>
                                            <option value="Islam" <?php if (isset($account)) {
                                                echo $account['religion'] == 'Islam' ? 'selected' : '';
                                            } ?>> Islamic
                                            </option>
                                            <option value="Christianity" <?php if (isset($account)) {
                                                echo $account['religion'] == 'Christianity' ? 'selected' : '';
                                            } ?>> Christianity
                                            </option>
                                            <option value="Traditional" <?php if (isset($account)) {
                                                echo $account['religion'] == 'Traditional' ? 'selected' : '';
                                            } ?>> Traditional
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" style="padding: 20px;">
                                    <div class="col-md-12 input-group date">
                                        <label for="dob">Date of Birth</label>
                                        <input type="text" class="form-control" name="dob"
                                               placeholder="Select date of birth" id="dob" data-date-format="yy-mm-dd" value="<?php if (isset($account)) {
                                            echo $account['dob'];
                                        } ?>">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="address">Address</label>
                                        <textarea name="address" id="address" rows="3"
                                                  class="form-control form-control-line">
                                            <?php if (isset($account)) {
                                                echo $account['address'];
                                            } ?>
                                        </textarea>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <h3 class="page-header">School Information</h3>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="highest_acad_qual">Highest Qualification</label>
                                        <select class="form-control form-control-line" name="highest_acad_qual" id="highest_acad_qual" required>
                                            <option value="">Select Highest Qualification</option>
                                            <option value='Phd' <?php if (isset($account)) {
                                                echo $account['highest_acad_qual'] == 'Phd' ? 'selected' : '';
                                            } ?>>Phd
                                            </option>
                                            <option value='Msc' <?php if (isset($account)) {
                                                echo $account['highest_acad_qual'] == 'Msc' ? 'selected' : '';
                                            } ?>>Msc
                                            </option>
                                            <option value='PGD' <?php if (isset($account)) {
                                                echo $account['highest_acad_qual'] == 'PGD' ? 'selected' : '';
                                            } ?>>PGD
                                            </option>
                                            <option value='Bachelors' <?php if (isset($account)) {
                                                echo $account['highest_acad_qual'] == 'Bachelors' ? 'selected' : '';
                                            } ?>>Bsc/B.Tech
                                            </option>
                                            <option value='HND' <?php if (isset($account)) {
                                                echo $account['highest_acad_qual'] == 'HND' ? 'selected' : '';
                                            } ?>>HND
                                            </option>
                                            <option value='OND' <?php if (isset($account)) {
                                                echo $account['highest_acad_qual'] == 'OND' ? 'selected' : '';
                                            } ?>>OND
                                            </option>
                                            <option value='NCE' <?php if (isset($account)) {
                                                echo $account['highest_acad_qual'] == 'NCE' ? 'selected' : '';
                                            } ?>>NCE
                                            </option>
                                            <option value='WASSCE' <?php if (isset($account)) {
                                                echo $account['highest_acad_qual'] == 'WASSCE' ? 'selected' : '';
                                            } ?>>WASSCE
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 input-group date" data-provide="year">
                                        <label for="year_education">Qualification Year</label>
                                        <input type="text" class="form-control year" name="year_education"
                                               placeholder="select qualification year" id="year_education"
                                               value="<?php if (isset($account)) {
                                                   echo $account['year_education'];
                                               } ?>" required>
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="school">Academic Institution</label>
                                        <input class="form-control form-control-line" name="school" id="school"
                                               type="text" placeholder="Enter Academic Institution"
                                               value="<?php if (isset($account)) {
                                                   echo $account['school'];
                                               } ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <h3 class="page-header">Employment Information</h3>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label>Current Employer</label>
                                        <input type="text" placeholder="Current Employer" name="current_employer"
                                               value="<?php if (isset($account)) {
                                                   echo $account['current_employer'];
                                               } ?>" class="form-control form-control-line" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Position Held</label>
                                        <input type="text" name="position_held" placeholder="Position Held"
                                               value="<?php if (isset($account)) {
                                                   echo $account['position_held'];
                                               } ?>" class="form-control form-control-line" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="additional_info">Additional Information</label>
                                        <textarea name="additional_info" id="additional_info" rows="3"
                                                  class="form-control form-control-line">
                                            <?php if (isset($account)) {
                                                echo $account['additional_info'];
                                            } ?>
                                        </textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" style="padding: 20px;">
                                <div class="upload-btn-wrapper">
                                    <button class="btn btn-default">Passport Photograph</button>
                                    <input type="file" accept="image/*" id="passport" name="passport">
                                    <span id="file-name"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <button class="btn btn-success">Update Account Information</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center"> 2017 &copy; TM30</footer>
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- jQuery -->
<script src="../static/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="../static/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="../static/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<!--slimscroll JavaScript -->
<script src="../static/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="../static/js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="../static/js/custom.min.js"></script>
<script>
    $(document).ready(function () {

        $("#dob").datepicker({
            format: "yyyy-mm-dd"
        });

        $("#year_education").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years"
        });

        $("#niob_admission_date").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            minDate: '1990-01-01'
        });

        $('#passport').change(function () {
            var str = '';
            var files = document.getElementById('passport').files;
            for (var i = 0; i < files.length; i++) {
                str += files[i].name;
            }
            $('#file-name').text(str);
        });

        function setupFields() {

            var reg = null;
            <?php if (isset($account)) { ?>
            reg = '<?php echo $account['status'] ?>';
            <?php } ?>

            var status = reg || 'non_registered';
            $('input[value=' + status + ']').prop('checked', true)
            changeCadres(status);
        }

        function changeCadres(selection) {
            $.post('../grade.php', {code: selection}, function (response) {
                var data = JSON.parse(response);
                var $el = $("#cadre");
                $el.empty();
                if (data.length > 0) {
                    $el.append($("<option></option>").attr("value", '').text('Select Cadre'));
                    $.each(data, function (key, value) {
                        var attr = $("<option></option>").attr("value", value.name).text(value.name);
                        <?php if (isset($account)) { ?>
                        if (value.name == '<?php echo $account['membership_cadre']?>') {
                            attr = $("<option></option>").attr("value", value.name).attr("selected", true).text(value.name);
                        }
                        <?php } ?>
                        $el.append(attr)
                    })
                }
            });

            var sel = $('#member_title');
            if (selection == 'registered') {
                sel.append($("<option></option>").attr("value", "Bldr.").text("Bldr."));
                $('#corbon_number').prop('required', true);
            }
            else {
                sel.find('[value="Bldr."]').remove();
            }
        }

        setupFields();

        $("input[name=status]").change(function () {
            changeCadres($(this).val());
        });

        $('#member_title').change(function () {
            var sel = $('#member_title');
        })
    });

</script>
</body>

</html>
<?php } else {
    echo "<script>location.href='index.php';</script>";
    die();
}
?>
