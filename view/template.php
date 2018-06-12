<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="public/css/bootstrap/bootstrap.min.css" />
        <!-- Website CSS -->
        <link href="public/css/style.css" rel="stylesheet" />

        <title><?php echo $viewData['title']; ?></title>
    </head>
        
    <body>
        <?php echo $content; ?>

        <script src="public/js/jquery/jquery-3.3.1.slim.min.js"></script>
        <?php if (isset($javascript)) { echo $javascript; } ?>
    </body>
</html>