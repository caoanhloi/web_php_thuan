<?php
    $sql_lietke_danhmucsp = "SELECT * FROM tbl_danhmuc ORDER BY thutu DESC ";
    $query_lietke_danhmucsp = mysqli_query($mysqli,$sql_lietke_danhmucsp); 
?>


<h2>Thêm danh mục sản phẩm</h2>
<a style="color:black;background-color: green" href="?action=quanlydanhmucsanpham&query=them">Create</a>
<h1 style=" tex">List danh mục sản phẩm </h1>
<table id="customers">
  <tr class="tieude">
    <th>Thứ tự</th>
    <th>Tên danh mục</th>
    <th>Action</th>
  </tr>
  <?php
    	$i= 0;
        while ($row = mysqli_fetch_array($query_lietke_danhmucsp)) {
           $i++;
          
    ?>
  
  <tr>
    <td><?php echo $i?></td> 
    <td><?php echo htmlspecialchars($row['tendanhmuc']) ?></td>
    <td>
        
        <a style="color:black;background-color: yellow" href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['Id'] ?>">Edit</a>
        <a style="color:black;background-color: red" href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['Id'] ?>">Delete</a>
  </tr>
     <?php
        }
    ?> 
</table>

