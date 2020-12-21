<script type="text/javascript">
$(document).ready(function(){

  $('#loginform').submit(function(){
  if($('#uname').val()==""){
      $('#validerror').fadeIn();
      $('#validerror').html("<li>Please Enter Your Username</li>");
      return false;
    }
    else if($('#pass').val()==""){
      $('#validerror').fadeIn();
      $('#validerror').html("<li>Please Enter Your Password</li>");
      return false;
    }
    else {
      $('#validerror').removeClass('alert-danger');
      $('#submit').html('<i>Logging In .... <i class="fa fa-spinner fa-spin" ></i></i> ')
      $('#loginform').submit();
      // return false
    }
    return false;
  });



});

</script>
