<?php include 'config/db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM izin WHERE id=$id");
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
    <h2 class="mb-4">Edit Data</h2>
    <form method="post">
        <div class="mb-3">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" value="<?= $data['nama']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Kelas:</label>
            <select name="kelas" class="form-control" required>
                <option value="">-- Pilih Kelas --</option>
                <option value="X">X</option>
                <option value="XI">XI</option>
                <option value="XII">XII</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Jurusan:</label>
            <select name="jurusan" class="form-control" required>
                <option value="">- Jurusan -</option>
                <option value="RPL">RPL</option>
                <option value="TKJ">TKJ</option>
                <option value="AKL">TPM</option>
                <option value="OTKP">TKR</option>
                <option value="TPSM">TPSM</option>
                <option value="TITL">TITL</option>
                <option value="TAV">TAV</option>
                <option value="DPIB">DPIB</option>
                <option value="KI">KI</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Tanggal:</label>
            <input type="date" name="tanggal" class="form-control" value="<?= $data['tanggal']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Keterangan:</label>
            <textarea name="keterangan" class="form-control" rows="4" required><?= $data['keterangan']; ?></textarea>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>

<?php
if (isset($_POST['submit'])) {
    $nama      = $_POST['nama'];
    $kelas     = $_POST['kelas'];
    $jurusan   = $_POST['jurusan'];
    $tanggal   = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];

    $query = "INSERT INTO izin (nama, kelas, jurusan, tanggal, keterangan) 
              VALUES ('$nama', '$kelas', '$jurusan', '$tanggal', '$keterangan')";

    if ($conn->query($query)) {
        header("Location: index.php");
    } else {
        echo "<div class='alert alert-danger mt-3'>Gagal menyimpan data!</div>";
    }
}
?>

</body>
</html>
