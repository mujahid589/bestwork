<div class="col-md-12 _card text-left">
<h3>Qualifications</h3>



  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label>University</label>
        <input type="text" name="university" id="university" class="form-control" placeholder="Enter University Name">
      </div>
    </div>
    <div class="col-md-6">

      <div class="form-group">
        <label>Date from</label>
        <input type="date" name="datefrom" id="qdatefrom" class="form-control" placeholder="Degree Started On">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Date To</label>
        <input type="date" name="dateto" id="qdateto" class="form-control input-sm" placeholder="Degree Ended On">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Area of Study</label>
        <input type="<text" name="aos" id="aos" class="form-control input-sm" placeholder="Area Of Study">
      </div>
    </div>
    <div class="col-md-12">

      <div class="form-group">
        <label>Description</label>
      <textarea id="qdesc" class="form-control input-sm" placeholder="Description of Degree"></textarea >
      </div>
    </div>
    <div class="col-md-12">
      <div class="alert hidden" id="msgq">

      </div>
        <div class="form-group">
          <input type="button" value="Add Qualification" class="blue_btn" id="addq">
        </div>
      </div>

</div>

<div class="row">


  <div class="col-md-12" id="qualifications">
    <?php
    $uid=$user['uid'];
    $getexperienes=select("qualification","where pid='$pid' order by qid desc");
    while ($row=records($getexperienes)) {
      ?>
    <div id="qid<?php echo $row['qid'] ?>">

    <h4><?php echo $row['aos'] ?> - <?php echo $row['university'] ?></h4>
      <span class="project-date">
        <?php echo $row['datefrom'] ?> - <?php echo $row['dateto']; ?> &nbsp; <!--<i class="fa fa-edit trash"></i>-->  <i class="fa fa-trash trash" onclick="delQual(<?php echo $row['qid'] ?>)"></i>
      </span>
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
  $('#addq').click(function(){
    if($('#university').val()==""){
      $('#msgq').show();
      $('#msgq').addClass('alert-danger');
      $('#msgq').html("Please Enter Name of University");
    }
    else if($('#qdatefrom').val()==""){
      $('#msgq').show();
      $('#msgq').addClass('alert-danger');
      $('#msgq').html("Please Enter Starting Date of Degree");
    }
    else if($('#qdateto').val()==""){
      $('#msgq').show();
      $('#msgq').addClass('alert-danger');
      $('#msgq').html("Please Enter End Date of Degree");
    }
    else if($('#aos').val()==""){
      $('#msgq').show();
      $('#msgq').addClass('alert-danger');
      $('#msgq').html("Please Enter Area of Study");
    }
    else{
      $.ajax({
        url:"ajax-functions/freelance-profile.php",
        type:"get",
        data:{
          purpose:'addQualification',
          uni:$('#university').val(),
          df:$('#qdatefrom').val(),
          dt:$('#qdateto').val(),
          aos:$('#aos').val(),
          qdesc:$('#qdesc').val()
        },success:function(data){
          if(data=="failed"){
          }else {
            // $('#exp-btn').hide();
            $('#addq').html('Add Qualification');
            $('#msgq').html('<div class="alert alert-success">Qualification Added Successfully</div>');
            $('#msgq').show();
            $('#qualifications').append(data);
          }
        }
      })
    }

  });



  function delQual(y){
    $(document).ready(function(){

    $.ajax({
      url:'ajax-functions/freelance-profile.php',
      type:'get',
      data:{
        purpose:'delQual',
        qid:y
      },success:function(data){
        if(data=="success"){
          $('#qid'+y).fadeOut();
        }
        else if(data=="failed"){
        }
  }
  });
  });
  }
</script>
