
<div class="col-md-3 ">
  <div class="_card">
    <div class="row text-left">

      <div class="col-md-12">
        <h5> <?php echo $user['name'] ?> <br>
      <small>  <a href="my-profile" class="badge badge-info">View My Profile</a> </small>
    </h5>
      </div>
      <div class="clearfix">

      </div>
    </div>
  </div>
  <div class="_card p-4" >
    <ul class="verifications">
      <li> <i class="fa fa-check-circle"></i> Email verification </li>
      <li> <i class="fa fa-check-circle"></i> Phone Number </li>
      <li> <i class="fa fa-times-circle"></i> Govt. ID Verification</li>
      <li> <i class="fa fa-check-circle"></i> Connected Facebook</li>
      <li> <i class="fa fa-times-circle"></i> Connected Twitter</li>
    </ul>
      <div class="progress profile-completion" >
        <div class="progress-bar" style="width:90%;background:#33B744 !important">Profile Completion: &nbsp; 90%</div>
      </div>
  </div>
  <div class="_card text-left">
    <h5>Bids & Proposals</h5>
    <p>
      <?php
      $connects=select("connects","where pid='$pid'");
      $pcon=records($connects);

      $connects=select("proposals","where pid='$pid'");
      $pcon1=rows($connects);

      $connects=select("proposals","where pid='$pid' and status='1'");
      $pcon2=rows($connects);

       ?>
      Available Bids: <?php echo $pcon['total'] ?> <br>
      Submitted Proposals: <?php echo $pcon1 ?> <br>
      Active Proposals: <?php echo $pcon2 ?>
    </p>
  </div>


</div>


</div>
</div>

<div class="margin">

</div>
