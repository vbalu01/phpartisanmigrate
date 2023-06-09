'use strict';
var tinderContainer = document.querySelector('.tinder');
var allCards = null;
var nope = document.getElementById('nope');
var accept = document.getElementById('accept');

setTimeout("first()", 2000);
let choose=false;
function first() {
    allCards= document.querySelectorAll('.tinder--card');
    initCards();
    allCards.forEach(function (el) {
        var hammertime = new Hammer(el);

        hammertime.on('pan', function (event) {
          el.classList.add('moving');
        });

        hammertime.on('pan', function (event) {
          if (event.deltaX === 0) return;
          if (event.center.x === 0 && event.center.y === 0) return;

          tinderContainer.classList.toggle('tinder_accept', event.deltaX > 0);
          tinderContainer.classList.toggle('tinder_nope', event.deltaX < 0);
          if (event.deltaX > 0) {
            choose=true;
          }else
          {
            choose=false;
          }

          var xMulti = event.deltaX * 0.03;
          var yMulti = event.deltaY / 80;
          var rotate = xMulti * yMulti;

          event.target.style.transform = 'translate(' + event.deltaX + 'px, ' + event.deltaY + 'px) rotate(' + rotate + 'deg)';
        });

        hammertime.on('panend', function (event) {
          el.classList.remove('moving');
          tinderContainer.classList.remove('tinder_accept');
          tinderContainer.classList.remove('tinder_nope');

          var moveOutWidth = document.body.clientWidth;
          var keep = Math.abs(event.deltaX) < 80 || Math.abs(event.velocityX) < 0.5;
          var cards = document.querySelectorAll('.tinder--card:not(.removed)');
          event.target.classList.toggle('removed', !keep);

          if (keep) {
            event.target.style.transform = '';
          } else {
            var endX = Math.max(Math.abs(event.velocityX) * moveOutWidth, moveOutWidth);
            var toX = event.deltaX > 0 ? endX : -endX;
            var endY = Math.abs(event.velocityY) * moveOutWidth;
            var toY = event.deltaY > 0 ? endY : -endY;
            var xMulti = event.deltaX * 0.03;
            var yMulti = event.deltaY / 80;
            var rotate = xMulti * yMulti;

            event.target.style.transform = 'translate(' + toX + 'px, ' + (toY + event.deltaY) + 'px) rotate(' + rotate + 'deg)';
            if (choose) {

                var card = cards[0];
                console.log( "igen");
                if(card.getAttribute("value"))
                 {
                     acceptJob(card.getAttribute("value"));
                 }
            }
            setTimeout(2);
            initCards();
          }
        });
      });
}

function initCards(card, index) {
  var newCards = document.querySelectorAll('.tinder--card:not(.removed)');

  newCards.forEach(function (card, index) {
    card.style.zIndex = allCards.length - index;
    card.style.transform = 'scale(' + (20 - index) / 20 + ') translateY(-' + 30 * index + 'px)';
    card.style.opacity = (10 - index) / 10;
  });

  tinderContainer.classList.add('loaded');
}





function createButtonListener(accept) {
  return function (event) {
    var cards = document.querySelectorAll('.tinder--card:not(.removed)');
    var moveOutWidth = document.body.clientWidth * 1.5;

    if (!cards.length) return false;

    var card = cards[0];

    card.classList.add('removed');

    if (accept) {
      card.style.transform = 'translate(' + moveOutWidth + 'px, -100px) rotate(-30deg)';
       console.log( "igen");
       if(card.getAttribute("value"))
        {
            acceptJob(card.getAttribute("value"));
        }
    } else {
      card.style.transform = 'translate(-' + moveOutWidth + 'px, -100px) rotate(30deg)';
      console.log( "nem");
    }

    initCards();

    event.preventDefault();
  };
}

var nopeListener = createButtonListener(false);
var acceptListener = createButtonListener(true);

nope.addEventListener('click', nopeListener);
accept.addEventListener('click', acceptListener);

function acceptJob(orderID) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            type: "POST",
            url: '/Dashboard/Courier/acceptOrder',
            data:
            {
                orderID:orderID,
            },
            async: false,
            success: function(response){
                if (response=="Ok") {
                    location.replace("/Dashboard/Courier/OngoingDelivery");
                }
            }
        });
}


navigator.serviceWorker.register('../serviceWorker.js', {
    scope: "/",
  });
function requestPermission() {
    Notification.requestPermission().then((permission) => {
        if (permission === 'granted') {
            console.log("granted");
            // get service worker
            console.log( navigator.serviceWorker.ready);
            navigator.serviceWorker.ready.then((sw) =>{
                console.log("sunscribing");
                // subscribe
                sw.pushManager.subscribe({
                    userVisibleOnly: true,
                    applicationServerKey:"BDXLfLM4pXv3_ChmODNsXTk7E6YR8ZSE9lXe3XMWmjiI_9GQTrsoJeZq0Htzv3pnoBrq0g5iGOsvMaXJBXG5Gjk"
                }).then((subscription) => {
                    console.log("sunscribed");
                    // subscription successful
                    fetch("/api/push-subscribe", {
                        method: "post",
                        body:JSON.stringify(subscription)
                    }).then( alert("ok") );
                });
            });
        }
    });
}
function unsub() {
    Notification.requestPermission().then((permission) => {
        if (permission === 'granted') {
            console.log("granted");
            // get service worker
            console.log( navigator.serviceWorker.ready);
            navigator.serviceWorker.ready.then((sw) =>{
                console.log("unsunscribing");
                sw.pushManager.getSubscription().then((subscription) => {
                    console.log("unsunscribed");
                    // subscription successful
                    fetch("/api/push-unsubscribe", {
                        method: "post",
                        body:JSON.stringify(subscription)
                    }).then( alert("ok") );
                });
            });
        }
    });
}


$(document).ready(function() {
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $.ajax({
        type: "POST",
        url: '/Dashboard/Courier/getorders',
        async: false,
        success: function(response){
            const obj = JSON.parse(response);
            console.log(obj);
            obj.forEach(element => {
                if (element.multiplaceCount>1) {
                    $( "#cards" ).append(
                    "<div class='tinder--card' value='"+element.orderID+"'>"+
                        "<h3>"+element.multiplaceCount+" Felvételi pont</h3>"+
                        "<h3>Kiszállítás: </h3>"+
                        "<h3>"+element.u_fullname +"</h3>"+
                        "<h4>Szállítási cím: "+element.userAddr+"</h4>"+
                    "</div>");

                }if (element.multiplaceCount==1) {
                    getDetailedOrder(element.orderID);
                }

            });
        }
    });


});

function getDetailedOrder(orderID) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
    $.ajax({
    type: "POST",
    url: '/Dashboard/Courier/getdetailedorder',
    data:
    {
        orderID:orderID,
    },
    async: false,
    success: function(response){
        const obj = JSON.parse(response);
        console.log(obj);
            $( "#cards" ).append(
            "<div class='tinder--card' value='"+obj.orderID+"'>"+
                "<h3>Felvételi üzlet: </h3>"+
                "<h3>"+obj.r_name+"</h3>"+
                "<h4>Felvételi cím: "+obj.restAddr+"</h3>"+
                "<h3>Kiszállítás: </h3>"+
                "<h3>"+obj.u_fullname +"</h3>"+
                "<h4>Szállítási cím: "+obj.userAddr+"</h4>"+
                "<p>Termék: "+obj.f_name+"</p>"+
            "</div>");
    }
})
};
