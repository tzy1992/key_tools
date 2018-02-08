<!-- Verify and validate Sign String-->
 <!DOCTYPE HTML>  
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.15/r-2.1.1/datatables.min.css"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.15/r-2.1.1/datatables.min.js"></script>

<script>
$(document).ready(function(){
    $('#myTable').DataTable();
});
</script>

	
    <title>Sign String Verify</title>

 
 <script>
 	

 	function reset(){
	document.getElementById('signstr').value = null;      //clear form by setting the value to null
    $('#table1 tbody > tr').remove();
    $("span").html("");
}
	
</script>
<style>
table{
     width: 100%;
}
#moveright {
	 		
			text-align:left;
			 margin-left: 180px;
			 margin-right: 150px;
		}
#moveright1 {
	 		
			text-align:left;
			 margin-left: 50px;
			  margin-right: 50px;
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

<div id ="moveright">
 <br><button  class="btn btn-info" type="button" onclick="reset()"><i class="glyphicon glyphicon-refresh"></i>&nbsp;&nbsp;&nbsp;Reset</button><br>
<form method="post" action="">
<h3>Sign String Verify</h3>
 <textarea id="signstr" name="signstring" rows="10" cols="150" placeholder="client_ip=123.123.123.123&amp;extra_return_param=lorem^ipsum^loremipsum&amp;input_charset=UTF-8&amp;interface_version=V3.0&amp;merchant_code=1111110166&amp;notify_url=http://dinpay.com/notifyURL&amp;order_amount=10&amp;order_no=abc123&amp;order_time=2016-08-10 11:52:18&amp;product_code=test_product_code&amp;product_desc=test_product_desc&amp;product_name=test_product_name&amp;product_num=1&amp;return_url=http://dinpay.com/returnURL&amp;service_type=direct_pay&amp;etc..." required><?php if(isset($_POST['signstring'])) { 
         echo htmlentities ($_POST['signstring']); }?></textarea><br><br>
 <input class="btn btn-primary" type="submit" name="submit" value="Validate Sign String"><br><br>
	</form>
	</div> 
</body>
</html>

<?php
error_reporting(0);
$name = "";
$val="";
$sorttest='';
$value1='';
$key = '';
$output = '';
$missing_input = " ";


	$str = $_POST['signstring'];
		$str1 = explode('&', $str);
				
				$j = 0;
				$k = 0;
		$sorttest = $str1;
		$output = $str1;
		 			 //echo '<pre>';
					 //$compare = print_r($sorttest);
					 //echo '</pre>';					

					

		sort($str1);	 

					 echo	'<div id ="moveright1">';
				 	 echo	'<table id="myTable" class ="table" border="1">';
				  	 echo	'<tr class="info">';
				  	 echo	'<th>',"Sequence",'</th>';
        			 echo	'<th>',"Expected Parameter Sequence",'</th>';
					 echo	'<th>',"Input",'</th>';
					 echo	'<th>',"Required",'</th>';					 
					 echo	'<th>',"User Parameter Sequence",'</th>';
					 echo	'<th>',"Type/Length",'</th>';
					 echo	'<th>',"Result",'</th>';
					 echo	'<th>',"Reason",'</th>';
				 echo	'</tr>';

		
  				//$skuList = preg_split("/\\r\\n|\\r|\\n/", $output);
				//echo $skuList[$i];
			
  			
  // Same like the above example you can create all validation 


		

			
			    //$output =  $requires;
				//print_r($output.'<br>') ;
		//$a=array('a','b','c');
		$c=array();

		for ($i = 0; $i < sizeof($str1); $i++) {
		
		//$str1 = $value;			
		//echo $str1;
		//echo $sorttest[$i]; 		
		
		$str2 = explode('=', $str1[$i]);
			$name = $str2[0];
			$val = $str2[1];	
			 $c[$i]=$str2[0];	

				$j++;		
				//echo $name.'<br>';	
				//echo $sorttest[$i];			
				//echo $val.'<br>';
				//$test = array_intersect($str1, $validate);
				//echo $test;
				
				// for loop				
	 			$str8 = explode('=', $sorttest[$i]);
	 			$name2 = $str8[0];
	 			
	 		     //echo $name2.'<br>';
				 //$compare = substr_compare($name, $sorttest[$i], strlen($name)); 
				//echo $compare;
				if ($str == null) {
					$j = "";
				}
	 				 echo	'<td>',$j,'</td>';	
					 echo	'<td>',$name,'</td>';
					 echo	'<td>',$val,'</td>';
		
				$required = "";
				switch ($name) {
					case 'bank_code':
						$required = "Optional";
						break;
					case 'client_ip':
						$required = "Optional";
						break;
					case 'extend_param':
						$required = "Optional";
						break;
					case 'extra_return_param':
						$required = "Optional";
						break;
					case 'input_charset':
						$required = "Mandatory";
						break;
					case 'interface_version':
						$required = "Mandatory";
						break;
					case 'merchant_code':
						$required = "Mandatory";
						break;
					case 'notify_url':
						$required = "Mandatory";
						break;
					case 'order_amount':
						$required = "Mandatory";
						break;
					case 'order_no':
						$required = "Mandatory";
						break;
					case 'order_time':
						$required = "Mandatory";
						break;
					case 'pay_type':
						$required = "Optional";
						break;
					case 'product_code':
						$required = "Optional";
						break;
					case 'product_desc':
						$required = "Optional";
						break;
					case 'product_name':
						$required = "Mandatory";
						break;
					case 'product_num':
						$required = "Optional";
						break;
					case 'redo_flag':
						$required = "Optional";
						break;
					case 'return_url':
						$required = "Optional";
						break;
					case 'service_type':
						$required = "Mandatory";
						break;
					case 'show_url':
						$required = "Optional";
						break;					
					default:
						$required = "";
						break;
				}
				 echo	'<td>',$required,'</td>';
				$type_length = "";
				
				
				
				 echo	'<td>',$name2,'</td>';

				  switch ($name) {
					case 'bank_code':
						$type_length = "String(10)";
						break;
					case 'client_ip':
						$type_length = "String(15)";
						break;
					case 'extend_param':
						$type_length = "String";
						break;
					case 'extra_return_param':
						$type_length = "String(100)";
						break;
					case 'input_charset':
						$type_length = "String(5)";
						break;
					case 'interface_version':
						$type_length = "String(10)";
						break;
					case 'merchant_code':
						$type_length = "String(10)";
						break;
					case 'notify_url':
						$type_length = "String(200)";
						break;
					case 'order_amount':
						$type_length = "Number(13,2)";
						break;
					case 'order_no':
						$type_length = "String(100)";
						break;
					case 'order_time':
						$type_length = "Date";
						break;
					case 'pay_type':
						$type_length = "String(10)";
						break;
					case 'product_code':
						$type_length = "String(60)";
						break;
					case 'product_desc':
						$type_length = "String(300)";
						break;
					case 'product_name':
						$type_length = "String(100)";
						break;
					case 'product_num':
						$type_length = "Number(10)";
						break;
					case 'redo_flag':
						$type_length = "Int(1)";
						break;
					case 'return_url':
						$type_length = "String(200)";
						break;
					case 'service_type':
						$type_length = "String(10)";
						break;
					case 'show_url':
						$type_length = "String(200)";
						break;					
					default:
						$type_length = "";
						break;
				}
				
				 echo	'<td>',$type_length,'</td>';
				 $strvalid = "";
                if ($val != null) {                 
                
                switch ($name) {
                    case 'bank_code':
                    if (strlen($val)>10) {
                        $strvalid = "Exceed Parameter Length";
                    }
                        //"String(10)";
                        break;
                    case 'client_ip':
                        if (strlen($val)>15) {
                        $strvalid = "Exceed Parameter Length";
                    }
                        break;
                    case 'extend_param':
                    if (is_string($val)) {
                        $strvalid = "";
                    }
                    else{
                        $strvalid = "Not String";
                    }
                        //"String";
                        break;
                    case 'extra_return_param':
                        if (strlen($val)>100) {
                        $strvalid = "Exceed Parameter Length";
                    }
                        break;
                    case 'input_charset':
                        if (strlen($val)>5) {
                        $strvalid = "Exceed Parameter Length";
                    }                   
                        // "String(5)";
                        break;
                    case 'interface_version':
                    if (strcmp($val, 'V3.0')===0) {
                        $strvalid = "";
                        }
                    else{
                        $strvalid = "Invalid interface_version value. Must be V3.0 (Capital)";
                    }

                        // "String(10)";
                        break;
                    case 'merchant_code':
                    if (strlen($val)>10) {
                        $strvalid = "Exceed Parameter Length";
                    }           
                        // "String(10)";
                        break;
                    case 'notify_url':
                    if (strlen($val)>200) {
                        $strvalid = "Exceed Parameter Length";
                    }   
                         //"String(200)";
                        break;
                    case 'order_amount':
                    if (is_numeric($val)==0){
                    	$strvalid = "Not a number";
                    }
                         //"Number(13,2)";
                        break;
                    case 'order_no':
                    if (strlen($val)>100) {
                        $strvalid = "Exceed Parameter Length";
                    }   
                        //"String(100)";
                        break;
                    case 'order_time':
                    if (preg_match("/^(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})$/", $val)){
                    	$strvalid = "";
                    }
                    else
                    {
                    	$strvalid = "Wrong Date Format";
                    }
                          // "Date";
                        break;
                    case 'pay_type':
                     if (strlen($val)>10) {
                        $strvalid = "Exceed Parameter Length";
                    }   
                        //"String(10)";
                        break;
                    case 'product_code':
                     if (strlen($val)>60) {
                        $strvalid = "Exceed Parameter Length";
                    }   
                        //"String(60)";
                        break;
                    case 'product_desc':
                     if (strlen($val)>300) {
                        $strvalid = "Exceed Parameter Length";
                    }   
                        //"String(300)";
                        break;
                    case 'product_name':
                     if (strlen($val)>100) {
                        $strvalid = "Exceed Parameter Length";
                    }   
                        // "String(100)";
                        break;
                    case 'product_num':
                    if (is_numeric($val)==0){
                    	$strvalid = "Not a number";
                    }
                    elseif (strlen($val)>10) {
                    	 $strvalid = "Exceed Parameter Length";
                    }
                        //"Number(10)";
                        break;
                    case 'redo_flag':
                     if (is_numeric($val)==0){
                    	$strvalid = "Not a number";
                    }
                    elseif (strlen($val)>1) {
                    	 $strvalid = "Exceed Parameter Length";
                    }
                        //"Int(1)";
                        break;
                    case 'return_url':
                     if (strlen($val)>200) {
                        $strvalid = "Exceed Parameter Length";
                    }   
                        //"String(200)";
                        break;
                    case 'service_type':
                     if (strcmp($val, 'direct_pay')===0) {
                        $strvalid = "";
                        }
                    else{
                        $strvalid = "Invalid service_type value. Must be direct_pay";
                    }
                        //"String(10)";
                        break;
                    case 'show_url':
                     if (strlen($val)>200) {
                        $strvalid = "Exceed Parameter Length";
                    }   
                        //"String(200)";
                        break;                  
                    default:
                        $strvalid = "";
                        break;
                }
            }
			
				$nosuchparam = "";
				if ($required == null){
					$nosuchparam = "The parameter not exists"; 
				}
				$sequence = "";	
				if(strcmp($name, $name2) != 0){
				$sequence = "Wrong Sequence";
				}

				if (strcmp($name, $name2) === 0 && $required != null && $strvalid == null) {
   					$result = "<span style='color: green'>Pass</span>";
   					$reason = "";
					}										
				else{												
					$result = "<span style='color: red'>Fail</span>";
					$reason = $sequence.'<br>'.$nosuchparam.'<br>'.$strvalid; 
					}
				
				if ($str == null) {
					$result = "";
					$reason = "";
				}
				 echo	'<td>',$result,'</td>';
				
				 echo	'<td>',$reason,'</td>';

				 echo	'</tr>';
				
				
			    
				}	
				if($str == null){
					$requires = array();	
				}
				else{
				 $requires = array('input_charset' , 'interface_version', 'merchant_code','notify_url', 'order_amount', 'order_no','order_time','product_name','service_type');			
				}
				$results = array_diff($requires, $c);
   				//print_r($results);
   				if (count($results > 0)) {
   						//echo 'There Are Differences Between The Array:';
    					foreach ($results AS $result1){
        				echo '<span style="font-size:12pt"  style="color: black">&nbsp;Missing Mandatory Parameter</span>'."<span style='color: red'>".'&nbsp;'.$result1."</span>"."<br>";        				 
        		
        		}
        		}
   						echo   '<br>';
				
	 echo	'</table>';
	 echo	'</div>';
	
			

	  
?>             		