<script type="text/javascript">

var chat_id="";

  function  sendFmessage(){

    var content=$('#messageField').val();
    if(content==""){
      alert("Cannot send empty message");
    }
    else {

        $.ajax({
          url:'/ajax-functions/messages.php',
          type:'post',
          data:{
            purpose:'sendMessage',
            chat_id:chat_id,
            content:content,
            type:2
          },success:function(data){
            $('#chat_area').append(data);
            $('#messageField').val("")
          }
        });

    }
  }


  function  sendCmessage(){

    var content=$('#messageField').val();
    alert(content);
    if(content==""){
      alert("Cannot send empty message");
    }
    else {

        $.ajax({
          url:'/ajax-functions/messages.php',
          type:'post',
          data:{
            purpose:'sendMessage',
            chat_id:chat_id,
            content:content,
            type:2
          },success:function(data){
            $('#chat_area').append(data);
            $('#messageField').val("")
          }
        });

    }


  }


  function  sendFmessage1(){
    alert("F message 1");
  }
  function  sendCmessage1(){
    alert("c message 1");
  }

  function openChat(v){
     chat_id=v;
    $('#openchat').hide();
    $('#wait').hide();
    $('#chatbox').show();

    $.ajax({
      url:'/ajax-functions/messages.php',
      type:'post',
      data:{
        purpose:'getChatData',
        chat_id:v
      },success:function(data){
        myData=data;
        $("#name").html(myData.uname);
        $("#jobtitle").html(myData.jobtitle);
        $("#jlink").attr("href","/job-post/"+myData.jobid);
      }
    });

    $.ajax({
      url:'/ajax-functions/messages.php',
      type:'post',
      data:{
        purpose:'getMessages',
        chat_id:v
      },success:function(data){
        $('#chat_area').html(data);
      }
    });


    setInterval(function(){
      $.ajax({
        url:'/ajax-functions/messages.php',
        type:'post',
        data:{
          purpose:'getUpdatedMessages',
          chat_id:v
        },success:function(data){
          $('#chat_area').append(data);
        }
      });
    },3000);

  }



</script>
