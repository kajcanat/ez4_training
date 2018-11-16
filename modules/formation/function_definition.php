<?php
/**
 * @author Justin Canat <justin.canat@onisep.fr>
 */
$FunctionList = [];
// {fetch('formation', 'comment_list', hash('as_object', true()))}
$FunctionList['comment_list'] = [
    'name' => 'comment_list',
    'operation_types' => ['read'],
    'call_method' => [
        'class' => 'eZFormationFunctionCollection',
        'method' => 'fetchCommentList'
    ],
    'parameter_type' => 'standard',
    'parameters' => [
        [
            'name' => 'as_object',
            'type' => 'integer',
            'required' => true
        ]
    ]
];

?>