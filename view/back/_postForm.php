<form action="admin.php?controller=post&amp;action=<?php echo $viewData['action']; ?>" method="post">
<?php if ($viewData['action'] === 'update'): ?>
    <input type="hidden" name="postId" value="<?php echo $viewData['post']->getId(); ?>" />
<?php endif; ?>
    <p>
        <label for="title">Titre</label> : <input type="text" name="title" id="title" value="<?php echo $viewData['post']->getTitle(); ?>" required /><br />
        <label for="content">Contenu</label> :  <textarea name="content" id="content"><?php echo $viewData['post']->getContent(); ?></textarea><br />

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