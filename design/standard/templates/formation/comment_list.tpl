<h2>Tous les commentaires</h2>
<p>Nombre de commentaires&nbsp;: {$count}</p>
{if $comment_list|count }
<table>
    <thead>
        <tr>
            <th>ID commentaire</th>
            <th>Commentaire</th>
            <th>Date de création</th>
        <tr>
    </thead>
    <tbody>
    {* affichage de la liste des commentaires *}
    {foreach $comment_list as $key => $comment}
        <tr>
            <td>{$comment.id}</td>
            {* lien vers la page commentaire *}
            <td><a href="{concat('formation/comment_view/', $comment.id)|ezurl('no')}">{$comment.comment}</a></td>
            <td>{$comment.created|datetime('custom', '%d/%m/%Y')}</td>
        </tr>
    {/foreach}
    </tbody>
</table>
{else}
{/if}
<p><a href="{'/formation/home'|ezurl('no')}">Retour au menu</a></p>