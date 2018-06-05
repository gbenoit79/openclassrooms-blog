<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<?php
require("views/_postShowView.php");
?>

<h2>Commentaires</h2>

<?php
foreach ($viewData['commentsList'] as $comment) {
?>
    <p><strong><?php echo htmlspecialchars($comment->getAuthor()); ?></strong> le <?php echo $comment->getCreationDate(); ?></p>
    <p><?php echo nl2br(htmlspecialchars($comment->getContent())); ?></p>
<?php
}
?>

<form action="commentCreate.php" method="post">
    <input type="hidden" name="postId" value="<?php echo $viewData['post']->getId(); ?>">
    <p>
        <label for="author">Pseudo</label> : <input type="text" name="author" id="author" /><br />
        <label for="content">Commentaire</label> :  <input type="text" name="content" id="content" /><br />

        <input type="submit" value="Envoyer" />
    </p>
</form>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>