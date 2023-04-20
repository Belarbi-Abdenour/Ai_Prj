<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- Font Icon -->
     <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

     <!-- Main css -->
     <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Login -->
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                    <a href="./register.php" class="signup-image-link">Create an account</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" class="register-form" id="login-form">
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="your_name" id="your_name" placeholder="Your School Email"/>
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="your_pass" id="your_pass" placeholder="Password"/>
                        </div>
                       
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                        </div>
                    </form>
                   <?php
                   
    
                    $con = mysqli_connect('localhost','root','','db_tutoring_classes');
                    if(!$con){
                        echo "error";
                    }
                    if(isset($_POST['signin'])){
                    
                   
                    $schoolName = $_POST["your_name"];
                    $passwordschool =md5($_POST["your_pass"]);
                    $sql = "select * from school where School_Name = '$schoolName' and Password_Manager = '$passwordschool'";  
                    $result = mysqli_query($con, $sql);  
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
                    $count = mysqli_num_rows($result);  
                      
                    if($count == 1){  
                        session_start();
                        $_SESSION['School_Id'] = $row['School_Id'];
                        $_SESSION['School_Name'] = $row['School_Name'];

                        echo "<script>window.location.href='Pre School Template/html-template/index.php'</script>"; 
                    }  
                    }
                
                


                    ?>
                </div>
            </div>
        </div>
    </section>
</body>
</html>