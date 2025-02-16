<?php
$user = $kirby->user();
$panelLanguage = $user->language() ?? 'en';

// Map panel languages to sa11y languages
$langMap = [
    'bg' => 'bg',
    'cs' => 'cs',
    'da' => 'da',
    'de' => 'de',
    'el' => 'el',
    'en' => 'en',
    'es_419' => 'es',
    'es_ES' => 'es',
    'fi' => 'fi',
    'fr' => 'fr',
    'hu' => 'hu',
    'id' => 'id',
    'it' => 'it',
    'ko' => 'ko',
    'lt' => 'lt',
    'nb' => 'nb',
    'nl' => 'nl',
    'pl' => 'pl',
    'pt_BR' => 'ptBR',
    'pt_PT' => 'ptPT',
    'ro' => 'ro',
    'sk' => 'sk',
    'sv_SE' => 'sv',
    'tr' => 'tr'
];

$lang = $langMap[$panelLanguage] ?? 'en';

?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ryersondmp/sa11y@latest/dist/css/sa11y.min.css" />
<script src="https://cdn.jsdelivr.net/combine/gh/ryersondmp/sa11y@latest/dist/js/lang/<?= $lang ?>.umd.js,gh/ryersondmp/sa11y@latest/dist/js/sa11y.umd.min.js"></script>
<script>
    Sa11y.Lang.addI18n(Sa11yLang<?= ucfirst($lang) ?>.strings);
    const sa11y = new Sa11y.Sa11y({
        checkRoot: "body",
    });
</script>