<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <h2>List Kontak</h2>
    <table border="1">
        <tr>
            <th>NO</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Kota</th>
            <th>Pesan</th>
        </tr>
        <?php
        include 'koneksi.php';
        $kontak = mysqli_query($koneksi, "SELECT * FROM kontak");
        $no = 1;
        foreach ($kontak as $row) {
            $jenis_kelamin = $row['jkel'] == "P" ? 'Perempuan' : 'Laki-laki';
            echo "<tr>
                <td>$no</td>
                <td>" . $row['nama'] . "</td>
                <td>" . $jenis_kelamin . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['alamat'] . "</td>
                <td>" . $row['kota'] . "</td>
                <td>" . $row['pesan'] . "</td>
            </tr>";
            $no++;
        }
        ?>
    </table>
</body>
</html>