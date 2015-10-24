function loadHeaderAndFooter(page) {
	var html = (page=='Home' ? 'home':'');
	$('header').load('/ampfit/header'+ html + '.html', function() {
		$('li:contains(' + page + ')').first().addClass('active');
	});
	$('footer').load('/ampfit/footer.html');
}

function scrollToTag(target) {
	var jump = target;
	var new_position = $(jump, top.document).offset();
	$('html,body').stop(true, true).animate({
		scrollTop : new_position.top - 63
	}, 500);
	return false;
}

function loadPage() {
	var hash = location.hash;
	if (hash) {
		scrollToTag(hash);
	}
}

function justifyGalleryLayout() {
	if ($(window).width() > 414) {
		$("#mygallery").justifiedGallery({
			rowHeight : 250,
			fixedHeight : false,
			lastRow : 'justify',
			margins : 2,
		});
	} else {
		$("#mygallery").justifiedGallery({
			rowHeight : 150,
			fixedHeight : false,
			lastRow : 'justify',
			margins : 3,
		});
	}
}

function loadInitialTrainingTab() {
	var tab_parts = window.location.href.split('#');

	if (tab_parts.length > 1) {
		var tab = tab_parts[1];
		$('a[href=#' + tab + ']').click();
	} else {
		$('ul.nav-tabs a').first().click();
	}
}

function loadTrainingTab(uri, tab, anchor) {
	$('#training-tab-content').load(uri, function() {
		setupOnFolioHover();

		if (anchor != null) {
			$('#' + anchor)[0].scrollIntoView();
		}
	});

	$('ul.nav-tabs li.active').removeClass('active');
	if (tab != null) {
		$(tab).parent().addClass('active');
		$('li[role=presentation]').find('a.dropdown-toggle').css('color',
				'#9d9d9d');
		$(tab).parents('li[role=presentation]').find('a.dropdown-toggle').css(
				'color', '#9E1D20');
	}
}

function loadTestimonials(page) {
	$('#testimonial-block').load('testimonialblock.html');
}

function loadTestimonial(name) {
	$('#testimonial').load('/ampfit/testimonials/testimony/' + name + '.txt');
	$('#testimonial-title').text($('#' + name + '-title').text());

	var tmp = '/ampfit/img/amp/testimonials/' + name + '.jpg';

	var result = doesFileExist(tmp);

	if (result) {
		$('#testimonial-img').attr('src',
				'/ampfit/img/amp/testimonials/' + name + '.jpg');
	} else {
		$('#testimonial-img').attr('src',
				'/ampfit/img/amp/testimonials/default.jpg');
	}
}

function doesFileExist(urlToFile) {
	var xhr = new XMLHttpRequest();
	xhr.open('HEAD', urlToFile, false);
	xhr.send();
	return xhr.status != "404";
}

function loadPongstgram() {
	$('#instagram-feed').pongstgrm({
		accessId : '295165979',
		accessToken : '295165979.167035a.f95a0b3a5f54421f9fb59572756b3059'
	});
}

function loadTwitter() {
	!function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/
				.test(d.location) ? 'http' : 'https';
		if (!d.getElementById(id)) {
			js = d.createElement(s);
			js.id = id;
			js.src = p + "://platform.twitter.com/widgets.js";
			fjs.parentNode.insertBefore(js, fjs);
		}
	}(document, "script", "twitter-wjs");
}

function justifyTestimonialLayout() {
	if ($(window).width() > 759) {
		$('#testimonial-modal').addClass('wrapper');
		$('#testimonial-modal').removeClass('container marketing');
	} else {
		$('#testimonial-modal').addClass('container marketing');
		$('#testimonial-modal').removeClass('wrapper');
	}
	$(window).on('resize', function() {
		if ($(window).width() > 759) {
			$('#testimonial-modal').addClass('wrapper');
			$('#testimonial-modal').removeClass('container marketing');
		} else {
			$('#testimonial-modal').addClass('container marketing');
			$('#testimonial-modal').removeClass('wrapper');
		}
	})
}

function setupOnFolioHover() {
	$('.hidden').css('display', 'none');

	$("#filter button").each(
			function() {
				$(this).on(
						"click",
						function() {
							var filter = $(this).attr('class');
							if ($(this).attr('class') == 'all') {
								$('.hidden').contents().appendTo('#posts')
										.hide().show('slow');
								$("#filter button").removeClass('active');
								$(this).addClass('active');
								$("#filter button").attr("disabled", false);
								$(this).attr("disabled", true);
							} else {
								$('.post').appendTo('.hidden');
								$('.hidden').contents().appendTo('#posts')
										.hide().show('slow');
								$('.post:not(.' + filter + ')').appendTo(
										'.hidden').hide('slow');
								$("#filter button").removeClass('active');
								$(this).addClass('active');
								$("#filter button").attr("disabled", false);
								$(this).attr("disabled", true);
							}
							;

						});
			});
	$("img").error(function () {
		  $(this).unbind("error").attr({"src": "", "style":"height:440px; color:black"});
	});
}

function setupOnPanelHover() {
	// set up hover panels
	// although this can be done without JavaScript, we've attached these events
	// because it causes the hover to be triggered when the element is tapped on
	// a touch device
	$('#filter').hover(function() {
		$(this).addClass('flip');
	}, function() {
		$(this).removeClass('flip');
	});
}

function animateHeader() {
	var animateOn = $(window).height() / 10;
	animateOn = 1;
		
	addAnimationToElement("body", "#nav-bar", animateOn, "nav-bar-animate");
	addAnimationToElement("body", "#nav-amp-content", animateOn, "nav-amp-content-animate");
	addAnimationToElement("body", "#header-logo", animateOn, "zoom-in-fin");
}

function addAnimationToElement(div, element, pos, fin) {
	var docElem = document.documentElement, header = $(div, docElem).find(
			element), didScroll = false, changeHeaderOn = pos;

	function init() {
		window.addEventListener('scroll', function(event) {
			if (!didScroll) {
				didScroll = true;
				setTimeout(scrollPage, 250);
			}
		}, false);
	}

	function scrollPage() {
		var sy = scrollY();
		if (sy >= changeHeaderOn) {
			header.addClass(fin);
		} else {
			header.removeClass(fin);
		}
		didScroll = false;
	}

	function scrollY() {
		return window.pageYOffset || docElem.scrollTop;
	}

	init();
}

function collapseMenuOnScroll() {
	var docElem = document.documentElement, 
		menu = $('body', docElem).find('#navbar-tabs'),
		didScroll = false;

	function init() {
		window.addEventListener('scroll', function(event) {
			if (!didScroll) {
				menu.collapse({
					toggle : false
				})
				didScroll = true;
				setTimeout(collapseMenu, 350);
			}
		}, false);
	}

	function collapseMenu() {
		menu.collapse('hide');
		didScroll = false;
	}

	init();
}