<?php
if (option('femundfilou.kirby-accessibility-check.enabled') !== true) return;
$session = $kirby->session();

if ($session->get('accessibility-check-enabled', false)):
?>
    <?php snippet('accessibility-check/providers/sa11y'); ?>
<?php endif; ?>
