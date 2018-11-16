<h2>Utilisation des fonctions fetch dans les templates</h2>
{fetch('formation', 'comment_list', hash('as_object', true()))|attribute('show')}
<p><a href="{'/formation/home'|ezurl('no')}">Retour au menu</a></p>