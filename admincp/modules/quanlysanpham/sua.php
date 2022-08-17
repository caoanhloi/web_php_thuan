<?php
    $sql_sua_sanpham = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[idsanpham]'";
    $query_sua_sanpham = mysqli_query($mysqli,$sql_sua_sanpham);
    
?>
<?php
    while($row = mysqli_fetch_array( $query_sua_sanpham)){
?>

<h3>Sửa Sản Phẩm</h3>
<form class="CU" method="POST" action="modules/quanlysanpham/xuly.php?idsanpham=<?php echo $row['id_sanpham']?>" enctype="multipart/form-data" >

<label for="fname">Mã sản phẩm:</label>
    <input type="text" name="masanpham" value="<?php echo $row['masanpham']?>">

    <label for="fname">Tên sản phẩm:</label>
    <input type="text" name="tensanpham"  value="<?php echo $row['tensanpham']?>" >
    <label for="fname">Giá:</label>
    <input type="text" name="gia"  value="<?php echo $row['gia']?>" >
    <label for="fname">Số lượng:</label>
    <input type="text" name="soluong"  value="<?php echo $row['soluong']?>" >
    <label for="fname">Hình ảnh:</label>
    <input type="file" name="hinhanh" >
    <img src="modules/quanlysanpham/uploads/<?php echo $row['hinhanh']?>" alt="">
<br>
    <label for="fname">Tóm tắt:</label>
    <br>
    <textarea name="tomtat" id="" cols="100%" rows="10"><?php echo $row['tomtat'] ?></textarea>
    <br>
    <br>
    <br>
    <label for="fname">Nội dung:</label>
    <br>
    <textarea name="noidung" id="" cols="100%" rows="10"><?php echo $row['noidung']?></textarea>
    <br>
    <br>
    <label for="fname">Danh mục sản phẩm</label>
    <br>
    <select name="danhmuc" >
       <?php
             $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY Id DESC ";
             $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc); 
             while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                if($row_danhmuc['Id']==$row['danhmuc_id']){
       ?>
       <option selected value="<?php echo $row_danhmuc['Id']?>"><?php echo $row_danhmuc['tendanhmuc']?></option>
        <?php
             }else{
             ?>
       <option value="<?php echo $row_danhmuc['Id']?>"><?php echo $row_danhmuc['tendanhmuc']?></option>
            <?php
             }
            }
            ?>
    </select>
<br>
<br>
    <label for="fname">Tình trạng</label>
    <br>
    <select name="tinhtrang" id="tinhtrang">
      <option value="1">Kích hoạt</option>
      <option value="0">Ẩn</option>
    </select>

    <input class="sua" type="submit" value="Sửa" name="suasanpham">
   <?php
    }
    ?>
 </form>