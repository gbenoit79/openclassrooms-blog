<?php
require("views/_headerView.php");
?>

<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>

<?php
foreach ($viewData['articlesList'] as $viewData['article'])
{
    require("views/_articleShowView.php");
}
?>

<?php
require("views/_footerView.php");
?>