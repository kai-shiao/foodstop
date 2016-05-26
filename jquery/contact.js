(function(){
	function homePage(){
		location.href='home.html';
	}

	function facebookPage(){
		location.href='https://www.facebook.com/foodstop.landing';
	}

	$('.navbar-header').find('button').eq(0).on('click',homePage);
	$('.navbar-header').find('button').eq(1).on('click',facebookPage);

	var $dateObject=new Date();
	var $currentYear=$dateObject.getFullYear();
		
	var $htmlMarkup='<p>&copy; '+$currentYear+' KAI SHIAO. ALL RIGHTS RESERVED.</p><p>ANY QUESTIONS, CONCERNS, AND/OR FEEDBACK SHOULD BE DIRECTED';
		$htmlMarkup+=' TO WEBMASTER@FOODSTOP.COM</p>';
	$('footer').html($htmlMarkup);

	function checkBeforeSubmit(e){
		var $fields=[$('form').find('input[name="name"]').val(),
					 $('form').find('input[name="emailAddress"]').val(),
					 $('form').find('input[name="message"]').val()
		];
		var $counter=0;
		for (var $i=0;$i<$fields.length;$i++){
			if ($fields[$i]===''){
				$counter++;
			}
		}
		console.log($counter);
		if ($counter>0){
			e.preventDefault();
			var $alertBox='<div class="alert alert-danger alert-dismissible text-center" role="alert"><button type="button" class="close" data-dismiss="alert"';
				$alertBox+='aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>WARNING! There are';
				$alertBox+=' incomplete fields!</strong></div>';
			
			$($alertBox).insertBefore('form button');
		}
	}
	
	$('form').find('button').on('click',checkBeforeSubmit);
})();

