<?php
/**
 * Instancier eZTemplate
 * @var eZTemplate
 */
$tpl = eZTemplate::factory();
$Result = [];
$Result['content'] = &$tpl->fetch('design:formation/fetch_comment_list.tpl');
?>