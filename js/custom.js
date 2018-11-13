(function ($, Drupal) {
  'use-strict';

  //console.log(document.location);
  //console.log(Drupal);
  Drupal.behaviors.ethno_clear_empty_field_group_accordions = {
    attach: function (context, settings) {
      $.each($(".field-group-accordion-wrapper"), function(index, element) {
        //console.log(element);
        var has_children = $('.ui-accordion-content', element).children();
        //console.log(has_children);
        if (has_children.length <= 0) {
          element.remove();
        }
      });
    }
  };
})(jQuery, Drupal);
