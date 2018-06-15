<?php ob_start(); ?>
<h1>Admin</h1>

<?php require(__DIR__.'/../_alert.php'); ?>

<?php require('_menu.php'); ?>

<h2>Mod&eacute;rer les commentaires</h2>

<table>
    <tr>
        <th>Commentaire</th>
        <th>Auteur</th>
        <th>Date de cr&eacute;ation</th>
        <th>Nombre de signalements</th>
        <th>Action</th>
    </tr>
<?php foreach ($viewData['commentsList'] as $viewData['comment']): ?>
    <tr>
        <td><?php echo $viewData['comment']->getContent() ?></td>
        <td><?php echo $viewData['comment']->getAuthor() ?></td>
        <td><?php echo $viewData['comment']->getCreationDate() ?></td>
        <td><?php echo $viewData['comment']->getReportCounter() ?></td>
        <td>
            <a href="admin.php?controller=comment&action=delete&commentId=<?php echo $viewData['comment']->getId(); ?>">Supprimer</a>
        </td>
    </tr>
<?php endforeach; ?>
</table>

<?php require(__DIR__.'/../_pagination.php'); ?>
<?php $content = ob_get_clean(); ?>

<?php require(__DIR__.'/../template.php'); ?>