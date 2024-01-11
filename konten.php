<?php 

if (empty($_GET['p'])){
    $title="Sistem Informasi Biaya Pendidikan";
    $konten="konten/home.php";
}

else if($_GET['p']=='user'){
    $title="Data user Pendidikan";
    $konten="konten/user.php";
}

//menu untuk produk
else if($_GET['p']=='produk'){
    $title="Produk";
    $konten="konten/produk.php";
}
else if($_GET['p']=='pelanggan'){
    $title="Pelanggan";
    $konten="konten/pelanggan.php";
}

else if($_GET['p']=='tambah'){
    $title="Tambah Penjualan Baru";
    $konten="konten/tambah.php";
}

else if($_GET['p']=='laporan'){
    $title="Laporan Sistem";
    $konten="konten/laporan.php";
}
else if($_GET['p']=='backup'){
    $title="backup Sistem";
    $konten="konten/backup.php";
}
else if($_GET['p']=='restore'){
    $title="Restore Sistem";
    $konten="konten/restore.php";
}


// (shift alt bawah buat copy cepat)


else {
    $title="Halaman Tidak Ditemukan";
    $konten="konten/404.php";
}
