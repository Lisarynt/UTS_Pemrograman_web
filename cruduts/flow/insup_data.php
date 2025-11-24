<?php
require_once "../koneksi/connection.php";

$lokasi = $_POST['lks'];
$rating = $_POST['rtg'];
$deskripsi = $_POST['dsc'];
$harga = $_POST['hrg'];
$photo_name = $_FILES['filephoto']['name'];
$photo_tmp = $_FILES['filephoto']['tmp_name'];

if (!empty($_POST["id"])){
    //update data
    move_uploaded_file($photo_tmp, '../photo/'.$photo_name);

    $sql = "UPDATE `tabel_detail` 
    SET `lokasi` = ?, 
    `rating` = ?, 
    `deskripsi` = ?, 
    `harga` = ?, 
    `photo` = ?
    WHERE `tabel_detail`.`id` = ?;";

    $connect = $database_connection->prepare($sql);
    $connect->execute([
        $lokasi,
        $rating,
        $deskripsi,
        $harga,
        'photo/' .$photo_name,
        $_POST["id"]
    ]);
    
    echo "update data berhasil!";

}else{
    //insert data
    move_uploaded_file($photo_tmp, '../photo/'.$photo_name);

    $sql = "INSERT INTO `tabel_detail` 
    (`lokasi`, `rating`, `deskripsi`, `harga`, `photo`) 
    VALUES (?, ?, ?, ?, ?);";

    $connect = $database_connection->prepare($sql);
    $connect->execute([
        $lokasi,
        $rating,
        $deskripsi,
        $harga,
        'photo/' .$photo_name
    ]);
    echo "insert data berhasil!";
    
}
?>