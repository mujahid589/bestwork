<div class="margin">

</div>

<div class="container">
  <div class="row">
    <div class="col-md-4">


      <div class="_card p-4">
            <div class="row">
              <div class="col-md-12">
                <div class="client-image" style="position:relative;">
                <div class="edit-icon" data-toggle="modal" data-target="#myModal2"> <i class="fa fa-pencil "></i> </div>
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
            </div>
            <br>
            <div class="row">

            <div class="col-md-8 border-right text-left">
                <h4><b><?php echo $user['name'] ?></b></h4>
                <span><?php echo $prof['title'] ?></span>
            </div>
          <div class="col-md-4">
            <h4 class="dheading h4" style="margin-top:10px">
              <b>
      <?php
      $trating=0;
      $count=0;
      $tcontracts=0;
      $rev=select("contract","where pid='$pid' and (status='4' or status='5' or status='6') ");
      $tjobs=rows($rev);
      if($tjobs>0){
      while($rdata=records($rev)){
      $conid=$rdata['conid'];
      $rating=select("reveiws","where contractid='$conid'");
      if(rows($rating)==1){
      $review=records($rating);
      $trating=$trating+$review['ratingtopro'];
      $count++;
      }
      $tcontracts++;
      }
      echo $trating/$count ;
      $avgrating=$trating/$count ;
      }else {
      echo "N/A";
      }
      ?>
      <i class="fa fa-star" ></i>
          </b>
          </h4>
          </div>
          <div class="col-md-12">
            <hr>
          </div>
          <div class="col-md-6 border-right">
            <h2 class="dheading"><?php echo   $tcontracts; ?></h2>
            <span>Total Jobs</span>
          </div>
          <div class="col-md-6">
            <h2 class="dheading">$
              <?php
              $clr=select("pendingclearance","where pid='$pid'");
              $tearn=0;
              while($getclr=records($clr)){
                $tearn = $tearn+ $getclr['amount'];
              }
              if($tearn>1000){
                $tearn=round($tearn/1000);
                echo $tearn . "K+ ";
              }else {
              echo $tearn;
              }
               ?>
            </h2>
            <span>Earnings <small></small> </span>
          </div>
          <div class="col-md-12">

            <hr>
          </div>
          <div class="col-md-2">

          </div>
          <div class="col-md-8">
            <?php
            // $jss="";
            if($tjobs>1){
              $check=true;
            if($avgrating>=4.9 && $avgrating<=5){
              $jss=99;
            }
            else if($avgrating>=4.8 && $avgrating<=4.89){
              $jss=98;
            }
            else if($avgrating>=4.7 && $avgrating<=4.79){
              $jss=97;
            }
            else if($avgrating>=4.6 && $avgrating<=4.69){
              $jss=96;
            }
            else if($avgrating>=4.5 && $avgrating<=4.59){
              $jss=95;
            }
            else if($avgrating>=4.4 && $avgrating<=4.49){
              $jss=94;
            }
            else if($avgrating>=4.3 && $avgrating<=4.39){
              $jss=93;
            }
            else if($avgrating>=4.2 && $avgrating<=4.29){
              $jss=92;
            }
            else if($avgrating>=4.1 && $avgrating<=4.19){
              $jss=91;
            }
            else if($avgrating>=4.0 && $avgrating<=4.09){
              $jss=90;
            }
            else if($avgrating>=3.9 && $avgrating<=3.99){
              $jss=88;
            }
            else if($avgrating>=3.8 && $avgrating<=3.89){
              $jss=86;
            }
            else if($avgrating>=3.7 && $avgrating<=3.79){
              $jss=84;
            }
            else if($avgrating>=3.6 && $avgrating<=3.69){
              $jss=82;
            }
            else if($avgrating>=3.5 && $avgrating<=3.59){
              $jss=80;
            }
            else if($avgrating>=3.4 && $avgrating<=3.49){
              $jss=77;
            }
            else if($avgrating>=3.3 && $avgrating<=3.39){
              $jss=74;
            }
            else if($avgrating>=3.2 && $avgrating<=3.29){
              $jss=71;
            }
            else if($avgrating>=3.1 && $avgrating<=3.19){
              $jss=67;
            }
            else if($avgrating>=3.0 && $avgrating<=3.09){
              $jss=63;
            }else {
              $check=false;
              $jss="";
            }
          }else {
            $check=false;
          }

            if($check==true){
             ?>
            <h1 class="dheading"><?php echo $jss ?>%</h1>
            <div class="progress" style="height:10px !important" >
              <div class="progress-bar" style="width:<?php echo $jss ?>%;"></div>
            </div>
            <p>Job Success Score</p>
          <?php }else {
            ?>
            <p>This Profile is not eligible for JSS</p>
            <?php
          } ?>
          </div>
          <div class="col-md-2">

          </div>
          <div class="clearfix">
          </div>
      <hr>
          </div>

        </div>
        <?php
        $compr=0;
        $rev2=select("contract","where pid='$pid' ");
        $tjobs2=rows($rev2);
        if($tjobs2>0){
        $compr=$tjobs/$tjobs2;
      }
               ?>
        <div class="_card p-4">
          <div class="progress" >
            <div class="progress-bar" style="width:<?php if($compr!=0)echo $compr*100; ?>%;">Completion Rate: <?php if($compr!=0) echo  $compr*100 ."%"; else{ echo "N/A  &nbsp;"; } ?></div>
          </div>
          <!-- <div class="progress" >
            <div class="progress-bar" style="width:70%;">On Time Delivery: 70%</div>
          </div>
          <div class="progress" >
            <div class="progress-bar" style="width:85%;">Response Time: 2h</div>
          </div> -->

        </div>


        <div class="_card p-4" >
          <ul class="verifications">
            <li> <i class="fa fa-check-circle"></i> Email verification </li>
            <li> <i class="fa fa-check-circle"></i> Phone Number </li>
            <li> <i class="fa fa-times-circle"></i> Government ID verification</li>
            <li> <i class="fa fa-check-circle"></i> Connected Facebook</li>
            <li> <i class="fa fa-times-circle"></i> Connected Twitter</li>
          </ul>
            <div class="progress profile-completion" >
              <div class="progress-bar" style="width:90%;background:#33B744 !important">Profile Completion: &nbsp; 90%</div>
            </div>
        </div>
        <div class="_card p-4">
          <div class="row">
            <div class="col-sm-9 text-left">
              <h4>Languages</h4>
            </div>
            <div class="col-sm-3">
              <button class="lang-btn" data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus"></i> </button>
            </div>
            <div class="clearfix">

            </div>
            <span id="lanerr"></span>
          </div>
          <div class="verifications" id="lng">
            <?php
            $lang=select("languages","where pid='$pid' order by lid desc");
            while ($row=records($lang)) {
              ?>
              <li id="lan<?php echo $row['lid']; ?>"> <?php echo $row['language'] ?> - <?php echo $row['level'] ?> &nbsp; <i class="fa fa-trash trash" onclick="deletelang(<?php echo $pid ?>,
                <?php echo $row['lid'] ?>)"></i> </li>
              <?php
            }
             ?>
          </div>
        </div>

      </div>



      <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
