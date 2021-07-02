<?php

if(isset($_POST['goToNext'])){


      $check=select('profile_requests',"where type='2' and uid='$uid'");
      $count=rows($check);
      if($count==1){
          $get=records($check);
          $rid=$get['req_id'];
          $att=$get['attempts'] + 1;
          $q=update('profile_requests',"attempts='$att', status='0' where uid='$uid' ");
          $u=update('profs',"status='2' where pid='$pid'");

          if ($q && $u){
  //            $msg=success('Your profile has submitted for review. We will get back to you in 24 to 72 hours');
              redirect('/complete-profile');
          }else{
              error('Something went wrong, please try again later');
          }
      }else{
          $q=insert('profile_requests','type,attempts,uid,status',"'2','1','$uid','0'");
          $u=update('profs',"status='2' where pid='$pid'");
          if($q&&$u){
  //            $msg=success('Your profile has submitted for review. We will get back to you in 24 to 72 hours');
              redirect('/complete-profile');
          }
      }




}

 ?>

<div class="row _card text-left">
<div class="col-md-12">

<p class="text-danger">
Before Proceeding Next, make sure you have fulfilled all the details above properly. You will not be able to edit anything else after proceeding towards next step. In case of providing wrong information or fulfilling wrong information, your account will be permanantly banned.
</p>

<form  method="post">

<input type="submit" name="goToNext" class="blue_btn" value="Go to Next Step">

</form>


</div>
</div>





</div>
</div>
</div>
