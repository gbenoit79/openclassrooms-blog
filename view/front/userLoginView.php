<?php ob_start(); ?>
<h2>Se connecter</h2>

<?php require(__DIR__.'/../_alert.php'); ?>

<form action="index.php?controller=user&amp;action=login" method="post">
    <p>
        <label for="username">Pseudo</label> : <input type="text" name="username" id="username" value="<?php echo !empty($_POST['username']) ? $_POST['username'] : ''; ?>" required /><br />
        <label for="password">Mot de passe</label> :  <input type="password" name="password" id="password" value="<?php echo !empty($_POST['password']) ? $_POST['password'] : ''; ?>" required /><br />

        <input type="submit" value="Envoyer" />
    </p>
</form>
<?php $content = ob_get_clean(); ?>

<?php require(__DIR__.'/../template.php'); ?>