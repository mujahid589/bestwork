
<div class="chat_box pt-3 " style="position:absolute; bottom:20px; width:96.4%; background:white;z-index:1000"  >
  <div class="row" >

<div class="col-10">
  <input type="text" name="message" class="form-control" id="messageField1" style="height:43px " placeholder="Type in your message here" value="">
</div>
<div class="col-1">
  <?php if(fLoggedin()){
      ?>
      <button class="blue_btn" onclick="sendFmessage1()"> <i class="fa fa-paper-plane"></i> </button>
      <?php
  }
  else {
    ?>
    <button class="blue_btn" onclick="sendCmessage1()"> <i class="fa fa-paper-plane"></i> </button>
    <?php
  } ?>
</div>
</div>
</div>
