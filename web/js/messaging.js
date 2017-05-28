$(document).ready(function () {
  $('#messaging-form')
	  .find('.field-messaging-emails')
	  .find('.control-label')
	  .attr('for', 'checkall')
	  .prepend('<input type="checkbox" id="checkall" /> ');
  $('#checkall').click(function () {
    var checked = $(this).prop('checked');
    $('#messaging-emails')
	    .find('input:checkbox')
	    .prop('checked', checked);
  });
});