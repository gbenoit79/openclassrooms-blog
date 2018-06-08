<?php ob_start(); ?>
<h1>Admin</h1>

<?php require('_menu.php'); ?>

<h2>Cr&eacute;er un billet</h2>

<?php if (!empty($viewData['errorMessage'])): ?>
    <div class="error-message">Erreur : <?php echo $viewData['errorMessage']; ?></div>
<?php endif; ?>

<form action="admin.php?controller=post&amp;action=create" method="post">
    <p>
        <label for="title">Titre</label> : <input type="text" name="title" id="title" value="<?php echo isset($_POST['title']) ? $_POST['title'] : ''; ?>" required /><br />
        <label for="content">Contenu</label> :  <textarea name="content" id="content"><?php echo isset($_POST['content']) ? $_POST['content'] : ''; ?></textarea><br />

        <input type="submit" value="Envoyer" />
    </p>
</form>

<script src="public/js/tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
    selector: '#content',
    height: 300,
});
</script>
<?php $content = ob_get_clean(); ?>

<?php require(__DIR__.'/../template.php'); ?>