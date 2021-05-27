<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Asset/css/default.css" id="themeChanger">
    <link rel="stylesheet" href="Asset/css/theme.css">
    <script src="https://kit.fontawesome.com/10b102adea.js" crossorigin="anonymous"></script>
    <title><?= $title ?></title>
</head>
<body>
    <div id="achievement">
        <p id="congrats">Félicitation, vous avez débloqué</p>
        <p id="unlock"></p>
    </div>
    <div id="neonBar"></div>

    <?= $html ?>

    <script src="/Asset/js/default.js"></script>
    <script src="/Asset/js/achievements.js" type="module"></script>
    <script src="/Asset/js/easterEgg.js" type="module"></script>
</body>
</html>