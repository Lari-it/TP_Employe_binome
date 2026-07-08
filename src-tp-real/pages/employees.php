<?php
    include('../inc/functions.php');

    $dept_no = $_GET['dept_no'] ?? '';
    $department = get_one_department($dept_no);
    $page_title = $department ? 'Employés — ' . $department['dept_name'] : 'Employés';
    $current_page = 'departments';
    include('../inc/header.php');

    // --- Pagination ---
    $par_page = 20;
    $page = max(1, (int)($_GET['page'] ?? 1));
    $offset = ($page - 1) * $par_page;

    $total = count_employees_by_department($dept_no);
    $nb_pages = (int)ceil($total / $par_page);

    $employees = get_employees_by_department($dept_no, $par_page, $offset);
?>

<?php if (!$department) { ?>
    <h1>Département introuvable</h1>
<?php } else { ?>
    <h1>Employés du département <?= $department['dept_name'] ?> (<?= $department['dept_no'] ?>)</h1>
    
    <table class="table">
        <thead>
            <tr>
                <th>N°</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Genre</th>
                <th>Date d'embauche</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $emp) { ?>
            <tr>
                <td><a href="fiche.php?emp_no=<?= urlencode($emp['emp_no']) ?>"><?= $emp['emp_no'] ?></a></td>
                <td><?= $emp['first_name'] ?></td>
                <td><?= $emp['last_name'] ?></td>
                <td><?= $emp['gender'] ?></td>
                <td><?= $emp['hire_date'] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    
    <div class="pagination mt">
        <?php if ($page > 1) { ?>
            <a href="employees.php?dept_no=<?= urlencode($dept_no) ?>&page=<?= $page - 1 ?>">&larr; Précédent</a>
        <?php } ?>

        <span class="current">Page <?= $page ?> / <?= $nb_pages ?></span>

        <?php if ($page < $nb_pages) { ?>
            <a href="employees.php?dept_no=<?= urlencode($dept_no) ?>&page=<?= $page + 1 ?>">Suivant &rarr;</a>
        <?php } ?>
    </div>
    
    <p class="text-muted"><?= $total ?> employé(s) au total dans ce département.</p>
<?php } ?>

        </div>
    </div>
</body>
</html>
