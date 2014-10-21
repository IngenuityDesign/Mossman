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

        var content = '<h4><a href=" ' + $(this).attr('href') + '">' + $(this).attr('title') + '</a></h4><p>' + $(this).attr('data-desc') + '</p>';

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

    var photosLink = $('#nav-photos-show');
    var raceDayLink = $('#nav-race-day');
    var rulesSafetyLink = $('#nav-rules-safety');
    var keyInfoLink = $('#nav-key-info');
    var travelLink = $('#nav-travel');
    var panels = $('section.subsection');

    var defaultClick = function(e) {
        panels.hide();
        if (e.prop('tagName')) {
            $('.current_page_item').removeClass('current_page_item');
            e.parent().addClass('current_page_item');
        }

    }

    var showRaceday = function() {
        defaultClick($(this));
        $('.event_race_day').show();
    };

    if (raceDayLink) {
        raceDayLink.click(showRaceday);
    }

    var showPhotos = function() {
        defaultClick($(this));
        $('.gallery').show();
    }

    if (photosLink) {
        photosLink.click(showPhotos);
    }

    var showRules = function() {
        defaultClick($(this));
        $('.event_rules_safety').show();
    };

    if (rulesSafetyLink) {
        rulesSafetyLink.click(showRules);
    }

    var showKeyinfo = function() {
        defaultClick($(this));
        $('.info').show();
    };

    if (keyInfoLink) {
        keyInfoLink.click(showKeyinfo);
    }

    var showTravel = function() {
        defaultClick($(this));
        $('.event_travel').show();
    };

    if (travelLink) {
        travelLink.click(showTravel);
    }

    panels.not('.info').hide();

    //check if there is a hash
    var hash = document.location.hash || false;
    if (hash) {
        switch (hash) {
            case '#raceday':
                raceDayLink.parent().addClass('current_page_item');
                showRaceday();
                break;
            case '#rules':
                rulesSafetyLink.parent().addClass('current_page_item');
                showRules();
                break;
            case '#travel':
                travelLink.parent().addClass('current_page_item');
                showTravel();
                break;
            case '#photos':
                showPhotos();
                break;
            default:
                keyInfoLink.parent().addClass('current_page_item');

        }
    }

    window.setTimeout(function() {
        $('article.gallery').hide();
    }, 1000);
});
