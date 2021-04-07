<?php 
require_once USER_MANAGER;
if (!CheckLogin()):
	header("Location: index.php?P=denied");
else:
	//Bet($_SESSION['uid'], 5);
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['bet'])) {
		foreach ($_POST['check'] as $c) {
			echo $c.' ';
		}
	}
?>
	<form method="POST">
		<table border="2px">
	        <tr>
	        <?php for ($i=1; $i < 91; $i++): ?>
                <td><?=$i?><input type="checkbox" name="check[]" value="<?=$i?>"></td>
                <?php if($i % 10 == 0) : ?>
                    </tr><tr>
                <?php endif; ?>
	        <?php endfor; ?>
	        </tr>
	    </table>
	    <input type="submit" name="bet" value="Ötöslottó leadás">
	</form>
<?php endif; ?>