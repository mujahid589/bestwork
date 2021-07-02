<?php       if(page!="messages"){
 ?>
<footer>
<div class="container">
<div class="row">

<div class="col-md-3">

<h4>Useful Links</h4>

<ul class="foot-menu">
  <li> <a href="#">About Us</a> </li>
  <li> <a href="#">Community</a> </li>
  <li> <a href="#">Blog</a> </li>
</ul>

</div>

<div class="col-md-3">
  <h4>Important Links</h4>
  <ul class="foot-menu">
    <li> <a href="#">Top Rated Professionals</a> </li>
    <li> <a href="#">Bestwork Policies</a> </li>
    <li> <a href="#">Help & Support</a> </li>
  </ul>

</div>

<div class="col-md-3">
  <h4>Bestwork Policies</h4>

  <ul class="foot-menu">
    <li> <a href="#">Privacy Policy</a> </li>
    <li> <a href="#">Terms of Use</a> </li>
    <li> <a href="#">Cookies Policy</a> </li>
  </ul>


</div>
<div class="col-md-3">
  <h4>Help & Support</h4>
  <ul class="foot-menu">
    <li> <a href="#">Frequently Asked Questions</a> </li>
    <li> <a href="#">Contact Support</a> </li>
    <li> <a href="#">Report Abuse</a> </li>
  </ul>

</div>
<div class="clearfix">

</div>
<div class="col-md-12">

<hr>
<h6>
Follow Us
<ul class="social-icon">
  <br>
  <li> <a href="https://www.facebook.com/bestwork.pk"> <i class="fab fa-facebook"></i> </a> </li>
  <li> <a href="https://twitter.com/Bestworkpk"><i class="fab fa-twitter"></i> </a> </li>
  <li> <a href="https://instagram.com/bestwork.pk/"><i class="fab fa-instagram"></i>  </a> </li>
  <li> <a href="https://www.linkedin.com/company/bestwork-pk"> <i class="fab fa-linkedin"></i></a> </li>
</ul>
</h6>

<hr>
</div>

<div class="col-md-12">

<p>
All Rights Reserved &copy <?php echo date('Y') ?> Bestwork.pk | Powered & Developed By: <a href="https://softileo.com" style="color:white"><b>Softileo</b></a>
</p>
</div>

</div>
</div>
</footer>

<?php } ?>

  </body>
</html>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/fefe513ed0.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/js/materialize.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.js"></script>

<script type="text/javascript">
function testAnim(x) {
  $('.modal .modal-dialog').attr('class', 'modal-dialog ' + x + '  animated');
    $('.modal .modal-dialog .modal-lg').attr('class', 'modal-dialog ' + x + '  animated');
}
$('.modal').on('show.bs.modal', function (e) {
var anim = "fadeInUp";
    testAnim(anim);
});
$('.modal').on('hide.bs.modal', function (e) {
var anim = "fadeOutDown";
    testAnim(anim);
});

</script>
<script>

    /*
Reference: http://jsfiddle.net/BB3JK/47/
*/

    $('select').each(function(){
        var $this = $(this), numberOfOptions = $(this).children('option').length;

        $this.addClass('select-hidden');
        $this.wrap('<div class="select"></div>');
        $this.after('<div class="select-styled"></div>');

        var $styledSelect = $this.next('div.select-styled');
        $styledSelect.text($this.children('option').eq(0).text());

        var $list = $('<ul />', {
            'class': 'select-options'
        }).insertAfter($styledSelect);

        for (var i = 0; i < numberOfOptions; i++) {
            $('<li />', {
                text: $this.children('option').eq(i).text(),
                rel: $this.children('option').eq(i).val()
            }).appendTo($list);
        }

        var $listItems = $list.children('li');

        $styledSelect.click(function(e) {
            e.stopPropagation();
            $('div.select-styled.active').not(this).each(function(){
                $(this).removeClass('active').next('ul.select-options').hide();
            });
            $(this).toggleClass('active').next('ul.select-options').toggle();
        });

        $listItems.click(function(e) {
            e.stopPropagation();
            $styledSelect.text($(this).text()).removeClass('active');
            $this.val($(this).attr('rel'));
            $list.hide();
            //console.log($this.val());
        });

        $(document).click(function() {
            $styledSelect.removeClass('active');
            $list.hide();
        });

    });

</script>

<script >

$('textarea#summernote').summernote({
        placeholder: 'Enter Job Description Here',
        tabsize: 2,
        height: 150,
  toolbar: [
        //['style', ['style']],
        ['font', ['bold', 'italic', 'underline', /*'clear'*/]],
        ['para', ['ul', 'ol', 'paragraph']],
      ],
      });

</script>
