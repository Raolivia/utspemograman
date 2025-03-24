<?php
session_start();

// Memulai session untuk data produk, pelanggan, dan transaksi jika belum ada
if (!isset($_SESSION['produk'])) {
    $_SESSION['produk'] = [];
}

if (!isset($_SESSION['pelanggan'])) {
    $_SESSION['pelanggan'] = [];
}

if (!isset($_SESSION['transaksi'])) {
    $_SESSION['transaksi'] = [];
}

// Menambahkan produk
if (isset($_POST['tambah_produk'])) {
    $produk = $_POST['produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $_SESSION['produk'][] = [
        'produk' => $produk,
        'harga' => $harga,
        'stok' => $stok
    ];

    echo "Produk berhasil ditambahkan!";
    echo "<br><a href='index.html'>Kembali ke Menu</a>";
}

// Menambahkan pelanggan
if (isset($_POST['tambah_pelanggan'])) {
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat_pelanggan = $_POST['alamat_pelanggan'];

    $_SESSION['pelanggan'][] = [
        'nama' => $nama_pelanggan,
        'alamat' => $alamat_pelanggan
    ];

    echo "Pelanggan berhasil ditambahkan!";
    echo "<br><a href='index.html'>Kembali ke Menu</a>";
}

// Menambahkan transaksi
if (isset($_POST['tambah_transaksi'])) {
    $produk_dijual = $_POST['produk_dijual'];
    $jumlah_dijual = $_POST['jumlah_dijual'];
    $total_harga = $_POST['total_harga'];

    $_SESSION['transaksi'][] = [
        'produk' => $produk_dijual,
        'jumlah' => $jumlah_dijual,
        'total_harga' => $total_harga
    ];

    echo "Transaksi berhasil ditambahkan!";
    echo "<br><a href='index.html'>Kembali ke Menu</a>";
}

// Menampilkan laporan berdasarkan pilihan
if (isset($_GET['laporan'])) {
    $laporan = $_GET['laporan'];

    // Laporan Stok Produk
    if ($laporan == 'stok') {
        echo "<h2>Laporan Stok Produk</h2>";
        echo "<table border='1'>
                <tr><th>Nama Produk</th><th>Harga</th><th>Stok</th></tr>";
        foreach ($_SESSION['produk'] as $produk) {
            echo "<tr><td>{$produk['produk']}</td><td>{$produk['harga']}</td><td>{$produk['stok']}</td></tr>";
        }
        echo "</table>";
    }

    // Laporan Pelanggan
    if ($laporan == 'pelanggan') {
        echo "<h2>Laporan Pelanggan</h2>";
        echo "<table border='1'>
                <tr><th>Nama</th><th>Alamat</th></tr>";
        foreach ($_SESSION['pelanggan'] as $pelanggan) {
            echo "<tr><td>{$pelanggan['nama']}</td><td>{$pelanggan['alamat']}</td></tr>";
        }
        echo "</table>";
    }

    // Laporan Transaksi
    if ($laporan == 'transaksi') {
        echo "<h2>Laporan Transaksi Penjualan</h2>";
        echo "<table border='1'>
                <tr><th>Produk</th><th>Jumlah</th><th>Total Harga</th></tr>";
        foreach ($_SESSION['transaksi'] as $transaksi) {
            echo "<tr><td>{$transaksi['produk']}</td><td>{$transaksi['jumlah']}</td><td>{$transaksi['total_harga']}</td></tr>";
        }
        echo "</table>";
    }

    // Rekapitulasi Penjualan Per Hari, Bulan, Tahun (simple contoh)
    if ($laporan == 'rekapitulasi_hari') {
        echo "<h2>Rekapitulasi Penjualan Per Hari</h2>";
        echo "Fitur ini dapat menampilkan penjualan berdasarkan hari, tetapi untuk saat ini akan menampilkan semua transaksi.";
    }
    if ($laporan == 'rekapitulasi_bulan') {
        echo "<h2>Rekapitulasi Penjualan Per Bulan</h2>";
        echo "Fitur ini dapat menampilkan penjualan berdasarkan bulan.";
    }
    if ($laporan == 'rekapitulasi_tahun') {
        echo "<h2>Rekapitulasi Penjualan Per Tahun</h2>";
        echo "Fitur ini dapat menampilkan penjualan berdasarkan tahun.";
    }
}
?>
