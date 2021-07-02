<div class="container" id="container">
  <br>
  <div class="row _card ">
    <div class="col-md-4 text-left">
      <h3 class="mt-2">My Offers</small> </h3>
    </div>
  </div>

<?php
$getO=select("offer","where pid='$pid'");
while ($roo=records($getO)) {
  ?>
  <div class="alert alert-danger hidden" id="err">

  </div>
  <div class="row _card text-left" id="off<?php echo $roo['offid'] ?>">
    <div class="col-md-4">
      <h5 class="mt-2"><?php echo $roo['title'] ?></h5>
    </div>
    <div class="col-md-2">
      <p class="mt-2">
      Budget: <?php echo $roo['budget'] ?> $
      </p>
    </div>
    <div class="col-md-3">
      <p class="mt-2">
      Deadline: <?php echo $roo['deadline'] ?>
      </p>
    </div>
    <div class="col-md-3 text-right">
      <?php if($roo['status']==1){
        $offid=$roo['offid'];
        $getcnt=select("contract","where offid='$offid'");
        $getCont=records($getcnt);
        $contractid=$getCont['conid'];
        ?>
        <button class="blue_btn" style="background:#4BB543 !important;border:1px solid #4BB543" > <i class="fa fa-check-circle"></i> Offer Accepted </button> <br>
        <a href="/contract-detail/<?php echo $contractid ?>">View Contract</a>
        <?php
      } else {
        ?>
        <button class="blue_btn" onclick="acceptOffer(<?php echo $roo['offid'] ?>)" > <i class="fa fa-check-circle"></i> Accept Offer </button>
        <?php
      }?>
    </div>
  </div>


    <?php
  }
   ?>




  </div>

  <script type="text/javascript">

  function acceptOffer(v){
    // alert(v);
    $.ajax({
      url:'/ajax-functions/offers.php',
      method:'post',
      data:{
        purpose:"accOffer",
        id:v
      },success:function(data){
        if (data=="failedToStart") {
          $('#err').show();
          $('#err').html('Something went wrong while accepting offer. Please try again later.');
        }else if(data=="failedToContract"){
          $('#err').show();
          $('#err').html('Something went wrong while starting contract. Contact Support');
        }else if (data=="failed") {
          $('#err').show();
          $('#err').html('Something went wrong while accepting offer. Please try again later.');
        }else {
          window.location.href="/contract-detail/"+data;
        }
      }
    })
  }

  </script>
