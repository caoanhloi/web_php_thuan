<h3>Gio hang</h3>

<?php
session_start();
    if (isset($_SESSION['cart'])) {
         
    }
?>



<table id="customers">
  <tr class="tieude">
    <th>Id</th>
    <th>Mã sản phẩm</th>
    <th>Tên sản phẩm</th>
    <th>Hình ảnh</th>
    <th>Giá</th>
    <th>Số lượng</th>
    <th>Thành tiền</th>
    <th>Action</th>
  </tr>
  <?php
     if (isset($_SESSION['cart'])) {
        $i=0;
        $tongtien=0;
        foreach ($_SESSION['cart'] as $cart_item) {
            $thanhtien = $cart_item['soluong'] * $cart_item['giasp'];
            $tongtien =$tongtien + $thanhtien;
            $i++;
      
   
    ?>
    <tr>
        <td><?php echo $i?></td>
        <td><?php echo $cart_item['masp']?></td>
        <td><?php echo $cart_item['tensanpham']?></td>
        <td><img src="admincp/modules/quanlysanpham/uploads/<?php echo $cart_item['hinhanh']?>"></td>
        <td><?php echo $cart_item['giasp']?></td>

        <td>
            <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>">cong</a>
            <?php echo $cart_item['soluong']?>
            <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>">tru</a>

        </td>

        <td><?php echo $thanhtien?></td>
        <td><a style="color:black;background-color: red" href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>">Delete</a></td>
    </tr>
        <?php
        }
        ?>
        <tr>
            <td><p>Tong tien: </p><?php echo $tongtien?></td>
            <td><a  style="color:black;background-color: red" href="pages/main/themgiohang.php?xoatatca=1">Xóa tất cả</a></td>
        </tr>
        <?php
     }else{
        ?>
        <tr>
            <td  style="text-align: center;" colspan="8"><h3>Hien tai gio hang trong</h3></td>
            
        </tr>
    <?php
     }
     ?>

</table> 

