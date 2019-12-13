//główna funkcja zawierająca klasy jQuery
function slideSwitch() {
    var $active = $('#slideshow IMG.active');
    if ($active.length === 0)
        $active = $('#slideshow IMG:last');
    var $next = $active.next().length ? $active.next()
            : $('#slideshow IMG:first');
    $active.addClass('last-active');
    $next.css({opacity: 0.0})
            .addClass('active')
            .animate({opacity: 1.0}, 1000, function () {
                $active.removeClass('active last-active');
            });
}
//ustawia interwał dla funkcji slideSwitch
$(function () {
    setInterval("slideSwitch()", 5000);
});
//funkcje ukazujące gwiazdki po 1, 2, 3, 4 i 5 sekundach
function showStar1() {
    $('.s1').fadeIn(1000);
}
function showStar2() {
    $('.s2').fadeIn(2000);
}
function showStar3() {
    $('.s3').fadeIn(3000);
}
function showStar4() {
    $('.s4').fadeIn(4000);
}
function showStar5() {
    $('.s5').fadeIn(5000);
}
//funkcja odpowiedzialna za znikanie i pojawianie się gwiazdek
$(function () {
    setTimeout(function () {
        $('.icon-star-slide').fadeOut(1000);
    }, 1000);
    setInterval("showStar1()", 1000);
    setInterval("showStar2()", 1000);
    setInterval("showStar3()", 1000);
    setInterval("showStar4()", 1000);
    setInterval("showStar5()", 1000);
    setInterval("$('.icon-star-slide').fadeOut(1000)", 7000);
});
