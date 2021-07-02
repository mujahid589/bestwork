
<div class="col-md-8">

  <div class="_card p-4 text-left">
    <p>
      <?php echo $prof['description'] ?>
  </p>

<hr>
<h2 class="dheading">Skills</h2>
<?php
$tags = explode(',', $prof['skills']);
foreach ($tags as &$tag) {
  echo "<span class='skill m-1'>". $tag ."</span>";
}
 ?>
</div>
