<?php 
require_once USER_MANAGER;
if (!CheckLogin()):
	header("Location: index.php?P=denied");
else:
	//Bet($_SESSION['uid'], 5);
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