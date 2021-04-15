<script>
function searchFocus() {
    if (document.sform.stext.value == 'Nhập từ khóa ...') {
        document.sform.stext.value = '';
    }
}

function searchBlur() {
    if (document.sform.stext.value == '') {
        document.sform.stext.value = 'Nhập từ khóa ...';
    }
}
</script>
<div id="search" class="col-md-7 col-sm-12 col-xs-12">
    <form method="post" name="sform" action="index.php?page_layout=danhsachtimkiem">
        <input onfocus="searchFocus();" onblur="searchBlur();" type="text" name="stext" value="Nhập từ khóa ...">
        <input type="submit" name="submit" value="Tìm Kiếm">
    </form>
</div>