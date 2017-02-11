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

            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Pavadinimas</th>
                        <th>Metai</th>
                        <th>Autorius</th>
                        <th>Žanras</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                    include 'core\books.php';

                    if (isset($_GET['page'])) {
                        $page = (int)$_GET['page'];
                        if (empty($page)) {
                            $page = 1;
                        } 
                    } else {
                        $page = 1;
                    }
                    
                    $books = new Books();
                    $list = $books->getBooks($page);
                    
                    foreach ($list as $book) {
                    ?>
                    <tr>
                        <td>
                            <a href="page.php?id=<?php echo $book['id']; ?>">
                                <?php echo $book['title']; ?>
                            </a>
                        </td>
                        <td><?php echo $book['release_date']; ?></td>
                        <td><?php echo $book['author']; ?></td>
                        <td><?php echo $book['genre']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">
                    <?php
                        $pages = $books->getPageCount();
                        
                        for ($i = 1; $i <= $pages; $i++) {
                    ?>
                    <a class="btn btn-mini" href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    <?php } ?>
                        </td>
                    </tr>
                </tfoot>
            </table>
            <hr>

            <div class="footer">
                <p>© Armandas Dambrauskas | NFQ Akademija 2017</p>
            </div>

        </div> <!-- /container -->
        <script src="web/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>

