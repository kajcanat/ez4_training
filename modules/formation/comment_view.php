<?php
$commentID = $Params['commentID'];
$author = null;
$id = null;
$body = null;
$createDate = null;
if ($commentID) {
    $comment = FormationComment::fetchByID($commentID);
    if ($comment instanceof FormationComment) {
        /**
         * accède à la colonne id de la table formation_comment
         * @var int
         */
        $id = $comment->attribute('id');
        $commentAuthorObject = $comment->attribute('user_object');
        $author = $commentAuthorObject->attribute('login');
        $body = $comment->attribute('comment');
        $createDate = $comment->attribute('created');
    }
}
/**
 * Instancier eZTemplate
 * @var eZTemplate
 */
$tpl = eZTemplate::factory();
$tpl->setVariable('id', $id);
$tpl->setVariable('body', $body);
$tpl->setVariable('author', $author);
$tpl->setVariable('creation_date', $createDate);


$Result = [];
$Result['content'] = &$tpl->fetch('design:formation/comment_view.tpl');
?>