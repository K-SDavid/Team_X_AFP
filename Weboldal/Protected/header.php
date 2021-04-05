<div class="loginerror">
<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $postData = [
    	'username' => $_POST['username'],
    	'password' => $_POST['password']
  	];

	if(empty($postData['username']) || empty($postData['password'])) {
	    echo "Hiányzó adat(ok)!";
	}else if(!UserLogin($postData['username'], $postData['password'])) {
	    echo "Hibás felhasználónév vagy jelszó!";
	}

	$postData['password'] = "";
}?>
</div>
<?php	if(CheckLogin()): ?>
	<div class="details">
    	<div class="moneybefore"><input type="text" name="moneybefore" value="€" readonly="true"></div>
    	<div class="money"><input type="text" name="money" value="<?=$_SESSION['balance']?>" readonly="true"></div>
    	<div class="xcoinbefore"><input type="text" name="xcoinbefore" value="X" readonly="true"></div>
    	<div class="xcoin"><input type="text" name="xcoin" value="<?=$_SESSION['xcoin']?>" readonly="true"></div>
    	<div class="profile"><i class="fa fa-user"></i>
    		<div class="drop">
    			<a href="index.php?P=profile">Profil</a>
    			<a href="index.php?P=deposit">Befizetés</a>
       			<a href="index.php?P=withdraw">Kifizetés</a>
       			<a href="index.php?P=prizes">Nyeremények</a>       			
    			<a href="index.php?P=logout">Kijelentkezés</a>
    		</div>
    	</div>
	</div>

<?php else : ?>
	<div class="register">
	<a href="index.php?P=register">Regisztráció</a>
</div>
<form method="POST">
	<div class="login">
		<input type="submit" name="login" value="Bejelentkezés">
	</div>
	<div class="username"><input type="text" name="username" placeholder="Felhasználónév"></div>
	<div class="password"><input type="password" name="password" placeholder="Jelszó" id="lpassword"><i id="log" class="fa fa-eye" aria-hidden="true" onclick="showlpw()"></i></div>
</form>

<?php endif; ?>
<hr>