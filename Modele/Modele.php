<?php

// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
function getBdd() {
    $bdd = new PDO('mysql:host=localhost;dbname=fuel;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}

// Renvoie la liste de tous les transactions, triés par identifiant décroissant
function getTransactions() {
    $bdd = getBdd();
    $transactions = $bdd->query('select * from transactions'
            . ' order by ID desc');
    return $transactions;
}

// Renvoie la liste de tous les transactions, triés par identifiant décroissant
function setTransaction($transaction) {
    $bdd = getBdd();
    $result = $bdd->prepare('INSERT INTO transactions (Daate, Prix, Utilisateur_id, retourInformation) VALUES(?, ?, ?, ?)');
    $result->execute(array($transaction[Daate], $transaction[Prix], $transaction[Utilisateur_id], $transaction[retourInformation]));
    return $result;
}

// Renvoie les informations sur un transaction
function getTransaction($idTransaction) {
    $bdd = getBdd();
    $transaction = $bdd->prepare('select * from transactions'
            . ' where ID=?');
    $transaction->execute(array($idTransaction));
    if ($transaction->rowCount() == 1)
        return $transaction->fetch();  // Accès à la première ligne de résultat
    else
        throw new Exception("Aucune transaction ne correspond à l'identifiant '$idTransaction'");
}

// Renvoie la liste des Places associés à une transaction
function getPlaces($idTransaction) {
    $bdd = getBdd();
    $places = $bdd->prepare('select * from places'
            . ' where transaction_id = ?');
    $places->execute(array($idTransaction));
    return $places;
}

// Renvoie une place spécifique
function getPlace($id) {
    $bdd = getBdd();
    $place = $bdd->prepare('select * from places'
            . ' where id = ?');
    $place->execute(array($id));
    if ($place->rowCount() == 1)
        return $place->fetch();  // Accès à la première ligne de résultat
    else
        throw new Exception("Aucune place ne correspond à l'identifiant '$id'");
    return $place;
}

// Supprime une place
function deletePlace($id) {
    if ($public) {
        echo "<script>alert('Cette opération n'est pas permise en mode démonstration');</script>";
        return true;
    } else {
        $bdd = getBdd();
        $result = $bdd->prepare('DELETE FROM places'
                . ' WHERE id = ?');
        $result->execute(array($id));
        return $result;
    }
}

// Ajoute un place associés à un transaction
function setPlace($place) {
    $bdd = getBdd();
    $result = $bdd->prepare('INSERT INTO places (Adresse, Description, auteur, transaction_id) VALUES(?, ?, ?, ?)');
    $result->execute(array($place['Adresse'], $place['Description'], $place['auteur'] $place['transaction_id']));
    return $result;
}

// Recherche les types répondant à l'autocomplete
function searchType($term) {
    $conn = getBdd();
    $stmt = $conn->prepare('SELECT type FROM types WHERE type LIKE :term');
    $stmt->execute(array('term' => '%' . $term . '%'));

    while ($row = $stmt->fetch()) {
        $return_arr[] = $row['type'];
    }

     /*Toss back results as json encoded array. */
    return json_encode($return_arr);
}
