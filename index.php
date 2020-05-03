<?php

require 'Controleur/Controleur.php';

try {
    if (isset($_GET['action'])) {

        // À propos
        if ($_GET['action'] == 'apropos') {
            apropos();
        } else

        // Afficher une transaction
        if ($_GET['action'] == 'transaction') {
            if (isset($_GET['id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_GET['id']);
                if ($id != 0) {
                    $erreur = isset($_GET['erreur']) ? $_GET['erreur'] : '';
                    transaction($id, $erreur);
                } else
                    throw new Exception("Identifiant de la transaction incorrect");
            } else
                throw new Exception("Aucun identifiant de latransaction");

            // Ajouter une place
        } else if ($_GET['action'] == 'place') {
            if (isset($_POST['transaction_id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_POST['transaction_id']);
                if ($id != 0) {
                    // vérifier si la transaction existe;
                    $transaction = getTransaction($id);
                    // Récupérer les données du formulaire
                    $place = $_POST;
                    // Ajuster la valeur de la case à cocher
                    $place['prive'] = (isset($_POST['prive'])) ? 1 : 0;
                    //Réaliser l'action place du contrôleur
                    place($place);
                } else
                    throw new Exception("Identifiant de la transaction incorrect");
            } else
                throw new Exception("Aucun identifiant de la transaction");

            // Confirmer la suppression
        } else if ($_GET['action'] == 'confirmer') {
            if (isset($_GET['id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_GET['id']);
                if ($id != 0) {
                    confirmer($id);
                } else
                    throw new Exception("Identifiant de place incorrect");
            } else
                throw new Exception("Aucun identifiant de place");

            // Supprimer une place
        } else if ($_GET['action'] == 'supprimer') {
            if (isset($_POST['id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_POST['id']);
                if ($id != 0) {
                    supprimer($id);
                } else
                    throw new Exception("Identifiant de place incorrect");
            } else
                throw new Exception("Aucun identifiant de place");

            // Ajouter un transaction
        } else if ($_GET['action'] == 'nouvelTransaction') {
            nouvelTransaction();

            // Enregistrer la transaction
        } else if ($_GET['action'] == 'ajouter') {
            $transaction = $_POST;
            ajouter($transaction);

            // CHerche les types pour l'autocomplete
        } else if ($_GET['action'] == 'quelsTypes') {
            quelsTypes($_GET['term']);
        } else {
            // Fin des actions
            throw new Exception("Action non valide");
        }
    } else {
        accueil();  // action par défaut
    }
} catch (Exception $e) {
    erreur($e->getMessage());
}
