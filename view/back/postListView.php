<?php ob_start(); ?>
<h1>Admin</h1>

<?php require('_menu.php'); ?>

<h2>G&eacute;rer les billets</h2>

<table>
    <tr>
        <th>Titre</th>
        <th>Actions</th>
    </tr>
<?php foreach ($viewData['postsList'] as $viewData['post']): ?>
    <tr>
        <td><?php echo $viewData['post']->getTitle() ?></td>
        <td>
            <a href="admin.php?controller=post&amp;action=update&amp;postId=<?php echo $viewData['post']->getId(); ?>">Modifier</a> | 
            <a href="admin.php?controller=post&amp;action=delete&amp;postId=<?php echo $viewData['post']->getId(); ?>">Supprimer</a>
        </td>
    </tr>
<?php endforeach; ?>
</table>
<?php $content = ob_get_clean(); ?>

<?php require(__DIR__.'/../template.php'); ?>