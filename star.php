
<!-- put this where you want to add star rating-->

<div id="raty2" class="text-lg inline-block"></div><br/>

<!-- -->

<!-- put this in the ajax-->
 $('#raty2').raty({
                    score: 4,
                    starOff: 'fa fa-star-o text-orange',
                    starOn: 'fa fa-star text-orange',
                    //target : '#hint2',
                    targetType : 'number',
                    targetKeep : true
                });
		<!-- -->		
				
		<!-- put this in the  Script library-->		
				 <script src="assets/js/vendor/raty-fa/jquery.raty-fa.js"></script>
				 
	  <!-- -->