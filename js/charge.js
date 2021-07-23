// Set your publishable key: remember to change this to your live publishable key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
var stripe = Stripe('pk_test_51IPkLfI4w4xy133hW0jM1sklbTDpFU8dt4FrAOjHpCBwXSH59UPw1HHj06JzLDqJBo5rnKzjfUJBXtK9Se4UXK84002L27Qcjh');
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
var style = {
  base: {
    // Add your base input styles here. For example:
    fontSize: '16px',
    color: '#32325d',
  },
};

// Style button with BS
document.querySelector('#payment-form button').classList = 'btn btn-primary btn-block mt-4';

// Create an instance of the card Element.
// hidepostcode remove if want to input postal code
// var card = elements.create('card', {hidePostalCode: true, style: style}); 

// Add an instance of the card Element into the `card-element` <div>.
// card.mount('#card-element');


// Start Testing New Design


// Card number
        var card = elements.create('cardNumber', {
            'placeholder': 'Credit Card Number  xxxx - xxxx - xxxx - xxxx',
            'style': style
        });
        card.mount('#card-number');


// CVC
        var cvc = elements.create('cardCvc', {
            'placeholder': 'CVC Number',
            'style': style
        });
        cvc.mount('#card-cvc');


// Card expiry
        var exp = elements.create('cardExpiry', {
            'placeholder': 'Expiration Date',
            'style': style
        });
        exp.mount('#card-exp');

//End Testing New Design

// Create a token or display an error when the form is submitted.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the customer that there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}