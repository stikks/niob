<?php session_start();
    require('dbconnect.php');
    $query = "SELECT * FROM `payment_types`";
    $results_array = array();
    $result = mysqli_query($connection, $query);
    while ($row = $result->fetch_assoc()) {
        $results_array[] = $row;
    }
    if ($results_array > 0) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">

    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <meta name="description" content=""/>
        <meta name="keywords" content=""/>
        <meta name="author" content=""/>
        <title>NIOB - Lagos Chapter</title>
        <link rel="stylesheet" type="text/css" href="static/sweetalert2.min.css"/>
        <link rel="stylesheet" type="text/css" href="static/style.css" media="screen"/>
        
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css"/>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css"/>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="static/sweetalert2.all.min.js"></script>
        <script src="static/sweetalert2.min.js"></script>
        <script type="application/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
        <script>

            $(function () {

                var toggle = function (selection) {
                    if (selection == 'non_registered') {
                        $('#noFields').show();
                        $('#yesFields').hide();
                        $('#paymentFields').show();
                        $('#gradeFields').show();
                    }

                    else if (selection == 'registered') {
                        $('#yesFields').show();
                        $('#noFields').hide();
                        $('#paymentFields').show();
                        $('#gradeFields').show();
                    }
                    else {
                        $('#yesFields').hide();
                        $('#noFields').hide();
                        $('#paymentFields').hide();
                        $('#gradeFields').hide();
                        $('#amountFields').hide();
                    }
                };

                toggle('');

                $(document).on('change', '#paymentStatus', function(){
                    var selection = $(this).val();
                    loadGrades(selection);
                    toggle(selection);
                });

                function loadGrades(selection) {
                    $.post('grade.php', {code: selection}, function (response) {
                        var data = JSON.parse(response);
                        var $el = $("#grade");
                        $el.empty();
                        if (data.length > 0) {
                            $('#hiddenAmount').val(response);
                            $('#amountFields').hide();
                            $('#grade').prop('disabled', false);
                            $el.append($("<option></option>").attr("value", '').text('Select Grade'));
                            $.each(data, function (key,value) {
                                $el.append($("<option></option>").attr("value", value.name).text(value.name))
                            })
                        }
                        else {
                            $('#grade').prop('disabled', true);
                            $('#amountFields').show();
                        }
                    });
                    return true;
                }

//                $(document).on('change', '#paymentType', function(){
//                    var selection = $(this).val();
//                    $.post('grade.php', {code: selection}, function (response) {
//                        var data = JSON.parse(response);
//                        var $el = $("#grade");
//                        $el.empty();
//                        if (data.length > 0) {
//                            $('#hiddenAmount').val(response);
//                            $('#amountFields').hide();
//                            $('#grade').prop('disabled', false);
//                            $el.append($("<option></option>").attr("value", '').text('Select Grade'));
//                            $.each(data, function (key,value) {
//                                $el.append($("<option></option>").attr("value", value.name).text(value.name))
//                            })
//                        }
//                        else {
//                            $('#grade').prop('disabled', true);
//                            $('#amountFields').show();
//                        }
//                    })
//                });

                $(document).on('change', '#grade', function(){
                    $('#amountFields').show();
                    var selection = $(this).val();
                    var value = JSON.parse($('#hiddenAmount').val());
                    var res = value.find(function (elem) {
                        return elem.name == selection;
                    });
                    $('#amount').val(parseFloat(res.price));
//                    $('#amount').prop('readonly', true);
                });

                $('form').on('submit', function (e) {

                    $(this).submit(function() {
                        e.preventDefault();
                        return false;
                    });
                    return true;
                });

            });

            function showUser(url) {
                if (url == "") {
                    document.getElementById("main-content").innerHTML = "No data retrieved";
                    return;
                }

                if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari

                    xmlhttp = new XMLHttpRequest();

                } else {// code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }

                xmlhttp.onreadystatechange = function () {

                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("main-content").innerHTML = xmlhttp.responseText;
                    }
                };
                xmlhttp.open("GET", url, true);
                xmlhttp.send();

            }

        </script>
        <style class="cp-pen-styles">/*custom font*/
            @import url(https://fonts.googleapis.com/css?family=Montserrat);
            
            /*form styles*/
            #msform {
                text-align: center;
                position: relative;
                margin-top: 30px;
            }

            #msform fieldset {
                background: white;
                border: 0 none;
                border-radius: 0px;
                box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
                padding: 20px 30px;
                box-sizing: border-box;
                width: 80%;
                margin: 0 10%;

                /*stacking fieldsets above each other*/
                position: relative;
            }

            /*Hide all except first fieldset*/
            #msform fieldset:not(:first-of-type) {
                display: none;
            }

            /*inputs*/
            #msform input, #msform textarea {
                padding: 15px;
                border: 1px solid #ccc;
                border-radius: 0px;
                margin-bottom: 10px;
                width: 100%;
                box-sizing: border-box;
                font-family: montserrat;
                color: #2C3E50;
                font-size: 13px;
            }

            #msform input:focus, #msform textarea:focus {
                -moz-box-shadow: none !important;
                -webkit-box-shadow: none !important;
                box-shadow: none !important;
                border: 1px solid #35AA47;
                outline-width: 0;
                transition: All 0.5s ease-in;
                -webkit-transition: All 0.5s ease-in;
                -moz-transition: All 0.5s ease-in;
                -o-transition: All 0.5s ease-in;
            }

            /*buttons*/
            #msform .action-button {
                width: 100px;
                background: #35AA47;
                font-weight: bold;
                color: white;
                border: 0 none;
                border-radius: 25px;
                cursor: pointer;
                padding: 10px 5px;
                margin: 10px 5px;
            }

            #msform .action-button:hover, #msform .action-button:focus {
                box-shadow: 0 0 0 2px white, 0 0 0 3px #35AA47;
            }

            #msform .action-button-previous {
                width: 100px;
                background: #C5C5F1;
                font-weight: bold;
                color: white;
                border: 0 none;
                border-radius: 25px;
                cursor: pointer;
                padding: 10px 5px;
                margin: 10px 5px;
            }

            #msform .action-button-previous:hover, #msform .action-button-previous:focus {
                box-shadow: 0 0 0 2px white, 0 0 0 3px #C5C5F1;
            }

            /*headings*/
            .fs-title {
                font-size: 18px;
                text-transform: uppercase;
                color: #2C3E50;
                margin-bottom: 10px;
                letter-spacing: 2px;
                font-weight: bold;
            }

            .fs-subtitle {
                font-weight: normal;
                font-size: 13px;
                color: #666;
                margin-bottom: 20px;
            }

            /*progressbar*/
            #progressbar {
                margin-bottom: 30px;
                overflow: hidden;
                /*CSS counters to number the steps*/
                counter-reset: step;
            }

            #progressbar li {
                list-style-type: none;
                color: white;
                text-transform: uppercase;
                font-size: 9px;
                width: 33.33%;
                float: left;
                position: relative;
                letter-spacing: 1px;
            }

            #progressbar li:before {
                content: counter(step);
                counter-increment: step;
                width: 24px;
                height: 24px;
                line-height: 26px;
                display: block;
                font-size: 12px;
                color: #333;
                background: white;
                border-radius: 25px;
                margin: 0 auto 10px auto;
            }

            /*progressbar connectors*/
            #progressbar li:after {
                content: '';
                width: 100%;
                height: 2px;
                background: white;
                position: absolute;
                left: -50%;
                top: 9px;
                z-index: -1; /*put it behind the numbers*/
            }

            #progressbar li:first-child:after {
                /*connector not needed before the first step*/
                content: none;
            }

            /*marking active/completed steps green*/
            /*The number of the step and the connector before it = green*/
            #progressbar li.active:before, #progressbar li.active:after {
                background: #35AA47;
                color: white;
            }


            /* Not relevant to this form */
            .dme_link {
                margin-top: 30px;
                text-align: center;
            }
            .dme_link a {
                background: #FFF;
                font-weight: bold;
                color: #35AA47;
                border: 0 none;
                border-radius: 25px;
                cursor: pointer;
                padding: 5px 25px;
                font-size: 12px;
            }

            .dme_link a:hover, .dme_link a:focus {
                background: #C5C5F1;
                text-decoration: none;
            }</style>

    </head>

    <body>
        <div id="site-wrapper">

        <div id="header">

            <div id="top">

                <div class="left" id="logo">
                    <a href="index.html"><img src="img/logo-nat.png" alt=""/></a>
                </div>
                <div class="left navigation" id="main-nav">
                    <div class="clearer">&nbsp;</div>

                </div>
                <div class="clearer">&nbsp;</div>

            </div>
            <div class="navigation" id="sub-nav">

                <ul class="tabbed">
                    <li class="current-tab"><a href="index.php">HOME</a></li>
                    <li><a href="#" onclick="showUser('about.html', this.value)">ABOUT US</a></li>
                    <li><a href="#" onclick="showUser('executives.html', this.value)">EXECUTIVES</a></li>
                    <?php
                    if (isset($_SESSION['user'])) { ?>
                        <li><a href="user/profile.php">MEMBERSHIPS</a></li>
                    <?php } else { ?>
                        <li><a href="#" onclick="showUser('login.php', this.value)">MEMBERSHIPS</a></li>
                    <?php } ?>
                    <li><a href="#" onclick="showUser('news.html', this.value)">NEWS ROOM</a></li>
                    <li><a href="#" onclick="showUser('gallery.html', this.value)">GALLERY</a></li>
                    <li><a href="#" onclick="showUser('contact.html', this.value)">CONTACT US</a></li>
                    <li><a style="color:red" href="#" onclick="myFunction()">ONLINE PAYMENT</a></li>
                </ul>
                <div class="clearer">&nbsp;</div>
            </div>
            <?php
            if (isset($_SESSION['user'])) { ?>
                <div style="float: right">
                    <small><?php echo $_SESSION['user'] ?> | <a href="logout.php">Sign Out</a></small>
                </div>
            <?php } ?>
        </div>

        <div id="splash">

            <div class="col3 left">
                <h2 class="label label-green">Mission Statement</h2>
                <p>"To enable members deliver, with relevant stakeholders, sustainable shelter that addresses the housing
                    needs of the Nation through research and development and global best practices"</p>
            </div>

            <div class="col3-mid left">
                <h2 class="label label-orange">Our Vision</h2>
                <p>"Providing Professional excellence and leadership for sustainable shelter"</p>
            </div>

            <div class="col3 right">

                <h2 class="label label-blue">About Us</h2>
                <p>The Nigerian Institute of Building is the professional body for Builders and those who are about to be
                    engaged in the Building Profession</p>
                <p><a href="https://vikpe.org/archive/arcsin-web-templates/" class="more">Read more &#187;</a><span
                        class="quiet"></span></p>
            </div>

            <div class="clearer">&nbsp;</div>

        </div>

        <div class="main" id="main-two-columns">

            <div class="left" id="main-content">

                <div class="section">
                    <div class="section-title">Payment Information</div>
                    <div class="section-content">
                        <div class="post">
                            <form method="post" action="processPayment.php" id="paymentForm">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <select name="paymentStatus" id="paymentStatus" class="form-control" required>
                                            <option value=''> Select Membership Status </option>
                                            <option value='registered'>Yes, I am a Registered Member</option>
                                            <option value='non_registered'>No, I am a not a Registered Member</option>
                                        </select>
                                    </div>
                                    <div id="noFields">
                                        <div class="form-group col-md-12">
                                            <input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter Phone Number">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="email" class="form-control" name="username" id="username" placeholder="Enter Email Address">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Enter Full Name">
                                        </div>
                                    </div>
                                    <div id="yesFields">
                                        <div class="form-group col-md-12">
                                            <div class="input-group">
                                                <div class="input-group-addon" style="border: none !important;">F</div>
                                                <input type="text" class="form-control" id="reg_no" name="reg_no" placeholder="Corbon Number">
                                            </div>  
                                        </div>
                                    </div>
                                    <div id="paymentFields">
<!--                                        <h2 class="fs-title">Payment Type</h2>-->
                                        <div class="form-group col-md-12">
                                            <select name="paymentType" id="paymentType" class="form-control" required>
                                                <option value=''> Select Payment Type </option>
                                                <?php foreach ($results_array as $res) { ?>
                                                    <option value='<?php echo $res['code'] ?>'><?php echo $res['name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="gradeFields">
                                        <div class="form-group col-md-12">
<!--                                            <h2 class="fs-title">Grade</h2>-->
                                            <select name="grade" id="grade" class="form-control" required>
                                                <option value=''> Select Cadre </option>
                                                <?php $grades = array(); if (isset($_SESSION['grades'])) { $grades = $_SESSION['grades']; }; if(count($grades) > 0) { foreach ($grades as $gd) { ?>
                                                    <option value='<?php echo $gd['name'] ?>'><?php echo $gd['name'] ?></option>
                                                <?php } } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="hiddenAmount"></div>
                                    <div id="amountFields">
                                        <div class="form-group col-md-12">
                                            <label for="amount"></label>
                                            <input type="number" class="form-control" name="amount" id="amount" value="0.0" required>
                                        </div>
                                    </div>
<!--                                    <fieldset>-->
<!--                                        -->
<!--                                        -->
<!--                                        <input type="submit" name="submit" class="submit action-button" value="Submit"/>-->
<!--                                    </fieldset>-->
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-large btn-success"><i class="fa fa-check"></i> Pay </button>
                                        <div id="success"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="clearer">&nbsp;</div>

            </div>

            <div class="right sidebar" id="sidebar">

                <div class="section">

                    <div class="section-title">Board of Members</div>

                    <div class="section-content">

                        <ul class="nice-list">
                            <li><a href="#">Gbajabiamila O.M</a> <span class="quiet">- Director</span></li>
                            <li><a href="#">Kunle O</a> <span class="quiet">- Lead Writer</span></li>
                            <li><a href="#">Fashola B</a> <span class="quiet">- Editor</span></li>
                            <li><a href="#">Ambode O</a> <span class="quiet">- Writer</span></li>
                            <li><a href="#">Kehinde T</a> <span class="quiet">- Writer</span></li>
                        </ul>

                    </div>

                </div>

                <div class="section">

                    <div class="section-title"> News</div>

                    <div class="section-content">

                        <ul class="nice-list">
                            <li>
                                <div class="left"><a href="#">Aenean tempor arcu..</a></div>
                                <div class="right">Oct 12</div>
                                <div class="clearer">&nbsp;</div>
                            </li>
                            <li>
                                <div class="left"><a href="#">Justo interdum rutrum</a></div>
                                <div class="right">Sep 15</div>
                                <div class="clearer">&nbsp;</div>
                            </li>
                            <li>
                                <div class="left"><a href="#">In nec justo in urna</a></div>
                                <div class="right">Sep 12</div>
                                <div class="clearer">&nbsp;</div>
                            </li>
                        </ul>

                    </div>

                </div>

            </div>
            <div class="clearer">&nbsp;</div>
        </div>

        <div id="footer">
            <div class="left" id="footer-left">
                <p>&copy; 2017 NIOB - Lagos Chapter. All rights Reserved</p>
                <div class="clearer">&nbsp;</div>

            </div>
            <div class="right" id="footer-right">
                <p><a href="#">Blog</a> <span class="text-separator">|</span> <a href="#">Events</a> <span
                        class="text-separator">|</span> <a href="#">About</a> <span class="text-separator">|</span> <a
                        href="#">Archives</a> <span class="text-separator">|</span> <strong><a href="#">Join
                            Us!</a></strong> <span class="text-separator">|</span> <a href="#top" class="quiet">Page
                        Top &uarr;</a></p>
            </div>
            <div class="clearer">&nbsp;</div>
        </div>
    </div>
    <script>
        <?php if (isset($_SESSION['message'])) { ?>
            alert('<?php echo $_SESSION['message']['data']; unset($_SESSION['message']);  ?>');
        <?php }?>
    </script>
    </body>
</html>
<?php } ?>