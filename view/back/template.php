<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="public/css/bootstrap/bootstrap.min.css" />
        <link href="public/css/style.css" rel="stylesheet" />

        <title>Administration</title>
    </head>
        
    <body>
        <header class="container">
            <h1>Administration</h1>
        </header>

        <section class="container">
            <?php echo $content; ?>
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