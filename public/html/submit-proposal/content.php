<?php
$jid=param1;
$apply=true;
$query=select("jobs","where jobid='$jid'");
$row=records($query);

$check=select("proposals","where pid='$pid' and jobid='$jid'");
$pcount=rows($check);

$ccheck=select("connects","where pid='$pid'");
$cc=records($ccheck);
$avc=$cc['total'];
if ($avc<$row['connects']) {
  $apply=false;
}

 ?>
<div class="container">
        <h2 >Submit a Proposal</h2>
  <div class="_card text-left">
  <h3 style="font-weight:bold;">Proposal Requirements</h3>
  <hr>
<p>Your Available Connects:
  <b>
<?php
$qc=select("connects","where pid='$pid'");
$rc=records($qc);
echo $rc['total'];
?></b></p>
  <p>Proposal requires: <strong><?php echo $row['connects'] ?> connects</strong>
  <!-- <i class="logo-1"><img src="qlogo.jpg" width="20" >
  </i> -->
</p>
</div>
  <div class="col-md-12 col-12 _card text-left">
  <h3  >Job Details</h3>
  <hr>

  <div class="row">
  <div class="col-md-12 ">
<h4>
  <strong><?php echo $row['jobtitle'] ?></strong>
</h4>
  <span> Posted At: <?php echo $row['datetime'] ?></span><br><br>
  <p><?php
  $small = substr($row['description'], 0, 100);
  echo $small . "<a href='/job-post/". $jid ." '>........ View Job Posting</a>";
   ?></p>

   <hr>
  <strong>Skills And Expertise</strong><br><br>
  <?php
  $tags = explode(',', $row['skills']);
  foreach ($tags as &$tag) {
    echo "<span class='skill m-1'>". $tag ."</span>";
  }

   ?>
  </div>


<div class="col-md-12 col-12  text-left mt-3">
  <h5>Client's budget: <?php echo $row['budget'] ?>USD</h5>
  <hr>

<?php if($pcount==0){
  if ($apply==true) {
    ?>



<div class="row">

<div class="col-md-8">
<h5 class="mt-2">Your bidding price on this project</h4>
</div>
<div class="col-md-4">
  <div class="form-group">
    <input type="number" name="budget" class="form-control" id="budget" min="5" placeholder="Enter Amount" value="<?php echo $row['budget'] ?>">
    <label class="text-danger hidden" id="berr">Minimum Amount Should be 5$</label>
  </div>
  <p align="right">Bestwork Service Fee: <span id="fee"></span> <br>
    You'll Receive: <span id="receivable"></span>
   </p>

</div>

<div class="col-md-8">
  <h5 class="mt-2">How Long This Project Will Take</h4>
</div>
<div class="col-md-4">
  <style media="screen">
    .select{
      float: right
    }
  </style>
  <select class="form-control" id="deadline" name="time">
    <option value="">Please Select Time</option>
    <?php
    $a=1;
while ($a <= 60) {
?>
<option value="<?php echo $a ?>" ><?php echo $a ?> Days</option>
<?php
$a++;
}
     ?>
  </select>
  <br><br>
  <p class="text-danger text-right hidden" id="time">Please Select Time</p>
</div>

<div class="col-md-12">
  <div class="margin">

  </div>  <div class="form-group">
<h5>Write Cover Letter</h5>
<textarea name="cover" class="form-control" style="min-height:250px" placeholder="Enter Details" id="proposal"></textarea>
<p class="text-danger hidden" id="perror">Please Write Proposal</p>
</div>

<div class="form-group">
  <input class="blue_btn" type="button" name="submit" id="submit" value="Submit & proposal">

</div>
<div class="alert alert-success hidden" id="success">
  Proposal Has Submitted Successfully. Redirecting towards Job Feed.
</div>
</div>

<div class="clearfix">

</div>


</div>
<?php
}else {
  ?>

  <div class="margin">

  </div>

  <h2 class="text-center">
  <i class="fa fa-times-circle text-danger" style="font-size:132px"></i> <br> <br>
  You Don't Have Enough Connects To Apply Proposal On This Job
  </h2>

  <div class="margin">

  </div>


  <?php
}
}

 else {
  ?>


<div class="margin">

</div>

<h2 class="text-center">
<i class="fa fa-check-circle text-success" style="font-size:132px"></i> <br> <br>
You Already Have Applied This Job
</h2>

<div class="margin">

</div>

<?php
}?>


</div>
</div>
</div>
</div>


<script type="text/javascript">
var tamount;
var fee;
var rec ;
$(document).ready(function(){
  tamount= $('#budget').val();
  fee= Math.round(tamount * 0.2);
  rec= Math.round(tamount-fee);

  $('#fee').html(fee +"$");
  $('#receivable').html(rec+"$");


  $('#budget').on('input',function(){

    tamount= $('#budget').val();
    if(tamount<5){
      fee= Math.round(tamount * 0.2);
      rec= Math.round(tamount-fee);
      $('#fee').html(fee+"$");
      $('#receivable').html(rec+"$");
      $('#budget').css("border-color","red");
      $('#berr').show();
      $('#berr').html('Minimum Amount Should be 5$');
    }else {
        tamount=  $(this).val();
        fee= Math.round(tamount * 0.2);
        rec= Math.round(tamount-fee);
      $('#fee').html(fee+"$");
      $('#receivable').html(rec+"$");
      $('#budget').css("border-color","#ced4da");
      $('#berr').hide();
    }
  });
  });

  $('#submit').on('click',function(){
    if($('#budget').val()==""){
      $('#budget').css("border-color","red");
      $('#berr').show();
      $('#berr').html('Please write budget');
    }
    else if($('#deadline').val()==""){
      $('#time').show();
    }
    else if($('#proposal').val()==""){
      $('#proposal').css("border-color","red");
      $('#perror').show();
    }else {
      var budget = $('#budget').val();
      var deadline = $('#deadline').val();
      var proposal = $('#proposal').val();
      $.ajax({
        url:'/ajax-functions/submit-proposal.php',
        method:'post',
        data:{
          jobid:<?php echo $jid ?>,
          pid:<?php echo $pid ?>,
          proposal:proposal,
          budget:budget,
          deadline:deadline,
          connects:<?php echo $row['connects'] ?>
        },success:function(data){
          if (data=="success") {
            $('#success').removeClass('alert alert-danger');
            $('#success').addClass('alert alert-success');
            $('#success').show();
            $('#success').html('Proposal Has Submitted Successfully. Redirecting towards Job Feed.');
            setTimeout(function(){
              window.location.href="/jobs";
            },2000)
          }else {
            $('#success').removeClass('alert alert-success');
            $('#success').show();
            $('#success').addClass('alert alert-danger');
            $('#success').html('something went wrong. Please try again later.');
          }
        }
      })
    }
  });

</script>
