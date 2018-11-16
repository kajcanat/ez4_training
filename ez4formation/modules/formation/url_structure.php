<?php
//formation/list.php Fonctionnalité de la vue
// current object eZModule
$Module = $Params['Module'];
// on récupère les paramètres ordonnées
$firstParameterValue = $Params['FirstParameter'];
$secondParameterValue =  $Params['SecondParameter'];
var_dump([
    $firstParameterValue,
    $secondParameterValue
]);
// on récupère les paramètres désordonnées
$ThirdParameterValue = $Params['ThirdParameter'];
$FourthParameter = $Params['FourthParameter'];
var_dump([
    $ThirdParameterValue,
    $FourthParameter
]);
?>