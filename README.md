# Formation EZ 4

Créer un module formation
## Introduction
* Un contenu est une information organisée et stockée dans une structure
* Une classe de contenu est un contenu avec des propriétés (attributs). Elle est également appelée type de contenu.
* Un objet est une instance d'une classe de contenu
* Un noeud de contenu est un emplacement dans l'arbre des noeuds. Chaque objet est encapsulé dans un noeud.
* L'arbre des noeuds de contenu est un arbre divisé en trois branches pricipales
  * branche de contenu
  * branche de médias
  * branche d'utilisateurs 
* eZ Publish est constitué 
  * Kernel (core)
  * modules (content, user, search,...)
  * librairies
## Développer une extension eZ publish 4
Une extension permet d'ajouter une nouvelle fonctionnalité dans eZ Publish.

### Installation
* activer l'extension dans le fichier settings/override/site.ini.append.php
```php
<?php
/*  #?ini charset="utf-8"?
[ExtensionSettings]
ActiveExtensions[]=ez4formation
*/
?>
```

### Cache
* vider le cache en ligne de commande
```
$ ez_console c:c
```
* vider le cache en BO
  * http://admin-CODENAME.onisep.fr:8000/setup/cache
### Débogage
* désactiver le mise en cache de template dans le fichier settings/override/site.ini.append.php afin de visualiser les modifications
```
[DebugSettings]
DebugInline=inline
DebugOutput=enabled
DebugRedirection=disabled

[ExtensionSettings]
ActiveExtensions[]=ez4formation

[TemplateSettings]
DevelopmentMode=enabled
ShowUsedTemplates=enabled
ShowXHTMLCode=disabled
TemplateCache=disabled
```
* on débogue la variable $view_parameters en utilisant la méthode suivante
```
{$view_parameters|attribute('show')}
```
### Modules et vues
* créer des vues avec paramètres
* Lorsque le client accède à une page web, il intéragit avec un des modules d'eZ Publish
* L'URL de base est construite de la manière suivante:
  * /module/vue/paramètres e.g /formation/list

* L'URL est composée de deux types de paramètres
  * paramètres ordonnées : /module/vue/valeur1/valeur2
  * paramètres désordonnées: /module/vue/paramètre4/valeur4/paramètre3/valeur3

#### URLs
| Chemin | Description |
| --- | --- |
| http://www-CODENAME.onisep.fr:8080/formation/home| page d'accueil de l'extension|
| http://www-CODENAME.onisep.fr:8080/formation/url_structure/123/str/parameter4/lognes/parameter3/onisep | vue de la structure de l'URL avec des paramètres et dumper une variable dans le template|
| http://www-CODENAME.onisep.fr:8080/formation/templating/123/str/parameter4/lognes/parameter3/onisep| utilisation des templates|
| http://www-CODENAME.onisep.fr:8080/formation/comment_add| formulaire pour ajouter des commentaires|
| http://www-CODENAME.onisep.fr:8080/formation/comment_view/id| voir un commentaire|
| http://www-CODENAME.onisep.fr:8080/formation/comment_list| liste de commentaires|

### Structure de l'extension
| dossier | Description | chemin
| --- | --- | --- |
| design | templates, feuilles de style, image, js | /design
| modules | un ou plusieurs modules avec les vues, opérateurs de templates | /modules/formation
| settings | Fichiers de configuration ini | /settings

### Association entre module et URL
* créer la structure de l'extension
* créer le fichier de configuration module.ini.append.php dans le dossier settings
* créer le fichier module.php dans le dossier modules/formation
    * On déclare la vue /formation/home dans le tableau $ViewList du fichier module.php
    ```php
    <?php
    $ViewList['home'] = [
        'script' => 'home.php',
        'functions' => ['read'],
        'params' => [],
        'unordered_params' => []
    ];
    ?>
    ```
    * on crée également le fichier de traitement home.php de la page d'accueil

### Utilisation des templates
* En déclarant l'extension design dans le fichier ez4formation/settings/design.ini.append.php,
eZ Publish peut utliliser les templates
```
[ExtensionSettings]
DesignExtensions[]=ez4formation
```
* créer la vue templating dans module.php
* créer le fichier templating.tpl dans le dossier /design/standard/templates/formation
* voir le fichier templating.php
* vider le cache
* En désactivant la mise en cache des templates, cela évite de vider le cache à chaque modification

### Formulaire
* créer la vue "comment_add" dans le fichier module.php
* le formulaire doit permettre d'ajouter un commentaire
* le formulaire comporte un champ de texte et un button de validation 
* eZHTTPTool permet d'accéder aux variables globales GET/POST dans le fichier comment_add.php
* eZTemplate permet de parser et récupérer le template comment_add.tpl et assigner des variables

### Logs
* voir le fichier comment_add.php
* eZLog permet d'ajouter les logs
* Les logs de l'ez4 se trouvent dans le dossier /www/onisepweb/ezpublish_legacy/var/log 
* visualiser le log avec la commande suivante
```
tail -f /www/onisepweb/ezpublish_legacy/var/log
```
### Manipulation de la BDD
* ajouter un commentaire grâce à la classe FormationComment 
    * Créer la table `formation_comment` à partir du fichier ez4formation/sql/mysql/schema.sql
        ```
        cd ~/www/onisep/ezpublish_legacy
        $ mysql -h127.0.0.1 -P3307 -uroot -p onisep2 < ./extension/ez4formation/sql/mysql/schema.sql
        ```
    * On définit la classe FormationComment qui hérite eZPersistentObject 
    * eZPersistentObject permet de stocker un objet dans la BDD grace à la méthode 
        ```
            eZPersistentObject::store
        ```
    * Il faut regénérer le tableau autoloads afin d'utiliser la classe FormationContent
        ```
        cd ~/www/onisepweb/ezpublish_legacy/bin/php
        $ php bin/php/ezpgenerateautoloads.php -e -p
        ```
    * voir l'ajout d'un commentaire dans le fichier comment_add.php
* voir l'affchage de la liste des commentaires dans le fichier comment_list.php
* voir l'affichage d'un commentaire dans le fichier comment_view.php
* créer une requête SQL native e.g FormationComment::getCount
### Utilisation des fonctions fetch dans les templates