<?php
require_once USER_MANAGER;

if(!CheckLogin()):
	require_once PROTECTED_DIR."games/wheel/wheelrules.php";
else:
	if(array_key_exists('ss', $_GET) && !empty($_GET['ss'])){
		if(!isset($_POST['scratchsubmit'])) {
			header("location: index.php?P=denied");
		}
	}
?>
<?php if(!array_key_exists('ss', $_GET) || empty($_GET['ss'])) :
  if($_SESSION['balance'] < 10) : ?>
    <h2>Jelenleg nincs elég pénzed ehhez a játékhoz!</h2>
    <h3><br> Ár: 10€ <br> </h3> <br> <h1>Szerencsekerék </h1>
    <?php else: ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="Public/wheelstyle.css">
  </head>
  <body>
    <div  id="mainbox" class="mainbox">
      <div id="box" class="box">
        <div class="box1">
          <span class="span1"><b>0</b></span>
          <span class="span2"><b>5</b></span>
          <span class="span3"><b>8</b></span>
          <span class="span4"><b>9</b></span>

        </div>
        <div class="box2">
          <span class="span1"><b>12</b></span>
          <span class="span2"><b>18</b></span>
          <span class="span3"><b>50</b></span>
          <span class="span4"><b>6</b></span>

        </div>

      </div>
      <button  class="spin " onclick="mySpin()">SPIN</button>
    </div>
  <script type="text/javascript">
    function mySpin(){

      var x=1024;
      var y= 9999;
      var deg=Math.floor(Math.random()*(x-y))+y;

      document.getElementById('box').style.transform= "rotate("+deg+"deg)";
      var element=document.getElementById('mainbox');
      element.classList.remove('animate');
      setTimeout(function(){
        element.classList.add('animate');
      },2000);

    }
  </script>


    <h3><br> Ár: 10€ <br> A Nyeremény a pörgetett szám</h3> <br> <h1>Szerencsekerék: </h1>



  </body>
</html>

<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
