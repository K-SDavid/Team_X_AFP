<?php
require_once USER_MANAGER;
if(!CheckLogin()): 
  header("Location: index.php?P=denied");
else:
  ?>
  <form method="POST" class="dicebet">
    <hr class="nicehr">
     <table>
      <tr>
        <td><label for="27">2-7</label></td>
        <td><label for="712">7-12</label></td>
        <td><label for="double">DUPLA</label></td>
        <td><label for="odd">PÁRATLAN</label></td>
        <td><label for="even">PÁROS</label></td>
        <td><label for="exact"><input style="width:60px;"type="number" value="2" name="exactsum" placeholder="Pontos összeg" min="2" max="12"></label></td>
      </tr>
      <tr>
        <td><input type="radio" name="dicebet" id="27" value="27"> </td>
        <td><input type="radio" name="dicebet" id="712" value="712"> </td>
        <td><input type="radio" name="dicebet" id="double" value="double"></td>
        <td><input type="radio" name="dicebet" id="odd" value="odd"></td>
        <td><input type="radio" name="dicebet" id="even" value="even"></td>
        <td><input type="radio" name="dicebet" id="exact" value="exact"></td>
      </tr>
     </table>
     <hr class="nicehr">
     <input type="text" name="diceamount" autocomplete="off" placeholder="0.01">
     <hr class="nicehr">
     <input type="submit" name="dicesubmit" value="Dobás!"> 
   </form>
<?php endif; ?>


<div class="dice first-face">
  <span class="dot">
  </span>
</div>  

<div class="dice second-face">
  <span class="dot">
  </span>
  <span class="dot">
  </span>
</div>

<div class="dice third-face">
  <span class="dot"></span>
  <span class="dot"></span>
  <span class="dot"></span>
</div>

<div class="fourth-face dice">
  <div class="column">
    <span class="dot"></span>
    <span class="dot"></span>
  </div>
  <div class="column">
    <span class="dot"></span>
    <span class="dot"></span>
  </div>
</div>

<div class="fifth-face dice">  
  <div class="column">
    <span class="dot"></span>
    <span class="dot"></span>
  </div>              
  <div class="column">
    <span class="dot"></span>
  </div>              
  <div class="column">
    <span class="dot"></span>
    <span class="dot"></span>
  </div>
</div>

<div class="sixth-face dice">
  <div class="column">
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
  </div>
  <div class="column">
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
  </div>
</div>

<?php 

function DiceRoll(){
  return rand(1,6);
}

function DiceDecide($dice1, $dice2, $bettype, $amount, $id)
{
  if($amount > $_SESSION['balance']){
    return -1;
  }
  else{
    Bet($_SESSION['uid'],$amount);
    $sum = $dice1+$dice2;
    switch ($bettype) {
      case '27':
        if($sum < 8){
          Win($id, $amount*2);
          return $amount*2;
        }    
        return 0;
        break;
      case '712':
        if($sum > 6){
          Win($id, $amount*2);
          return $amount*2;
        }    
        return 0;
        break;
      case 'double':
        if($dice1 == $dice2){
          Win($id, $amount*6);
          return $amount*6;
        }    
        return 0;
        break;
      case 'even':
        if($sum % 2 == 0){
          Win($id, $amount*2);
          return $amount*2;
        }    
        return 0;
        break;
      case 'odd':
        if($sum % 2 == 1){
          Win($id, $amount*2);
          return $amount*2;
        }    
        return 0;
        break;
      case 'exact':
        if($sum == $_POST['exactsum']){
          Win($id, $amount*11);
          return $amount*11;
        }    
        return 0;
        break;
          default:
        break;
    }
  }
}
?>