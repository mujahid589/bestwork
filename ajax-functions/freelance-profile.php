<?php
session_start();
include '../database/db.php';
include "../app/functions/controller.php";

if(isset($_GET['purpose'])){

#Update Bio
$pid=$_SESSION['pid'];

if($_GET['purpose']=="updateBio"){
  extract($_GET);
  $updateB=update("profs","title='$tagline',description='$describe' where pid='$pid'");
  if ($updateB) {
    echo "success";
  }else {
    echo "failed";
  }
}

#Update Skills

if($_GET['purpose']=="updateSkills"){
  extract($_GET);
  $updateS=update("profs","skills='$skills' where pid='$pid'");
  if ($updateS) {
    echo "success";
  }else {
    echo "failed";
  }
}
#Add Language

  if($_GET['purpose']=="addLanguage"){
    extract($_GET);
    $checkexistance=select("languages","where pid='$pid' and language='$lang'");
    $count=rows($checkexistance);
    if($count==1){
        echo "exists";
    }else {
    $query=insert("languages","pid,language,level","'$pid','$lang','$level'");
    if($query){
      echo lastid($query);
    }else {
      echo "failed";
    }
  }
  }

#Delete Language

    if($_GET['purpose']=="delLanguage"){
      extract($_GET);
      $query=delete("languages","where pid='$pid' and lid='$lid'");
      if($query){
        echo "success";
      }else {
        echo "failed";
      }
    }


#Add Experience

    if($_GET['purpose']=="addExperience"){
      extract($_GET);
      $query=insert("experience","title,company,location,datefrom,dateto,description,status,pid","'$title','$company','$location','$expst','$exped','$expdesc','1',$pid");
      if ($query) {
        $lid=lastid($query);
        $getex=select("experience","where exid='$lid'");
        $row=records($getex);
        ?>
        <div id="exp<?php echo $row['exid'] ?>">

        <h4><?php echo $row['title'] ?></h4>
        <p> <?php echo $row['company'] ?> - <?php echo $row['location'] ?> &nbsp; <!--<i class="fa fa-edit trash"></i>-->  <i class="fa fa-trash trash" onclick="delExp(<?php echo $row['exid'] ?>)"></i> <br>
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
      }else {
        echo "failed";
      }
    }

    #Delete Experience
    if($_GET['purpose']=="delExperience"){
      extract($_GET);
      $query=delete("experience","where exid='$exid'");
      if($query){
        echo "success";
      }else {
        echo "failed";
      }
    }

    #Add Qualification

    if($_GET['purpose']=="addQualification"){
      extract($_GET);
      $query=insert("qualification","university,datefrom,dateto,degree,aos,description,pid","'$uni','$df','$dt','','$aos','$qdesc',$pid");
      if ($query) {
        $lid=lastid($query);
        $getex=select("qualification","where qid='$lid'");
        $row=records($getex);
        ?>
        <div id="qid<?php echo $row['qid'] ?>">

        <h4><?php echo $row['aos'] ?> - <?php echo $row['university'] ?></h4>
          <span class="project-date">
            <?php echo $row['datefrom'] ?> - <?php echo $row['dateto']; ?> &nbsp; <!--<i class="fa fa-edit trash"></i>-->  <i class="fa fa-trash trash" onclick="delQual(<?php echo $row['qid'] ?>)"></i>
          </span>
        <p>
          <?php echo $row['description'] ?>
        </p>
        <hr>
      </div>

        <?php
      }else {
        echo "failed";
      }
    }

    #Delete Qualification
    if($_GET['purpose']=="delQual"){
      extract($_GET);
      $query=delete("qualification","where qid='$qid'");
      if($query){
        echo "success";
      }else {
        echo "failed";
      }
    }


    #Add Certification

    if($_GET['purpose']=="addCert"){
      extract($_GET);
      $query=insert("certifications","name,organization,date,vlink,pid,status","'$name','$org','$dt','$vlink','$pid','1'");
      if ($query) {
        $lid=lastid($query);
        $getex=select("certifications","where cerid='$lid'");
        $row=records($getex);
        ?>
        <div id="cerid<?php echo $row['cerid'] ?>">

        <h4><?php echo $row['name'] ?> - <?php echo $row['organization'] ?></h4>
          <span class="project-date">
            <?php echo $row['date'] ?> &nbsp; <!--<i class="fa fa-edit trash"></i>-->  <i class="fa fa-trash trash" onclick="delCert(<?php echo $row['cerid'] ?>)"></i>
          </span>
        <p>
          <a href="<?php echo $row['vlink'] ?>"><?php echo $row['vlink'] ?></>
        </p>
        <hr>
      </div>

        <?php
      }else {
        echo "failed";
      }
    }

    #Delete Certification
    if($_GET['purpose']=="delCert"){
      extract($_GET);
      $query=delete("certifications","where cerid='$cid'");
      if($query){
        echo "success";
      }else {
        echo "failed";
      }
    }





}

 ?>
