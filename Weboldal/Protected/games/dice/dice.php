<?php
require_once USER_MANAGER;
if(!CheckLogin()): 
  require_once PROTECTED_DIR."games/dice/dicerule.php";
else:
  ?>
  <form method="POST" class="dicebet">
    <div class="z-bigger">
        <input class="checkbox-dicebettype" type="radio" name="dicebet" id="dice-1" value="27">
        <label class="for-checkbox-dicebettype" for="dice-1">
          <span data-hover="2-7">2-7</span>
        </label>
          <input class="checkbox-dicebettype" type="radio" name="dicebet" id="dice-2" value="712">
        <label class="for-checkbox-dicebettype" for="dice-2">              
          <span data-hover="7-12">7-12</span>
        </label>
          <input class="checkbox-dicebettype" type="radio" name="dicebet" id="dice-3" value="even">
        <label class="for-checkbox-dicebettype" for="dice-3">              
          <span data-hover="PÁROS">PÁROS</span>
        </label>
          <input class="checkbox-dicebettype" type="radio" name="dicebet" id="dice-4" value="odd">
        <label class="for-checkbox-dicebettype" for="dice-4">              
          <span data-hover="PÁRATLAN">PÁRATLAN</span>
        </label>
          <input class="checkbox-dicebettype" type="radio" name="dicebet" id="dice-5" value="double">
        <label class="for-checkbox-dicebettype" for="dice-5">              
          <span data-hover="DUPLA">DUPLA</span>
        </label>
          <input class="checkbox-dicebettype" type="radio" name="dicebet" id="dice-6" value="exact">
        <label class="for-checkbox-dicebettype" for="dice-6">              
          <span><input type="number" value="2" name="exactsum" style="width:50px;" min="2" max="12" name=""></span></label>
      </div>
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
     <p style="margin-top:50px;"><a href="index.php?P=dicerules">Ide kattintva megtekintheti a szabályzatot!</a></p>
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