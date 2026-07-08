<?php
    include('../inc/functions.php');

    $emp_no   = $_GET['emp_no'] ?? '';
    $page_title = 'Devenir manager';
    include('../inc/header.php');
    
    $employee = get_one_employee($emp_no);
    $current_dept = get_current_department($emp_no);   // département dont il deviendra manager

    $error   = '';
    $success = false;

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $current_dept) {
        $start = $_POST['from_date'] ?? '';
        $manager = get_current_manager($current_dept['dept_no']);

        if ($start === '') {
            $error = "Veuillez saisir une date de début.";
        } elseif ($manager && $start < $manager['from_date']) {
            // c. Erreur si la date est antérieure à celle du manager actuel
            $error = "La date de début ($start) ne peut pas être antérieure à celle du manager actuel (" . $manager['from_date'] . ").";
        } else {
            make_manager($emp_no, $current_dept['dept_no'], $start);
            $success = true;
        }
    }

    // b. Manager en cours (rechargé après un éventuel changement pour vérifier)
    $manager = $current_dept ? get_current_manager($current_dept['dept_no']) : null;
?>

<?php if (!$employee) { ?>
    <h1>Employé introuvable</h1>
<?php } elseif (!$current_dept) { ?>
    <h1>Cet employé n'a pas de département actuel.</h1>
<?php } else { ?>
    <h1><?= $employee['first_name'] ?> <?= $employee['last_name'] ?> — devenir manager de <?= $current_dept['dept_name'] ?></h1>

    <?php if ($success) { ?>
        <div class="alert alert-success">
            C'est fait : l'employé est désormais le manager du département.
            <a href="index.php">Vérifier dans la liste des départements &rarr;</a>
        </div>
    <?php } ?>
    <?php if ($error !== '') { ?>
        <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
    <?php } ?>

    <!-- b. Manager en cours affiché en haut -->
    <div class="card mb">
        <p>
            <strong>Manager en cours :</strong><br>
            <span class="text-muted">
                <?= $manager ? $manager['manager_name'] . ' (depuis le ' . $manager['from_date'] . ')' : 'aucun' ?>
            </span>
        </p>
    </div>

    <div class="card">
        <form method="post" action="become_manager.php?emp_no=<?= urlencode($emp_no) ?>">
            <div class="form-group">
                <label for="from_date">Date de début</label>
                <input class="form-control" type="date" id="from_date" name="from_date">
            </div>
            
            <button type="submit" class="btn">Devenir manager</button>
        </form>
    </div>
<?php } ?>

        </div>
    </div>
</body>
</html>
