<div class="container">
  <div class="row">
<?php
$sum=0;
    $query=select("contract","where pid='$pid'");
    while ($row=records($query)) {
        $conid=$row['conid'];
      $jid=$row['jid'];

      $query2=select("jobs","where jobid='$jid'");
      $jdata=records($query2);

      $query3=select("escrow","where contarctid='$conid' and status=1");
      $edata=records($query3);
      $sum=$sum + $edata['amount'];
}
      ?>


    <div class="col-md-12 p-5 _card ">
      <h1 class="display-3">You Earned:
        <?php echo $sum ?>$
      </h1>
    </div>

    <div class="col-md-12  text-left">
      <?php

      $query3=select("contract","where pid='$pid'");
      while ($row2=records($query3)) {
        $conid=$row2['conid'];
        $jid=$row2['jid'];

        $query21=select("jobs","where jobid='$jid'");
        $jdata2=records($query21);

        $query31=select("escrow","where contarctid='$conid' and status=1");
        $edata2=records($query31);

        ?>

        <div class="row">
      <div class="col-md-12 _card text-left">
        <div class="row">

      <div class="col-md-6">
      <h46>  <?php echo $jdata2['jobtitle'] ?>  </h6>
      </div>
      <div class="col-md-6 text-right">
        <p class="mt-0 mb-0">
       You Earned : <?php echo $edata2['amount'] ?> $
      </p>
      </div>
      <div class="clearfix">

      </div>
    </div>

    </div>
    </div>

  <?php } ?>


  </div>


  </div>
</div>
