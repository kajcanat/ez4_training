<?php
$commentList = FormationComment::fetchList();
$count = FormationComment::getListCount();
$count2 = FormationComment::getCount();
/**
 * Instancier eZTemplate
 * @var eZTemplate
 */
$tpl = eZTemplate::factory();
$tpl->setVariable('comment_list', $commentList);
$tpl->setVariable('count', $count);
$Result = [];
$Result['content'] = &$tpl->fetch('design:formation/comment_list.tpl');
?>