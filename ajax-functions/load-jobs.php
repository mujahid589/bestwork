<?php
session_start();
include '../database/db.php';
include "../app/functions/controller.php";
if(isset($_GET['offset']) && isset($_GET['limit'])){
  extract($_GET);
$offset=$_GET['offset'];
$limit=$_GET['limit'];
$query=select("jobs","where skills like '%$skills%' order by datetime DESC LIMIT {$limit} OFFSET {$offset} ");
while ($row=records($query)) {
  $cid=$row['cid'];
  $cdata=select("clients","where cid='$cid'");
  $row2=records($cdata);
  ?>
  <div class="_card p-0 text-left">
    <a class="jlink" href="/job-post/<?php echo $row['jobid'] ?>" target="_blank">
    <div id="protabs" class="p-3">
      <h6 class="h5"><?php echo $row['jobtitle'] ?></h6>
      <small>Est. Budget: <?php echo $row['budget'] ?> USD | Delivery Time: <?php     if($row['time']=="1-week"){
            echo "Less than 1 Week";
          }
          else if($row['time']=="1-month") {
            echo "Less than 1 Month";
          }
          else if($row['time']=="1-3-months") {
            echo "1 to 3 Months";
          }
          else if($row['time']=="3-5-months") {
            echo "3 to 6 Months";
          } ?> | Location: <?php echo $row2['country'] ?> | Posted: <?php echo time_elapsed_string($row['datetime']) ?></small>
    </div>
    </a>
    <div class="p-3">
      <a class="jlink" href="/job-post/<?php echo $row['jobid'] ?>" target="_blank" style="color:#000">

      <?php echo  substr($row['description'], 0, 300) . "<a href='/job-post/".$row['jobid']. "'>....View Full Job</a> " ?>

  </a>
      <br>
      <?php
      $jid=$row['jobid'];
      $getAttachments=select("job_attachements","where jobid='$jid'");
      $cJ=rows($getAttachments);
      if ($cJ==0) {
        echo "No Additional Files";
      }else {
        // code...
      while($att=records($getAttachments)){

       ?>

      <a href="/media/job-attachments/<?php echo $att['name'] ?>" target="_blank"> <?php echo $att['name'] ?> </a> <br>

       <?php
      }
      }

       ?>

  <hr>
<?php
$tags = explode(',', $row['skills']);
foreach ($tags as &$tag) {
  echo "<span class='skill m-1'>". $tag ."</span>";
}

 ?>    </div>
  </div>

    <?php
  }
}
  ?>
