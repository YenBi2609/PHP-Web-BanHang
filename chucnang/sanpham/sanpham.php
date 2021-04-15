<?php
$sql="select * from sanpham where dac_biet=1 order by id_sp  limit 8 ";
$query = mysqli_query($conn,$sql);
?>
<!-- main -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="img/home/slide-1.jpg" alt="Chania">
            <div class="carousel-caption">
            </div>
        </div>

        <div class="item">
            <img src="img/home/slide-2.jpg" alt="Chicago">
            <div class="carousel-caption">

            </div>
        </div>

        <div class="item">
            <img src="img/home/slide-3.jpg" alt="New York">
            <div class="carousel-caption">

            </div>
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div id="banner-t" class="text-center">
    <div class="row">
        <div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
            <a href="index.php?page_layout=danhsachsp&id_dm=5"><img src="img/home/banner-t-1.jpg" alt="" class="img-thumbnail"></a>
        </div>
        <div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
            <a href="index.php?page_layout=danhsachsp&id_dm=6"><img src="img/home/banner-t-2.jpg" alt="" class="img-thumbnail"></a>
        </div>
    </div>
</div>
<div id="wrap-inner">
    <div class="products">
        <h3>sản phẩm bán chạy</h3>
        <div class="product-list row">
            <?php
            while($row = mysqli_fetch_array($query)){

            ?>
            <div class="product-item col-md-3 col-sm-6 col-xs-12">
                <img src="quantri/img/<?php echo $row['anh_sp'];?>" style="height:230px" class="img-thumbnail">
                <p><a href="#"><?php echo $row['ten_sp'];?></a></p>
                <p class="price"><?php echo $row['gia_sp'];?> VNĐ</p>
                <div class="marsk">
                    <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp'];?>">Xem chi tiết</a>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
    <?php
$sql2="select * from sanpham  order by id_sp DESC  limit 8 ";
$query2 = mysqli_query($conn,$sql2);
?>
    <div class="products">
        <h3>sản phẩm mới</h3>
        <div class="product-list row">
            <?php
            while($row2 = mysqli_fetch_array($query2)){

            ?>
            <div class="product-item col-md-3 col-sm-6 col-xs-12">
                <img src="quantri/img/<?php echo $row2['anh_sp'];?>" style="height:230px" class="img-thumbnail">
                <p><a href="#"><?php echo $row2['ten_sp'];?></a></p>
                <p class="price"><?php echo $row2['gia_sp'];?></p>
                <div class="marsk">
                    <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row2['id_sp'];?>">Xem chi tiết</a>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>