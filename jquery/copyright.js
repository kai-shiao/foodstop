(function(){
	var $dateObject=new Date();
	var $currentYear=$dateObject.getFullYear();
	
	var $htmlMarkup='<p>&copy; '+$currentYear+' KAI SHIAO. ALL RIGHTS RESERVED.</p><p>ANY QUESTIONS, CONCERNS, AND/OR FEEDBACK SHOULD BE DIRECTED';
		$htmlMarkup+=' TO WEBMASTER@FOODSTOP.COM</p>';
	$('footer').html($htmlMarkup);
})();