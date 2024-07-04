<?php
include 'koneksi.php';


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tambah'])) {
    $nama_asuransi = $_POST['nama_asuransi'];
    $jumlah_anggota = $_POST['jumlah_anggota'];

    $sql = "INSERT INTO asuransi (nama_asuransi, jumlah_anggota) VALUES ('$nama_asuransi', '$jumlah_anggota')";

    if ($koneksi->query($sql) === TRUE) {
        echo "Data berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ubah'])) {
    $id_kategori = $_POST['id_kategori'];
    $nama_asuransi = $_POST['nama_asuransi'];
    $jumlah_anggota = $_POST['jumlah_anggota'];

    if (!empty($nama_asuransi) && !empty($jumlah_anggota)) {
        $sql = "UPDATE asuransi SET nama_asuransi='$nama_asuransi', jumlah_anggota='$jumlah_anggota' WHERE id_kategori='$id_kategori'";

        if ($koneksi->query($sql) === TRUE) {
            echo "Data berhasil diubah.";
        } else {
            echo "Error: " . $sql . "<br>" . $koneksi->error;
        }
    } else {
        echo "Nama Asuransi dan Jumlah Anggota harus diisi.";
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hapus'])) {
    $id_kategori = $_POST['id_kategori'];

    $sql = "DELETE FROM asuransi WHERE id_kategori='$id_kategori'";

    if ($koneksi->query($sql) === TRUE) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}


$edit_id = '';
$edit_nama_asuransi = '';
$edit_jumlah_anggota = '';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];
    $edit_sql = "SELECT * FROM asuransi WHERE id_kategori='$edit_id'";
    $edit_result = $koneksi->query($edit_sql);
    if ($edit_result->num_rows > 0) {
        $edit_row = $edit_result->fetch_assoc();
        $edit_nama_asuransi = $edit_row['nama_asuransi'];
        $edit_jumlah_anggota = $edit_row['jumlah_anggota'];
    }
}


$sql = "SELECT * FROM asuransi";
$result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Asuransi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .back-link {
            font-size: 16px;
            text-decoration: none;
            color: #4CAF50;
        }
        .back-link:hover {
            text-decoration: underline;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type=text], input[type=number] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        td {
            background-color: #fff;
        }
        td form {
            display: inline;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Data Asuransi</h2>
        <a href="home.php" class="back-link">Home</a>
    </div>

   
    <form method="post">
        <label for="nama_asuransi">Nama Asuransi:</label><br>
        <input type="text" id="nama_asuransi" name="nama_asuransi" value="<?php echo $edit_nama_asuransi; ?>" required><br>
        <label for="jumlah_anggota">Jumlah Anggota:</label><br>
        <input type="number" id="jumlah_anggota" name="jumlah_anggota" value="<?php echo $edit_jumlah_anggota; ?>" required><br><br>
        <?php if ($edit_id): ?>
            <input type="hidden" name="id_kategori" value="<?php echo $edit_id; ?>">
            <input type="submit" name="ubah" value="Ubah Data">
        <?php else: ?>
            <input type="submit" name="tambah" value="Tambah Data">
        <?php endif; ?>
    </form>
    <br>

  
    <table>
        <tr>
            <th>ID Kategori</th>
            <th>Nama Asuransi</th>
            <th>Jumlah Anggota</th>
            <th>Aksi</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["id_kategori"]."</td>";
                echo "<td>".$row["nama_asuransi"]."</td>";
                echo "<td>".$row["jumlah_anggota"]."</td>";
                echo '<td>
                        <form method="get" style="display:inline;">
                            <input type="hidden" name="edit" value="'.$row["id_kategori"].'">
                            <input type="submit" value="Edit">
                        </form>
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="id_kategori" value="'.$row["id_kategori"].'">
                            <input type="submit" name="hapus" value="Hapus">
                        </form>
                      </td>';
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Tidak ada data.</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php

$koneksi->close();
?>