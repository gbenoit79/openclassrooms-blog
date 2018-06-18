<?php ob_start(); ?>
<?php require(__DIR__.'/../_alert.php'); ?>

<?php require('_menu.php'); ?>

<h2>G&eacute;rer les billets</h2>

<table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Titre</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($viewData['postsList'] as $viewData['post']): ?>
        <tr>
            <td><?php echo $viewData['post']->getTitle() ?></td>
            <td>
                <a href="admin.php?controller=post&amp;action=update&amp;postId=<?php echo $viewData['post']->getId(); ?>">Modifier</a> | 
                <a href="admin.php?controller=post&amp;action=delete&amp;postId=<?php echo $viewData['post']->getId(); ?>">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php require(__DIR__.'/../_pagination.php'); ?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>