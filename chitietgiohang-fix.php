<?php 
if(!isset($_SESSION))
{
    session_start();
} 
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Computer Store mua bán thiết bị điện tử giá rẻ</title>
    <meta name="description"
        content="Chuyên cung cấp đầy đủ linh kiện điện tử đáp ứng theo nhu cầu của khách hàng">
    <meta name="keywords" content="nhà sách online, mua sách hay, sách hot, sách bán chạy, sách giảm giá nhiều">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/giohang.css">
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
    <link rel="icon" type="logo/png" sizes="32x32" href="logo/logo1.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">
    <style>img[alt="www.000webhost.com"]{display: none;}
    .btn{
        background-color: #243a76;
        border-color:#243a76;
    }
    .btn:hover{
        color: #fff;
    }   
    .btn-capnhat{
        background-color: #243a76;
        color: #fff;
        border-color: #243a76;
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
   include './connect_db.php';
   $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
   if (!isset($_SESSION["cart"])) {
       $_SESSION["cart"] = array();
   }
   $error = false;
   $success = false;
   if (isset($_GET['action'])) {

       function update_cart($add = false) {
           foreach ($_POST['quantity'] as $id => $quantity) {
               if ($quantity == 0) {
                   unset($_SESSION["cart"][$id]);
               } else {
                   if ($add) {
                       $_SESSION["cart"][$id] += $quantity;
                   } else {
                       $_SESSION["cart"][$id] = $quantity;
                   }
               }
           }
       }

       switch ($_GET['action']) {
           case "add":
               update_cart(true);
             
               break;
           case "delete":
               if (isset($_GET['id'])) {
                   unset($_SESSION["cart"][$_GET['id']]);
               }
        
               break;
           case "submit":
               if (isset($_POST['update_click'])) { //Cập nhật số lượng sản phẩm
                   update_cart();
                   
               }         
            
       }
   }
   if (!empty($_SESSION["cart"])) {
       $products = mysqli_query($con, "SELECT * FROM `product` WHERE `id` IN (" . implode(",", array_keys($_SESSION["cart"])) . ")");
   }
    ?>
<div class="content my-4">
        <div class="container">
        <form id="cart-form" action="chitietgiohang.php?action=submit" method="POST"  >
        <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="product-number">STT</th>
                <th class="product-name">Tên sản phẩm</th>
                <th class="product-img">Ảnh sản phẩm</th>
                <th class="product-price">Đơn giá</th>
                <th class="product-quantity">Số lượng</th>
                <th class="total-money">Thành tiền</th>
                <th class="product-delete">Xóa</th>
                
               
            </tr>
        </thead>
        <tbody>
            <?php
                $total = 0;
                $num = 1;
                while ($row = mysqli_fetch_array($products)) { ?>
             <tr>
                        <td class="product-number"><?=$num++;?></td>
                        <td class="product-name"><?=$row['name']?></td>
                        <td class="product-img"><img src="<?=$row['image']?>" /></td>
                        <td class="product-price"><?=number_format($row['price_new'], 0, ",", ".")?></td>
                        <td class="product-quantity"><input type="text" value="<?=$_SESSION["cart"][$row['id']]?>" name="quantity[<?=$row['id']?>]" /></td>
                        <td class="total-money"><?=number_format($row['price_new'] * $_SESSION["cart"][$row['id']], 0, ",", ".")?></td>
                        <td class="product-delete"><a href="chitietgiohang.php?action=delete&id=<?= $row['id'] ?>">Xóa</a></td>
                       
                    </tr>
                <?php
                $total += $row['price_new'] * $_SESSION["cart"][$row['id']];
                $num++;
            } ?>
            <tr id="row-total">
                <td class="product-number">&nbsp;</td>
                <td class="product-name">Tổng tiền</td>
                <td class="product-img">&nbsp;</td>
                <td class="product-price">&nbsp;</td>
                <td class="product-quantity">&nbsp;</td>
                <td class="total-money"><?= number_format($total, 0, ",", ".") ?></td>
                <th> 
                <input type="submit" class="btn btn-capnhat" name="update_click" value="Cập nhật" />
                </th>
                <?php
                    if(isset($_SESSION['user']))
                    {
                        if (!empty($cart)) {
                            ?>
                        <td colspan="1" class="text-center " ><a href="dathang.php" class="btn" style="font-size: 14px;background-color: #243a76; color: white;">Đặt hàng</a></td>
                        <?php
                        }
                        else
                        {
                            ?>
                            <td colspan="1" class="text-center " ><a href="tongsp.php" class="btn" style="font-size: 14px;background-color: #243a76; color: white;">Giỏ hàng trống</a></td>
                            <?php
                        }
                    }
                     else
                     {
                        ?>
                        <td colspan="1" class="text-center " ><a href="login.php" class="btn" style="font-size: 14px;background-color: #243a76; color: white;">Đăng nhập</a></td>
                        <?php
                     }
                     ?>
                </tr>
        <tbody>
        </table>
    
                                      
    </form>
        
        
        </div>
    </div>
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