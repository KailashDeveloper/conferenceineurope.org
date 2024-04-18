<script src="js/bootstrap.js" type="text/javascript"></script>
<script src="js/droopmenu.js" type="text/javascript"></script>
<script src="js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="js/slick.js" type="text/javascript" charset="utf-8"></script>
<script src="js/main.js" type="text/javascript" charset="utf-8"></script>
<script src="js/wow.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
jQuery(function ($) {
$('.droopmenu-navbar').droopmenu({
dmAnimationEffect: 'dmfade'
});
});
</script>   

<script>
var i = $('div.hj iframe');
console.log(i.length);
i.removeAttr('width');
i.removeAttr('height');
</script>

<script>
$("#myButton").click(function () {
$('html, body').animate({
scrollTop: $("#myDiv").offset().top
}, 2000);
});
</script>

<script>new WOW().init();</script>

<?php
if(isset($link)){
mysqli_close($link);
	unset($link);
}
?>