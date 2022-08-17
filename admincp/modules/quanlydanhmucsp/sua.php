<?php
    $sql_sua_danhmucsp = "SELECT * FROM tbl_danhmuc WHERE Id='$_GET[iddanhmuc]' ORDER BY thutu DESC ";
    $query_sua_danhmucsp = mysqli_query($mysqli,$sql_sua_danhmucsp);
    
?>
<?php
    while($row = mysqli_fetch_array($query_sua_danhmucsp)){
?>

<h3>Sửa Danh Mục sản Phẩm</h3>
<form class="CU" method="POST" action="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc']?>" >
    <label for="fname">Tên danh mục sản phẩm:</label>
    <input type="text" name="tendanhmuc" value="<?php echo $row['tendanhmuc']?>">
    <label for="lname">Thứ tự:</label>
    <input type="text" name="thutu"  value="<?php echo $row['thutu']?>">
    <input class="sua" type="submit" value="Sửa" name="suadanhmuc">
    <?php
    }
    ?>
 </form>