<?php

/****************************** Required Files */
require_once(__DIR__ . '/inc/functions/cyn-theme-init.php');
require_once(__DIR__ . '/inc/functions/cyn-register.php');
require_once(__DIR__ . '/inc/functions/cyn-customize.php');
require_once(__DIR__ . '/inc/functions/cyn-acf.php');
require_once(__DIR__ . '/inc/functions/cyn-general.php');
require_once(__DIR__ . '/inc/functions/cyn-form.php');
require_once(__DIR__ . '/inc/classes/cyn-metabox.php');
require_once (__DIR__ . '/inc/functions/cyn-acf-fields.php');
require_once (__DIR__ . '/inc/functions/cyn-query.php');
new cyn_meta_box();


/****************************** Update Checker */
require(__DIR__ . '/inc/plugin-update-checker/plugin-update-checker.php');

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$updateChecker = PucFactory::buildUpdateChecker(
  'https://github.com/cyandm/eurotech.git',
  __FILE__,
  'eurotech'
);
$updateChecker->setBranch('main');
$updateChecker->setAuthentication('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');
 

                                                                                     