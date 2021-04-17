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
    <?php require_once GAME_MANAGER;
      $maxbet = 0;
      $minbet = GetMinBetAmount("dice");
      if($_SESSION['permission'] == 1)
      {
        $maxbet = GetMaxBetAmount("dice")/10000;
      }
      else $maxbet = GetMaxBetAmount("dice");?>
      <h3>Minimum összeg:<?=$minbet?>€ &nbsp;&nbsp;&nbsp;&nbsp; Maximum összeg:<?=$maxbet?>€</h3>

     <hr class="nicehr">
     <input type="submit" name="dicesubmit" value="Dobás!"> 
   </form>
<?php 
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['dicesubmit']) && isset($_POST['dicebet'])):
    if($_POST['diceamount'] > $maxbet || $_POST['diceamount'] < $minbet || !is_numeric($_POST['diceamount'])):
      echo "Nem megfelelő tét!"; ?>
      <hr class="nicehr">
      <?php require_once PROTECTED_DIR."games/dice/defaultdice.php";
    else:
      $result1 = DiceRoll(); 
      $result2 = DiceRoll();
      $results = [ $result1, $result2];
      $winamount = DiceDecide($result1,$result2,$_POST['dicebet'],$_POST['diceamount'],$_SESSION['uid']);

      if($winamount == -1):    
        echo "Nincs elég egyenlege!"; ?>
        <hr class="nicehr">
        <?php require_once PROTECTED_DIR."games/dice/defaultdice.php";
      else:
        if($winamount == 0){    
          echo "Sajnáljuk! Nem nyertél semmit."; 
        }
        else{
          echo "Gratulálunk! Nyereményed ".$winamount."€"; 
        }?>

        <hr class="nicehr">
        <div style="display: flex; flex-direction: row;">
          <?php
          for ($i=0; $i < 2; $i++):
           switch ($results[$i]):
            case 1: ?>
              <div class="dice first-face">
                <span class="dot">
                </span>
              </div>          
              <?php break;

              case 2: ?>
                <div class="dice second-face">
                  <span class="dot">
                  </span>
                  <span class="dot">
                  </span>
                </div>
                <?php break;

              case 3: ?>
                <div class="dice third-face">
                  <span class="dot"></span>
                  <span class="dot"></span>
                  <span class="dot"></span>
                </div>
                <?php break;

              case 4: ?>
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
                <?php break;

              case 5: ?>
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
                <?php break;

              case 6: ?>
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
                <?php break;
            default:
              break;
           endswitch;
         endfor;
      endif; // ha nyert
    endif; // ha nem megfelelő a tét
?>
</div>
<?php 
  else:
    echo "Válasszon fogadási típust és adjon meg egy valós tétet!"; ?>
    <hr class="nicehr">
    <?php 
    require_once PROTECTED_DIR."games/dice/defaultdice.php"; 
  endif; // POST-os if 
endif; //checkloginos if
?>




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