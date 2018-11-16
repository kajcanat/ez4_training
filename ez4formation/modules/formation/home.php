<?php
/**
 * Instancier eZTemplate
 * @var eZTemplate
 */
$tpl = eZTemplate::factory();

$Result = [];
$Result['content'] = &$tpl->fetch('design:formation/home.tpl');
?>