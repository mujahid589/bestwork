


<div class="col-md-12 _card text-left">
  <h3>Add Experiences</h3>
<div class="row">
  <div class="col-md-12 ">
    <div class="form-group">
      <label>Experience Title</label>
      <input type="text" name="exptitle" class="form-control" id="exptitle" placeholder="Web Developer..." value="">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label>Company</label>
      <input type="text" name="expcompany" class="form-control" id="expcompany" placeholder="Microsoft.." value="">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label>Location</label>
      <input type="text" name="exploc" class="form-control" id="exploc" placeholder="Location" value="">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label>Start Date</label>
      <input type="date" name="expst" class="form-control" id="expst" placeholder="Start Date" value="">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label>End Date</label>
      <input type="date" name="exped" class="form-control" id="exped" placeholder="End Date" value="">
    </div>
  </div>
  <div class="col-md-12">
    <label>Other Details</label>
    <textarea name="desc" class="form-control" id="expdesc"></textarea>
  </div>

  <div class="col-md-12">
    <br>
    <span id="exp-error"></span>
    <button class="blue_btn" id="exp-btn" onclick="addExperience(<?php echo $pid ?>)">Add Experience</button>
  </div>
  <div class="clearfix">

  </div>
</div>
<br>
<div class="row">

<div class="col-md-12" id="experiences">
  <?php
  $uid=$user['uid'];
  $getexperienes=select("experience","where pid='$pid' order by exid desc");
  while ($row=records($getexperienes)) {
    ?>
  <div id="exp<?php echo $row['exid'] ?>">

  <h4><?php echo $row['title'] ?></h4>
  <p> <?php echo $row['company'] ?> - <?php echo $row['location'] ?> &nbsp; <!--<i class="fa fa-edit trash"></i>-->  <i class="fa fa-trash trash" onclick="delExp(<?php echo $row['exid'] ?>)"></i> <br>
    <span class="project-date">
      <?php echo $row['datefrom'] ?> - <?php echo $row['dateto']; ?>
    </span>
  </p>
  <p>
    <?php echo $row['description'] ?>
  </p>
  <hr>
</div>
  <?php
}
 ?>
</div>
</div>


</div>




<script type="text/javascript">
function addExperience(x){
  $(document).ready(function(){
    if($('#exptitle').val()==""){
      $('#exp-error').html('<div class="alert alert-danger">Please Enter Title of Experience</div>');
      $('#exptitle').focus();
    }
    else if($('#expcompany').val()==""){
      $('#exp-error').html('<div class="alert alert-danger">Please Enter Company Name</div>');
      $('#expcompany').focus();
    }
    else if($('#exploc').val()==""){
      $('#exp-error').html('<div class="alert alert-danger">Please Enter Location</div>');
      $('#exploc').focus();
    }
    else if($('#expst').val()==""){
      $('#exp-error').html('<div class="alert alert-danger">Please Enter Experience Starting Date</div>');
      $('#expst').focus();
    }
    else if($('#exped').val()==""){
      $('#exped').focus();
      $('#exp-error').html('<div class="alert alert-danger">Please Enter Experience Ending Date</div>');
    }
    else if($('#expdesc').val()==""){
      $('#expdesc').focus();
      $('#exp-error').html('<div class="alert alert-danger">Please Enter Experience Details</div>');
    }
    else {
        $('#exp-error').html('');
        $('#exp-btn').html('<i class="fa fa-spinner fa-spin"> </i> <i>Adding Experience</i> ');
        $.ajax({
          url:"ajax-functions/freelance-profile.php",
          type:"get",
          data:{
            purpose:'addExperience',
            pid:x,
            title:$('#exptitle').val(),
            company:$('#expcompany').val(),
            location:$('#exploc').val(),
            expst:$('#expst').val(),
            exped:$('#exped').val(),
            expdesc:$('#expdesc').val(),
          },success:function(data){
            if(data=="failed"){
              $('#exp-btn').html('Add Experience');
            }else {
              // $('#exp-btn').hide();
              $('#exp-btn').html('Add Experience');
              $('#exp-error').html('<div class="alert alert-success">Experience Added Successfully</div>');
              $('#experiences').append(data);
            }
          }

        })
    }
  });
}


function delExp(y){
  $(document).ready(function(){

  $.ajax({
    url:'ajax-functions/freelance-profile.php',
    type:'get',
    data:{
      purpose:'delExperience',
      exid:y
    },success:function(data){
      if(data=="success"){
        $('#exp'+y).fadeOut();
      }
      else if(data=="failed"){
      }
}
});
});
}

</script>
