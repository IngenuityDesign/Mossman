/*!
 *
 *  Web Starter Kit
 *  Copyright 2014 Google Inc. All rights reserved.
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *    http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License
 *
 */
jQuery(function ($) {
  'use strict';

  var querySelector = document.querySelector.bind(document);

  var navdrawerContainer = $('.navdrawer-container');
  var body = $('body');
  var appbarElement = $('.app-bar');
  var menuBtn = $('.menu');
  var main = $('main');

  function closeMenu() {
    body.removeClass('open');
    navdrawerContainer.removeClass('open');
    menuBtn.removeClass('open');
  }

  function toggleMenu() {
    body.toggleClass('open');
    menuBtn.toggleClass('open');
    navdrawerContainer.toggleClass('open');
    navdrawerContainer.addClass('opened');
  }

  main.on('click', closeMenu);
  menuBtn.on('click', toggleMenu);
  navdrawerContainer.on('click', function (e) {
    closeMenu();
  });

});

jQuery(function($) {

    $.each($('.calendar td.active a'), function() {

        var content = '<h4>' + $(this).attr('title') + '</h4><p>' + $(this).attr('data-desc') + '</p>';

        $(this).qtip({ // Grab some elements to apply the tooltip to
            content: {
                text: content
            },
            style: {classes: 'calendar-qtip'},
            position: {
                my: 'bottom center',
                at: 'top center'
            },
            hide: {
                fixed: true,
                delay: 100,
                event: 'click mouseleave'
            },
            show: {
                solo: true
            },
            target: $(this)
        })

    });

    var sliders = $('.flexslider');
    sliders.each(function() {
       if ($(this).is('.gallery')) {

           $(this).flexslider({
               startAt: 1,

               prevText: "",           //String: Set the text for the "previous" directionNav item
               nextText: "",

               animation: "slide",
               controlNav: "thumbnails"
           });

       } else {

           $(this).flexslider({
               //minItems: 1,
               //maxItems: 3,

               //itemMargin: 0,
               //itemWidth: 400,

               controlsContainer: "",
               controlNav: false,

               startAt: 1,

               prevText: "",           //String: Set the text for the "previous" directionNav item
               nextText: ""
           });
       }
    });

    var navtabs = $('a', '.navtabs');
    navtabs.click(function() {
        var shows = $(this).attr('data-shows');
        var view_class = '.view-' + shows;
        $('.view', '.views').hide();

        $(view_class).show();
        navtabs.parent().removeClass('active');
        $(this).parent().addClass('active');
    });
})
