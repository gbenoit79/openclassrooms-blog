<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>

<?php
foreach ($viewData['postsList'] as $viewData['post']) {
    require('_postView.php');
}
?>

<?php require(__DIR__.'/../_pagination.php'); ?>
<?php $content = ob_get_clean(); ?>

<?php require(__DIR__.'/../template.php'); ?>