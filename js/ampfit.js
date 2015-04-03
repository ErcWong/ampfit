function loadHeaderAndFooter(page) {
	$('header').load('header.html', function() {
		$('li:contains(' + page + ')').addClass('active');		
	});
	$('footer').load('footer.html');
}

function loadPongstgram() {
	$('#instagram-feed').pongstgrm(
		{
			accessId : '295165979',
			accessToken : '295165979.167035a.f95a0b3a5f54421f9fb59572756b3059'
		}
	);
}

function test(type, element) {
	var div = $('#' + type + '_training_div'); 
	div.find('img').hide();
	div.find('.rate').css('margin-right', '25px');
	$(element).find('img').show();
	$(element).find('.rate').css('margin-right', 0);
}

function setupOnPanelHover() {
	// set up hover panels
	// although this can be done without JavaScript, we've attached these events
	// because it causes the hover to be triggered when the element is tapped on a touch device
	$('.hover').hover(function(){
		$(this).addClass('flip');
	},function(){
		$(this).removeClass('flip');
	});
}

function openTestimonial(name) {
	$.ajax({
        url : name + ".txt",
        dataType: "text",
        success : function (data) {
            $(".text").html(data);
        }
    });
}

function sendInquiry() {
}