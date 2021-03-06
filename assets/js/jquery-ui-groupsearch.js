//categorized autocomplete add-on
$.widget('custom.groupedSearch', $.ui.autocomplete, {
    _renderMenu: function(ul, items)
    {
        var currentCategory = "";
        var that = this;
        $.each(items, $.proxy(function(index, item)
        {
            // evaluate the category and render an LI tag
            if (item.category !== currentCategory)
            {
                ul.append("<li class='ui-autocomplete-category'>" + item.category + "</li>");
                currentCategory = item.category;
            }

//                // render the item (this returns the LI DOMNode instance)
            var li = that._renderItemData(ul, item);
            li.attr('category',item.category);
        }, this));
    },
    _menuselect: function(item) {
        this._value( item.value );
        if(this.options.category_field) {
            $(this.options.category_field).attr('value', item.field);
        }
    }
});