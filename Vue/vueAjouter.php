<?php $titre = "Le Blogue de Marwane Rezgui - Ajouter une transaction"; ?>

<?php ob_start(); ?>
<header>
    <h1 id="titreReponses">Ajouter une transaction de l'utilisateur 1 :</h1>
</header>
<form action="index.php?action=ajouter" method="post"> <!--Action-->
    <h2>Ajouter une transaction</h2>
    <p>
        <label for="retourInformation">Retour d'information:</label><br/> <textarea type="text" name="retourInformation" rows="4" cols="25" id="retourInformation"> Écrivez votre retour d'information</textarea><br /><br/><br/>
        <label for="Daate">Date</label><br/>   <input type="date" name="Daate" id="Daate"  /><br /><br/><br/>
		<label for="Prix">Prix</label><br/>   <input type="number" name="Prix" id="Prix"  /><br /><br/><br/>
        <input type="hidden" name="utilisateur_id" value="1" /><br />
        <input type="submit" value="Envoyer" />
    </p>
</form>

<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>

