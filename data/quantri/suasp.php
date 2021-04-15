<?php
$id_sp=$_GET['id_sp'];

$sqlDm="select * from dmsanpham";
$queryDm = mysqli_query($conn,$sqlDm);

$sql="select * from sanpham where id_sp ='$id_sp'";
$query=mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);

if(isset($_POST["submit"])){
    $ten_sp=$_POST["ten_sp"];
    $gia_sp=$_POST["gia_sp"];
    $bao_hanh=$_POST["bao_hanh"];
    $phu_kien=$_POST["phu_kien"];
    $tinh_trang=$_POST["tinh_trang"];
    $khuyen_mai=$_POST["khuyen_mai"];
    $trang_thai=$_POST["trang_thai"];
    $chi_tiet_sp=$_POST["chi_tiet_sp"];
    $dac_biet = $_POST['dac_biet'];
    $id_dm = $_POST['id_dm'];

    if($_FILES['anh_sp']['name'] == ""){
        $anh_sp =$_POST['anh_sp'];
    }
    else {
        $anh_sp = $_FILES['anh_sp']['name'];
        $tmp_name = $_FILES['anh_sp']['tmp_name'];
    }

    if(isset($ten_sp) && isset($gia_sp) && isset($phu_kien) && isset($bao_hanh) && isset($khuyen_mai) &&
      isset($tinh_trang)  && isset($trang_thai) && isset($chi_tiet_sp) && isset($dac_biet)){
       move_uploaded_file($tmp_name,"img/".$anh_sp);
   $sql = "update sanpham set ten_sp = '$ten_sp',gia_sp = '$gia_sp',phu_kien = '$phu_kien',bao_hanh = '$bao_hanh',
   khuyen_mai ='$khuyen_mai',tinh_trang ='$tinh_trang',trang_thai='$trang_thai',
   chi_tiet_sp ='$chi_tiet_sp',id_dm='$id_dm',anh_sp ='$anh_sp',dac_biet='$dac_biet'
   where id_sp = $id_sp";
   $query = mysqli_query($conn,$sql);
    header('location: quantri.php?page_layout=danhsachsp');
   }
}
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Sản phẩm</h1>
    </div>
</div>
<!--/.row-->

<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">

        <div class="panel panel-primary">
            <div class="panel-heading">Sửa sản phẩm</div>
            <div class="panel-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="row" style="margin-bottom:40px">
                        <div class="col-xs-8">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input required type="text" name="ten_sp"
                                    value="<?php if(isset($_POST['ten_sp'])){echo $_POST['ten_sp'];} else echo $row['ten_sp']; ?>"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input required type="text" name="gia_sp"
                                    value="<?php if(isset($_POST['gia_sp'])){echo $_POST['gia_sp'];}else echo $row['gia_sp']; ?>"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Ảnh sản phẩm</label>
                                <input type="file" name="anh_sp" class="form-control">
                                <input type="hidden" name='anh_sp' value="<?php echo $row['anh_sp']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Phụ kiện</label>
                                <input required type="text" name="phu_kien"
                                    value="<?php if(isset($_POST['phu_kien'])){echo $_POST['phu_kien'];}else echo $row['phu_kien']; ?>"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Bảo hành</label>
                                <input required type="text" name="bao_hanh"
                                    value="<?php if(isset($_POST['bao_hanh'])){echo $_POST['bao_hanh'];}else echo $row['bao_hanh']; ?>"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Khuyến mãi</label>
                                <input required type="text" name="khuyen_mai"
                                    value="<?php if(isset($_POST['khuyen_mai'])){echo $_POST['khuyen_mai'];}else echo $row['khuyen_mai']; ?>"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tình trạng</label>
                                <input required type="text" name="tinh_trang"
                                    value="<?php if(isset($_POST['tinh_trang'])){echo $_POST['tinh_trang'];} else echo $row['tinh_trang']; ?>"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select required name="trang_thai"
                                    value="<?php if(isset($_POST['trang_thai'])){echo $_POST['trang_thai'];}else echo $row['trang_thai']; ?>"
                                    class="form-control">
                                    <option <?php
                                   if($row['trang_thai'] == "Còn hàng"){
                                       echo 'selected="select"';
                                   }
						             ?> >Còn hàng</option>
                                    <option <?php
                                   if($row['trang_thai'] == "Hết hàng"){
                                       echo 'selected="select"';
                                   }
						             ?> >Hết hàng</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Miêu tả</label>
                                <textarea rows="5" class="form-control" required
                                    name="chi_tiet_sp"><?php if(isset($_POST['chi_tiet_sp'])){echo $_POST['chi_tiet_sp'];}else echo $row['chi_tiet_sp']; ?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Danh mục</label>
                                <select required name="id_dm" class="form-control">
                                    <?php
						           while($rowDm = mysqli_fetch_array($queryDm)){
						           ?>
                                    <option <?php
                                   if($row['id_dm'] == $rowDm['id_dm']){
                                       echo 'selected="select"';
                                   }
						             ?> value="<?php echo $rowDm['id_dm']; ?>"><?php echo $rowDm['ten_dm']; ?> </option>
                                    <?php
                                   }
						             ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sản phẩm nổi bật</label><br>
                                Có : <input type="radio" name="dac_biet" <?php
                                   if($row['dac_biet'] == 1){
                                       echo 'checked';
                                   }
						             ?> value="1">
                                <br>
                                Không : <input type="radio" name="dac_biet" <?php
                                   if($row['dac_biet'] == 0){
                                       echo 'checked';
                                   }
						             ?> value="0">
                            </div>
                            <input type="submit" name="submit" value="Cập nhật" class="btn btn-primary">
                            <a href="quantri.php?page_layout=danhsachsp" class="btn btn-danger">Hủy bỏ</a>
                        </div>
                    </div>
                </form>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!--/.row-->