jQuery(document).ready(function($) {

    if ($('.add_to_basket').length !== 0) {
        $('.add_to_basket').click(function(e) {
            e.preventDefault();
            var pet_id = $(this).attr('petid');
            $.post('order/add_pet', {
                'add_pet': pet_id
            }, function(data) {
                window.location = "order/basket";
            });
        });
    }

    if ($('#petsearch').length !== 0) {
        $('#petsearch').groupedSearch({source: function(request, response) {
                $.ajax({
                    url: "ajax/get_pets",
                    dataType: "json",
                    type: "POST",
                    data: {
                        term: request.term
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            }, minLength: 2, category_field: '#petsearch_field'}
        );
    }

    if ($('.button.submit').length !== 0) {
        $('.button.submit').click(function(e) {
            e.preventDefault();
            $(this).parent('form').submit();
        });
    }
    
    //fancybox on images
    if ($('.fancy-img').length !== 0) {
        $('.fancy-img').fancybox();
    }
    
    if($('.pet_images').length !== 0)  {
        var jcarousel = $('.pet_images');

        jcarousel
                .on('jcarousel:reload jcarousel:create', function () {
                var width = jcarousel.innerWidth();

                if (width >= 900) {
                    width = width / 6;
                } else if (width >= 750) {
                    width = width / 5;
                } else if (width >= 600) {
                    width = width / 4;
                } else if (width >= 450) {
                    width = width / 3;
                } else if (width >= 300) {
                    width = width / 2;
                }

                jcarousel.jcarousel('items').css('width', width + 'px');
            })
            .jcarousel({
                wrap: 'circular'
            });

        $('.jcarousel-control-prev')
            .jcarouselControl({
                target: '-=1'
            });

        $('.jcarousel-control-next')
            .jcarouselControl({
                target: '+=1'
            });

        $('.jcarousel-pagination')
            .on('jcarouselpagination:active', 'a', function() {
                $(this).addClass('active');
            })
            .on('jcarouselpagination:inactive', 'a', function() {
                $(this).removeClass('active');
            })
            .on('click', function(e) {
                e.preventDefault();
            })
            .jcarouselPagination({
                perPage: 1,
                item: function(page) {
                    return '<a href="#' + page + '">' + page + '</a>';
                }
            });
    }
});