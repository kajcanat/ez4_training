{* form.tpl formulaire pour enregistrer les commentaires *}
<form action="{'formation/comment_add'|ezurl('no')}" method="get">
    Votre commentaire&nbsp;: <br>
    <textarea name="term" size="150" maxlength="150" cols="50" rows="8"></textarea><br>
    <input type="submit" value="Valider">
</form>
<p>
{$message}
</p>
<p><a href="{'/formation/home'|ezurl('no')}">Retour au menu</a></p>