<?php 
require_once USER_MANAGER;
if (!CheckLogin()):
	header("Location: index.php?P=denied");
else:
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['bet'])) {
		if (empty($_POST['check'])) {
			echo "Kérjük jelöljön ki 5 db lottószámot!";
		} else if (count($_POST['check']) != 5) {
			echo "Csak öt szám megjelölésével lehet játszani!";
		} else {
			require_once 'lottomanager.php';
			if(!AddLotto($_SESSION['uid'], $_POST['check']['0'], $_POST['check']['1'], $_POST['check']['2'], $_POST['check']['3'], $_POST['check']['4'])) {
				echo "Az ötöslottó leadása sikertelen!";
			}
		}
	}
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['back'])) {
		header("Location: index.php?P=lotto");
	}
?>
	<form method="POST">
		<input type="submit" name="back" value="Vissza">
	</form>
	<form method="POST" class="lottoform">
		<table border="2px" class="lottotable">
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