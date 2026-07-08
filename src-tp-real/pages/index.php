<?php
    include('../inc/functions.php');
    $page_title = 'Gestion des employés';
    $current_page = 'departments';
    include('../inc/header.php');
    
    $departments = get_all_departments();
?>

<h1>Liste des départements</h1>
<table class="table">
    <thead>
        <tr>
            <th>N°</th>
            <th>Nom du département</th>
            <th>Manager actuel</th>
            <th>Nb employés</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($departments as $line) {?>
        <tr>
            <td><a href="employees.php?dept_no=<?= urlencode($line['dept_no']) ?>"><?= $line['dept_no']?></a></td>
            <td><?=$line['dept_name']?></td>
            <td><?= $line['manager_name'] ?? '—' ?></td>
            <td><?= $line['nb_employees'] ?></td>
            <td><a href="dept_form.php?dept_no=<?= urlencode($line['dept_no']) ?>">Éditer</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

        </div>
    </div>
</body>
</html>
