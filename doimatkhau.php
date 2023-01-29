<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
    <link rel="icon" type="logo/png" sizes="32x32" href="logo/logo1.png">
        <title>Đổi thông tin thành viên</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .btn1{
                border: 0;
                background: #7f5feb;
                border-radius: 100px;
                width: 211px;
                height: 36px;
                font-size: 14px;
                top: 79%;
                left: 8%;
                transition: 0.3s;
                cursor: pointer;
                color: white;
            }
            .btn2{            
                font-size: 18px;
                cursor: pointer;
                color: white;
                

            }
            .box-content{
                margin: 0 auto;
                width: 800px;
                border: 2px solid #ccc;
                text-align: center;
                padding: 20px;
                background-color: #1d243d;
                color: white;
                border-radius: 9px;
                border-top: 10px solid #79a6fe;
                border-bottom: 10px solid #eb5a46;
            }
            #edit_user form{
                width: 200px;
                margin: 40px auto;
            }
            #edit_user form input{
                margin: 10px 0;
                
            }
        
            
            
        </style>
    </head>
    <body>
        <?php
        include './connect_db.php';
        $error = false;
        if (isset($_GET['action']) && $_GET['action'] == 'edit') {
            if (isset($_POST['user_id']) && !empty($_POST['user_id']) && isset($_POST['old_password']) && !empty($_POST['old_password']) && isset($_POST['new_password']) && !empty($_POST['new_password'])
            ) {
                $userResult = mysqli_query($con, "Select * from `user` WHERE (`id` = " . $_POST['user_id'] . " AND `password` = '" . md5($_POST['old_password']) . "')");
                if ($userResult->num_rows > 0) {
                    $result = mysqli_query($con, "UPDATE `user` SET `password` = MD5('" . $_POST['new_password'] . "'), `last_updated`=" . time() . " WHERE (`id` = " . $_POST['user_id'] . " AND `password` = '" . md5($_POST['old_password']) . "')");
                    if (!$result) {
                        $error = "Không thể cập nhật tài khoản";
                    }
                } else {
                    $error = "Mật khẩu cũ không đúng !";
                }
                mysqli_close($con);
                if ($error !== false) {
                    ?>
                    <div id="error-notify" class="box-content">
                        <h1>Thông báo</h1>
                        <h4><?= $error ?></h4>
                        <a href="./doimatkhau.php" class="btn2">Đổi lại mật khẩu</a>
                    </div>
                <?php } else { ?>
                    <div id="edit-notify" class="box-content">
                        <h1><?= ($error !== false) ? $error : "Sửa tài khoản thành công !" ?></h1>
                        <a href="./login.php" class="btn2">Quay lại tài khoản</a>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div id="edit-notify" class="box-content">
                    <h1>Vui lòng nhập đủ thông tin để sửa tài khoản</h1>
                    <a href="./doimatkhau.php" class="btn2">Quay lại sửa tài khoản</a>
                </div>
                <?php
            }
        } else {
            session_start();
            $user = $_SESSION['user'];
            if (!empty($user)) {
                ?>
                <div id="edit_user" class="box-content">
                    <h1>Xin chào "<?= $user['fullname'] ?>". Bạn đang thay đổi mật khẩu</h1>
                    <form action="./doimatkhau.php?action=edit" method="Post" autocomplete="off">
                        <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                        <label>Mật khẩu cũ</label></br>
                        <input type="password" name="old_password" value="" /></br>
                        <label>Mật khẩu mới</label></br>
                        <input type="password" name="new_password" value="" /></br>
                        <br><br>
                        <input type="submit" value="Xác nhận thay đổi" class="btn1" />
                    </form>
                    
                </div>
                <?php
            }
        }
        ?>
    </body>
</html>
