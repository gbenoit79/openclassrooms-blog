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

<form id="comment-form" action="index.php?controller=comment&amp;action=create" method="post">
    <input type="hidden" name="postId" value="<?php echo $viewData['post']->getId(); ?>">
    <div class="form-group">
        <label for="author">Pseudo</label>
        <input type="text" class="form-control" name="author" id="author" required />
    </div>
    <div class="form-group">
        <label for="content">Commentaire</label>
        <input type="text" class="form-control" name="content" id="content" required />
    </div>
    <button type="submit" class="btn btn-primary">Ajouter le commentaire</button>
    </p>
</form>
<?php $content = ob_get_clean(); ?>

<?php require(__DIR__.'/../template.php'); ?>