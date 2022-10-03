/*

$(function() {
    $('.php-email-form').submit(function(event) {
      event.preventDefault(); // Prevent the form from submitting via the browser
      var form = $(this);
      $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: form.serialize()
      }).done(function(data) {  

        alert('Message Sent Successfully!!!');
       // .querySelector('.sent-message').classList.add('d-block');
        // Optionally alert the user of success here...
      }).fail(function(data) {
        // Optionally alert the user of an error here...
      });
    });
  });

  

  $(".php-email-form").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var actionUrl = form.attr('action');
    
    $.ajax({
        type: "POST",
        url: actionUrl,
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {
          alert("Message sent"); // show response from the php script.
        }
    });
    
});

*/

form.addEventListener('submit', (event) => {

    let formData = new FormData(form);

    // disable default action
    event.preventDefault();
    
    // make post request
    fetch('https://rdenv.ml/mail.php', {
        method: 'POST',
        body: formData,
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        }
    })
    .then(response => {
        if( response.ok ) {
          return response.text()
        } else {
          throw new Error(`${response.status} ${response.statusText} ${response.url}`); 
        }
      })


        .then(data => {
      thisForm.querySelector('.loading').classList.remove('d-block');
      if (data.trim() == 'OK') {
        thisForm.querySelector('.sent-message').classList.add('d-block');
        thisForm.reset(); 
      } else {
        throw new Error(data ? data : 'Form submission failed and no error message returned from: ' + action); 
      }
    })
    .catch(err => console.error(err));
});