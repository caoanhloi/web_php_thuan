<h3>Thêm sản Phẩm</h3>
<form class= "CU"action="modules/quanlysanpham/xuly.php" method="POST" enctype="multipart/form-data">
    <label for="fname">Mã sản phẩm:</label>
    <input type="text" name="masanpham">
    <label for="fname">Tên sản phẩm:</label>
    <input type="text" name="tensanpham">
    <label for="fname">Giá:</label>
    <input type="text" name="gia">
    <label for="fname">Số lượng:</label>
    <input type="text" name="soluong">
    <label for="fname">Hình ảnh:</label>
    <input type="file" name="hinhanh">
<br>
    <label for="fname">Tóm tắt:</label>
    <br>
    <textarea name="tomtat" id="" cols="100%" rows="10"></textarea>
    <br>
    <br>
    <br>
    <label for="fname">Nội dung:</label>
    <br>
    <textarea name="noidung" id="" cols="100%" rows="10"></textarea>
    <br>
    <br>
    <label for="fname">Danh mục sản phẩm</label>
    <br>
    <select name="danhmuc" >
       <?php
             $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY Id DESC ";
             $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc); 
             while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
       ?>
       <option value="<?php echo $row_danhmuc['Id']?>"><?php echo $row_danhmuc['tendanhmuc']?></option>
        <?php
             }
             ?>
    </select>
<br>
    <label for="fname">Tình trạng</label>
    <br>
    <select name="tinhtrang" id="tinhtrang">
      <option value="1">Kích hoạt</option>
      <option value="0">Ẩn</option>
    </select>
    <input class="sua" type="submit" value="Thêm" name="themsanpham">
  </form>