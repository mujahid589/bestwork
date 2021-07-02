<?php
include('database/db.php');

if(isset($_GET['skid'])){
      extract($_GET);
    $query=mysqli_query($db,"delete from skills where skill_id='$skid'");
    if($query){
        header('location:skills.php?message=Skill Deleted successfully&check=1');
    }else{
        header('location:skills.php?message=Something went wrong&check=0');
    }
}else{
    header('location:index.php');
}

?>