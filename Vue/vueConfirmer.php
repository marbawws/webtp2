<?php $titre = "Supprimer - " . $place['Daate']; ?>
<?php ob_start(); ?>
<article>
    <header>
		<p><h1>
            Supprimer?
        </h1>
		<?= $place['auteur'] ?> dit :<br/>
        <strong><?= $place['Adresse'] ?></strong><br/>
        <?= $place['Description'] ?>
        </p>
    </header>
</article>

<form action="index.php?action=supprimer" method="post"> <!--Action-->
    <input type="hidden" name="id" value="<?= $place['id'] ?>" /><br />
    <input type="submit" value="Oui" />
</form>
<form action="index.php" method="get" >
    <input type="hidden" name="action" value="transaction" /> <!--Action-->
    <input type="hidden" name="id" value="<?= $place['transaction_id'] ?>" />
    <input type="submit" value="Annuler" />
</form>
<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>

