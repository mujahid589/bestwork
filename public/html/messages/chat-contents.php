<div class="col-md-9 text-left" style="position:relative">
<?php if(param1==""){
?>
<div class="_card text-left" id="wait">
  <h1 class="display-1">
  <i class="fa fa-clock-o "></i>
</h1>
  <h1>Click Some Chat From Left </h1>

</div>
<div  id="chatbox" class="hidden">

<div class="_card text-left">
  <h4> <span id="name"></span>
  <small id="jobtitle"></small>
</h4>
<a id="jlink">View Job Posting</a>
</div>
<div class="_card text-left" style="min-height:76.5vh;position:relative">

  <div class="chat_area"  id="chat_area" style="height:70vh;overflow-y:scroll">

    <div class="message">
      <?php

       ?>
      <p> <b>Mujahid Farooq</b> <br>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        <br>
        <small>12:35 am</small>
       </p>
       <hr>
    </div>

  </div>

  <?php include 'chat_box.php'; ?>


</div>
</div>

<?php
}

else {


    if(fLoggedin()){
      $mquery2=select("chats","where pid='$pid' and ppid='$ppid'");
    }
    else{
      $mquery2=select("chats","where cid='$cid' and ppid='$ppid'");
    }
      $row2=records($mquery2);
      $chat_id2=$row2['chat_id'];
      $propid=$row2['ppid'];
      $propo=select("proposals","where ppid='$propid'");
      $prop1=records($propo);
      $jid=$prop1['jobid'];

      $j=select("jobs","where jobid='$jid'");
      $jdata=records($j);

      if(fLoggedin()){
        $client=$row2['cid'];
        $dquery=select("clients","where cid='$client'");
        $data=records($dquery);
        $image="/clients/".$data['image'];
        $uid=$data['uid'];
        $u=select("users","where uid='$uid'");
        $udata=records($u);
      }
      else {
        $proid=$row2['pid'];
        $dquery=select("profs","where pid='$proid'");
        $data=records($dquery);
        $uid=$data['uid'];
        $image="/professionals/".$data['image'];
        $u=select("users","where uid='$uid'");
        $udata=records($u);
      }
  ?>

<div  id="openchat">

  <div class="_card text-left">
    <h4><?php echo $udata['name'] ?>
    <small><?php echo $jdata['jobtitle'] ?></small>
  </h4>
  <a href="/job-post/<?php echo $jdata['jobid'] ?>">View Job Posting</a>
  </div>
  <div class="_card text-left" style="min-height:76.5vh;position:relative">

    <div class="chat_area"  id="chat_area1" style="height:70vh;overflow-y:scroll">

      <?php
      $mj=select("message","where chat_id='$chat_id2' order by time asc limit 10");
      while ($mrow=records($mj)) {
        if($mrow['type']==1){

          $proid=$row2['pid'];

          $getid=select("profs","where pid='$proid'");
          $gdata=records($getid);
          $muser=$gdata['uid'];

          $dquery2=select("users","where uid='$muser'");
          $usdata=records($dquery2);
        }
        else {
          $clientid=$muser=$row2['cid'];
          $getid=select("clients","where cid='$clientid'");
          $gdata=records($getid);
          $muser=$gdata['uid'];

          $dquery2=select("users","where uid='$muser'");
          $usdata=records($dquery2);
        }
        ?>
      <div class="message">
        <h6> <b><?php echo $usdata['name'] ?></h6>
          <p>
          <?php echo $mrow['content'] ?>
          <br>
          <small><?php echo $mrow['time'] ?></small>
         </p>
         <hr>
       </div>

       <?php
       }
       ?>


    </div>

    <?php include 'chat_box_2.php'; ?>






  </div>
  </div>



  <div  id="chatbox" class="hidden">

  <div class="_card text-left">
    <h4> <span id="name"></span>
    <small id="jobtitle"></small>
  </h4>
  <a id="jlink">View Job Posting</a>
  </div>
  <div class="_card text-left" style="min-height:76.5vh;position:relative">

    <div class="chat_area"  id="chat_area" style="height:70vh;overflow-y:scroll">


    </div>


    <?php include 'chat_box.php'; ?>


  </div>
  </div>


  <?php
} ?>


</div>


</div>


</div>
