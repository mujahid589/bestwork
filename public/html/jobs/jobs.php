<div class="margin">

</div>
<div class="container">
  <div class="row">
    <div class="col-md-9">
      <?php
  
      $skills=$prof['skills'];
      $jqu=select("jobs","where skills like '%$skills%'");
      $count=rows($jqu);
       ?>
      <span id="total" style="display:none">
        <?php

      echo $count;
      ?>
     </span>
     <div id="theweb">

     </div>





<button class="blue_btn" id="lmore">Load More Jobs</button>
<p align="center" class="hidden" id="finish">No More Jobs For Now</p>

    </div>


    <script type="text/javascript">
    $(document).ready(function(){
      var flag=0;
      var k=$('#total').html();
    $.ajax({
    type:'get',
    url:'ajax-functions/load-jobs.php',
    data:{
    'offset':0,
    'limit':6,
    'skills':'<?php echo $prof['skills'] ?>'
    },
    success:function(data){
      $('#theweb').append(data);
      flag+=6;
    }
    });

    $('#lmore').click(function(){
    if(flag<= k){

    $(this).hide();
      $.ajax({
      type:'get',
      url:'ajax-functions/load-jobs.php',
      data:{
      'offset':flag,
      'limit':6,
      'skills':'<?php echo $prof['skills'] ?>'
      },
      success:function(data){
        $('#lmore').show();
        $('#theweb').append(data);
        flag+=6;
      }
      });
    }
    else{
      $('#finish').show();
      $('#lmore').hide();
    }
    });
    });



    </script>
