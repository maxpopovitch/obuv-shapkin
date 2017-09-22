$(document).ready(function () {
  var saleAlert = $('#sale-alert');

  if (!localStorage.getItem('hideSaleAlert')) {
    saleAlert.show();
  }

  saleAlert.find('.close').on('click', function() {
    !localStorage.setItem('hideSaleAlert', true);
  });
});