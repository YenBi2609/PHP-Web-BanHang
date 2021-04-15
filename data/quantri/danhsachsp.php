<script>
function xoaSanPham() {
    var conf = confirm("Bạn có chắc chắn muốn xóa sản phẩm này hay không?");
    return conf;
}
</script>
<?php
// Thanh phân trang
if(isset($_GET['page'])){
    $page=$_GET['page'];
}
else $page=1;
$rowsPerPage=5;
$perRow=$page*$rowsPerPage - $rowsPerPage;

$totalRows= mysqli_num_rows(mysqli_query($conn, "select * from sanpham"));
$totalPages=ceil($totalRows/$rowsPerPage);
$listPage ="";
for($i=1; $i <= $totalPages;$i++){
       if($page==$i){
           $listPage.='<li class ="active"><a href="quantri.php?page_layout=danhsachsp&page='.$i.'">'.$i.'</a></li>';

       }
       else $listPage .='<li><a href="quantri.php?page_layout=danhsachsp&page='.$i.'">'.$i.'</a></li>';
}


$sql="select * from sanpham inner join dmsanpham on sanpham.id_dm=dmsanpham.id_dm order by id_sp limit $perRow,$rowsPerPage ";
$query = mysqli_query($conn,$sql);
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Danh sách sản phẩm</h1>
    </div>
</div>
<!--/.row-->
<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
        <a href="quantri.php?page_layout=themsp" class="btn btn-primary">Thêm sản phẩm</a>
        <div class="bootstrap-table">
            <div class="table-responsive">

                <table class="table table-bordered" style="margin-top:20px;">
                    <thead>
                        <tr class="bg-info">
                            <th>ID</th>
                            <th width="30%">Tên Sản phẩm</th>
                            <th>Giá sản phẩm</th>
                            <th width="20%">Ảnh sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Tùy chọn</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php
						while($row = mysqli_fetch_array($query)){
						?>
                        <tr>
                            <td><?php echo $row['id_sp']; ?></td>
                            <td><?php echo $row['ten_sp'];?></td>
                            <td><?php echo $row['gia_sp'];?></td>
                            <td>
                                <img width="200px" src="img/<?php echo $row['anh_sp'];?>" class="thumbnail">
                            </td>
                            <td><?php echo $row['ten_dm'];?></td>
                            <td>
                                <a href="quantri.php?page_layout=suasp&id_sp=<?php echo $row['id_sp']; ?>" class="btn btn-warning"><span
                                        class="glyphicon glyphicon-edit"></span>Sửa</a>
                                <a onclick="return xoaSanPham();" href="xoasp.php?id_sp=<?php echo $row['id_sp']; ?>" class="btn btn-danger"><span
                                        class="glyphicon glyphicon-trash"></span>Xóa</a>
                            </td>
						</tr>
						<?php }
						?>
                    </tbody>
                </table>
                <ul class="pagination" style="float: right">
                        <li><a href="#"><<</a></li>
                        <?php echo $listPage; ?>
                        <li><a href="#">>></a></li>

                </ul>
            </div>
        </div>
    </div>
</div>

<!--/.row-->