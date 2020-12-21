<script type="text/javascript">
$(document).ready(function(){
  $('#clientcheck').click(function(){
    $(this).css("border","1px solid #0A54A6 ");
    $('#freelancecheck').css("border","none ");
  });
  $('#freelancecheck').click(function(){
    $(this).css("border","1px solid #0A54A6 ");
    $('#clientcheck').css("border","none");
  });


  $('#next').click(function(){
    var vf=  $('#Freelance').val();
    var vc=  $('#client').val();
    if($('#Freelance').is(':checked') || $('#client').is(':checked')) {
      $('#error').fadeOut();
      $('#first').hide();
      $('#second').show();


    }else {
      $('#error').fadeIn();
    }

  });

  $('#back').click(function(){
      $('#first').show();
      $('#second').hide();
  });

  $('#registerform').submit(function(){
    if($('#name').val()==""){
      $('#validerror').fadeIn();
      $('#validerror').html("<li>Please Enter Your Name</li>");
      return false;
    }
  else   if($('#uname').val()==""){
      $('#validerror').fadeIn();
      $('#validerror').html("<li>Please Enter Your Username</li>");
      return false;
    }
    else if($('#email').val()==""){
      $('#validerror').fadeIn();
      $('#validerror').html("<li>Please Enter Your Email</li>");
      return false;
    }
    else if($('#pass').val()==""){
      $('#validerror').fadeIn();
      $('#validerror').html("<li>Please Enter Your Password</li>");
      return false;
    }
    else if($('#pass').val().length<8){
      $('#validerror').fadeIn();
      $('#validerror').html("<li>Please Increase Your Password Length to 8 Characters</li>");
      return false;
    }
    else if($('#cpass').val()!=$('#pass').val()){
      $('#validerror').fadeIn();
      $('#validerror').html("<li>Confirm Password does not match with password</li>");
      return false;
    }
    else {
      $('#validerror').removeClass('alert-danger');
      // $('#validerror').addClass('alert-success');
      // $('#validerror').html("<li>Form Submitted Successfully</li>");
      $('#submit').html('<i>Creating Account .... <i class="fa fa-spinner fa-spin" ></i></i> ')
      $('#registerform').submit();
    }
    return false;
  });



});

</script>
