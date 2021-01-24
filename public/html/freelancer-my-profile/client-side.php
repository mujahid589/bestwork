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
              $('#exp-btn').html('Add Language');
            }else {
              $('#exp-btn').hide();
              $('#exp-error').html('<div class="alert alert-success">Experience Added Successfully</div>');
            }
          }

        })
    }
  });
}


</script>
