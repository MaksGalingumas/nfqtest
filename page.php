<html>
    <head>
        <title>Knygynas</title>
        <link type="text/css" rel="stylesheet" href="web/bootstrap/css/bootstrap.min.css" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
    </head>
    <body>

        <div class="container">
            <div class="masthead">
                <h3 class="muted">Knygynas</h3>
            </div>
            <hr>

            <?php
                include 'core\books.php';

                $books = new Books();
                $book = $books->getSingleBook((int)$_GET['id']);
            ?>
            <hr>
            <div class="hero-unit">
                <h1><?php echo $book['title']; ?></h1>
                
                <dl class="dl-horizontal">
                    <dt>Autorius:</dt><dd><?php echo $book['author']; ?></dd>
                    <dt>Metai:</dt><dd><?php echo $book['release_date']; ?></dd>
                    <dt>Žanras:</dt><dd><?php echo $book['genre']; ?></dd>
                </dl>
                
                <p><a href="index.php" class="btn btn-primary btn-large">Atgal</a></p>
              </div>
            <div class="footer">
                <p>© Armandas Dambrauskas | NFQ Akademija 2017</p>
            </div>

        </div> <!-- /container -->
        <script src="web/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>

