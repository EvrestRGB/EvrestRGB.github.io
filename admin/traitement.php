<?php
// Vérifier si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password']; // Récupérer le mot de passe soumis

    // Vérifier si le mot de passe est correct
    if ($password === 'votre_mot_de_passe') {
        // Le mot de passe est correct, vous pouvez afficher le fichier ici
        header('Content-type: application/json');
        readfile('admin.json');
        exit;
    } else {
        // Le mot de passe est incorrect, affichez un message d'erreur ou redirigez l'utilisateur vers une autre page
        echo "Mot de passe incorrect";
    }
}
?>

<!-- Formulaire de saisie du mot de passe -->
<form method="post" action="">
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button type="submit">Accéder au fichier</button>
</form>
