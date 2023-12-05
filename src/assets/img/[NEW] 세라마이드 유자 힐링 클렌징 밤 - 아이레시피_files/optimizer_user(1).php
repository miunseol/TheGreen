
$(document).ready(function(){

	/* 상품 추가이미지 */
	var bxKeyImg = jQuery11('#bxKeyImg').bxSlider({
		onSliderLoad: function(){},
		minSlides: 4,
		maxSlides: 4,
		moveSlides:1,
		slideWidth: 152,
		slideMargin: 15,
		auto: 0,
		autoHover:false,
		speed:500,
		pause : 2500,
		pager:true,
	});

	/* 다른 분들이 함께 구매한 상품
	var bxAdditional = jQuery11('#bxAdditional').bxSlider({
		onSliderLoad: function(){},
		minSlides: 4,
		maxSlides: 4,
		moveSlides:1,
		slideWidth: 295,
		slideMargin: 10,
		auto: true,
		autoHover:false,
		speed:500,
		pause : 2500,
		pager:true,
	});*/

	/* 함께 구매하면 좋아요 */
	var bxRelation = jQuery11('#bxRelation').bxSlider({
		onSliderLoad: function(){},
		minSlides: 4,
		maxSlides: 4,
		moveSlides:1,
		slideWidth: 295,
		slideMargin: 10,
		auto: 1,
		autoHover:false,
		speed:500,
		pause : 2500,
		pager:true,
	});

	/* SNS 공유 */
	$('#pageUrl').val(decodeURIComponent(location.href));

	$('.url_copy button').click(function(){
		copyToClipboard('#pageUrl');
		$('.sns_icon .url_copy_txt').fadeIn();
	});

	$('.social_lnk .close').click(function(){
		$('.social_lnk').fadeToggle(250);
		$('.sns_icon .url_copy_txt').fadeOut(250);
	});

	$('.xans-product-detail .wp-prod-info .bt .share').click(function(){
		$('.social_lnk').fadeToggle(250);
	});

	$('.sns_icon li').click(function(e){
        e.preventDefault();
		var name = $(this).data('sns');
		shareSNS(name);
	});


	var copyToClipboard = function(element) {
		var $temp = $("<textarea></textarea>");
		$("body").append($temp);
		$temp.val($(element).val()).select();
		document.execCommand("copy");
		$temp.remove();
	}

	Kakao.init('86b54a065203b1b0c4838a5648f3135c'); // sample key
	Kakao.isInitialized();

	var shareSNS = function(name){
		switch(name){
			case 'kakaotalk':
				 Kakao.Link.sendScrap({
				  requestUrl: location.href,
				});
				break;
			case 'kakaostory':
				window.open('https://story.kakao.com/s/share?url='+encodeURIComponent(location.href));
				break;
			case 'line':
				window.open("http://line.naver.jp/R/msg/text/?" + encodeURIComponent(product_name) + " " + encodeURIComponent(location.href));
				break;
			case 'band':
				window.open("https://band.us/plugin/share?body=" + encodeURIComponent(product_name) + "&route=" + encodeURIComponent(location.href));
				break;
			case 'naver':
				window.open("http://share.naver.com/web/shareView.nhn?url=" + encodeURIComponent(location.href) + "&title=" + encodeURIComponent(product_name));
				break;
			case 'facebook':
				window.open("http://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(location.href));
				break;
			case 'twitter':
				window.open("https://twitter.com/intent/tweet?text=" + encodeURIComponent(product_name) + "&url=" + encodeURIComponent(location.href));
				break;
			default:
				break;
		}
	};

    // 스크롤 업 / 다운
    var didScroll;
    var lastScrollTop = 0;
    var delta = 5;

    $(window).scroll(function(event){
        didScroll = true;
    });

    setInterval(function() {
        if (didScroll) {
            hasScrolled();
            didScroll = false;
        }
    }, 100);

    function hasScrolled() {
        var st = $(this).scrollTop();
        if(Math.abs(lastScrollTop - st) <= delta) return;

        if (st > lastScrollTop){
            $('html').removeClass('up').addClass('down');
        } else {
            $('html').removeClass('down').addClass('up');
        }

        lastScrollTop = st;
    }

	/* 구매영역 */
	$(window).scroll(function(){
		var scrollTop = $(this).scrollTop();
		var scrollBtm = scrollTop + $(window).height();

		var topFixedHeight = $('#prdDetail .menu-inner').height(); // header fixed height value

		// option move
		var posY = $('.xans-product-detail .infoArea').offset().top + $('.xans-product-detail .infoArea').height(); // 바로구매 버튼 bottom pos
        var returnPosY = $('.detailArea').offset().top +$('.detailArea').height(); // 상품구매영역 bottom pos

		if ($(this).scrollTop() > posY && $('html').hasClass('down')){
			if (!$('#optionBox').hasClass('active')){
				$('#optionBox').addClass('active');
                $('#optionBox').removeClass('normal');
				$('#prdDetail .wp-opt').append($('#optionBox'));
			}
		}

        if ($(this).scrollTop() < returnPosY  && $('html').hasClass('up')){
			if ($('#optionBox').hasClass('active')){
				$('#optionBox').removeClass('active');
                $('#optionBox').addClass('normal');
				$('#optionG').append($('#optionBox'));
			}
		}

		// option fixed
		if (scrollTop > $('#prdDetail > .cont').offset().top - topFixedHeight){
			$('#prdDetail').addClass('fixed');
		}else{
			$('#prdDetail').removeClass('fixed');
		}

		var areaBtmY = $('#prdDetail .wp-cont').offset().top + $('#prdDetail .wp-cont').height(); // content bottom posY
		var optHeight = $('#prdDetail .wp-opt .option_layer').height(); // height of option when fixed

		// option bottom fixed
		if (scrollTop + optHeight  > areaBtmY - topFixedHeight){
			$('#prdDetail .wp-opt').addClass('fixed');
		}else{
			$('#prdDetail .wp-opt').removeClass('fixed');
		}

		// tab menu fixed
		var menuPosY = $('#prdDetail .menu-inner').offset().top;
		if (scrollTop > menuPosY){
			$('#prdDetail .menu-inner').addClass('fixed');
		}else{
			$('#prdDetail .menu-inner').removeClass('fixed');
		}

		// tab menu selection according to scroll
		var fixedTabHeight = $('#prdDetail .menu-inner').height();
        var fixedScrollTop = scrollTop + fixedTabHeight; // 탭 고정 시 탭 기준으로 scrollTop 값 출력

        if ($('#prdDetail').offset().top < fixedScrollTop
            && $('#prdDetail').offset().top + $('#prdDetail').outerHeight() > fixedScrollTop){
            selectTab('#prdDetail');
        }else if ($('#prdReview').offset().top < fixedScrollTop
                  && $('#prdReview').offset().top + $('#prdReview').outerHeight() > fixedScrollTop){
            selectTab('#prdReview');
        }else if ($('#prdQnA').offset().top < fixedScrollTop
                  && $('#prdQnA').offset().top + $('#prdQnA').outerHeight() > fixedScrollTop){
            selectTab('#prdQnA');
        }else if ($('#prdInfo').offset().top < fixedScrollTop
                  && $('#prdInfo').offset().top + $('#prdInfo').outerHeight() > fixedScrollTop){
            selectTab('#prdInfo');
        }

	});

	var selectedTabId = ''; //현재 활성화 된 탭 id
	function selectTab(id){
		if (selectedTabId == id) return;
		$('#prdDetail .menu-inner .menu li').removeClass('selected');
		$('#prdDetail .menu-inner .menu li a').each(function(){
			if ($(this).attr('href') == id){
				$(this).closest('li').addClass('selected');
				selectedTabId = id;
				return false;
			}
		});
	}

	$('#prdDetail .menu-inner a').click(function(e){
		e.preventDefault();
		var tid = $(this).attr('href');
        $(window).scrollTop($(tid).offset().top);
        selectTab(tid);
	});
});
/**
 * 상품상세 섬네일 롤링
 */
$(document).ready(function(){
    $.fn.prdImg = function(parm){
        var index = 0;
        var target = parm.target;
        var view = parm.view;
        var listWrap = target.find('.xans-product-addimage');
        var limit = listWrap.find('> ul > li').length;
        var ul = target.find('.xans-product-addimage > ul');
        var liFirst = target.find('.xans-product-addimage > ul > li:first-child');
        var liWidth = parseInt(liFirst.width());
        var liHeight = parseInt(liFirst.height());
        var blockWidth = liWidth + parseInt(liFirst.css('marginRight')) + parseInt(liFirst.css('marginLeft'));
        var columWidth = blockWidth * view;
        var colum = Math.ceil(limit / view);

        var roll = {
            init : function(){
                function struct(){
                    var ulWidth = limit * parseInt(blockWidth);
                    listWrap.append('<button type="button" class="prev">이전</button>');
                    listWrap.append('<button type="button" class="next">다음</button>');
                    ul.css({'position':'absolute', 'left':0, 'top':0, 'width':ulWidth});
                    listWrap.find('> ul > li').each(function(){
                        $(this).css({'float':'left'});
                    });
                    listWrap.css({'position':'relative', 'height':liHeight});

                    var prev = listWrap.find('.prev');
                    var next = listWrap.find('.next');

                    prev.click(function(){
                        if(index > 0){
                            index --;
                        }
                        roll.slide(index);
                    });
                    next.click(function(){
                        if(index < (colum-1) ){
                            index ++;
                        }
                        roll.slide(index);
                    });
                    if(index == 0){
                        prev.hide();
                    } else {
                        prev.show();
                    }
                    if(index >= (colum-1)){
                        next.hide();
                    } else {
                        next.show();
                    }
                }
                if(limit > view){
                    struct();
                }
            },
            slide : function(index){
                var left = '-' + (index * columWidth) +'px';
                var prev = listWrap.find('.prev');
                var next = listWrap.find('.next');
                if(index == 0){
                    prev.hide();
                } else {
                    prev.show();
                }
                if(index >= (colum-1)){
                    next.hide();
                } else {
                    next.show();
                }
                ul.stop().animate({'left':left},500);
            }
        }
        roll.init();
    };

    // 함수호출 : 상품상세 페이지
    $.fn.prdImg({
        target : $('.xans-product-image'),
        view : 5
    });

    // 함수호출 : 상품확대보기팝업
    $.fn.prdImg({
        target : $('.xans-product-zoom'),
        view : 5
    });

});
/**
* 리뷰목록(core)
* 제작 : 웹퍼블릭(http://webpublic.co.kr)
* 버전 : 1.3
* 최종업데이트 : 2020.06.09
* 웹퍼블릭에서 개발된 플러그인으로 무단 복제/사용 하실 수 없습니다
* 주석제거 시 플러그인을 사용하실 수 없습니다.
*/

var _0x5f50=["\x77\x69\x64\x74\x68","\x68\x65\x69\x67\x68\x74","\x2E\x77\x70\x52\x65\x76\x69\x65\x77","\x6C\x69\x73\x74","\x23\x77\x70\x4D\x6F\x72\x65","\x73\x65\x74\x74\x69\x6E\x67\x73","\x65\x78\x74\x65\x6E\x64","\x72\x65\x61\x64\x4D\x6F\x72\x65\x49\x74\x65\x6D","\x74\x61\x72\x67\x65\x74","\x20\x2E\x77\x70\x52\x65\x76\x69\x65\x77\x20\x2E\x72\x65\x76\x69\x65\x77\x2D\x6C\x69\x73\x74\x20\x3E\x20\x6C\x69","\x72\x65\x6D\x6F\x76\x65","\x20\x2E\x77\x70\x52\x65\x76\x69\x65\x77\x20\x2E\x72\x65\x76\x69\x65\x77\x2D\x6C\x69\x73\x74\x20\x6C\x69\x2E\x64\x69\x73\x70\x6C\x61\x79\x6E\x6F\x6E\x65","\x75\x73\x65\x52\x65\x61\x64\x4D\x6F\x72\x65","\x72\x65\x61\x64\x4D\x6F\x72\x65\x42\x74\x6E","\x6C\x69\x73\x74\x54\x79\x70\x65","\x72\x65\x61\x64\x4D\x6F\x72\x65\x49\x6E\x69\x74\x4E\x75\x6D","\x72\x65\x61\x64\x4D\x6F\x72\x65\x4C\x6F\x61\x64\x4E\x75\x6D","\x72\x65\x61\x64\x4D\x6F\x72\x65\x55\x73\x65\x43\x61\x63\x68\x65","\x72\x65\x61\x64\x4D\x6F\x72\x65\x55\x73\x65\x41\x75\x74\x6F\x6C\x6F\x61\x64","\x73\x65\x74\x74\x69\x6E\x67\x73\x72\x65\x61\x64\x4D\x6F\x72\x65\x49\x6E\x69\x74\x4E\x75\x6D","\x64\x65\x74\x61\x69\x6C","\x73\x69\x7A\x65","\x63\x61\x63\x68\x65\x2D\x6E\x61\x6D\x65","\x64\x61\x74\x61","\x75\x6C","\x70\x61\x72\x65\x6E\x74","\x63\x61\x74\x65\x5F\x6E\x6F","\uC124\uC815\uC624\uB958\x3A\x20\uCE90\uC2DC\uB97C\x20\uC0AC\uC6A9\uD558\uAE30\x20\uC704\uD574\uC11C\uB294\x20\x63\x61\x63\x68\x65\x2D\x6E\x61\x6D\x65\uC744\x20\uC9C0\uC815\uD574\uC57C\x20\uD569\uB2C8\uB2E4","\x65\x72\x72\x6F\x72","\x7B\x63\x61\x74\x65\x5F\x6E\x6F\x7D","\x72\x65\x70\x6C\x61\x63\x65","\x5F\x63\x72\x6D\x5F","\x69\x73\x4E\x75\x6D\x65\x72\x69\x63","\x73\x68\x6F\x77","\x64\x69\x73\x70\x6C\x61\x79","\x69\x6E\x6C\x69\x6E\x65\x2D\x62\x6C\x6F\x63\x6B","\x63\x73\x73","\x71\x75\x65\x75\x65","\x73\x6C\x69\x63\x65","\x63\x6C\x69\x63\x6B","\x70\x72\x65\x76\x65\x6E\x74\x44\x65\x66\x61\x75\x6C\x74","\x6F\x6E","\x61\x6E\x69\x6D\x61\x74\x65","\x73\x74\x6F\x70","\x73\x72\x63","\x2E\x74\x68\x75\x6D\x62","\x66\x69\x6E\x64","\x61\x74\x74\x72","\x2E\x70\x72\x6F\x64\x2D\x74\x68\x75\x6D\x62","\x2D\x31\x30\x70\x78","\x3A\x68\x69\x64\x64\x65\x6E","\x3A\x76\x69\x73\x69\x62\x6C\x65","\x6C\x65\x6E\x67\x74\x68","\x73\x63\x72\x6F\x6C\x6C\x54\x6F\x70","\x74\x6F\x70","\x6F\x66\x66\x73\x65\x74","\x73\x63\x72\x6F\x6C\x6C","\x55\x52\x4C","\x64\x6F\x63\x75\x6D\x65\x6E\x74","\x3F","\x69\x6E\x64\x65\x78\x4F\x66","\x73\x70\x6C\x69\x74","\x26","\x3D","","\x4E\x6F\x20\x56\x61\x6C\x75\x65","\x67\x65\x74","\x2F\x62\x6F\x61\x72\x64\x2F\x72\x65\x76\x69\x65\x77\x2F\x76\x6F\x74\x65\x2E\x68\x74\x6D\x6C","\x6E\x6F\x3D","\x26\x62\x6F\x61\x72\x64\x5F\x6E\x6F\x3D\x34","\x74\x65\x78\x74","\x6D\x61\x74\x63\x68","\x23\x76\x6F\x74\x65\x55\x72\x6C","\x74\x72\x69\x6D","\x25\x45\x43\x25\x42\x36\x25\x39\x34\x25\x45\x43\x25\x42\x32\x25\x39\x43\x25\x45\x42\x25\x39\x30\x25\x39\x38\x25\x45\x43\x25\x39\x37\x25\x38\x38\x25\x45\x43\x25\x38\x41\x25\x42\x35\x25\x45\x42\x25\x38\x42\x25\x38\x38\x25\x45\x42\x25\x38\x42\x25\x41\x34","\x23\x77\x70\x2D\x76\x6F\x74\x65\x2D","\x61\x6A\x61\x78","\x30","\x2F\x62\x6F\x61\x72\x64\x2F\x72\x65\x76\x69\x65\x77\x2F\x72\x65\x61\x64\x2E\x68\x74\x6D\x6C\x3F\x62\x6F\x61\x72\x64\x5F\x6E\x6F\x3D\x34\x26\x6E\x6F\x3D","\x26\x6C\x6F\x61\x64\x5F\x73\x6C\x69\x64\x65\x5F\x6E\x6F\x3D","\x2F\x62\x6F\x61\x72\x64\x2F\x72\x65\x76\x69\x65\x77\x2F\x6D\x6F\x64\x69\x66\x79\x2E\x68\x74\x6D\x6C\x3F\x62\x6F\x61\x72\x64\x5F\x61\x63\x74\x3D\x65\x64\x69\x74\x26\x6E\x6F\x3D","\x20\x2E\x63\x6C\x6F\x6E\x65\x2D\x73\x6C\x69\x64\x65\x2D\x62\x67","\x6E\x6F","\x79\x65\x73","\x3C\x64\x69\x76\x20\x69\x64\x3D\x22\x72\x65\x61\x64\x52\x65\x76\x69\x65\x77\x46\x72\x61\x6D\x65\x57\x72\x61\x70\x22\x3E\x3C\x64\x69\x76\x20\x63\x6C\x61\x73\x73\x3D\x22\x72\x65\x61\x64\x20\x63\x6C\x6F\x73\x65\x20\x6F\x70\x65\x6E\x2D\x72\x65\x76\x69\x65\x77\x22\x3E\x3C\x2F\x64\x69\x76\x3E\x3C\x69\x66\x72\x61\x6D\x65\x20\x73\x72\x63\x3D\x22","\x22\x20\x73\x63\x72\x6F\x6C\x6C\x69\x6E\x67\x3D\x22","\x22\x20\x69\x64\x3D\x22\x72\x65\x61\x64\x52\x65\x76\x69\x65\x77\x46\x72\x61\x6D\x65\x22\x20\x6E\x61\x6D\x65\x3D\x22\x72\x65\x61\x64\x52\x65\x76\x69\x65\x77\x46\x72\x61\x6D\x65\x22\x3E\x3C\x2F\x69\x66\x72\x61\x6D\x65\x3E\x3C\x2F\x64\x69\x76\x3E","\x2E\x70\x6F\x70\x2D\x72\x65\x76\x69\x65\x77\x2D\x62\x67","\x62\x6C\x6F\x63\x6B","\x23\x72\x65\x61\x64\x52\x65\x76\x69\x65\x77\x46\x72\x61\x6D\x65\x57\x72\x61\x70","\x68\x69\x64\x65","\x64\x6F\x6E\x65","\x70\x72\x6F\x6D\x69\x73\x65","\x72\x65\x76\x69\x65\x77","\x72\x65\x6D\x6F\x76\x65\x43\x6C\x61\x73\x73","\x68\x74\x6D\x6C","\x5F\x63\x75\x72\x53\x63\x72\x50\x6F\x73\x59","\x62\x6F\x64\x79\x20\x3E\x20\x2E\x70\x6F\x70\x2D\x72\x65\x76\x69\x65\x77\x2D\x62\x67","\x3C\x64\x69\x76\x20\x63\x6C\x61\x73\x73\x3D\x22\x70\x6F\x70\x2D\x72\x65\x76\x69\x65\x77\x2D\x62\x67\x20\x6F\x70\x65\x6E\x2D\x72\x65\x76\x69\x65\x77\x22\x3E\x3C\x64\x69\x76\x20\x63\x6C\x61\x73\x73\x3D\x22\x72\x65\x76\x69\x65\x77\x2D\x6C\x6F\x61\x64\x69\x6E\x67\x22\x3E\x3C\x2F\x64\x69\x76\x3E\x3C\x2F\x64\x69\x76\x3E","\x61\x70\x70\x65\x6E\x64","\x62\x6F\x64\x79","\x2E\x70\x6F\x70\x2D\x72\x65\x76\x69\x65\x77\x2D\x62\x67\x20\x2E\x72\x65\x76\x69\x65\x77\x2D\x6C\x6F\x61\x64\x69\x6E\x67","\x3C\x64\x69\x76\x20\x63\x6C\x61\x73\x73\x3D\x22\x6D\x6F\x76\x65\x6D\x65\x6E\x74\x22\x3E\x3C\x2F\x64\x69\x76\x3E","\x3C\x61\x20\x63\x6C\x61\x73\x73\x3D\x22\x6C\x69\x6E\x6B\x2D\x70\x72\x65\x76\x22\x20\x68\x72\x65\x66\x3D\x22\x2F\x62\x6F\x61\x72\x64\x2F\x72\x65\x76\x69\x65\x77\x2F\x72\x65\x61\x64\x2E\x68\x74\x6D\x6C","\x22\x3E\uC774\uC804\uAE00\x3C\x2F\x61\x3E","\x3C\x61\x20\x63\x6C\x61\x73\x73\x3D\x22\x6C\x69\x6E\x6B\x2D\x6E\x65\x78\x74\x22\x20\x68\x72\x65\x66\x3D\x22\x2F\x62\x6F\x61\x72\x64\x2F\x72\x65\x76\x69\x65\x77\x2F\x72\x65\x61\x64\x2E\x68\x74\x6D\x6C","\x22\x3E\uB2E4\uC74C\uAE00\x3C\x2F\x61\x3E","\x2E\x6C\x69\x6E\x6B\x2D\x70\x72\x65\x76","\x73\x74\x6F\x70\x50\x72\x6F\x70\x61\x67\x61\x74\x69\x6F\x6E","\x68\x72\x65\x66","\x62\x6F\x61\x72\x64\x5F\x6E\x6F","\x2E\x6D\x6F\x76\x65\x6D\x65\x6E\x74","\x23\x72\x65\x61\x64\x52\x65\x76\x69\x65\x77\x46\x72\x61\x6D\x65\x2C\x20\x23\x72\x65\x61\x64\x52\x65\x76\x69\x65\x77\x46\x72\x61\x6D\x65\x57\x72\x61\x70\x20\x2E\x72\x65\x61\x64\x2E\x63\x6C\x6F\x73\x65","\x2E\x72\x65\x76\x69\x65\x77\x2D\x6C\x6F\x61\x64\x69\x6E\x67","\x2F\x62\x6F\x61\x72\x64\x2F\x72\x65\x76\x69\x65\x77\x2F\x72\x65\x61\x64\x2E\x68\x74\x6D\x6C\x3F\x62\x6F\x61\x72\x64\x5F\x6E\x6F\x3D","\x26\x6E\x6F\x3D","\x26\x6C\x6F\x61\x64\x5F\x73\x6C\x69\x64\x65\x5F\x6E\x6F\x3D\x30","\x23\x72\x65\x61\x64\x52\x65\x76\x69\x65\x77\x46\x72\x61\x6D\x65","\x2E\x6C\x69\x6E\x6B\x2D\x6E\x65\x78\x74","\x3C\x64\x69\x76\x20\x63\x6C\x61\x73\x73\x3D\x22\x66\x75\x6C\x6C\x2D\x69\x6D\x67\x20\x63\x6C\x6F\x73\x65\x22\x3E\x3C\x2F\x64\x69\x76\x3E","\x3C\x64\x69\x76\x20\x63\x6C\x61\x73\x73\x3D\x22\x63\x65\x6E\x74\x65\x72\x2D\x62\x6F\x78\x22\x3E\x3C\x2F\x64\x69\x76\x3E","\x3C\x64\x69\x76\x20\x63\x6C\x61\x73\x73\x3D\x22\x63\x6C\x6F\x6E\x65\x2D\x73\x6C\x69\x64\x65\x2D\x62\x67\x22\x3E\x3C\x2F\x64\x69\x76\x3E","\x20\x2E\x77\x70\x52\x65\x76\x69\x65\x77","\x66\x61\x64\x65\x49\x6E","\x66\x61\x64\x65","\x20\x2E\x63\x6C\x6F\x6E\x65\x2D\x73\x6C\x69\x64\x65\x2D\x62\x67\x20\x2E\x63\x6C\x6F\x6E\x65\x52\x65\x76\x69\x65\x77\x50\x68\x6F\x74\x6F\x73\x20\x6C\x69","\x64\x69\x73\x70\x6C\x61\x79\x6E\x6F\x6E\x65","\x61\x64\x64\x43\x6C\x61\x73\x73","\x20\x2E\x63\x6C\x6F\x6E\x65\x2D\x73\x6C\x69\x64\x65\x2D\x62\x67\x20\x2E\x62\x78\x2D\x68\x61\x73\x2D\x63\x6F\x6E\x74\x72\x6F\x6C\x73\x2D\x64\x69\x72\x65\x63\x74\x69\x6F\x6E","\x61\x70\x70\x65\x6E\x64\x54\x6F","\x20\x2E\x63\x6C\x6F\x6E\x65\x2D\x73\x6C\x69\x64\x65\x2D\x62\x67\x20\x2E\x62\x78\x2D\x63\x6F\x6E\x74\x72\x6F\x6C\x73\x2D\x64\x69\x72\x65\x63\x74\x69\x6F\x6E","\x20\x2E\x63\x6C\x6F\x6E\x65\x52\x65\x76\x69\x65\x77\x50\x68\x6F\x74\x6F\x73\x20\x69\x6D\x67\x2C\x20","\x20\x2E\x66\x75\x6C\x6C\x2D\x69\x6D\x67\x2E\x63\x6C\x6F\x73\x65","\x62\x78\x53\x6C\x69\x64\x65\x72","\x20\x2E\x63\x6C\x6F\x6E\x65\x52\x65\x76\x69\x65\x77\x50\x68\x6F\x74\x6F\x73","\x67\x65\x74\x43\x75\x72\x72\x65\x6E\x74\x49\x6E\x64\x65\x78","\x52\x65\x61\x64\x52\x65\x76\x69\x65\x77","\x63\x6F\x6E\x74\x65\x6E\x74\x57\x69\x6E\x64\x6F\x77","\x66\x72\x61\x6D\x65\x52\x65\x73\x69\x7A\x65","\x72\x65\x73\x69\x7A\x65","\x6E\x61\x74\x75\x72\x61\x6C\x57\x69\x64\x74\x68","\x70\x72\x6F\x70","\x20\x20\x2E\x63\x6C\x6F\x6E\x65\x52\x65\x76\x69\x65\x77\x50\x68\x6F\x74\x6F\x73\x20\x6C\x69\x3A\x65\x71\x28","\x29\x20\x69\x6D\x67","\x6E\x61\x74\x75\x72\x61\x6C\x48\x65\x69\x67\x68\x74","\x61\x75\x74\x6F","\x20\x2E\x63\x6C\x6F\x6E\x65\x2D\x73\x6C\x69\x64\x65\x2D\x62\x67\x20\x6C\x69","\x31\x30\x30\x25","\x20\x2E\x63\x6C\x6F\x6E\x65\x2D\x73\x6C\x69\x64\x65\x2D\x62\x67\x20\x6C\x69\x20\x69\x6D\x67","\x20\x2E\x63\x6C\x6F\x6E\x65\x2D\x73\x6C\x69\x64\x65\x2D\x62\x67\x20\x2E\x62\x78\x2D\x76\x69\x65\x77\x70\x6F\x72\x74","\x6C\x69\x73\x74\x54\x68\x75\x6D\x62\x48\x65\x69\x67\x68\x74","\x20\x2E\x77\x70\x52\x65\x76\x69\x65\x77\x20\x2E\x72\x65\x76\x69\x65\x77\x2D\x6C\x69\x73\x74\x20\x3E\x20\x6C\x69\x3A\x66\x69\x72\x73\x74\x2D\x63\x68\x69\x6C\x64\x20\x2E\x62\x6F\x78","\x69\x64\x78","\x2E","\x68\x6F\x73\x74","\x61\x74\x74\x61\x63\x68","\x64\x61\x74\x61\x2D\x73\x72\x63","\x75\x73\x65\x4C\x69\x73\x74\x54\x68\x75\x6D\x62\x43\x73\x73","\x68\x69\x64\x64\x65\x6E","\x2E\x62\x6F\x78\x20\x3E\x20\x2E\x69\x6D\x67","\x61\x62\x73\x6F\x6C\x75\x74\x65","\x35\x30\x25","\x6C\x6F\x61\x64","\x3C\x69\x6D\x67\x3E","\x75\x73\x65\x53\x6D\x61\x6C\x6C\x54\x68\x75\x6D\x62","\x2F\x65\x78\x65\x63\x2F\x66\x72\x6F\x6E\x74\x2F\x62\x6F\x61\x72\x64\x2F\x70\x72\x6F\x64\x75\x63\x74\x2F\x34","\x6A\x73\x6F\x6E","\x63\x6F\x6E\x74\x65\x6E\x74\x5F\x69\x6D\x61\x67\x65","\x72\x65\x61\x64","\x70\x61\x72\x73\x65\x48\x54\x4D\x4C","\x3C\x6C\x69\x3E\x3C\x69\x6D\x67\x20\x73\x72\x63\x3D\x22","\x22\x20\x2F\x3E\x3C\x2F\x6C\x69\x3E\x0A","\x65\x61\x63\x68","\x3C\x75\x6C\x20\x63\x6C\x61\x73\x73\x3D\x22\x74\x68\x75\x6D\x62\x2D\x6C\x69\x73\x74\x20\x74\x68\x75\x6D\x62\x2D\x6C\x69\x73\x74\x2D","\x22\x20\x64\x61\x74\x61\x2D\x69\x64\x78\x3D\x22","\x22\x3E\x3C\x2F\x75\x6C\x3E","\x2E\x69\x6D\x67","\x76\x69\x73\x69\x62\x69\x6C\x69\x74\x79","\x76\x69\x73\x69\x62\x6C\x65","\x2E\x77\x70\x52\x65\x76\x69\x65\x77\x20\x2E\x72\x65\x76\x69\x65\x77\x2D\x6C\x69\x73\x74\x2E\x67\x61\x6C\x6C\x20\x6C\x69\x2E\x69\x74\x65\x6D\x3A\x66\x69\x72\x73\x74\x2D\x63\x68\x69\x6C\x64","\x2F\x65\x78\x65\x63\x2F\x66\x72\x6F\x6E\x74\x2F\x62\x6F\x61\x72\x64\x2F\x70\x72\x6F\x64\x75\x63\x74\x2F\x34\x3F\x6E\x6F\x3D","\x70\x61\x72\x73\x65","\x77\x72\x69\x74\x65\x5F\x61\x75\x74\x68","\x2E\x62\x74\x6E\x4D\x6F\x64\x69\x66\x79","\x3C\x64\x64\x20\x63\x6C\x61\x73\x73\x3D\x22\x74\x68\x75\x6D\x62\x2D\x69\x6D\x67\x73\x22\x3E","\x3C\x2F\x64\x64\x3E","\x2E\x72\x65\x76\x69\x65\x77\x54\x68\x75\x6D\x62","\x62\x72","\x2E\x72\x65\x76\x69\x65\x77\x54\x68\x75\x6D\x62\x20\x2E\x74\x68\x75\x6D\x62\x2D\x69\x6D\x67\x73","\x3C\x73\x70\x61\x6E\x3E\x3C\x2F\x73\x70\x61\x6E\x3E","\x77\x72\x61\x70","\x2E\x72\x65\x76\x69\x65\x77\x54\x68\x75\x6D\x62\x20\x2E\x74\x68\x75\x6D\x62\x2D\x69\x6D\x67\x73\x20\x69\x6D\x67","\x20\x2E\x77\x70\x52\x65\x76\x69\x65\x77\x20\x2E\x72\x65\x76\x69\x65\x77\x2D\x6C\x69\x73\x74\x2E\x6C\x69\x73\x74\x20\x3E\x20\x6C\x69","\x2E\x72\x65\x76\x69\x65\x77\x2D\x6C\x69\x73\x74\x20\x2E\x63\x6F\x6D\x6D\x65\x6E\x74","\x09\x3C\x6C\x69\x3E\x3C\x69\x6D\x67\x20\x73\x72\x63\x3D\x22","\x69\x6D\x67","\x63\x68\x69\x6C\x64\x72\x65\x6E","\x73\x70\x61\x6E","\x3C\x75\x6C\x20\x63\x6C\x61\x73\x73\x3D\x22\x63\x6C\x6F\x6E\x65\x52\x65\x76\x69\x65\x77\x50\x68\x6F\x74\x6F\x73\x22\x3E\x3C\x2F\x75\x6C\x3E","\x2E\x6F\x70\x65\x6E\x2D\x72\x65\x76\x69\x65\x77","\x2E\x69\x74\x65\x6D","\x63\x6C\x6F\x73\x65\x73\x74","\x20\x2E\x77\x70\x52\x65\x76\x69\x65\x77\x20\x2E\x74\x68\x75\x6D\x62\x2D\x6C\x69\x73\x74\x20\x6C\x69","\x69\x6E\x64\x65\x78","\x2E\x64\x65\x73\x63\x2E\x73\x68\x6F\x72\x74","\x64\x64\x2E\x64\x65\x73\x63\x2E\x6F\x72\x69\x67\x69\x6E","\x64\x64\x2E\x64\x65\x73\x63\x2E\x73\x68\x6F\x72\x74","\x20\x2E\x77\x70\x52\x65\x76\x69\x65\x77\x2E\x78\x61\x6E\x73\x2D\x70\x72\x6F\x64\x75\x63\x74\x2D\x72\x65\x76\x69\x65\x77\x20\x2E\x62\x6F\x78\x2D\x6C\x65\x66\x74\x20\x2E\x6D\x6F\x72\x65","\x2E\x64\x65\x73\x63\x2E\x6F\x72\x69\x67\x69\x6E","\x20\x2E\x77\x70\x52\x65\x76\x69\x65\x77\x2E\x78\x61\x6E\x73\x2D\x70\x72\x6F\x64\x75\x63\x74\x2D\x72\x65\x76\x69\x65\x77\x20\x2E\x62\x6F\x78\x2D\x6C\x65\x66\x74\x20\x2E\x68\x69\x64\x65","\x20\x2E\x77\x70\x52\x65\x76\x69\x65\x77\x20\x2E\x74\x68\x75\x6D\x62\x2D\x69\x6D\x67\x73\x20\x73\x70\x61\x6E","\x6C\x69","\uB85C\uADF8\uC778\uC744\x20\uD558\uC154\uC57C\x20\uD6C4\uAE30\x20\uC791\uC131\uC774\x20\uAC00\uB2A5\uD569\uB2C8\uB2E4\x2E\x0A\uB85C\uADF8\uC778\x20\uD398\uC774\uC9C0\uB85C\x20\uC774\uB3D9\uD558\uC2DC\uACA0\uC2B5\uB2C8\uAE4C\x3F","\x2F\x6D\x65\x6D\x62\x65\x72\x2F\x6C\x6F\x67\x69\x6E\x2E\x68\x74\x6D\x6C\x3F\x72\x65\x74\x75\x72\x6E\x55\x72\x6C\x3D"];var ListReview=(function(){var _0x37ffx2=jQuery11;var _0x37ffx3=10;var _0x37ffx4=_0x37ffx2(window)[_0x5f50[0]]();var _0x37ffx5=_0x37ffx2(window)[_0x5f50[1]]();var _0x37ffx6={};var _0x37ffx7={target:_0x5f50[2],listType:_0x5f50[3],useSmallThumb:true,useListThumbCss:true,useReadMore:true,readMoreBtn:_0x5f50[4],readMoreInitNum:10,readMoreLoadNum:10,readMoreUseCache:false,readMoreUseAutoload:false,listThumbHeight:218};var _0x37ffx8=function(_0x37ffx9){_0x37ffx6[_0x5f50[5]]= jQuery[_0x5f50[6]]({},_0x37ffx7,_0x37ffx9);_0x37ffx6[_0x5f50[5]][_0x5f50[7]]= _0x37ffx6[_0x5f50[5]][_0x5f50[8]]+ _0x5f50[9];_0x37ffx2(_0x37ffx6[_0x5f50[5]][_0x5f50[8]]+ _0x5f50[11])[_0x5f50[10]]();if(!_0x37ffx6[_0x5f50[5]][_0x5f50[12]]){_0x37ffx2(_0x37ffx6[_0x5f50[5]][_0x5f50[13]])[_0x5f50[10]]()};_0x37ffx5a();if(_0x37ffx6[_0x5f50[5]][_0x5f50[14]]== _0x5f50[3]){_0x37ffx5e();if(_0x37ffx6[_0x5f50[5]][_0x5f50[12]]){_0x37ffxa(_0x37ffx6[_0x5f50[5]][_0x5f50[7]],_0x37ffx6[_0x5f50[5]][_0x5f50[13]],_0x37ffx6[_0x5f50[5]][_0x5f50[15]],_0x37ffx6[_0x5f50[5]][_0x5f50[16]],_0x37ffx6[_0x5f50[5]][_0x5f50[17]],_0x37ffx6[_0x5f50[5]][_0x5f50[18]])}else {_0x37ffx49(_0x37ffx6[_0x5f50[19]])}};if(_0x37ffx6[_0x5f50[5]][_0x5f50[14]]== _0x5f50[20]){_0x37ffx58();_0x37ffx5f()};_0x37ffx42()};var _0x37ffxa=function(_0x37ffxb,_0x37ffxc,_0x37ffxd,_0x37ffxe,_0x37ffxf,_0x37ffx10){var _0x37ffx11=_0x37ffx2(_0x37ffxb)[_0x5f50[21]]();var _0x37ffx12=_0x37ffxd;if(_0x37ffxf== true){var _0x37ffx13=_0x37ffx2(_0x37ffxb)[_0x5f50[25]](_0x5f50[24])[_0x5f50[23]](_0x5f50[22]);var _0x37ffx14=_0x37ffx1a(_0x5f50[26]);if(!_0x37ffx13){console[_0x5f50[28]](_0x5f50[27]);return};if(!_0x37ffx14){_0x37ffx14= _0x37ffxc};_0x37ffx13= _0x37ffx13[_0x5f50[30]](_0x5f50[29],_0x37ffx14);_0x37ffx12= readCookie(_0x5f50[31]+ _0x37ffx13);if(!jQuery11[_0x5f50[32]](_0x37ffx12)){_0x37ffx12= _0x37ffxd};if(_0x37ffxd< _0x37ffx12){_0x37ffxd= _0x37ffx12}};if(_0x37ffx11== _0x37ffx12|| _0x37ffx11<= _0x37ffxd|| _0x37ffx11== 0){_0x37ffx2(_0x37ffxc)[_0x5f50[10]]()}else {_0x37ffx2(_0x37ffxc)[_0x5f50[33]]()};_0x37ffx49(_0x37ffxd);_0x37ffx2(_0x37ffxb)[_0x5f50[38]](0,_0x37ffxd)[_0x5f50[37]](function(){})[_0x5f50[36]](_0x5f50[34],_0x5f50[35])[_0x5f50[33]]();_0x37ffx2(document)[_0x5f50[41]](_0x5f50[39],_0x37ffxc,function(_0x37ffx15){_0x37ffx15[_0x5f50[40]]();_0x37ffx16()});var _0x37ffx16=function(){_0x37ffx2(_0x37ffxb+ _0x5f50[50])[_0x5f50[38]](0,_0x37ffxe)[_0x5f50[36]]({'\x64\x69\x73\x70\x6C\x61\x79':_0x5f50[35],'\x6F\x70\x61\x63\x69\x74\x79':0,'\x74\x6F\x70':_0x5f50[49]})[_0x5f50[37]](function(){_0x37ffx2(this)[_0x5f50[46]](_0x5f50[45])[_0x5f50[47]](_0x5f50[44],_0x37ffx2(this)[_0x5f50[46]](_0x5f50[45])[_0x5f50[23]](_0x5f50[44]));_0x37ffx2(this)[_0x5f50[46]](_0x5f50[48])[_0x5f50[47]](_0x5f50[44],_0x37ffx2(this)[_0x5f50[46]](_0x5f50[48])[_0x5f50[23]](_0x5f50[44]));var _0x37ffx17=_0x37ffx2(this)})[_0x5f50[43]]()[_0x5f50[42]]({'\x6F\x70\x61\x63\x69\x74\x79':1,'\x74\x6F\x70':0},500);if(_0x37ffxf== true){createCookie(_0x5f50[31]+ _0x37ffx13,_0x37ffx2(_0x37ffxb+ _0x5f50[51])[_0x5f50[21]]())};if(_0x37ffx2(_0x37ffxb+ _0x5f50[50])[_0x5f50[52]]== 0){_0x37ffx2(_0x37ffxc)[_0x5f50[10]]()}};if(_0x37ffx10){_0x37ffx2(window)[_0x5f50[56]](function(){if(_0x37ffx2(_0x37ffxb+ _0x5f50[50])[_0x5f50[52]]== 0){return};var _0x37ffx18=_0x37ffx2(window)[_0x5f50[53]]()+ _0x37ffx2(window)[_0x5f50[1]]();_0x37ffx18= _0x37ffx18+ 300;var _0x37ffx19=_0x37ffx2(_0x37ffxb)[_0x5f50[25]](_0x5f50[24])[_0x5f50[55]]()[_0x5f50[54]]+ _0x37ffx2(_0x37ffxb)[_0x5f50[25]](_0x5f50[24])[_0x5f50[1]]();if(_0x37ffx19< _0x37ffx18){_0x37ffx16()}})}};var _0x37ffx1a=function(_0x37ffx1b,_0x37ffx1c){if(_0x37ffx1c){var _0x37ffx1d=_0x37ffx1c}else {var _0x37ffx1d=window[_0x5f50[58]][_0x5f50[57]].toString()};if(_0x37ffx1d[_0x5f50[60]](_0x5f50[59])> 0){var _0x37ffx1e=_0x37ffx1d[_0x5f50[61]](_0x5f50[59]);var _0x37ffx1f=_0x37ffx1e[1][_0x5f50[61]](_0x5f50[62]);var _0x37ffx20= new Array(_0x37ffx1f[_0x5f50[52]]);var _0x37ffx21= new Array(_0x37ffx1f[_0x5f50[52]]);var _0x37ffx22=0;for(_0x37ffx22= 0;_0x37ffx22< _0x37ffx1f[_0x5f50[52]];_0x37ffx22++){var _0x37ffx23=_0x37ffx1f[_0x37ffx22][_0x5f50[61]](_0x5f50[63]);_0x37ffx20[_0x37ffx22]= _0x37ffx23[0];if(_0x37ffx23[1]!= _0x5f50[64]){_0x37ffx21[_0x37ffx22]= unescape(_0x37ffx23[1])}else {_0x37ffx21[_0x37ffx22]= _0x5f50[65]}};for(_0x37ffx22= 0;_0x37ffx22< _0x37ffx1f[_0x5f50[52]];_0x37ffx22++){if(_0x37ffx20[_0x37ffx22]== _0x37ffx1b){return _0x37ffx21[_0x37ffx22]}};return null}};var _0x37ffx24=function(_0x37ffx25){var _0x37ffx26=null;_0x37ffx2[_0x5f50[76]]({type:_0x5f50[66],url:_0x5f50[67],data:_0x5f50[68]+ _0x37ffx25+ _0x5f50[69],dataType:_0x5f50[70],timeout:10000,cache:true,async:false,beforeSend:function(){},error:function(_0x37ffx27,_0x37ffx28,_0x37ffx29){return},success:function(_0x37ffx2a){vote_url= _0x37ffx2(_0x37ffx2a)[_0x5f50[46]](_0x5f50[72])[_0x5f50[70]]()[_0x5f50[71]](/\'.*\'/gi)[0][_0x5f50[30]](/\'/g,_0x5f50[64]);_0x37ffx2[_0x5f50[76]]({type:_0x5f50[66],url:vote_url,dataType:_0x5f50[70],timeout:10000,cache:true,async:false,beforeSend:function(){},error:function(_0x37ffx27,_0x37ffx28,_0x37ffx29){return},success:function(_0x37ffx2a){var _0x37ffx2b=_0x37ffx2(_0x37ffx2a)[_0x5f50[70]]()[_0x5f50[30]](/[^[가-힣\s]/gi,_0x5f50[64])[_0x5f50[73]]();if(encodeURIComponent(_0x37ffx2b)== _0x5f50[74]){var _0x37ffx2c=parseInt(_0x37ffx2(_0x5f50[75]+ _0x37ffx25)[_0x5f50[70]]())+ 1;_0x37ffx2(_0x5f50[75]+ _0x37ffx25)[_0x5f50[70]](_0x37ffx2c);_0x37ffx26= _0x37ffx2c}else {alert(_0x37ffx2b)}}})}});return _0x37ffx26};var _0x37ffx2d=function(_0x37ffx25,_0x37ffx2e){if(!_0x37ffx2e){_0x37ffx2e= _0x5f50[77]};var _0x37ffx2f=_0x5f50[78]+ _0x37ffx25+ _0x5f50[79]+ _0x37ffx2e;_0x37ffx32(_0x37ffx2f)};var _0x37ffx30=function(_0x37ffx31){var _0x37ffx2f=_0x5f50[80]+ _0x37ffx31+ _0x5f50[69];_0x37ffx32(_0x37ffx2f)};var _0x37ffx32=function(_0x37ffx2f){_0x37ffx2(_0x37ffx6[_0x5f50[5]][_0x5f50[8]]+ _0x5f50[81])[_0x5f50[10]]();var _0x37ffx33=_0x5f50[82];if(mobileWeb){_0x37ffx33= _0x5f50[83]};var _0x37ffx34=_0x5f50[84]+ _0x37ffx2f+ _0x5f50[85]+ _0x37ffx33+ _0x5f50[86];if(_0x37ffx2(_0x5f50[87])[_0x5f50[36]](_0x5f50[34])== _0x5f50[88]){if(_0x37ffx2(_0x5f50[89])[_0x5f50[52]]> 0){_0x37ffx2(_0x5f50[89])[_0x5f50[10]]()};_0x37ffx2(_0x5f50[87])[_0x5f50[90]]();if(mobileWeb){_0x37ffx2(_0x5f50[95])[_0x5f50[94]](_0x5f50[93])[_0x5f50[92]]()[_0x5f50[91]](function(){_0x37ffx2(document)[_0x5f50[53]](_0x37ffx6[_0x5f50[5]]._curScrPosY)})}}else {if(mobileWeb){_0x37ffx6[_0x5f50[5]][_0x5f50[96]]= _0x37ffx2(document)[_0x5f50[53]]()};if(_0x37ffx2(_0x5f50[97])[_0x5f50[52]]== 0){_0x37ffx2(_0x5f50[100])[_0x5f50[99]](_0x5f50[98])};_0x37ffx2(_0x5f50[101])[_0x5f50[33]]();jQuery11(_0x5f50[87])[_0x5f50[33]]()[_0x5f50[92]]()[_0x5f50[91]](function(){_0x37ffx2(_0x5f50[87])[_0x5f50[99]](_0x37ffx34)})}};var _0x37ffx35=function(_0x37ffx36,_0x37ffx37){var _0x37ffx38=_0x37ffx2(_0x5f50[102]);if(_0x37ffx36){_0x37ffx2(_0x37ffx38)[_0x5f50[99]](_0x5f50[103]+ _0x37ffx36+ _0x5f50[104])};if(_0x37ffx37){_0x37ffx2(_0x37ffx38)[_0x5f50[99]](_0x5f50[105]+ _0x37ffx37+ _0x5f50[106])};_0x37ffx2(_0x5f50[89])[_0x5f50[99]](_0x37ffx38);_0x37ffx2(document)[_0x5f50[41]](_0x5f50[39],_0x5f50[107],function(_0x37ffx15){_0x37ffx15[_0x5f50[108]]();_0x37ffx15[_0x5f50[40]]();var _0x37ffx25=_0x37ffx1a(_0x5f50[82],_0x37ffx2(this)[_0x5f50[47]](_0x5f50[109]));var _0x37ffx39=_0x37ffx1a(_0x5f50[110],_0x37ffx2(this)[_0x5f50[47]](_0x5f50[109]));_0x37ffx2(_0x5f50[111])[_0x5f50[10]]();_0x37ffx2(_0x5f50[112])[_0x5f50[90]]();_0x37ffx2(_0x5f50[113])[_0x5f50[33]]();_0x37ffx2(_0x5f50[117])[_0x5f50[47]](_0x5f50[44],_0x5f50[114]+ _0x37ffx39+ _0x5f50[115]+ _0x37ffx25+ _0x5f50[116])});_0x37ffx2(document)[_0x5f50[41]](_0x5f50[39],_0x5f50[118],function(_0x37ffx15){_0x37ffx15[_0x5f50[108]]();_0x37ffx15[_0x5f50[40]]();var _0x37ffx25=_0x37ffx1a(_0x5f50[82],_0x37ffx2(this)[_0x5f50[47]](_0x5f50[109]));var _0x37ffx39=_0x37ffx1a(_0x5f50[110],_0x37ffx2(this)[_0x5f50[47]](_0x5f50[109]));_0x37ffx2(_0x5f50[111])[_0x5f50[10]]();_0x37ffx2(_0x5f50[112])[_0x5f50[90]]();_0x37ffx2(_0x5f50[113])[_0x5f50[33]]();_0x37ffx2(_0x5f50[117])[_0x5f50[47]](_0x5f50[44],_0x5f50[114]+ _0x37ffx39+ _0x5f50[115]+ _0x37ffx25+ _0x5f50[116])})};var _0x37ffx3a=function(_0x37ffx3b,_0x37ffx3c){var _0x37ffx3d=_0x37ffx2(_0x5f50[120])[_0x5f50[99]](_0x37ffx3b)[_0x5f50[99]](_0x5f50[119]);_0x37ffx2(_0x37ffx6[_0x5f50[5]][_0x5f50[8]]+ _0x5f50[122])[_0x5f50[25]]()[_0x5f50[99]](_0x37ffx2(_0x5f50[121])[_0x5f50[99]](_0x37ffx3d));_0x37ffx2(_0x37ffx6[_0x5f50[5]][_0x5f50[8]]+ _0x5f50[81])[_0x5f50[123]]();var _0x37ffx3e=_0x37ffx2(_0x37ffx6[_0x5f50[5]][_0x5f50[8]]+ _0x5f50[134])[_0x5f50[133]]({mode:_0x5f50[124],auto:false,autoHover:false,speed:0,pause:2500,adaptiveHeight:false,adaptiveHeightSpeed:0,pager:true,startSlide:_0x37ffx3c,onSliderLoad:function(){if(_0x37ffx2(_0x37ffx6[_0x5f50[5]][_0x5f50[8]]+ _0x5f50[125])[_0x5f50[52]]<= 1){_0x37ffx2(_0x37ffx6[_0x5f50[5]][_0x5f50[8]]+ _0x5f50[128])[_0x5f50[127]](_0x5f50[126])};_0x37ffx2(_0x37ffx6[_0x5f50[5]][_0x5f50[8]]+ _0x5f50[130])[_0x5f50[129]](_0x37ffx2(_0x37ffx6[_0x5f50[5]][_0x5f50[8]]+ _0x5f50[81]));_0x37ffx2(_0x37ffx6[_0x5f50[5]][_0x5f50[8]]+ _0x5f50[131]+ _0x37ffx6[_0x5f50[5]][_0x5f50[8]]+ _0x5f50[132])[_0x5f50[39]](function(){_0x37ffx2(_0x37ffx6[_0x5f50[5]][_0x5f50[8]]+ _0x5f50[81])[_0x5f50[10]]()});_0x37ffx43(_0x37ffx3c)},onSlideBefore:function(_0x37ffx3f,_0x37ffx40,_0x37ffx41){setTimeout(function(){_0x37ffx43(_0x37ffx41)},0)}})};var _0x37ffx42=function(){_0x37ffx2(window)[_0x5f50[139]](function(){if(_0x37ffx2(_0x5f50[117])[_0x5f50[52]]> 0){var _0x37ffx31=_0x37ffx2(_0x5f50[117])[_0x5f50[66]](0)[_0x5f50[137]][_0x5f50[136]][_0x5f50[135]]();_0x37ffx2(_0x5f50[117])[_0x5f50[66]](0)[_0x5f50[137]][_0x5f50[136]][_0x5f50[138]](_0x37ffx31)}})};var _0x37ffx43=function(_0x37ffx3c){var _0x37ffx44=_0x37ffx2(_0x37ffx6[_0x5f50[5]][_0x5f50[8]]+ _0x5f50[142]+ _0x37ffx3c+ _0x5f50[143])[_0x5f50[141]](_0x5f50[140]);var _0x37ffx45=_0x37ffx2(_0x37ffx6[_0x5f50[5]][_0x5f50[8]]+ _0x5f50[142]+ _0x37ffx3c+ _0x5f50[143])[_0x5f50[141]](_0x5f50[144]);var _0x37ffx46=_0x37ffx4* (1- _0x37ffx3/ 100);var _0x37ffx47=_0x37ffx5* (1- _0x37ffx3/ 100);if(_0x37ffx44>= _0x37ffx46|| _0x37ffx45>= _0x37ffx47){var _0x37ffx48=0;if(_0x37ffx44<= _0x37ffx45){var _0x37ffx48=_0x37ffx47/ _0x37ffx45* 100;_0x37ffx44= _0x37ffx44* _0x37ffx48/ 100;_0x37ffx45= _0x37ffx47}else {var _0x37ffx48=_0x37ffx46/ _0x37ffx44* 100;_0x37ffx45= _0x37ffx45* _0x37ffx48/ 100}};if(_0x37ffx46< _0x37ffx44){_0x37ffx44= _0x37ffx46};if(_0x37ffx47< _0x37ffx45){_0x37ffx45= _0x37ffx47};_0x37ffx2(_0x37ffx6[_0x5f50[5]][_0x5f50[8]]+ _0x5f50[146])[_0x5f50[36]](_0x5f50[0],_0x5f50[145]);_0x37ffx2(_0x37ffx6[_0x5f50[5]][_0x5f50[8]]+ _0x5f50[148])[_0x5f50[36]](_0x5f50[0],_0x5f50[147]);_0x37ffx2(_0x37ffx6[_0x5f50[5]][_0x5f50[8]]+ _0x5f50[149])[_0x5f50[36]]({width:_0x37ffx44,height:_0x37ffx45})};var _0x37ffx49=function(_0x37ffx4a){var _0x37ffx4b=_0x37ffx6[_0x5f50[5]][_0x5f50[150]];var _0x37ffx4c=_0x37ffx2(_0x37ffx6[_0x5f50[5]][_0x5f50[8]]+ _0x5f50[151])[_0x5f50[0]]();_0x37ffx2(_0x37ffx6[_0x5f50[5]][_0x5f50[8]]+ _0x5f50[9])[_0x5f50[172]](function(_0x37ffx4d){var _0x37ffx4e=this;var _0x37ffx31=_0x37ffx2(this)[_0x5f50[23]](_0x5f50[152]);var _0x37ffx4f=_0x37ffx2(this)[_0x5f50[46]](_0x5f50[45]);var _0x37ffx50=null;if(_0x37ffx4f[_0x5f50[23]](_0x5f50[155])[_0x5f50[30]](location[_0x5f50[154]],_0x5f50[64])[_0x5f50[60]](_0x5f50[153])>  -1){_0x37ffx50= _0x37ffx4f[_0x5f50[23]](_0x5f50[155])}else {_0x37ffx50= _0x37ffx4f[_0x5f50[23]](_0x5f50[44])};if(_0x37ffx6[_0x5f50[5]][_0x5f50[12]]){if(_0x37ffx4a> _0x37ffx4d){_0x37ffx4f[_0x5f50[47]](_0x5f50[44],_0x37ffx50);_0x37ffx2(this)[_0x5f50[46]](_0x5f50[48])[_0x5f50[47]](_0x5f50[44],_0x37ffx2(this)[_0x5f50[46]](_0x5f50[48])[_0x5f50[23]](_0x5f50[44]))}else {_0x37ffx4f[_0x5f50[47]](_0x5f50[156],_0x37ffx50)}}else {_0x37ffx4f[_0x5f50[47]](_0x5f50[44],_0x37ffx50);_0x37ffx2(this)[_0x5f50[46]](_0x5f50[48])[_0x5f50[47]](_0x5f50[44],_0x37ffx2(this)[_0x5f50[46]](_0x5f50[48])[_0x5f50[23]](_0x5f50[44]));_0x37ffx2(this)[_0x5f50[36]]({display:_0x5f50[35]})};if(_0x37ffx6[_0x5f50[5]][_0x5f50[157]]){_0x37ffx2(this)[_0x5f50[46]](_0x5f50[159])[_0x5f50[36]]({height:_0x37ffx4b,overflow:_0x5f50[158]});_0x37ffx2(_0x5f50[163])[_0x5f50[47]](_0x5f50[44],_0x37ffx50)[_0x5f50[162]](function(){var _0x37ffx44=this[_0x5f50[0]];var _0x37ffx45=this[_0x5f50[1]];if(_0x37ffx44> _0x37ffx45){var _0x37ffx51=_0x37ffx44* (_0x37ffx4b/ _0x37ffx45* 100)/ 100;var _0x37ffx52=_0x37ffx4b}else {if(_0x37ffx44< _0x37ffx45){var _0x37ffx51=_0x37ffx4c;var _0x37ffx52=_0x37ffx45* (_0x37ffx4c/ _0x37ffx44* 100)/ 100}else {if(_0x37ffx44== _0x37ffx45){if(_0x37ffx44> _0x37ffx4c){var _0x37ffx51=_0x37ffx44* (_0x37ffx4b/ _0x37ffx45* 100)/ 100;var _0x37ffx52=_0x37ffx4b}else {var _0x37ffx51=_0x37ffx44;var _0x37ffx52=_0x37ffx45}}}};_0x37ffx4f[_0x5f50[36]]({'\x77\x69\x64\x74\x68':_0x37ffx51,'\x68\x65\x69\x67\x68\x74':_0x37ffx52,'\x70\x6F\x73\x69\x74\x69\x6F\x6E':_0x5f50[160],'\x74\x6F\x70':_0x5f50[161],'\x6C\x65\x66\x74':_0x5f50[161],'\x6D\x61\x72\x67\x69\x6E\x2D\x74\x6F\x70':-(_0x37ffx52/ 2),'\x6D\x61\x72\x67\x69\x6E\x2D\x6C\x65\x66\x74':-(_0x37ffx51/ 2)})})};if(_0x37ffx6[_0x5f50[5]][_0x5f50[164]]){_0x37ffx2[_0x5f50[76]]({type:_0x5f50[66],url:_0x5f50[165],data:_0x5f50[68]+ _0x37ffx31+ _0x5f50[69],dataType:_0x5f50[166],timeout:10000,cache:true,async:true,beforeSend:function(){},error:function(_0x37ffx27,_0x37ffx28,_0x37ffx29){return},success:function(_0x37ffx53){if(_0x37ffx53[_0x5f50[168]][_0x5f50[167]]){var _0x37ffx54=_0x5f50[64];var _0x37ffx55=_0x37ffx2[_0x5f50[169]](_0x37ffx53[_0x5f50[168]][_0x5f50[167]]);_0x37ffx2[_0x5f50[172]](_0x37ffx55,function(_0x37ffx22,_0x37ffx56){if(_0x37ffx2(_0x37ffx56)[_0x5f50[47]](_0x5f50[44])){_0x37ffx54+= _0x5f50[170]+ _0x37ffx2(_0x37ffx56)[_0x5f50[47]](_0x5f50[44])+ _0x5f50[171]}});var _0x37ffx57=_0x37ffx2(_0x5f50[173]+ _0x37ffx31+ _0x5f50[174]+ _0x37ffx31+ _0x5f50[175])[_0x5f50[99]](_0x37ffx54);_0x37ffx2(_0x37ffx4e)[_0x5f50[46]](_0x5f50[176])[_0x5f50[99]](_0x37ffx57)}}})}});_0x37ffx2(_0x5f50[179])[_0x5f50[36]](_0x5f50[177],_0x5f50[178])};var _0x37ffx58=function(){_0x37ffx2(_0x37ffx6[_0x5f50[5]][_0x5f50[8]]+ _0x5f50[192])[_0x5f50[172]](function(){var _0x37ffx4e=this;var _0x37ffx31=_0x37ffx2(this)[_0x5f50[23]](_0x5f50[152]);_0x37ffx2[_0x5f50[66]](_0x5f50[180]+ _0x37ffx31+ _0x5f50[69],function(_0x37ffx53){var _0x37ffx59=JSON[_0x5f50[181]](_0x37ffx53);if(_0x37ffx59[_0x5f50[182]]=== true){_0x37ffx2(_0x37ffx4e)[_0x5f50[46]](_0x5f50[183])[_0x5f50[33]]()};if(_0x37ffx59[_0x5f50[168]][_0x5f50[167]]){_0x37ffx2(_0x37ffx4e)[_0x5f50[46]](_0x5f50[186])[_0x5f50[99]](_0x5f50[184]+ _0x37ffx59[_0x5f50[168]][_0x5f50[167]]+ _0x5f50[185]);_0x37ffx2(_0x37ffx4e)[_0x5f50[46]](_0x5f50[188])[_0x5f50[46]](_0x5f50[187])[_0x5f50[10]]();_0x37ffx2(_0x37ffx4e)[_0x5f50[46]](_0x5f50[191])[_0x5f50[190]](_0x5f50[189])}})})};var _0x37ffx5a=function(){_0x37ffx2(_0x5f50[193])[_0x5f50[172]](function(){var _0x37ffx5b=_0x37ffx2(this)[_0x5f50[70]]()[_0x5f50[30]](/[^0-9]/g,_0x5f50[64]);if(_0x37ffx5b){_0x37ffx2(this)[_0x5f50[70]](_0x37ffx5b)[_0x5f50[33]]()}else {_0x37ffx2(this)[_0x5f50[10]]()}})};var _0x37ffx5c=function(_0x37ffx3f,_0x37ffx3c){var _0x37ffx38=_0x5f50[64];_0x37ffx2(_0x37ffx3f)[_0x5f50[196]](_0x5f50[197])[_0x5f50[172]](function(){_0x37ffx38+= _0x5f50[194]+ _0x37ffx2(this)[_0x5f50[196]](_0x5f50[195])[_0x5f50[141]](_0x5f50[44])+ _0x5f50[171]});var _0x37ffx5d=_0x37ffx2(_0x5f50[198])[_0x5f50[99]](_0x37ffx38);_0x37ffx3a(_0x37ffx5d,_0x37ffx3c)};var _0x37ffx5e=function(){_0x37ffx2(document)[_0x5f50[41]](_0x5f50[39],_0x5f50[199],function(_0x37ffx15){_0x37ffx15[_0x5f50[40]]();_0x37ffx15[_0x5f50[108]]();var _0x37ffx31=_0x37ffx2(this)[_0x5f50[201]](_0x5f50[200])[_0x5f50[23]](_0x5f50[152]);_0x37ffx2d(_0x37ffx31)});_0x37ffx2(document)[_0x5f50[41]](_0x5f50[39],_0x37ffx6[_0x5f50[5]][_0x5f50[8]]+ _0x5f50[202],function(){var _0x37ffx31=_0x37ffx2(this)[_0x5f50[201]](_0x5f50[24])[_0x5f50[23]](_0x5f50[152]);_0x37ffx2d(_0x37ffx31,_0x37ffx2(this)[_0x5f50[203]]())})};var _0x37ffx5f=function(){_0x37ffx2(document)[_0x5f50[41]](_0x5f50[39],_0x5f50[199],function(_0x37ffx15){_0x37ffx15[_0x5f50[40]]();_0x37ffx15[_0x5f50[108]]();var _0x37ffx31=_0x37ffx2(this)[_0x5f50[201]](_0x5f50[200])[_0x5f50[23]](_0x5f50[152]);_0x37ffx2d(_0x37ffx31)});_0x37ffx2(_0x37ffx6[_0x5f50[5]][_0x5f50[8]]+ _0x5f50[207])[_0x5f50[39]](function(){if(_0x37ffx2(this)[_0x5f50[201]](_0x5f50[204])[_0x5f50[36]](_0x5f50[34])== _0x5f50[88]){_0x37ffx2(this)[_0x5f50[25]]()[_0x5f50[25]]()[_0x5f50[46]](_0x5f50[205])[_0x5f50[33]]();_0x37ffx2(this)[_0x5f50[201]](_0x5f50[206])[_0x5f50[90]]()}});_0x37ffx2(_0x37ffx6[_0x5f50[5]][_0x5f50[8]]+ _0x5f50[209])[_0x5f50[39]](function(){if(_0x37ffx2(this)[_0x5f50[201]](_0x5f50[208])[_0x5f50[36]](_0x5f50[34])== _0x5f50[88]){_0x37ffx2(this)[_0x5f50[25]]()[_0x5f50[25]]()[_0x5f50[46]](_0x5f50[206])[_0x5f50[33]]();_0x37ffx2(this)[_0x5f50[201]](_0x5f50[205])[_0x5f50[90]]()}});_0x37ffx2(document)[_0x5f50[41]](_0x5f50[39],_0x37ffx6[_0x5f50[5]][_0x5f50[8]]+ _0x5f50[210],function(){var _0x37ffx31=_0x37ffx2(this)[_0x5f50[201]](_0x5f50[211])[_0x5f50[23]](_0x5f50[152]);_0x37ffx2d(_0x37ffx31,_0x37ffx2(this)[_0x5f50[203]]())})};return {init:function(_0x37ffx9){_0x37ffx8(_0x37ffx9)},voteUp:function(_0x37ffx25){return _0x37ffx24(_0x37ffx25)},readReview:function(_0x37ffx31){_0x37ffx2d(_0x37ffx31)},getParam:function(_0x37ffx60,_0x37ffx1c){return _0x37ffx1a(_0x37ffx60,_0x37ffx1c)},imageSlide:function(_0x37ffx3b,_0x37ffx3c){_0x37ffx3a(_0x37ffx3b,_0x37ffx3c)},modify:function(_0x37ffx15){var _0x37ffx31=_0x37ffx2(_0x37ffx15)[_0x5f50[201]](_0x5f50[211])[_0x5f50[23]](_0x5f50[152]);_0x37ffx30(_0x37ffx31)},login:function(){if(confirm(_0x5f50[212])){location[_0x5f50[109]]= _0x5f50[213]+ encodeURIComponent(location[_0x5f50[109]])}},arrowPrevNext:function(_0x37ffx36,_0x37ffx37){_0x37ffx35(_0x37ffx36,_0x37ffx37)}}})()

/**
* 리뷰상세(detail.js)
* 제작 : 웹퍼블릭(http://webpublic.co.kr)
* 버전 : 1.1
* 최종업데이트 : 2019.09.02
* 웹퍼블릭에서 개발된 플러그인으로 무단 복제/사용 하실 수 없습니다
* 주석제거 시 플러그인을 사용하실 수 없습니다.
*/
$(function(){
	var $ = jQuery11;
	ListReview.init({target:'#use_review',listType:'list',listThumbHeight : 280, useListThumbCss:false, useReadMore:false, readMoreInitNum:100});
	var _0x3e8a=["\x3F\x70\x72\x6F\x64\x75\x63\x74\x5F\x6E\x6F\x3D","\x2F\x62\x6F\x61\x72\x64\x2F\x72\x65\x76\x69\x65\x77\x2F\x77\x72\x69\x74\x65\x2E\x68\x74\x6D\x6C\x3F\x70\x72\x6F\x64\x75\x63\x74\x5F\x6E\x6F\x3D","\x21\x44\x4F\x43\x54\x59\x50\x45","\x69\x6E\x64\x65\x78\x4F\x66","\x69\x73\x6C\x6F\x67\x69\x6E","\x64\x61\x74\x61","\x23\x66\x72\x6D\x52\x65\x76\x69\x65\x77\x57\x72\x69\x74\x65","\x54","\x73\x72\x63","\x2F\x62\x6F\x61\x72\x64\x2F\x72\x65\x76\x69\x65\x77\x2F\x77\x72\x69\x74\x65\x2E\x68\x74\x6D\x6C","\x70\x72\x6F\x70","\x2F\x62\x6F\x61\x72\x64\x2F\x72\x65\x76\x69\x65\x77\x2F\x67\x75\x65\x73\x74\x5F\x77\x72\x69\x74\x65\x2E\x68\x74\x6D\x6C","\x72\x65\x6D\x6F\x76\x65","\x64\x69\x73\x70\x6C\x61\x79\x6E\x6F\x6E\x65","\x72\x65\x6D\x6F\x76\x65\x43\x6C\x61\x73\x73","\x2E\x6E\x6F\x2D\x70\x65\x72\x6D\x69\x73\x73\x69\x6F\x6E","\x67\x65\x74"];var prod_no=iProductNo;var writeURL=_0x3e8a[0]+ prod_no;$[_0x3e8a[16]](_0x3e8a[1]+ prod_no,function(_0x2e47x3){if(_0x2e47x3[_0x3e8a[3]](_0x3e8a[2])> 0){if($(_0x3e8a[6])[_0x3e8a[5]](_0x3e8a[4])== _0x3e8a[7]){$(_0x3e8a[6])[_0x3e8a[10]](_0x3e8a[8],_0x3e8a[9]+ writeURL)}else {$(_0x3e8a[6])[_0x3e8a[10]](_0x3e8a[8],_0x3e8a[11]+ writeURL)};iFrameResize({log:false},_0x3e8a[6])}else {$(_0x3e8a[6])[_0x3e8a[12]]();$(_0x3e8a[15])[_0x3e8a[14]](_0x3e8a[13])}})
});

/*! iFrame Resizer (iframeSizer.min.js ) - v3.5.14 - 2017-03-30
 *  Desc: Force cross domain iframes to size to content.
 *  Requires: iframeResizer.contentWindow.min.js to be loaded into the target frame.
 *  Copyright: (c) 2017 David J. Bradshaw - dave@bradshaw.net
 *  License: MIT
 */

!function(a){"use strict";function b(a,b,c){"addEventListener"in window?a.addEventListener(b,c,!1):"attachEvent"in window&&a.attachEvent("on"+b,c)}function c(a,b,c){"removeEventListener"in window?a.removeEventListener(b,c,!1):"detachEvent"in window&&a.detachEvent("on"+b,c)}function d(){var a,b=["moz","webkit","o","ms"];for(a=0;a<b.length&&!N;a+=1)N=window[b[a]+"RequestAnimationFrame"];N||h("setup","RequestAnimationFrame not supported")}function e(a){var b="Host page: "+a;return window.top!==window.self&&(b=window.parentIFrame&&window.parentIFrame.getId?window.parentIFrame.getId()+": "+a:"Nested host page: "+a),b}function f(a){return K+"["+e(a)+"]"}function g(a){return P[a]?P[a].log:G}function h(a,b){k("log",a,b,g(a))}function i(a,b){k("info",a,b,g(a))}function j(a,b){k("warn",a,b,!0)}function k(a,b,c,d){!0===d&&"object"==typeof window.console&&console[a](f(b),c)}function l(a){function d(){function a(){s(U),p(V),I("resizedCallback",U)}f("Height"),f("Width"),t(a,U,"init")}function e(){var a=T.substr(L).split(":");return{iframe:P[a[0]].iframe,id:a[0],height:a[1],width:a[2],type:a[3]}}function f(a){var b=Number(P[V]["max"+a]),c=Number(P[V]["min"+a]),d=a.toLowerCase(),e=Number(U[d]);h(V,"Checking "+d+" is in range "+c+"-"+b),c>e&&(e=c,h(V,"Set "+d+" to min value")),e>b&&(e=b,h(V,"Set "+d+" to max value")),U[d]=""+e}function g(){function b(){function a(){var a=0,b=!1;for(h(V,"Checking connection is from allowed list of origins: "+d);a<d.length;a++)if(d[a]===c){b=!0;break}return b}function b(){var a=P[V].remoteHost;return h(V,"Checking connection is from: "+a),c===a}return d.constructor===Array?a():b()}var c=a.origin,d=P[V].checkOrigin;if(d&&""+c!="null"&&!b())throw new Error("Unexpected message received from: "+c+" for "+U.iframe.id+". Message was: "+a.data+". This error can be disabled by setting the checkOrigin: false option or by providing of array of trusted domains.");return!0}function k(){return K===(""+T).substr(0,L)&&T.substr(L).split(":")[0]in P}function l(){var a=U.type in{"true":1,"false":1,undefined:1};return a&&h(V,"Ignoring init message from meta parent page"),a}function w(a){return T.substr(T.indexOf(":")+J+a)}function y(a){h(V,"MessageCallback passed: {iframe: "+U.iframe.id+", message: "+a+"}"),I("messageCallback",{iframe:U.iframe,message:JSON.parse(a)}),h(V,"--")}function z(){var a=document.body.getBoundingClientRect(),b=U.iframe.getBoundingClientRect();return JSON.stringify({iframeHeight:b.height,iframeWidth:b.width,clientHeight:Math.max(document.documentElement.clientHeight,window.innerHeight||0),clientWidth:Math.max(document.documentElement.clientWidth,window.innerWidth||0),offsetTop:parseInt(b.top-a.top,10),offsetLeft:parseInt(b.left-a.left,10),scrollTop:window.pageYOffset,scrollLeft:window.pageXOffset})}function A(a,b){function c(){u("Send Page Info","pageInfo:"+z(),a,b)}x(c,32)}function B(){function a(a,b){function c(){P[f]?A(P[f].iframe,f):d()}["scroll","resize"].forEach(function(d){h(f,a+d+" listener for sendPageInfo"),b(window,d,c)})}function d(){a("Remove ",c)}function e(){a("Add ",b)}var f=V;e(),P[f].stopPageInfo=d}function C(){P[V]&&P[V].stopPageInfo&&(P[V].stopPageInfo(),delete P[V].stopPageInfo)}function D(){var a=!0;return null===U.iframe&&(j(V,"IFrame ("+U.id+") not found"),a=!1),a}function E(a){var b=a.getBoundingClientRect();return o(V),{x:Math.floor(Number(b.left)+Number(M.x)),y:Math.floor(Number(b.top)+Number(M.y))}}function F(a){function b(){M=f,G(),h(V,"--")}function c(){return{x:Number(U.width)+e.x,y:Number(U.height)+e.y}}function d(){window.parentIFrame?window.parentIFrame["scrollTo"+(a?"Offset":"")](f.x,f.y):j(V,"Unable to scroll to requested position, window.parentIFrame not found")}var e=a?E(U.iframe):{x:0,y:0},f=c();h(V,"Reposition requested from iFrame (offset x:"+e.x+" y:"+e.y+")"),window.top!==window.self?d():b()}function G(){!1!==I("scrollCallback",M)?p(V):q()}function H(a){function b(){var a=E(f);h(V,"Moving to in page link (#"+d+") at x: "+a.x+" y: "+a.y),M={x:a.x,y:a.y},G(),h(V,"--")}function c(){window.parentIFrame?window.parentIFrame.moveToAnchor(d):h(V,"In page link #"+d+" not found and window.parentIFrame not found")}var d=a.split("#")[1]||"",e=decodeURIComponent(d),f=document.getElementById(e)||document.getElementsByName(e)[0];f?b():window.top!==window.self?c():h(V,"In page link #"+d+" not found")}function I(a,b){return m(V,a,b)}function N(){switch(P[V].firstRun&&S(),U.type){case"close":n(U.iframe);break;case"message":y(w(6));break;case"scrollTo":F(!1);break;case"scrollToOffset":F(!0);break;case"pageInfo":A(P[V].iframe,V),B();break;case"pageInfoStop":C();break;case"inPageLink":H(w(9));break;case"reset":r(U);break;case"init":d(),I("initCallback",U.iframe);break;default:d()}}function O(a){var b=!0;return P[a]||(b=!1,j(U.type+" No settings for "+a+". Message was: "+T)),b}function Q(){for(var a in P)u("iFrame requested init",v(a),document.getElementById(a),a)}function S(){P[V].firstRun=!1}var T=a.data,U={},V=null;"[iFrameResizerChild]Ready"===T?Q():k()?(U=e(),V=R=U.id,P[V].loaded=!0,!l()&&O(V)&&(h(V,"Received: "+T),D()&&g()&&N())):i(V,"Ignored: "+T)}function m(a,b,c){var d=null,e=null;if(P[a]){if(d=P[a][b],"function"!=typeof d)throw new TypeError(b+" on iFrame["+a+"] is not a function");e=d(c)}return e}function n(a){var b=a.id;h(b,"Removing iFrame: "+b),a.parentNode&&a.parentNode.removeChild(a),m(b,"closedCallback",b),h(b,"--"),delete P[b]}function o(b){null===M&&(M={x:window.pageXOffset!==a?window.pageXOffset:document.documentElement.scrollLeft,y:window.pageYOffset!==a?window.pageYOffset:document.documentElement.scrollTop},h(b,"Get page position: "+M.x+","+M.y))}function p(a){null!==M&&(window.scrollTo(M.x,M.y),h(a,"Set page position: "+M.x+","+M.y),q())}function q(){M=null}function r(a){function b(){s(a),u("reset","reset",a.iframe,a.id)}h(a.id,"Size reset requested by "+("init"===a.type?"host page":"iFrame")),o(a.id),t(b,a,"reset")}function s(a){function b(b){a.iframe.style[b]=a[b]+"px",h(a.id,"IFrame ("+e+") "+b+" set to "+a[b]+"px")}function c(b){H||"0"!==a[b]||(H=!0,h(e,"Hidden iFrame detected, creating visibility listener"),y())}function d(a){b(a),c(a)}var e=a.iframe.id;P[e]&&(P[e].sizeHeight&&d("height"),P[e].sizeWidth&&d("width"))}function t(a,b,c){c!==b.type&&N?(h(b.id,"Requesting animation frame"),N(a)):a()}function u(a,b,c,d,e){function f(){var e=P[d].targetOrigin;h(d,"["+a+"] Sending msg to iframe["+d+"] ("+b+") targetOrigin: "+e),c.contentWindow.postMessage(K+b,e)}function g(){j(d,"["+a+"] IFrame("+d+") not found")}function i(){c&&"contentWindow"in c&&null!==c.contentWindow?f():g()}function k(){function a(){!P[d]||P[d].loaded||l||(l=!0,j(d,"IFrame has not responded within "+P[d].warningTimeout/1e3+" seconds. Check iFrameResizer.contentWindow.js has been loaded in iFrame. This message can be ingored if everything is working, or you can set the warningTimeout option to a higher value or zero to suppress this warning."))}e&&P[d].warningTimeout&&(P[d].msgTimeout=setTimeout(a,P[d].warningTimeout))}var l=!1;d=d||c.id,P[d]&&(i(),k())}function v(a){return a+":"+P[a].bodyMarginV1+":"+P[a].sizeWidth+":"+P[a].log+":"+P[a].interval+":"+P[a].enablePublicMethods+":"+P[a].autoResize+":"+P[a].bodyMargin+":"+P[a].heightCalculationMethod+":"+P[a].bodyBackground+":"+P[a].bodyPadding+":"+P[a].tolerance+":"+P[a].inPageLinks+":"+P[a].resizeFrom+":"+P[a].widthCalculationMethod}function w(c,d){function e(){function a(a){1/0!==P[x][a]&&0!==P[x][a]&&(c.style[a]=P[x][a]+"px",h(x,"Set "+a+" = "+P[x][a]+"px"))}function b(a){if(P[x]["min"+a]>P[x]["max"+a])throw new Error("Value for min"+a+" can not be greater than max"+a)}b("Height"),b("Width"),a("maxHeight"),a("minHeight"),a("maxWidth"),a("minWidth")}function f(){var a=d&&d.id||S.id+F++;return null!==document.getElementById(a)&&(a+=F++),a}function g(a){return R=a,""===a&&(c.id=a=f(),G=(d||{}).log,R=a,h(a,"Added missing iframe ID: "+a+" ("+c.src+")")),a}function i(){switch(h(x,"IFrame scrolling "+(P[x].scrolling?"enabled":"disabled")+" for "+x),c.style.overflow=!1===P[x].scrolling?"hidden":"auto",P[x].scrolling){case!0:c.scrolling="yes";break;case!1:c.scrolling="no";break;default:c.scrolling=P[x].scrolling}}function k(){("number"==typeof P[x].bodyMargin||"0"===P[x].bodyMargin)&&(P[x].bodyMarginV1=P[x].bodyMargin,P[x].bodyMargin=""+P[x].bodyMargin+"px")}function l(){var a=P[x].firstRun,b=P[x].heightCalculationMethod in O;!a&&b&&r({iframe:c,height:0,width:0,type:"init"})}function m(){Function.prototype.bind&&(P[x].iframe.iFrameResizer={close:n.bind(null,P[x].iframe),resize:u.bind(null,"Window resize","resize",P[x].iframe),moveToAnchor:function(a){u("Move to anchor","moveToAnchor:"+a,P[x].iframe,x)},sendMessage:function(a){a=JSON.stringify(a),u("Send Message","message:"+a,P[x].iframe,x)}})}function o(d){function e(){u("iFrame.onload",d,c,a,!0),l()}b(c,"load",e),u("init",d,c,a,!0)}function p(a){if("object"!=typeof a)throw new TypeError("Options is not an object")}function q(a){for(var b in S)S.hasOwnProperty(b)&&(P[x][b]=a.hasOwnProperty(b)?a[b]:S[b])}function s(a){return""===a||"file://"===a?"*":a}function t(a){a=a||{},P[x]={firstRun:!0,iframe:c,remoteHost:c.src.split("/").slice(0,3).join("/")},p(a),q(a),P[x].targetOrigin=!0===P[x].checkOrigin?s(P[x].remoteHost):"*"}function w(){return x in P&&"iFrameResizer"in c}var x=g(c.id);w()?j(x,"Ignored iFrame, already setup."):(t(d),i(),e(),k(),o(v(x)),m())}function x(a,b){null===Q&&(Q=setTimeout(function(){Q=null,a()},b))}function y(){function a(){function a(a){function b(b){return"0px"===P[a].iframe.style[b]}function c(a){return null!==a.offsetParent}c(P[a].iframe)&&(b("height")||b("width"))&&u("Visibility change","resize",P[a].iframe,a)}for(var b in P)a(b)}function b(b){h("window","Mutation observed: "+b[0].target+" "+b[0].type),x(a,16)}function c(){var a=document.querySelector("body"),c={attributes:!0,attributeOldValue:!1,characterData:!0,characterDataOldValue:!1,childList:!0,subtree:!0},e=new d(b);e.observe(a,c)}var d=window.MutationObserver||window.WebKitMutationObserver;d&&c()}function z(a){function b(){B("Window "+a,"resize")}h("window","Trigger event: "+a),x(b,16)}function A(){function a(){B("Tab Visable","resize")}"hidden"!==document.visibilityState&&(h("document","Trigger event: Visiblity change"),x(a,16))}function B(a,b){function c(a){return"parent"===P[a].resizeFrom&&P[a].autoResize&&!P[a].firstRun}for(var d in P)c(d)&&u(a,b,document.getElementById(d),d)}function C(){b(window,"message",l),b(window,"resize",function(){z("resize")}),b(document,"visibilitychange",A),b(document,"-webkit-visibilitychange",A),b(window,"focusin",function(){z("focus")}),b(window,"focus",function(){z("focus")})}function D(){function b(a,b){function c(){if(!b.tagName)throw new TypeError("Object is not a valid DOM element");if("IFRAME"!==b.tagName.toUpperCase())throw new TypeError("Expected <IFRAME> tag, found <"+b.tagName+">")}b&&(c(),w(b,a),e.push(b))}function c(a){a&&a.enablePublicMethods&&j("enablePublicMethods option has been removed, public methods are now always available in the iFrame")}var e;return d(),C(),function(d,f){switch(e=[],c(d),typeof f){case"undefined":case"string":Array.prototype.forEach.call(document.querySelectorAll(f||"iframe"),b.bind(a,d));break;case"object":b(d,f);break;default:throw new TypeError("Unexpected data type ("+typeof f+")")}return e}}function E(a){a.fn?a.fn.iFrameResize||(a.fn.iFrameResize=function(a){function b(b,c){w(c,a)}return this.filter("iframe").each(b).end()}):i("","Unable to bind to jQuery, it is not fully loaded.")}if("undefined"!=typeof window){var F=0,G=!1,H=!1,I="message",J=I.length,K="[iFrameSizer]",L=K.length,M=null,N=window.requestAnimationFrame,O={max:1,scroll:1,bodyScroll:1,documentElementScroll:1},P={},Q=null,R="Host Page",S={autoResize:!0,bodyBackground:null,bodyMargin:null,bodyMarginV1:8,bodyPadding:null,checkOrigin:!0,inPageLinks:!1,enablePublicMethods:!0,heightCalculationMethod:"bodyOffset",id:"iFrameResizer",interval:32,log:!1,maxHeight:1/0,maxWidth:1/0,minHeight:0,minWidth:0,resizeFrom:"parent",scrolling:!1,sizeHeight:!0,sizeWidth:!1,warningTimeout:5e3,tolerance:0,widthCalculationMethod:"scroll",closedCallback:function(){},initCallback:function(){},messageCallback:function(){j("MessageCallback function not defined")},resizedCallback:function(){},scrollCallback:function(){return!0}};window.jQuery&&E(window.jQuery),"function"==typeof define&&define.amd?define([],D):"object"==typeof module&&"object"==typeof module.exports?module.exports=D():window.iFrameResize=window.iFrameResize||D()}}();
//# sourceMappingURL=iframeResizer.map
/**
 * 상품상세 Q&A
 */
$(document).ready(function(){
    $('.xans-product-qna a').click(function(e) {
        e.preventDefault();

        var no = $(this).attr('href').replace(/(\S*)[?&]no=(\d+)(\S*)/g, '$2');
        var $obj = $('#product-qna-read_'+no);

        //로드된 엘리먼트 존재 체크
        if ($obj.length > 0) {
            if ($obj.css('display') =='none') {
                $obj.show();
            } else {
                $obj.hide();
            }
            return;
        }

        QNA.getReadData($(this));

    });
});

var PARENT = '';

var OPEN_QNA = '';

var QNA = {
    getReadData : function(obj, eType)
    {
        if (obj != undefined) {
            PARENT = obj;
            var sHref = obj.attr('href');
            var pNode = obj.parents('tr');
            var pass_check = '&pass_check=F';
        } else {
            var sHref = PARENT.attr('href');
            var pNode = PARENT.parents('tr');
            var pass_check = '&pass_check=T';
        }

        var sQuery = sHref.split('?');

        var sQueryNo = sQuery[1].split('=');
        if (OPEN_QNA == sQueryNo[1]) {
            $('#product-qna-read').remove();
            OPEN_QNA = '';
            return false;
        } else {
            OPEN_QNA = sQueryNo[1];
        }

        $.ajax({
            url : '/exec/front/board/product/6?'+sQuery[1]+pass_check,
            dataType: 'json',
            success: function(data) {
                $('#product-qna-read').remove();

                var sPath = document.location.pathname;
                var sPattern = /^\/product\/(.+)\/([0-9]+)(\/.*)/;
                var aMatchResult = sPath.match(sPattern);

                if (aMatchResult) {
                    var iProductNo = aMatchResult[2];
                } else {
                    var iProductNo = getQueryString('product_no');
                }

                var aHtml = [];

                //읽기 권한 체크
                if (false === data.read_auth && eType == undefined) {
                    alert(decodeURIComponent(data.alertMSG));

                    //로그인페이지 이동
                    if (data.returnUrl != undefined) {
                        location.replace("/member/login.html?returnUrl=" + data.returnUrl);
                    }
                    return false;
                }

                if (data.is_secret == true) {
                    // 비밀글 비밀번호 입력 폼
                    aHtml.push('<form name="SecretForm_6" id="SecretForm_6">');
                    aHtml.push('<input type="text" name="a" style="display:none;">');
                    aHtml.push('<div class="view"><p>비밀번호 <input type="password" id="secure_password" name="secure_password" onkeydown="if (event.keyCode == 13) '+data.action_pass_submit+'"> <input type="button" value="확인" onclick="'+data.action_pass_submit+'"></p></div>');
                    aHtml.push('</form>');
                } else {
                    // 글 내용
                    if (data.read['content_image'] != null) {
                        var sImg = data.read['content_image'];
                    } else {
                        var sImg = '';
                    }

                   // aHtml.push('<div class="view">');
				   aHtml.push('<div class="view '+ data.read['block_content_class'] +'">');
					aHtml.push('<div id="ec-ucc-media-box-'+ data.read['no'] +'"></div>');
                    aHtml.push('<p>'+data.read['content']+'</p>');
                    aHtml.push('<p>'+sImg+'</p>');
                    aHtml.push('<p class="ec-base-button"><span class="gLeft">');
                    if (data.write_auth == true) {
                        aHtml.push('<a href="/board/product/modify.html?board_act=edit&no='+data.no+'&board_no=6&link_product_no='+iProductNo+'" class="btnNormal">게시글 수정</a>');
                    }
                    aHtml.push('</span></p>');
                    aHtml.push('</div>');

                    // 댓글리스트
                    if (data.comment != undefined && data.comment.length != undefined) {
                        aHtml.push('<ul class="boardComment">');
                        for (var i=0; data.comment.length > i; i++) {
                            //댓글리스트
                            if (data.comment[i]['comment_reply_css'] == undefined) {
                                aHtml.push('<li>');
                                aHtml.push('<strong class="name">'+data.comment[i]['member_icon']+' '+data.comment[i]['comment_name']+'</strong>');
                                aHtml.push('<span class="date">'+data.comment[i]['comment_write_date']+'</span>');
                                aHtml.push('<span class="grade '+data.use_point+'"><img src="//img.echosting.cafe24.com/skin/base_ko_KR/board/ico_point'+data.comment[i]['comment_point_count']+'.gif" alt="'+data.comment[i]['comment_point_count']+'점" /></span>');
                                if (data.comment[i]['comment_reply_display'] == true) {
                                    aHtml.push('<span class="button">'+'<a href="#none" class="btnNormal" onclick="'+data.comment[i]['action_comment_reply']+'">댓글 <img src="//img.echosting.cafe24.com/skin/base/common/btn_icon_reply.gif" alt="" /></a>'+'</span>');
                                }
                                aHtml.push('<p class="comment">'+data.comment[i]['comment_icon_lock']+' '+data.comment[i]['comment_content']+'</p>');
                                aHtml.push('</li>');
                            } else {
                                //댓글의 댓글리스트
                                aHtml.push('<li class="replyArea">');
                                aHtml.push('<strong class="name">'+data.comment[i]['member_icon']+' '+data.comment[i]['comment_name']+'</strong>');
                                aHtml.push('<span class="date">'+data.comment[i]['comment_write_date']+'</span>');
                                aHtml.push('<p class="comment">'+data.comment[i]['comment_icon_lock']+' '+data.comment[i]['comment_content']+'</p>');
                                aHtml.push('</li>');
                            }
                        }
                        aHtml.push('</ul>');
                    }

                    // 댓글쓰기
                    if (data.comment_write != undefined) {
                        aHtml.push('<form name="commentWriteForm_6'+data.key+'" id="commentWriteForm_6'+data.key+'">');
                        aHtml.push('<div class="memoCont">');
                        aHtml.push('<div class="writer">');
                        aHtml.push('<div class="user"><div class="nameArea">이름 '+data.comment_write['comment_name']+' 비밀번호 '+data.comment_write['comment_password']);
                        if (data.comment_write['comment_secret_display'] == true) {
                            aHtml.push('<label class="secret">'+data.comment_write['secure']+' 비밀댓글</label>');
                        }
                        aHtml.push('<p class="ec-base-help '+data.comment_write['password_rule_help_display_class']+'">영문 대소문자/숫자/특수문자 중 2가지 이상 조합, 10자~16자</p>');
                        aHtml.push('</div>');
                        aHtml.push(''+data.comment_write['comment']+'<a href="#none" class="btnEm sizeL" onclick="'+data.comment_write['action_comment_insert']+'">확인</a></div>');
                        aHtml.push('<p class="rating '+data.comment_write['use_point']+'">'+data.comment_write['comment_point']+'</p>');
                        aHtml.push('<p class="text '+data.comment_write['use_comment_size']+'">'+data.comment_write['comment_byte']+' / '+data.comment_write['comment_size']+' byte</p>');
                        aHtml.push('<p class="captcha '+data.comment_write['use_captcha']+'">'+data.comment_write['captcha_image']+data.comment_write['captcha_refresh']+data.comment_write['captcha']+'<img src="//img.echosting.cafe24.com/skin/base/common/ico_info.gif" alt="" /> 왼쪽의 문자를 공백없이 입력하세요.(대소문자구분)</p>');
                        aHtml.push('</div>');
                        aHtml.push('</div>');
                        aHtml.push('</form>');
                    }

                    // 댓글의 댓글쓰기
                    if (data.comment_reply != undefined) {
                        aHtml.push('<form name="commentReplyWriteForm_6'+data.key+'" id="commentReplyWriteForm_6'+data.key+'" style="display:none">');
                        aHtml.push('<div class="memoCont reply">');
                        aHtml.push('<div class="writer">');
                        aHtml.push('<div class="user"><div class="nameArea">이름 '+data.comment_reply['comment_name']+' 비밀번호 '+data.comment_reply['comment_password']);
                        if (data.comment_reply['comment_secret_display'] == true) {
                            aHtml.push('<label class="secret">'+data.comment_reply['secure']+' 비밀댓글</label>');
                        }
                        aHtml.push('<p class="ec-base-help '+data.comment_write['password_rule_help_display_class']+'">영문 대소문자/숫자/특수문자 중 2가지 이상 조합, 10자~16자</p>');
                        aHtml.push('</div>');
                        aHtml.push(''+data.comment_reply['comment']+'<a href="#none" class="btnEm sizeL" onclick="'+data.comment_reply['action_comment_insert']+'">확인</a></div>');
                        aHtml.push('<p class="text '+data.comment_reply['use_comment_size']+'">'+data.comment_reply['comment_byte']+' / '+data.comment_reply['comment_size']+' byte</p>');
                        aHtml.push('<p class="captcha '+data.comment_reply['use_captcha']+'">'+data.comment_reply['captcha_image']+data.comment_reply['captcha_refresh']+data.comment_reply['captcha']+'<img src="//img.echosting.cafe24.com/skin/base/common/ico_info.gif" alt="" /> 왼쪽의 문자를 공백없이 입력하세요.(대소문자구분)</p>');
                        aHtml.push('</div>');
                        aHtml.push('</div>');
                        aHtml.push('</form>');
                    }
                    // 비밀댓글 확인
                    if (data.comment_secret != undefined) {
                        aHtml.push('<form name="commentSecretForm_6'+data.key+'" id="commentSecretForm_6'+data.key+'" style="display:none">');
                        aHtml.push('<div class="commentSecret">');
                        aHtml.push('<p>비밀번호 : '+data.comment_secret['secure_password']);
                        aHtml.push(' <a href="#none" class="btnNormal" onclick="'+data.comment_secret['action_secret_submit']+'">확인</a>');
                        aHtml.push(' <a href="#none" class="btnNormal" onclick="'+data.comment_secret['action_secret_cancel']+'">취소</a></p>');
                        aHtml.push('</div>');
                        aHtml.push('</form>');
                    }
                }

                //$(pNode).after('<tr id="product-qna-read'+data.key+'"><td colspan="6">'+aHtml.join('')+'</td></tr>');
				$(pNode).after('<tr id="product-qna-read'+data.key+'" class="'+ data.read['block_target_class'] +'" '+ data.read['block_data_attr'] +'><td colspan="6">'+aHtml.join('')+'</td></tr>');

                // 평점기능 사용안함일 경우 보여지는 td를 조절하기 위한 함수
                PRODUCT_COMMENT.comment_colspan(pNode);
				// 게시물 작성자 차단 기능
                APP_BOARD_BLOCK.setBlockList();

                if (data.comment_write != undefined && data.comment_write['use_comment_size'] == '') PRODUCT_COMMENT.comment_byte(6, data.key);
                if (data.comment_reply != undefined && data.comment_write['use_comment_size'] == '') PRODUCT_COMMENT.comment_byte(6, data.key, 'commentReplyWriteForm');
				if (data.read['ucc_url']) $('#ec-ucc-media-box-'+ data.read['no']).replaceWith(APP_BOARD_UCC.getPreviewElement(data.read['ucc_url']));
            }
        });
    },

    END : function() {}
};
/**
 * 움직이는 배너 Jquery Plug-in
 * @author  cafe24
 */

(function($){

    $.fn.floatBanner = function(options) {
        options = $.extend({}, $.fn.floatBanner.defaults , options);

        return this.each(function() {
            var aPosition = $(this).position();
            var jbOffset = $(this).offset();
            var node = this;

            $(window).scroll(function() {
                var _top = $(document).scrollTop();
                _top = (aPosition.top < _top) ? _top : aPosition.top;

                setTimeout(function () {
                    var newinit = $(document).scrollTop();

                    if ( newinit > jbOffset.top ) {
                        _top -= jbOffset.top;
                        var container_height = $("#wrap").height();
                        var quick_height = $(node).height();
                        var cul = container_height - quick_height;
                        if(_top > cul){
                            _top = cul;
                        }
                    }else {
                        _top = 0;
                    }

                    $(node).stop().animate({top: _top}, options.animate);
                }, options.delay);
            });
        });
    };

    $.fn.floatBanner.defaults = {
        'animate'  : 500,
        'delay'    : 500
    };

})(jQuery);

/**
 * 문서 구동후 시작
 */
$(document).ready(function(){
    $('#banner:visible, #quick:visible').floatBanner();

    //placeholder
    $(".ePlaceholder input, .ePlaceholder textarea").each(function(i){
        var placeholderName = $(this).parents().attr('title');
        $(this).attr("placeholder", placeholderName);
    });
    /* placeholder ie8, ie9 */
    $.fn.extend({
        placeholder : function() {
            //IE 8 버전에는 hasPlaceholderSupport() 값이 false를 리턴
           if (hasPlaceholderSupport() === true) {
                return this;
            }
            //hasPlaceholderSupport() 값이 false 일 경우 아래 코드를 실행
            return this.each(function(){
                var findThis = $(this);
                var sPlaceholder = findThis.attr('placeholder');
                if ( ! sPlaceholder) {
                   return;
                }
                findThis.wrap('<label class="ePlaceholder" />');
                var sDisplayPlaceHolder = $(this).val() ? ' style="display:none;"' : '';
                findThis.before('<span' + sDisplayPlaceHolder + '>' + sPlaceholder + '</span>');
                this.onpropertychange = function(e){
                    e = event || e;
                    if (e.propertyName == 'value') {
                        $(this).trigger('focusout');
                    }
                };
                //공통 class
                var agent = navigator.userAgent.toLowerCase();
                if (agent.indexOf("msie") != -1) {
                    $(".ePlaceholder").css({"position":"relative"});
                    $(".ePlaceholder span").css({"position":"absolute", "padding":"0 4px", "color":"#878787"});
                    $(".ePlaceholder label").css({"padding":"0"});
                }
            });
        }
    });

    $(':input[placeholder]').placeholder(); //placeholder() 함수를 호출

    //클릭하면 placeholder 숨김
    $('body').delegate('.ePlaceholder span', 'click', function(){
        $(this).hide();
    });

    //input창 포커스 인 일때 placeholder 숨김
    $('body').delegate('.ePlaceholder :input', 'focusin', function(){
        $(this).prev('span').hide();
    });

    //input창 포커스 아웃 일때 value 가 true 이면 숨김, false 이면 보여짐
    $('body').delegate('.ePlaceholder :input', 'focusout', function(){
        if (this.value) {
            $(this).prev('span').hide();
        } else {
            $(this).prev('span').show();
        }
    });

    //input에 placeholder가 지원이 되면 true를 안되면 false를 리턴값으로 던져줌
    function hasPlaceholderSupport() {
        if ('placeholder' in document.createElement('input')) {
            return true;
        } else {
            return false;
        }
    }
});

/**
 *  썸네일 이미지 엑박일경우 기본값 설정
 */
$(window).load(function() {
    $("img.thumb,img.ThumbImage,img.BigImage").each(function($i,$item){
        var $img = new Image();
        $img.onerror = function () {
                $item.src="//img.echosting.cafe24.com/thumb/img_product_big.gif";
        }
        $img.src = this.src;
    });
});

/**
 *  tooltip
 */
$('.eTooltip').each(function(i){
    $(this).find('.btnClose').attr('tabIndex','-1');
});
//tooltip input focus
$('.eTooltip').find('input').focus(function() {
    var targetName = returnTagetName(this);
    targetName.siblings('.ec-base-tooltip').show();
});
$('.eTooltip').find('input').focusout(function() {
    var targetName = returnTagetName(this);
    targetName.siblings('.ec-base-tooltip').hide();
});
function returnTagetName(_this){
    var ePlacename = $(_this).parent().attr("class");
    var targetName;
    if(ePlacename == "ePlaceholder"){ //ePlaceholder 대응
        targetName = $(_this).parents();
    }else{
        targetName = $(_this);
    }
    return targetName;
}

/**
 *  eTab
 */
 $("body").delegate(".eTab a", "click", function(e){
    // 클릭한 li 에 selected 클래스 추가, 기존 li에 있는 selected 클래스는 삭제.
    var _li = $(this).parent("li").addClass("selected").siblings().removeClass("selected"),
    _target = $(this).attr("href"),
    _siblings = $(_target).attr("class"),
    _arr = _siblings.split(" "),
    _classSiblings = "."+_arr[0];

    //클릭한 탭에 해당하는 요소는 활성화, 기존 요소는 비활성화 함.
    $(_target).show().siblings(_classSiblings).hide();


    //preventDefault 는 a 태그 처럼 클릭 이벤트 외에 별도의 브라우저 행동을 막기 위해 사용됨.
    e.preventDefault();
});



//window popup script
function winPop(url) {
    window.open(url, "popup", "width=300,height=300,left=10,top=10,resizable=no,scrollbars=no");
}
/**
 * document.location.href split
 * return array Param
 */
function getQueryString(sKey)
{
    var sQueryString = document.location.search.substring(1);
    var aParam       = {};

    if (sQueryString) {
        var aFields = sQueryString.split("&");
        var aField  = [];
        for (var i=0; i<aFields.length; i++) {
            aField = aFields[i].split('=');
            aParam[aField[0]] = aField[1];
        }
    }

    aParam.page = aParam.page ? aParam.page : 1;
    return sKey ? aParam[sKey] : aParam;
};

$(document).ready(function(){
    // tab
    $.eTab = function(ul){
        $(ul).find('a').click(function(){
            var _li = $(this).parent('li').addClass('selected').siblings().removeClass('selected'),
                _target = $(this).attr('href'),
                _siblings = '.' + $(_target).attr('class');
            $(_target).show().siblings(_siblings).hide();
            return false
        });
    }
    if ( window.call_eTab ) {
        call_eTab();
    };
});
(function($){
$.fn.extend({
    center: function() {
        this.each(function() {
            var
                $this = $(this),
                $w = $(window);
            $this.css({
                position: "absolute",
                top: ~~(($w.height() - $this.outerHeight()) / 2) + $w.scrollTop() + "px",
                left: ~~(($w.width() - $this.outerWidth()) / 2) + $w.scrollLeft() + "px"
            });
        });
        return this;
    }
});
$(function() {
    var $container = function(){/*
<div id="modalContainer">
    <iframe id="modalContent" scroll="0" scrolling="no" frameBorder="0"></iframe>
</div>');
*/}.toString().slice(14,-3);
    $('body')
    .append($('<div id="modalBackpanel"></div>'))
    .append($($container));
    function closeModal () {
        $('#modalContainer').hide();
        $('#modalBackpanel').hide();
    }
    $('#modalBackpanel').click(closeModal);
    zoom = function ($piProductNo, $piCategoryNo, $piDisplayGroup) {
        var $url = '/product/image_zoom.html?product_no=' + $piProductNo + '&cate_no=' + $piCategoryNo + '&display_group=' + $piDisplayGroup;
        $('#modalContent').attr('src', $url);
        $('#modalContent').bind("load",function(){
            $(".header .close",this.contentWindow.document.body).bind("click", closeModal);
        });
        $('#modalBackpanel').css({width:$("body").width(),height:$("body").height(),opacity:.4}).show();
        $('#modalContainer').center().show();
    }
});
})(jQuery);
$(document).ready(function(){
    if (typeof(EC_SHOP_MULTISHOP_SHIPPING) != "undefined") {
        var sShippingCountryCode4Cookie = 'shippingCountryCode';
        var bShippingCountryProc = false;

        // 배송국가 선택 설정이 사용안함이면 숨김
        if (EC_SHOP_MULTISHOP_SHIPPING.bMultishopShippingCountrySelection === false) {
            $('.xans-layout-multishopshipping .xans-layout-multishopshippingcountrylist').hide();
            $('.xans-layout-multishoplist .xans-layout-multishoplistmultioption .xans-layout-multishoplistmultioptioncountry').hide();
        } else {
            $('.thumb .xans-layout-multishoplistitem').hide();
            var aShippingCountryCode = document.cookie.match('(^|;) ?'+sShippingCountryCode4Cookie+'=([^;]*)(;|$)');
            if (typeof(aShippingCountryCode) != 'undefined' && aShippingCountryCode != null && aShippingCountryCode.length > 2) {
                var sShippingCountryValue = aShippingCountryCode[2];
            }

            // query string으로 넘어 온 배송국가 값이 있다면, 그 값을 적용함
            var aHrefCountryValue = decodeURIComponent(location.href).split("/?country=");

            if (aHrefCountryValue.length == 2) {
                var sShippingCountryValue = aHrefCountryValue[1];
            }

            // 메인 페이지에서 국가선택을 안한 경우, 그 외의 페이지에서 셋팅된 값이 안 나오는 현상 처리
            if (location.href.split("/").length != 4 && $(".xans-layout-multishopshipping .xans-layout-multishopshippingcountrylist").val()) {
                $(".xans-layout-multishoplist .xans-layout-multishoplistmultioption a .ship span").text(" : "+$(".xans-layout-multishopshipping .xans-layout-multishopshippingcountrylist option:selected").text().split("SHIPPING TO : ").join(""));

                if ($("#f_country").length > 0 && location.href.indexOf("orderform.html") > -1) {
                    $("#f_country").val($(".xans-layout-multishopshipping .xans-layout-multishopshippingcountrylist").val());
                }
            }
            if (typeof(sShippingCountryValue) != "undefined" && sShippingCountryValue != "" && sShippingCountryValue != null) {
                sShippingCountryValue = sShippingCountryValue.split("#")[0];
                var bShippingCountryProc = true;

                $(".xans-layout-multishopshipping .xans-layout-multishopshippingcountrylist").val(sShippingCountryValue);
                $(".xans-layout-multishoplist .xans-layout-multishoplistmultioption a .ship span").text(" : "+$(".xans-layout-multishopshipping .xans-layout-multishopshippingcountrylist option:selected").text().split("SHIPPING TO : ").join(""));
                var expires = new Date();
                expires.setTime(expires.getTime() + (30 * 24 * 60 * 60 * 1000)); // 30일간 쿠키 유지
                document.cookie = sShippingCountryCode4Cookie+'=' + $(".xans-layout-multishopshipping .xans-layout-multishopshippingcountrylist").val() +';path=/'+ ';expires=' + expires.toUTCString();
                if ($("#f_country").length > 0 && location.href.indexOf("orderform.html") > -1) {
                    $("#f_country").val(sShippingCountryValue).change();;
                }
            }
        }
        // 언어선택 설정이 사용안함이면 숨김
        if (EC_SHOP_MULTISHOP_SHIPPING.bMultishopShippingLanguageSelection === false) {
            $('.xans-layout-multishopshipping .xans-layout-multishopshippinglanguagelist').hide();
            $('.xans-layout-multishoplist .xans-layout-multishoplistmultioption .xans-layout-multishoplistmultioptionlanguage').hide();
        } else {
            $('.thumb .xans-layout-multishoplistitem').hide();
        }

        // 배송국가 및 언어 설정이 둘 다 사용안함이면 숨김
        if (EC_SHOP_MULTISHOP_SHIPPING.bMultishopShipping === false) {
            $(".xans-layout-multishopshipping").hide();
            $('.xans-layout-multishoplist .xans-layout-multishoplistmultioption').hide();
        } else if (bShippingCountryProc === false && location.href.split("/").length == 4) { // 배송국가 값을 처리한 적이 없고, 메인화면일 때만 선택 레이어를 띄움
            var sShippingCountryValue = $(".xans-layout-multishopshipping .xans-layout-multishopshippingcountrylist").val();
            $(".xans-layout-multishopshipping .xans-layout-multishopshippingcountrylist").val(sShippingCountryValue);
            $(".xans-layout-multishoplist .xans-layout-multishoplistmultioption a .ship span").text(" : "+$(".xans-layout-multishopshipping .xans-layout-multishopshippingcountrylist option:selected").text().split("SHIPPING TO : ").join(""));
            // 배송국가 선택을 사용해야 레이어를 보이게 함
            if (EC_SHOP_MULTISHOP_SHIPPING.bMultishopShippingCountrySelection === true) {
                $(".xans-layout-multishopshipping").show();
            }
        }

        $(".xans-layout-multishopshipping .close").bind("click", function() {
            $(".xans-layout-multishopshipping").hide();
        });

        $(".xans-layout-multishopshipping .ec-base-button a").bind("click", function() {
            var expires = new Date();
            expires.setTime(expires.getTime() + (30 * 24 * 60 * 60 * 1000)); // 30일간 쿠키 유지
            document.cookie = sShippingCountryCode4Cookie+'=' + $(".xans-layout-multishopshipping .xans-layout-multishopshippingcountrylist").val() +';path=/'+ ';expires=' + expires.toUTCString();

            // 도메인 문제로 쿠키로 배송국가 설정이 안 되는 경우를 위해 query string으로 배송국가 값을 넘김
            var sQuerySting = (EC_SHOP_MULTISHOP_SHIPPING.bMultishopShippingCountrySelection === false) ? "" : "/?country="+encodeURIComponent($(".xans-layout-multishopshipping .xans-layout-multishopshippingcountrylist").val());

            location.href = '//'+$(".xans-layout-multishopshipping .xans-layout-multishopshippinglanguagelist").val()+sQuerySting;
        });
        $(".xans-layout-multishoplist .xans-layout-multishoplistmultioption a").bind("click", function() {
            $(".xans-layout-multishopshipping").show();
        });
    }
});
/*
 * jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/
 *
 * Uses the built in easing capabilities added In jQuery 1.1
 * to offer multiple easing options
 *
 * TERMS OF USE - jQuery Easing
 *
 * Open source under the BSD License.
 *
 * Copyright 짤 2008 George McGinley Smith
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 *
 * Redistributions of source code must retain the above copyright notice, this list of
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list
 * of conditions and the following disclaimer in the documentation and/or other materials
 * provided with the distribution.
 *
 * Neither the name of the author nor the names of contributors may be used to endorse
 * or promote products derived from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED
 * OF THE POSSIBILITY OF SUCH DAMAGE.
 *
*/

// t: current time, b: begInnIng value, c: change In value, d: duration
jQuery.easing['jswing'] = jQuery.easing['swing'];

jQuery.extend( jQuery.easing,
{
	def: 'easeOutQuad',
	swing: function (x, t, b, c, d) {
		//alert(jQuery.easing.default);
		return jQuery.easing[jQuery.easing.def](x, t, b, c, d);
	},
	easeInQuad: function (x, t, b, c, d) {
		return c*(t/=d)*t + b;
	},
	easeOutQuad: function (x, t, b, c, d) {
		return -c *(t/=d)*(t-2) + b;
	},
	easeInOutQuad: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t + b;
		return -c/2 * ((--t)*(t-2) - 1) + b;
	},
	easeInCubic: function (x, t, b, c, d) {
		return c*(t/=d)*t*t + b;
	},
	easeOutCubic: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t + 1) + b;
	},
	easeInOutCubic: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t + b;
		return c/2*((t-=2)*t*t + 2) + b;
	},
	easeInQuart: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t + b;
	},
	easeOutQuart: function (x, t, b, c, d) {
		return -c * ((t=t/d-1)*t*t*t - 1) + b;
	},
	easeInOutQuart: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t + b;
		return -c/2 * ((t-=2)*t*t*t - 2) + b;
	},
	easeInQuint: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t*t + b;
	},
	easeOutQuint: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t*t*t + 1) + b;
	},
	easeInOutQuint: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t*t + b;
		return c/2*((t-=2)*t*t*t*t + 2) + b;
	},
	easeInSine: function (x, t, b, c, d) {
		return -c * Math.cos(t/d * (Math.PI/2)) + c + b;
	},
	easeOutSine: function (x, t, b, c, d) {
		return c * Math.sin(t/d * (Math.PI/2)) + b;
	},
	easeInOutSine: function (x, t, b, c, d) {
		return -c/2 * (Math.cos(Math.PI*t/d) - 1) + b;
	},
	easeInExpo: function (x, t, b, c, d) {
		return (t==0) ? b : c * Math.pow(2, 10 * (t/d - 1)) + b;
	},
	easeOutExpo: function (x, t, b, c, d) {
		return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
	},
	easeInOutExpo: function (x, t, b, c, d) {
		if (t==0) return b;
		if (t==d) return b+c;
		if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
		return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
	},
	easeInCirc: function (x, t, b, c, d) {
		return -c * (Math.sqrt(1 - (t/=d)*t) - 1) + b;
	},
	easeOutCirc: function (x, t, b, c, d) {
		return c * Math.sqrt(1 - (t=t/d-1)*t) + b;
	},
	easeInOutCirc: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return -c/2 * (Math.sqrt(1 - t*t) - 1) + b;
		return c/2 * (Math.sqrt(1 - (t-=2)*t) + 1) + b;
	},
	easeInElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return -(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
	},
	easeOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;
	},
	easeInOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d/2)==2) return b+c;  if (!p) p=d*(.3*1.5);
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		if (t < 1) return -.5*(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
		return a*Math.pow(2,-10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )*.5 + c + b;
	},
	easeInBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*(t/=d)*t*((s+1)*t - s) + b;
	},
	easeOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
	},
	easeInOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		if ((t/=d/2) < 1) return c/2*(t*t*(((s*=(1.525))+1)*t - s)) + b;
		return c/2*((t-=2)*t*(((s*=(1.525))+1)*t + s) + 2) + b;
	},
	easeInBounce: function (x, t, b, c, d) {
		return c - jQuery.easing.easeOutBounce (x, d-t, 0, c, d) + b;
	},
	easeOutBounce: function (x, t, b, c, d) {
		if ((t/=d) < (1/2.75)) {
			return c*(7.5625*t*t) + b;
		} else if (t < (2/2.75)) {
			return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
		} else if (t < (2.5/2.75)) {
			return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
		} else {
			return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
		}
	},
	easeInOutBounce: function (x, t, b, c, d) {
		if (t < d/2) return jQuery.easing.easeInBounce (x, t*2, 0, c, d) * .5 + b;
		return jQuery.easing.easeOutBounce (x, t*2-d, 0, c, d) * .5 + c*.5 + b;
	}
});

/*
 *
 * TERMS OF USE - EASING EQUATIONS
 *
 * Open source under the BSD License.
 *
 * Copyright 짤 2001 Robert Penner
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 *
 * Redistributions of source code must retain the above copyright notice, this list of
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list
 * of conditions and the following disclaimer in the documentation and/or other materials
 * provided with the distribution.
 *
 * Neither the name of the author nor the names of contributors may be used to endorse
 * or promote products derived from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED
 * OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 */
/**
* 카테고리자동생성
* 제작 : 웹퍼블릭(http://webpublic.co.kr)
* 버전 : 2.4
* 최종업데이트 : 2018.06.08
* 디자인퍼블릭에서 개발된 플러그인으로 무단 복제/사용 하실 수 없습니다
* 주석제거 시 플러그인을 사용하실 수 없습니다.
*/
var _0x615b=["\x23\x63\x61\x74\x65\x67\x6F\x72\x79","\x2E\x63\x61\x74\x65\x2D\x6C\x69\x73\x74","\x65\x78\x74\x65\x6E\x64","\x69\x73\x4D\x61\x6B\x65\x43\x61\x74\x65\x4D\x65\x6E\x75","\x63\x61\x74\x65\x4D\x65\x6E\x75\x54\x61\x72\x67\x65\x74","\x69\x73\x4D\x61\x6B\x65\x41\x6C\x6C\x43\x61\x74\x65","\x61\x6C\x6C\x43\x61\x74\x65\x54\x61\x72\x67\x65\x74","\x2F\x65\x78\x65\x63\x2F\x66\x72\x6F\x6E\x74\x2F\x50\x72\x6F\x64\x75\x63\x74\x2F\x53\x75\x62\x43\x61\x74\x65\x67\x6F\x72\x79","\x6A\x73\x6F\x6E","\x6A\x64\x61\x74\x61","\x61\x6A\x61\x78","\x69\x6E\x69\x74","\x70\x72\x6F\x74\x6F\x74\x79\x70\x65","\x6D\x61\x6B\x65\x43\x61\x74\x65\x4D\x65\x6E\x75\x48\x74\x6D\x6C","\x6D\x61\x6B\x65\x41\x6C\x6C\x43\x61\x74\x65\x48\x74\x6D\x6C","\x68\x69\x64\x65\x5F\x63\x61\x74\x65\x5F\x6E\x6F","\x64\x61\x74\x61\x2D\x70\x61\x72\x61\x6D","\x61\x74\x74\x72","\x63\x61\x74\x65\x5F\x6E\x6F","\x67\x65\x74\x51\x75\x65\x72\x79\x53\x74\x72\x69\x6E\x67\x55\x72\x6C","\x6D\x61\x6B\x65\x43\x61\x74\x65\x4D\x65\x6E\x75\x43\x68\x69\x6C\x64\x4C\x69\x73\x74","\x3C\x64\x69\x76\x20\x63\x6C\x61\x73\x73\x3D\x27\x63\x6F\x6E\x74\x73\x27\x3E","\x3C\x2F\x64\x69\x76\x3E","\x61\x70\x70\x65\x6E\x64","\x2E\x62\x6F\x78","\x66\x69\x6E\x64","\x65\x61\x63\x68","\x64\x6C","\x64\x61\x74\x61\x2D\x6D\x61\x6E\x75\x61\x6C","\x6F\x6E","\x72\x65\x6D\x6F\x76\x65","\x2E\x73\x75\x62\x2D\x63\x61\x74\x65\x67\x6F\x72\x79","\x3C\x64\x69\x76\x20\x63\x6C\x61\x73\x73\x3D\x22\x73\x75\x62\x2D\x6C\x65\x66\x74\x22\x3E","\x70\x72\x65\x70\x65\x6E\x64","\x6C\x69","\x63\x68\x69\x6C\x64\x72\x65\x6E","","\x69\x73\x43\x68\x69\x6C\x64\x72\x65\x6E\x43\x61\x74\x65","\x3C\x75\x6C\x20\x63\x6C\x61\x73\x73\x3D\x27\x73\x75\x62\x30\x32\x20\x73\x75\x62\x30\x32\x5F","\x27\x3E","\x70\x61\x72\x65\x6E\x74\x5F\x63\x61\x74\x65\x5F\x6E\x6F","\x61\x72\x72\x6F\x77","\x3C\x6C\x69\x20\x63\x6C\x61\x73\x73\x3D\x22\x63\x61\x74\x65\x5F\x6E\x6F\x5F","\x20","\x22\x3E\x3C\x61\x20\x68\x72\x65\x66\x3D\x22\x2F","\x64\x65\x73\x69\x67\x6E\x5F\x70\x61\x67\x65\x5F\x75\x72\x6C","\x3F\x63\x61\x74\x65\x5F\x6E\x6F\x3D","\x22\x3E","\x6E\x61\x6D\x65","\x3C\x2F\x61\x3E","\x3C\x75\x6C\x20\x63\x6C\x61\x73\x73\x3D\x27\x73\x75\x62\x30\x33\x20\x73\x75\x62\x30\x33\x5F","\x3C\x75\x6C\x20\x63\x6C\x61\x73\x73\x3D\x27\x73\x75\x62\x30\x34\x20\x73\x75\x62\x30\x34\x5F","\x3C\x2F\x61\x3E\x3C\x2F\x6C\x69\x3E","\x3C\x2F\x75\x6C\x3E","\x3C\x2F\x6C\x69\x3E","\x3F","\x69\x6E\x64\x65\x78\x4F\x66","\x73\x75\x62\x73\x74\x72\x69\x6E\x67","\x26","\x73\x70\x6C\x69\x74","\x6C\x65\x6E\x67\x74\x68","\x3D","\x70\x61\x67\x65"];var _self=null;var makeCateList=function(_0xaf5ex3){_self= this;var _0xaf5ex4={isMakeCateMenu:true,cateMenuTarget:_0x615b[0],isMakeAllCate:true,allCateTarget:_0x615b[1]};var _0xaf5ex5=jQuery[_0x615b[2]](_0xaf5ex4,_0xaf5ex3);this[_0x615b[3]]= _0xaf5ex5[_0x615b[3]];this[_0x615b[4]]= _0xaf5ex5[_0x615b[4]];this[_0x615b[5]]= _0xaf5ex5[_0x615b[5]];this[_0x615b[6]]= _0xaf5ex5[_0x615b[6]];$[_0x615b[10]]({url:_0x615b[7],cache:false,dataType:_0x615b[8],timeout:10000,async:false,beforeSend:function(){},error:function(_0xaf5ex6,_0xaf5ex7,_0xaf5ex8){return},success:function(_0xaf5ex9){_self[_0x615b[9]]= _0xaf5ex9}});this[_0x615b[11]]()};makeCateList[_0x615b[12]][_0x615b[11]]= function(){if(_self[_0x615b[3]]){this[_0x615b[13]]()};if(_self[_0x615b[5]]){this[_0x615b[14]]()}};makeCateList[_0x615b[12]][_0x615b[14]]= function(){var _0xaf5exa=this[_0x615b[9]];var _0xaf5exb=this[_0x615b[15]];var _0xaf5exc;$(this[_0x615b[6]])[_0x615b[25]](_0x615b[27])[_0x615b[26]](function(_0xaf5exd){var _0xaf5exe=$(this);var _0xaf5exf=_self[_0x615b[19]](_0xaf5exe[_0x615b[17]](_0x615b[16]),_0x615b[18]);if(!_0xaf5exf){return};_0xaf5exc= _self[_0x615b[20]](_0xaf5exf);if(!_0xaf5exc){return};var _0xaf5ex10=_0x615b[21]+ _0xaf5exc+ _0x615b[22];_0xaf5exe[_0x615b[25]](_0x615b[24])[_0x615b[23]](_0xaf5ex10)})};makeCateList[_0x615b[12]][_0x615b[13]]= function(){var _0xaf5exa=this[_0x615b[9]];var _0xaf5exb=this[_0x615b[15]];var _0xaf5exc;$(this[_0x615b[4]])[_0x615b[35]](_0x615b[34])[_0x615b[26]](function(_0xaf5exd){var _0xaf5exe=$(this);var _0xaf5exf=_self[_0x615b[19]](_0xaf5exe[_0x615b[17]](_0x615b[16]),_0x615b[18]);if(!_0xaf5exf){return};_0xaf5exc= _self[_0x615b[20]](_0xaf5exf);var _0xaf5ex11=_0xaf5exe[_0x615b[17]](_0x615b[28]);if(!_0xaf5exc&& _0xaf5ex11!= _0x615b[29]){_0xaf5exe[_0x615b[25]](_0x615b[31])[_0x615b[30]]();return};_0xaf5exe[_0x615b[25]](_0x615b[31])[_0x615b[33]](_0x615b[32]+ _0xaf5exc+ _0x615b[22])})};makeCateList[_0x615b[12]][_0x615b[20]]= function(_0xaf5ex12){var _0xaf5ex13=_0x615b[36];var _0xaf5exa=_self[_0x615b[9]];if(_self[_0x615b[37]](_0xaf5ex12)){_0xaf5ex13+= _0x615b[38]+ _0xaf5ex12+ _0x615b[39];$(_0xaf5exa)[_0x615b[26]](function(_0xaf5ex14){if(_0xaf5exa[_0xaf5ex14][_0x615b[40]]== _0xaf5ex12){var _0xaf5ex15=false;var _0xaf5ex16=_0x615b[36];if(_self[_0x615b[37]](_0xaf5exa[_0xaf5ex14][_0x615b[18]])){_0xaf5ex15= true;_0xaf5ex16= _0x615b[41]};_0xaf5ex13+= _0x615b[42]+ _0xaf5exa[_0xaf5ex14][_0x615b[18]]+ _0x615b[43]+ _0xaf5ex16+ _0x615b[44]+ _0xaf5exa[_0xaf5ex14][_0x615b[45]]+ _0x615b[46]+ _0xaf5exa[_0xaf5ex14][_0x615b[18]]+ _0x615b[47]+ _0xaf5exa[_0xaf5ex14][_0x615b[48]]+ _0x615b[49];if(_0xaf5ex15){_0xaf5ex13+= _0x615b[50]+ _0xaf5exa[_0xaf5ex14][_0x615b[18]]+ _0x615b[39];$(_0xaf5exa)[_0x615b[26]](function(_0xaf5ex17){if(_0xaf5exa[_0xaf5ex17][_0x615b[40]]== _0xaf5exa[_0xaf5ex14][_0x615b[18]]){var _0xaf5ex18=false;var _0xaf5ex19=_0x615b[36];if(_self[_0x615b[37]](_0xaf5exa[_0xaf5ex17][_0x615b[18]])){_0xaf5ex18= true;_0xaf5ex19= _0x615b[41]};_0xaf5ex13+= _0x615b[42]+ _0xaf5exa[_0xaf5ex17][_0x615b[18]]+ _0x615b[43]+ _0xaf5ex19+ _0x615b[44]+ _0xaf5exa[_0xaf5ex14][_0x615b[45]]+ _0x615b[46]+ _0xaf5exa[_0xaf5ex17][_0x615b[18]]+ _0x615b[47]+ _0xaf5exa[_0xaf5ex17][_0x615b[48]]+ _0x615b[49];if(_0xaf5ex18){_0xaf5ex13+= _0x615b[51]+ _0xaf5exa[_0xaf5ex17][_0x615b[18]]+ _0x615b[39];$(_0xaf5exa)[_0x615b[26]](function(_0xaf5ex1a){if(_0xaf5exa[_0xaf5ex1a][_0x615b[40]]== _0xaf5exa[_0xaf5ex17][_0x615b[18]]){_0xaf5ex13+= _0x615b[42]+ _0xaf5exa[_0xaf5ex1a][_0x615b[18]]+ _0x615b[44]+ _0xaf5exa[_0xaf5ex14][_0x615b[45]]+ _0x615b[46]+ _0xaf5exa[_0xaf5ex1a][_0x615b[18]]+ _0x615b[47]+ _0xaf5exa[_0xaf5ex1a][_0x615b[48]]+ _0x615b[52]}});_0xaf5ex13+= _0x615b[53]};_0xaf5ex13+= _0x615b[54]}});_0xaf5ex13+= _0x615b[53]};_0xaf5ex13+= _0x615b[54]}});_0xaf5ex13+= _0x615b[53];return _0xaf5ex13}};makeCateList[_0x615b[12]][_0x615b[37]]= function(_0xaf5ex1b){var _0xaf5exa=_self[_0x615b[9]];var _0xaf5ex1c=false;$(_0xaf5exa)[_0x615b[26]](function(_0xaf5ex14){if(_0xaf5exa[_0xaf5ex14][_0x615b[40]]== _0xaf5ex1b){_0xaf5ex1c= true}});return _0xaf5ex1c};makeCateList[_0x615b[12]][_0x615b[19]]= function(_0xaf5ex1d,_0xaf5ex1e){if(!_0xaf5ex1d){return};var _0xaf5ex1f=_0xaf5ex1d[_0x615b[57]](_0xaf5ex1d[_0x615b[56]](_0x615b[55])+ 1);var _0xaf5ex20={};if(_0xaf5ex1f){var _0xaf5ex21=_0xaf5ex1f[_0x615b[59]](_0x615b[58]);var _0xaf5ex22=[];for(var _0xaf5ex14=0;_0xaf5ex14< _0xaf5ex21[_0x615b[60]];_0xaf5ex14++){_0xaf5ex22= _0xaf5ex21[_0xaf5ex14][_0x615b[59]](_0x615b[61]);_0xaf5ex20[_0xaf5ex22[0]]= _0xaf5ex22[1]}};_0xaf5ex20[_0x615b[62]]= _0xaf5ex20[_0x615b[62]]?_0xaf5ex20[_0x615b[62]]:1;return _0xaf5ex1e?_0xaf5ex20[_0xaf5ex1e]:_0xaf5ex20};
var wpMakeCate = new makeCateList({cateMenuTarget:'#category > ul', isMakeAllCate : false});


    if (!String.prototype.includes) {
        String.prototype.includes = function(search, start) {
            'use strict';

            if (search instanceof RegExp) {
                throw TypeError('first argument must not be a RegExp');
            }
            if (start === undefined) { start = 0; }
            return this.indexOf(search, start) !== -1;
        };
    }
/**
 * WEBPULIC COMMON SCRIPT

$(function() {
    const controller = new AbortController();
    const timeoutPromise = new Promise((resolve, reject) => {
        setTimeout(() => {
            controller.abort();
            reject(new Error('Request timed out'));
        }, 1000);
    });
    
    const fetchPromise = fetch('https://api.ip.pe.kr/json/', { signal: controller.signal });

    Promise.race([fetchPromise, timeoutPromise]).then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    }).then(data => {
        if ('182.214.94.112' != data.ip){
            $('body').text('페이지 접근 권한이 없습니다. (현재 페이지 수정 중입니다.)');
            return;
        }
    }).catch(error => {
        if (error.name === 'AbortError') {
            $('body').text('서버 상태가 확인되지 않습니다.');
        } else {
            console.error('Fetch error:', error);
        }
    });
});
*/
$(window).scroll(function(){
	var scrollTop = parseInt($(this).scrollTop());

	if (!$('#prdDetail').length > 0)
	{
		var innerTop = $('#header .cate-wrap').offset().top;
		if (scrollTop > innerTop){
			if (!$('#header').hasClass('fixed')) {
				$('#header').addClass('fixed');
				var logoWidth = $('#header .cate-wrap .logo-img img').width();
				$('#header .cate-wrap .logo-img').css('marginRight',50);
				$('#header .cate-wrap .logo-img').animate({
					width:logoWidth,
					}, 300,
				function(){
					$('#header .cate-wrap .logo-img').css('visibility','visible').animate({
						opacity:1,
					}, 600);
				});
			}
		}else{
			if ($('#header').hasClass('fixed')) {
				$('#header').removeClass('fixed');
				$('#header .cate-wrap .logo-img').stop().css({
					width : 0,
					marginRight : 0,
					opacity:0,
					visibility:'hidden',
				});
			}
		}
	}
});

$(document).ready(function(){

	copyright();
    
    // 검색창 자동완성 끄기
    $('#keyword').attr('autocomplete','off');

	// 리뷰 그리드 설정
	if (isReviewGridPage()){
		if (readCookie('gridTypePC')){
			$('.gridType dd').each(function(){
				$(this).removeClass('selected');
			});
			$('.gridType dd').each(function(){
				if ($(this).hasClass('g'+readCookie('gridTypePC'))){
					$(this).addClass('selected');
				}
			});

			var target = $('.gridType').data('target');
			var grids = ['grid0', 'grid1', 'grid2', 'grid3', 'grid4'];
			$(target).removeClass(grids.join(' '));
			$(target).addClass('grid'+readCookie('gridTypePC'));
		}
	}

	// 카테고리 경로 재설정
	$('.cate-override a').each(function(){
		var _self = $(this);
		var cateNo = getQueryStringUrl('cate_no',$(this).attr('href'));

		if (cateNo){
			$.each(setLink,function(i,v){
				if (parseInt(cateNo) == parseInt(i)){
					_self.attr('href',v);
				}
			});
		}
	});

	// 리뷰 경로 재설정
	$('.boardlink a').each(function(){
		var href = $(this).attr('href');
		if (href.indexOf('?') > -1){
			if (getQueryStringUrl('board_no',href) == '4'){
				$(this).attr('href', href.replace('/product/', '/review/'));
			}
		}else{

		}
	})
});

/************************************************************************************************************/

/* 기획전 파일 호출 시 도메인에 스킨폴더가 포함되어 있는지 확인*/
const extractSkinSkinNumber = () => {
    const pattern = /\/skin-skin(\d+)\//;
    const match = location.href.match(pattern);

    if (match) {
        return match[0].substring(0, match[0].length -1);
    } else {
        return '';
    }
}

/* JS/CSS 파일 호출 */
const importExternalFile = (src, type = 'SCRIPT', async = false) => new Promise((resolve, reject) => {
    let file = document.createElement(`${type}`);

    if (type == 'SCRIPT'){
        file.type = 'text/javascript';
        file.src = `${src}?d=${Date.now()}`;
        if (async) file.async = true;
    }

    if (type == 'CSS'){
        file.type = 'text/css';
        file.rel = 'stylesheet';
        file.href = `${src}?d=${Date.now()}`;
    }
    document.body.append(file);

    file.addEventListener('load', () => resolve(file));
    file.addEventListener('error', (err) => reject(err));
});


function copyright() {
	if($("body").size) {
		if($("body").attr("id") == "popup") { return ; }
		style = 'padding:5px 10px; font-family:Verdana; font-size:11px; background:#eee; color: #555; border-radius:5px;font-style:italic';
		console.log('%c ** DESIGNED BY WEBPUBLIC (https://webpublic.co.kr) **', style);
	}
}

function getQueryStringUrl(paramName, url) {
	if (url){
		var sURL = url;
	}else{
		var sURL = window.document.URL.toString();
	}

	if (sURL.indexOf("?") > 0)
	{
		var arrParams = sURL.split("?");
		var arrURLParams = arrParams[1].split("&");
		var arrParamNames = new Array(arrURLParams.length);
		var arrParamValues = new Array(arrURLParams.length);
		var i = 0;

		for (i=0;i<arrURLParams.length;i++)
		{
			var sParam =  arrURLParams[i].split("=");
			arrParamNames[i] = sParam[0];
			if (sParam[1] != "")
				arrParamValues[i] = unescape(sParam[1]);
			else
				arrParamValues[i] = "No Value";
		}

		for (i=0;i<arrURLParams.length;i++)
		{
			if(arrParamNames[i] == paramName){
				return arrParamValues[i];
			 }
		}

		return null;
	}
};

function createCookie(name, value, days) {
	var expires;

	if (days) {
		var date = new Date();
		date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
		expires = "; expires=" + date.toGMTString();
	} else {
		expires = "";
	}
	document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
}

function readCookie(name) {
	var nameEQ = escape(name) + "=";
	var ca = document.cookie.split(';');
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) === ' ') c = c.substring(1, c.length);
		if (c.indexOf(nameEQ) === 0) return unescape(c.substring(nameEQ.length, c.length));
	}
	return null;
}

function eraseCookie(name) {
	createCookie(name, "", -1);
}

// 할인율
var discountRate = function(t, name){
	if (!t) t = '';
	if (!name) name = '.discount_rate';
	$(t + ' .custom').each(function(){
		var price = $(this).text().replace(/[^0-9]/g,'');
		price = parseFloat(price);

		if (price > 0) $(this).show();
	});

	$(t + ' ' + name).each(function(){
		var custom_price = parseInt($(this).attr('data-prod-custom').replace(/[^0-9]/g,''));
		var prod_price = parseInt($(this).attr('data-prod-price').replace(/[^0-9]/g,''));

		var rate = 0;
		if (!isNaN(custom_price) && !isNaN(prod_price)) {
			rate = Math.round((custom_price - prod_price) / custom_price * 100);
		}
		$(this).text(rate + '');

		var $ds = $(this);

		$(this).parent().find('.spec li').each(function(){
			if ( $(this).find('.title span').text().trim() == '판매가' ){
				$(this).append($ds);
			}
		});
		if (rate <= 0 || isNaN(rate)){
			$(this).hide();
		}else{
			$(this).show();
		}
	});
}

function pageScroll(d){
	if($('html, body').is(':animated')){return};

	if (d == 'up') {
		$('html, body').stop().animate({scrollTop:0}, 'slow');
	} else if (d == 'down') {
		var btmTop = $(document).height() - $(window).height();
		$('html, body').stop().animate({scrollTop:btmTop}, 'slow');
	}
}
// select wrapping
//$('select').wrap('<div class="selectbox"></div>');


// 상세페이지, 리뷰목록 체크
function isReviewGridPage(){
	if ($('meta[name="path_role"]').attr('content') == 'PRODUCT_DETAIL'
		|| location.pathname.indexOf('/review/list') > -1){
		return true;
	}else{
		return false;
	}
}


jQuery11(document).on('click','.gridType dd a',function(){
    var li = $(this).parent();
	var item = li.siblings();
	var target = $(this).closest('dl').data('target');

	if (target){
		if ($(target).length == 0) return;
	}else{
		return;
	}

	$(item).each(function(){
		$(this).removeClass('selected');
	});

	li.addClass('selected');

	var $prdList = $(target);
	var grids = ['grid0', 'grid1', 'grid2', 'grid3', 'grid4'];

	$prdList.removeClass(grids.join(' '));

	if (li.hasClass('g0')){
		$prdList.addClass(grids[0]);
        if (isReviewGridPage()) createCookie('gridTypePC', 0);
	}

	if (li.hasClass('g1')){
		$prdList.addClass(grids[1]);
        if (isReviewGridPage()) createCookie('gridTypePC', 1);
	}

	if (li.hasClass('g2')){
		$prdList.addClass(grids[2]);
        if (isReviewGridPage()) createCookie('gridTypePC', 2);
	}

	if (li.hasClass('g3')){
		$prdList.addClass(grids[3]);
        if (isReviewGridPage()) createCookie('gridTypePC', 3);
	}

	if (li.hasClass('g4')){
		$prdList.addClass(grids[4]);
        if (isReviewGridPage()) createCookie('gridTypePC', 4);
	}
});


/**
* 상단 배너 플러그인
* 제작 : 웹퍼블릭(http://webpublic.co.kr)
* 버전 : 2.0
* 최종업데이트 : 2020.10.20
* 디자인퍼블릭에서 개발된 플러그인으로 무단 복제/사용 하실 수 없습니다
* 주석제거 시 플러그인을 사용하실 수 없습니다.
*/
$(document).ready(function(){
    var tbanner = new Swiper('#tbanner',{
        direction: 'vertical',
        speed: 500,
        autoplay : {
            delay:3000,
            disableOnInteraction: false,
        },
        loop:true,
        grabCursor: true,
    });
});

$(document).ready(function(){
    // 사이드 버튼 스크롤에 방향에 따른 show / hide
    var hideLimit = 150;

    $(window).scroll(function(){
        hasScrolled();
    });

    function hasScrolled() {
        var st = $(window).scrollTop();
        if (st > hideLimit){
            $('.side_bnr_wrap').addClass('active');
        } else {
            $('.side_bnr_wrap').removeClass('active');
        }
    }

    hasScrolled();
});
$(document).ready(function(){
    setTimeout(function(){
        $('#wrapper').removeClass('loading').css({
        	visibility:'visible',
            opacity:1,
        });
        $('.mul13').addClass('inactive');
    },0);
    
    jQuery11(document).on('transitionend','.mul13',function(){
        jQuery11(this).remove();
    });
});
