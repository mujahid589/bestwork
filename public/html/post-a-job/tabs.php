
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="_card text-left">

            <h2>Create A Job</h2>
            <hr>
            <div class="alert alert-danger hidden" id="err"></div>
            <div class="alert alert-success hidden" id="scc"></div>
            <div id="mainDetails" class="">

            <h4 >Title & Description</h4>
            <div  class="form-group">
                <label >Enter the name of your job post <span class="req">*</span> </label>
                <input type="text" class="form-control" id="jtitle" placeholder="Type your job title">
            </div>
            <div  class="form-group">

                <label >Here Are some good examples for description <span class="req">*</span></label>
            <ul>
                <li>What are deliverables </li>
                <li>Type of freelancer you are looking for</li>
                <li>Anything unique about the project , team or your company</li>
            </ul>
            <textarea name="descriptio " id="summernote" class="form-control" placeholder="Type your job description"></textarea>
            </div>



    <div class="margin"></div>
            <hr>

            <h4>Field & Skills <span class="req">*</span></h4>
            <p >What skills and expertise are most important to you?</p>
            <div class="row">
              <?php
              $s=select("skills","where parent=0");
              while($row=records($s)){
               ?>

                <div class="col-md-12">
                <h5><?php echo $row['skill_name'];?></h5>
                    <?php
                    $pid=$row['skill_id'];
                    $ss=select("skills","where parent='$pid'");
                    while($row2=records($ss)){
                    ?>
                    <input type="checkbox" class="d-none myskills" name="skills[]" id="for<?php echo $row2['skill_id']?>" value="<?php echo $row2['skill_name'] ?>">
                  <label for="for<?php echo $row2['skill_id']?>" class="skill" onclick="selected('<?php echo $row2['skill_id']?>')" id="sid<?php echo $row2['skill_id']?>"><?php echo $row2['skill_name']?></label>
                  <label for="for<?php echo $row2['skill_id']?>" class="skill hidden" onclick="unselected('<?php echo $row2['skill_id']?>')" style="background-color: green;" id="asid<?php echo $row2['skill_id']?>"><i class="fa fa-check-circle"></i> <?php echo $row2['skill_name']?></label>
                    <?php } ?>

                </div>
                <?php }
              ?>

                <div class="clearfix"></div>

            </div>
            <div class="margin"></div>
            <h4>Budget,Deadline & Connects </h4>
            <div class="row">
                <div class="col-md-6">
                    <label for="">Budget (in USD) <span class="req">*</span></label>
                    <input type="text" class="form-control" id="budget" name="budget" placeholder="Enter your budget">
                </div>
                <div class="col-lg-3">
                    <label for="">Deadline/Time <span class="req">*</span></label>
                    <br>
                    <select name="deadline" id="dead" class="select form-control d-none">
                        <option value="">Select Your Deadline</option>
                        <option value="1-week">Less than 1 week </option>
                        <option value="1-month">Less than 1 Month </option>
                        <option value="1-3-months">1-3 Months </option>
                        <option value="3-6-months">3 to 6 Months </option>
                    </select>
                </div>
                <div class="col-lg-3 ">
                    <label for="">Connects Required <span class="req">*</span></label>
                    <br>
                    <select name="deadlin" id="connects" class="select form-control d-none">
                        <option value="">Select Connects </option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>
            </div>

            <div class="margin"></div>
<div class="row">

            <div class="col-md-12">
              <button type="button" class="blue_btn" id="submit-all">Submit Details & Go Next <i class="fa fa-angle-double-right"></i> </button>

            </div>
          </div>

          </div>

            <div class="text-center hidden " id="fToUpload">
              <div class="margin">

              </div>
            <h4>Job Attachments</h4>
            <p >Additional files (optional)</p >
            <div class="row">
                <div class="col-md-12">

                    <div align="left">
            <!-- <form action="ajax-functions/upload-attachments.php" class="dropzone" id="dropzonewidget" >
              </form> -->

              <input type="hidden" id="jid" name="jid" value="">
              <form action="upload.php" id="zdrop" class="fileuploader center-align">
                           <div id="upload-label" style="width: 150px;">
                             <i class="material-icons">cloud_upload</i>
                           </div>
                           <span class="tittle">Click the Button or Drop Files Here</span>
                         </form>

                         <!-- Preview collection of uploaded documents -->
                         <div class="preview-container">
                           <div class="collection card" id="previews">
                             <div class="collection-item clearhack valign-wrapper item-template" id="zdrop-template">
                               <div class="left pv zdrop-info" data-dz-thumbnail>
                                 <div>
                                   <span data-dz-name></span> <span data-dz-size></span>
                                 </div>
                                 <div class="progress">
                                   <div class="determinate" style="width:0" data-dz-uploadprogress></div>
                                 </div>
                                 <div class="dz-error-message"><span data-dz-errormessage></span></div>
                               </div>

                               <div class="secondary-content actions">
                                 <a href="#!" data-dz-remove class="btn-floating ph red white-text waves-effect waves-light"><i class="material-icons white-text">clear</i></a>
                               </div>
                             </div>
                           </div>
                         </div>


                        <br>
                        <div class="row text-center">
<div class="col-md-12">

                          <p>
<br>
<a onclick="jobpost()" href="javascript:void(0)"> View Job Posting | </a>
                        <a href="/"> Go To Dashboard</a>
                        </p>
                      </div>
                      </div>

                    </div>
                </div>
            </div>
          </div>
          <div class="row">

        </div>
        </div>
        <div class="clearfix">

        </div>
    </div>
</div>
</div>
<script>
function selected(x){
$('#sid'+x).hide();
$('#asid'+x).show();
}
function unselected(x){
    $('#sid'+x).show();
    $('#asid'+x).hide();
}


</script>

    <script>
    var jid="0";
    var hash = '#err';
        $('#submit-all').click(function(){
        if($('#jtitle').val()==""){
        $('#err').show();
        $('#err').html('<li>Please Enter Job Title</li>');
        scrollHash();
    }
        else if($('#summernote').val()==""){
        $('#err').show();
        $('#err').html('<li>Please Enter Job Description</li>');
        scrollHash();
    }
        else if($('input[type=checkbox]:checked').length == 0)
    {
        $('#err').show();
        $('#err').html('<li>Please Select At Least 1 Job Skill</li>');
        scrollHash();
    }
        else if($('#budget').val()=="")
    {
        $('#err').show();
        $('#err').html('<li>Please Type Your Affordable Budget</li>');
        scrollHash();
    }
        else if($('#dead').val()=="")
    {
        $('#err').show();
        $('#err').html('<li>Please Select Your Deadline Range</li>');
        scrollHash();
    }
        else if($('#connects').val()=="")
    {
        $('#err').show();
        $('#err').html('<li>Please Select Number of connects required to apply for a job</li>');
        scrollHash();
    }else{
      var output = $.map($(':checkbox[name=skills\\[\\]]:checked'), function(n, i){
            return n.value;
      }).join(',');
      $.ajax({
        url:'/ajax-functions/job-post.php',
        method:'post',
        data:{
          purpose:'data',
          title:$('#jtitle').val(),
          description:$('#summernote').val(),
          skill:output,
          budget:$('#budget').val(),
          time:$('#dead').val(),
          connects:$('#connects').val(),
        },success:function(data){
          if (data=="failed") {
            $('#err').show();
            $('#err').html(data);
            $('#err').html('<li>Something went wrong while updating data. Please try again later or contact <a href="/contact">Support</a></li>');
            scrollHash();
          }else {
            $('#scc').show();
            $('#scc').html("Details Updated Successfully, Upload File Attachments if needed");
            $('#fToUpload').show();
            $('#mainDetails').hide();
            $('#err').hide();
            $('#jid').val(data);
            jid=data;
            scrollHash();
          }
        }
      });
    }


});


</script>
<script>


        function scrollHash(){
        event.preventDefault();
        $('html, body').animate({
        scrollTop: $(hash).offset().top
    }, 800, function(){
        window.location.hash = hash;
    });
        }

        function jobpost(){
          window.location.href="job-post/"+$('#jid').val();
        }

</script>

<script type="text/javascript">
$(document).ready(function(){

initFileUploader("#zdrop");
  function initFileUploader(target) {
    var previewNode = document.querySelector("#zdrop-template");
    previewNode.id = "";
    var previewTemplate = previewNode.parentNode.innerHTML;
    previewNode.parentNode.removeChild(previewNode);


    var zdrop = new Dropzone(target, {
      url: 'ajax-functions/upload-attachments.php',
              maxFiles:10,
      maxFilesize:30,
      previewTemplate: previewTemplate,
      previewsContainer: "#previews",
      clickable: "#upload-label"
    });

    zdrop.on("addedfile", function(file) {
      $('.preview-container').css('visibility', 'visible');
    });

    zdrop.on("totaluploadprogress", function (progress) {
      var progr = document.querySelector(".progress .determinate");
        if (progr === undefined || progr === null)
            return;

          progr.style.width = progress + "%";
        });

        zdrop.on('dragenter', function () {
          $('.fileuploader').addClass("active");
        });

        zdrop.on('dragleave', function () {
          $('.fileuploader').removeClass("active");
        });

        zdrop.on('drop', function () {
          $('.fileuploader').removeClass("active");
        });

    }

});
</script>
