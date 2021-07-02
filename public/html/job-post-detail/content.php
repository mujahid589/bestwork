<?php
$id=param1;
$query=select("jobs","where jobid='$id'");
$row=records($query);

 ?>
<div class="margin">

</div>

<div class="container ">
  <div class="row  text-left">
    <div class="col-md-9">
      <div class="_card text-left" style="margin-bottom:0px !important">

      <h4><?php echo $row['jobtitle'] ?></h4>
      <small>Posted At: <?php echo $row['datetime'] ?></small>
      <p class="mt-3">
      <?php
      $tags = explode(',', $row['skills']);
      foreach ($tags as &$tag) {
        echo "<span class='skill m-1'>". $tag ."</span>";
      }
       ?>
     </p>
      </div>
      <div class="_card text-left" >
        <h5>Job Description:</h5>
      <p>
        <?php echo $row['description'] ?>
      </p>

<h5>Job Attachments</h5>

<?php
$jid=$row['jobid'];
$getAttachments=select("job_attachements","where jobid='$jid'");
$cJ=rows($getAttachments);
if ($cJ==0) {
  echo "No Additional Files";
}else {
  // code...
while($att=records($getAttachments)){

 ?>

<a href="/media/job-attachments/<?php echo $att['name'] ?>" target="_blank"> <?php echo $att['name'] ?> </a> <br>

 <?php
}
}

 ?>


<hr>
      <div class="row">
        <div class="col-md-2">
          <p>
        </p>
        </div>

        <div class="col-md-4">
          <div class="_card">
            <h1>
            <b><i class="fas fa-tag"></i></b>
            </h1>
            <h5> <?php echo $row['budget'] ?> $</h5>
          </div>
        </div>

        <div class="col-md-4">
          <div class="_card">
            <h1>
          <b>  <i class="fas fa-clock"></i></b>
        </h1>
        <h5>
        <?php
          if($row['time']=="1-week"){
            echo "Less than 1 Week";
          }
          else if($row['time']=="1-month") {
            echo "Less than 1 Month";
          }
          else if($row['time']=="1-3-months") {
            echo "1 to 3 Months";
          }
          else if($row['time']=="3-5-months") {
            echo "3 to 6 Months";
          }
          ?>
        </h5>
        </div>
        <div class="col-md-2">

        </div>

        <div class="clearfix">

        </div>
      </div>
    </div>
  </div>
    </div>


    <div class="col-md-3 _card text-left">

      <a href="/submit-proposal/<?php echo $jid ?>">
      <button class="blue_btn w-100">Submit Proposal</button>
    </a>

    <?php

    $qj=select("saved_jobs","where jobid='$id'");
    if(rows($qj)<1){
      ?>

      <button class="white_btn w-100 " id="saveBtn" style="border:2px solid #0A54A6;margin-top:10px" onclick="saveJob(<?php echo $id ?>)"> <i class="fa fa-heart"></i> Save Job </button>
    <?php
  }
  else {
    ?>
    <button class="white_btn w-100 " id="UnsaveBtn" style="background: green;color:white;  border:2px solid green;margin-top:10px"> <i class="fa fa-check-circle" ></i> Job Saved </button>
      <a href="javascript:void(0)" id="linktoj" onclick="unsaveJob(<?php echo $id ?>)">Unsave Job ?</a>
      <?php
    }

     ?>

     <button class="white_btn w-100 hidden" id="saveBtn2" style="border:2px solid #0A54A6;margin-top:10px" onclick="saveJob(<?php echo $id ?>)"> <i class="fa fa-heart"></i> Save Job </button>
     <button class="white_btn w-100 hidden" id="UnsaveBtn2" style="background: green;color:white;  border:2px solid green;margin-top:10px"> <i class="fa fa-check-circle" ></i> Job Saved </button>
      <div class="text-left">
        <br>
      <a href="/flag-job"> <i class="fa fa-flag"></i> Report Job as Abuse </a>
      <p >
      Connects Required : <b><?php echo $row['connects'] ?></b>
    </p>

      <hr>
      <h5>About The Client</h5>

      <?php
      $cid=$row['cid'];
      $getC=select("clients","where cid='$cid'");
      $row2=records($getC);
      $getJcounts=select("jobs","where cid='$cid'");
      $counts=rows($getJcounts);
       ?>
<p><b>
       Name:
     </b>
     <?php echo $row2['name'] ?> <br>
     <small>          <?php echo $row2['city'] ?>, <?php echo $row2['country'] ?>
        </small>
        <br>

        Jobs Posted: <?php echo $counts ?>
      </p>
      <p style="margin-top:10px">
        <b>
<?php
$trating=0;
$count=0;
$tcontracts=0;
$rev=select("contract","where cid='$cid' and (status='4' or status='5' or status='6') ");
$tjobs=rows($rev);
if($tjobs>0){
while($rdata=records($rev)){
$conid=$rdata['conid'];
$rating=select("reveiws","where contractid='$conid'");
if(rows($rating)==1){
$review=records($rating);
$trating=$trating+$review['ratingtoclient'];
$count++;
}
$tcontracts++;
}
echo "Rated: ". $trating/$count . " Out Of 5.00";
$avgrating=$trating/$count ;
}else {
echo "N/A";
}
?>
<i class="fa fa-star" ></i>
    </b>
  </p>
    </div>
  </div>
    <div class="clearfix">

    </div>

  </div>
</div>

<div class="margin">

</div>


<script type="text/javascript">

function saveJob(y){
  $(document).ready(function(){

  $.ajax({
    url:'/ajax-functions/save-job.php',
    type:'post',
    data:{
      purpose:'saveJob',
      jid:y
    },success:function(data){
      if(data=="success"){
        $('#UnsaveBtn2').show();
        $('#saveBtn').hide();
        $('#saveBtn2').hide();
      }
      else if(data=="failed"){

      }
}
});
});
}


function unsaveJob(y){
  $(document).ready(function(){

  $.ajax({
    url:'/ajax-functions/save-job.php',
    type:'post',
    data:{
      purpose:'unsaveJob',
      jid:y
    },success:function(data){
      if(data=="success"){
        $('#UnsaveBtn').hide();
        $('#linktoj').hide();
        $('#saveBtn2').show();
      }
      else if(data=="failed"){
      }
}
});
});
}

</script>
