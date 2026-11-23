<?php
require_once "koneksi.php";

$sql = "select * from anggota";
$hasil = mysqli_query($koneksi, $sql);
$jumlah = mysqli_num_rows($hasil);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Anggota Perpustakaan</title>
</head>
<body>

    <h2>Data Anggota Perpustakaan</h2>

    <p>Jumlah Anggota : <?php echo $jumlah; ?></p>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>No</th><th>Nomor Anggota</th><th>Nama Lengkap</th><th>Email</th><th>Nomor HP</th><th>Jenis Anggota</th><th>Alamat</th><th>Aksi</th>
        </tr>
        <?php $no = 1; while ($baris = mysqli_fetch_assoc($hasil)) { ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo htmlspecialchars($baris["no_anggota"]); ?></td>
            <td><?php echo htmlspecialchars($baris["nama_lengkap"]); ?></td>
            <td><?php echo htmlspecialchars($baris["email"]); ?></td>
            <td><?php echo htmlspecialchars($baris["no_hp"]); ?></td>
            <td><?php echo htmlspecialchars($baris["jenis_anggota"]); ?></td>
            <td><?php echo htmlspecialchars($baris["alamat"]); ?></td>
            <td>
                <a href="detail.php?id=<?php echo (int) $baris["id"]; ?>">Detail</a>
                <form class="inline" action="hapus.php" method="post" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                    <input type="hidden" name="id" value="<?php echo (int) $baris["id"]; ?>">
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>