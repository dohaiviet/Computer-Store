
<div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                     <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <a href="dathang.php">  <i class="material-icons">playlist_add_check</i></a>
                        </div>
                        <div class="content">
                            <div class="text">Quản lý đơn hàng
                            <?php 
                                include'./connect_db.php';
                                $oders_querry = "SELECT * from orders";
                                $oders_querry_run = mysqli_query($con, $oders_querry);

                                if($orders_total = mysqli_num_rows($oders_querry_run))
                                {

                                    echo '<div class="number">'.$orders_total.'</div>';
                                    // var_dump($product_total);
                                }
                                else 
                                {
                                    echo ' <div class="number"> No Data</div>';
                                }
                            
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
                    <div class="info-box bg-red hover-expand-effect">
                        <div class="icon">
                           <a href="khachhang.php"> <i class="material-icons">shopping_cart</i></a>
                        </div>
                        <div class="content">
                            <div class="text">Quản lý khách hàng
                            <?php 
                                include'./connect_db.php';
                                $user_querry = "SELECT * from user";
                                $user_querry_run = mysqli_query($con, $user_querry);

                                if($user_total = mysqli_num_rows($user_querry_run))
                                {

                                    echo '<div class="number">'.$user_total.'</div>';
                                    // var_dump($product_total);
                                }
                                else 
                                {
                                    echo ' <div class="number"> No Data</div>';
                                }
                            
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <a href="sanpham.php">  <i class="material-icons">forum</i></a>
                        </div>
                        <div class="content">
                            <div class="text">Quản lý sản phẩm
                            <?php 
                                include'./connect_db.php';
                                $product_querry = "SELECT * from product";
                                $product_querry_run = mysqli_query($con, $product_querry);

                                if($product_total = mysqli_num_rows($product_querry_run))
                                {

                                    echo '<div class="number">'.$product_total.'</div>';
                                    // var_dump($product_total);
                                }
                                else 
                                {
                                    echo ' <div class="number"> No Data</div>';
                                }
                            
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                         <a href="nhanvien.php"><i class="material-icons">person_add</i></a>
                        </div>
                        <div class="content">
                            <div class="text">Quản lý nhân viên
                            <?php 
                                include'./connect_db.php';
                                $admin_querry = "SELECT * from admin";
                                $admin_querry_run = mysqli_query($con, $admin_querry);

                                if($admin_total = mysqli_num_rows($admin_querry_run))
                                {

                                    echo '<div class="number">'.$admin_total.'</div>';
                                    // var_dump($product_total);
                                }
                                else 
                                {
                                    echo ' <div class="number"> No Data</div>';
                                }
                            
                            ?>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-purple hover-expand-effect">
                        <div class="icon">
                         <a href="menu_product.php"><i class="material-icons">list</i></a>
                        </div>
                        <div class="content">
                            <div class="text">Quản lý danh mục
                            <?php 
                                include'./connect_db.php';
                                $menu_querry = "SELECT * from menu_product";
                                $menu_querry_run = mysqli_query($con, $menu_querry);

                                if($menu_total = mysqli_num_rows($menu_querry_run))
                                {

                                    echo '<div class="number">'.$menu_total.'</div>';
                                    // var_dump($product_total);
                                }
                                else 
                                {
                                    echo ' <div class="number"> No Data</div>';
                                }
                            
                            ?>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-expand-effect">
                        <div class="icon">
                         <a href="#"><i class="material-icons">attach_money</i></a>
                        </div>
                        <div class="content">
                            <div class="text">Tổng doanh thu
                            <?php 
                                include'./connect_db.php';
                                $total_price = 0;
                                $sql1 = mysqli_query($con,"SELECT price FROM orders_detail" );
                                while($result1 = mysqli_fetch_array($sql1)) 
                                {
                                    $total_price += $result1['price'];
                                }
                              
                            ?>
                             <div class="number"> <?php echo number_format($total_price) ?> ₫</div>
                            </div>
                    </div>
                </div>
            </div>