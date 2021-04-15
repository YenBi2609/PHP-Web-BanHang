<?php
$id_dm=$_GET['id_dm'];
$sql="select * from dmsanpham where id_dm ='$id_dm'";
$query=mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
if(isset($_POST["suadm"])){
    $ten_dm = $_POST['ten_dm'];
    if(isset($ten_dm)){
        $sql="update dmsanpham set ten_dm ='$ten_dm' where id_dm = '$id_dm'";
        $query=mysqli_query($conn,$sql);
        header('location:quantri.php?page_layout=danhsachdm');
    }
}

?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Danh mục sản phẩm</h1>
    </div>
</div>
<!--/.row-->

<div class="row">
    <div class="col-xs-12 col-md-5 col-lg-5">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Sửa danh mục
            </div>
            <form class="panel-body" method="post">
                <div class="form-group">
                    <label>Tên danh mục:</label>
                    <input type="text" name="ten_dm" class="form-control" value="<?php echo $row['ten_dm']; ?>" >
                </div>
                <div class="form-group">
                    <input type="submit" name="suadm"  class= "btn btn-primary" value="Sửa">
                </div>
            </form>
        </div>
    </div>
</div>
<!--/.row-->