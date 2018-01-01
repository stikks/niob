<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
    <style>
        .form-control {
            width: 100% !important;
        }
    </style>
</head>
<body>
<div id="site-wrapper">
    <div class="main">
        <div class="section">
            <div class="section-content">
                <div class="post">
                    <div class="post-title"><h2><a href="#">Please Enter your personal details</a></h2></div>
                    <div style="width: 75%;">
                        <form action="process.php" id="member_reg_form" name="member_reg_form" class="contact-form"
                              role="form" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line" name="phone" id="phone" autocomplete="off" placeholder="Phone Number" required>
                                </div>
                                <div class="col-md-12">
                                    <input type="password" class="form-control form-control-line" name="password" id="password" autocomplete="new-password" placeholder="Password" required>
                                </div>
                                <div class="col-md-6">
                                    <br>
                                    <button type="submit" class="btn btn-large btn-effect"><i class="fa fa-check"></i> Create Account </button>
                                    <div id="success"></div>
                                </div>
                            </div>
                            <!--                            <div class="row">-->
<!--                                <div class="form-group col-md-12">-->
<!--                                    <select name="member_title" id="member_title" placeholder="Member's Title" required class="form-control">-->
<!--                                        <option value=''> Choose Personal Title </option>-->
<!--                                        <option value='Alhaji'>Alhaji</option>-->
<!--                                        <option value='Bldr.'>Bldr.</option>-->
<!--                                        <option value='Chief'>Chief</option>-->
<!--                                        <option value='Comrade'>Comrade</option>-->
<!--                                        <option value='Doctor'>Doctor</option>-->
<!--                                        <option value='Emperor'>Emperor</option>-->
<!--                                        <option value='Engineer'>Engineer</option>-->
<!--                                        <option value='Miss'>Miss</option>-->
<!--                                        <option value='Mr'>Mr</option>-->
<!--                                        <option value='Mrs'>Mrs</option>-->
<!--                                        <option value='Pastor'>Pastor</option>-->
<!--                                        <option value='Professor'>Professor</option>-->
<!--                                        <option value='Reverend'>Reverend</option>-->
<!--                                    </select>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="row">-->
<!--                                <div class="form-group col-md-6">-->
<!--                                    <input type="text" class="form-control" id="surname" name="surname" placeholder="Surname" required>-->
<!--                                </div>-->
<!--                                <div class="form-group col-md-6">-->
<!--                                    <input type="text" class="form-control" id="other_names" name="other_names" placeholder="Other Names" required>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="row">-->
<!--                                <div class="form-group col-md-4">-->
<!--                                    <label for="phone"></label>-->
<!--                                    <input type="text" pattern="+{3}[-][0-9]{10}" class="form-control" name="phone" id="phone" placeholder="+234-" required />-->
<!--                                </div>-->
<!--                                <div class="form-group col-md-4">-->
<!--                                    <input type="email" class="form-control" name="email" id="email"-->
<!--                                           placeholder="Member's Email Address" required>-->
<!--                                </div>-->
<!--                                <div class="form-group col-md-4">-->
<!--                                    <input type="password" class="form-control" name="password" id="password"-->
<!--                                           placeholder="Enter your account's password" required>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="row">-->
<!--                                <div class="form-group col-md-4">-->
<!--                                    <select id="gender" name="gender" class="form-control" required>-->
<!--                                        <option value="">Select Gender</option>-->
<!--                                        <option value="Male"> Male</option>-->
<!--                                        <option value="Female"> Female</option>-->
<!--                                    </select>-->
<!--                                </div>-->
<!--                                <div class="form-group col-md-4 input-group date" data-provide="datepicker">-->
<!--                                    <input type="text" name="dob" id="dob" class="form-control" required>-->
<!--                                    <div class="input-group-addon">-->
<!--                                        <span class="glyphicon glyphicon-th"></span>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--<!--                                <div class="form-group col-md-4">-->
<!--<!--                                    <input type="text" class="form-control" name="dob" id="dob"-->
<!--<!--                                           placeholder="Date of Birth" required>-->
<!--<!--                                </div>-->
<!--                                <div class="form-group col-md-4">-->
<!--                                    <select class="form-control" name="religion" id="religion"-->
<!--                                            placeholder="Member's Religion" required>-->
<!--                                        <option value=""> Religion</option>-->
<!--                                        <option value="Islamic"> Islamic</option>-->
<!--                                        <option value="Christianity"> Christianity</option>-->
<!--                                        <option value="Traditional"> Traditional</option>-->
<!--                                    </select>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="row">-->
<!--                                <div class="form-group col-md-12">-->
<!--                                    <textarea class="form-control" id="address" name="address" rows="3" placeholder="Contact Address"></textarea>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="row">-->
<!--                                <div class="form-group col-md-6">-->
<!--                                    <select class="form-control" name="niob_membership_grade"-->
<!--                                            id="niob_membership_grade" required>-->
<!--                                        <option value=''>Please Select NIOB Membership Grade Title </option>-->
<!--                                        <option value='Fellow'>Fellow</option>-->   
<!--                                        <option value='Corporate'>Corporate</option>-->
<!--                                        <option value='Graduate'>Graduate</option>-->
<!--                                        <option value='Associate'>Associate</option>-->
<!--                                        <option value='Licentiate'>Licentiate</option>-->
<!--                                        <option value='Technician'>Technician</option>-->
<!--                                        <option value='Student'>Student</option>-->
<!--                                        <option value='Craftmen And Artisans'>Craftmen And Artisans</option>-->
<!--                                    </select>-->
<!--                                </div>-->
<!--                                <div class="form-group col-md-6 input-group date" data-provide="datepicker">-->
<!--                                    <input type="text" name="niob_admission_date" id="niob_admission_date" class="form-control" placeholder="Member's NIOB Admission Date" required>-->
<!--                                    <div class="input-group-addon">-->
<!--                                        <span class="glyphicon glyphicon-th"></span>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="row">-->
<!--                                <div class="form-group col-md-6">-->
<!--                                    <select class="form-control" name="highest_acad_qual" id="highest_acad_qual"-->
<!--                                            placeholder="Highest Academic Qualification" required>-->
<!--                                        <option value=''> Academic Qualification </option>-->
<!--                                        <option value='Bsc/Btech'>Bsc/Btech</option>-->
<!--                                        <option value='HND'>HND</option>-->
<!--                                        <option value='Msc'>Msc</option>-->
<!--                                        <option value='NCE'>NCE</option>-->
<!--                                        <option value='OND'>OND</option>-->
<!--                                        <option value='PGD'>PGD</option>-->
<!--                                        <option value='Phd'>Phd</option>-->
<!--                                        <option value='WASCE'>WASCE</option>-->
<!--                                    </select>-->
<!--                                </div>-->
<!--                                <div class="form-group col-md-6">-->
<!--                                    <select class="form-control" name="year_education" id="year_education"-->
<!--                                            placeholder="Qualification Year" required>-->
<!--                                        <option value=''>Qualification Year </option>-->
<!--                                        <option value='Bsc/Btech'>1981</option>-->
<!--                                        <option value='HND'>1982</option>-->
<!--                                        <option value='Msc'>1983</option>-->
<!--                                        <option value='NCE'>1984</option>-->
<!--                                        <option value='OND'>1985</option>-->
<!--                                        <option value='PGD'>1986</option>-->
<!--                                        <option value='Phd'>1987</option>-->
<!--                                        <option value='WASCE'>1988</option>-->
<!--                                    </select>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="row">-->
<!--                                <div class="form-group col-md-6">-->
<!--                                    <input type="text" class="form-control" name="current_employer"-->
<!--                                           id="current_employer" placeholder="Current Employer" required>-->
<!--                                </div>-->
<!--                                <div class="form-group col-md-6">-->
<!--                                    <input type="text" class="form-control" name="position_held" id="position_held"-->
<!--                                           placeholder="Position Held" required>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="row">-->
<!--                                <div class="col-auto col-md-6">-->
<!--                                    <div class="input-group mb-2 mb-sm-0">-->
<!--                                        <div class="input-group-addon">R00</div>-->
<!--                                        <input type="text" class="form-control" id="reg_no" name="reg_no" placeholder="Registration Number">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--<!--                                <div class="form-group col-md-6">-->
<!--<!--                                    <div class="input-group-addon">R00</div>-->
<!--<!--                                    <input type="text" class="form-control" name="reg_no" id="reg_no"-->
<!--<!--                                           placeholder="Registration Number" required>-->
<!--<!--                                </div>-->
<!--                                <div class="form-group col-md-6">-->
<!--                                    <input type="text" class="form-control" name="membership_no" id="membership_no"-->
<!--                                           placeholder="Membership Number" required>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="row">-->
<!--                                <div class="form-group col-md-6">-->
<!--                                    <input type="text" class="form-control" name="corbon_admin_no" id="corbon_admin_no"-->
<!--                                           placeholder="Corbon Admission Number" required>-->
<!--                                </div>-->
<!--                                <div class="form-group col-md-6 input-group date" data-provide="datepicker">-->
<!--                                    <input type="text" class="form-control" name="corbon_admin_date"-->
<!--                                           id="corbon_admin_date" placeholder="Corbon Date of Admission" required>-->
<!--                                    <div class="input-group-addon">-->
<!--                                        <span class="glyphicon glyphicon-th"></span>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="row">-->
<!--                                <div class="form-group col-md-12">-->
<!--                                    <textarea class="form-control" name="additional_info" id="additional_info"-->
<!--                                              placeholder="Additional Information" rows="7"></textarea>-->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                            <div class="row">-->
<!--                                <div class="col-md-12">-->
<!--                                    <input type="file" class="form-control-file" accept="image/*" name="passport" required/>-->
<!--                                </div>-->
<!--<!--                                <div id="upload" class="plupload_button col-md-6">-->
<!--<!--                                    <a class="btn btn-primary" href="#" style="background-color: #eee !important;  border: 1px solid #CCC !important; color:#000 !important">-->
<!--<!--                                        <i class="fa fa-upload"></i> &nbsp; Passport Photograph</a>-->
<!--<!--                                </div>-->
<!--<!--                                <span id="status"></span>-->
<!--<!--                                <input type="hidden" name="passport" id="passport" value=""-->
<!--<!--                                       title="Passport Photograph"/>-->
<!--<!--                                <ul id="files"></ul>-->
<!--<!--                                <div id="foto" class="col-md-6" style="margin-bottom:10px !important;">&nbsp;</div>-->
<!--                            </div>-->
<!--                            <div class="row" style="margin-top: 20px; float: right;">-->
<!--                                <div class="col-md-12">-->
<!--                                    <button type="submit" id="save_member" name="save_member" class="btn btn-primary">-->
<!--                                        <i class="fa fa-check"></i> Save Member Details-->
<!--                                    </button>-->
<!--                                    <div id="success"></div>-->
<!--                                </div>-->
<!--                            </div>-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
