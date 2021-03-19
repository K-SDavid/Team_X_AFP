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
}
	if(CheckLogin()): ?>
		<div class="details">
    <div class="money"><input type="text" name="money" value="<?=$_SESSION['balance']?>" readonly="true"></div>
    <div class="xcoin"><input type="text" name="xcoin" value="<?=$_SESSION['xcoin']?>" readonly="true"></div>
    <a href="index.php?P=profile"><div class="profile"><i class="fa fa-user"></i></div></a>
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
	<div class="password"><input type="password" name="password" placeholder="Jelszó"></div>
</form>

<?php endif; ?>
<hr>