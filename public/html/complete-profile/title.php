<?php
if (isset($_POST['imgupdate'])){

    $file_name=$_FILES['pic']['name'];
    $file_tmp=$_FILES['pic']['tmp_name'];
    $upd=update('profs',"image='$file_name' where pid='$pid'");
    if($upd){
        $msg=success('Profile Image updated successfully');
        move_uploaded_file($file_tmp,"media/users/professionals/".$file_name);
        redirect("/complete-profile");
    }else{
        $msg=error('Something went wrong');
    }

} ?>

<div class="margin">

</div>
<div class="container  ">
  <div class="row">

    <?php if ($prof['status']==0){ ?>
    <div class="col-md-12 _card text-left">
      <h1>Welcome <?php echo $user['name'] ?> ! </h1>
      <p>You're just about to complete your profile.</p>
    </div>

    <div class="col-md-12 _card text-left alert-warning">
      <i class="fa fa-warning"></i> Complete your profile and submit a request for approval. Our team will review and get back to you under 24 hours.
      <br> <a href="#">Learn More</a> about how to make a professional profile.
    </div>
  <?php } else if ($prof['status']==3){ ?>
  <div class="col-md-12 _card text-left alert-warning">
    <i class="fa fa-warning"></i> Your Profile has already declined. Make sure to fill more good application now.
    <br> <a href="#">Learn More</a> about how to make a professional profile.
  </div>
  <?php } ?>


    <div class="_card col-md-12 text-left ">
      <h2>General Info</h2>
      <div class="alert" id="msgBio">
      </div>
      <div class="margin">

      </div>
      <div class="row">
      <div class="col-md-3">

      <!-- <div class="freelancer-image" style="position:relative;">
      <div class="edit-icon"> <i class="fa fa-pencil"></i> </div>
        <img src="media/users/clients/mujahid.png">
      </div> -->

      <div class="client-image" style="position:relative;">
      <div class="edit-icon" data-toggle="modal" data-target="#myModal"> <i class="fa fa-pencil "></i> </div>
      <?php
      if(!empty($prof['image'])){
        ?>
      <!--  <img src="media/users/clients/--><?php //echo $client['image'] ?><!--">-->
          <div class="avatar-preview">
              <div  style="background-image: url('media/users/professionals/<?php echo $prof['image'] ?>');">

              </div>
          </div>
        <h1>
          <span class="dheading">
        </span>
        </h1>
        <?php
      }else {
        ?>
        <h1>
          <i class="fa fa-user-circle" style="font-size:72px"></i>
          <br>
          <span class="dheading">
            </span>
        </h1>

        <?php
      }
       ?>
      </div>



      </div>
      <div class="col-md-9">
        <div class="form-group">
          <label>Name</label>
          <input type="text" name="name" class="form-control" disabled id="name"  value="<?php echo $user['name'] ?>">
        </div>
        <div class="form-group">
          <label>Tagline</label>
          <input type="text" name="tagline" class="form-control" id="tagline"  value="<?php echo $prof['title'] ?>">
        </div>
      </div>
      <div class="col-md-12">
        <div class="margin">

        </div>
        <div class="form-group">
          <label>Describe Yourself</label>
          <textarea name="description" id="summernote" class="form-control" placeholder="Introduction | Background | Skills | Experience">"<?php echo $prof['description'] ?></textarea>
        </div>
        <div class="form-group">
          <button class="blue_btn" id="updateBio">Update Details</button>
        </div>


      </div>

      <div class="clearfix">

      </div>
    </div>
    </div>


<script type="text/javascript">

  $('#updateBio').click(function(){
    if($('#tagline').val()==""){
      $('#msgBio').addClass('alert-danger');
      $('#msgBio').html('Please Enter Your Tagline');
    }
    else if($('#summernote').val()==""){
      $('#msgBio').addClass('alert-danger');
      $('#msgBio').html('Please Describe Yourself');
    }
    else{
      var tagline=$('#tagline').val();
      var describe=$('#summernote').val();
      $.ajax({
        method:'get',
        url:'ajax-functions/freelance-profile.php',
        data:{
          purpose:'updateBio',
          tagline:tagline,
          describe:""+describe+""
        }, success:function(data){
          if(data=="success"){
            $('#msgBio').addClass("alert-success");
            $('#msgBio').removeClass("alert-danger");
            $('#msgBio').html("Details Updated Successfully");
          }
          else if(data=="failed"){
            $('#msgBio').addClass('alert-danger');
            $('#msgBio').html('Something went wrong while updating details');
          }
        }
      })
    }
  });

</script>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-left">
            <div class="modal-header">
                <h4>Update Profile Picture</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                <div class="row">

                    <div class="avatar-upload">
                        <div class="avatar-edit">
                            <input type='file' id="imageUpload" name="pic" accept=".png, .jpg, .jpeg" />
                            <label for="imageUpload"></label>
                        </div>
                        <div class="avatar-preview">
                            <div id="imagePreview" style="background-image: url(/media/icons/upload-button.png);">

                            </div>
                        </div>
                        <div class="margin"></div>
                        <div class="form-group">
                            <button type="submit" class="blue_btn" name="imgupdate">Update Image</button>
                    </div>
                    </div>

                </div>
                </form>

           </div>
    </div>
    </div>
</div>

<script type="text/javascript">
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
