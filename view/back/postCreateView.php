<?php ob_start(); ?>
<?php require('_menu.php'); ?>

<h2>Cr&eacute;er un billet</h2>

<?php require(__DIR__.'/../_alert.php'); ?>

<?php require('_postForm.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>