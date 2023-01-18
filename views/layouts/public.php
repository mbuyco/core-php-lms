<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
    <section id="header" class="hero is-primary">
        <div class="hero-body">
            <h1 class="title"><?= $title; ?></h1>
        </div>
    </section>
    <section id="main" class="section">
        <?php include($content); ?>
    </section>
</body>
</html>
