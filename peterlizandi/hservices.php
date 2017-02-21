<?php
include("auth.php");
include("new.php");

?>
<!DOCTYPE  html>
<html lang="en">
<head>
  <title>hotel services management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8"> <meta name="viewport" content="width=device-width,initial-scale=1"> 


<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
 <script src="jquery.js">
</script>     
<script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
         <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> </head>
<link rel="stylesheet" type="text/css" href="styles.css">
<body style="background-image: url('grass.jpg');background-attachment:fixed ;">
<div class="container">

  <div class="well" style="background-color:#afeeee;font-size:20px;overflow:auto;">
    <h1 >Welcome <?php  echo $hname; ?></h1>
    <div class="panel panel-default" style="background-color:#afeeee;border:solid 2px #66cdaa; "> 
<div id="myrow">
      <ul class="nav nav-tabs nav-justified">
<li ><a type="button" class="btn btn-info" data-toggle="tab" href="#hotels"><span class="glyphicon glyphicon-home"></span>&nbsp Our Services</a></li>
<li><a type="button" class="btn btn-info" data-toggle="tab"  href="#dev"><span class="glyphicon glyphicon-apple"></span>&nbsp Our Advertisements</a></li>
    </ul>
</div>
<div class="tab-content">

<div id="hotels" class="tab-pane fade in active row">
  <br />
<div class="col-md-4" >
      <ul class="nav nav-pills nav-stacked" >
<li ><a type="button" class="btn btn-info" data-toggle="pill" href="#new">Add Service</a></li>
<li ><a type="button" class="btn btn-info" data-toggle="pill" href="#services">Our Services</a></li>
<li ><a type="button" class="btn btn-info" data-toggle="pill" href="#edit">Edit Service</a></li>
<li ><a type="button" class="btn btn-info" data-toggle="pill" href="#remove">Remove Service</a></li>
    </ul></div>
    <div class="col-md-8" >
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
      <td><label class="control-label">Service Name.</label></td>
        <td><input class="form-control" type="text" name="servicename" placeholder="Enter service name" /></td>
    </tr>

        <tr>
      <td><label class="control-label">Description.</label></td>
        <td><input class="form-control" type="text" name="description" placeholder="service description"  /></td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btnservicesave" class="btn btn-success btn-lg btn-block">
        <span class="glyphicon glyphicon-save"></span> &nbsp; Save
        </button>
        </td>
    </tr>
    
    </table>
    
</form></center>
</div>

<div id="services" class="tab-pane fade ">
     <br><center><form method="POST">
    <label>Name of Hotel</label><br>
    <input type="text" placeholder="name hotel to activate" name="activate" required/><br><br>
  <button type="submit" class="btn btn-success" name="activatebtn" >
    <span class="glyphicon glyphicon-add-circle"></span> Activate</button>

      </form></center>
</div>

<div id="edit" class="tab-pane fade ">
    <br><center>
   <form method="POST">
    <label>Name of Hotel</label><br>
    <input type="text" placeholder="name hotel to deactivate" name="hdeactivate" required/><br><br>
  <button type="submit" class="btn btn-danger" name="deactivatebtn" >
    <span class="glyphicon glyphicon-remove-circle"></span> Deactivate</button>

      </form></center>
</div>

<div id="remove" class="tab-pane fade ">
  <br><center>
   <form method="POST">
    <label>Name of Hotel</label><br>
    <input type="text" placeholder="name hotel to remove" name="hremove" required/><br><br>
  <button type="submit" class="btn btn-danger" name="removebtn" >
    <span class="glyphicon glyphicon-remove-circle"></span> Remove</button>

      </form></center>
  </div>
 
</div>
</div>
</div>

<div id="dev" class="tab-pane fade ">
<div class="media">
<a class="pull-left" href="#">
<img class="media-object img-circle" src="Nellie.jpg"
alt="nellie" style="height:150px;width:150px;">
</a>
<div class="media-body">
<address>
Nellie Wangari Ndung'u<br>
IT expert and Scientist<br>
+254123456789<br>
nellwangari123@mail.com<br>
</address>
</div>
<div class="media">
<a class="pull-left" href="#">
<img class="media-object img-circle" src="jack.jpg" 
alt="mwangejack" style="height:140px;width:140px;">
</a>
<div class="media-body">
<address>
Mwange Jack<br>
General Scientist<br>
+254109876543<br>
mwangejack@mail.com<br>
</address>
</div>
</div>
</div>

</div>
</div>

</div>
  </div>

</div>
</body>

</html>