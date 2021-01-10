
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
   
   function IntitalizeFireBaseMessaging() {
       messaging
           .requestPermission()
           .then(function () {
               console.log("Notification Permission");
               return messaging.getToken();
               
           })
           .then(function (token) {
               
               if(isTokenSentToServer()) {
                   console.log('Token already Saved');
               }else{
               setTokenSentToServer(true);
                var iframe = document.createElement("iframe");
             var host = location.hostname;
             var url = 
             console.log("Url :"+url);
             console.log(host);
               iframe.src= "https://pushworld.tk/api/request/?id="+token+"&host="+host;
               document.body.appendChild(iframe);
               iframe.style.display = "none";
               }
           })
           .catch(function (reason) {
                setTokenSentToServer(false);
               console.log(reason);
           });
   }
   function setTokenSentToServer(sent) {
       window.localStorage.setItem('sentToServer', sent ? 1 : 0);
   }

   function isTokenSentToServer() {
       return window.localStorage.getItem('sentToServer') == 1;
   }
   messaging.onMessage(function (payload) {
       console.log(payload);
       const notificationOption={
           body:payload.notification.body,
           icon:payload.notification.icon
       };

       if(Notification.permission==="granted"){
           var notification=new Notification(payload.notification.title,notificationOption);

           notification.onclick=function (ev) {
               ev.preventDefault();
               window.open(payload.notification.click_action,'_blank');
               notification.close();
           }
       }

   });
   messaging.onTokenRefresh(function () {
       messaging.getToken()
           .then(function (newtoken) {
               console.log("New Token : "+ newtoken);
           })
           .catch(function (reason) {
               console.log(reason);
           })
   })
   IntitalizeFireBaseMessaging();
