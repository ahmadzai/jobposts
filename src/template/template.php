<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title??"Home" ?></title>

    <link href="<?php echo \JobPosts\bin\Asset::attach("css/bootstrap.min.css")?>"
          rel="stylesheet" />
    <link href="<?php echo \JobPosts\bin\Asset::attach("css/footer.css")?>"
          rel="stylesheet" />
</head>
<body>
    <header>
        <?php include 'shared/navigation.php'?>
    </header>
    <main role="main" class="container">
        <?php echo $content??''; ?>
    </main>

    <footer>

    </footer>

    <script src="<?php echo \JobPosts\bin\Asset::attach("js/jquery-3.3.1.slim.min.js")?>"></script>
    <script src="<?php echo \JobPosts\bin\Asset::attach("js/popper.min.js")?>"></script>
    <script src="<?php echo \JobPosts\bin\Asset::attach("js/bootstrap.min.js")?>"></script>
</body>
</html>