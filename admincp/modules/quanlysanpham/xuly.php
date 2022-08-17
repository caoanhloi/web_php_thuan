<?php
include('../../config/config.php');
    $masanpham = $_POST['masanpham'];
    $tensanpham = $_POST['tensanpham'];
    $gia = $_POST['gia'];
    $soluong = $_POST['soluong'];
  
    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noidung'];
    $tinhtrang = $_POST['tinhtrang'];
    $danhmuc = $_POST['danhmuc']; 

    //xử lý hình ảnh:
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);

    if(isset($_POST['themsanpham'])){
        $sql_them = "INSERT INTO tbl_sanpham(masanpham,tensanpham,gia,soluong,hinhanh,tomtat,noidung,tinhtrang,danhmuc_id) 
        VALUES('".$masanpham."','".$tensanpham."','".$gia."','".$soluong."','".$hinhanh."','".$tomtat."','".$noidung."','".$tinhtrang."','".$danhmuc."')";

        mysqli_query($mysqli,$sql_them);
        header('location:../../index.php?action=quanlysanpham&query=lietke');

    }//sua
    elseif(isset($_POST['suasanpham'])){
       if ($hinhanh!="") {
            move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
            $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[idsanpham]'";
            $query = mysqli_query($mysqli,$sql);
            while($row = mysqli_fetch_array($query)){
                unlink('uploads/'.$row['hinhanh']);
            }
            $sql_sua = "UPDATE tbl_sanpham 
            SET     tensanpham = '".$tensanpham."',masanpham = '".$masanpham."',gia = '".$gia."',soluong = '".$soluong."',hinhanh = '".$hinhanh."',tomtat = '".$tomtat."',noidung = '".$noidung."',
            danhmuc_id = '".$danhmuc."',
            tinhtrang='".$tinhtrang."'
            WHERE id_sanpham= '$_GET[idsanpham]'" ;
        }else{
            $sql_sua = "UPDATE tbl_sanpham 
            SET     masanpham = '".$masanpham."',
                    tensanpham = '".$tensanpham."',
                    gia = '".$gia."',
                    soluong = '".$soluong."',
                    tomtat = '".$tomtat."',
                    noidung = '".$noidung."',
                    danhmuc_id = '".$danhmuc."',
                    tinhtrang='".$tinhtrang."'
            WHERE id_sanpham= '$_GET[idsanpham]'" ;
        }
            mysqli_query($mysqli,$sql_sua);
            header('location:../../index.php?action=quanlysanpham&query=lietke');
    }
    //xoa
    else{
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[idsanpham]'";
            $query = mysqli_query($mysqli,$sql);
            while($row = mysqli_fetch_array($query)){
                unlink('uploads/'.$row['hinhanh']);
            }
        $sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham = '".$_GET['idsanpham']."'";
        mysqli_query($mysqli, $sql_xoa);
        header('location:../../index.php?action=quanlysanpham&query=lietke');  
    }

    // list danh sach danh mục


?>