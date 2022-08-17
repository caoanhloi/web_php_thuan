<?php
    $sql_product= "SELECT * FROM tbl_danhmuc,tbl_sanpham WHERE tbl_danhmuc.Id=tbl_sanpham.danhmuc_id ORDER BY tbl_sanpham.id_sanpham DESC ";
    $query_product = mysqli_query($mysqli,$sql_product);
    
?>

<h3>San pham moi nhat</h3>
<ul class="product">
                <?php   
                while($row = mysqli_fetch_array($query_product)){
                ?>
                    
                        <li>
                        <form action="pages/main/themgiohang.php?idsanpham=<?php echo $row['id_sanpham'] ?>" method="POST">
                            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham']?>">
                                    <img src="admincp/modules/quanlysanpham/uploads/<?php echo  $row['hinhanh']?>" alt="">
                                    <p>Tên sản phẩm: <?php echo  $row ['tensanpham']?></p>
                                    <p>Giá:<?php echo $row['gia']?> VNĐ</p>
                                </a>
                                <input class="mua" type="submit" value="mua" name="mua">
                            </form>
                        </li>
                    
                <?php   
                }
                ?>
                </ul>