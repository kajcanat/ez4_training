<?php
class eZFormationFunctionCollection
{
    /**
     * Fetch comment list
     * Used by fetch('formation', 'comment_list', hash('as_object', true()))
     * @param $asObject
     * @return array
     */
    public static function fetchCommentList($asObject)
    {
        return [
            'result' => FormationComment::fetchList($asObject)
        ];
    }
}