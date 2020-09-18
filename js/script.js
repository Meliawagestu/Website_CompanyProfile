// efent pada saat link diklik
$('.page-scroll').on('click',function(e){

	// ambil sis href
	var tujuan = $(this).attr('href');

	// tangkap elemen ybs
	var elemenTujuan = $(tujuan);

	// pindahkan scroll
	$('body').animate({
		scrollTop: elemenTujuan.offset().top - 50
	}, 1250, 'easeInOutExpo');
	e.preventDefault();
});


// parallax
$(window).scroll(function() {
var wScroll= $(this).scrollTop();

// jumbotron

$('.jumbotron img').css({

'transform' : 'translate(0px, '+ wScroll/4+'%)'
});

$('.jumbotron h1').css({

'transform' : 'translate(0px, '+ wScroll/2+'%)'
});

$('.jumbotron p').css({

'transform' : 'translate(0px, '+ wScroll/1.2+'%)'
});


// galeri
if( wScroll > $('.galeri').offset().top - 250 ) {

	$('.galeri .thumbnail').each(function(i){
		setTimeout(function(){
			 $('.galeri .thumbnail').eq(i).addClass('muncul');
		}, 300 * (i+1));
	});

	

}

// Service
if( wScroll > $('.service').offset().top - 250 ) {

	$('.service .thumbnail').each(function(i){
		setTimeout(function(){
			 $('.service .thumbnail').eq(i).addClass('show');
		}, 300 * (i+1));
	});

	

}


// pencapaian
if( wScroll > $('.pencapaian').offset().top - 250 ) {

	$('.pencapaian .thumbnail').each(function(i){
		setTimeout(function(){
			 $('.pencapaian .thumbnail').eq(i).addClass('tampil');
		}, 300 * (i+1));
	});

	

}

// visimisi
if( wScroll > $('.visimisi').offset().top - 250 ) {

	$('.visimisi .gerak').each(function(i){
		setTimeout(function(){
			 $('.visimisi .gerak').eq(i).addClass('ada');
		}, 300 * (i+1));
	});

	

}

// sejarah
if( wScroll > $('.about').offset().top - 250 ) {

	$('.about .gerakk').each(function(i){
		setTimeout(function(){
			 $('.about .gerakk').eq(i).addClass('adaa');
		}, 300 * (i+1));
	});

	

}

});


