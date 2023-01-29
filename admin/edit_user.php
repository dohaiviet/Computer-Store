<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Đổi thông tin người dùng</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="images/logo1.png">
        <style>
            
            .box-content{
                margin: 0 auto;
                width: 800px;
                border: 1px solid #ccc;
                text-align: center;
                padding: 20px;
                color: white;
                background-color: #1d243d;
                border-radius: 9px;
                border-top: 10px solid #79a6fe;
                border-bottom: 10px solid #eb5a46;
            }
            .btn{
                width: 200px;
                height: 20px;
            }
            .btn2{
                background-color: #7f5feb;
                border-radius: 100px;
                width: 200px;
                height: 36px;
                font-size: 14px;
                transition: 0.3s;
                cursor: pointer;
                color: white;
            }
            #edit_user form{
                width: 200px;
                margin: 40px auto;
            }
            #edit_user form input{
                margin: 5px 0;
            }
        </style>
    </head>
    <body>
        <?php
        include './connect_db.php';
        $error = false;
        if (isset($_GET['action']) && $_GET['action'] == 'edit') {
            if (isset($_POST['user_id']) && !empty($_POST['user_id']) && isset($_POST['password']) && !empty($_POST['password'])) {
                $result = mysqli_query($con, "UPDATE `user` SET `password` = MD5('" . $_POST['password'] . "'),   `last_updated`=" . time() . " WHERE `user`.`id` = " . $_POST['user_id'] . ";");
                if (!$result) {
                    $error = "Không thể cập nhật tài khoản";
                }
                mysqli_close($con);
                if ($error !== false) {
                    ?>
                    <div id="error-notify" class="box-content">
                        <h1>Thông báo</h1>
                        <h4><?= $error ?></h4>
                        <a href="./khachhang.php">Danh sách tài khoản</a>
                    </div>
                <?php } else { ?>
                    <div id="edit-notify" class="box-content">
                        <h1><?= ($error !== false) ? $error : "Sửa tài khoản thành công" ?></h1>
                        <a href="./khachhang.php">Danh sách tài khoản</a>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div id="edit-notify" class="box-content">
                    <h1>Vui lòng nhập đủ thông tin để sửa tài khoản</h1>
                    <a href="./khachhang.php?id=<?= $_POST['user_id'] ?>">Quay lại sửa tài khoản</a>
                </div>
            <?php
            }
        } else {
            $result = mysqli_query($con, "SELECT * FROM user where `id`=" . $_GET['id']);
            $user = $result->fetch_assoc();
            mysqli_close($con);
            if (!empty($user)) {
                ?>
                <div id="edit_user" class="box-content">
                    <h1>Sửa tài khoản "<?= $user['username'] ?>"</h1>
                    <form action="./edit_user.php?action=edit" method="Post" autocomplete="off">
                        <label>Sửa mật khẩu</label></br>
                        <input type="hidden" name="user_id" value="<?= $user['id'] ?>" />
                        <input name="password" value="" class="btn" />
                        <br><br>
                        <input type="submit" value="Xác nhận thay đổi" class="btn2" />
                    </form>
                </div>
            <?php
            }
        }
        ?>
    </body>
</html>
