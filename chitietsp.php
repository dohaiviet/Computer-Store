<?php
if(!isset($_SESSION))
{
    session_start();
}
?>
<!DOCTYPE html>
<html lang="li">
<style>
    .btn-white{
        color: white;
    }
    .bi-star-fill::before {
    content: "\f586";
    color: rgb(255, 218, 33);
}
.bi-star-half::before {
    content: "\f587";
    color: rgb(255, 218, 33);
}

</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/product-item.css">
    <script type="text/javascript" src="js/main.js"></script>
    <link rel="stylesheet" href="fontawesome_free_5.13.0/css/all.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
    <link rel="stylesheet" href="./css/rate.css">
    <link rel="stylesheet" href="./css/reponsive.css">
    <link rel="stylesheet" href="./css/sach-moi-tuyen-chon.css">
    <script type="text/javascript" src="slick/slick.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script type="text/javascript"
        src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
        <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
        <link rel="icon" type="logo/png" sizes="32x32" href="logo/logo1.png">
        <link rel="manifest" href="favicon_io/site.webmanifest">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Chi ti???t s???n ph???m</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- code cho nut like share facebook  -->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0"></script>

    <!-- header -->
    <?php
    include 'main/header/pre-header.php'
    ?>

    <!-- thanh "danh muc sach" ???? ???????c ???n b??n trong + hotline + ho tro truc tuyen -->
   <?php
    include 'main/header/danhmuc.php';
   ?>
   

    <!-- breadcrumb  -->
    

    <!-- n???i dung c???a trang  -->
    <section class="product-page mb-4">
        <div class="container">
                 <?php
               
                    include './connect_db.php';
                    $result = mysqli_query ($con,"SELECT * FROM `product` WHERE `id` = ".$_REQUEST['id']);
                    $product = mysqli_fetch_assoc($result);
                    $gallery = mysqli_query ($con,"SELECT *FROM `image_library` WHERE `product_id` = ".$_REQUEST['id']);
                    $gallery_pro = mysqli_fetch_all ($gallery);
                    // echo"<pre>";
                    //  print_r($gallery_pro);
                   
                    ?>
            <div class="product-detail bg-white p-4">
                <div class="row">
                    
                    <!-- ???nh  -->
                    <div class="col-md-5 khoianh">
                        <div class="anhto mb-4">
                            <a class="active" href="<?php echo $product['image']; ?>" data-fancybox="thumb-img">
                                <img class="product-image" src="<?php echo $product['image']; ?>" style="width: 100%;">
                            </a>
                        </div>
                        
                        <div class="list-anhchitiet d-flex mb-4" style="margin-left: 2rem;">
                        <?php
                        foreach($gallery_pro as $value)
                        { 
                            ?>
                            <img class="product-image" src="<?php echo $value[2]; ?> " class="img-fluid" >
                            <?php
                        }
                            ?>
                        </div>
                    </div>
                    <!-- th??ng tin s???n ph???m: t??n, gi?? b??a gi?? b??n ti???t ki???m, c??c khuy???n m??i, n??t ch???n mua.... -->
                    <div class="col-md-7 khoithongtin">
                        <div class="row">
                            <div class="col-md-12 header">
                                <h4 class="ten"><?php echo $product['name']; ?> </h4>
                                <hr>
                            </div>
                            <div class="col-md-7">
                            <form method="GET" action="cart.php">
                                <div class="gia">
                                    <div class="giabia">Gi?? c??:<span class="giacu ml-2"><?php echo number_format ($product['price']); ?> ???</span></div>
                                    <div class="giaban"> <span
                                            class="giamoi font-weight-bold"></span><span class="donvitien"></span></div>
                                    <div class="tietkiem">Gi?? m???i: <b><?php echo number_format ($product['price_new']); ?> ???</b>  </div> 
                                </div>
                                <div class="uudai my-3">
                                    <h6 class="header font-weight-bold">Khuy???n m??i & ??u ????i t???i Computer store:</h6>
                                    <ul>
                                        <li><b>1. Gi?? kh??ng k??m qu??: </b><?php echo number_format ($product['price']); ?> ?? </li>
                                        <li><b>2. Mua v???i gi??: </b><?php echo number_format ($product['price_new']); ?> ??</li>
                                        <li>??? Tr??? g??p 0% kho???n vay 10tr/6 th??ng</li>
                                        <li>??? Chu???t Gaming Rapoo V16 tr??? gi?? 390.000??</li>

                                        <li>??? B??n ph??m c?? Gaming Rapoo V500SE Rainbow LED tr??? gi?? 1.290.000??</li>

                                        <li>??? Tai nghe Gaming Rapoo VH310 7.1 RGB tr??? gi?? 1.290.000??</li>
                                    </ul>
                                </div>

                                <div class="soluong d-flex">
                                    <label class="font-weight-bold">S??? l?????ng: </label>
                                    <div class="input-number input-group mb-3">
                                        <!-- <div class="input-group-prepend">
                                            <span class="input-group-text btn-spin btn-dec">-</span>
                                        </div> -->
                                        <input type="number" name="quantity" value="1" id="number" class="soluongsp  text-center " max="<?php echo $product['quantity'] ?>">
                                        <!-- <div class="input-group-append">
                                            <span class="input-group-text btn-spin btn-inc">+</span>
                                        </div> -->
                                        <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                                    </div>
                                </div>
                                <?php
                                if(isset($_SESSION['user']))
                                {
                                    ?>
                                    <?php if ($product['quantity'] > 0) { ?>
                                    <div  class="font-weight-bold"><label style="margin-right: 5px; color:red;font-size: 14px";>S??? l?????ng c??n:</label><strong><?= $product['quantity'] ?></strong></div>
                                    <button class="nutmua btn w-100 text-uppercase" type="submit"> Th??m v??o gi??? h??ng</button>
                                    <?php } else { ?>
                                    <span class="nutmua btn w-100 text-uppercase"><a href="index.php"class="nutmua btn w-100 text-uppercase">H???t h??ng</a></span>
                                    <?php } ?>
                                    <?php
                                }
                                 else
                                 {
                                    ?>
                                   
                                    <button class="nutmua btn w-100 text-uppercase" type="" ><a href="login.php" style="color: white;" >B???n ph???i ????ng nh???p </a></button>
                                    
                                    <?php
                                 }
                                 ?>
                                
                                <div class="fb-like" data-href="https://www.facebook.com/DealBook-110745443947730/"
                                    data-width="300px" data-layout="button" data-action="like" data-size="small"
                                    data-share="true"></div>
                                    </form>
                            </div>
                            <div class="col-md-5">
                                <div class="thongtinsach">
                                    <ul>
                                        <li> <span class="header font-weight-bold">Khi mua t???i Computer store qu?? kh??c s??? ???????c:</span></li>
                                        <li><b>Mi???n ph?? giao h??ng </b>cho ????n h??ng t??? 1.500.000?? ??? n???i th??nh H?? N???i v?? 2.000.000?? ???
                                            T???nh/Th??nh kh??c</li>
                                        <li>T???ng s???n ph???m k??m theo cho m???i ????n h??ng</li>
                                        <li>L???p r??p m??y mi???n ph?? t???i chi nh??nh (theo y??u c???u)</li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- decripstion c???a 1 s???n ph???m: gi???i thi???u , ????nh gi?? s???n ph???m -->
                    <div class="product-description col-md-9">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active text-uppercase" id="nav-gioithieu-tab"
                                    data-toggle="tab" href="#nav-gioithieu" role="tab" aria-controls="nav-gioithieu"
                                    aria-selected="true">Gi???i thi???u</a>
                                    <a class="nav-item nav-link text-uppercase" id="nav-danhgia-tab" data-toggle="tab"
                                    href="#nav-danhgia" role="tab" aria-controls="nav-danhgia"
                                    aria-selected="false">????nh
                                    gi?? c???a kh??ch h??ng</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active ml-3" id="nav-gioithieu" role="tabpanel"
                                aria-labelledby="nav-gioithieu-tab">
                                <h6 class="tieude font-weight-bold">Th??ng tin chi ti???t s???n ph???m</h6>
                                <p>
                                    <span>
                                    <?php echo $product['content']; ?>
                                    </span>
                                </p>
                            </div>
                           <!-- ????nh gi?? s???n ph???m -->
                            <?php
                            $sql = mysqli_query($con,"SELECT * FROM rate WHERE product_id =".$_REQUEST['id']);
                            $rate = mysqli_fetch_all($sql,MYSQLI_ASSOC);
                            // echo"<pre>";
                            // print_r($rate);                 
                            $count = count($rate);          
                            function star ($rate)
                            {
                                for($i=0;$i<5;$i++)
                                {
                                    if(($rate- $i) >0.5)
                                    {
                                        ?>
                                        <i class="bi bi-star-fill"></i>
                                        <?php
                                    }
                                    else if (($rate -$i) == 0.5 )
                                    {
                                        ?>
                                        <i class="bi bi-star-half"></i>
                                        <?php
                                    }
                                    else if (($rate - $i) < 0.5)
                                    {
                                        ?>
                                        <i class="bi bi-star"></i>
                                        <?php
                                    }

                                }
                            }    
                            ?>
                            <?php
                            $sum =0;
                            foreach ($rate as $value)
                            {
                                $sum += $value['rate'];

                            }
                            if($count !=0)
                            {
                            $tb = round($sum/$count,1);
                            }
                            else
                            {
                                $tb = 0;
                            }
                            
                            ?>
                            <div class="tab-pane fade" id="nav-danhgia" role="tabpanel" aria-labelledby="nav-danhgia-tab">
                                <div class="row">
                                    <div class="col-md-3 text-center">
                                        <p class="tieude">????nh gi?? trung b??nh</p>
                                        <div class="diem"><?php echo $tb ?>/5</div>
                                        <div class="sao">
                                        <?php
                                           echo star($tb); 
                                        ?>
                                        </div>
                                        <p class="sonhanxet text-muted">(<?php echo $count ?> nh???n x??t)</p>
                                    </div>
                                    <div class="col-md-5">
                                       
                                        <div class="tiledanhgia text-center">
                                            <div class="motthanh d-flex align-items-center">5 <i class="fa fa-star"></i>
                                                <div class="progress mx-2">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div> 0%
                                            </div>
                                            <div class="motthanh d-flex align-items-center">4 <i class="fa fa-star"></i>
                                                <div class="progress mx-2">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div> 0%
                                            </div>
                                            <div class="motthanh d-flex align-items-center">3 <i class="fa fa-star"></i>
                                                <div class="progress mx-2">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div> 0%
                                            </div>
                                            <div class="motthanh d-flex align-items-center">2 <i class="fa fa-star"></i>
                                                <div class="progress mx-2">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div> 0%
                                            </div>
                                            <div class="motthanh d-flex align-items-center">1 <i class="fa fa-star"></i>
                                                <div class="progress mx-2">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div> 0%
                                            </div>
                                            
                                        </div>
                                      
                                       
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <?php
                                        if(isset($_SESSION['user']))
                                        {
                                            ?>
                                             <div class="btn vietdanhgia mt-3">Vi???t ????nh gi?? c???a b???n</div>
                                             <!-- n???i dung c???a form ????nh gi??  -->
                                        <div class="formdanhgia">
                                            <form action="xulydanhgia.php" method="POST">
                                            <h6 class="tieude text-uppercase">G???I ????NH GI?? C???A B???N</h6>
                                            <span class="danhgiacuaban">????nh gi?? c???a b???n v??? s???n ph???m n??y:</span>
                                            <div class="rating d-flex flex-row-reverse align-items-center justify-content-end">
                                                <input type="radio" name="star" id="star1" value="5"><label for="star1"></label>
                                                <input type="radio" name="star" id="star2" value="4"><label for="star2"></label>
                                                <input type="radio" name="star" id="star3" value="3"><label for="star3"></label>
                                                <input type="radio" name="star" id="star4" value="2"><label for="star4"></label>
                                                <input type="radio" name="star" id="star5" value="1"><label for="star5"></label>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="name" class="txtFullname w-100" placeholder="M???i b???n nh???p t??n">
                                                <div class="has-error">
                                                    <span>
                                                        <?php echo (isset($error['name']))  ? $error['name'] : ''?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="review" class="txtComment w-100" placeholder="????nh gi?? c???a b???n v??? s???n ph???m n??y">
                                                <div class="has-error">
                                                    <span>
                                                        <?php echo (isset($error['review'])) ? $error['review'] : '' ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <input type="hidden" name="addcomment" value="1">
                                            <button type="submit" name="id" value="<?php echo $_REQUEST['id'] ?>" class="btn nutguibl">G???i b??nh lu???n</button>
                                            
                                        </div>
                                        </form>
                                        </div>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                                <div class="btn vietdanhgia mt-3">B???n ph???i ????ng nh???p m???i ???????c ????nh gi??</div>
                                            <?php

                                        }
                                        ?>
                                           
                                    </div>
                                       
                                    <?php
                                    foreach ($rate as $value)
                                    {
                                        ?> 
                                    <div class="rate-product">
                                          <div class="rate-product--item">
                                            <p><?php echo star($value['rate']) ?></p>
                                            <p class="rate-name"><?php echo $value['name'] ?></p>
                                            <p class="rate-evaluate"><?php echo $value['review'] ?></p>  
                                          </div>          
                                    </div>
                                      <?php
                                    }
                                    ?>
                                    
                            </div>
                          
                            <hr>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </section>

    <!-- kh???i s???n ph???m t????ng t??? -->
    

    <!-- kh???i s??ch b???n ???? xem  -->
    

    <!-- thanh cac dich vu :mien phi giao hang, qua tang mien phi ........ -->
    <?php
    include 'main/footer/dichvu.php'
    ?>

    <?php
    include 'main/footer/footer.php'
    ?>

    <!-- nut cuon len dau trang -->
    <div class="fixed-bottom">
        <div class="btn btn-warning float-right rounded-circle nutcuonlen" id="backtotop" href="#" style="background:#CF111A;"><i
                class="fa fa-chevron-up text-white"></i></div>
    </div>


</body>
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
            toastr.warning('B???n ch??? c?? th??? mua t???i ??a '+limit+' s???n ph???m');
        }
    })
</script>

</html>

