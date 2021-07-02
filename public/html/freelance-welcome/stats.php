
<div class="col-md-8">

<div class="_card text-left">
<h4>On Going Contracts</h4>
<hr>


<?php
$query=select("contract","where pid='$pid' and status='0'");
if(rows($query)>0){
while ($row=records($query)) {
    $conid=$row['conid'];
  $jid=$row['jid'];

  $query2=select("jobs","where jobid='$jid'");
  $jdata=records($query2);

  $query3=select("escrow","where contarctid='$conid'");
  $edata=records($query3);


  ?>

<div class="row _card text-left">
  <div class="col-md-5 ">
    <h5><?php echo $jdata['jobtitle'] ?> <br>
    </h5>
  </div>
  <div class="col-md-2">
    Price: <?php echo $edata['amount']; ?> $
  </div>
  <div class="col-md-3">
    <!-- Remaining Time: 3d, 2h -->
  </div>
  <div class="col-md-2">
    <?php if($row['status']==0){
      ?>
      <label class="badge badge-warning">Active</label>
      <?php
    }
    else if($row['status']==1 || $row['status']==2 || $row['status']==3){
      ?>
      <label class="badge badge-danger">Disputed</label>
      <?php
    }
    else if($row['status']==4 || $row['status']==5 || $row['status']==6){
      ?>
      <label class="badge badge-success">Ended</label>
      <?php
    }
    ?>

    <a href="/contract-detail/<?php echo $conid ?>">
    <label class="badge badge-info">View Contract</label>
    </a>
  </div>
</div>
<?php
}
}
else {
  ?>
  <p>You Don't have any on going contract</p>
  <?php
}
?>



</div>



<div class="_card text-left">
<h4>Active Proposals - Interviews</h4>
<a href="/submitted-proposals" class="badge badge-info">See All <i class="fa fa-arrow-right"></i> </a>
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


<hr>
</div>



<div class="_card text-left">
<h4>Submitted Proposals </h4>
<a href="/submitted-proposals" class="badge badge-info">See All <i class="fa fa-arrow-right"></i> </a>
<hr>
<?php
$query=select("proposals","where pid='$pid' and status='0'");
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


<hr>
</div>





</div>
<div class="clearfix">

</div>



</div>
</div>

<div class="margin">

</div>
