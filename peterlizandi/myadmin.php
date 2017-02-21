<?php
$myfile=$_SERVER ['SCRIPT_NAME'];
require("new.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin</title>
<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="styles.css">
 <script src="jquery.js">
</script>     
<script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
         <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> </head>
<body>
<div class="container" >

<div class="well" style="background-color:#afeeee;border:solid 2px #66cdaa;">
	<center><h1>Myadmin Panel</h1></center>
    <div class="panel panel-default" style="background-color:#afeeee;"> 
      <div class="row" id="myrow">
        <div class="col-md-4" id="col">
      <ul class="nav nav-pills nav-stacked" >
<li ><a type="button" class="btn btn-info" data-toggle="pill" href="#new">New Hotel</a></li>
<li ><a type="button" class="btn btn-info" data-toggle="pill" href="#activate">Activate Hotel</a></li>
<li ><a type="button" class="btn btn-info" data-toggle="pill" href="#deactivate">Deactivate Hotel</a></li>
<li ><a type="button" class="btn btn-info" data-toggle="pill" href="#remove">Remove Hotel</a></li>
    </ul></div>
    <div class="col-md-8" id="col">
<div class="tab-content">

<div id="new" class="tab-pane fade in active">
		<?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?>
	<center><form method="post" enctype="multipart/form-data" class="form-horizontal">
	    
	<table class="table table-bordered table-responsive">
	
    <tr>
      <td><label class="control-label">Hotel Name.</label></td>
        <td><input class="form-control" type="text" name="hotelname" placeholder="Enter Hotel Name"  /></td>
    </tr>
        <tr>
      <td><label class="control-label">Email.</label></td>
        <td><input class="form-control" type="email" name="hotelemail" placeholder="hotelemail@email.com"  /></td>
    </tr>
        <tr>
      <td><label class="control-label">Password.</label></td>
        <td><input class="form-control" type="text" name="hotelpass" placeholder="Enter Password"  /></td>
    </tr>

    <tr>
      <td><label class="control-label">Contact (Phone).</label></td>
        <td><input class="form-control" type="text" name="hotelcontact" placeholder="+123 098765432"  /></td>
    </tr>
        <tr>
      <td><label class="control-label">Location.</label></td>
        <td><input class="form-control" type="text" name="hotellocation" placeholder="Town/ Country/ Centre"  /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Description.</label></td>
        <td><input class="form-control" type="text" name="description" placeholder="Near abc road/ xyz building"  /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Hotel Photo.</label></td>
        <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btnsavehotel" class="btn btn-info btn-lg btn-block">
        <span class="glyphicon glyphicon-save"></span> &nbsp; save
        </button>
        </td>
    </tr>
    
    </table>
    
</form></center>
</div>

<div id="activate" class="tab-pane fade ">
	   <br><center><form method="POST">
    <label>Name of Hotel</label>
    <input type="text" placeholder="name of hotel to activate" name="hactivate" required/><br><br>
    <label>Email of Hotel</label>
    <input type="text" placeholder="email o hotel to activate" name="emactivate" required/><br><br>
  <button type="submit" class="btn btn-success  btn-lg btn-block" name="activatebtn" >
    <span class="glyphicon glyphicon-add-circle"></span> Activate</button>

      </form></center>
</div>

<div id="deactivate" class="tab-pane fade ">
    <br><center>
   <form method="POST">
    <label>Name of Hotel</label>
    <input type="text" placeholder="name of hotel to deactivate" name="hdeactivate" required/><br><br>
    <label>Email of Hotel</label>
    <input type="email" placeholder="email of hotel to deactivate" name="emdeactivate" required/><br><br>
  <button type="submit" class="btn btn-danger btn-lg btn-block" name="deactivatebtn" >
    <span class="glyphicon glyphicon-remove-circle"></span> Deactivate</button>

      </form></center>
</div>

<div id="remove" class="tab-pane fade ">
  <br><center>
   <?php
require_once 'dbconfig.php';
  
  $stmt = $DB_con->prepare('SELECT hotelname, email, location, description, hotelpic FROM hotels where status= :hstate ORDER BY hotelname ASC');
  $stmt->bindParam(':hstate',$status);
  $stmt->execute();
  
  if($stmt->rowCount() > 0)
  {
    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
    {
      extract($row);
      ?>
      <div class="col-xs-4 col-md-5 " id="hotelgroup">
        
        <i><img src="hotelpics/<?php echo $row['hotelpic']; ?>" class="img-rounded" id="hotelimage" alt="<?php echo $hotelname. ".jpg"; ?>"/></i>
        <p ><?php echo"Hotel Name:". $hotelname."&nbsp;<br>Location:".$location; ?></p>

        <p >
        <span>
        <a class="btn btn-danger" href="?hremove=<?php echo $row['hotelname']; ?>" title="remove hotel" onclick="return confirm('sure to remove hotel ?')"><span class="glyphicon glyphicon-remove-circle"></span> Remove Hotel</a>
        </p>
        
           </div>
       
      <?php
    }
  }
  else
  {
    ?>
        
          <div class="alert alert-warning">
              <span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Hotel Found ...
            </div>
        
        <?php
  }
  
?></center>
  </div>
 
</div>
</div>
    </div>
</div></div>
</div>
</div>
</body>
</html>