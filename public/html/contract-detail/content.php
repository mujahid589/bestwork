<?php
$msg="";
$ccid=param1;
$cc=select("contract","where conid='$ccid'");
$cdata=records($cc);
$jid=$cdata['jid'];
$ppid=$cdata['conid'];
$proid=$cdata['pid'];
$clid=$cdata['cid'];
$offid=$cdata['offid'];
$dt=$cdata['datetime'];

// Getting Job Data
$jd=select("jobs","where jobid='$jid'");
$jrow=records($jd);

// Getting Offer Details
$od=select("offer","where offid='$offid'");
$orow=records($od);

// Getting Escrow Details
$ed=select("escrow","where contarctid='$ccid'");
$erow=records($ed);

// Getting Professional Details
$pd=select("profs","where pid='$proid'");
$prow=records($pd);

// Getting Professional User Details
$uid=$prow['uid'];
$ud=select("users","where uid='$uid'");
$purow=records($ud);

// Getting Client Details
$cd=select("clients","where cid='$clid'");
$crow=records($cd);

// Getting Client Details
$cuid=$crow['uid'];
$cud=select("users","where uid='$cuid'");
$curow=records($cud);


if (isset($_POST['submit'])) {
  extract($_POST);
  $target_dir = "media/work-attachments/";
  // $filename=basename($_FILES["file"]["name"]);
  $fname=$_FILES['file']['name'];
  $target_file = $target_dir . basename($fname);
  $datetime=date('Y-m-d H:i:s') ;

  if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.$_FILES['file']['name'])) {
    $q=insert("work_submissions","contractid,message,file,datetime,status","'$ccid','$details','$fname','$datetime','0'");
    if ($q) {
      $msg=success("Work Has Submitted Successfully for payment.");
    }
  }
}

if (isset($_POST['submitfeedclient'])) {
  $crating=$_POST['crating'];
  $trating=$_POST['trating'];
  $qrating=$_POST['qrating'];
  $totalrating=$crating+$trating+$qrating;
  $avg=$totalrating/3;
  $cfd=$_POST['detailsclientfeed'];
  $upReview=insert("reveiws","contractid,ratingtopro,feedbacktopro","'$ccid','$avg','$cfd'");
  $upStatus=update("contract","status='5' where conid='$ccid'");
  if($upReview && $upStatus){
    $msg=success("Your feedback has updated successfully");
  }
  else{
    $msg=error("Something went wrong. Please Try again later");
  }
}


if (isset($_POST['submitfeedpro'])) {
  $pcrating=$_POST['pcrating'];
  $ptrating=$_POST['ptrating'];
  $pqrating=$_POST['pqrating'];
  $ptotalrating=$pcrating+$ptrating+$pqrating;
  $pavg=$ptotalrating/3;
  $pcfd=$_POST['detailsprofeed'];
  $upReview=update("reveiws","ratingtoclient='$pavg',feedbacktoclient='$pcfd' where contractid='$ccid'");
  $upStatus=update("contract","status='6' where conid='$ccid'");
  if($upReview && $upStatus){
    $msg=success("Your feedback has updated successfully");
  }
  else{
    $msg=error("Something went wrong. Please Try again later");
  }
}


 ?>

<div class="container">
  <div class="_card">
  <div class="row  text-left">
    <div class="col-md-12">

    <?php if(!empty($msg)){
      echo $msg;
    } ?>
    <div class="alert alert-danger hidden" id="messages">

    </div>
  </div>
    <div class="col-md-6">
      <h2><?php echo $orow['title'] ?></h2>
    </div>
    <div class="col-md-6 text-right">
      <h2>
        <?php if(fLoggedin()){
          ?>
          <i class="fa fa-user"></i>
          <?php echo $curow['name'] ?> <br>

          <?php
        }
        else{

          ?>
          <i class="fa fa-user"></i>
          <?php echo $purow['name'] ?> <br>
          <small><?php echo $prow['title'] ?></small>
          <?php

        }
        ?>
  </h2>
    </div>
    <div class="col-md-12 mt-3">
      <ul class="nav nav-pills" id="protabs">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="pill" href="#flamingo" role="tab" aria-controls="pills-flamingo" aria-selected="true">Terms & Settings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="pill" href="#cuckoo" role="tab" aria-controls="pills-cuckoo" aria-selected="false">Messages & Files</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="pill" href="#ostrich" role="tab" aria-controls="pills-ostrich" aria-selected="false">Feedback</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="pill" href="#submiss" role="tab" aria-controls="pills-submiss" aria-selected="false">Work Submissions</a>
          </li>
          <?php if($cdata['status']==6  || $cdata['status']==5 || $cdata['status']==4) {?>
          <?php } else { ?>

          <li class="dropdown nav-item">
              <i class="fas fa-ellipsis-h dropdown-toggle mt-1 h3" data-toggle="dropdown"></i>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="javascript:void(0)" onclick="endContract('<?php echo $ccid ?>')"> <i class="fa fa-check"></i> End Contract</a>
              <?php if (isset($cid)) {
                ?>
              <a class="dropdown-item" href="javascript:void(0)" onclick="cancelContract('<?php echo $ccid ?>')"> <i class="fa fa-times"></i> <?php if(isset($pid)) { ?>Refund Client & <?php } ?> Cancel Contract</a>
              <?php
            } if (isset($pid)) {
              ?>
              <a class="dropdown-item" href="javascript:void(0)" onclick="cancelContractFree('<?php echo $ccid ?>')"> <i class="fa fa-times"></i> <?php if(isset($pid)) { ?>Refund Client & <?php } ?> Cancel Contract</a>
              <?php
            } ?>
            </div>
          </li>
        <?php } ?>
        </ul>


        <p class="text-danger mt-2">
          <?php if(isset($cid) && $cdata['status']==1){ ?>
            Cancellation Request Sent to Professional. Awaiting Response
            <?php } ?>
            <?php if(isset($pid) && $cdata['status']==1){ ?>
              Client Wants to Cancel Project. <br>
              <a href="javascript:void(0)" onclick="cancelContractFree(<?php echo $ccid ?>)" class="btn btn-default border"> <i class="fa fa-check text-success"></i> Accept </a>
              <a href="javascript:void(0)" onclick="declineCancel(<?php echo $ccid ?>)" class="btn btn-default border"> <i class="fa fa-times text-danger"></i> Decline </a>
            <?php } ?>

            <?php if(isset($cid) && $cdata['status']==2){ ?>
              Freelancer Accepted Cancellation Request. Funds Returned to Your Account.
            <?php } if(isset($pid) && $cdata['status']==2){ ?>
                Project Cancelled.               <?php } ?>

                <?php if(isset($cid) && $cdata['status']==3){ ?>
                  Cancellation Request Declined. <a href="/support"> Contact Support ? </a>
                <?php } if(isset($pid) && $cdata['status']==3){ ?>
                    You Declined Cancellation Request.
                  <?php }
                  if($cdata['status']==6){
                    echo "<span class='text-success'>Contract Ended</span>";
                  }
                   ?>


        </p>

    </div>

    <div class="clearfix">

    </div>
  </div>
  </div>

  <div class="row">
    <div class="col-md-8 ">
      <div class="_card">

        <div class="tab-content mt-3" >
                <div class="tab-pane fade show active" id="flamingo" role="tabpanel" aria-labelledby="flamingo-tab">

                  <div class="row">
                    <div class="col-md-6 text-left mb-5">
                      <h6>Contract ID: <?php echo $ccid ?> </h6>
                      <h6>Offer ID: <?php echo $offid ?> </h6>
                      <h6>Started At: <?php echo $dt ?> </h6>
                      <!-- <h6>Job ID: <?php echo $jid ?> </h6>
                      <h6>Proposal ID: <?php echo $ppid ?> </h6> -->
                    </div>
                    <div class="col-md-6"><?php
                    if(isset($pid)){
                     ?>
                      <button class="blue_btn" data-toggle="modal" data-target="#addoff">Submit Work For Payment</button>
                    <?php } ?>
                    </div>

                    <div class="col-md-6">
                      <h4>Amount in Escrow</h4>
                      <h2><?php if($erow['status']==0){ echo $erow['amount'];} else {
                        echo "0";
                      } ?>$</h2>
                    </div>

                    <div class="col-md-4">
                      <?php if(isset($pid)){
                        ?>
                        <h4>You Earned</h4>
                        <?php
                      }else {
                        ?>
                        <h4>You Paid</h4>
                        <?php
                      } ?>
                      <h2><?php if($erow['status']==1){echo $erow['amount'];} else {
                        echo "0";
                      } ?>$</h2>
                    </div>


                  </div>

                </div>
                <div class="tab-pane fade" id="cuckoo" role="tabpanel" aria-labelledby="profile-tab">
                  The cuckoos are generally medium-sized slender birds. Most species live in trees, though a sizeable minority are ground-dwelling. The family has a cosmopolitan distribution, with the majority of species being tropical.
                </div>
                <div class="tab-pane fade" id="ostrich" role="tabpanel" aria-labelledby="ostrich-tab">
                  <?php if($cdata['status']==0 || $cdata['status']==1 || $cdata['status']==2 || $cdata['status']==3){
                    ?>
                  <div class="text-center " >
                    <img src="/media/icons/feedback.png" width="100" alt="">
                    <h4 class="mt-4">Feedback Option will be Available after Completion of Contract</h4>
                  </div>
                  <?php
                  } ?>

                  <?php if($cdata['status']==4){
                    ?>
                    <div class="text-center " >
                      <img src="/media/icons/feedback.png" width="100" alt=""> <i class="fa fa-check-circle mt-5" style="font-size: 90px;color: green;position: relative;top: 20px;}"></i>
                      <h4 class="mt-4">Contract Ended. <?php if(isset($cid)){ ?> <a href="javascript:void(0)" data-toggle="modal" data-target="#reviewPro">Write Feedback to Freelancer</a> <?php } else{ ?> Awaiting Feedback from Client. <?php } ?></h4>
                    </div>
                  <?php }
                   ?>

                   <?php if($cdata['status']==5){
                     ?>
                     <img src="/media/icons/feedback.png" width="100" alt="">
                     <?php if(isset($cid)){
                       ?>
                       Your Feedback is hidden until Freelancer Do Not Write Review Back.
                       <?php
                     } else {
                       ?>
                       Client's Feedback is Hidden Until You do not write Review.
                       <br>
                      <a href="javascript:void(0)" data-toggle="modal" data-target="#reviewClient">Write Review </a>
                       <?php
                     } ?>
                     <?php
                    }
                      ?>
                      <?php if($cdata['status']==6){
                        $getReview=select("reveiws","where contractid='$ccid'");
                        $rData=records($getReview);
                        $clientrating=$rData['ratingtoclient'];
                        $prorating=$rData['ratingtopro'];
                        ?>

                  <div class="text-left">
                    <div class="">
                      <h5>Client's Feedback to Professional</h5>
                      <p>
                      <?php
                      for ($i=0; $i <$prorating ; $i++) {
                        ?>
                        <i class="fa fa-star"></i>
                        <?php
                      } echo $prorating;
                       ?>
                      </p>
                      <p>
                        <?php echo $rData['feedbacktopro'] ?>
                      </p>
                    </div>


                    <hr>
                    <div class="">
                      <h5>Professional's Feedback to Client</h5>
                      <p>
                      <?php
                      for ($i=0; $i <$clientrating ; $i++) {
                        ?>
                        <i class="fa fa-star"></i>
                        <?php
                      } echo $clientrating;
                       ?>
                      </p>                      <p>
                        <?php echo $rData['feedbacktoclient'] ?>

                      </p>
                    </div>
                  </div>
                  <?php
                 }
                   ?>



                </div>

                <div class="tab-pane fade" id="submiss" role="tabpanel" aria-labelledby="submiss-tab">

                  <?php

                  $getFiles=select("work_submissions","where contractid='$ccid' order by datetime desc");
                  while ($wrow=records($getFiles)) {
                   ?>

                  <div class="row">
                    <div class="col-md-8 text-left">
                      <h5>Message to Client</h5>
                      <?php if (isset($pid)){ ?>
                        Status:
                        <?php if($wrow['status']==0){
                          ?>
                          <b>
                      </b>
                      <small class="text-info">Awaiting Response From Client</small>
                      <?php
                    }else if($wrow['status']==1){ ?><small class="text-danger">Client Asked For Revision</small>
                  <?php }else if($wrow['status']==2){ ?>
                      <small class="text-success">Client Accepted Delivery</small>
                    <?php }} ?>
                      <p>
                        <?php echo nl2br($wrow['message'] )?>
                      </p>
                      <hr>
                    </div>
                    <div class="col-md-4 text-left">
                      <h4>Attached File</h4>
                      <a href="/media/work-attachments/<?php echo $wrow['file'] ?>" target="_blank"><?php echo $wrow['file'] ?></a><br>
                      Submitted At: <?php echo $wrow['datetime'] ?>

                      <?php
                      if(isset($cid) && $wrow['status']==0){
                        ?>
                        <button class=" blue_btn  mt-1 " onclick="AccDelivery(<?php echo $wrow['subid'] ?>,<?php echo $proid ?>)">Accept Delivery</button>
                        <button class="blue_btn  mt-1 "  onclick="sendRevision(<?php echo $wrow['subid'] ?>,<?php echo $proid ?>)">Send Revision</button>
                        <?php
                      }
                       ?>

                    </div>
                    <div class="clearfix">

                    </div>
                  </div>
                  <?php
                }
                ?>


                </div>



        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="_card text-left">
        <h5>
          <?php echo $jrow['jobtitle'] ?>
        </h5>
        <p>
          <?php echo
          substr($jrow['description'], 0, 100) . "....."
          ?>
        </p>
        <a href="#">View Proposal</a> | <a href="/job-post/<?php echo $jid ?>">View Job Posting</a>
      </div>

    </div>
    <div class="row">

    </div>
  </div>


</div>



<div class="modal fade" id="addoff" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content text-left">
      <div class="modal-header">
      <h4>Submit Work for Payment</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="alert alert-danger hidden" id="err">

            </div>
            <form  method="post" enctype="multipart/form-data">

                    <div class="form-group">
                      <label>Message to Client</label><br/>
                      <textarea class="form-control"  name="details" id="name" required placeholder="Enter Details"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Attache File</label><br/>
                      <input class="form-control" type="file" name="file" id="file" required/>
                      </div>
                      <div class="form-group">
                        <input class="blue_btn" type="submit" name="submit" id="submit" value="Submit work"/>
                  </div>
                </form>


          </div>
        <div class="clearfix">

        </div>
      </div>

    </div>
  </div>
</div>
</div>



<div class="modal fade" id="reviewPro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content text-left">
      <div class="modal-header">
        <h4>Write Review to Freelancer</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <form  method="post" enctype="multipart/form-data" id="myFeedForm">

                    <div class="form-group">
                      <label>Communication Skills</label>
                      <br>
                      <input type="radio" name="crating" class="hidden" value="1"  id="crating1">
                      <label for="crating1"> 1 </label>
                      <input type="radio" name="crating" class="hidden" value="2" id="crating2">
                      <label for="crating2"> 2 </label>
                      <input type="radio" name="crating" class="hidden" value="3" id="crating3">
                      <label for="crating3"> 3 </label>
                      <input type="radio" name="crating" class="hidden" value="4" id="crating4">
                      <label for="crating4"> 4 </label>
                      <input type="radio" name="crating" class="hidden" value="5" id="crating5">
                      <label for="crating5"> 5 </label>
                    </div>

                    <div class="form-group">
                      <label>Quality of Work</label>
                      <br>
                      <input type="radio" name="qrating" class="hidden" value="1"  id="qrating1">
                      <label for="qrating1"> 1 </label>
                      <input type="radio" name="qrating" class="hidden" value="2" id="qrating2">
                      <label for="qrating2"> 2 </label>
                      <input type="radio" name="qrating" class="hidden" value="3" id="qrating3">
                      <label for="qrating3"> 3 </label>
                      <input type="radio" name="qrating" class="hidden" value="4" id="qrating4">
                      <label for="qrating4"> 4 </label>
                      <input type="radio" name="qrating" class="hidden" value="5" id="qrating5">
                      <label for="qrating5"> 5 </label>
                    </div>

                    <div class="form-group">
                      <label>On Time Delivery</label>
                      <br>
                      <input type="radio" name="trating" class="hidden" value="1"   id="trating1">
                      <label for="trating1"> 1 </label>
                      <input type="radio" name="trating" class="hidden" value="2" id="trating2">
                      <label for="trating2"> 2 </label>
                      <input type="radio" name="trating" class="hidden" value="3" id="trating3">
                      <label for="trating3"> 3 </label>
                      <input type="radio" name="trating" class="hidden" value="4" id="trating4">
                      <label for="trating4"> 4 </label>
                      <input type="radio" name="trating" class="hidden" value="5" id="trating5">
                      <label for="trating5"> 5 </label>
                    </div>

                    <div class="form-group">
                      <label>Feedback to Freelancer</label><br/>
                      <textarea class="form-control"  name="detailsclientfeed" id=""  placeholder="Enter Details"></textarea>
                    </div>
                      <div class="form-group">
                        <input class="blue_btn" type="submit" name="submitfeedclient" id="submitFeed" value="Submit Feedback"/>
                  </div>
                </form>


          </div>
        <div class="clearfix">

        </div>
      </div>

    </div>
  </div>
</div>
</div>


<div class="modal fade" id="reviewClient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content text-left">
      <div class="modal-header">
      <h4>Write Review to Client</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="alert alert-danger hidden" id="err">

            </div>
            <form  method="post" enctype="multipart/form-data" id="formProFeed">

              <div class="form-group">
                <label>Communication Skills</label>
                <br>
                <input type="radio" name="pcrating" class="hidden" value="1"  id="pcrating1">
                <label for="pcrating1"> 1 </label>
                <input type="radio" name="pcrating" class="hidden" value="2" id="pcrating2">
                <label for="pcrating2"> 2 </label>
                <input type="radio" name="pcrating" class="hidden" value="3" id="pcrating3">
                <label for="pcrating3"> 3 </label>
                <input type="radio" name="pcrating" class="hidden" value="4" id="pcrating4">
                <label for="pcrating4"> 4 </label>
                <input type="radio" name="pcrating" class="hidden" value="5" id="pcrating5">
                <label for="pcrating5"> 5 </label>
              </div>

              <div class="form-group">
                <label>Quality of Work</label>
                <br>
                <input type="radio" name="pqrating" class="hidden" value="1"  id="pqrating1">
                <label for="pqrating1"> 1 </label>
                <input type="radio" name="pqrating" class="hidden" value="2" id="pqrating2">
                <label for="pqrating2"> 2 </label>
                <input type="radio" name="pqrating" class="hidden" value="3" id="pqrating3">
                <label for="pqrating3"> 3 </label>
                <input type="radio" name="pqrating" class="hidden" value="4" id="pqrating4">
                <label for="pqrating4"> 4 </label>
                <input type="radio" name="pqrating" class="hidden" value="5" id="pqrating5">
                <label for="pqrating5"> 5 </label>
              </div>

              <div class="form-group">
                <label>On Time Delivery</label>
                <br>
                <input type="radio" name="ptrating" class="hidden" value="1"   id="ptrating1">
                <label for="ptrating1"> 1 </label>
                <input type="radio" name="ptrating" class="hidden" value="2" id="ptrating2">
                <label for="ptrating2"> 2 </label>
                <input type="radio" name="ptrating" class="hidden" value="3" id="ptrating3">
                <label for="ptrating3"> 3 </label>
                <input type="radio" name="ptrating" class="hidden" value="4" id="ptrating4">
                <label for="ptrating4"> 4 </label>
                <input type="radio" name="ptrating" class="hidden" value="5" id="ptrating5">
                <label for="ptrating5"> 5 </label>
              </div>

              <div class="form-group">
                <label>Feedback to Freelancer</label><br/>
                <textarea class="form-control"  name="detailsprofeed" id=""  placeholder="Enter Details"></textarea>
              </div>
                <div class="form-group">
                  <input class="blue_btn" type="submit" name="submitfeedpro" id="submitFeedpro" value="Submit Feedback"/>
                </div>

            </form>


          </div>
        <div class="clearfix">

        </div>
      </div>

    </div>
  </div>
</div>
</div>

<script type="text/javascript">

function AccDelivery(v,x){
  $.ajax({
    url:'/ajax-functions/work_submissions.php',
    method:'post',
    data:{
      purpose:"accWork",
      id:v,
      proid:x
    },success:function(data){
      if (data=="failedToUpdate") {
        $('#messages').show();
        $('#messages').html("Something went wrong while updating delivery status. Please Try again later");
      }
      else if(data=="failedToEscrow"){
        $('#messages').show();
        $('#messages').html("Something went wrong while updating escrow status. Please Contact Support");
      }
      else if(data=="failedToClear"){
        $('#messages').show();
        $('#messages').html("Something went wrong while transferring funds to freelancer. Please Contact Support");
      }
      else if(data=="success"){
        $('#messages').show();
        $('#messages').addClass("alert-success");
        $('#messages').removeClass("alert-danger");
        $('#messages').html("Delivery Accepted Successfully and funds have transferred to freelancer.");
      }
    }
  });
}

function sendRevision(v,x){
  $.ajax({
  url:'/ajax-functions/work_submissions.php',
  method:'post',
  data:{
    purpose:"revWork",
    id:v,
    proid:x
  },success:function(data){
    if (data=="success") {
      $('#messages').show();
      $('#messages').html("Revision sent Successfully.");
      $('#messages').addClass("alert-success");
      $('#messages').removeClass("alert-danger");
    }else if(data=="failed"){
      $('#messages').show();
      $('#messages').html("Something went wrong while updating delivery status. Please Try again later");
    }
  }
});

}



function endContract(v){

  $.ajax({
  url:'/ajax-functions/contracts.php',
  method:'post',
  data:{
    purpose:"endCont",
    id:v,
  },success:function(data){
    if (data=="success") {
      $('#messages').show();
      $('#messages').html("Contract Ended Successfully.");
      $('#messages').addClass("alert-success");
      $('#messages').removeClass("alert-danger");
      setTimeout(function(){
        window.location.href="/contract-detail/<?php echo $ccid; ?>";
      },3000);
    }
    else {
      $('#messages').show();
      $('#messages').html("Something went wrong while ending contract. Please Try again later");
    }
  }
});

}




function cancelContract(v){

  $.ajax({
  url:'/ajax-functions/contracts.php',
  method:'post',
  data:{
    purpose:"cancelCont",
    id:v,
  },success:function(data){
    if (data=="success") {
      $('#messages').show();
      $('#messages').html("Contract Cancellation Requst Send to Freelancer Successfully.");
      $('#messages').addClass("alert-success");
      $('#messages').removeClass("alert-danger");
      setTimeout(function(){
        window.location.href="/contract-detail/<?php echo $ccid; ?>";
      },3000);
    }
    else {
      $('#messages').show();
      $('#messages').html("Something went wrong while cancelling contract. Please Try again later");
    }

  }
  });
}
function cancelContractFree(v){

  $.ajax({
  url:'/ajax-functions/contracts.php',
  method:'post',
  data:{
    purpose:"cancelContFree",
    id:v,
  },success:function(data){
    if (data=="success") {
      $('#messages').show();
      $('#messages').html("Contract Cancelled Successfully.");
      $('#messages').addClass("alert-success");
      $('#messages').removeClass("alert-danger");
      setTimeout(function(){
        window.location.href="/contract-detail/<?php echo $ccid; ?>";
      },3000);
    }
    else {
      $('#messages').show();
      $('#messages').html("Something went wrong while cancelling contract. Please Try again later");
    }

  }
  });
}


function declineCancel(v){

  $.ajax({
  url:'/ajax-functions/contracts.php',
  method:'post',
  data:{
    purpose:"decCont",
    id:v,
  },success:function(data){
    if (data=="success") {
      $('#messages').show();
      $('#messages').html("Contract Cancellation Request Declined Successfully.");
      $('#messages').addClass("alert-success");
      $('#messages').removeClass("alert-danger");
      setTimeout(function(){
        window.location.href="/contract-detail/<?php echo $ccid; ?>";
      },3000);
    }
    else {
      $('#messages').show();
      $('#messages').html("Something went wrong while cancelling contract. Please Try again later");
    }

  }
  });
}


$('#myFeedForm').submit(function(){
  var crating=$('input[name=crating]:checked', '#myFeedForm').val();
  var qrating=$('input[name=qrating]:checked', '#myFeedForm').val();
  var trating=$('input[name=trating]:checked', '#myFeedForm').val();
  if(crating==undefined ){
    alert("Please select all ratings to continue");
    return false;
  }else if(qrating==undefined){
    alert("Please select all ratings to continue");
    return false;
  }else if (trating==undefined) {
    alert("Please select all ratings to continue");
    return false;
  }
  else{
      return true;
  }

});


$('#formProFeed').submit(function(){
  var crating=$('input[name=pcrating]:checked', '#formProFeed').val();
  var qrating=$('input[name=pqrating]:checked', '#formProFeed').val();
  var trating=$('input[name=ptrating]:checked', '#formProFeed').val();
  if(crating==undefined ){
    alert("Please select all ratings to continue");
    return false;
  }else if(qrating==undefined){
    alert("Please select all ratings to continue");
    return false;
  }else if (trating==undefined) {
    alert("Please select all ratings to continue");
    return false;
  }
  else{
      return true;
  }

});

</script>
