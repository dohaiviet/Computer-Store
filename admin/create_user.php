<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Tạo tài khoản mới</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="../logo/png" sizes="32x32" href="../logo/logo.png">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="plugins/node-waves/waves.css" rel="stylesheet" />

        <!-- Animation Css -->
        <link href="plugins/animate-css/animate.css" rel="stylesheet" />

        <!-- Morris Chart Css-->
        <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

        <!-- Custom Css -->
        <link href="css/style.css" rel="stylesheet">

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="css/themes/all-themes.css" rel="stylesheet" />
        <link rel="icon" href="images/logo1.png">
        <style>
            .box-content{
                margin: 0 auto;
                width: 800px;
                border: 1px solid #ccc;
                text-align: center;
                padding: 20px;
            }
            #create_user form{
                width: 200px;
                margin: 40px auto;
            }
            #create_user form input{
                margin: 5px 0;
            }
            
        </style>
    </head>
    <body>
        <?php
        $error = false;
        if (isset($_GET['action']) && $_GET['action'] == 'create') {
            if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
                include './connect_db.php';
                // Thêm bản ghi vào cơ sở dữ liệu
                $result = mysqli_query($con, "INSERT INTO `admin` (`id`, `username`, `password`, `status`, `created_time`, `last_updated`) VALUES (NULL, '" . $_POST['username'] . "', '" . $_POST['password'] . "', 1, " . time() . ", '" . time() . "');");
                if (!$result) {
                    if (strpos(mysqli_error($con), "Duplicate entry") !== FALSE) {
                        $error = "Tài khoản đã tồn tại. Bạn vui lòng chọn tài khoản khác.";exit;
                    }
                }
                mysqli_close($con);
                if ($error !== false) {
                    ?>
                    <div id="error-notify" class="box-content">
                        <h1>Thông báo</h1>
                        <h4><?= $error ?></h4>
                        <a href="./create_user.php">Tạo tài khoản khác</a>
                    </div>
                <?php } else { ?>
                    <div id="success-notify" class="box-content">
                        <h1>Chúc mừng</h1>
                        <h4>Bạn đã tạo thành công tài khoản <?= $_POST['username'] ?></h4>
                        <a href="./nhanvien.php">Danh sách tài khoản</a>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } else { ?>
            <div id="create_user" class="box-content">
                <h1>Tạo tài khoản Admin</h1>
                <form action="./create_user.php?action=create" method="Post" autocomplete="off">
                    <label>Username</label></br>
                    <input type="text" name="username" value="" />
                    <br>
                    <label>Password</label></br>
                    <input type="password" name="password" value="" />
                    <br><br>
                    <input type="submit" value="Tạo tài khoản" class="btn btn-danger"/>
                </form> 
            </div>
        <?php } ?>
    </body>
</html>
