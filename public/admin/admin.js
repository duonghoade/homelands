jQuery( function($)
{
  $("select#category").on("change",function() {
    var cat_id = $("select#category option:selected").val();
    var url = $("#get_subcategory_url").val();
    $.ajax({
      url: url,
      type: 'GET',
      data: {cat_id: cat_id},
      cache: false,
      success: function(response)
      {
        $model = $('#subcategory');
        $model.empty();
        $.each(response, function(index, element) {
          $model.append("<option value='" + element.id + "'>" + element.name + "</option>");
        });
      }
    });
  });
});
