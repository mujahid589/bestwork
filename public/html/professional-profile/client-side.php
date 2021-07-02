<script type="text/javascript">

function addLanguage(x){
  $(document).ready(function(){
    if($('#lang').val()==""){
      $('#lang-error').html('<div class="alert alert-danger">Please Select Language</div>')
    }
    else if($('#level').val()==""){
      $('#lang-error').html('<div class="alert alert-danger">Please Select Language Level</div>')
    }else {
      $('#lang-error').html('');
      $('#lang-btn').html('<i class="fa fa-spinner fa-spin"> </i> <i>Adding</i> ');
      var lang=$('#lang').val();
      var level=$('#level').val();
      $.ajax({
        url:'ajax-functions/freelance-profile.php',
        type:'get',
        data:{
          purpose:'addLanguage',
          pid:x,
          lang:lang,
          level:level
        },success:function(data){
          $('#lang-btn').html('Add Language');

           if(data=="failed"){
            $('#lang-error').html('<div class="alert alert-danger">Something went wrong. Please try again later.</div>')
          }else if (data=="exists") {
            $('#lang-error').html('<div class="alert alert-danger">Language already exists.</div>')
          }else {
            $('#lang-error').html('<div class="alert alert-success">Language Added Successfully</div>')
            $('#lng').prepend("<li id='lan"+data+"'>"+lang + " - " + level + "&nbsp; <i class='fa fa-trash trash' onclick='deletelang(<?php echo $pid ?>,"+ data +")' ></i> </li>");
          }
        }
      })
    }
  })
}

function deletelang(x,y){
  $(document).ready(function(){

  $.ajax({
    url:'ajax-functions/freelance-profile.php',
    type:'get',
    data:{
      purpose:'delLanguage',
      pid:x,
      lid:y
    },success:function(data){
      if(data=="success"){
        $('#lan'+y).fadeOut();
      }
      else if(data=="failed"){
        $('#lanerr').html('<div class="alert alert-danger">Something went wrong. Please try again later.</div>')
      }
}
});
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
              $('#experiences').prepend(data);
            }
          }

        })
    }
  });
}



function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});



</script>




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
  }

</script>


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
