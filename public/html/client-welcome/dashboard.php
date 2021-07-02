

<div class="container">
<div class="row">
<div class="col-md-9">
<div class="_card text-left">

  <div class="row">

  <div class="col-md-8">

<h2>
Welcome <?php echo $user['name'] ?> !
</h2>
</div>
<div class="col-md-4">
<a href="post-a-job" >
    <?php
    if($client['status']==2){
        ?>
        <button class="blue_btn" style="margin-top:0px;margin-left: 55px" disabled>
            Post A Job
        </button>

        <?php
    }else{
    ?>
        <a href="post-a-job">

        <button class="blue_btn" style="margin-top:0px;margin-left: 55px">
            Post A Job
        </button>
        </a>
        <?php
    }
    ?>
</a>
</div>
<div class="clearfix">

</div>
</div>
<hr>
<div class="row">
<?php
$jobs=select("jobs","where cid='$cid'");
while ($row=records($jobs)) {
  ?>



<div class="col-md-12 ">
  <div class=row>
    <div class="col-md-6 ">
      <p>
        <?php echo $row['jobtitle'] ?>
      </p>
    </div>
    <div class="col-md-6">
      <?php
      $jid=$row['jobid'];
      $getProposals=select("proposals","where jobid='$jid'");
      $cP=rows($getProposals);
       ?>
      <a href="job-proposals/<?php echo $row['jobid'] ?>" >
        &nbsp;

      <button class="blue_btn" style="margin-top:1px">
        <?php echo $cP ?> Proposals
      </button>
      </a>
      <a href="job-post/<?php echo $row['jobid'] ?>" >

      <button class="blue_btn" style="margin-top:1px">
        Preview Job
      </button>
      </a>
    </div>
    <div class="clearfix">

    </div>
  </div>
  <hr>
</div>
<?php
}
?>

<div class="clearfix">

</div>
</div>



</div>
</div>
