<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/includes/i18n_init.php';
?>

<!DOCTYPE html>
<html lang="<?= str_replace('_', '-', $locale) ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $translator->gettext('Locale Demo') ?></title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/css/bootstrap.min.css">
</head>

<body class="container">
    <?php require __DIR__ . '/includes/lang_nav.php' ?>
    <h1 class="font-weight-bold">
        <?= $translator->gettext('i18n Usage') ?>
    </h1>
    <p>
        <?= $translator->gettext('i18n usage in php web applications') ?>
    </p>
    <p>
        <?= $translator->gettext('This is other text from English') ?>
    </p>
    <p>
        <?= sprintf($translator->gettext("Welcome, %s"), $name) ?>
    </p>
    <p>
        <?= sprintf($translator->ngettext("You have %d message", "You have %d messages", $count), $count) ?></p>
    <p>
        <?= $formatter->format($pi) ?>
    </p>
    <p>
        <?= $date_formatter->format($timestamp) ?>
    </p>
    <p>
        <?= $content ?>
    </p>
    <img src="/images/stop_<?= substr($locale, 0, 2) ?>.png">

</body>

</html>