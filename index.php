<?php
require __DIR__ . '/vendor/autoload.php';

use App\I18n;
use PhpMyAdmin\MoTranslator\Loader;
use PhpMyAdmin\MoTranslator\Translator;

$i18n = new I18n(['en_GB', 'es']);

$lang = $_GET['lang'];
$locale = $i18n->getBestMatch($lang);
if ($locale === null) {
    $locale = $i18n->getLocaleForRedirect();
    $language = substr($locale, 0, 2);
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/$language/");
    exit;
}

// Load compatibility layer
// Loader::loadFunctions();
// _setlocale(LC_ALL, $locale);
// $domain = 'messages';
// _textdomain($domain);
// _bindtextdomain($domain, __DIR__ . '/locales/');
// _bind_textdomain_codeset($domain, 'UTF-8');

// Directly load the mo file
$translator = new Translator("locales/$locale/LC_MESSAGES/messages.mo");
$name = 'Gopibabu';
$count = 1;
$pi = 3.14159;

$formatter = new NumberFormatter($locale, NumberFormatter::DECIMAL);
$formatter->setAttribute(NumberFormatter::FRACTION_DIGITS, 5);
?>
<!DOCTYPE html>
<html lang="<?= str_replace('_', '-', $locale) ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $translator->gettext('Locale Demo') ?></title>
</head>

<body>
    <h1><?= $translator->gettext('i18n Usage') ?></h1>
    <p><?= $translator->gettext('i18n usage in php web applications') ?></p>
    <p><?= $translator->gettext('This is other text from English') ?></p>
    <p><?= sprintf($translator->gettext("Welcome, %s"), $name) ?></p>
    <p><?= sprintf($translator->ngettext("You have %d message", "You have %d messages", $count), $count) ?></p>
    <p><?= $formatter->format($pi) ?></p>
</body>

</html>