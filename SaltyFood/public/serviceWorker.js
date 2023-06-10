self.addEventListener("push", (event) => {

    notification = event.data.json();
    // { "title":"Hi" , "body":"check this out" , "url":"/?message1"}
    event.waitUntil(self.registration.showNotification(notification.title , {
        body: notification.body ,
        icon: "/img/neworder.png" ,
        data: {
            notifURL: notification.url
        }
    }));
});

self.addEventListener("notificationclick",  (event) => {

    event.waitUntil(clients.openWindow(event.notification.data.notifURL));

});
