<?php
require("new.php");  
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>
<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="styles.css">
 <script src="jquery.js">
</script>     
<script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
         <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
	<div class="well" >

		<center><h1>Hotel Login</h1>
	<fieldset>
				<?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}?>
	<form method="post" enctype="multipart/form-data" class="form-horizontal">
	    
	<table class="table table-bordered table-responsive">
	
    <tr>
    	<td><label class="control-label">Hotel Name.</label></td>
        <td><input class="form-control" type="text" name="hloginname" placeholder="Enter hotel name" required/></td>
    </tr>
        <tr>
    	<td><label class="control-label">Hotel Email.</label></td>
        <td><input class="form-control" type="email" name="hloginemail" placeholder="Enter email" required/></td>
    </tr>

    <tr>
    	<td><label class="control-label">Password.</label></td>
        <td><input class="form-control" type="password" name="hloginpass" placeholder="Password" required/></td>
    </tr>
        
    <tr>
    	<td></td>
        <td ><button type="submit" name="btnloginhotel" class="btn btn-success btn-lg btn-block">
        <span class="glyphicon glyphicon-login"></span> &nbsp; login
        </button>
        </td>
    </tr>
    
    </table>
    
</form>


	</fieldset></center>
</div></div>
</body>
</html>