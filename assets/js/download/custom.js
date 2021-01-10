
        var link = document.createElement("link");
           link.href = "https://pushworld.tk/assets/css/modal.css";
           link.type = "text/css";
           link.rel = "stylesheet";
           document.getElementsByTagName("head")[0].appendChild(link);
       
           bodyElemtnt = document.getElementsByTagName("body")[0];
           notificationHtml = generateNotificationBox();
       injectHtml(bodyElemtnt, notificationHtml);
       function injectHtml(element, html, after=false){
           if(after){
               element.innerHTML +=html;
           }else{
               element.innerHTML = html+element.innerHTML;
           }
            
        } function generateNotificationBox(){
            var myvar = '<div id="myModal" class="modal"><div id="box" class="modal-content"><div style="text-align:center"><p id="text">Your Heading Text</p></div><div style="display:flex;justify-content: center;align-self: center;"><button  onclick="IntitalizeFireBaseMessaging()" class="button" id="button1" style="margin: 0 2px">allow</button><button  class="button" id="button2" style="margin: 0 2px">disallow</button></div></div></div>';
            return myvar;
         }var modal = document.getElementById("myModal");
         var btn = document.getElementById("myBtn");
         var span = document.getElementsByClassName("close")[0];
         if(isTokenSentToServer()==false) {
         onload = function() {
           modal.style.display = "block";
         }}

         button2.onclick = function() {
           modal.style.display = "none";
         }
       
     
       var firebaseConfig = {
        apiKey: "AIzaSyCkjUgIYDFgBdedSL8BFcAYgo92uDj35vU",
        authDomain: "push-e6134.firebaseapp.com",
        databaseURL: "https://push-e6134.firebaseio.com",
        projectId: "push-e6134",
        storageBucket: "push-e6134.appspot.com",
        messagingSenderId: "1091410764167",
        appId: "1:1091410764167:web:ca01f8f04d8356b6997322",
        measurementId: "G-MPHN8WWLEW"
    
        };
        firebase.initializeApp(firebaseConfig);
        const messaging=firebase.messaging();
        
        function IntitalizeFireBaseMessaging() {
            modal.style.display = "none";
            messaging
                .requestPermission()
                .then(function () {
                    console.log("Notification Permission");

                    return messaging.getToken();
                    
                })
                .then(function (token) {
                    document.getElementById("token").innerHTML=token;
                    
                    if(isTokenSentToServer()) {
                        console.log("Token already Saved");
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
            window.localStorage.setItem("sentToServer", sent ? 1 : 0);
        }
     
        function isTokenSentToServer() {
            return window.localStorage.getItem("sentToServer") == 1;
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
                    window.open(payload.notification.click_action,"_blank");
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
        });