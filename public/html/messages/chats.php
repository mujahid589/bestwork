<?php
if (param1!="") {

    $ppid=param1;
    $proposals=select("proposals","where ppid='$ppid'");
    $prop=records($proposals);
    $pro=$prop['pid'];
    $check=select("chats","where ppid='$ppid'");
    $updated=  $datetime=date('Y-m-d H:i:s') ;

    if(rows($check)>0){
    }
    else {
      $query=insert("chats","cid,pid,ppid,last_updated","'$cid','$pro','$ppid','$updated'");
      if($query){
      }
      else {
      }
    }
  }

else {
}
 ?>

<div class="container-fluid">

<div class="row">

<div class="col-md-3 ">
<div class="_card text-left p-3" style="height:90vh;overflow-y:scroll">
<h6>Recent Chats</h6>
<hr>

  <?php

  if(fLoggedin()){
    $mquery=select("chats","where pid='$pid' order by last_updated desc");
  }
  else{
    $mquery=select("chats","where cid='$cid' order by last_updated desc");
  }

  while ($row=records($mquery)) {
    $propid=$row['ppid'];
    $propo=select("proposals","where ppid='$propid'");
    $prop1=records($propo);
    $jid=$prop1['jobid'];

    $j=select("jobs","where jobid='$jid'");
    $jdata=records($j);

    if(fLoggedin()){
      $client=$row['cid'];
      $dquery=select("clients","where cid='$client'");
      $data=records($dquery);
      $image="/clients/".$data['image'];
      $uid=$data['uid'];
      $u=select("users","where uid='$uid'");
      $udata=records($u);
    }
    else {
      $proid=$row['pid'];
      $dquery=select("profs","where pid='$proid'");
      $data=records($dquery);
      $uid=$data['uid'];
      $image="/professionals/".$data['image'];
      $u=select("users","where uid='$uid'");
      $udata=records($u);
    }
   ?>

  <div class="row mt-1  chat" id="chat<?php echo $row['chat_id'] ?>" onclick="openChat(<?php echo $row['chat_id'] ?>)">
    <div class="col-md-3 mt-2">
      <div style="width:50px; height:50px;background:url('/media/users<?php echo $image ;?>') center center;border-radius:50%">

      </div>
    </div>
    <div class="col-md-9 mt-2 pt-1 text-left">
          <p><?php echo $udata['name'] ?>
        <br>  <small><i><?php echo substr($jdata['jobtitle'], 0, 25)," .."; ?></i></small>
        </p>
    </div>
  </div>
  <?php
}
 ?>





</div>
</div>
