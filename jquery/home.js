function homePage(){
	location.href='home.html';
}

function facebookPage(){
	location.href='https://www.facebook.com/foodstop.landing';
}

$('.navbar-header').find('button').eq(0).on('click',homePage);
$('.navbar-header').find('button').eq(1).on('click',facebookPage);