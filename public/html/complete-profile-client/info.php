<div class="col-md-3">
<div class="_card ">

<div class="client-image" style="position:relative;">
<div class="edit-icon" data-toggle="modal" data-target="#myModal"> <i class="fa fa-pencil "></i> </div>
<?php
if(!empty($client['image'])){
  ?>
<!--  <img src="media/users/clients/--><?php //echo $client['image'] ?><!--">-->
    <div class="avatar-preview">
        <div  style="background-image: url('media/users/clients/<?php echo $client['image'] ?>');">

        </div>
    </div>
  <h1>
    <span class="dheading">
    <?php echo $client['name'] ?>
  </span>
  </h1>
  <?php
}else {
  ?>
  <h1>
    <i class="fa fa-user-circle" style="font-size:72px"></i>
    <br>
    <span class="dheading">
    <?php echo $client['name'] ?>
      </span>
  </h1>

  <?php
}
 ?>
    <p> <?php echo $user['name'] ?> <br> <?php echo $user['email']; ?> </p>
</div>

</div>

</div>

</div>
</div>
<div class="margin">

</div>

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
