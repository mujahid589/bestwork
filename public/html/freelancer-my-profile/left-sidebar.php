<div class="margin">

</div>

<div class="container">
  <div class="row">
    <div class="col-md-4">
      <div class="_card p-4">
            <div class="row">
              <div class="col-md-12">
                <img src="/media/users/professionals/mujahid.png" width="90" style="border-radius:50%" alt="">
              </div>
            </div>
            <br>
            <div class="row">

            <div class="col-md-8 border-right">
                <h4><b>Mujahid Farooq</b></h4>
            </div>
          <div class="col-md-4">
            <h4 class="dheading">
              <b>
            5 <i class="fa fa-star" style="font-size:18px;color:#ffb33e"></i>
          </b>
          </h4>
          </div>
          <div class="clearfix">
          </div>
<hr>
          </div>

        </div>
        <div class="_card p-4">
          <div class="progress" >
            <div class="progress-bar" style="width:50%;">On Time Completion: 50%</div>
          </div>
          <div class="progress" >
            <div class="progress-bar" style="width:70%;">On Time Delivery: 70%</div>
          </div>
          <div class="progress" >
            <div class="progress-bar" style="width:85%;">Response Time: 2h</div>
          </div>

        </div>
        <div class="_card p-4" >
          <ul class="verifications">
            <li> <i class="fa fa-check-circle"></i> Email verification </li>
            <li> <i class="fa fa-check-circle"></i> Phone Number </li>
            <li> <i class="fa fa-times-circle"></i> Government ID verification</li>
            <li> <i class="fa fa-check-circle"></i> Connected Facebook</li>
            <li> <i class="fa fa-times-circle"></i> Connected Twitter</li>
          </ul>
            <div class="progress profile-completion" >
              <div class="progress-bar" style="width:90%;background:#33B744 !important">Profile Completion: &nbsp; 90%</div>
            </div>
        </div>
        <div class="_card p-4">
          <div class="row">
            <div class="col-sm-9 text-left">
              <h4>Languages</h4>
            </div>
            <div class="col-sm-3">
              <button class="lang-btn" data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus"></i> </button>
            </div>
            <div class="clearfix">

            </div>
            <span id="lanerr"></span>
          </div>
          <div class="verifications" id="lng">
            <?php
            $uid=$user['uid'];
            $lang=select("languages","where uid='$uid' order by lid desc");
            while ($row=records($lang)) {
              ?>
              <li id="lan<?php echo $user['uid']; ?>"> <?php echo $row['language'] ?> - <?php echo $row['level'] ?> &nbsp; <i class="fa fa-trash trash" onclick='deletelang(<?php echo $user['uid'] ?>,<?php echo $row['lid'] ?>)'></i> </li>
              <?php
            }
             ?>
          </div>
        </div>

      </div>
