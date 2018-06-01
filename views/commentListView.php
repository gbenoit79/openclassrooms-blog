<?php
require("views/_headerView.php");
?>

<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<?php
require("views/_articleShowView.php");
?>

<h2>Commentaires</h2>

<?php
foreach ($viewData['commentsList'] as $comment)
{
?>
    <p><strong><?php echo htmlspecialchars($comment['auteur']); ?></strong> le <?php echo $comment['date_commentaire_fr']; ?></p>
    <p><?php echo nl2br(htmlspecialchars($comment['commentaire'])); ?></p>
<?php
}
?>

<form action="commentCreate.php" method="post">
    <input type="hidden" name="articleId" value="<?php echo $viewData['article']['id']; ?>">
    <p>
        <label for="auteur">Pseudo</label> : <input type="text" name="auteur" id="auteur" /><br />
        <label for="commentaire">Commentaire</label> :  <input type="text" name="commentaire" id="commentaire" /><br />

        <input type="submit" value="Envoyer" />
    </p>
</form>

<?php
require("views/_footerView.php");
?>