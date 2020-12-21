
<form id="loginform" method="post">

<div class="" >


<div class="margin">

</div>
<div class="margin">

</div>
<div class="margin">

</div>
<div class="container">
  <div class="row">
    <div class="col-md-3">

    </div>
    <div class="col-md-6">
      <div class="_card p-4 text-left">

        <h2>Welcome Back! </h2>
        <p>Login to your account  !</p>
        <div class="alert alert-danger hidden" id="validerror">
        </div>
        <?php if(!empty($msg)) echo $msg; ?>
<div class="margin">

</div>

<div class="form-group">
<input type="text" name="uname" placeholder="Email or Username" id="uname" class="form-control" value="">
</div>


<div class="form-group">
<input type="password" name="password" placeholder="Password" id="pass" class="form-control" value="">
</div>

<div class="margin">

</div>
<button type="submit" name="submit" id="submit"  class="blue_btn" >Login </button>

<div class="row">

<div class="col-md-12">
<br>
<a href="register" >Don't Have Account? Register Account</a>
</div>
</div>

<br>



      </div>
    </div>
    <div class="col-md-3">
    </div>
    <div class="clearfix">

    </div>
  </div>
</div>
<div class="margin">

</div>
<div class="margin">

</div>



</div>

</form>
