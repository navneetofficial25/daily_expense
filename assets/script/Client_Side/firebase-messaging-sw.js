importScripts('https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.14.6/firebase-messaging.js');

console.log("hello india");

self.addEventListener('install', function(event) {
 console.log("sw installed");
});

self.addEventListener('fetch', function(event) {
 console.log("sw fecthed");
});

self.addEventListener('activate', function(event) {
 console.log("message activated");
});

self.addEventListener('message', function(event) {
 console.log("message arrived");
});

self.addEventListener('notificationclick', function(event) {
  const clickedNotification = event.notification;
  clickedNotification.close();
  console.log("message clicked");
  console.log(clickedNotification["data"]["FCM_MSG"]);
  clients.openWindow('save.php?message_id='+clickedNotification["data"]["FCM_MSG"]["data"]["gcm.notification.message_id"]+'&url='+clickedNotification["data"]["FCM_MSG"]["notification"].click_action);
  //const promiseChain = doSomething();
  //event.waitUntil(promiseChain);
});



var firebaseConfig = {
    apiKey: "AIzaSyCDpOW38IlpTt-hQU6gFtmphcZzQ-naArg",
    authDomain: "push-network-a8e95.firebaseapp.com",
    databaseURL: "https://push-network-a8e95.firebaseio.com",
    projectId: "push-network-a8e95",
    storageBucket: "push-network-a8e95.appspot.com",
    messagingSenderId: "612061583668",
    appId: "1:612061583668:web:d2567f116bdf3e03066d61",
    measurementId: "G-CJ3PC0900F"
};

firebase.initializeApp(firebaseConfig);
const messaging=firebase.messaging();

messaging.setBackgroundMessageHandler(function (payload) {
    console.log(payload);
    const notification=JSON.parse(payload);
    const notificationOption={
        body:notification.body,
        icon:notification.icon
    };
    return self.registration.showNotification(payload.notification.title,notificationOption);
});


