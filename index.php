<?php
require 'config.php';
$sortBy = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'created_at'; // Default ke created_at
$sortOrder = isset($_GET['sort_order']) ? $_GET['sort_order'] : 'DESC'; // Default ke DESC
$notes = $pdo->query("SELECT id, title FROM notes ORDER BY $sortBy $sortOrder")->fetchAll();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aplikasi Catatan Instan</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
    <h1>Daftar Kegiatan</h1>

   

    <div class="calendar-container">
      <div class="calendar">
        <div class="calendar-header">
          <button id="prevMonth">&lt;</button>
          <span id="monthYear"></span>
          <button id="nextMonth">&gt;</button>
        </div>
        <div class="calendar-days" id="calendarDays">
          <!-- Days will be dynamically generated -->
        </div>
      </div>

      <div class="container">
        <h3>Tips!</h3>
        <p>Cek tanggal-tanggal spesial yang berpotensi jadi libur, biar hati lebih gembira! Rencanakan waktu istirahat dengan bijak—kadang, sedikit jeda dari rutinitas bisa jadi penyegar jiwa. Siapa tahu ada long weekend tersembunyi yang bisa dimanfaatkan untuk bersantai atau bertualang. Jangan lupa tandai kalendermu, biar semangat tetap terjaga! ✨</p>
      </div>
    </div>

    <div style="text-align: center; margin-top: 20px;">
      <a class="btn" href="create.php">
        <i class="fas fa-plus-circle"></i> Tambah Catatan Baru
      </a>
    </div>

    <div style="margin-bottom: 20px;">
      <select id="sortSelect" onchange="sortNotes()">
        <option value="created_at|DESC" <?php echo ($sortBy == 'created_at' && $sortOrder == 'DESC') ? 'selected' : ''; ?>>Tanggal Terbaru</option>
        <option value="created_at|ASC" <?php echo ($sortBy == 'created_at' && $sortOrder == 'ASC') ? 'selected' : ''; ?>>Tanggal Terlama</option>
        <option value="title|ASC" <?php echo ($sortBy == 'title' && $sortOrder == 'ASC') ? 'selected' : ''; ?>>Judul A-Z</option>
        <option value="title|DESC" <?php echo ($sortBy == 'title' && $sortOrder == 'DESC') ? 'selected' : ''; ?>>Judul Z-A</option>
      </select>
    </div>

    <?php if (empty($notes)): ?>
      <p class="empty">
        <i class="fas fa-info-circle"></i>
        Tidak ada apa-apa di sini.
      </p>
    <?php else: ?>
      <ul class="note-list">
        <?php foreach($notes as $n): ?>
          <li>
            <a class="title" href="view.php?id=<?= $n['id'] ?>">
              <i class="fas fa-sticky-note"></i>
              <?= htmlspecialchars($n['title']) ?>
            </a>
            <a class="del" href="delete.php?id=<?= $n['id'] ?>"
               onclick="return confirm('Hapus catatan ini?')">
              <i class="fas fa-trash-alt"></i>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
  </div>
  <script src="assets/script.js"></script>
</body>
</html>
