<?php $titre = 'Le Blogue du prof version 1.0.0.1'; ?>

<?php ob_start(); ?>
<ul>
    <li>Marwane Rezgui</li>

    <li>420-4A4 MO Web et Bases de données</li>
    <li>Hiver 2020, Collège Montmorency</li>
</ul>
<h3>Le Blogue de Marwane Rezgui</h3>
<ul>
	<li>Cette application est très fortement inspirée du blogue du prof.<br>
        </li>
    <li>L'application "Le Blogue de Marwane Rezgui" permet de composer et de
        diffuser des transactions.</li>
    <li>La page d'Accueil présente la liste des titres des transactions
        avec la date et le prix :</li>

    <li>On y retrouve un lien pour créer une nouvelle transaction :</li>
 
    <li>Les lecteurs du blogue peuvent cliquer sur la date de la
        transaction <br>
    </li>
    <ul>
        <li>À la suite du retour d'information de la transaction on offre la possibilité de
            laisser une place sur la transaction ;</li>

        <li>On peut supprimer une place après confirmation.</li>
        <li>Une place ne peut pas être modifié.<br>
        </li>
		
    </ul>
</ul>
<br>

<table>
    <tr>
        <td>
            <h4>Base de données utilisée par l'application :</h4>
            <object data="Contenu/images/Blogue-vers-MVC-v1_0_0_0.svg" type="image/svg+xml" height="500" width="800">
                <img src="Contenu/images/maBD.PNG" alt=""/>
            </object><br/>
        </td>
    </tr>
    <tr>
        <td>
            <h4>Basé sur ce modèle original :</h4>
            <a href="http://www.databaseanswers.org/data_models/fuel_stock/index.htm" >
                <img src="Contenu/images/bd_Barry.png" alt=""/><br/>
                Lien vers la bd :</a>
        </td>
    </tr>
</table>
<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>