<?php
session_start();
include '../database/db.php';
include "../app/functions/controller.php";

if (isset($_POST['purpose'])) {
  extract($_POST);
  if($purpose=="getChatData"){


    if(fLoggedin()){
      $pid=$_SESSION['pid'];
      $mquery2=select("chats","where pid='$pid' and chat_id='$chat_id'");
    }
    else{
      $cid=$_SESSION['cid'];
      $mquery2=select("chats","where cid='$cid' and chat_id='$chat_id'");
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


      $data=[
        'uname' => $udata['name'],
        'jobtitle' => $jdata['jobtitle'],
        'jobid' => $jdata['jobid']
      ];
      header('Content-Type: application/json');
      echo json_encode($data);
  }



  if($purpose=="getMessages"){
    $mj=select("message","where chat_id='$chat_id' order by time asc limit 10");
    while ($mrow=records($mj)) {

      if(fLoggedin()){
        $pid=$_SESSION['pid'];
        $mquery2=select("chats","where pid='$pid' and chat_id='$chat_id'");
      }
      else{
        $cid=$_SESSION['cid'];
        $mquery2=select("chats","where cid='$cid' and chat_id='$chat_id'");
      }
        $row2=records($mquery2);

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
     $_SESSION['lastid']=$mrow['mid'];
     }

  }




    if($purpose=="getUpdatedMessages"){
      $lastid=$_SESSION['lastid'];
      $mj=select("message","where chat_id='$chat_id' and mid>'$lastid' order by time asc ");
      while ($mrow=records($mj)) {
        if(fLoggedin()){
          $pid=$_SESSION['pid'];
          $mquery2=select("chats","where pid='$pid' and chat_id='$chat_id'");
        }
        else{
          $cid=$_SESSION['cid'];
          $mquery2=select("chats","where cid='$cid' and chat_id='$chat_id'");
        }
          $row2=records($mquery2);


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
       $_SESSION['lastid']=$mrow['mid'];
       }

    }


    if($purpose=="sendMessage"){
      $updated=  $datetime=date('Y-m-d H:i:s') ;
      $query=insert("message","chat_id,content,time,type","'$chat_id','$content','$updated','$type'");
      $query2=update("chats","last_updated='$updated' where chat_id='$chat_id'");
      if($query && $query2){
        $lmid=lastid($query);
        $lastid=$_SESSION['lastid'];
        $mj=select("message","where mid='$lmid' ");
        $mrow=records($mj);
          if(fLoggedin()){
            $pid=$_SESSION['pid'];
            $mquery2=select("chats","where pid='$pid' and chat_id='$chat_id'");
          }
          else{
            $cid=$_SESSION['cid'];
            $mquery2=select("chats","where cid='$cid' and chat_id='$chat_id'");
          }
            $row2=records($mquery2);


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
    $_SESSION['lastid']=$mrow['mid'];
    }




}
}
?>
