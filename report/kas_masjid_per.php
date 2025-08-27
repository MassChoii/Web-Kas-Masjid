<?php
    include "../inc/koneksi.php";
    //FUNGSI RUPIAH
    include "../inc/rupiah.php";

    $dt1 = $_POST["tgl_1"] ?? '';
    $dt2 = $_POST["tgl_2"] ?? '';
?>

<?php
  $masuk = 0;
  $keluar = 0;
  $saldo = 0;

  if (isset($_POST["btnCetak"])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if (empty($dt1) || empty($dt2)) {
            echo "<script>alert('Harap mengisi kedua tanggal!'); window.location.href='';</script>";
        } else {
            // Query untuk mendapatkan total pemasukan
            $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_masjid where jenis='Masuk' and tgl_km BETWEEN '$dt1' AND '$dt2'");
            while ($data = $sql->fetch_assoc()) {
                $masuk = $data['tot_masuk'];
            }

            // Query untuk mendapatkan total pengeluaran
            $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_masjid where jenis='Keluar' and tgl_km BETWEEN '$dt1' AND '$dt2'");
            while ($data = $sql->fetch_assoc()) {
                $keluar = $data['tot_keluar'];
            }

            // Menghitung saldo kas masjid
            $saldo = $masuk - $keluar;

            // Query untuk menampilkan semua data kas masjid pada periode yang dipilih
            $sql_tampil = "SELECT * FROM kas_masjid WHERE tgl_km BETWEEN '$dt1' AND '$dt2' ORDER BY tgl_km ASC";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Laporan Kas Masjid</title>
</head>
<body>
<style>
      /* Style for header */
      .header {
         display: flex;
         align-items: center;
         justify-content: center;
         border-bottom: 2px solid black;
         padding: 10px 20px;
         text-align: center;
      }

      .header .info {
         font-size: 14px;
      }

      .header .info h1 {
         margin: 0;
         font-size: 20px;
         font-weight: bold;
      }

      .header .info p {
         margin: 0;
      }
   </style>
<center>
<div class="header">
      <div class="info">
         <h1>LAPORAN KAS</h1>
         <h1>MASJID NUR-HIDAYAH</h1>
         <p>Dusun III Desa Tuntungan I Kecematan Pancur Batu Kabupaten Deli Serdang</p>
         <br>
         <p>Periode : <?php echo date("d-M-Y", strtotime($dt1)) ?> s/d <?php echo date("d-M-Y", strtotime($dt2)) ?></p>
      </div>
   </div>
   <br>
   <table border="1" cellspacing="0">
    <thead>
      <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Uraian</th>
            <th>Pemasukan</th>
            <th>Pengeluaran</th>
      </tr>
    </thead>
    <tbody>
        <?php
        if (isset($sql_tampil)) {
            $query_tampil = mysqli_query($koneksi, $sql_tampil);
            $no = 1;
            while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
        ?>
         <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo date("d/M/Y", strtotime($data['tgl_km'])); ?></td> 
            <td><?php echo $data['uraian_km']; ?></td>
            <td align="right"><?php echo rupiah($data['masuk']); ?></td>  
            <td align="right"><?php echo rupiah($data['keluar']); ?></td>   
        </tr>
        <?php
            $no++;
            }
        }
        ?>
    </tbody>
    <tr>
        <td colspan="3">Total Pemasukan</td>
        <td colspan="2"><?php echo rupiah($masuk); ?></td>
    </tr>
    <tr>
        <td colspan="4">Total Pengeluaran</td>
        <td><?php echo rupiah($keluar); ?></td>
    </tr>
    <tr>
        <td colspan="3">Saldo Kas Masjid</td>
        <td colspan="2"><?php echo rupiah($saldo); ?></td>
    </tr>
  </table>
</center>

<script>
    window.print();
</script>
</body>
</html>
