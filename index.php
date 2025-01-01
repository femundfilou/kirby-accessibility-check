<?php

use Kirby\Cms\App;

App::plugin('femundfilou/kirby-accessibility-check', [
    'options' => [
        'enabled' => false
    ],
    'hooks' => [
        'page.render:after' => function (string $contentType, array $data, string $html, Kirby\Cms\Page $page) {
            if ($contentType === 'html') {
                $snippet = snippet('accessibility-check/accessibility-check', [], true);
                $html = str_replace('</head>', $snippet, $html) . '</head>';
            }
            return $html;
        }
    ],
    'api' => [
        'routes' => [
            [
                'pattern' => 'accessibility-check/status',
                'method' => 'GET',
                'action' => function () {
                    $session = kirby()->session();
                    $current = $session->get('accessibility-check-enabled', false);
                    return ['status' => 'success', 'mode' => $current];
                }
            ],
            [
                'pattern' => 'accessibility-check/toggle',
                'method' => 'POST',
                'action' => function () {
                    $session = kirby()->session();
                    $current = $session->get('accessibility-check-enabled', false);
                    $session->set('accessibility-check-enabled', !$current);
                    return ['status' => 'success', 'mode' => !$current];
                }
            ]
        ]
    ],
    'snippets' => [
        'accessibility-check/accessibility-check' => __DIR__ . '/snippets/accessibility-check.php',
        'accessibility-check/providers/sa11y' => __DIR__ . '/snippets/providers/sa11y.php'
    ],
    'translations' => [
        'en' => [
            "femundfilou.accessibility-check.buttons.enable" => "Enable",
            "femundfilou.accessibility-check.buttons.disable" => "Disable",
            "femundfilou.accessibility-check.buttons.open" => "Open",
            "femundfilou.accessibility-check.buttons.toggle" => "Check accessibility"
        ],
        'de' => [
            "femundfilou.accessibility-check.buttons.enable" => "Aktivieren",
            "femundfilou.accessibility-check.buttons.disable" => "Deaktivieren",
            "femundfilou.accessibility-check.buttons.open" => "Öffnen",
            "femundfilou.accessibility-check.buttons.toggle" => "Barrierefreiheit prüfen"
        ]
    ]
]);
