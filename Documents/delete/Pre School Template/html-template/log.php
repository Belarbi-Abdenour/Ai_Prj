<?php 
 session_start();
include "connect.php";

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST["email"]) && isset($_POST["password"])) {
    $Supervisor_Mail = validate($_POST["email"]);
    $Password_User = validate($_POST["password"]);

    if (empty($Supervisor_Mail)) {
        header("Location: login.php?error=email is required");
        exit();
    } else if (empty($Password_User)) {
        header("Location: login.php?error=password is required");
        exit();
    } else {
        $hashed_password = md5($Password_User); 
        $sql = "SELECT * FROM supervisor WHERE Supervisor_Mail='$Supervisor_Mail';"; // removed password check
        $result = mysqli_query($db, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if ($row["Supervisor_Mail"] === $Supervisor_Mail) {
                $_SESSION["Supervisor_Mail"] = $row["Supervisor_Mail"];
                $_SESSION["Password_User"] = $row["Password_User"];
                $_SESSION['Supervisor_Id'] = $row['Supervisor_Id']; 
                header("Location: children.php");
            } else {
                header("Location: login.php?error=Incorrect username or password");
                exit();
            }
        } else {
            header("Location: login.php?error=Incorrect username or password");
            exit();
        }
    }
} else {
    header("Location: login.php?error");
    exit();
}
