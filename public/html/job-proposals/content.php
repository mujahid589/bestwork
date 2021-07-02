<section>
          <div class="container">

<?php
$jid=param1;
$getjob=select("jobs","where jobid='$jid'");
$job=records($getjob);
$getProposal=select("proposals","where jobid='$jid' order by datetime Desc");
$tp=rows($getProposal);
?>

<div class="row _card py-4 text-left ">
  <h4>
  <?php echo $job['jobtitle'] ?> <br>
  <small>Total Proposals: <?php echo $tp; ?></small>
</h4>
</div>
<?php
// $getProposal=select("proposals","where jobid='$jid'");
// $tp=rows($getProposal);
if ($tp==0) {
  ?>


              <div class="row _card  py-5 my-5 ">
                <h4>No One Submitted Proposal on this job yet.</h4>
                </div>
              </div>
  <?php
}
  else {
while($row=records($getProposal)){
  $pid=$row['pid'];
  $getPdata=select("profs","where pid='$pid'");
  $pro=records($getPdata);
  $uid=$pro['uid'];
  $getUdata=select("users","where uid='$uid'");
  $u=records($getUdata);

  ?>




            <div class="row _card text-left">

                <div class="col-md-2 ">
                  <div class="client-image" style="position:relative;">
                    <div class="avatar-preview">
                        <div  style="background-image: url('/media/users/professionals/<?php if(!empty($pro['image'])){echo $pro['image'];}else{echo 'profile-user.png'  ;} ?>');">

                        </div>
                    </div>

                    <!-- <img src="" class="img-fluid avatar" alt=""> -->
                </div>
              </div>
                <div class="col-md-7">
                    <div class="spa">
                        <span class="sp1"><?php echo $u['name'] ?></span>
                        <p class="p1"><?php echo $pro['title'] ?> <br><span style="font-weight: 400;"><?php echo $pro['city']. ", ". $pro['country'] ?></span></p>

                        <p class="p2">  <span >$<?php echo $row['budget'] ?></span> </p>
                        <p>
                            <i class="fas fa-envelope"></i>
                            <span> Sent <?php echo time_elapsed_string($row['datetime']) ?></span><br>
                            <span >Cover letter</span>
                            <span > - <?php echo $row['proposal'] ?>
                        </p>
                    </div>
                </div>
                <div class="col-md-3 _card">
                  <br>
                  <a href="/professional/<?php echo $u['username'] ?>" target="_blank">
                  <button class="blue_btn w-100">View Profile <i class="fa fa-user-circle"></i> </button>
                  </a>
                  <a href="/offer/<?php echo $row['ppid'] ?>">
                  <button class="white_btn w-100 " style="border:2px solid #0A54A6;margin-top:10px"> Hire  <i class="fa fa-heart"></i></button>
                  </a>
                  <a href="/messages/<?php echo $row['ppid'] ?>">
                  <button class="blue_btn w-100" style="border:2px solid #0A54A6;margin-top:10px">Interview  <i class="fa fa-paper-plane"></i> </button>
                  </a>

                </div>
            </div>
              <?php
            }
            }
             ?>
          </div>
      </section>
