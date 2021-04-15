<div id="wrap-inner">
    <h3>Giỏ hàng</h3>
    <?php
        if(isset($_SESSION['giohang'])){
            if(isset($_POST['sl'])){
                foreach($_POST['sl'] as $id_sp=>$sl){
                    if($sl==0){
                        unset($_SESSION['giohang'][$id_sp]);
                    }
                    else if($sl>0){
                        $_SESSION['giohang'][$id_sp]=$sl;
                    }
                }
            }

            $arrId=array();
            foreach($_SESSION['giohang'] as $id_sp => $so_luong){
                $arrId[] = $id_sp;
            }
            $strId = implode(',' ,$arrId);
            $sql="select * from sanpham where id_sp IN ($strId) order by id_sp ";
            $query = mysqli_query($conn,$sql);
    ?>
    <form id="giohang" method="post">
        <table class="table table-bordered .table-responsive text-center">

            <tr class="active">
                <td width="11.111%">Ảnh mô tả</td>
                <td width="22.222%">Tên sản phẩm</td>
                <td width="22.222%">Số lượng</td>
                <td width="16.6665%">Đơn giá</td>
                <td width="16.6665%">Thành tiền</td>
            </tr>
            <?php
                $totalPriceAll =0;

                   while($row = mysqli_fetch_array($query)){
                    $totalPrice = $row['gia_sp'] * $_SESSION['giohang'][$row['id_sp']];
                  ?>
            <tr>

                <td><img class="img-responsive" src="quantri/img/<?php echo $row['anh_sp']; ?>"></td>
                <td><?php echo $row['ten_sp']; ?></td>
                <td>
                    <div class="form-group">
                        <input name="sl[<?php echo $row['id_sp']; ?>]" class="form-control" type="number"
                            value="<?php echo $_SESSION['giohang'][$row['id_sp']]; ?>">
                    </div>
                </td>
                <td><span class="price"><?php echo $row['gia_sp']; ?></span></td>
                <td><span class="price"><?php echo $totalPrice ?></span></td>

            </tr>
            <?php
             $totalPriceAll += $totalPrice;
             }
        ?>



        </table>

        <div class="row" id="total-price">
            <div class="col-md-6 col-sm-12 col-xs-12">
                Tổng thanh toán: <span class="total-price"><?php echo $totalPriceAll ?></span>

            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <a href="index.php" class="my-btn btn">Mua tiếp</a>
                <a onclick="document.getElementById('giohang').submit();" href="#" class="my-btn btn">Cập nhật</a>

            </div>
        </div>
    </form>
    <div style="float:right">
        <a href="index.php?page_layout=muahang" class="btn btn-default" role="button">Thực hiện đơn hàng</a>
    </div>

    <?php
        }
        else  echo 'Hiện không có sản phẩm nào trong giỏ hàng của bạn!';
    ?>
</div>
