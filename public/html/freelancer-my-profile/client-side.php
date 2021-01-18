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
          uid:x,
          lang:lang,
          level:level
        },success:function(data){
          $('#lang-btn').html('Add Language');
          if(data=="success"){
            $('#lang-error').html('<div class="alert alert-success">Language Added Successfully</div>')
            $('#lng').prepend("<li id='lan<?php echo $user['uid']; ?>'>"+lang + " - " + level + "&nbsp; </li>");
// <i class='fa fa-trash trash' onclick='deletelang(<?php echo $user['uid'] ?>)' ></i>
          }else if(data=="failed"){
            $('#lang-error').html('<div class="alert alert-danger">Something went wrong. Please try again later.</div>')
          }else if (data=="exists") {
            $('#lang-error').html('<div class="alert alert-danger">Language already exists.</div>')
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
      uid:x,
      lid:y
    },success:function(data){
      if(data=="success"){
        $('#lan'+x).fadeOut();
      }
      else if(data=="failed"){
        $('#lanerr').html('<div class="alert alert-danger">Something went wrong. Please try again later.</div>')
      }
}
});
});
}
</script>
