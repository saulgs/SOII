<?php

if(!empty($_POST['user']) && !empty($_POST['pass']) && !empty($_POST['dominio']))
{
$user  = $_POST['user'] . '@' . $_POST['dominio'];
$ldaprdn  = $_POST['user'];
$ldappass = $_POST['pass'];  
$ldapdomain = $_POST['dominio'];


$ldapconn = ldap_connect($ldapdomain)
    or die("Could not connect to LDAP server.");




if ($ldapconn) 
{    
	$ldapbind = ldap_bind($ldapconn, $user, $ldappass);

    if ($ldapbind) 
	{
		$dn = "CN=Users,DC=proyectoso2, DC=com";
		
		$filter="(sAMAccountName=".$_POST['user'].")";
		$justthese = array("ou", "sn", "givenname", "displayname");
		$sr=ldap_search($ldapconn, $dn, $filter, $justthese);
		$info = ldap_get_entries($ldapconn, $sr);
		$nombre = $info[0]["givenname"][0];
		$apellido = $info[0]["sn"][0];
		$display = $info[0]["displayname"][0];

		
	} 	
    else 
	{
		echo"<script> alert('Usuario o clave incorrecta. Vuelva a intentar por favor.'); 		
		window.location.href='index.html'; </script>"; 
	}

}
}
else
{
	echo"<script> alert('Por favor llene todos los campos.'); 		
		window.location.href='index.html'; </script>"; 
}
?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Elegent Tab Forms Responsive Widget Template  :: w3layouts</title>
<link href="css/style2.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Elegent Tab Forms,Login Forms,Sign up Forms,Registration Forms,News latter Forms,Elements"./>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</script>
<script src="js/jquery.min.js"></script>
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
				<script type="text/javascript">
					$(document).ready(function () {
						$('#horizontalTab').easyResponsiveTabs({
							type: 'default', //Types: default, vertical, accordion           
							width: 'auto', //auto or any width like 600px
							fit: true   // 100% fit in a container
						});
					});
				   </script>

<!--webfonts-->
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,600,700,200italic,300italic,400italic,600italic|Lora:400,700,400italic,700italic|Raleway:400,500,300,600,700,200,100' rel='stylesheet' type='text/css'>
<!--//webfonts-->
</head>
<body>
<div class="main">
		<h1>Informacion Basica Del Usuario</h1>
	 <div class="sap_tabs">	
			<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
			  <ul class="resp-tabs-list">
			  	  <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><div class="top-img"><img src="images/top-note.png" alt=""/></div><span>General</span>
			  	  	
				</li>
				  <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><div class="top-img"><img src="images/top-lock.png" alt=""/></div><span>Member Of</span></li>
				  <li class="resp-tab-item lost" aria-controls="tab_item-2" role="tab"><div class="top-img"><img src="images/top-key.png" alt=""/></div><span>Cambio Password</span></li>
				  <div class="clear"></div>
			  </ul>		
			  <!---->		  	 
			<div class="resp-tabs-container">
					<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
					<div class="facts">
							<!--login1-->
						<div class="register">

							<link rel="stylesheet" type="text/css" href="css\tabla.css">
							<table class="table-fill">
							<thead>
							<tr>
							<th class="text-center">First Name</th>
							<th class="text-center">Last Name</th>
							<th class="text-center">Display Name</th>
							</tr>
							</thead>
							<tr>
							<td class="text-center"><?php echo $nombre; ?></td>
							<td class="text-center"><?php echo $apellido;?></td>
							<td class="text-center"><?php echo $display;?></td>
							</tr>
							</tbody>
							</table>

							<form action = "index.html">
								<div class="sign-up">
									<input type="submit" value="Sign Out" >
									<div class="clear"> </div>
								</div>	
							</form>

						</div>
					</div>
				</div>		
			 <div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
					 	<div class="facts">
							 <div class="login">
								<div class="buttons">
								
							</div>
<link rel="stylesheet" type="text/css" href="css\tabla.css">
<table class="table-fill" id="tablaGrupos">
<thead>
<th class="text-center">Grupos</th>
</thead>
</tbody>
</table>  


							<form action="index.html">
								

								<div class="p-container">
									
									<div class="submit two">
									<input type="submit" o value="Sign Out" >
									</div>
									<div class="clear"> </div>
								</div>

							</form>
					</div>
				</div> 
			</div> 			        					 
				 <div class="tab-3 resp-tab-content" aria-labelledby="tab_item-2 item3">
				     	<div class="facts">
									<form action="https://52.37.172.121">
								

								<div class="p-container">
									
									<div class="submit two">
									<input type="submit" o value="Cambiar de Password" >
									</div>
									<div class="clear"> </div>
								</div>

							</form>
									</div>
				         	</div>           	      
				        </div>	
				     </div>	
		        </div>
	        </div>
	     </div>

	<!--start-copyright-->
   		<div class="copy-right">
   			<div class="wrap">
				
		</div>
	</div>
	<!--//end-copyright-->
</body>

<script>

function myFunction(grupo) 
{
    var table = document.getElementById("tablaGrupos");
    var row = table.insertRow(1);
    var cell1 = row.insertCell(0);
    cell1.innerHTML = grupo;
   
}

<?php

$y = 0;
$results = ldap_search($ldapconn, $dn,"(samaccountname=".$ldaprdn.")",array("memberof"));
$entries = ldap_get_entries($ldapconn, $results);
	
$output = $entries[0]['memberof'];

foreach($output as $a) 
{
	if($y!==0)
	{
	$r = explode(",",$a,2);
	$g = explode("=",$r[0]);
	echo "myFunction('$g[1]');";
	}
	
else
	$y = $y + 1;
}

?>



</script>


</html>


























































