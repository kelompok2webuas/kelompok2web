<?php
$koneksi = new mysqli("localhost", "root", "", "pendaftaran_member");

if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}
?>
<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    $sql = "INSERT INTO anggotakeluar(nama, tanggal_lahir, jenis_kelamin) VALUES ('$nama', '$tanggal_lahir', '$jenis_kelamin')";

    if ($koneksi->query($sql) === TRUE) {
        echo "Data berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ubah'])) {
    $id_anggota = $_POST['id_anggota'];
    $nama = $_POST['nama'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    if (!empty($nama) && !empty($tanggal_lahir) && !empty($jenis_kelamin)) {
        $sql = "UPDATE anggotakeluar SET nama='$nama', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin' WHERE id_anggota='$id_anggota'";

        if ($koneksi->query($sql) === TRUE) {
            echo "Data berhasil diubah.";
        } else {
            echo "Error: " . $sql . "<br>" . $koneksi->error;
        }
    } else {
        echo "nama, Tanggal Lahir, dan Jenis Kelamin harus diisi.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hapus'])) {
    $id_anggota = $_POST['id_anggota'];

    $sql = "DELETE FROM anggotakeluar WHERE id_anggota='$id_anggota'";

    if ($koneksi->query($sql) === TRUE) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

$edit_id = '';
$edit_nama = '';
$edit_tanggal_lahir = '';
$edit_jenis_kelamin = '';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];
    $edit_sql = "SELECT * FROM anggotakeluar WHERE id_anggota='$edit_id'";
    $edit_result = $koneksi->query($edit_sql);
    if ($edit_result->num_rows > 0) {
        $edit_row = $edit_result->fetch_assoc();
        $edit_nama = $edit_row['nama'];
        $edit_tanggal_lahir = $edit_row['tanggal_lahir'];
        $edit_jenis_kelamin = $edit_row['jenis_kelamin'];
    }
}

$sql = "SELECT * FROM anggotakeluar";
$result = $koneksi->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota Keluar</title>
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
        input[type=text], input[type=date], select {
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
        <h2>Data Anggota Keluar</h2>
        <a href="home.php" class="back-link">Home</a>
    </div>

    <form method="post">
        <label for="nama">nama:</label><br>
        <input type="text" id="nama" name="nama" value="<?php echo $edit_nama; ?>" required><br>
        <label for="tanggal_lahir">Tanggal Lahir:</label><br>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $edit_tanggal_lahir; ?>" required><br>
        <label for="jenis_kelamin">Jenis Kelamin:</label><br>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="Laki-laki" <?php if ($edit_jenis_kelamin == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
            <option value="Perempuan" <?php if ($edit_jenis_kelamin == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
        </select><br><br>
        <?php if ($edit_id): ?>
            <input type="hidden" name="id_anggota" value="<?php echo $edit_id; ?>">
            <input type="submit" name="ubah" value="Ubah Data">
        <?php else: ?>
            <input type="submit" name="tambah" value="Tambah Data">
        <?php endif; ?>
    </form>
    <br>

    <table>
        <tr>
            <th>ID Anggota</th>
            <th>nama</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Aksi</th>
        </tr>
        <?php
        if ($result !== false && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["id_anggota"]."</td>";
                echo "<td>".$row["nama"]."</td>";
                echo "<td>".$row["tanggal_lahir"]."</td>";
                echo "<td>".$row["jenis_kelamin"]."</td>";
                echo '<td>
                        <form method="get" style="display:inline;">
                            <input type="hidden" name="edit" value="'.$row["id_anggota"].'">
                            <input type="submit" value="Edit">
                        </form>
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="id_anggota" value="'.$row["id_anggota"].'">
                            <input type="submit" name="hapus" value="Hapus">
                        </form>
                      </td>';
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Tidak ada data.</td></tr>";
        }
        ?>
    </table