<?php 
require_once CARD_MANAGER;
$cards = ListCard($_SESSION['uid']);
if(	!CheckCard($_SESSION['uid'])):
	echo "Nincs kártya hozzáadva";
else:

?>

<div class="depositform">
	Válassza ki melyik kártyával szeretne fizetni:	
	<select name="amount">
		<?php foreach($cards as $c): ?>
			<option value="<?=$c['id']?>"><?=$c['cardnumber']?></option>
		<?php endforeach; ?>
	</select>
</div>
<?php  endif; ?> 