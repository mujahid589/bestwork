<div class="_card col-md-12 text-left ">
  <h3>Add Languages</h3>

  <div class="row">
    <div class="col-md-4">
      <div class="form-group">

      <label>Choose Language</label>
      <select class="form-control" required name="language" id="lang">
        <option value="">Select Language</option>
        <option value="Afrikaans">Afrikaans</option>
            <option value="Albanian">Albanian</option>
            <option value="Arabic">Arabic</option>
            <option value="Armenian">Armenian</option>
            <option value="Basque">Basque</option>
            <option value="Bengali">Bengali</option>
            <option value="Bulgarian">Bulgarian</option>
            <option value="Catalan">Catalan</option>
            <option value="Cambodian">Cambodian</option>
            <option value="Chinese (Mandarin)">Chinese (Mandarin)</option>
            <option value="Croatian">Croatian</option>
            <option value="Czech">Czech</option>
            <option value="Danish">Danish</option>
            <option value="Dutch">Dutch</option>
            <option value="English">English</option>
            <option value="Estonian">Estonian</option>
            <option value="Fiji">Fiji</option>
            <option value="Finnish">Finnish</option>
            <option value="French">French</option>
            <option value="Georgian">Georgian</option>
            <option value="German">German</option>
            <option value="Greek">Greek</option>
            <option value="Gujarati">Gujarati</option>
            <option value="Hebrew">Hebrew</option>
            <option value="Hindi">Hindi</option>
            <option value="Hungarian">Hungarian</option>
            <option value="Icelandic">Icelandic</option>
            <option value="Indonesian">Indonesian</option>
            <option value="Irish">Irish</option>
            <option value="Italian">Italian</option>
            <option value="Japanese">Japanese</option>
            <option value="Javanese">Javanese</option>
            <option value="Korean">Korean</option>
            <option value="Latin">Latin</option>
            <option value="Latvian">Latvian</option>
            <option value="Lithuanian">Lithuanian</option>
            <option value="Macedonian">Macedonian</option>
            <option value="Malay">Malay</option>
            <option value="Malayalam">Malayalam</option>
            <option value="Maltese">Maltese</option>
            <option value="Maori">Maori</option>
            <option value="Marathi">Marathi</option>
            <option value="Mongolian">Mongolian</option>
            <option value="Nepali">Nepali</option>
            <option value="Norwegian">Norwegian</option>
            <option value="Persian">Persian</option>
            <option value="Polish">Polish</option>
            <option value="Portuguese">Portuguese</option>
            <option value="Punjabi">Punjabi</option>
            <option value="Quechua">Quechua</option>
            <option value="Romanian">Romanian</option>
            <option value="Russian">Russian</option>
            <option value="Samoan">Samoan</option>
            <option value="Serbian">Serbian</option>
            <option value="Slovak">Slovak</option>
            <option value="Slovenian">Slovenian</option>
            <option value="Spanish">Spanish</option>
            <option value="Swahili">Swahili</option>
            <option value="Swedish ">Swedish </option>
            <option value="Tamil">Tamil</option>
            <option value="Tatar">Tatar</option>
            <option value="Telugu">Telugu</option>
            <option value="Thai">Thai</option>
            <option value="Tibetan">Tibetan</option>
            <option value="Tonga">Tonga</option>
            <option value="Turkish">Turkish</option>
            <option value="Ukrainian">Ukrainian</option>
            <option value="Urdu">Urdu</option>
            <option value="Uzbek">Uzbek</option>
            <option value="Vietnamese">Vietnamese</option>
            <option value="Welsh">Welsh</option>
            <option value="Xhosa">Xhosa</option>
      </select>
    </div>

    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label>Choose Level</label>
 <br>
          <select class="form-control" required name="level" id="level">
            <option value="">Select Level</option>
            <option value="Basic">Basic</option>
            <option value="Fluent">Fluent</option>
            <option value="Native">Native</option>
          </select>
      </div>
    </div>
    <div class="col-md-4">
      <br>
      <button class="blue_btn" id="lang-btn" onclick="addLanguage(<?php echo $pid ?>)" style="margin-top:5px">Add Language</button>

    </div>
    <div class="col-md-12">
      <span id="lang-error"></span>

    </div>
    <div class="verifications p-3 col-md-12" id="lng">
      <?php
      $lang=select("languages","where pid='$pid' order by lid desc");
      while ($row=records($lang)) {
        ?>
        <li id="lan<?php echo $row['lid']; ?>"> <?php echo $row['language'] ?> - <?php echo $row['level'] ?> &nbsp; <i class="fa fa-trash trash" onclick="deletelang(<?php echo $pid ?>,
          <?php echo $row['lid'] ?>)"></i> </li>
        <?php
      }
       ?>
    </div>
    <div class="clearfix">

    </div>
  </div>

</div>

<script type="text/javascript">

function addLanguage(x){
  $(document).ready(function(){
    if($('#lang').val()==""){
      $('#lang-error').html('<div class="alert alert-danger">Please Select Language</div>')
    }
    else if($('#level').val()==""){
      $('#lang-error').html('<div class="alert alert-danger">Please Select Language Level</div>')
    }else {
      $('#lang-error').html('');
      $('#lang-btn').html('<i class="fa fa-spinner fa-spin"> </i> <i>Adding</i> ');
      var lang=$('#lang').val();
      var level=$('#level').val();
      $.ajax({
        url:'ajax-functions/freelance-profile.php',
        type:'get',
        data:{
          purpose:'addLanguage',
          pid:x,
          lang:lang,
          level:level
        },success:function(data){
          $('#lang-btn').html('Add Language');

           if(data=="failed"){
            $('#lang-error').html('<div class="alert alert-danger">Something went wrong. Please try again later.</div>')
          }else if (data=="exists") {
            $('#lang-error').html('<div class="alert alert-danger">Language already exists.</div>')
          }else {
            $('#lang-error').html('<div class="alert alert-success">Language Added Successfully</div>')
            $('#lng').prepend("<li id='lan"+data+"'>"+lang + " - " + level + "&nbsp; <i class='fa fa-trash trash' onclick='deletelang(<?php echo $pid ?>,"+ data +")' ></i> </li>");
          }
        }
      })
    }
  })
}

function deletelang(x,y){
  $(document).ready(function(){

  $.ajax({
    url:'ajax-functions/freelance-profile.php',
    type:'get',
    data:{
      purpose:'delLanguage',
      pid:x,
      lid:y
    },success:function(data){
      if(data=="success"){
        $('#lan'+y).fadeOut();
      }
      else if(data=="failed"){
        $('#lanerr').html('<div class="alert alert-danger">Something went wrong. Please try again later.</div>')
      }
}
});
});
}


</script>
