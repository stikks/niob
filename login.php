<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
    <head>
        <script type="text/javascript">
            function validateForm() {
                var x = document.forms["myform"]["username"].value;
                var y = document.forms["myform"]["mem_password"].value;
                
                if (x == "" && y == "") {
                    alert("UserName must be filled out");
                    return false;
                }
            }
        </script>
        <title>
            NIOB | Login
        </title>
        <link rel="stylesheet" type="text/css" href="static/sweetalert2.min.css" />
        <link rel="stylesheet" type="text/css" href="static/style.css" media="screen"/>
    </head>
        
    <body>
        <div id="site-wrapper">
            <div class="main">
                <div class="section">
                    <div class="section-content">
                        <div class="post">
                            <div class="post-title"><h2>Please Enter your login details [New member? Click <a href="#" onclick="showUser('register.php', this.value)">here</a>]</h2></div>
                            <div>
                                <form onsubmit="return validateForm()" action="loginprocess.php" id="member_login_form" name="myform" style="contact-form"  method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" name="username" id="username" placeholder="Member's Login Username" required>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="password" class="form-control form-control-line" name="password" id="password" autocomplete="new-password" placeholder="Member's Login Password" required>
                                        </div>
                                        <div class="col-md-6">
                                            <br>
                                            <button type="submit" class="btn btn-large btn-effect"><i class="fa fa-check"></i> Login </button>
                                            <div id="success"></div>
                                        </div>
                                    </div> 
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
