<?php
   include('../../config/config.php');
    $tenloaisp = $_POST['tendanhmuc'];
    $thutu = $_POST['thutu'];

    if(isset($_POST['themdanhmuc'])){
        $sql_them = "INSERT INTO tbl_danhmuc(tendanhmuc,thutu) VALUES('".$tenloaisp."','".$thutu."')";
        mysqli_query($mysqli,$sql_them);
        header('location:../../index.php?action=quanlydanhmucsanpham&query=lietke');
    }elseif(isset($_POST['suadanhmuc'])){
        $sql_sua = "UPDATE tbl_danhmuc SET  tendanhmuc = '".$tenloaisp."',thutu='".$thutu."' WHERE Id= '$_GET[iddanhmuc]'" ;
        mysqli_query($mysqli,$sql_sua);
        header('location:../../index.php?action=quanlydanhmucsanpham&query=lietke');
    }else{
        $iddanhmuc=$_GET['iddanhmuc'];
        $sql_xoa = "DELETE FROM tbl_danhmuc WHERE Id = '".$iddanhmuc."'";
        mysqli_query($mysqli, $sql_xoa);
        header('location:../../index.php?action=quanlydanhmucsanpham&query=lietke');
    }

    // list danh sach danh mục


?>