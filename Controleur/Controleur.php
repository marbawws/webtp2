<?php

//Attention il s'agit d'identificateurs à portée globale alors les nom doivent être exclusifs
//Une constante nommée simplement "public" ne serait pas une bonne idée
define ("H204A4_PUBLIC", false); //si public alors aucune modification permise à la BD
session_start(); // Le message à afficher dans le gabarit lorsque ce n'est pas permis sera dans $_SESSION['h204a4message']

require 'Modele/Modele.php';

// Affiche la liste de tous les transactions du blog
function accueil() {
    $transactions = getTransactions();
    require 'Vue/vueAccueil.php';
}

// Affiche la liste de tous les transactions du blog
function apropos() {
    require 'Vue/vueApropos.php';
}

// Affiche les détails sur un transaction
function transaction($idTransaction, $erreur) {
    $transaction = getTransaction($idTransaction);
    $places = getPlaces($idTransaction);
    require 'Vue/vueTransaction.php';
}

// Ajoute une place à une transaction
function place($place) {
    /*$validation_courriel = filter_var($commentaire['auteur'], FILTER_VALIDATE_EMAIL);
    if ($validation_courriel) {*/
        if (H204A4_PUBLIC) {
            $_SESSION['h204a4message'] = "Ajouter une place n'est pas permis en démonstration";
        } else {
            // Ajouter la place à l'aide du modèle
            setPlace($place);
        }
        //Recharger la page pour mettre à jour la liste des places associés
        header('Location: index.php?action=transaction&id=' . $place['transaction_id']); //Action TODO
    /*} else {
        //Recharger la page avec une erreur près du courriel
        header('Location: index.php?action=article&id=' . $commentaire['article_id'] . '&erreur=courriel');
    }*/
}

// Confirmer la suppression d'une place
function confirmer($id) {
    // Lire le place à l'aide du modèle
    $place = getPlace($id);
    require 'Vue/vueConfirmer.php';
}

// Supprimer unw place
function supprimer($id) {
    // Lire la place afin d'obtenir le id de la transaction associé
    $place = getPlace($id);
    if (H204A4_PUBLIC) {
        $_SESSION['h204a4message'] = "Supprimer une place n'est pas permis en démonstration";
    } else {
        // Supprimer le place à l'aide du modèle
        deletePlace($id);
    }
    //Recharger la page pour mettre à jour la liste des places associés
    header('Location: index.php?action=transaction&id=' . $place['transaction_id']); //Action
}

function nouvelTransaction() {
    require 'Vue/vueAjouter.php';
}

// Enregistre la nouvelle transaction et retourne à l'accueil
function ajouter($transaction) {
    if (H204A4_PUBLIC) {
        $_SESSION['h204a4message'] = "Ajouter un transaction n'est pas permis en démonstration";
    } else {
        setTransaction($transaction);
    }
    header('Location: index.php');
}

// recherche et retourne les types pour l'autocomplete
function quelsTypes($term) {
    echo searchType($term);
}

// Affiche une erreur
function erreur($msgErreur) {
    require 'Vue/vueErreur.php';
}
