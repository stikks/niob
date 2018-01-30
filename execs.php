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
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="#" onclick="showUser('about.html', this.value)">ABOUT US</a></li>
                    <li class="current-tab"><a href="execs.php">EXECUTIVES</a></li>
                    <?php
                    if (isset($_SESSION['user'])) { ?>
                        <li><a href="user/profile.php">MEMBERSHIPS</a></li>
                    <?php } else { ?>
                        <li><a href="#" onclick="showUser('login.php', this.value)">MEMBERSHIPS</a></li>
                    <?php } ?>
                    <li><a href="#" onclick="showUser('news.html', this.value)">NEWS ROOM</a></li>
                    <li><a href="#" onclick="showUser('gallery.html', this.value)">GALLERY</a></li>
                    <li><a href="#" onclick="showUser('contact.html', this.value)">CONTACT US</a></li>
                    <li><a style="color:red" href="paymentPage.php" onclick="myFunction()">ONLINE PAYMENT</a></li>
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

        <div class="main" id="main-two-columns">

            <div class="left" id="main-content">

                <div class="section">
<!--                    <div class="section-title text-center">Our Executives</div>-->
                    <div class="section-content">
                        <div id="site-wrapper">
                            <div class="main">
                                <div class="section">
                                    <div class="section-content">
                                        <div class="post">
                                            <div class="post-title text-center"><h3>Meet Our Executives</h3></div><br><br>
                                            <div>
                                                <div class="col3 left">
                                                    <p><img src="excos/Bldr.%20Adelaja%20Adekanmbi%20mniob-Chairman.jpg" width="240" height="180" alt="" class="bordered" /></p>
                                                    <p class="quiet small">Bldr. Adelaja Adekanbi MNIOB<br> <b style="color: green">Chairman</b></p>
                                                </div>
                                                <div class="col3-mid left">
                                                    <p><img src="excos/Bldr.Sunday%20Wusu%20fniob%20Vice%20Chairman.jpg" width="240" height="180" alt="" class="bordered" /></p>
                                                    <p class="quiet small">Bldr. Sunday Wusu FNIOB <br> <b style="color: green">Vice Chairman</b></p>
                                                </div>
                                                <div class="col3 right">
                                                    <p><img src="excos/Bldr.%20Owolabi%20Rasheed%20Ayoola%20fniob%20Honorary%20Secretary.jpg" width="240" height="180" alt="" class="bordered" /></p>
                                                    <p class="quiet small">Bldr. Owolabi Rasheed  Ayoola <br> <b style="color: green">Honorary Secretary</b></p>
                                                </div>

                                                <div class="col3 left">
                                                    <p><img src="excos/Bldr.%20Odusola-Stevenson%20Ese%20mniob-%20Asst.%20Hon%20Secretary.jpg" width="240" height="180" alt="" class="bordered" /></p>
                                                    <p class="quiet small">Bldr. Odusola-stevenson Y. Eseroghene <br> <b style="color: green">Assistant Honorary Secretary</b></p>
                                                </div>
                                                <div class="col3-mid left">
                                                    <p><img src="excos/Bldr.%20Mubarak%20O.%20Gbaja-Biamila%20mniob-%20Financial%20Secreatary.jpg" width="240" height="180" alt="" class="bordered" /></p>
                                                    <p class="quiet small">Bldr. Mubarak O. Gbaja-Biamila MNIOB <br> <b style="color: green">Financial Secretary</b></p>
                                                </div>
                                                <div class="col3 right">
                                                    <p><img src="excos/Bldr.%20Adesanya%20Olufemi%20A%20mniob%20Treasurer.jpg" width="240" height="180" alt="" class="bordered" /></p>
                                                    <p class="quiet small">Bldr  Adesanya Olufemi Ademola <br> <b style="color: green">Treasurer</b></p>
                                                </div>
                                                <div class="col3 left">
                                                    <p><img src="excos/Bldr.%20Abiodun%20Ogundare%20mniob%20Exco%20Co-Opt.jpg" width="240" height="180" alt="" class="bordered" /></p>
                                                    <p class="quiet small">Bldr. Ogundare Abiodun <br> <b style="color: green">Coopt Member</b></p>
                                                </div>
                                                <div class="col3-mid left">
                                                    <p><img src="excos/Bldr.%20Ganiyu%20S.%20Olaiya%20mniob%20Eco%20Co-Opt.jpg" width="240" height="180" alt="" class="bordered" /></p>
                                                    <p class="quiet small">Bldr. Ganiyu Musediq A <br> <b style="color: green">Coopt Member</b></p>
                                                </div>
                                                <div class="col3 right">
                                                    <p><img src="excos/Bldr.%20Nurudeen%20Kiyomi%20mniob%20Exco%20Co-Opt.jpg" width="240" height="180" alt="" class="bordered" /></p>
                                                    <p class="quiet small">Bldr. Kayomi Nurudeen T. <br> <b style="color: green">Coopt Member</b></p>
                                                </div>
                                                <div class="col3 left">
                                                    <p><img src="img/male-avatar.jpg" width="240" height="180" alt="" class="bordered" /></p>
                                                    <p class="quiet small">Bldr. Isename E. Lucky <br> <b style="color: green">Coopt Member</b></p>
                                                </div>
                                                <div class="col3-mid left">
                                                    <p><img src="img/female-avatar.png" width="240" height="180" alt="" class="bordered" /></p>
                                                    <p class="quiet small">Bldr. (Mrs) Said Adenike <br> <b style="color: green">Immediate Past Chairman</b></p>
                                                </div>
                                                <div class="col3 right">
                                                    <p><img src="excos/Bldr.%20Adeoye%20Thomas%20Adeyemi%20fniob%20Ex-Officio.jpg" width="240" height="180" alt="" class="bordered" /></p>
                                                    <p class="quiet small">Bldr.Adeoye Thomas Adeyemi FNIOB <br> <b style="color: green">Ex-officio</b></p>
                                                </div>
                                                <div class="col3 left">
                                                    <p><img src="excos/Bldr.%20Mrs.%20Momoh%20Mercy%20mniob%20Ex-Officio.jpg" width="240" height="360" alt="" class="bordered" /></p>
                                                    <p class="quiet small">Bldr (Mrs).Momoh Olayinka Mercy <br> <b style="color: green">Ex-officio</b></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="clearer">&nbsp;</div>

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