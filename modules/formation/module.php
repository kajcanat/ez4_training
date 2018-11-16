<?php
// Configuration de la vue /formation/list
// nom du module
$Module = [
    'name' => 'Module de formation'
];

$ViewList = [];

$ViewList['home'] = [
    'script' => 'home.php',
    'functions' => ['read'],
    'params' => [],
    'unordered_params' => []
];
// nouvelle page formation/url_structure avec paramètres
// http://.../formation/list/$Params['FirstParameter']/$Params['SecondParameter']/parameter4/$Params['FourthParameter']/parameter3/$Params['ThirdParameter']
$ViewList['url_structure'] = [
    'script' => 'url_structure.php',
    'functions' => ['read'],
    'params' => ['FirstParameter', 'SecondParameter'],// les noms des paramètres ordonnées de l'URL
    'unordered_params' => ['parameter3' => 'ThirdParameter', 'parameter4' => 'FourthParameter']// les noms des paramètres désordonnées de l'URL
];

$ViewList['templating'] = [
    'script' => 'templating.php',
    'functions' => ['read'],
    'params' => ['FirstParameter', 'SecondParameter'],// les noms des paramètres ordonnées de l'URL
    'unordered_params' => ['parameter3' => 'ThirdParameter', 'parameter4' => 'FourthParameter']// les noms des paramètres désordonnées de l'URL
];
$ViewList['comment_add'] = [
    'script' => 'comment_add.php',
    'functions' => ['create'],
    'params' => [],
    'unordered_params' => []
];
$ViewList['comment_view'] = [
    'script' => 'comment_view.php',
    'functions' => ['read'],
    'params' => ['commentID'],
    'unordered_params' => []
];
$ViewList['comment_list'] = [
    'script' => 'comment_list.php',
    'functions' => ['read'],
    'params' => [],
    'unordered_params' => []
];

$ViewList['fetch_comment_list'] = [
    'script' => 'fetch_comment_list.php',
    'functions' => ['read'],
    'params' => [],
    'unordered_params' => []
];

//
$FunctionList = [];
$FunctionList['read'] = [];
$FunctionList['create'] = [];
?>