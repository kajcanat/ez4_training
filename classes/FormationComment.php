<?php
/** @author  Justin Canat <justin.canat@onisep.fr> */

/**
 * mettre à jour le tableau autoloads avec php bin/php/ezpgenerateautoloads.php -e -p
 * Class FormationComment
 */
class FormationComment extends eZPersistentObject
{
    protected $id;
    protected $userId;
    protected $created;
    protected $comment;

    /**
     * FormationComment constructor.
     * @param array $row Hash of attributes
     */
    public function __construct($row)
    {
        parent::__construct( $row );
    }

    /**
     * @link https://doc.ez.no/eZ-Publish/Technical-manual/4.x/Concepts-and-basics/Content-management/Datatypes
     * @link https://doc.ez.no/eZ-Publish/Technical-manual/4.x/Concepts-and-basics/Content-management/Class-attributes
     * @return array Hash de la table de définition pour l'objet persistent
     */
    public static function definition()
    {
        return [
            'fields' => [
                // attributs
                'id' => [
                    'name' => 'ID', // nom de l'attribut
                    'datatype' => 'integer', // type
                    'default' => 0, // valeur par défaut
                    'required' => true // obligatoire
                ],
                'user_id' => [
                    'name' => 'UserID',
                    'datatype' => 'integer',
                    'default' => 0,
                    'required' => true
                ],
                'created' => [
                    'name' => 'Created',
                    'datatype' => 'integer',
                    'default' => 0,
                    'required' => true
                ],
                'comment' => [
                    'name' => 'Comment',
                    'datatype' => 'string',
                    'default' => 0,
                    'required' => true
                ]
            ],
            'keys' => ['id'],
            'function_attributes' => ['user_object' => 'getUserObject'],
            'increment_key' => 'id',
            'class_name' => 'FormationComment',
            'name' => 'formation_comment'
        ];
    }

    /**
     * @param bool $asObject
     * @return array|eZPersistentObject|null
     */
    public function getUserObject( $asObject = true)
    {
        $userId = $this->attribute('user_id');
        $user = eZUser::fetch($userId, $asObject);

        return $user;
    }

    /**
     * Instancie un objet de type FormationComment
     * @param $user_id
     * @param $comment
     * @return FormationComment
     */
    public static function create($user_id, $comment)
    {
        $row = [
            'id' => null,
            'user_id' => $user_id,
            'comment' => $comment,
            'created' => time()
        ];

        return new self($row);
    }

    /**
     * Récupère l'object en utilisant l'ID
     * @link http://pubsvn.ez.no/doxygen/4.4/html/classeZPersistentObject.html
     *
     * @param $id
     * @param bool $asObject
     * @return array|bool|eZPersistentObject|null
     */
    public static function fetchByID($id, $asObject = true)
    {
        $result = eZPersistentObject::fetchObject(
            self::definition(),
            null,
            ['id' => $id],
            $asObject,
            null,
            null
        );
        if ($result instanceof FormationComment) {
            return $result;
        } else {
            return false;
        }
    }

    /**
     * Récupère tous les contenus comment comme objet ou tableau

     * @param bool $asObject
     * @return array|eZPersistentObject[]|null
     */
    public static function fetchList($asObject = true)
    {
        return eZPersistentObject::fetchObjectList(self::definition(), null, null, null, null,$asObject, false, null);
    }

    /**
     * compter le nombre de commentaires
     * @return int
     */
    public function getListCount()
    {
        return eZPersistentObject::count(self::definition());
    }


    /**
     * Compter le nombre de commentaires en utilisant la requête native
     * @return mixed
     */
    public static function getCount()
    {
        /**
         * instancie un objet eZDB
         * @var eZDB
         */
        $db = eZDB::instance();
        $query = 'SELECT count(id) AS comment_count FROM formation_comment';
        $rows = $db->arrayQuery($query);
        return isset($rows[0]['comment_count']) ? $rows[0]['comment_count'] : null;
    }
}