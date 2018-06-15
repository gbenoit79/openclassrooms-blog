<?php ob_start(); ?>
<p><a href="index.php">Retour à la liste des billets</a></p>

<?php require(__DIR__.'/../_alert.php'); ?>

<?php
require('_postView.php');
?>

<h3>Commentaires</h3>

<?php
foreach ($viewData['commentsList'] as $comment) {
    require('_commentView.php');
}
?>

<?php require(__DIR__.'/../_pagination.php'); ?>

<form action="index.php?controller=comment&amp;action=create" method="post">
    <input type="hidden" name="postId" value="<?php echo $viewData['post']->getId(); ?>">
    <p>
        <label for="author">Pseudo</label> : <input type="text" name="author" id="author" required /><br />
        <label for="content">Commentaire</label> :  <input type="text" name="content" id="content" required /><br />

        <input type="submit" value="Envoyer" />
    </p>
</form>
<?php $content = ob_get_clean(); ?>

<?php require(__DIR__.'/../template.php'); ?>