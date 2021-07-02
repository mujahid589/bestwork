<div class="container">
  <div class="row">

    <div class="col-md-12">
      <br>
      <h2>My Contracts</h2>
      <?php
      $query=select("contract","where pid='$pid'");
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
    }else {
      ?>
      <div class="margin">

      </div>
      <div class="row _card text-left">
        <div class="col-md-12 ">
          You don't have any contracts yet. <a href="/jobs">Find New Jobs ?</a>
        </div>
        </div>
        <div class="margin">

        </div>
      <?php
    }
      ?>

    </div>

  </div>
</div>
