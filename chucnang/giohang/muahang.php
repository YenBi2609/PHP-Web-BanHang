<?php
ob_start();
        if(isset($_SESSION['giohang'])){

            $arrId=array();
            foreach($_SESSION['giohang'] as $id_sp => $so_luong){
                $arrId[] = $id_sp;
            }
            $strId = implode(',' ,$arrId);
            $sql="select * from sanpham where id_sp IN ($strId) order by id_sp ";
            $query = mysqli_query($conn,$sql);
    ?>

<div id="wrap-inner">
    <div id="hoa-don">
        <h3>Hóa đơn mua hàng</h3>
        <table class="table-bordered table-responsive">
            <?php
                $totalPriceAll =0;
                   while($row = mysqli_fetch_array($query)){
                    $totalPrice = $row['gia_sp'] * $_SESSION['giohang'][$row['id_sp']];
                  ?>
            <tr class="bold">
                <td width="30%">Tên sản phẩm</td>
                <td width="25%">Giá</td>
                <td width="20%">Số lượng</td>
                <td width="15%">Thành tiền</td>
            </tr>
            <tr>
                <td><?php echo $row['ten_sp']; ?></td>
                <td class="price"><?php echo $row['gia_sp']; ?></td>
                <td><?php echo $_SESSION['giohang'][$row['id_sp']]; ?></td>
                <td class="price"><?php echo $totalPrice ?></td>
            </tr>

            <?php
             $totalPriceAll += $totalPrice;
             }
            ?>
            <tr>
                <td colspan="3">Tổng tiền:</td>
                <td class="total-price"><?php echo $totalPriceAll ?></td>
            </tr>

        </table>
    </div>
    <?php
    if(isset($_POST['submit'])){
        $email=$_POST['email'];
        $ten=$_POST['name'];
        $sdt=$_POST['phone'];
        $diachi=$_POST['add'];

        if(isset($ten) && isset($email) && isset($sdt) && isset($diachi)){
            if(isset($_SESSION['giohang'])){

                $arrId=array();
                foreach($_SESSION['giohang'] as $id_sp => $so_luong){
                    $arrId[] = $id_sp;
                }
                $strId = implode(',' ,$arrId);
                $sql="select * from sanpham where id_sp IN ($strId) order by id_sp ";
                $query = mysqli_query($conn,$sql);
            
        header('location: index.php?page_layout=hoanthanh');
            }
        }

      }
    ?>
    <form method="post">
        <div class="form-group">
            <label for="email">Email address:</label>
            <input required type="email" class="form-control" name="email">
        </div>
        <div class="form-group">
            <label for="name">Họ và tên:</label>
            <input required type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label for="phone">Số điện thoại:</label>
            <input required type="number" class="form-control" name="phone">
        </div>
        <div class="form-group">
            <label for="add">Địa chỉ:</label>
            <input required type="text" class="form-control" name="add">
        </div>
        <div class="form-group text-right">
            <button name="submit" class="btn btn-default">Mua hàng</button>
        </div>
    </form>
    <?php
        }
    ?>
</div>