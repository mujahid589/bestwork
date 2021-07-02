
<div class="container">
  <div class="row">
    <div class="col-md-12">



<div class="_card text-left">
<h4>Active Proposals - Interviews</h4>
<hr>
<?php
$query=select("proposals","where pid='$pid' and status='1'");
if(rows($query)>0){
while($prow=records($query)){


$id=$prow['jobid'];

$query=select("jobs","where jobid='$id'");
$row=records($query);
?>
<div class="row">
  <div class="col-md-5 ">
    <h5> <?php echo $row['jobtitle'] ?> <br>
    </h5>
  </div>
  <div class="col-md-2">
    Bid: <?php echo $prow['budget'] ?> $ - <?php echo $prow['deadline'] ?> days
  </div>
  <div class="col-md-3">
    <?php
    $queryt=select("proposals","where jobid='$id'"); ?>
    Total Bids: <?php echo rows($queryt) ?>
  </div>
  <div class="col-md-2">
    <a href="/job-post/<?php echo $id ?>">
    <label class="badge badge-info">View Job</label>
    </a>

    <label class="badge badge-info">Message Client</label>
  </div>
</div>
<hr>


<?php
}
} else {
  ?>
  You don't have any active proposals yet.
  <?php
}
?>

</div>

<div class="_card text-left">
<h4>Submitted Proposals </h4>
<hr>
<?php
$query=select("proposals","where pid='$pid' and status='0'");
while($prow=records($query)){


$id=$prow['jobid'];

$query=select("jobs","where jobid='$id'");
$row=records($query);
?>
<div class="row">
  <div class="col-md-5 ">
    <h5><?php echo $row['jobtitle'] ?><br>
      <!-- <small>Abdullah Omar</small> -->
    </h5>
  </div>
  <div class="col-md-2">
    Bid: <?php echo $prow['budget'] ?>$ - <?php echo $prow['deadline'] ?> days
  </div>
  <div class="col-md-3">
    <?php
    $queryt=select("proposals","where jobid='$id'"); ?>
    Total Bids: <?php echo rows($queryt) ?>
  </div>
  <div class="col-md-2">
    <a href="/job-post/<?php echo $id ?>">
    <label class="badge badge-info">View Job</label>
    </a>
  </div>
</div>
<hr>
<?php
}
?>



</div>

</div>
</div>
</div>
