<?php ob_start() ; ?>
<?php session_start();
    if($_SESSION['name'] == "" && $_SESSION['role'] != "1"){
        header("location: ../../sign-in.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../images/logo5.png">
    <title>Admin | TV Shop</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" href="css/button.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body class="fix-header card-no-border">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <div id="main-wrapper">
        <?php
            session_start();
            include ("left-sidebar.php"); ?>
        <div class="page-wrapper">
            <div class="container-fluid">

                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Users</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                        <a href="add-user.php" class="btn pull-right hidden-sm-down btn-success">Add User</a>
                    </div>
                </div>
                <div class="row">
                    <?php
                    if(isset($_SESSION['noti-update']) && !is_null($_SESSION['noti-update'])) {
                    ?>
                    <div class="col-md-12">
                        <div class="alert alert-success">
                           <?php echo $_SESSION['noti-update']; ?>
                        </div>
                    </div>
                    <?php $_SESSION['noti-update']= NULL;}  ?>
                </div>
                <div class="row">
                    <!-- column -->
                    <div class="col-sm-12">

                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">User</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>Phone Numbers</th>
                                                <th>Role</th>
                                                <th>Avatar</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                include ("../../connect.php");

                                                $qr = "select * from users u join role r on u.role_id = r.role_id";

                                                $result = mysqli_query($conn,$qr);
                                                $i = 1;
                                                while($row = mysqli_fetch_array($result)){
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $row['username']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['password']; ?></td>
                                                <td><?php echo $row['phone_number']; ?></td>
                                                <td><?php echo $row['role_name']; ?></td>
                                                <td><img src="../../images/<?php echo $row['avatar']; ?>" alt="" width="150" height="160"></td>
                                                <td><a href="edit-user.php?email=<?php echo $row['email']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                <a href="delete-user.php?email=<?php echo $row['email']; ?>"><i class="fa fa-trash-o" style="color: red;" aria-hidden="true"></i></a></td>
                                            </tr>
                                            <?php
                                                $i += 1;}
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <footer class="footer text-center">
                <p>&copy;Copyright QTV06 | Dev-ROR | 2018</p>
            </footer>

        </div>

    </div>

    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/js/tether.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
