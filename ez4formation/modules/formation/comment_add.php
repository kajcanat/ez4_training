<?php
// formation/comment_add.php - fonctionnalité de la création d'une commentaire

$Module = $Params['Module'];

/**
 * On accède à la variable globale GET/POST grâce eZHTTPTool
 * @var eZHTTPTool
 */
$http = eZHTTPTool::instance();

$comment = '';
// on récupère la valeur de la variable comment si présente dans GET/POST
if ($http->hasVariable('term')) {
    $comment = $http->variable('term');
}
if ('' != $comment) {
    /**
     * Récupère l'ID de l'utilisateur actuel
     * @var int $userId
     */
    $userId = eZUser::currentUserID();
    // instancie un objet
    $formationComment = FormationComment::create($userId, $comment);
    eZDebug::writeDebug('1.'.print_r($formationComment, true), 'FormationComment avant la sauvegarde: ID est null');
    // sauvegarde l'objet
    $formationComment->store();
    eZDebug::writeDebug('2.'.print_r($formationComment, true), 'FormationComment après la sauvegarde: ID est un entier');

    $message = 'Vous avez ajouté le commentaire suivant : '.$comment;

} else {
    $message = 'Veuillez fournir votre commentaire';
}

/**
 * Instancier eZTemplate
 * @var eZTemplate
 */
$tpl = eZTemplate::factory();
$tpl->setVariable('message', $message);

// logs
eZDebug::writeNotice($comment, 'ez4formation:formation/comment.php');
eZDebug::writeError($comment, 'ez4formation:formation/comment.php');
eZDebug::writeDebug($comment, 'ez4formation:formation/comment.php');
eZDebug::writeWarning($comment, 'ez4formation:formation/comment.php');

//logguer dans le fichier var/log/ez4formation_formation.log
eZLog::write($comment, 'ez4formation_formation.log', 'var/log');

$Result = [];
$Result['content'] = &$tpl->fetch('design:formation/form/comment.tpl');
$Result['path'] = [
  [
      'url' => 'formation/list',
      'text' => 'Liste'
  ],
  [
      'url' => false,
      'text' => 'create'
  ]
];
?>