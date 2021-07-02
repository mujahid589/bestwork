<div class="container" id="container">
  <br>
  <?php
  $ppid=param1;
  $getpp=select("proposals","where ppid='$ppid'");
  $getdata=records($getpp);
  $jid=$getdata['jobid'];
  $proid=$getdata['pid'];
  $getj=select("jobs","where jobid='$jid'");
  $row=records($getj);

   ?>
  <div class="row _card ">
    <div class="col-md-4 text-left">
      <h3 class="mt-2">Job Offers <br> <small> <?php echo $row['jobtitle'] ?> </small> </h3>
    </div>
    <div class="col-md-4">

    </div>
    <div class="col-md-4 text-right">
      <button class="blue_btn" id="addNew" data-toggle="modal" data-target="#addoff" > <i class="fa fa-paper-plane"></i> Send New Offer </button>
    </div>
</div>

<?php
$getO=select("offer","where ppid='$ppid'");
while ($roo=records($getO)) {
  ?>
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
      <button class="blue_btn" onclick="removeOffer(<?php echo $roo['offid'] ?>)" > <i class="fa fa-times"></i> Withdraw Offer </button>
    </div>
  </div>


    <?php
  }
   ?>




  </div>

  <div class="modal fade" id="addoff" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content text-left">
        <div class="modal-header">
        <h4>Add New Offer</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="alert alert-danger hidden" id="err">

              </div>
                                    <div class="form-group">
                        <label>Offer Title </label><br/>
                        <input class="form-control" type="text" name="title" id="name" value="<?php echo $row['jobtitle'] ?>"/>
                      </div>
                      <div class="form-group">
                        <label>Description</label><br/>
                        <textarea class="form-control" id="desc" ><?php echo strip_tags($row['description']); ?></textarea>
                      </div>
                      <div class="form-group">
                          <label>Budget</label><br/>
                          <input class="form-control" type="text" name="budt" id="budget" value="<?php echo $getdata['budget'] ?>"/>
                      </div>
                      <div class="form-group">
                        <label>Deadline</label><br/>
                        <input class="form-control" type="date" name="dead" id="deadline" value="<?php echo $getdata['deadline'] ?>"/>
                        </div>
                        <div class="form-group">
                          <input class="blue_btn" type="submit" name="submit" id="submit" value="Submit"/>
                    </div>

            </div>
          <div class="clearfix">

          </div>
        </div>

      </div>
    </div>
  </div>
</div>




<script type="text/javascript">


$(document).ready(function(){

  var today = new Date().toISOString().split('T')[0];
  document.getElementsByName("dead")[0].setAttribute('min', today);

  $('#submit').click(function(){
    if($('#name').val()==""){
      $('#err').show();
      $('#err').html("<li>Please Enter Title</li>");
    }
    else if($('#desc').val()==""){
      $('#err').show();
      $('#err').html("<li>Please Enter Description</li>");
    }
    else if($('#budget').val()==""){
      $('#err').show();
      $('#err').html("<li>Please Enter Offer Budget</li>");
    }
    else if($('#deadline').val()==""){
      $('#err').show();
      $('#err').html("<li>Please Enter Deadline</li>");
    }
    else {
        $('#err').show();
        $('#err').removeClass("alert-danger");
        $('#err').addClass("alert-success");
        var ppid=<?php echo $ppid ?>;
        var title= $('#name').val();
        var description=$('#desc').val();
        var budget=$('#budget').val();
        var deadline=$('#deadline').val();
        $.ajax({
          url:'/ajax-functions/offers.php',
          method:'post',
          data:{
            purpose:'addOffer',
            ppid:ppid,
            pid:<?php echo $proid ?>,
            title:title,
            description:description,
            budget:budget,
            deadline:deadline
          },success:function(data){
            if (data=="success") {
              $('#err').removeClass("alert-danger");
              $('#err').addClass("alert-success");
              $('#err').html("<li>Offer Sent Successfully <i class='fa fa-paper-plane'></i></li>");
              setTimeout(function(){
                window.location.href="/offer/<?php echo $ppid ?>";
              },2000);
            }else {
              $('#err').html("<li><i class='fa fa-times'></i> Something went wrong while sending offer. Please try again later </li>");
            }
          }
        });


        }
  });


});

function removeOffer(v){
  $.ajax({
    url:'/ajax-functions/offers.php',
    method:'post',
    data:{
      purpose:"rOffer",
      id:v
    },success:function(data){
      if (data=="success") {
        $('#off'+v).fadeOut();
      }else {

      }
    }
  })
}

</script>
