<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<?php
require("views/_postView.php");
?>

<h2>Commentaires</h2>

<?php
foreach ($viewData['commentsList'] as $comment) {
    require("views/_commentView.php");
}
?>

<form action="index.php?controller=comment&amp;action=create" method="post">
    <input type="hidden" name="postId" value="<?php echo $viewData['post']->getId(); ?>">
    <p>
        <label for="author">Pseudo</label> : <input type="text" name="author" id="author" /><br />
        <label for="content">Commentaire</label> :  <input type="text" name="content" id="content" /><br />

        <input type="submit" value="Envoyer" />
    </p>
</form>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>