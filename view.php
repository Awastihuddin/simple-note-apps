<?php
require 'config.php';

// Ambil ID dari query string
$id = $_GET['id'] ?? 0;

// Ambil data catatan berdasarkan ID
$stmt = $pdo->prepare("SELECT * FROM notes WHERE id = ?");
$stmt->execute([$id]);
$note = $stmt->fetch();

if (!$note) {
    echo 'Catatan tidak ditemukan';
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Detail Catatan</title>

  <!-- Mengimpor Font Awesome untuk ikon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- Mengimpor CSS dari file terpisah -->
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
       <nav style="display: flex; justify-content: space-between; align-items: center;">
    <a href="index.php" class="brand">
      <i class="fas fa-book-open"></i>
      Implementasi CRUD – Aplikasi Catatan Instan
    </a>
  </nav>

  <div class="container">
    <h1><?= htmlspecialchars($note['title']) ?></h1>
    <p><em><?= $note['created_at'] ?></em></p>
    <div class="content"><?= nl2br(htmlspecialchars($note['content'])) ?></div>

    <div class="container">
      <div style="text-align:center">
      <a href="edit.php?id=<?= $note['id'] ?>" class="btn"><i class="fas fa-edit"></i> Edit</a>
      <a href="delete.php?id=<?= $note['id'] ?>" class="btn delete-btn"><i class="fas fa-trash"></i> Hapus</a>
      <a href="index.php" class="btn"><i class="fas fa-home"></i> Home</a>
      </div>
    </div>


  </div>
</body>
</html>
