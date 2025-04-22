{extends file="main.tpl"}

{block name=content}

<div class="pure-menu pure-menu-horizontal bottom-margin">
	<a href="{$conf->action_url}logout"  class="pure-menu-heading pure-menu-link">wyloguj</a>
	<span style="float:right;">użytkownik: {$user->login}, rola: {$user->role}</span>
</div>

<form action="{$conf->action_url}calcCompute" method="post" class="pure-form pure-form-aligned bottom-margin">
	<legend>Kalkulator</legend>
	<fieldset>
    	<label for="id_kwota">Kwota kredytu:</label>
            <input id="id_kwota" type="text" placeholder="kwota" name="kwota" value="{$form->kwota}">
            
            <label for="id_lata">Liczba lat:</label>
            <input id="id_lata" type="text" placeholder="lata" name="lata" value="{$form->lata}">
            
            <label for="id_oprocentowanie">Oprocentowanie:</label>
            <input id="id_oprocentowanie" type="text" placeholder="oprocentowanie" name="oprocentowanie" value="{$form->oprocentowanie}">	
	</fieldset>
	<button type="submit" class="pure-button pure-button-primary">Oblicz</button>
</form>	

{include file='messages.tpl'}

{if isset($res->result)}
<div class="messages info">
	Wynik: {$res->result}
</div>
{/if}

{/block}