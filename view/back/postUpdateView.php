<?php ob_start(); ?>
<h1>Admin</h1>

<?php require('_menu.php'); ?>

<h2>Modifier un billet</h2>

<?php require(__DIR__.'/../_alert.php'); ?>

<?php require('_postForm.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require(__DIR__.'/../template.php'); ?>