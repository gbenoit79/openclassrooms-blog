<?php ob_start(); ?>
<p>
    Une erreur est survenue : "<?php echo $viewData['errorMessage']; ?>".<br />
    D&eacute;sol&eacute; pour la g&ecirc;ne occasion&eacute;e.
</p>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>