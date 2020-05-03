<?php $titre = 'Le Blogue de Marwane Rezgui'; ?>

<?php ob_start(); ?>
<a href="index.php?action=apropos"> <!--Action-->
    <h4>À propos</h4>
</a>
<a href="index.php?action=nouvelTransaction"> <!--Action-->
    <h2 class="Daatetransactions">Ajouter une transaction</h2>
</a>
<?php foreach ($transactions as $transaction):
    ?>

    <article>
        <header>
            <a href="<?= "index.php?action=transaction&id=" . $transaction['id'] ?>"> <!--Action-->
                <h1 class="Datetransactions"><?= $transaction['Daate'] ?></h1>
            </a>
            <time><?= $transaction['Daate'] ?></time>, par utilisateur #<?= $transaction['Utilisateur_id'] ?>
        </header>
        <p><?= $transaction['Prix'] ?>$</p>
        <p><?= $transaction['retourInformation'] ?></p>
    </article>
    <hr />
<?php endforeach; ?>    
<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>