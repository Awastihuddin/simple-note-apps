<?php
require 'config.php';
$errors = [];

$id = $_GET['id'] ?? null;
if (!$id) {
    exit('ID catatan tidak ditemukan.');
}

$stmt = $pdo->prepare("SELECT * FROM notes WHERE id = ?");
$stmt->execute([$id]);
$note = $stmt->fetch();
if (!$note) {
    exit('Catatan tidak ditemukan.');
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $t = trim($_POST['title'] ?? '');
    $c = trim($_POST['content'] ?? '');
    if ($t === '') $errors[] = 'Judul wajib diisi.';
    if ($c === '') $errors[] = 'Isi catatan wajib diisi.';

    if (empty($errors)) {
        try {
            $upd = $pdo->prepare("UPDATE notes SET title = ?, content = ? WHERE id = ?");
            $upd->execute([$t, $c, $id]);
            header("Location: view.php?id=$id");
            exit;
        } catch (PDOException $e) {
            $errors[] = 'Gagal update: ' . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit: <?= htmlspecialchars($note['title']) ?></title>
  <link rel="stylesheet" href="assets/style.css">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
  
   <nav style="display: flex; justify-content: space-between; align-items: center;">
    <a href="index.php" class="brand">
      <i class="fas fa-book-open"></i>
      Implementasi CRUD – Aplikasi Catatan Instan
    </a>
  </nav>

  <div class="container">
    <h1>Edit Catatan</h1>
    <a class="btn" href="view.php?id=<?= $id ?>">
      <i class="fas fa-arrow-left"></i> Kembali
    </a>

    <?php if ($errors): ?>
      <ul class="errors">
        <?php foreach($errors as $e): ?>
          <li><?= htmlspecialchars($e) ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>

    <form method="post">
      <label for="title">Judul:</label>
      <input
        id="title"
        type="text"
        name="title"
        value="<?= htmlspecialchars($_POST['title'] ?? $note['title']) ?>"
      >

      <label for="content">Isi Catatan:</label>
      <textarea
        id="content"
        name="content"
        rows="8"
      ><?= htmlspecialchars($_POST['content'] ?? $note['content']) ?></textarea>

      <button type="submit" class="btn">
        <i class="fas fa-save"></i> Update
      </button>
    </form>
  </div>

  <script src="assets/script.js"></script>
</body>
</html>
