<?php

/**
 * Instancier eZTemplate
 * @var eZTemplate
 */
$tpl = eZTemplate::factory();

// on récupère les paramètres ordonnées
$firstParameterValue = $Params['FirstParameter'];
$secondParameterValue =  $Params['SecondParameter'];
// on récupère les paramètres désordonnées
$ThirdParameterValue = $Params['ThirdParameter'];
$FourthParameter = $Params['FourthParameter'];

// on crée un tableau de paramètres qui sera utilisé dans le template
$viewParameters = [
    'parameter1' => $firstParameterValue,
    'parameter2' => $secondParameterValue,
    'unordered_parameter1' => $ThirdParameterValue,
    'unordered_parameter2' => $FourthParameter
];
// liste d'articles
$articleList = [
    'Le TNS, un symbole de décentralisation culturelle réussie',
    'L’éco-responsabilité, un enjeu pour les festivals de demain',
    'Une grande diversité de métiers fait vivre l\'écosystème de la mode'
];
// on assigne le tableau $viewParameters dans la variable view_parameter du template
$tpl->setVariable('view_parameters', $viewParameters);
// on assigne la liste d'articles dans $article_list
$tpl->setVariable('article_list', $articleList);

// on récupère le contenu template
$content = $tpl->fetch('design:formation/templating.tpl');
// on assigne le contenu dans $module_result.content
$Result['content'] = $content;
?>