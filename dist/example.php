<!doctype html>
<html lang="en">
<head>

    <title>Amirite Embed Demo</title>

    <meta name="viewport"
          content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, viewport-fit=cover">

    <style type="text/css">
    body {
        background: grey;
        margin: 0;
        padding: 10px;
    }

    #demo {
        max-width: 600px;
        margin: auto;
    }
    </style>
    <link rel="stylesheet" href="/amirite-embed/amirite-embed.min.css"/>

</head>
<body>

<div id="demo">
    <?php

    require __DIR__.'/../vendor/autoload.php';

    ini_set('display_errors', 1);

    $guzzle = new \GuzzleHttp\Client();
    $amirite = new \AmiriteEmbed\AmiriteClient($guzzle);
    $post = $amirite->getPost();
    echo $post->render('https://www.amirite.com/');

    ?>
</div>

</body>
</html>
