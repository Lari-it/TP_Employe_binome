<?php
$page_title = $page_title ?? 'Gestion des employés';
$current_page = $current_page ?? '';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($page_title) ?></title>
    <link rel="stylesheet" href="../design/theme-minimal/style.css">
</head>
<body>
    <nav class="navbar">
        <ul>
            <li class="brand"><a href="index.php">Gestion des employés</a></li>
            <li><a href="index.php" class="<?= $current_page === 'departments' ? 'active' : '' ?>">Départements</a></li>
            <li><a href="search.php" class="<?= $current_page === 'search' ? 'active' : '' ?>">Recherche</a></li>
            <li><a href="stats.php" class="<?= $current_page === 'stats' ? 'active' : '' ?>">Statistiques</a></li>
            <li><a href="emp_form.php" class="<?= $current_page === 'emp_form' ? 'active' : '' ?>">Ajouter employé</a></li>
            <li><a href="dept_form.php" class="<?= $current_page === 'dept_form' ? 'active' : '' ?>">Ajouter département</a></li>
        </ul>
    </nav>

    <div class="container">
        <div class="card">