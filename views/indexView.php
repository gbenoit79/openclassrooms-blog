<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>

<?php
foreach ($viewData['postsList'] as $viewData['post']) {
    require("views/_postShowView.php");
}
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>