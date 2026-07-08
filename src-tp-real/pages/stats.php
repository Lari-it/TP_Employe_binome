<?php
    include('../inc/functions.php');
    
    $page_title = 'Statistiques par emploi';
    $current_page = 'stats';
    include('../inc/header.php');
    
    $stats = get_jobs_stats();
?>

<h1>Statistiques par emploi</h1>

<table class="table">
    <thead>
        <tr>
            <th>Emploi</th>
            <th>Hommes</th>
            <th>Femmes</th>
            <th>Total</th>
            <th>Salaire moyen</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($stats as $row) { ?>
        <tr>
            <td><?= $row['title'] ?></td>
            <td><?= $row['nb_hommes'] ?></td>
            <td><?= $row['nb_femmes'] ?></td>
            <td><?= $row['nb_total'] ?></td>
            <td><?= number_format($row['salaire_moyen'], 0, ',', ' ') ?> €</td>
        </tr>
        <?php } ?>
    </tbody>
</table>

        </div>
    </div>
</body>
</html>
