<?php
$sqlDm="select * from dmsanpham";
$queryDm = mysqli_query($conn,$sqlDm);

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

    if($_FILES['anh_sp']['name'] ==''){
        $error_anh_sp='<span style="color: red;">(*)</span>';
    }
    else {
        $anh_sp = $_FILES['anh_sp']['name'];
        $tmp_name = $_FILES['anh_sp']['tmp_name'];
    }

    if($_POST["id_dm"] == "unselect"){
        $error_id_dm='<span style="color: red;">(*)</span>';
    }
    else $id_dm= $_POST[id_dm];

    if(isset($ten_sp) && isset($gia_sp) && isset($phu_kien) && isset($bao_hanh) && isset($khuyen_mai) &&
         isset($tinh_trang)  && isset($trang_thai) && isset($chi_tiet_sp) && 
         isset($id_dm) && isset($anh_sp) && isset($dac_biet)){
            move_uploaded_file($tmp_name,"img/".$anh_sp);
        $sql = "insert into sanpham(ten_sp,gia_sp,phu_kien,bao_hanh,khuyen_mai,tinh_trang,trang_thai,chi_tiet_sp,id_dm,anh_sp,dac_biet) 
        values
        ('$ten_sp','$gia_sp','$phu_kien','$bao_hanh','$khuyen_mai','$tinh_trang','$trang_thai','$chi_tiet_sp','$id_dm','$anh_sp','$dac_biet')";
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
            <div class="panel-heading">Thêm sản phẩm</div>
            <div class="panel-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="row" style="margin-bottom:40px">
                        <div class="col-xs-8">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input required type="text" name="ten_sp" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input required type="text" name="gia_sp" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Ảnh sản phẩm</label>
                                <input required id="img" type="file" name="anh_sp" >
                            </div>
                            <div class="form-group">
                                <label>Phụ kiện</label>
                                <input required type="text" name="phu_kien" value="Hộp, sạc, tai nghe"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Bảo hành</label>
                                <input required type="text" name="bao_hanh" value="12 Tháng" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Khuyến mãi</label>
                                <input required type="text" name="khuyen_mai" value="Dán màn hình 3 lớp"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tình trạng</label>
                                <input required type="text" name="tinh_trang" value="Máy mới 100%" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select required name="trang_thai" class="form-control">
                                    <option value="Còn hàng">Còn hàng</option>
                                    <option value="Hết hàng">Hết hàng</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Miêu tả</label>
                                <textarea rows="5" class="form-control" required name="chi_tiet_sp"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Danh mục</label>
                                <select required name="id_dm" class="form-control">
                                    <option value="unselect">Lựa chọn nhà cung cấp</option>
                                    <?php
						           while($rowDm = mysqli_fetch_array($queryDm)){
						           ?>
                                    <option value="<?php echo $rowDm['id_dm']; ?>"><?php echo $rowDm['ten_dm']; ?>
                                    </option>
                                    <?php
                                   }
						             ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sản phẩm nổi bật</label><br>
                                Có: <input type="radio" name="dac_biet" value="1">
                                Không: <input type="radio" checked name="dac_biet" value="0">
                            </div>
                            <input type="submit" name="submit" value="Thêm" class="btn btn-primary">
                            <a href="quantri.php?page_layout=danhsachsp" class="btn btn-danger">Hủy bỏ</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/.row-->