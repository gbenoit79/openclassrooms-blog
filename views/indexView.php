<?php
require("views/_headerView.php");
?>

<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>

<?php
foreach ($viewData['postsList'] as $viewData['post']) {
    require("views/_postShowView.php");
}
?>

<?php
require("views/_footerView.php");
?>