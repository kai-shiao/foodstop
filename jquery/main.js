(function(){
	var $dateObject=new Date();
	var $currentYear=$dateObject.getFullYear();
		
	var $htmlMarkup='<p>&copy; '+$currentYear+' KAI SHIAO. ALL RIGHTS RESERVED.</p><p>ANY PROBLEMS WITH THE WEB SITE AND SUGGESTIONS SHOULD BE DIRECTED';
		$htmlMarkup+=' TO WEBMASTER@FOODSTOP.COM</p>';
	$('footer').html($htmlMarkup);

	function homePage(){
		location.href='home.html';
	}

	function facebookPage(){
		location.href='https://www.facebook.com/foodstop.landing';
	}

	$('.navbar-header').find('button').eq(0).on('click',homePage);
	$('.navbar-header').find('button').eq(1).on('click',facebookPage);
})();

