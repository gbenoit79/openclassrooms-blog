<?php if (!empty($viewData['alertSuccess'])): ?>
    <div class="alert alert-success" role="alert">
        <?php echo $viewData['alertSuccess']; ?>
    </div>
<?php endif; ?>

<?php if (!empty($viewData['alertInfo'])): ?>
    <div class="alert alert-info" role="alert">
        <?php echo $viewData['alertInfo']; ?>
    </div>
<?php endif; ?>

<?php if (!empty($viewData['alertWarning'])): ?>
    <div class="alert alert-warning" role="alert">
        <?php echo $viewData['alertWarning']; ?>
    </div>
<?php endif; ?>

<?php if (!empty($viewData['alertDanger'])): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $viewData['alertDanger']; ?>
    </div>
<?php endif; ?>