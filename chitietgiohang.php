<?php
if(!isset($_SESSION))
{
    session_start();
}
include './connect_db.php';

$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    include 'main/header/danhmuc.php';
    ?>
<section class="content my-4">
        <div class="container"> 
        
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID Sản phẩm</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $total_price =0; ?>
                <?php foreach ($cart as $key => $value)
                {
                $total_price += ($value['price'] * $value['quantity']);
                    ?>
                <?php
               include './connect_db.php';
               $result = mysqli_query ($con,"SELECT * FROM `product` WHERE `id`= $value[id] ");
               //Tru ton kho
               $updateQuantity = mysqli_query($con, "update `product` set quantity = quantity - " .$value['quantity'] . " where id= " .$value['id'] ." ");
            //    var_dump( $updateQuantity);
               $product = mysqli_fetch_assoc($result);
               ?>
                <tr>
                    <td><?php echo $value['id'] ?></td>
                    <td><img src="<?php echo $value['image'] ?>" alt="" width="100px"></td>
                    <td><?php echo $value['name'] ?></td>
                    <td>

                    <form action="cart.php">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                        <input type="number" name="quantity" value="<?php echo $value['quantity'] ?>" id="number" class="soluongsp  text-center " max="<?php echo $product['quantity'] ?>">
                    <!-- <button type="submit" class="btn btn-capnhat">Cập nhật</button> -->
                    </form>

                    </td>
                    <td><?php echo number_format($value['price'])  ?>đ</td>
                    <td><?php echo number_format ($value['price'] * $value['quantity'])  ?>đ</td>
                    <td><a href="./cart.php?id=<?php echo $value['id'] ?>&action=delete" class="btn btn-capnhat">Xóa</a></td>

                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="2">Tổng tiền</td>
                    <td colspan="4" class="text-center"><?php echo number_format($total_price ) ?>đ</td>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var number = document.getElementById('number');
    var max = Math.max(number.max)
    var limit = parseInt(max);
    number.addEventListener('keyup',function(){
        if(number.value < 1){
            number.value = 1;
        }
        if(number.value > limit){
            number.value = limit;
            toastr.warning('Bạn chỉ có thể mua tối đa '+limit+' sản phẩm');
        }
    })
</script>
</body>

</html>