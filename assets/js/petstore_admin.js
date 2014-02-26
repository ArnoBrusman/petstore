jQuery(document).ready(function($) {

    if ($('.display_table').length !== 0) {
        var table = $('.display_table').attr('js_table');
        var replace_table = function(data) {
            $('.display_table').html(data);
            if ($('.order_links').length !== 0) {
                set_links();
            }
            if ($('.pagination').length !== 0) {
                set_pagination();
            }
        };
        if ($('.order_links').length !== 0) {
            set_links = function() {
                var that = $('.order_by');
                that.click(function(e) {
                    e.preventDefault();
                    $.post('admin/' + table + '/get_table', {
                        order: $(this).attr('js_order'),
                        keep_data: true
                    }, function(data) {
                        replace_table(data);
                    });
                });
            };
            set_links();
            if ($('.pagination').length !== 0) {
                var set_pagination = function() {
                    $('.gotopage').click(function(e) {
                        e.preventDefault();
                        $.post('admin/' + table + '/get_table', {
                            page: $(this).attr('js_page'),
                            keep_data: true
                        }, function(data) {
                            replace_table(data);
                        });
                    });
                };
                set_pagination();
            }
        }

        var search_table = function(form) {
            $.ajax({
                data: form.serialize(), // get the form data
                type: form.attr('method'), // GET or POST
                url: 'admin/' + table + '/get_table', // the file to call
                success: function(response) { // on success..
                    $('.display_table').html(response); // update the DIV
                    set_links(table);
                }
            });
        };
    }

    if ($('#petsearch').length !== 0) {
        $('#petsearch .term').groupedSearch({source: 'ajax/get_pets', minLength: 2, category_field: '#petsearch .field'});
        $('#petsearch').submit(function(e) {
            e.preventDefault();
            search_table($(this));
        });
    }
    if ($('#ordersearch').length !== 0) {
        $('#ordersearch .term').groupedSearch({source: 'ajax/get_orders', minLength: 2, category_field: '#ordersearch .field'});
        $('#ordersearch').submit(function(e) {
            e.preventDefault();
            search_table($(this), 'order');
        });
    }
    if ($('#customersearch').length !== 0) {
        $('#customersearch .term').groupedSearch({source: 'ajax/get_customers', minLength: 2, category_field: '#customersearch .field'});
        $('#customersearch').submit(function(e) {
            e.preventDefault();
            search_table($(this), 'customer');
        });
    }
    if ($('.search_species').length !== 0) {
        $('.search_species').autocomplete({source: 'ajax/get_ac_data/species', minLength: 1});
    }
    if ($('.search_race').length !== 0) {
        $('.search_race').autocomplete({source: 'ajax/get_ac_data/race', minLength: 2});
    }

    if ($('.validation_form').length !== 0) {
        $('.validation_form').validationEngine();
    }

    if ($('.js_delete').length !== 0) {
        $('.js_delete').fancybox({
            type: 'ajax',
            fitToView: false,
            width: 'auto',
            minHeight: 30,
            height: 30,
            autoSize: false
        });
    }

    if ($('.advanced_options').length !== 0) {
        var jq_adv_show_hide = $(this).find('.show_hide');
        var jq_adv_option = $(this).find('.hidden');
        var adv_options_hidden = 1;
        toggle_adv_options = function() {
            if (adv_options_hidden) {
                jq_adv_option.css('display', 'block');
                jq_adv_show_hide.html('hide');
            } else {
                jq_adv_option.css('display', 'none');
                jq_adv_show_hide.html('show');
            }
            adv_options_hidden = adv_options_hidden ^ 1;
        };
        $(this).find('.advanced_show').click(function(e) {
            e.preventDefault();
            toggle_adv_options();
        });
    }

    //tinymce
    if ($('.tinymce').length !== 0) {
        tinymce.init({
            selector: ".tinymce"
        });
    }

    if ($('.edit_row').length !== 0) {
        $('.edit_row').click(function(e) {
            e.preventDefault();
            var jq_row = $(this).parents('.row')
            edit_row(jq_row);
        });
    }
    if ($('.edit_image').length !== 0) {
        $('.edit_image').fancybox({
            type: 'ajax',
            fitToView: false,
            width: '80%',
            height: '100%',
            autoSize: false,
            afterLoad: function() {
            }
        });
    }
    if ($('.save_row').length !== 0) {
        $('.save_row').click(function(e) {
            e.preventDefault();
            var jq_row = $(this).parents('.row');
            save_row(jq_row);
        });
    }

    if ($('.button.submit').length !== 0) {
        $('.button.submit').click(function(e) {
            e.preventDefault();
            $(this).parent('form').submit();
        });
    }

    function edit_row(jq_row) {
        var jq_col2 = jq_row.children('.col2');
        var jq_col3 = jq_row.children('.col3');
        var contents = jq_col2.contents().text();
        jq_col2.find('.value_display').attr('hidden', '');
        jq_col2.find('.value_input').removeAttr('hidden');
        jq_col3.find('.edit_row').attr('hidden', '');
        jq_col3.find('.save_row').removeAttr('hidden');
    }

    function save_row(jq_row) {
        var jq_col2 = jq_row.children('.col2');
        var jq_col3 = jq_row.children('.col3');
        var contents = jq_col2.find('.value_input').val();
        var col_name = jq_col2.find('.col_name').val();

        jq_col2.find('.value_input').attr('hidden', '');
        jq_col2.find('.value_display').text(contents);
        jq_col2.find('.value_display').removeAttr('hidden');
        jq_col3.find('.save_row').attr('hidden', '');
        jq_col3.find('.edit_row').removeAttr('hidden');
    }

    if ($('.fancy-img').length !== 0) {
        $('.fancy-img').fancybox();
    }

});
