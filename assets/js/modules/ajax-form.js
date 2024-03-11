function objectifyFormArray(formArray) {
  var returnArray = {};
  for (var i = 0; i < formArray.length; i++) {
    returnArray[formArray[i]['name']] = formArray[i]['value'];
  }
  return returnArray;
}



jQuery(document).ready(($) => {
  const contactUsForm = $('#contact-form');
  const contactUsInput = document.querySelectorAll(
    '#contact-form div .data'
  );


  const contactUsFormSubmit = $('#contact-form #contact-form-submit');

  $(contactUsForm).on('submit', (e) => {
    e.preventDefault();

    

    $.ajax({
      url: cyn_head_script.url,
      type: 'post',
      cache: false,
        processData: false,
        contentType: false,
      data: {
        action: 'send_contact_form',
        _nonce: cyn_head_script.nonce,
        data: 'formData',
      },
      success: (res) => {
        console.warn(res);
        contactUsInput.forEach((el) => {
          el.value = '';
        });
        $(contactUsFormSubmit).text(' Send !');
        setTimeout(() => {
          $(contactUsFormSubmit).text('Send Massage ');
        }, 1000);
      },
      error: (err) => {
        console.error(err);
        $(contactUsFormSubmit).removeClass('pending');
        $(contactUsFormSubmit).addClass('error');
      },
    });
  });
});
