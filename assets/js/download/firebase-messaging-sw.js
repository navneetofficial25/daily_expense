importScripts('https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.14.6/firebase-messaging.js');



self.addEventListener('notificationclick', function(event) {
  const clickedNotification = event.notification;
  const message_id = clickedNotification["data"]["FCM_MSG"]["data"]["gcm.notification.message_id"];

      fetch('https://pushworld.tk/api/click_count/'+message_id, {  
         method: 'GET'
    }).then(function(response) {        
      //
    }).catch(function(err) {    
      //   
    });
   

});

var firebaseConfig = {
  apiKey: "AIzaSyCbxAtDiTrszVwY7UWAi1tccIIDyQsVYSg",
  authDomain: "notification-28a71.firebaseapp.com",
  databaseURL: "https://notification-28a71.firebaseio.com",
  projectId: "notification-28a71",
  storageBucket: "notification-28a71.appspot.com",
  messagingSenderId: "741316863024",
  appId: "1:741316863024:web:c6cfbf1a5fdf415c8ef9f5",
  measurementId: "G-1TTN33N11P"
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
