<?php
session_start();
// if (isset($_SESSION['id'])) {
//     header('Location: index.php');
//     exit;
// }

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($login)) {
        $errors['login'] = "*Veuillez entrer votre nom d'utilisateur.";
    }
    if (empty($password)) {
        $errors['password'] = "*Veuillez entrer votre mot de passe.";
    }

    // Si pas d'erreur, on pourrait vérifier dans la base ici...
    if (empty($errors)) {
        // ... Connexion réussie par exemple :
        $_SESSION['id'] = 1; // Simulé
        header('Location: index.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./css/connexion.css">
</head>
<body>

<?php
if (isset($_GET['erreur'])) {
    echo "<p style='color: red;'>Identifiants incorrects</p>";
}
?>

<div class="login-container">
  <div class="login-card">
    <h2>Connexion</h2>
    
    <?php if (isset($_GET['erreur'])): ?>
      <div class="error-message">Identifiants incorrects</div>
    <?php endif; ?>

    <form action="" method="post">
      <div class="form-group">
        <label for="login">Nom d'utilisateur <span class="color-red">*</span></label>
      <input type="text" name="login">
       <?php if (isset($errors['login'])): ?>
      <span class="color-red"><?= $errors['login'] ?></span><br>
    <?php endif; ?>

      </div>

      <div class="form-group">
        <label for="password">Mot de passe <span class="color-red">*</span></label>
      <input type="password" name="password">
      <?php if (isset($errors['password'])): ?>
      <span class="color-red"><?= $errors['password'] ?></span><br>
    <?php endif; ?>
      </div>
      

      <button type="submit">Se connecter</button>
    </form>

    <div class="register-link">
      <p>Pas encore inscrit ? <a href="register.php">Créer un compte</a></p>
    </div>
  </div>
</div>

</body>
</html>