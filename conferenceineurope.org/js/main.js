$(document).ready(function(){$('.event-slider').slick({slidesToShow:1,slidesToScroll:1,autoplay:true,autoplaySpeed:3000,responsive:[{breakpoint:1024,settings:{slidesToShow:1,slidesToScroll:1,infinite:true,dots:true}},{breakpoint:991,settings:{slidesToShow:1,slidesToScroll:1}},{breakpoint:480,settings:{slidesToShow:1,slidesToScroll:1}}]});$('.partner-slide').slick({slidesToShow:5,slidesToScroll:1,autoplay:true,autoplaySpeed:2000,responsive:[{breakpoint:1024,settings:{slidesToShow:3,slidesToScroll:1,infinite:true,dots:true}},{breakpoint:991,settings:{slidesToShow:2,slidesToScroll:1}},{breakpoint:480,settings:{slidesToShow:1,slidesToScroll:1}}]});$('.service-slide').slick({slidesToShow:3,slidesToScroll:1,autoplay:true,autoplaySpeed:2000,responsive:[{breakpoint:1024,settings:{slidesToShow:3,slidesToScroll:1,infinite:true,dots:true}},{breakpoint:991,settings:{slidesToShow:2,slidesToScroll:1}},{breakpoint:480,settings:{slidesToShow:1,slidesToScroll:1}}]});});