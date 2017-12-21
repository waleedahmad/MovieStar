$(function ($) {
    "use strict";
    let options = {offset: 600, classes: {clone: 'banner--clone', stick: 'banner--stick', unstick: 'banner--unstick'}};
    let banner = new Headhesive('.navbar', options);
    $('.bs-carousel').carousel({interval: 10000, pause: "hover"});
    if ($(".tabs").length > 0) {
        $('.tabs').tabs();
        $('.tabs.movies').tabs({active: 2});
    }
    if ($(".accordion").length > 0) {
        $('.accordion').accordion();
    }
    $('.venobox').venobox({autoplay: true});
    $('.social-share').click(function (event) {
        $(this).find('a').hide();
        $('.social-share .share').fadeIn('slow');
        $('.social-share .share a').fadeIn('slow');
        return false;
    });
    $(window).on('load resize scroll', function () {
        $('#newIn').not('.slick-initialized').slick({
            autoplay: false,
            autoplaySpeed: 3000,
            slidesToShow: 4,
            centerPadding: '60px',
            prevArrow: '<i class="material-icons left">keyboard_arrow_left</i>',
            nextArrow: '<i class="material-icons right">keyboard_arrow_right</i>',
            responsive: [{breakpoint: 768, settings: {slidesToShow: 2}}, {breakpoint: 480, settings: {slidesToShow: 1}}]
        });
        $('#comingSoon').not('.slick-initialized').slick({
            autoplay: false,
            slidesToShow: 6,
            centerPadding: '60px',
            prevArrow: '<i class="material-icons left">keyboard_arrow_left</i>',
            nextArrow: '<i class="material-icons right">keyboard_arrow_right</i>',
            responsive: [{breakpoint: 1024, settings: {slidesToShow: 4}}, {
                breakpoint: 768,
                settings: {slidesToShow: 3}
            }, {breakpoint: 480, settings: {slidesToShow: 2}}]
        });
        $('.gallery').not('.slick-initialized').slick({
            autoplay: false,
            slidesToShow: 6,
            centerPadding: '60px',
            prevArrow: '<i class="material-icons left">keyboard_arrow_left</i>',
            nextArrow: '<i class="material-icons right">keyboard_arrow_right</i>',
            responsive: [{breakpoint: 1024, settings: {slidesToShow: 4}}, {
                breakpoint: 768,
                settings: {slidesToShow: 3}
            }, {breakpoint: 480, settings: {slidesToShow: 2}}]
        });
        $('.news-carousel').not('.slick-initialized').slick({
            autoplay: false,
            autoplaySpeed: 3000,
            slidesToShow: 3,
            centerPadding: '60px',
            prevArrow: '<i class="material-icons left">keyboard_arrow_left</i>',
            nextArrow: '<i class="material-icons right">keyboard_arrow_right</i>',
            responsive: [{breakpoint: 768, settings: {slidesToShow: 2}}, {breakpoint: 480, settings: {slidesToShow: 1}}]
        });
    });
    let $nav = $('.nav').height();
    $('.nav').css('margin-top', -$nav / 2);
    $(window).on('load resize scroll', function () {
        let $heading = $('.wrapper .heading').outerHeight();
        let $navbar = $('.wrapper .navbar-header').outerHeight();
        $('#hero .item, #hero.single-page .blurb, #hero.error-page .container').css('padding-top', $heading + $navbar);
        let $window = $(window).height();
        $('#hero').css('height', window.innerHeight - 50);
        $('#hero.error-page').css('height', window.innerHeight);
    });

    let $rows = $('.movie-tabs');
    $('#search').keyup(function () {
        let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
        $rows.show().filter(function () {
            let text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
    $('.single-slide').first().css({
        opacity: '1',
        height: 'auto',
        paddingBottom: '40px'
    }).siblings('.single-slide').css({opacity: '0', height: '0', paddingBottom: '0'});
    $('#comingSoon div').first().css('opacity', '1').siblings().css('opacity', '.35');
    $('#comingSoon div').click(function () {
        let currentClass = $(this).data("dynamicclass");
        $("div." + currentClass).css({
            opacity: '1',
            height: 'auto',
            paddingBottom: '40px'
        }).siblings('.single-slide').css({opacity: '0', height: '0', paddingBottom: '0'});
        $(this).css('opacity', '1').siblings().css('opacity', '.35');
        return false;
    });
});