$(document).ready(function(){
	$('#home-nav').on('click', function(){
		$(this).addClass('active-link');
		$('#summary-nav').removeClass('active-link');
		$('#biometric-nav').removeClass('active-link');
		$('#profile-nav').removeClass('active-link');
		$('.home-page').show();
		$('.profile-section').hide();
		$('.miscellaneous').show();
		$('.pension-summary').hide();
		$('.biometric-history').hide();


	});
	$('#profile-nav').on('click', function(){
		$(this).addClass('active-link');
		$('#summary-nav').removeClass('active-link');
		$('#home-nav').removeClass('active-link');
		$('#biometric-nav').removeClass('active-link');
		$('.profile-section').show();
		$('.home-page').hide();
		$('.biometric-history').hide();
		$('.miscellaneous').hide();
		$('.pension-summary').hide();

	});
	$('#summary-nav').on('click', function(){
		$(this).addClass('active-link');
		$('.pension-summary').show();
		$('.profile-section').hide();
		$('.biometric-history').hide();
		$('.home-page').hide();
		$('.miscellaneous').hide();
		$('#biometric-nav').removeClass('active-link');
		$('#home-nav').removeClass('active-link');
		$('#profile-nav').removeClass('active-link');

	});
	$('#biometric-nav').on('click', function(){
		$(this).addClass('active-link');
		$('.biometric-history').show();
		$('.pension-summary').hide();
		$('.profile-section').hide();
		$('.home-page').hide();
		$('.miscellaneous').hide();	
		$('#summary-nav').removeClass('active-link');
		$('#home-nav').removeClass('active-link');
		$('#profile-nav').removeClass('active-link');

	});
});
