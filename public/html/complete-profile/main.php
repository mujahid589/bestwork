<?php

if ($prof['status']==0 || $prof['status']==3  ) {

include 'title.php';
include 'skills.php';
include 'languages.php';
include 'portfolio.php';
include 'qualifications.php';
include 'experience.php';
include 'certifications.php';
include 'next.php';

} else if($prof['status']==2) {
  ?>
  <div class="container">
    <div class="row _card text-left">
      <div class="col-md-12">
        <h1 class="display-1">
        <i class="fa fa-clock"></i>
      </h1>
        <br>
        <p>
          Your Profile is Under Review. Wait for 24-48 hours to get an update. If it's taking longer then contact <a href="/support">Support</a>
        </p>

      </div>
    </div>
  </div>
  <?php
}
else {
  redirect("/jobs");
}
 ?>
