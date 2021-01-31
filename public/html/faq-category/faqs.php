
<div class="col-md-8">

<div class="_card text-left" id="sec1">
<h3 class="dheading">Withdrawals</h3>


<div id="accordion" class="accordion-container">
				<article class="content-entry">
						<h4 class="article-title"><i></i>Accordion Title 1</h4>
						<div class="accordion-content">
								<p>Accordion content 1</p>
						</div>
						<!--/.accordion-content-->
				</article>

				<article class="content-entry">
						<h4 class="article-title"><i></i>Accordion Title 2</h4>
						<div class="accordion-content">
								<p>Accordion content 2</p>
						</div>
						<!--/.accordion-content-->
				</article>

				<article class="content-entry">
						<h4 class="article-title"><i></i>Accordion Title 3</h4>
						<div class="accordion-content">
								<p>Accordion content 3</p>
						</div>
						<!--/.accordion-content-->
				</article>

				<article class="content-entry">
						<h4 class="article-title"><i></i>Accordion Title 4</h4>
						<div class="accordion-content">
								<p>Accordion content 4</p>
						</div>
						<!--/.accordion-content-->
				</article>

		</div>
		<!--/#accordion-->



</div>

<div class="_card text-left" id="sec2">
<h3 class="dheading">Contracts</h3>
</div>

<div class="_card text-left" id="sec3">
<h3 class="dheading">Category 2</h3>
</div>

<div class="_card text-left" id="sec4">
<h3 class="dheading">category 4</h3>
</div>

<div class="_card text-left" id="sec5">
<h3 class="dheading">Category 5</h3>
</div>


</div>
</div>
</div>

<div class="margin">

</div>


<script type="text/javascript">
$(function() {
  var Accordion = function(el, multiple) {
      this.el = el || {};
      this.multiple = multiple || false;

      var links = this.el.find('.article-title');
      links.on('click', {
          el: this.el,
          multiple: this.multiple
      }, this.dropdown)
  }

  Accordion.prototype.dropdown = function(e) {
      var $el = e.data.el;
      $this = $(this),
          $next = $this.next();

      $next.slideToggle();
      $this.parent().toggleClass('open');

      if (!e.data.multiple) {
          $el.find('.accordion-content').not($next).slideUp().parent().removeClass('open');
      };
  }
  var accordion = new Accordion($('.accordion-container'), false);
});

$(document).on('click', function (event) {
if (!$(event.target).closest('#accordion').length) {
  $this.parent().toggleClass('open');
}
});
</script>
