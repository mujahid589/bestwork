      <div class="col-md-12 _card text-left">
        <div class="alert hidden" id="msgskill">

        </div>
        <div class="form-group">
          <label>Choose Your Skills <small>(You can add maximum of 15 skills)</small> </label>
          <input type="text" id="tag1" class="form-control" placeholder="Enter Your Skills" value="" />
        </div>

        <div class="form-group">
          <button class="blue_btn" id="updSkills">Update Skills</button>
        </div>


      </div>

      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
      <script type="text/javascript" src="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
      <script type="text/javascript">
      var data =
      '[<?php $a=1; $skills=select("skills","");
        $counts=rows($skills);
        while ($sk=records($skills)){?>{"value":"<?php echo $sk['skill_name'] ?>","text":"<?php echo $sk['skill_name'] ?>","continent":"Task" }<?php if($a!=$counts){echo",";} $a++;}?>]';
      //get data pass to json
      var task = new Bloodhound({
      datumTokenizer: Bloodhound.tokenizers.obj.whitespace("text"),
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      local: jQuery.parseJSON(data) //your can use json type
      });

      task.initialize();
      var elt = $("#tag1");
      elt.tagsinput({
      itemValue: "value",
      itemText: "text",
      maxTags: 15,
      typeaheadjs: {
        name: "task",
        displayKey: "text",
        source: task.ttAdapter(),
      }
      });


      // insert data to input in load page
      <?php
      $as=1;
      $skills=explode(",",$prof['skills']);
      foreach ($skills as $skill ) {
        ?>
        elt.tagsinput("add", {
        value: "<?php echo $skill ?>",
        text: "<?php echo $skill ?>",
        continent: "task"
        });
        <?php
        $a++;
      }
       ?>
      </script>

      <script type="text/javascript">
        $('#updSkills').click(function(){
          if($('#tag1').val()==""){
            $('#msgskill').show();
            $('#msgskill').addClass("alert-danger");
            $('#msgskill').html("Please Add Some Skills");
          }
          else{
            $.ajax({
              method:'get',
              url:'ajax-functions/freelance-profile.php',
              data:{
                purpose:'updateSkills',
                skills:""+$('#tag1').val()+""
              },success:function(data){
                if(data=="success"){
                  $('#msgskill').show();
                  $('#msgskill').removeClass('alert-danger');
                  $('#msgskill').addClass('alert-success');
                  $('#msgskill').html('Skills Updated Successfully');
                }
                else{
                  $('#msgskill').show();
                  $('#msgskill').addClass("alert-danger");
                  $('#msgskill').html('Something went wrong while updating skills. Please try again later.');
                }
               }
            });
          }
        });
      </script>
