<?php

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

$link_data = $i18n->getLinkData(['en' => 'English', 'es' => 'Español']);
setcookie('locale', $locale, time() + 60 * 60 * 24 * 15, '/');
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

$timestamp = strtotime('21 September 1992');

$date_formatter = new IntlDateFormatter($locale, null, null);
$date_formatter->setPattern('EEE, d MMM Y');

$filename = "content/body.$locale.md";

if (is_readable($filename)) {
    $parser = new Parsedown;
    $content = file_get_contents($filename);
    $content = $parser->text($content);
} else {
    $content = "Content for $locale not found";
}