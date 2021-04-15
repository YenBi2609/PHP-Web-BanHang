<?php
    $id_dm=$_GET['id_dm'];
    $sqlDm = "select * from dmsanpham where id_dm='$id_dm'";
    $queryDm = mysqli_query($conn,$sqlDm);
    $rowDm = mysqli_fetch_array($queryDm);

    $sql = "select * from sanpham where id_dm='$id_dm' order by id_sp DESC ";
    $query = mysqli_query($conn,$sql);

// Thanh phân trang
if(isset($_GET['page'])){
    $page=$_GET['page'];
}
else $page=1;
$rowsPerPage=4;
$perRow=$page*$rowsPerPage - $rowsPerPage;
// tong so ban ghi
$totalRows= mysqli_num_rows(mysqli_query($conn, "select * from sanpham where id_dm=$id_dm"));
// tong so trang
$totalPages=ceil($totalRows/$rowsPerPage);
// xay dung thanh phan trang
$listPage ="";
for($i=1; $i <= $totalPages;$i++){
       if($page==$i){
           $listPage.='<li class ="active"><a href="index.php?page_layout=danhsachsp&id_dm='.$id_dm.'&page='.$i.'">'.$i.'</a></li>';

       }
       else $listPage .='<li><a href="index.php?page_layout=danhsachsp&id_dm='.$id_dm.'&page='.$i.'">'.$i.'</a></li>';
}


$sql = "select * from sanpham where id_dm='$id_dm' order by id_sp DESC  limit $perRow,$rowsPerPage ";
$query = mysqli_query($conn,$sql);
?>
<div id="wrap-inner">
    <div class="products">
        <h3><?php echo $rowDm['ten_dm'];?></h3>
        <div class="product-list row">
        <?php
            while($row = mysqli_fetch_array($query)){

            ?>
            <div class="product-item col-md-3 col-sm-6 col-xs-12">
                <img src="quantri/img/<?php echo $row['anh_sp'];?>" style="height:230px" class="img-thumbnail">
                <p><a href="#"><?php echo $row['ten_sp'];?></a></p>
                <p class="price"><?php echo $row['gia_sp'];?></p>
                <div class="marsk">
                    <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp'];?>">Xem chi tiết</a>
                </div>
            </div>
            <?php
            }
            ?>
            </div>
        </div>
    </div>

    <ul class="pagination" style="float: right">
                        <li><a href="#"><<</a></li>
                        <?php echo $listPage; ?>
                        <li><a href="#">>></a></li>

                </ul>
</div>
