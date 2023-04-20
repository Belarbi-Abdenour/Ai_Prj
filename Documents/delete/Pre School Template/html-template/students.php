<!DOCTYPE html>
<html lang="en">
<!-- lbendii -->
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>Students</title>
       
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">
      <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
      <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="assets/css/style.css">
   </head>
   <body>
      <div class="main-wrapper">
         <div class="header">
            <div class="header-left">
               <a href="index.html" class="logo">
               
               </a>
               <a href="index.html" class="logo logo-small">
                
               </a>
            </div>
            <a href="javascript:void(0);" id="toggle_btn">
            <i class="fas fa-align-left"></i>
            </a>
            <div class="top-nav-search">
               <form>
                  <input type="text" class="form-control" placeholder="Search here">
                  <button class="btn" type="submit"><i class="fas fa-search"></i></button>
               </form>
            </div>
            <a class="mobile_btn" id="mobile_btn">
            <i class="fas fa-bars"></i>
            </a>
            <ul class="nav user-menu">
               <li class="nav-item dropdown noti-dropdown">
                  <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <i class="far fa-bell"></i> <span class="badge badge-pill">3</span>
                  </a>
                  <div class="dropdown-menu notifications">
                     <div class="topnav-dropdown-header">
                        <span class="notification-title">Notifications</span>
                        <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                     </div>
                     <div class="topnav-dropdown-footer">
                        <a href="#">View all Notifications</a>
                     </div>
                  </div>
               </li>
               <li class="nav-item dropdown has-arrow">
                  <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <span class="user-img"><img class="rounded-circle" src="assets/img/profiles/avatar-01.jpg" width="31" alt="Ryan Taylor"></span>
                  </a>
                  <div class="dropdown-menu">
                     <div class="user-header">
                        <div class="avatar avatar-sm">
                           <img src="assets/img/profiles/avatar-01.jpg" alt="User Image" class="avatar-img rounded-circle">
                        </div>
                        <div class="user-text">
                           <h6>Ryan Taylor</h6>
                           <p class="text-muted mb-0">Administrator</p>
                        </div>
                     </div>
                     <a class="dropdown-item" href="profile.html">My Profile</a>
                     <a class="dropdown-item" href="inbox.html">Inbox</a>
                     <a class="dropdown-item" href="login.php">Logout</a>
                  </div>
               </li>
            </ul>
         </div>
         <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
               <div id="sidebar-menu" class="sidebar-menu">
                  <ul>
                     <li class="menu-title">
                        <span>Main Menu</span>
                     </li>
                     <li class="submenu">
                        <a href="#"><i class="fas fa-user-graduate"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
                        <ul>
                        <li><a href="index.php">Admin Dashboard</a></li>
                           <li><a href="student-dashboard.html">Student Dashboard</a></li>
                        </ul>
                     </li>
                     <li class="submenu active">
                        <a href="#"><i class="fas fa-user-graduate"></i> <span> Students</span> <span class="menu-arrow"></span></a>
                        <ul>
                           <li><a href="students.php" class="active">Student List</a></li>
                          
                           <li><a href="add-student.php">Student Add</a></li>
                           
                        </ul>
                     </li>
                     
                           </li>
                        </ul>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="page-wrapper">
            <div class="content container-fluid">
               <div class="page-header">
                  <div class="row align-items-center">
                     <div class="col">
                        <h3 class="page-title">Students</h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                           <li class="breadcrumb-item active">Students</li>
                        </ul>
                     </div>
                     <div class="col-auto text-right float-right ml-auto">
                        <a href="#" class="btn btn-outline-primary mr-2"><i class="fas fa-download"></i> Download</a>
                        <a href="add-student.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="card card-table">
                        <div class="card-body">
                           <div class="table-responsive">
                           <?php
include "connect.php";
$sql1="SELECT * FROM student";
$sql2="SELECT Supervisor_Id FROM supervisor";
$result1=mysqli_query($db,$sql1);
$result2=mysqli_query($db,$sql2);
?>

<table class="table table-hover table-center mb-0 datatable">
   <thead>
      <tr>
         <th>Image</th>
         <th>Student ID</th>
         <th>LAST NAME</th>
         <th>FIRST NAME</th>
         <th>Email</th>
         <th>DOB</th>
         <th>Mobile Number</th>
         <th>Address</th>
         <th class="text-right">Action</th>
      </tr>
   </thead>
   <tbody>
      <?php
         while($info1=$result1->fetch_assoc()) {
      ?>
      <tr>
         <td>
            <h5 class="table-avatar">
               <a href="student-details.php?id=<?php echo "{$info["Student_Id"]}"; ?>" class="avatar avatar-sm mr-2">
               <?php
if (isset($info1['image'])) {
    $image = $info1['image'];
    echo '<img class="avatar-img rounded-circle" src="data:image/jpeg;base64,'.base64_encode($image).'" alt="">';
} else {
    // If the image is not available, don't show anything
}
?>

               </a>
               <a href="student-details.php?id=<?php echo "{$info1["Student_Id"]}"; ?>">
                  <?php echo "{$info1["Student_LastName"]} {$info1["Student_FirstName"]}"; ?>
               </a>
            </h2>
            <?php $id =$info1["Student_Id"]; ?>
         </td>
         <td><?php echo "{$info1["Student_Id"]}"; ?></td>
         <td><?php echo "{$info1["Student_LastName"]}"; ?></td>
         <td><?php echo "{$info1["Student_FirstName"]}"; ?></td>
         <td><?php echo "{$info1["Student_Mail"]}"; ?></td>
         <?php
         while(0){//$info2=$result2->fetch_assoc()){?>
         <td><?php// echo "{$info2["Supervisor_Id"]}"; ?></td><?php
      }?>
         <td><?php echo "{$info1["Student_Birthday"]}"; ?></td>
         <td><?php echo "{$info1["Student_Phone_number"]}"; ?></td>
         <td><?php echo "{$info1["Student_address"]}"; ?></td>
         <td class="text-right">
            <div class="actions">
               <a href="edit-student.php?updateid=<?php echo $info1["Student_Id"]; ?>" class="btn btn-sm bg-success-light mr-2">
                  <i class="fas fa-pen"></i>
               </a>
               <a href="delete.php?deleteid=<?php echo $info1["Student_Id"]; ?>" class="btn btn-sm bg-danger-light">
                  <i class="fas fa-trash"></i>
               </a>
            </div>
         </td>
      </tr>
      <?php } ?>
   </tbody>
</table>

                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            
      <script src="assets/js/jquery-3.6.0.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
      <script src="assets/plugins/datatables/datatables.min.js"></script>
      <script src="assets/js/script.js"></script>
   </body>
  
</html>