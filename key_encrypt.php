<!DOCTYPE HTML>  
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Key Encrypt Check</title>

 	<!-- <link href="css/simple-sidebar.css" rel="stylesheet">-->
 <script>
 	

 	function reset(){
	document.getElementById('prk').value = null;      //clear form by setting the value to null
    document.getElementById('pbk').value = null;
    document.getElementById('str').value = null;
    document.getElementById('status').value = null;
    document.getElementById('signstr').value = null;
    
}
	
</script>
<style>
#moveright {
	 		
			text-align:left;
			 margin-left: 180px;
			 margin-right: 200px;
		}
#moveright1 {
	 		
			text-align:left;
			 margin-left: 180px;
			 margin-right: 700px;
		}
label textarea{
 vertical-align: middle;
}

</style>
</head>
<body>
<header id="site-header" class="clearfix" role="banner">
<div class="container">

<!-- #logo -->
  <div id="logo">
   </div>
<!-- /#logo -->
<!-- #primary-nav -->
<nav id="primary-nav" role="navigation" class="clearfix">
    </nav>
<!-- #primary-nav -->

</div>
</header>               
<br>
<div id ="moveright">
	<h2>Public and Private key match checking</h2><br>
 <button  class="btn btn-info" type="button" onclick="reset()"><i class="glyphicon glyphicon-refresh"></i>&nbsp;&nbsp;&nbsp;Clear Form Field</button><br><br>
<form method="post" action="">
 <h4>Private Key</h4>
 <textarea id="prk" name="privatekey" rows="20" cols="100" placeholder= "-----BEGIN PRIVATE KEY-----
		 

     Your Private Key


-----END PRIVATE KEY-----"required><?php if(isset($_POST['privatekey'])) { 
         echo htmlentities ($_POST['privatekey']); }?></textarea><br><br>
   <h4>Public Key</h4>
 <textarea id="pbk" name="publickey" rows="20" cols="100" placeholder="-----BEGIN PUBLIC KEY-----


     Your Public Key 

     
-----END PUBLIC KEY-----"required><?php if(isset($_POST['publickey'])) { 
         echo htmlentities ($_POST['publickey']); }?></textarea><br><br>
  <p>String data to encrypt</p>
 <input id="str" type="text" name="teststring" value="test" required>
 <input class="btn btn-default" type="submit" name="submit" value="Check"> <br><br>
 
 </form>
 
</div>
</body>

</html>

<?php

//echo $_POST['privatekey'];
//echo $_POST['publickey'];
//echo $_POST['teststring'];
	
	error_reporting(0);
	$private_key = $_POST['privatekey'];
	$public_key = $_POST['publickey'];
	$teststr = $_POST['teststring'];
	$Status = "";
//echo 'teststr= ' . $teststr . '</br>';
  

  $merchant_private_key= openssl_get_privatekey($private_key);
  openssl_sign($teststr,$signature,$merchant_private_key,OPENSSL_ALGO_MD5);
  $sign = base64_encode($signature);

//echo 'sign = ' . $sign . '</br>';
  $TestSign =  base64_decode($sign);

  $merchant_public_key = openssl_get_publickey($public_key);
  $flag = openssl_verify($teststr,$TestSign,$merchant_public_key,OPENSSL_ALGO_MD5);
  

  if($flag==true){		
		
		echo '<div id ="moveright1" class="alert alert-success">';
 			echo '<strong>Success!</strong> You may proceed with the key pairs';
		echo '</div>';
		//$Status = "Success";

	}
	elseif ($private_key === NULL | $public_key === NULL | $teststr === NULL ) {
		echo '<div id ="moveright1" class="alert alert-warning">';
 			echo '<strong>No input</strong> Please insert your key pairs and string to test';
		echo '</div>';
	}
	
	else{	
		echo '<div id ="moveright1" class="alert alert-danger">';
 			echo '<strong>Fail!</strong> Please check the key pairs';
		echo '</div>';

		//$Status = "Fail";
		$sign = "";


	}
	

?>
	<!--
	<div class="my-notify-success"  id= "moveright" >
	Verification &nbsp; <input id="status" type="text" name="status" value="<?php echo $Status?>" readonly="">
	
	<br><br>
	</div> 
	-->
	<div id= "moveright" >
	<label>Sign String <textarea id="signstr" name="signstring" rows="5" cols="100" readonly=""><?php echo $sign?></textarea></label>


	</div>
