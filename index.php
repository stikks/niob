<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">

<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="author" content=""/>
    <link rel="stylesheet" type="text/css" href="static/sweetalert2.min.css"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.0/css/bootstrap.min.css"/>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css"/>
    <link rel="stylesheet" type="text/css" href="static/style.css" media="screen"/>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="static/sweetalert2.all.min.js"></script>
    <script src="static/sweetalert2.min.js"></script>
    <script type="application/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

    <title>NIOB - Lagos Chapter</title>

    <script>

        var toggle = function (selection) {
            if (selection == 'no') {
                $('#noFields').show();
                $('#yesFields').hide();
            }

            else if (selection == 'yes') {
                $('#yesFields').show();
                $('#noFields').hide();
            }
            else {
                $('#yesFields').hide();
                $('#noFields').hide();
            }
        };

        toggle('');

        $(function () {

            $(document).on('change', '#paymentStatus', function(){
                var selection = $(this).val();
                toggle(selection);
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

        function myFunction() {
            showUser('payment.php', this.value);
        }

    </script>

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
                <li><a style="color:red" href="paymentPage.php">ONLINE PAYMENT</a></li>
            </ul>
            <div class="clearer">&nbsp;</div>
        </div>
        <?php
        if (isset($_SESSION['user'])) { ?>
            <div style="float: right">
                <small><a style="color: green" href="user/profile.php"><?php echo $_SESSION['user'] ?></a> | <a href="logout.php">Sign Out</a></small>
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

                <div class="section-title">Blog</div>

                <div class="section-content">

                    <div class="post">

                        <div class="post-title"><h2><a href="#">Membership Payment Information</a></h2></div>

                        <div class="post-date">Saturday, December 19, 2017 by Finacial Sec</div>

                        <div class="post-body">

                            <p><a href="#"><img src="img/sample-image.jpg" alt="" class="bordered"/></a></p>

                            <p class="large">This is a free website template by <a href="https://vikpe.org/">Viktor
                                    Persson</a>, built using tableless XHTML and CSS.</p>

                            <p>The latest template version and CMS conversions for platforms such as WordPress and
                                Blogger can be found at the official <a
                                    href="https://vikpe.org/archive/arcsin-web-templates/simple-organization-website-template/">Simple
                                    Organization Website Template</a> page.</p>

                            <p>For more templates, questions and comments please visit <a
                                    href="https://vikpe.org/archive/arcsin-web-templates/">Arcsin Web Templates</a>.</p>

                            <a href="https://vikpe.org/archive/arcsin-web-templates/" class="more">Read more &#187;</a>

                        </div>

                    </div>

                    <div class="content-separator"></div>

                    <div class="col3 left">
                        <div class="column-content">

                            <div class="post">
                                <h3><a href="#">Article title</a></h3>
                                <p>Integer diam elit, condi mentum ac semper ut, tincidunt non diam. Ut congue at
                                    commodo aenean euismod tincidunt lorem euismod.</p>
                                <a href="#" class="more">Read more &#187;</a>
                            </div>

                        </div>
                    </div>

                    <div class="col3 col3-mid left">
                        <div class="column-content">

                            <div class="post">
                                <h3><a href="#">Second Article Title</a></h3>
                                <p>Sed congue lacinia leo, sed dignissim odio pharetra vel. Fusce a dignissim dui. Fusce
                                    semper porttitor enim dapibus venenatis.</p>
                                <a href="#" class="more">Read more &#187;</a>
                            </div>

                        </div>
                    </div>

                    <div class="col3 right">
                        <div class="column-content">

                            <div class="post">
                                <h3><a href="#">Third title</a></h3>
                                <p>Sed auctor hendrerit eros eu eleifend. Cras hendrerit iaculis sodales. Pellentesque
                                    interdum rhoncus magna.</p>
                                <a href="#" class="more">Read more &#187;</a>
                            </div>

                        </div>
                    </div>

                    <div class="clearer">&nbsp;</div>

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

            <img src="img/logo-small.gif" alt="" class="left"/>

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
</body>
</html>
