<nav id="admin-nav" class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item<?php if ((!isset($_REQUEST['controller']) && !isset($_REQUEST['action'])) || ((isset($_REQUEST['controller']) && $_REQUEST['controller'] === 'post') && (isset($_REQUEST['action']) && $_REQUEST['action'] === 'list')) ) { echo ' active'; } ?>">
                <a class="nav-link" href="admin.php?controller=post&amp;action=list">G&eacute;rer les billets</a>
            </li>
            <li class="nav-item<?php if ((isset($_REQUEST['controller']) && $_REQUEST['controller'] === 'post') && (isset($_REQUEST['action']) && $_REQUEST['action'] === 'create')) { echo ' active'; } ?>">
                <a class="nav-link" href="admin.php?controller=post&amp;action=create">Cr&eacute;er un billet</a>
            </li>
            <li class="nav-item<?php if ((isset($_REQUEST['controller']) && $_REQUEST['controller'] === 'comment') && (isset($_REQUEST['action']) && $_REQUEST['action'] === 'list')) { echo ' active'; } ?>">
                <a class="nav-link" href="admin.php?controller=comment&amp;action=list">Mod&eacute;rer les commentaires</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=user&amp;action=logout">Se d&eacute;connecter</a>
            </li>
        </ul>
    </div>
</nav>