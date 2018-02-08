<?php
	error_reporting(0);
  $private_key = $_POST['privatekey'];    
  $private_string = preg_replace('/\s+/', '', $private_key); //strip whitespace
  $private_string_2 = chunk_split($private_string, 64); //split to next line when reach 64 characters     
  $head = "-----BEGIN PRIVATE KEY-----\n";
  $foot = "-----END PRIVATE KEY-----";
  if($private_key==null){
    $private_head = "";
  }
  else{
  $private_head = $head.$private_string_2.$foot;//concatenating header, splitted string and footer	
  }
?>

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

    <title>Key Format</title>

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<script>
function reset(){
	document.getElementById('pk').value = null;      //clear form by setting the value to null
    document.getElementById('pkhf').value = null;
    document.getElementById('pksf').value = null;

}
</script>
<style>
#moveright {
	 		
			text-align:left;
			 margin-left: 180px;
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
<div>
                 
               

 <br>
 <div id ="moveright">
  <button  class="btn btn-info" type="button" onclick="reset()"><i class="glyphicon glyphicon-refresh"></i>&nbsp;&nbsp;&nbsp;Clear Form Field</button><br>
 <form id="myform" name="myform" method="post" action="" >
 <h2>Private Key Format Tool</h2>
 <p>Private Key</p>
 <textarea id="pk" name="privatekey" rows="18" cols="100" placeholder="Copy your private key here" required><?php echo $private_key?></textarea>
 <br>
 <div id ="moveright1">
 <input class="btn btn-primary" type="submit" name="submit" value="Format Private Key"> 
 </div>
 <br>
 <br>
 <p>Private Key With Header and Footer</p>
 <textarea id="pkhf" name="prkey_head" rows="18" cols="100"><?php echo $private_head?></textarea>
 <br>
 <br>
 <p>Private Key in String Format</p>
  <textarea id="pksf" name="prkey_str" rows="18" cols="100"><?php echo $private_string?></textarea>
  <br>
  <br>    
  </form>
  
 <button  class="btn btn-info" type="button" onclick="reset()"><i class="glyphicon glyphicon-refresh"></i>&nbsp;&nbsp;&nbsp;Clear Form Field</button><br>
    <br>
  <br>
 
  </div>
</body>
</html>


