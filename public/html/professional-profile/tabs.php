
<div class="_card text-left p-0" >


  <!-- Nav pills -->
    <ul class="nav nav-pills"   id="protabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="pill" href="#home">Work History</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu1">Portfolio</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu2">Experience</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu4">Qualifications</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu3">Certifications</a>
      </li>
    </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content p-2">
      <div id="home" class="container tab-pane active"><br>

        <?php

        $rev=select("contract","where pid='$pid' and (status='4' or status='5' or status='6') order by conid desc ");
        $tjobs=rows($rev);
        echo "<p>Total Jobs: ". $tjobs ." </p>";
        if($tjobs>0){
        while($rdata=records($rev)){
          $conid=$rdata['conid'];
          $jid=$rdata['jid'];
          $job=select("jobs","where jobid='$jid'");
          $jdata=records($job);


          $rating=select("reveiws","where contractid='$conid'");
          $review=records($rating);
          ?>
          <h4><?php echo $jdata['jobtitle'] ?></h4>
          <div class="five-stars">
            <?php for ($i=0; $i <$review['ratingtopro']; $i++) {
              ?>
              <i class="fas fa-star"></i>
            <?php
          } ?>
          </div>
          <p>
            <span class="project-date"> <?php echo time_elapsed_string($rdata['datetime'])  ?> </span><br>
            <i>
            “<?php echo $review['feedbacktopro']; ?>”
          </i>
          </p>
          <hr>


          <?php
        }
      }else {
        ?>

        <?php
      }
          ?>





      </div>
      <!-- <div id="menu1" class="container tab-pane fade"><br>
        <h3>Menu 1</h3>
        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      </div> -->
      <div id="menu2" class="container tab-pane fade"><br>
<div class="row" style="position:relative">

  <div class="col-md-12" id="experiences">
    <?php
    $uid=$user['uid'];
    $getexperienes=select("experience","where pid='$pid' order by exid desc");
    if(rows($getexperienes)>=1){
    while ($row=records($getexperienes)) {
      ?>
      <div id="exp<?php echo $row['exid'] ?>">
    <h4><?php echo $row['title'] ?></h4>
    <p> <?php echo $row['company'] ?> - <?php echo $row['location'] ?> &nbsp;
      <span class="project-date">
        <?php echo $row['datefrom'] ?> - <?php echo $row['dateto']; ?>
      </span>
    </p>
    <p>
      <?php echo $row['description'] ?>
    </p>
    <hr>
  </div>
    <?php
    }
  }else {
    ?>
    <div class="col-md-12 pt-3" >
      You Didn't add any experience yet. <a href="javascript:void(0)" data-toggle="modal" data-target="#addexp">Add New</a>
    </div>
    <?php
  }
   ?>
  </div>
  <div class="clearfix">

  </div>
</div>

      </div>
      <div id="menu3" class="container tab-pane fade"><br>

        <div class="row">
          <div class="col-md-12">
          <h3>Certifications</h3>
        </div>
          <br>
          <div class="col-md-12" id="certifications">
            <?php
            $getex=select("certifications","where pid='$pid'");
            if(rows($getex)>0){
            $row=records($getex);
            ?>
            <div id="cerid<?php echo $row['cerid'] ?>">

            <h4><?php echo $row['name'] ?> - <?php echo $row['organization'] ?></h4>
              <span class="project-date">
                <?php echo $row['date'] ?> &nbsp; 
              </span>
            <p>
              <a href="<?php echo $row['vlink'] ?>"><?php echo $row['vlink'] ?></a>
            </p>
            <hr>
          <?php } else {
            // code...
            ?>
            <p>You didn't add any qualification yet.</p>
            <?php
          } ?>

          </div>
        </div>


        </div>

              </div>
      <div id="menu4" class="container tab-pane fade"><br>
        <h3>Qualifications</h3>

        <div class="row" style="position:relative">

          <div class="col-md-12" id="qualifications">
            <?php
            $uid=$user['uid'];
            $getexperienes=select("qualification","where pid='$pid' order by qid desc");
            if(rows($getexperienes)>=1){
            while ($row=records($getexperienes)) {
              ?>
            <div id="qid<?php echo $row['qid'] ?>">

            <h4><?php echo $row['aos'] ?> - <?php echo $row['university'] ?></h4>
              <span class="project-date">
                <?php echo $row['datefrom'] ?> - <?php echo $row['dateto']; ?>
              </span>
            <p>
              <?php echo $row['description'] ?>
            </p>
            <hr>
          </div>
            <?php
          }
        }else {
          ?>
          <p>
          You didn't add any Qualification Yet.
        </p>
          <?php
        }
           ?>
          </div>
        </div>


      </div>

    </div>




</div>



</div>



</div>



</div>
