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

    </style>
  </head>
  <body>
    <div class="mainbox">
      <div class="box">
        <div class="box1">
          <span class="span1"></span>
          <span class="span2"></span>
          <span class="span3"></span>
          <span class="span4"></span>

        </div>

      </div>
    </div>

  </body>
</html>
<?php endif; ?>
