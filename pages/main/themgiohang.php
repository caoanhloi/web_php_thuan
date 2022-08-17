<?php
session_start();
include('../../admincp/config/config.php');
// them so luong
// if(isset($_GET['cong'])){
//     $id = $_GET['cong'];
//     foreach ($_SESSION['cart'] as $cart_item) {
//         if ($cart_item['id']!=$id) {
//             $product[]= array('tensanpham'=>$cart_item['tensanpham'],
//             'soluong'=>$cart_item['soluong']+1,
//             'giasp'=>$cart_item['giasp'],
//             'hinhanh'=>$cart_item['hinhanh'],
//             'masp'=>$cart_item['masp'],
//             'id'=>$cart_item['id']); 
//             $_SESSION['cart'] = $product;
//         }else{
//             $product[]= array('tensanpham'=>$cart_item['tensanpham'],
//             'soluong'=>$cart_item['soluong'],
//             'giasp'=>$cart_item['giasp'],
//             'hinhanh'=>$cart_item['hinhanh'],
//             'masp'=>$cart_item['masp'],
//             'id'=>$cart_item['id']);
//             $_SESSION['cart'] = $product;
//         }
//     }   
//     header('location:../../index.php?quanly=giohang');
// }
//tru so luong
//xoa san pham
if (isset($_SESSION['cart'])&& isset($_GET['xoa'])){
  $id=$_GET['xoa'];
  foreach ($_SESSION['cart'] as $cart_item) {
    if ($cart_item['id']!=$id) {
        $product[]= array('tensanpham'=>$cart_item['tensanpham'],
        'soluong'=>$cart_item['soluong']+1,
        'giasp'=>$cart_item['giasp'],
        'hinhanh'=>$cart_item['hinhanh'],
        'masp'=>$cart_item['masp'],
        'id'=>$cart_item['id']);
    }
    $_SESSION['cart'] = $product;
    header('location:../../index.php?quanly=giohang');
  }
}



//xoa tat ca
if (isset($_GET['xoatatca'])&&$_GET['xoatatca']==1) {
    unset($_SESSION['cart']);
  header('location:../../index.php?quanly=giohang');

}
// them san pham vao gio hang
if(isset($_POST['mua'])){
  //  session_destroy();
    $id = $_GET['idsanpham'];
    $soluong= 1;
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '".$id."'";
    $query = mysqli_query($mysqli,$sql);
    $row = mysqli_fetch_array($query);
    if($row){
        $new_product = array(array('tensanpham'=>$row['tensanpham'],
        'soluong'=>$soluong,
        'giasp'=>$row['gia'],
        'hinhanh'=>$row['hinhanh'],
        'masp'=>$row['masanpham'],
        'id'=>$id));
        //kiem tra session gio hang ton tai
        if(isset($_SESSION['cart'])){
            $found = false;
            foreach($_SESSION['cart'] as $cart_item){
                //neu dl trung
                if ($cart_item['id']==$id) {
                 $product[]= array('tensanpham'=>$cart_item['tensanpham'],
                    'soluong'=>$cart_item['soluong']+1,
                    'giasp'=>$cart_item['giasp'],
                    'hinhanh'=>$cart_item['hinhanh'],
                    'masp'=>$cart_item['masp'],
                    'id'=>$cart_item['id']);
                    $found = true;
                }else{
                    $product[]= array('tensanpham'=>$cart_item['tensanpham'],
                    'soluong'=>$soluong,
                    'giasp'=>$cart_item['giasp'],
                    'hinhanh'=>$cart_item['hinhanh'],
                    'masp'=>$cart_item['masp'],
                    'id'=>$cart_item['id']);
                }
            }
            if($found == false){
                $_SESSION['cart']=array_merge($product,$new_product);
            }else{
                $_SESSION['cart'] = $product;
            }
        }else{
            $_SESSION['cart'] = $new_product;
        }
    }
    
    // print_r( $_SESSION['cart']);
    header('location:../../index.php?quanly=giohang');
}

?>