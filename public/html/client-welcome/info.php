<div class="col-md-3">
<div class="_card p-0">
  <div id="protabs" class="p-3">
    <div class="client-image" style="position:relative;">
    <div class="edit-icon"> <i class="fa fa-pencil "></i> </div>
    <?php
    if(!empty($client['image'])){
      ?>
      <img src="media/users/clients/<?php echo $client['image'] ?>">
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
<div class="p-3 text-left" >

<h4>My Stats</h4>
<p>
Jobs Posted: 6 <br>
Total Interviews: 25 <br>
Total Hires: 5 <br>
Rating: <span class="dheading" style="font-size:22px">5</span> <i class="fa fa-star"></i>
</p>

</div>

</div>
</div>
</div>
</div>
<div class="margin">

</div>
