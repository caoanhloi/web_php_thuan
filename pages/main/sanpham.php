<?php
 $sql_chitietsp= "SELECT * FROM tbl_danhmuc,tbl_sanpham WHERE tbl_danhmuc.Id=tbl_sanpham.danhmuc_id AND tbl_sanpham.id_sanpham= '$_GET[id]' ";
 $query_chitietsp = mysqli_query($mysqli,$sql_chitietsp);
?>


<p>Chi tiet san pham</p>

                <?php   
                while($row_chitietsp = mysqli_fetch_array($query_chitietsp)){
                ?>
                <form action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitietsp['id_sanpham'] ?>" method="POST">

                    <div class="wapper_chitietsanpham">
                      <div class="hinhanhsp">
                          <img src="admincp/modules/quanlysanpham/uploads/<?php echo  $row_chitietsp['hinhanh']?>" alt="">
                      </div>

                      <div class="ttsp">
                          <p>Tên sản phẩm: <?php echo  $row_chitietsp['tensanpham']?></p>
                          <p>danh muc sp:<?php echo $row_chitietsp['tendanhmuc']?></p>
                          <p>Giá:<?php echo $row_chitietsp['gia']?> VNĐ</p>
                          <p>so luong:<?php echo $row_chitietsp['soluong']?></p>
                          <p>thong tin sp:<?php echo $row_chitietsp['noidung']?></p>
                        <input class="addcart" type="submit" value="mua" name="mua">

                      </div>
                    </div>
                  </form>


                <?php    
                }
                ?>

