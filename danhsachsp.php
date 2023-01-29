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
    <link rel="icon" type="logo/png" href="logo/logo1.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">
    <style>img[alt="www.000webhost.com"]{display: none;}</style>
    <link rel="stylesheet" href="./css/icon-lienhe.css">
    <style>
        .btn-chitiet{
            background-color: #243a76;
            color: #fff;
        }
        .btn:hover{
            background-color: #fff;
            color: #243a76;
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
    <?php
    include 'main/header/banner.php';
    ?>
<section class="content my-4">
        <div class="container"> 
            <div class="noidung bg-white" style=" width: 100%;">
                <div class="items">
                    <div class="row">
                    <?php
                    include './connect_db.php';
                        $selectproduct = "SELECT * FROM `product` WHERE  `menu_id` =".$_GET['id'];
                        $result = mysqli_query($con,$selectproduct);
                        while($row = mysqli_fetch_array($result))
                        {    
                            // echo "<pre>";
                            // print_r($row);
                        ?>
                        <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="card">
                            <a href="chitietsp.php?id= <?php echo $row['id'] ?>" class="motsanpham"
                                style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom">
                                <img class="card-img-top anh" src="<?php echo $row['image'];?>">
                                <div class="card-body noidungsp mt-3">
                                    <h3 class="card-title ten"><?php echo $row['name']; ?></h3>
                                    <a href="chitietsp.php?id= <?php echo $row['id'] ?>  " class="btn btn-chitiet" role="button">Chi tiết</a>
                                    <div class="gia d-flex align-items-baseline">
                                        <div class="giamoi"> <?php  echo number_format ($row['price_new']); ?> VNĐ</div> 
                                        <!-- <div class="giacu text-muted">139.000 ₫</div>
                                        <div class="sale">-20%</div> -->
                                    </div>
                                      
                                </div>
                            </a>
                            </div>
                        </div>
                        <?php
                        }
                     ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="fixed-bottom">
        <div class="btn btn-warning float-right rounded-circle nutcuonlen" id="backtotop" href="#"
            style="background:#CF111A;"><i class="fa fa-chevron-up text-white"></i></div>
    </div>
    <div class="contact-box-bottom">
	        <a class="contact-box-wrapper nut-chat-facebook" href="https://www.facebook.com/Computer-Store-100268502904168" rel="nofollow" target="_blank">
      	        <div class="contact-icon-box" style="border: none;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 800"><radialGradient id="a" cx="101.9" cy="809" r="1.1" gradientTransform="matrix(800 0 0 -800 -81386 648000)" gradientUnits="userSpaceOnUse"><stop offset="0" style="stop-color:#09f"></stop><stop offset=".6" style="stop-color:#a033ff"></stop><stop offset=".9" style="stop-color:#ff5280"></stop><stop offset="1" style="stop-color:#ff7061"></stop></radialGradient><path fill="url(#a)" d="M400 0C174.7 0 0 165.1 0 388c0 116.6 47.8 217.4 125.6 287 6.5 5.8 10.5 14 10.7 22.8l2.2 71.2a32 32 0 0 0 44.9 28.3l79.4-35c6.7-3 14.3-3.5 21.4-1.6 36.5 10 75.3 15.4 115.8 15.4 225.3 0 400-165.1 400-388S625.3 0 400 0z"></path><path fill="#FFF" d="m159.8 501.5 117.5-186.4a60 60 0 0 1 86.8-16l93.5 70.1a24 24 0 0 0 28.9-.1l126.2-95.8c16.8-12.8 38.8 7.4 27.6 25.3L522.7 484.9a60 60 0 0 1-86.8 16l-93.5-70.1a24 24 0 0 0-28.9.1l-126.2 95.8c-16.8 12.8-38.8-7.3-27.5-25.2z"></path></svg>
                </div>
      	        <div class="contact-info">
        	        <b>Chat Facebook</b>
        	        <span>(8h-24h)</span>
      	        </div>
  	        </a>
	        <a class="contact-box-wrapper nut-chat-zalo" href="https://zalo.me/0337638548" rel="nofollow" target="_blank">
      	        <div class="contact-icon-box" style="border: none;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 161.5 161.5"><path d="M504.54,431.79h14.31c19.66,0,31.15,2.89,41.35,8.36a56.65,56.65,0,0,1,23.65,23.65c5.47,10.2,8.36,21.69,8.36,41.35V519.4c0,19.66-2.89,31.15-8.36,41.35a56.65,56.65,0,0,1-23.65,23.65c-10.2,5.47-21.69,8.36-41.35,8.36H504.6c-19.66,0-31.15-2.89-41.35-8.36a56.65,56.65,0,0,1-23.65-23.65c-5.47-10.2-8.36-21.69-8.36-41.35V505.14c0-19.66,2.89-31.15,8.36-41.35a56.65,56.65,0,0,1,23.65-23.65C473.39,434.68,484.94,431.79,504.54,431.79Z" transform="translate(-431.25 -431.25)" style="fill:#0068ff"></path><path d="M592.21,517v2.35c0,19.66-2.89,31.15-8.35,41.35a56.65,56.65,0,0,1-23.65,23.65c-10.2,5.47-21.69,8.36-41.35,8.36H504.6c-16.09,0-26.7-1.93-35.62-5.63L454.29,572Z" transform="translate(-431.25 -431.25)" style="fill:#001a33;opacity:0.11999999731779099;isolation:isolate"></path><path d="M455.92,572.51c7.53.83,16.94-1.31,23.62-4.56,29,16,74.38,15.27,101.84-2.3q1.6-2.4,3-5c5.49-10.24,8.39-21.77,8.39-41.5v-14.3c0-19.73-2.9-31.26-8.39-41.5a56.86,56.86,0,0,0-23.74-23.74c-10.24-5.49-21.77-8.39-41.5-8.39H504.76c-16.8,0-27.71,2.12-36.88,6.15q-.75.67-1.47,1.37c-26.89,25.92-28.93,82.11-6.13,112.64l.08.14c3.51,5.18.12,14.24-5.18,19.55C454.32,571.89,454.63,572.39,455.92,572.51Z" transform="translate(-431.25 -431.25)" style="fill:#fff"></path><path d="M497.35,486.34H465.84v6.76h21.87l-21.56,26.72a6.06,6.06,0,0,0-1.17,4v1.72h29.73a2.73,2.73,0,0,0,2.7-2.7v-3.62h-23l20.27-25.43,1.11-1.35.12-.18a8,8,0,0,0,1.41-5Z" transform="translate(-431.25 -431.25)" style="fill:#0068ff"></path><path d="M537.47,525.54H542v-39.2h-6.76v36.92A2.27,2.27,0,0,0,537.47,525.54Z" transform="translate(-431.25 -431.25)" style="fill:#0068ff"></path><path d="M514.37,495.07a15.36,15.36,0,1,0,15.36,15.36A15.36,15.36,0,0,0,514.37,495.07Zm0,24.39a9,9,0,1,1,9-9A9,9,0,0,1,514.37,519.46Z" transform="translate(-431.25 -431.25)" style="fill:#0068ff"></path><path d="M561.92,494.82A15.48,15.48,0,1,0,577.4,510.3,15.5,15.5,0,0,0,561.92,494.82Zm0,24.64a9.09,9.09,0,1,1,9.09-9.09A9.07,9.07,0,0,1,561.92,519.46Z" transform="translate(-431.25 -431.25)" style="fill:#0068ff"></path><path d="M526.17,525.54h3.62V495.93h-6.33v27A2.72,2.72,0,0,0,526.17,525.54Z" transform="translate(-431.25 -431.25)" style="fill:#0068ff"></path></svg></div>
      	        <div class="contact-info">
        	        <b>Chat Zalo</b>
        	        <span>(8h-24h)</span>
      	        </div>
  	        </a>
	        <a class="contact-box-wrapper nut-goi-hotline" href="tel:19001234">
      	        <div class="contact-icon-box" style="color: #ed1b24;"><i class="fas fa-phone-alt"></i></div>
      	        <div class="contact-info">
        	        <b>1900.1234</b>
        	        <span>(8h-24h)</span>
      	        </div>
  	        </a>
        </div>    
    <?php
    include 'main/footer/dichvu.php';
    ?>
    <?php
    include 'main/footer/footer.php';
    ?>

</body>

</html>