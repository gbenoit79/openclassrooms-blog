<form action="admin.php?controller=post&amp;action=<?php echo $viewData['action']; ?>" method="post">
<?php if ($viewData['action'] === 'update'): ?>
    <input type="hidden" name="postId" value="<?php echo $viewData['post']->getId(); ?>" />
<?php endif; ?>
    <div class="form-group">
        <label for="title">Titre</label>
        <input type="text" class="form-control" name="title" id="title" value="<?php echo $viewData['post']->getTitle(); ?>" required />
    </div>
    <div class="form-group">
        <label for="content">Contenu</label>
        <textarea class="form-control" name="content" id="content"><?php echo $viewData['post']->getContent(); ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>

<script src="public/js/tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
    selector: '#content',
    height: 300,
});
</script>