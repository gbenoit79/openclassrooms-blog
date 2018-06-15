<?php ob_start(); ?>
<?php
foreach ($viewData['postsList'] as $viewData['post']) {
    require('_postView.php');
}
?>

<?php require(__DIR__.'/../_pagination.php'); ?>
<?php $content = ob_get_clean(); ?>

<?php require(__DIR__.'/../template.php'); ?>