<?php include 'config/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Izin Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
    <h2 class="mb-4">MIOS (Manajement In/Out School)</h2>
    <a href="tambah.php" class="btn btn-primary mb-3">+ Insert</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        $result = $conn->query("SELECT * FROM izin ORDER BY tanggal DESC");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>$no</td>
                    <td>{$row['nama']}</td>
                    <td>{$row['kelas']}</td>
                    <td>{$row['jurusan']}</td>
                    <td>{$row['tanggal']}</td>
                    <td>{$row['keterangan']}</td>
                    <td>
                        <a href='edit.php?id={$row['id']}' class='btn btn-sm btn-warning'>Edit</a>
                        <a href='hapus.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Yakin?')\">Hapus</a>
                    </td>
                  </tr>";
            $no++;
        }
        ?>
        </tbody>
    </table>
</body>
</html>
