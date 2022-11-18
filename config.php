<?php
error_reporting(0);
define('API_TOKEN', "1646483130:AAFBwYpjHl6aUdGINMg28vFPYsKGuw6qKiw");
function Bot($method, $data=[]){
    $handler = curl_init();
    curl_setopt_array($handler, [
    CURLOPT_URL => 'https://api.telegram.org/bot'.API_TOKEN.'/'.$method,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $data
    ]);
    if(curl_error($handler)){
        var_dump(curl_error($handler));
    }else{
        return json_decode(curl_exec($handler),true);
  }
  curl_close($handler);
}
function SendMessage($chatId, $text, $parse, $messageId, $keyboard){
    return Bot('SendMessage',[
    'chat_id'=> $chatId,
    'text'=> $text,
    'parse_mode'=> $parse,
    'reply_to_message_id'=> $messageId,
    'reply_markup'=> $keyboard
    ]);
}
function SendPhoto($chatId, $photo, $caption, $messageId, $parse, $keyboard){
    Bot('SendPhoto',[
    'chat_id'=> $chatId,
    'photo'=> $photo,
    'caption'=> $caption,
    'reply_to_message_id'=> $messageId,
    'parse_mode'=> $parse,
    'reply_markup'=> $keyboard
    ]);
}
function SendDocument($chatId, $document, $caption, $messageId, $parse, $keyboard){
    Bot('SendDocument',[
    'chat_id'=> $chatId,
    'document'=> $document,
    'caption'=> $caption,
    'reply_to_message_id'=> $messageId,
    'parse_mode'=> $parse,
    'reply_markup'=> $keyboard
    ]);
}
function SendVideo($chatId, $video, $caption, $messageId, $parse, $keyboard){
    Bot('SendVideo',[
    'chat_id'=> $chatId,
    'video'=> $video,
    'caption'=> $caption,
    'reply_to_message_id'=> $messageId,
    'parse_mode'=> $parse,
    'reply_markup'=> $keyboard
    ]);
}
function forwardMessage($chat_id, $from, $message_id)
{
    Bot('forwardMessage',[
    'chat_id'=> $chat_id,
    'from_chat_id'=> $from,
    'message_id'=> $message_id
    ]);
}
function Kd($data=[], $col=2){
     $n=0;
     foreach($data as $k => $value){
        $key[floor($n/$col)][] = ['text'=> $value];
        $n++;
     }
     return $key;
}
function keyboard($data, $col=2, $default = []) {
   $keyboard = [];
    foreach($data as $v)
       $keyboard[] = ['text'=> $v];
   $keyboard = array_chunk($keyboard, $col);
   array_unshift($keyboard, $default);
   return $keyboard;
   
}
function keyboardIn($data, $col=2, $default = []) {
   $keyboard = [];
    foreach($data as $v)
       $keyboard[] = ['text'=> $v];
   
   $keyboard = array_chunk($keyboard, $col);
   $keyboard[] = $default;
   return $keyboard;
}
function keyboardSelect($data, $col=2, $default = []) {
   $keyboard = [];
    foreach($data as $v)
       $keyboard[] = ['text'=> "#-> ".$v];
   
   $keyboard = array_chunk($keyboard, $col);
   $keyboard[] = $default;
   return $keyboard;
}

function Save($data, $fromId){
    $json=json_encode($data,128|256);
    file_put_contents("user/$fromId.json", $json);
    return true;
}
function SaveButton($data){
    $json=json_encode($data,128|256);
    file_put_contents("Button/{$data['btn']}.json", $json);
    return true;
}
function SaveMenu($zir, $dataa){
    if($dataa['menu'] == null){
    $dataa['menu'] = [];
    }
    array_push($dataa['menu'],$zir);
    $json=json_encode($dataa,128|256);
    file_put_contents("Button/{$dataa['btn']}.json", $json);
}
function Add($x){
    global $db;
    if(is_null($db['button'])){
         $db['button'] = [];
    }
      array_push($db['button'],$x);
      $json = json_encode($db,128|256);
      file_put_contents("btn.json", $json);
      return true;
}
$getCh = function($id, $f){
return Bot('GetChatMember',[
  'chat_id'=> $id,
  'user_id'=> $f
]);
};
$update = json_decode(file_get_contents('php://input'));

$message = $update->message;
$text = isset($message->text)?$message->text:null;
$chatId = $message->chat->id;
$fromId = $message->from->id;
$messageId = $message->message_id;
$rp = $message->reply_to_message->forward_from->id;
$admin = [1499154205,1499154205];
if(!is_dir("user")){
    mkdir("user");
}
if(!is_dir("Button")){
    mkdir("Button");
}
$panel = json_encode(['keyboard'=>[
[['text'=>"📊 آمار کاربران"]],[['text'=>"➖ حذف دکمه"],['text'=>"➕ ساخت دکمه"]],
[['text'=>"🎛 ساخت زیرمجموعه"],['text'=>"🔃 تغیرات"]],
[['text'=>"➖ حذف زیرمجموعه"],['text'=>"📩 فروارد"]],
[['text'=>"📩 پیام"]]
],'resize_keyboard'=> true
]);
$back = json_encode(['keyboard'=>[
[['text'=>"↩️ برگشت"]]
],'resize_keyboard'=> true
]);
$whois = json_encode(['keyboard'=>[
[['text'=>"🖼 ارسال عکس"]],[['text'=>"📦 ارسال فایل"],['text'=>"🎞 ارسال فیلم"]],
[['text'=>"📼 ارسال گیف"],['text'=>"📃 ارسال متن"]],[['text'=> "🗣 پشتیبانی"]],
[['text'=>"↩️ برگشت"]]
],'resize_keyboard'=> true
]);
$keyRemove = json_encode([
      'ReplyKeyboardRemove'=>[
       []
      ],'remove_keyboard'=> true
]);
$db = json_decode(file_get_contents("btn.json"),true);
$dev = json_decode(file_get_contents("dev.json"),true);
$user = json_decode(file_get_contents("user/$fromId.json"),true);
$channel = $dev['ch'];

$lock = Bot('GetChatMember',['chat_id'=> '@'.$dev['ch'], 'user_id'=> $fromId])['result']['status'];
$lockk = Bot('GetChatMember',['chat_id'=> $dev['id'], 'user_id'=> $fromId])['result']['status'];
?>