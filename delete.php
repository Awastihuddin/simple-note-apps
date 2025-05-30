<?php
require 'config.php';
$id = $_GET['id'] ?? null;
if ($id) {
  $del = $pdo->prepare("DELETE FROM notes WHERE id = ?");
  $del->execute([$id]);
}
header('Location: index.php');
