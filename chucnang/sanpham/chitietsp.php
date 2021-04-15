<?php
    $id_sp=$_GET['id_sp'];
    $sql = "select * from sanpham where id_sp='$id_sp'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query)

?>

<div id="wrap-inner">
    <div id="product-info">
        <div class="clearfix"></div>
        <h3><?php echo $row['ten_sp'];?></h3>
        <div class="row">
            <div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
                <img src="quantri/img/<?php echo $row['anh_sp'];?> " class="img-thumbnail">
            </div>
            <div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
                <p>Giá: <span class="price"><?php echo $row['gia_sp'];?></span></p>
                <p>Bảo hành: <?php echo $row['bao_hanh'];?></p>
                <p>Phụ kiện: <?php echo $row['phu_kien'];?></p>
                <p>Tình trạng: <?php echo $row['tinh_trang'];?></p>
                <p>Khuyến mại: <?php echo $row['khuyen_mai'];?></p>
                <p>Trạng thái: <?php echo $row['trang_thai'];?></p>
                <a href="chucnang/giohang/themhang.php?id_sp=<?php echo $row['id_sp'];?> "><button type="button" class="btn btn-danger" >Đặt mua</button></a>
            </div>
        </div>

    </div>
    <div id="product-detail">
        <h3>Chi tiết sản phẩm</h3>
        <pre><?php echo $row['chi_tiet_sp'];?> </pre>
    </div>

</div>