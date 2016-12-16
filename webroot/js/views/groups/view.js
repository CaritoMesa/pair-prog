$(document).ready(function(){
  $('#group-name').live('change', function() {
    if($(this).val().length != 0) {
      $.getJSON('/Groups/get_participants_ajax',
                  {groupId: $(this).val()},
                  function(participants) {
                    if(participants !== null) {
                      populateCarModelList(participants);
                    }
        });
      }
    });
});

function populateCarModelList(participants) {
  var options = '';

  $.each(participants, function(index, Users) {
    options += '<option value="' + index + '">' + Users + '</option>';
  });
  $('#user-name').html(options);
  $('#participants').show();

}