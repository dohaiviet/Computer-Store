<?php
require_once"(connect_db.php)";
if(isset($_POST['action'])){
    $query = "SELECT * FROM product WHERE product_id = 1 ";

    if(isset($_POST['brand'])){
        $brand_filter = implode(",", $_POST['brand']);
        $query .= "AND product_brand IN ('".$brand_filter."')";
    }

    $database;
    $stmt = $db->prepare($query);
    $stmt->excute();
    $result = $stmt->fetchAll();
    $count = $stmt->rowCount();
    $output = '';

    if($count>0){
        foreach($result as $key => $value){
            $output .='<div clas="col-md-4">
                <div style="bolder:1px solid #ccc; boder-radius: 5px;
                 padding: 16px; margin-bottom: 16px; height:385px">
                 </div>
                </div>
            ';
        }
    }
}
?>