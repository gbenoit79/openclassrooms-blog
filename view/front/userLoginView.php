<?php ob_start(); ?>
<h2>Se connecter</h2>

<?php require(__DIR__.'/../_alert.php'); ?>

<form action="index.php?controller=user&amp;action=login" method="post">
    <div class="form-group">
        <label for="username">Pseudo</label>
        <input type="text" class="form-control" name="username" id="username" value="<?php echo !empty($_POST['username']) ? $_POST['username'] : ''; ?>" required />
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" name="password" id="password" value="<?php echo !empty($_POST['password']) ? $_POST['password'] : ''; ?>" required />
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>
<?php $content = ob_get_clean(); ?>

<?php require(__DIR__.'/../template.php'); ?>