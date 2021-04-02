<?php 
require_once USER_MANAGER;
  if(!CheckLogin()):
    header("Location: index.php?P=denied");
  else:
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['npwsubmit'])) {
      $postData = [
        'id' => $_SESSION['uid'],
        'npassword' => $_POST['npassword'],
        'npassword1' => $_POST['npassword1']
      ];
      if(empty($postData['npassword']) || empty($postData['npassword1'])) {
        echo "Kérem adja meg az új jelszavát vagy jelszó megerősítőt!";
      } else if(strlen($postData['npassword']) < 6) {
        echo "A jelszó túl rövid! Legalább 6 karakter hosszúnak kell lennie!";
      } else if(1 === preg_match('~[ ]~', $postData['npassword'])) {
        echo "A jelszó nem tartalmazhat szóközt!";
      } else if ($postData['npassword'] != $postData['npassword1']) {
        echo "A jelszavak nem egyeznek!";       
      }else {
        if(!changePassword($postData['id'], $postData['npassword'])) {
          echo "Hiba a jelszó módosításnál!";
        }
      }
    }
?>

<?php require_once PROTECTED_DIR."creditcard/listcard.php" ?>
<hr width="100%">
<div class="addcc">
  <?php require_once PROTECTED_DIR."creditcard/addcard.php" ?>
</div>
<input type="submit" name="addcreditcard" value="Bankkártya hozzáadás" onclick="toggleaddcc()">

<hr width="100%">
<div class="changepw">
  <form method="POST">
    <input type="password" name="npassword" placeholder="Adja meg az új jelszavát">
    <input type="password" name="npassword1" placeholder="Erősítse meg a jelszavát">
    <input type="submit" name="npwsubmit" value="Jelszó módosítás">
  </form>
</div>
<input type="submit" name="jelszomodositas" value="Jelszó változtatás" onclick="togglePW()">

<div>
  <table>
    <tr>
      <td>Felhasználónév: </td>
      <td><?=$_SESSION['username']; ?></td>
    </tr>
    <tr>
      <td>Életkor: </td>
      <td><?=$_SESSION['age']; ?></td>
    </tr>
    <tr>
      <td>Email: </td>
      <td><?=$_SESSION['email']; ?></td>
    </tr>
    <tr>
      <td>Jogosultság: </td>
      <td><?=$_SESSION['permission'] == 3 ? 'Admin' : ($_SESSION['permission'] == 2 ? 'Prémium felhasználó' : 'Felhasználó'); ?></td>
    </tr>
  </table>
</div>
<?php endif; ?>