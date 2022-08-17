<?php
    $sql_lietke_sanpham= "SELECT * FROM tbl_sanpham LEFT JOIN tbl_danhmuc ON tbl_sanpham.danhmuc_id=tbl_danhmuc.Id;";
    $query_lietke_sanpham = mysqli_query($mysqli,$sql_lietke_sanpham); 
?>
<h3>Thêm sản phẩm</h3>
<a style="color:black;background-color: green" href="?action=quanlysanpham&query=them">Create</a>
<h1 style=" tex">List Sản phẩm </h1>
<table id="customers">
  <tr class="tieude">
    <th>Thứ tự</th>
    <th>Mã sản phẩm</th>
    <th>Tên sản phẩm</th>
    <th>Giá</th>
    <th>Số lượng</th>
    <th>Danh mục sản phẩm</th>
    <th>Hình ảnh</th>
    <th>Tóm tắt</th>
    <th>Nội dung</th>
    <th>Tình trạng</th>
    <th>Action</th>
  </tr>
  <?php
    	$i= 0;
        while ($row = mysqli_fetch_array($query_lietke_sanpham)) {
           $i++;
          
    ?>
  <tr>
    <td><?php echo $i?></td> 
    <td><?php echo $row['masanpham'] ?></td>
    <td><?php echo $row['tensanpham']?></td>
    <td><?php echo $row['gia'] ?></td>
    <td><?php echo $row['noidung'] ?></td>

    <td><?php echo $row['tendanhmuc'] ?></td>

    <td class="anhsanphamlietke"><img  src="modules/quanlysanpham/uploads/<?php echo $row['hinhanh'] ?>" >
  </td>
    <td><?php echo $row['tomtat'] ?></td>
    <td><?php echo $row['noidung'] ?></td>
    <td><?php if ($row['tinhtrang']== 1) {
      echo 'Kích hoạt';
    } else{
      echo 'Ẩn';
    }
  
    ?>
  </td>




    <td>
        <a style="color:black;background-color: yellow" href="?action=quanlysanpham&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>">Edit</a>
        <a style="color:black;background-color: red" href="modules/quanlysanpham/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>">Delete</a>
  </tr>
     <?php
        }
    ?> 
</table>

