

<div class="addcc">
  <?php require_once PROTECTED_DIR."creditcard/addcard.php" ?>
</div>
<input type="submit" name="addcreditcard" value="Bankkártya hozzáadás" onclick="toggleaddcc()">

<hr width="100%">
<div class="changepw">
  <form method="POST">
    <input type="password" name="npassword" placeholder="Adja meg az új jelszavát">
    <input type="password" name="npassword" placeholder="Erősítse meg a jelszavát">
    <input type="submit" name="npwsubbmit" value="Jelszó módosítás">
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