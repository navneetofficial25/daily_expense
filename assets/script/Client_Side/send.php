<?php
function sendNotification(){
    $url ="https://fcm.googleapis.com/fcm/send";

    $fields=array(
        "to"=>$_REQUEST['token'],
        "notification"=>array(
            "body"=>$_REQUEST['message'],
            "title"=>$_REQUEST['title'],
            "icon"=>$_REQUEST['icon'],
            "click_action"=>"https://google.com",
            "message_id"=>43
            
        )
    );

    $headers=array(
        'Authorization: key=AAAA7IKDZ2w:APA91bHpt-lMYnfO1E6q0RMHOwYsr6OYTM8WvJo2yZ2zbAvuU9t2jOAwn6dRzQLO4sSUvzFqzzRJqmEQiel2DSPQ_n_AE0XrR5XAptJGbUknwsNTskSMaBHqQa01AqjHmul34IIVZFcc',
        'Content-Type:application/json'
    );

    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_POST,true);
    curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($fields));
    $result=curl_exec($ch);
    print_r($result);
    curl_close($ch);
}
sendNotification();

?>