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