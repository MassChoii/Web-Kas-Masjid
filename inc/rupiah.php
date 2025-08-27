<?php 
// Membuat format rupiah tanpa desimal dengan PHP 
function rupiah($angka){
    // Cek apakah input valid dan angka
    $angka = is_numeric($angka) ? $angka : 0;
    
    // Format angka ke format rupiah tanpa desimal
    $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}
