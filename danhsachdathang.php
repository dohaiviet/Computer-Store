<link rel="icon" type="logo/png" sizes="32x32" href="logo/logo.png">
<?php
if(!isset($_SESSION))
{
    session_start();
}
include './connect_db.php';

$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$address = isset($_POST['address']) ? $_POST['address'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$content = isset($_POST['content']) ? $_POST['content'] : '';
$orderid = rand(0,999999);
$userid = $_SESSION['user']['id'];
$error =[];
if($name == '' || $address == '' || $phone =='' || $email =='')
{
    ?>
    <!-- <script>
        alert("Hello\nHow are you?");
    </script> -->
    <?Php
}
else
{
        $result =mysqli_query($con,"INSERT INTO `orders`(`id`,`user_id`,`name`,`email`,`phone`,`address`,`content`,`created_time`,`last_updated`,`status`) VALUES ('$orderid','$userid','$name','$email','$phone','$address','$content','". time() ."','". time() ."','0')");
    foreach($_SESSION['cart'] as $value )
    {
        $result =mysqli_query($con,"INSERT INTO `orders_detail`(`order_id`,`product_id`,`product_name`,`quantity`,`image`,`price`) VALUES ('$orderid', '".$value['id']."','".$value['name']."','".$value['quantity']."','".$value['image']."' ,'".$value['price']."')");
    }
}
$sql = mysqli_query($con,"SELECT * FROM orders WHERE `user_id`= $userid");
$sql = mysqli_query($con,"SELECT * FROM orders ORDER BY `created_time` DESC ");
$sql = mysqli_fetch_all($sql,MYSQLI_ASSOC);
// echo"<pre>";
// print_r($sql);
?>
<?php
include  "PHPMailer/src/PHPMailer.php";
include  "PHPMailer/src/Exception.php";
include  "PHPMailer/src/OAuth.php";
include  "PHPMailer/src/POP3.php";
include  "PHPMailer/src/SMTP.php"; 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer(true);
?>
<?php
if(isset($_POST['send'])) {
    try {
        $mail->SMTPDebug = 0;                                
        $mail->isSMTP();                                     
        $mail->Host = 'smtp.gmail.com';  
        $mail->SMTPAuth = true;                             
        $mail->Username = 'dohaiviet710@gmail.com';               
        $mail->Password = 'phjriyyedxhhfbwk';                         
        $mail->SMTPSecure = 'tls';                            
        $mail->Port = 587;                                    
        $mail->CharSet="UTF-8";
        $mail->setFrom('ComputerStore@gmail.com', 'Computerstore.com');
        $mail->addAddress($_POST['email'], $_POST['name']);    

        $mail->isHTML(true);                                 
        $mail->Subject = "X??c nh???n ????n h??ng th??nh c??ng";
        $mail->Body    = " Xin ch??o qu?? kh??ch h??ng:  <br>
                            C???m ??n qu?? kh??ch ???? mua s???n ph???m t???i website: ComputerStore <br>";
        $mail->send();
        echo 'Message has been sent';
    } 
    catch (Exception $e) 
    {
        echo 'B???n ch??a nh???p ????? th??ng tin Mailer Error: ', $mail->ErrorInfo;
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Computer Store mua b??n thi???t b??? ??i???n t??? gi?? r???</title>
    <meta name="description"
        content="Chuy??n cung c???p ?????y ????? linh ki???n ??i???n t??? ????p ???ng theo nhu c???u c???a kh??ch h??ng">
    <meta name="keywords" content="nh?? s??ch online, mua s??ch hay, s??ch hot, s??ch b??n ch???y, s??ch gi???m gi?? nhi???u">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="logo/png" sizes="32x32" href="logo/logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/home.css">
    <script type="text/javascript" src="js/main.js"></script>
    <link rel="stylesheet" href="fontawesome_free_5.13.0/css/all.css">
    <link rel="stylesheet" href="css/sach-moi-tuyen-chon.css">
    <link rel="stylesheet" href="css/reponsive.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" />
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script type="text/javascript"
        src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
    <link rel="canonical" href="">
    <meta name="google-site-verification" content="urDZLDaX8wQZ_-x8ztGIyHqwUQh2KRHvH9FhfoGtiEw" />
    <link rel="manifest" href="favicon_io/site.webmanifest">
    <link rel="icon" type="logo/png" href="logo/logo1.png">
    <style>img[alt="www.000webhost.com"]{display: none;}</style>
    <style>
        .btn{
            color: white;
        }
        .btn-blue
        {
            border-color: white;
            background-color:  #243a76;
            color: white;
        }
    </style>
</head>

<body>
    <!-- code cho nut like share facebook  -->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0"></script>
        <?php
    include 'main/header/pre-header.php'
    ?>

    <?php
    include 'main/header/danhmuc.php';
    ?>
<section class="content my-4">
        <div class="container"> 
        <h3 class="text-center">
            ????n h??ng c???a b???n
        </h3>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
            <th>ID</th>
            <th>T??n kh??ch h??ng</th>
            <th>Email</th>
            <th>SDT</th>
            <th>?????a ch???</th>
            <th>N???i dung</th>
            <th>Ng??y ?????t h??ng</th>
            <th>T??nh tr???ng</th>
            <th>Chi ti???t ????n h??ng</th>
            </tr>
            </thead>
            <tbody>
                
                <?php foreach ($sql as $value)
                {
                ?>
                 <tr>
            <td><?php echo $value['id'] ?></td>
            <td><?php echo $value['name'] ?></td>
            <td><?php echo $value['email'] ?></td>
            <td><?php echo $value['phone'] ?></td>
            <td><?php echo $value['address'] ?></td>   
            <td><?php echo $value['content'] ?></td>
            <td><?= date('d/m/y H:i', $value['created_time'])?></td>   
            <?php
            if ($value['status']==0) {
                echo '<td class="text-danger">??ang X??? L??</td>';
            }elseif($value['status']==1){
            echo '<td class="text-success">??ang Giao H??ng</td>';
            }elseif($value['status']==2)
            echo '<td class="text-success">Giao H??ng Th??nh C??ng</td>';
            else
                echo '<td class="text-danger">????n h??ng b??? h???y</td>';
            ?>
            <td><a href="chitietdonhang.php?id= <?php echo $value['id']  ?> " class="btn btn-blue" style ="color:white; ">Chi ti???t </a></td>   
            </tr>  
                <?php } ?>
                
            </tbody>
        </table>
        
        </div>
    </section>
    <div class="fixed-bottom">
        <div class="btn btn-warning float-right rounded-circle nutcuonlen" id="backtotop" href="#"
            style="background:#CF111A;"><i class="fa fa-chevron-up text-white"></i></div>
    </div>
    <?php
    include 'main/footer/dichvu.php';
    ?>
    <?php
    include 'main/footer/footer.php';
    ?>

</body>

</html>