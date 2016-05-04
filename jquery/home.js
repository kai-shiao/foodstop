function homePage(){
	location.href='home.html';
}

$('.navbar-header').find('button').eq(0).on('click',homePage);