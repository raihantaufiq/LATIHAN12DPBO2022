<?php

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/FormPasien.php");

$tp = new FormPasien();

if (isset($_POST['submit'])) {
    // tambah data
    $tp->tambahPasien($_POST);
    header('location: index.php');

}elseif (isset($_GET['id_hapus'])) {
    // hapus data
    $tp->hapusPasien($_GET['id_hapus']);
    header('location: index.php');

}elseif (isset($_GET['id_ubah']) && isset($_POST['update'])) {
    // ubah data
    $tp->ubahPasien($_GET['id_ubah'], $_POST);
    header('location: index.php');

}elseif (isset($_GET['id_ubah'])) {
    // tampilan form ketika akan mengubah data (form ada isinya)
    $tp->tampil_edit($_GET['id_ubah']);

}else {
    // tampilan form ketika akan menambah data (form kosong)
    $tp->tampil();
}


?>