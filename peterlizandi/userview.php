<!DOCTYPE  html>
<html lang="en">
<head>
  <title>Hotelapp</title>
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
    <br>
    <div class="panel panel-default" style="background-color:#afeeee;border:solid 2px #66cdaa; "> 
<div id="myrow">
      <ul class="nav nav-tabs nav-justified">
<li ><a type="button" class="btn btn-info" data-toggle="tab" href="#hotels"><span class="glyphicon glyphicon-home"></span>&nbsp All Hotels</a></li>
<li><a type="button" class="btn btn-info" data-toggle="tab"  href="#dev"><span class="glyphicon glyphicon-apple"></span>&nbsp Local Hotels</a></li>
<li><a type="button" class="btn btn-info" data-toggle="tab"  href="#ab"><span class="glyphicon glyphicon-hourglass"></span>&nbsp Trending events</a></li>
<li><a type="button" class="btn btn-info" data-toggle="tab"  href="#cn"><span class="glyphicon glyphicon-share"></span>&nbsp Reviews</a></li>
    </ul>
</div>
<div class="tab-content">
<div id="hotels" class="tab-pane fade in active row">
  <br />


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
        <p ><?php echo"Hotel Name:". $hotelname."&nbsp;<br>Location:".$location."&nbsp;<br>Description:".$description; ?></p>

        <p >
        <span>
        <a class="btn btn-info" href="editform.php?edit_id=<?php echo $row['hotelid']; ?>" title="click for edit" onclick="return confirm('sure to edit ?')"><span class="glyphicon glyphicon-eye-open"></span> View Services Offered</a> 
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
  
?>

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
<div id="ab" class="tab-pane fade ">
  <p>Thanks to Almighty God</p>
  <p>Thanks to Dedan Kimathi University of technology</p>
  <p>Thanks to friends and all who contributed in our researches and encouragements</p>
</div>
<div id="cn" class="tab-pane fade ">
  
    <address>
      animalkingdom,<br>
      animalkingdom@mail.com,<br>
      +254678943210 or +254102938475,<br>
    </address>
        <address>
      animalkingdom<br>
      kingdomanimal@mail.com<br>
      +254678942938 or +254103210475<br>
    </address>
    <address>P.O Box 123 - 0900 <br>Nyeri, Kenya</address>
 
</div>
</div>

</div>
  </div>

</div>
</body>

</html>