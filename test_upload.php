<?php
$upload_path = 'uploads/foto/';

// Buat folder jika belum ada
if (!is_dir($upload_path)) {
    mkdir($upload_path, 0777, true);
    echo "Folder dibuat<br>";
}

echo "Path: " . realpath($upload_path) . "<br>";
echo "Izin tulis: " . (is_writable($upload_path) ? 'Ya' : 'Tidak') . "<br>";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['foto'])) {
    if ($_FILES['foto']['error'] == 0) {
        $target = $upload_path . basename($_FILES['foto']['name']);
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $target)) {
            echo "File berhasil diupload ke: " . $target;
        } else {
            echo "Gagal upload file!";
        }
    } else {
        echo "Error: " . $_FILES['foto']['error'];
    }
}
?>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="foto" required>
    <button type="submit">Upload</button>
</form>