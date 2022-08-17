<?php
    $sql_product= "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.danhmuc_id = '$_GET[id]'";
    $query_product = mysqli_query($mysqli,$sql_product);
    //lay ten danh muc
    $sql_category= "SELECT * FROM tbl_danhmuc WHERE tbl_danhmuc.Id = '$_GET[id]'";
    $query_category = mysqli_query($mysqli,$sql_category);
    $row_title = mysqli_fetch_array($query_category );
?>

<h3>Danh muc san pham: <?php echo $row_title['tendanhmuc']?></h3>
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
                