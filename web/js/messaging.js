$(document).ready(function () {
  $('#messaging-form')
	  .find('.field-messaging-emails')
	  .find('.control-label')
	  .append(' <input type="checkbox" id="checkall" /><label for="checkall">Выбрать все</label>');
  $('#checkall').click(function () {
    var checked = $(this).prop('checked');
    $('#messaging-emails').find('input:checkbox').prop('checked', checked);
  });
});