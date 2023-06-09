'use strict';
var nope = document.getElementById('nope');
var accept = document.getElementById('accept');
var card=document.getElementById("card");
function createButtonListener(done) {
    return function (event) {
    console.log( card.getAttribute("value"));
    if(card.getAttribute("value"))
    {
    if (done) {
        updateDelivery(card.getAttribute("value"),true);
      } else {
        updateDelivery(card.getAttribute("value"),false);
      }
    }
    event.preventDefault();
}

}

var nopeListener = createButtonListener(false);
var acceptListener = createButtonListener(true);

nope.addEventListener('click', nopeListener);
accept.addEventListener('click', acceptListener);




function updateDelivery(orderid,completed) {
    var a=0;
    if (completed) {
        a=1;
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            type: "POST",
            url: '/Dashboard/Courier/updateDelivery',
            data:
            {
                completed:a,
                orderID:orderid,
            },
            async: false,
            success: function(response){
                if (response=="Ok") {
                    location.replace("/Dashboard/Courier");
                }
            }
        });
}
