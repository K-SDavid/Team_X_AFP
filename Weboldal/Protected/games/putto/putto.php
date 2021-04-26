<div class="b-mezo">
	<?php for ($i=1; $i < 5; $i++): ?> 
		<input type="radio" name="bmezo"><?=$i?>		
	<?php endfor;?>
</div>
<hr class="nicehr">
<div class="a-mezo">
	<table>
		<?php 
		$counter = 1;
		for ($i=0; $i < 4; $i++): ?>
			<tr>
			<?php 
			for ($j=0; $j < 5; $j++): ?>
				<td><input type="checkbox" name="amezo"><?=$counter?></td>
				<?php $counter++; 
			endfor;?>
			</tr>
		<?php endfor; ?>
	</table>
</div>
