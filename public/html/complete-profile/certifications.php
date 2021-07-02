<div class="col-md-12 _card text-left">
  <h3>Certifications</h3>

  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
      <div class="form-group">
        <input type="text" name="name" id="namec" class="form-control input-sm" placeholder="Name of Certification">
      </div>
      <div class="form-group">
        <input type="text" name="" id="orgc" class="form-control input-sm" placeholder="Certification Organization">
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
      <div class="form-group">
        <input type="date" name="date" id="awardedon" class="form-control input-sm" placeholder="Awarded On">
      </div>
      <div class="form-group">
        <input type="text" name="" id="linkc" class="form-control input-sm" placeholder="link">
      </div>

    </div>
    <div class="col-md-12">
      <div class="alert hidden" id="msgc">

      </div>

      <div class="form-group">
      <input type="button" value="Add Certification" class="blue_btn" id="addc">
      </div>
    </div>
</div>

<div class="row">
  <div class="col-md-12" id="certifications">
    <?php
    $getex=select("certifications","where pid='$pid'");
    if(rows($getex)>0){
    $row=records($getex);
    ?>
    <div id="cerid<?php echo $row['cerid'] ?>">

    <h4><?php echo $row['name'] ?> - <?php echo $row['organization'] ?></h4>
      <span class="project-date">
        <?php echo $row['date'] ?> &nbsp; <!--<i class="fa fa-edit trash"></i>-->  <i class="fa fa-trash trash" onclick="delCert(<?php echo $row['cerid'] ?>)"></i>
      </span>
    <p>
      <a href="<?php echo $row['vlink'] ?>"><?php echo $row['vlink'] ?></a>
    </p>
    <hr>
    <?php } ?>

  </div>
</div>


</div>
</div>




<script type="text/javascript">
  $('#addc').click(function(){
    if($('#namec').val()==""){
      $('#msgc').show();
      $('#msgc').addClass('alert-danger');
      $('#msgc').html("Please Enter Name of Certification");
    }
    else if($('#orgc').val()==""){
      $('#msgc').show();
      $('#msgc').addClass('alert-danger');
      $('#msgc').html("Please Enter Name of Certification Organization");
    }
    else if($('#awardedon').val()==""){
      $('#msgc').show();
      $('#msgc').addClass('alert-danger');
      $('#msgc').html("Please Enter End Date of Certification Awarded");
    }
    else if($('#linkc').val()==""){
      $('#msgc').show();
      $('#msgc').addClass('alert-danger');
      $('#msgc').html("Please Enter Verification Link for Certification");
    }
    else{
      $.ajax({
        url:"ajax-functions/freelance-profile.php",
        type:"get",
        data:{
          purpose:'addCert',
          name:$('#namec').val(),
          org:$('#orgc').val(),
          dt:$('#awardedon').val(),
          vlink:$('#linkc').val(),
        },success:function(data){
          if(data=="failed"){
          }else {
            // $('#exp-btn').hide();
            $('#addc').val('Add Certification');
            $('#msgc').show();
            $('#msgc').html('<div class="alert alert-success">Qualification Added Successfully</div>');
            $('#certifications').append(data);
          }
        }

      });
    }

  });


  function delCert(y){
    $(document).ready(function(){

    $.ajax({
      url:'ajax-functions/freelance-profile.php',
      type:'get',
      data:{
        purpose:'delCert',
        cid:y
      },success:function(data){
        if(data=="success"){
          $('#cerid'+y).fadeOut();
        }
        else if(data=="failed"){
        }
  }
  });
  });
  }

</script>
