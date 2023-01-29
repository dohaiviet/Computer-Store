<!DOCTYPE html>
<html>
    <head>
        <title>In hóa đơn</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/admin_style.css" >
        <script src="../resources/ckeditor/ckeditor.js"></script>
        <link rel="icon" href="images/logo1.png">
    </head>
    <body onload="window.print();">
        <?php
        session_start();
            include './connect_db.php';
            $orders = mysqli_query($con, "SELECT orders.name, orders.address, orders.phone, orders.content,orders.id, orders_detail.*, product.name as product_name 
            FROM orders
            INNER JOIN orders_detail ON Orders.id = orders_detail.order_id
            INNER JOIN product ON product.id = orders_detail.product_id
            WHERE orders.id = " . $_GET['id']);
            $orders = mysqli_fetch_all($orders, MYSQLI_ASSOC);
        ?>
        <div id="order-detail-wrapper">
            <div id="order-detail" class="order-detail" >
                <h1>Chi tiết hóa đơn</h1>
                <h3 style="text-align: center;">-------oOo-------</h3>
                <label>Mã đơn hàng: </label><span> <?= $orders[0]['id'] ?></span><br/>
                <label>Người nhận: </label><span> <?= $orders[0]['name'] ?></span><br/>
                <label>Địa chỉ: </label><span> <?= $orders[0]['address'] ?></span><br/>
                <label>Điện thoại: </label><span> <?= $orders[0]['phone'] ?></span><br/>
                <hr/>
                <h3>Danh sách sản phẩm:</h3>
                <ul>
                    <?php
                    $totalQuantity = 0;
                    $totalMoney = 0;
                    foreach ($orders as $row) {
                        ?>
                        <li>
                            <span class="item-name"><?= $row['product_name'] ?></span>
                            <span class="item-quantity"> - SL: <?= $row['quantity'] ?> sản phẩm - Đơn giá: <?=number_format($row['price']) ?> đ</span>
                        </li>
                        <?php
                        $totalMoney += ($row['price'] * $row['quantity']);
                        $totalQuantity += $row['quantity'];
                    }
                    ?>
                </ul>
                <hr/>
                <label>Tổng SL:</label> <?= $totalQuantity ?> - <label>Tổng tiền:</label> <?= number_format($totalMoney) ?> đ
                <p><label>Ghi chú: </label><?= $orders[0]['content'] ?></p>
            </div>
        </div>
    </body>
</html>