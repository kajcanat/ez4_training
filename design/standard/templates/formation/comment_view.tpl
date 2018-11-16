{if is_set($id)|not }
Pas de commentaire
{else}
<h2>Commentaire N°{$id}</h2>
<p>{$$body}</p>
<p>écrit par {$author} le {$creation_date|datetime('custom', '%d/%m/%Y')} à {$creation_date|datetime('custom', '%H:%i:%s')}</p>
{/if}
<p><a href="{'/formation/comment_list'|ezurl('no')}">Retour à la liste</a></p>