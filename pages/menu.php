<?php
    $sql_danhmuc = "SELECT * FROM tbl_danhmuc ";
    $query_danhmuc= mysqli_query($mysqli,$sql_danhmuc); 
   

    
?>




<div class="menu">
            <ul class="list_menu">
                <li><a href="index.php">Home</a></li>
                <?php
                 while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                ?>
                <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['Id']?>"><?php echo $row_danhmuc['tendanhmuc']?></a></li>
                <?php
                 }
                ?>
               
               
                
            </ul>
        </div>