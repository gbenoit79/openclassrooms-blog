<?php ob_start(); ?>
<?php require(__DIR__.'/../_alert.php'); ?>

<?php require('_menu.php'); ?>

<h2>Mod&eacute;rer les commentaires</h2>

<table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Commentaire</th>
            <th>Auteur</th>
            <th>Date de cr&eacute;ation</th>
            <th>Nombre de signalements</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
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
    </tbody>
</table>

<?php require(__DIR__.'/../_pagination.php'); ?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>