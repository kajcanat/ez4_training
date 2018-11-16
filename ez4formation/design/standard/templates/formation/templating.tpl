{* templating.tpl /ez4formation/design/standard/templates/formation/templating.tpl*}
{* déboguer le tableau $view_parameters *}
{$view_parameters|attribute('show')} <br>

<h1>Liste d'articles</h1>
{* on affiche la liste d'articles en utilisant foreach *}
{if is_set($article_list)}
    <ul>
        <li>
        {foreach $article_list as $index => $title}
            {*incrémenter l'index*}
            <li>Article n°{$index|inc(1)}: {$title}</li>
        {/foreach}
        </li>
    </ul>
{else}
    <p>Pas d'article</p>
{/if}
<p><a href="{'/formation/home'|ezurl('no')}">Retour au menu</a></p>