<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" action='./php/register.php' class="register-form" id="register-form">
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="schoolName" id="name" placeholder="Your School Name" required />
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="schoolemail" id="email" placeholder="School Email" required/>
                        </div>
                        <div class="form-group">
                            <label for=""><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="ownerFName" id="email" placeholder="Owner First Name" required/>
                        </div>
                        <div class="form-group">
                            <label for=""><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="ownerLName" id="email" placeholder="Owner Last Name" required/>
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="text" name="location" id="pass" placeholder="School Location" required/>
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="pass" id="pass" placeholder="Password" required/>
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="repass" id="re_pass" placeholder="Confirm password" required/>
                           
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>Check this if the school will use sessions system</label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                        </div>
                      <!-- user exitst handeling --> 
                        <div>
                    <?php
                        //session_start();
                        if(isset($_SESSION['exists'])){
                            $passerror = $_SESSION['exists'];
                            echo '<script>alert("This Email is already existing" )</script>';
                            unset($_SESSION['exists']);
                        }
                        elseif(isset($_SESSION['passcon'])){
                            $passerror = $_SESSION['passcon'];
                            echo '<script>alert("Confirm Password did not match " )</script>';
                            unset($_SESSION['passcon']);
                        }
                        else  echo "";
                        
                    ?>
                </div>
                       
                    </form>
                </div>
               
                <div class="signup-image">
                    <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                    <a href="./index.php" class="signup-image-link">I am already member</a>
                </div>
            </div>
        </div>
    </section>
</body>
</html>