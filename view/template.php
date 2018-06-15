<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="public/css/bootstrap/bootstrap.min.css" />
        <link href="public/css/style.css" rel="stylesheet" />

        <title><?php echo $viewData['title']; ?></title>
    </head>
        
    <body>
        <header class="container">
            <h1><?php echo $viewData['title']; ?></h1>
        </header>

        <section class="container">
            <div class="row">
                <div class="col-sm-8">
                    <?php echo $content; ?>
                </div>
                <div class="col-sm-3 offset-sm-1 blog-sidebar">
                    <div class="sidebar-module sidebar-module-inset">
                        <h4>A propos</h4>
                        <p>Jean Forteroche est acteur et écrivain. Il travaille actuellement sur son prochain roman, <em>"Billet simple pour l'Alaska"</em>.</p>
                    </div>
                    <div class="sidebar-module">
                        <h4>Précommander le livre</h4>
                        <ol class="list-unstyled">
                            <li><a href="https://www.amazon.fr">Amazon</a></li>
                            <li><a href="https://www.cultura.com">Cultura</a></li>
                            <li><a href="https://www.fnac.com">Fnac</a></li>
                        </ol>
                    </div>
                    <div class="sidebar-module">
                        <h4>Connexion</h4>
                        <a href="admin.php">Se connecter</a>
                    </div>
                </div>
            </div>
        </section>
        
        <footer class="container">
            <p>
                &copy; Jean Forteroche
            </p>
        </footer>

        <script src="public/js/jquery/jquery-3.3.1.slim.min.js"></script>
        <?php if (isset($javascript)) { echo $javascript; } ?>
    </body>
</html>