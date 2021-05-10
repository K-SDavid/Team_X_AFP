<?php
require_once USER_MANAGER;

if(!CheckLogin()):
	echo "<h3>Egyszerű kaparós sorsjegy <br> Ár: 2€ <br> Nyeremény: 10€</h3> <br> <h1>Játékleírás: </h1>";
else:
	if(array_key_exists('ss', $_GET) && !empty($_GET['ss'])){
		if(!isset($_POST['scratchsubmit'])) {
			header("location: index.php?P=denied");
		}
	}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style >
    *{
      box-sizing: border-box;
      padding: 0;
      margin: 0;
      outline: none

    }
    body{
      display: flex;

      align-items: center;

      overflow: hidden;


    }
    .mainbox{
      position: relative;
      width: 500px;
      height: 500px;
    }
    .mainbox::after{
      position: absolute;
      content: '';
      width: 32px;
      height: 32px;
      background: url('Public/Pictures/left-arrow.png') no-repeat;
      background-size: 32px;
      right: -30px;
      top: 50%;
      transform: translateY(-50%);

    }
    .box{
      width: 100%;
      height: 100%;
      position:  relative;
      border-radius: 50%;
      border: 10px solid #fff;
      overflow:  hidden;
    }
    span{
      width: 50%;
      height: 50%;
      display: inline-block;
      position: absolute;
    }



    .span1{
      clip-path: polygon(0 92%, 100% 50%, 0 8%);
      background-color: #ffeb3b;
      top:120px;
      left:0;
    }
    .span2{
	     clip-path: polygon(100% 92%, 0 50%, 100% 8%);
       background-color: #e91e63;
       top:120px;
       right:0;
     }
     .span3{
	      clip-path: polygon(50% 0%, 8% 100%, 92% 100%);
        background-color: #4caf50;
        bottom:0;
        left:120px;
      }
      .span4{
	       clip-path: polygon(50% 100%, 92% 0, 8% 0);
         background-color: #3f51b5;
         top:0;
         left:120px;

       }
      .box2{
        width: 100%;
        height: 100%;
        transform: rotate(-135deg);

      }
      span b {
        width: 65px;
        height: 65px;
        line-height: 65px;
        border-radius: 50%;
        font-size: 26px;
        text-align: center;
        background-color: #fff;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        box-shadow: inset 0 3px 3px 0 #717171;
        font-family: sans-serif;
        color: black;


      }
      .spin{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        width: 75px;
        height:75px;
        border-radius: 50%;
        border: 4px solid #fff;
        background-color: #ff5722;
        color: #fff;
        box-shadow: 0 5px 20px #000;
        font-weight: bold;
        font-size: 22px;
        cursor: pointer;
      }
      .spin:active{
        width: 70px;
        height: 70px;
        font-size: 20px;

      }

    </style>
  </head>
  <body>
    <div class="mainbox">
      <div class="box">
        <div class="box1">
          <span class="span1"><b>50</b></span>
          <span class="span2"><b>150</b></span>
          <span class="span3"><b>250</b></span>
          <span class="span4"><b>350</b></span>

        </div>
        <div class="box2">
          <span class="span1"><b>10</b></span>
          <span class="span2"><b>110</b></span>
          <span class="span3"><b>210</b></span>
          <span class="span4"><b>310</b></span>

        </div>

      </div>
      <button  class="spin " onclick="Spin">SPIN</button>
    </div>
  <script>
    function spin(){}
  </script>

  </body>
</html>
<?php endif; ?>
