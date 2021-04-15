<script>
function xoaDanhMuc() {
    var conf = confirm("Bạn có chắc chắn muốn xóa danh mục này hay không?");
    return conf;
}
</script>
<?php
if(isset($_GET['page'])){
    $page=$_GET['page'];
}
else $page=1;
$rowsPerPage=5;
$perRow=$page*$rowsPerPage - $rowsPerPage;
$sql="select * from dmsanpham order by id_dm limit $perRow,$rowsPerPage";
$query = mysqli_query($conn,$sql);

$totalRows= mysqli_num_rows(mysqli_query($conn, "select * from dmsanpham"));
$totalPages=ceil($totalRows/$rowsPerPage);
$listPage ="";
for($i=1; $i <= $totalPages;$i++){
       if($page==$i){
           $listPage.='<li class ="active"><a href="quantri.php?page_layout=danhsachdm&page='.$i.'">'.$i.'</a></li>';

       }
       else $listPage .='<li><a href="quantri.php?page_layout=danhsachdm&page='.$i.'">'.$i.'</a></li>';
}



if(isset($_POST["themmoi"])){
    $ten_dm = $_POST['ten_dm'];
    if(isset($ten_dm)){
        $sql1="insert into dmsanpham(ten_dm) values('$ten_dm')";
        $sql2="ALTER TABLE dmsanpham DROP id_dm"; 
        $sql3="ALTER TABLE dmsanpham AUTO_INCREMENT = 1"; 
        $sql4="ALTER TABLE dmsanpham ADD id_dm int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST"; 
        mysqli_query($conn,$sql1);
        mysqli_query($conn,$sql2);
        mysqli_query($conn,$sql3);
        mysqli_query($conn,$sql4);
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
                Thêm danh mục
            </div>
            <form class="panel-body" method="post">
                <div class="form-group">
                    <label>Tên danh mục:</label>
                    <input type="text" name="ten_dm" class="form-control" placeholder="Tên danh mục...">
                </div>
                <div class="form-group">
                    <input type="submit" name="themmoi" class="btn btn-primary" value="Thêm mới">
                </div>
            </form>
        </div>
    </div>
    <div class="col-xs-12 col-md-7 col-lg-7">
        <div class="panel panel-primary">
            <div class="panel-heading">Danh sách danh mục</div>
            <div class="panel-body">
                <div class="bootstrap-table">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-info">
                                <th>ID</th>
                                <th>Tên danh mục</th>
                                <th style="width:30%">Tùy chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        while($row = mysqli_fetch_array($query)){
                        ?>
                            <tr>
                                <td><?php echo $row['id_dm']; ?></td>
                                <td><?php echo $row['ten_dm']; ?></td>
                                <td>
                                    <a href="quantri.php?page_layout=suadm&id_dm=<?php echo $row['id_dm']; ?>"
                                        class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
                                    <a onclick="return xoaDanhMuc();"
                                        href="xoadm.php?id_dm=<?php echo $row['id_dm']; ?>" class="btn btn-danger"><span
                                            class="glyphicon glyphicon-trash"></span>
                                        Xóa</a>
                                </td>
                            </tr>
                            <?php
                           }
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
</div>

<!--/.row-->