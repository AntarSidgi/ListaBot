<?php
ob_start();
$token= getenv('TOKEN');
define("API_KEY", $token);
function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}
}
$update = json_decode(file_get_contents("php://input"));
$msg = $update->message;
$txt = $msg->caption;
$text = $msg->text;
$chat_id = $msg->chat->id;
$from_id = $msg->from->id;
$new = $msg->new_chat_members;
$message_id = $msg->message_id;
$type = $msg->chat->type;
if(isset($update->callback_query)){
$callbackMessage = '';
var_dump(bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>$callbackMessage]));
$up = $update->callback_query;
$chat_id = $up->message->chat->id;
$from_id = $up->from->id;
$user = $up->from->username;
$message_id = $up->message->message_id;
$data = $up->data;
}
$id = $update->inline_query->from->id; 
$text_inline = $update->inline_query->query;
include "code/$text_inline/code.php";
include "data/lista.php";
mkdir("start");
mkdir("data");
mkdir("code");
$unll = file_get_contents("unll.txt");
$gettext = file_get_contents("data/text.txt");
$users = explode("\n", file_get_contents("data/users.txt"));
$getstart = file_get_contents("data/start.txt");
$getids = explode("\n", file_get_contents("data/ids.txt"));
$getlista = explode("\n", file_get_contents("data/lista.txt"));
$getban = explode("\n", file_get_contents('data/ban.txt'));
$getmes_id = explode("\n", file_get_contents("ms/$message_id.txt"));
//●●●●●●●●●●●●●●●●●●●●●●●●
$sudo = array("479103620","323823995");
if(in_array($from_id, $sudo)){
$back = json_encode(['inline_keyboard'=>[[['text'=>"↩️ - رجوع - ↪️",'callback_data'=>"left"]],]]);
if($data == "left"){
file_put_contents("unll.txt", " ");
bot('editmessagetext',[
'chat_id'=>$chat_id,
'text'=>"
🌝 - اهلا بك عزيزي المدير سعيد برئيتك - 🎩
🔋 - اليك عدادات اللستة هاذه كل ما تحتاجة - 🔝
",
"message_id"=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[

[['text'=>"🔺 - نشر اللستة - 🔺",'callback_data'=>"send"],
['text'=>"🔻 - حذف اللستة - 🔻",'callback_data'=>"delete"]],[
['text'=>"🔄 - رفع اللستة - 🔄",'callback_data'=>"up"]
],
[['text'=>"🔋 - عرض قنوات المشاركة - 🔋",'callback_data'=>"test"]],
[['text'=>"🔘 - نشر كود - 🔘",'callback_data'=>"sendcode"],['text'=>"💠 - نشر ماركداون - 💠",'callback_data'=>"sendlink"]],
[['text'=>"🔣 - نشر html - 🔣",'callback_data'=>"sendhtml"],['text'=>"⏩ - نشر اعاده توجيه - ⏪",'callback_data'=>"sendfwd"]],
[['text'=>"🔻 - حذف كل المنشورات - 🔻",'callback_data'=>"deleteallms"]],
[['text'=>"⚠️ - فحص القنوات المخالفة - ⚠️",'callback_data'=>"res"]],
[['text'=>"➕ - اضافة قناة - ➕",'callback_data'=>"add"],['text'=>"➖ - حذف قناة - ➖",'callback_data'=>"dele"]],
[['text'=>"🗑 - حذف جميع القنوات - 🗑",'callback_data'=>"delech"]],
[['text'=>"❌ - حظر قناة - ❌",'callback_data'=>"ban"],['text'=>"💢 - الغاء حظر قناة - 💢",'callback_data'=>"unban"]],
[['text'=>"🔕 - القنوات المحضورة - 🔕",'callback_data'=>"listban"]],
[['text'=>"😃 - تعديل رسالة الترحيب - 👋",'callback_data'=>"editstart"],['text'=>"📍 - تعديل رسالة اللستة - 📌",'callback_data'=>"editlist"]],
 [ ['text'=>"📌 عدد المشتركين الأدنى┊".$had,'callback_data'=>"0"]
 
      ],
[  ['text'=>"+20",'callback_data'=>"p20"]
      ,
      
     ['text'=>"+100",'callback_data'=>"p100"],
        ['text'=>"+1k",'callback_data'=>"p1k"]
      ],[
        ['text'=>"-20",'callback_data'=>"m20"]
       ,
   ['text'=>"-100",'callback_data'=>"m100"] ,
      
   ['text'=>"-1k",'callback_data'=>"m1k"]
      ],
[['text'=>"🔰 - حذف الملفات المؤقته - ♻️",'callback_data'=>"resfull"]],
]])
]);
}
$had = file_get_contents("data/users.txt");
function asbahiabood($chat_id,$message_id,$mang)
	 { $had = file_get_contents("data/users.txt");
file_put_contents("unll.txt", " ");
bot('editmessagetext',[
'chat_id'=>$chat_id,
'text'=>"
🌝 - اهلا بك عزيزي المدير سعيد برئيتك - 🎩
🔋 - اليك عدادات اللستة هاذه كل ما تحتاجة - 🔝
",
"message_id"=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[

[['text'=>"🔺 - نشر اللستة - 🔺",'callback_data'=>"send"],['text'=>"🔻 - حذف اللستة - 🔻",'callback_data'=>"delete"]],[['text'=>"🔄 - رفع اللستة - 🔄",'callback_data'=>"up"]],
[['text'=>"🔋 - عرض قنوات المشاركة - 🔋",'callback_data'=>"test"]],
[['text'=>"🔘 - نشر كود - 🔘",'callback_data'=>"sendcode"],['text'=>"💠 - نشر لنك - 💠",'callback_data'=>"sendlink"]],
[['text'=>"🔣 - نشر html - 🔣",'callback_data'=>"sendhtml"],['text'=>"⏩ - نشر اعاده توجيه - ⏪",'callback_data'=>"sendfwd"]],
[['text'=>"🔻 - حذف كل المنشورات - 🔻",'callback_data'=>"deleteallms"]],
[['text'=>"⚠️ - فحص القنوات المخالفة - ⚠️",'callback_data'=>"res"]],
[['text'=>"➕ - اضافة قناة - ➕",'callback_data'=>"add"],['text'=>"➖ - حذف قناة - ➖",'callback_data'=>"dele"]],
[['text'=>"🗑 - حذف جميع القنوات - 🗑",'callback_data'=>"delech"]],
[['text'=>"❌ - حظر قناة - ❌",'callback_data'=>"ban"],['text'=>"💢 - الغاء حظر قناة - 💢",'callback_data'=>"unban"]],
[['text'=>"🔕 - القنوات المحضورة - 🔕",'callback_data'=>"listban"]],
[['text'=>"😃 - تعديل رسالة الترحيب - 👋",'callback_data'=>"editstart"],['text'=>"📍 - تعديل رسالة اللستة - 📌",'callback_data'=>"editlist"]],
  [['text'=>"📌 عدد المشتركين الأدنى┊".$had,'callback_data'=>"0"]
 
      ],
[  ['text'=>"+20",'callback_data'=>"p20"]
      ,
      
     ['text'=>"+100",'callback_data'=>"p100"],
        ['text'=>"+1k",'callback_data'=>"p1k"]
      ],[
        ['text'=>"-20",'callback_data'=>"m20"]
       ,
   ['text'=>"-100",'callback_data'=>"m100"] ,
      
   ['text'=>"-1k",'callback_data'=>"m1k"]
      ],
[['text'=>"🔰 - حذف الملفات المؤقته - ♻️",'callback_data'=>"resfull"]],
]])
]);
}
if($text == "الاوامر" ){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
🌝 - اهلا بك عزيزي المدير سعيد برئيتك - 🎩
🔋 - اليك عدادات اللستة هاذه كل ما تحتاجة - 🔝
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[

[['text'=>"🔺 - نشر اللستة - 🔺",'callback_data'=>"send"],['text'=>"🔻 - حذف اللستة - 🔻",'callback_data'=>"delete"]],
[['text'=>"🔄 - رفع اللستة - 🔄",'callback_data'=>"up"]],
[['text'=>"🔋 - عرض قنوات المشاركة - 🔋",'callback_data'=>"test"]],
[['text'=>"🔘 - نشر كود - 🔘",'callback_data'=>"sendcode"],['text'=>"💠 - نشر لنك - 💠",'callback_data'=>"sendlink"]],
[['text'=>"🔣 - نشر html - 🔣",'callback_data'=>"sendhtml"],['text'=>"⏩ - نشر اعاده توجيه - ⏪",'callback_data'=>"sendfwd"]],
[['text'=>"🔻 - حذف كل المنشورات - 🔻",'callback_data'=>"deleteallms"]],
[['text'=>"⚠️ - فحص القنوات المخالفة - ⚠️",'callback_data'=>"res"]],
[['text'=>"➕ - اضافة قناة - ➕",'callback_data'=>"add"],['text'=>"➖ - حذف قناة - ➖",'callback_data'=>"dele"]],
[['text'=>"🗑 - حذف جميع القنوات - 🗑",'callback_data'=>"delech"]],
[['text'=>"❌ - حظر قناة - ❌",'callback_data'=>"ban"],['text'=>"💢 - الغاء حظر قناة - 💢",'callback_data'=>"unban"]],
[['text'=>"🔕 - القنوات المحضورة - 🔕",'callback_data'=>"listban"]],
[['text'=>"😃 - تعديل رسالة الترحيب - 👋",'callback_data'=>"editstart"],['text'=>"📍 - تعديل رسالة اللستة - 📌",'callback_data'=>"editlist"]],
  [['text'=>"📌 عدد المشتركين الأدنى┊".$had,'callback_data'=>"0"]
 
      ],
[  ['text'=>"+20",'callback_data'=>"p20"]
      ,
      
     ['text'=>"+100",'callback_data'=>"p100"],
        ['text'=>"+1k",'callback_data'=>"p1k"]
      ],[
        ['text'=>"-20",'callback_data'=>"m20"]
       ,
   ['text'=>"-100",'callback_data'=>"m100"] ,
      
   ['text'=>"-1k",'callback_data'=>"m1k"]
      ],
[['text'=>"🔰 - حذف الملفات المؤقته - ♻️",'callback_data'=>"resfull"]],
]])
]);
}$mang=0;
if ( $data == "p20" ) {
 $had1=$had+20;
 file_put_contents("data/users.txt",$had1);
       asbahiabood( $chat_id,$message_id,$mang);
}
elseif ( $data == "p100" ) {
 $had1=$had+100;
 file_put_contents("data/users.txt",$had1);
       asbahiabood( $chat_id,$message_id,$mang);
}
elseif ( $data == "p1k" ) {
 $had1=$had+1000;
 file_put_contents("data/users.txt",$had1);
       asbahiabood( $chat_id,$message_id,$mang);
}
elseif ( $data == "m20" ) {
 $had1=$had-20;
 file_put_contents("data/users.txt",$had1);
       asbahiabood( $chat_id,$message_id,$mang);
}
elseif ( $data == "m100" ) {
 $had1=$had-100;
 file_put_contents("data/users.txt",$had1);
       asbahiabood( $chat_id,$message_id,$mang);
}
elseif ( $data == "m1k" ) {
 $had1=$had-1000;
 file_put_contents("data/users.txt",$had1);
       asbahiabood( $chat_id,$message_id,$mang);
}

if($data == "send"){
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"⏳ - جاري نشر اللستة انتضر قليلا... - ⌛️",
"message_id"=>$message_id,
]);
for($i=0;$i<count($getids);$i++){
//$link = file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$getids[$i]&text=$gettext&parse_mode=HTML&disable_web_page_preview=true");
//$get = json_decode($link);
//$msg_id = $get->result->message_id;
//file_put_contents("data/lista.txt", "$msg_id\n", FILE_APPEND);
$get=bot("sendMessage",[
"chat_id"=>$getids[$i],
"text"=>"$gettext",
'parse_mode'=>HTML,
'disable_web_page_preview'=>true,
"reply_markup"=>$getlist
]);
$msg_id = $get->result->message_id;
file_put_contents("data/lista.txt",$getids[$i]."==". $msg_id."\n", FILE_APPEND);
}
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"🔝 - تم نشر اللستة بجميع القنوات عزيزي - ☑️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($data == "delete"){
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"⏳ - جاري حذف اللستة انتضر قليلا... - ⌛️",
"message_id"=>$message_id,
]);
for($d=0;$d<count($getlista);$d++){
//for($i=0;$i<count($getids);$i++){
$ex = explode("==", $getlista[$d]);
$getlista1=$ex['1'];
$getids1=$ex['0'];
file_get_contents("https://api.telegram.org/bot$token/deleteMessage?chat_id=$getids1&message_id=$getlista1");
//}
}
unlink("data/lista.txt");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"🔝 - تم حذف اللستة من جميع القنوات عزيزي - ☑️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($data == "up"){
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"⏳ - جاري رفع اللستة انتضر قليلا... - ⌛️",
"message_id"=>$message_id,
]);
unlink("data/lista.txt");
for($d=0;$d<count($getlista);$d++){
//for($i=0;$i<count($getids);$i++){
$ex = explode("==", $getlista[$d]);
$getlista1=$ex['1'];
$getids1=$ex['0'];
file_get_contents("https://api.telegram.org/bot$token/deleteMessage?chat_id=$getids1&message_id=$getlista1");

$get=bot("sendMessage",[
"chat_id"=>$getids1,
"text"=>"$gettext",
'parse_mode'=>HTML,
'disable_web_page_preview'=>true,
"reply_markup"=>$getlist
]);
$msg_id = $get->result->message_id;
file_put_contents("data/lista.txt",$getids1."==". $msg_id."\n", FILE_APPEND);
//}
}

bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"🔝 - تم رفع اللستة في جميع القنوات ياصديقي - ☑️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($data == "test"){
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"$gettext",
'parse_mode'=>HTML,
'disable_web_page_preview'=>true,
"reply_markup"=>$getlist
]);
}
//============
if($data == "deleteallms"){
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"⏳ - جاري حذف جميع المنشورات المنشوره انتضر قليلا... - ⌛️",
"message_id"=>$message_id,
]);
$file = scandir('ms');
for($l=0;$l<count($file);$l++){
//unlink("start/$file[$l]");
$getmes_id = explode("\n", file_get_contents("ms/$file[$l]"));
for($d=0;$d<count($getmes_id);$d++){
$ex = explode("==", $getmes_id[$d]);
$getmes_id1=$ex['1'];
$getids1=$ex['0'];
file_get_contents("https://api.telegram.org/bot$token/deleteMessage?chat_id=$getids1&message_id=$getmes_id1");

}
unlink("data/oo".$file[$l]);
unlink("ms/$file[$l]");
}
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"🔝 - تم حذف المنشورات من جميع القنوات ياصديقي - ☑️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
//=============
if($data == "sendcode"){
file_put_contents("unll.txt", "okcode");
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"📮 - ارسل الان الكود عزيزي - 📮",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($text != "/staet" and !$data and $unll == "okcode"){
$getfull = file_get_contents("code/$from_id/txt.txt");
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"⏳ - جاري نشر الكود انتضر قليلا... - ⌛️",
"message_id"=>$message_id,
]);
file_put_contents("unll.txt","");

include "code/$text/lista.php";

$getls = file_get_contents("code/$text/lista.php");
$gettxt = file_get_contents("code/$text/textlist.txt");
$getfile_id = file_get_contents("code/$text/text.txt");
$sens=file_get_contents("code/$from_id/tepe_code.txt");
$ss=str_replace("send","",$sens);
$msg_id = $message_id+1;
file_put_contents("up/".$msg_id."lista.php",$getls);
file_put_contents("up/".$msg_id."textlist.txt",$gettxt);
file_put_contents("up/".$msg_id."text.txt",$getfile_id);
file_put_contents("up/".$msg_id."tepe_code.txt",$sens);

if($sens=="text")
{
for($i=0;$i<count($getids);$i++){
 $get=bot("sendMessage",[
"chat_id"=>$getids[$i],
"text"=>"$gettxt",
'parse_mode'=>HTML,
'disable_web_page_preview'=>true,
"reply_markup"=>$list
]);
$get_send=$get->result;
if(!is_null($get_send))
{
$msg = $get->result->message_id;
file_put_contents("ms/$msg_id.txt",$getids[$i]."==".$msg."\n", FILE_APPEND);
}
}
}
else{
for($i=0;$i<count($getids);$i++){
 $get=bot($sens,[
"chat_id"=>$getids[$i],
"$ss"=>"$getfile_id",
'caption'=>"$getfull",
"reply_markup"=>$list
]);
$get_send=$get->result;
if(!is_null($get_send))
{
$msg = $get->result->message_id;
file_put_contents("ms/$msg_id.txt",$getids[$i]."==".$msg."\n", FILE_APPEND);
}
}
}

file_put_contents("unll.txt", "");
bot("editmessagetext",[
"chat_id"=>$chat_id,
"text"=>"🔝 - تم نشر الكود بجميع القنوات عزيزي - ☑️",
"message_id"=>$message_id+1,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🗑 - حذف الكود - 🗑",'callback_data'=>"delecode"]],
[['text'=>"🔄 - رفع الكود - 🔄",'callback_data'=>"upcode"]]
]])
]);
}
if($data == "delecode"){
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"⏳ - جاري حذف الكود انتضر قليلا... - ⌛️",
"message_id"=>$message_id,
]);
for($d=0;$d<count($getmes_id);$d++){
//for($i=0;$i<count($getids);$i++){
$ex = explode("==", $getmes_id[$d]);
$getmes_id1=$ex['1'];
$getids1=$ex['0'];
file_get_contents("https://api.telegram.org/bot$token/deleteMessage?chat_id=$getids1&message_id=$getmes_id1");
//}
}
$msg_id = $message_id;
unlink("up/".$msg_id."lista.php");
unlink("up/".$msg_id."textlist.txt");
unlink("up/".$msg_id."text.txt");
unlink("up/".$msg_id."tepe_code.txt");
unlink("ms/$message_id.txt");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"🔝 - تم حذف الكود من جميع القنوات عزيزي - ☑️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
//============
if($data == "upcode"){
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"⏳ - جاري رفع الكود انتضر قليلا... - ⌛️",
"message_id"=>$message_id,
]);
unlink("ms/$message_id.txt");
/*
include "code/$text/lista.php";
$getls = file_get_contents("code/$text/lista.php");
$gettxt = file_get_contents("code/$text/textlist.txt");
$getfile_id = file_get_contents("code/$text/text.txt");
$sens=file_get_contents("code/$from_id/tepe_code.txt");
$ss=str_replace("send","",$sens);
*/
$msg_id = $message_id;

include "up/".$msg_id."lista.php";

$gettxt = file_get_contents("up/".$msg_id."textlist.txt");

$getfile_id = file_get_contents("up/".$msg_id."text.txt");

$sens=file_get_contents("up/".$msg_id."tepe_code.txt");

$ss=str_replace("send","",$sens);

for($d=0;$d<count($getmes_id);$d++){
$ex = explode("==", $getmes_id[$d]);
$getmes_id1=$ex['1'];
$getids1=$ex['0'];

file_get_contents("https://api.telegram.org/bot$token/deleteMessage?chat_id=$getids1&message_id=$getmes_id1");
if($sens=="text")
{
//for($i=0;$i<count($getids);$i++){
 $get=bot("sendMessage",[
"chat_id"=>$getids1,
"text"=>"$gettxt",
'parse_mode'=>HTML,
'disable_web_page_preview'=>true,
"reply_markup"=>$list
]);
$get_send=$get->result;
if(!is_null($get_send))
{
$msg = $get->result->message_id;
file_put_contents("ms/$message_id.txt",$getids1."==".$msg."\n", FILE_APPEND);
}
//}
}
else{
//for($i=0;$i<count($getids);$i++){
 $get=bot($sens,[
"chat_id"=>$getids1,
"$ss"=>"$getfile_id",
'caption'=>"$getfull",
"reply_markup"=>$list
]);
$get_send=$get->result;
if(!is_null($get_send))
{
$msg = $get->result->message_id;
file_put_contents("ms/$message_id.txt",$getids1."==".$msg."\n", FILE_APPEND);
}
}
//}
}
bot("editmessagetext",[
"chat_id"=>$chat_id,
"text"=>"🔄 - تم رفع الكود بجميع القنوات عزيزي - ☑️",
"message_id"=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🗑 - حذف الكود - 🗑",'callback_data'=>"delecode"]],
[['text'=>"🔄 - رفع الكود - 🔄",'callback_data'=>"upcode"]],
]])
]);
/*
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"🔝 - تم رفع الكود في جميع القنوات عزيزي - ☑️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
*/
}
//============
if($data == "sendlink"){
file_put_contents("unll.txt", "oklink");
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"📮 - ارسل الان المنشور ياصديقي - 📮",
"message_id"=>$message_id,
]);
}
if($text and !$data and $unll == "oklink"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"⏳ - جاري نشر المنشور انتضر قليلا... - ⌛️",
]);
$msg = $message_id+1;
file_put_contents("data/oo".$msg.".txt",$text);
for($i=0;$i<count($getids);$i++){
//$link = file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$getids[$i]&text=$text&parse_mode=HTML&disable_web_page_preview=true");
//$get = json_decode($link);

$get =bot('SendMessage', [
'chat_id' => $getids[$i],
'text'=>$text,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true
 
]);
$msg_id = $get->result->message_id;
file_put_contents("ms/$msg.txt",$getids[$i]."==". $msg_id."\n", FILE_APPEND);
}
file_put_contents("unll.txt", "");
bot("editmessagetext",[
"chat_id"=>$chat_id,
"text"=>"$text",
'parse_mode'=>MarkDown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id+1,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🗑 - حذف المنشور - 🗑",'callback_data'=>"delelink"]],
[['text'=>"🔄 - رفع المنشور - 🔄",'callback_data'=>"uplink"]],
]])
]);
}
//========
if($data == "delelink"){
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"⏳ - جاري حذف المنشور انتضر قليلا... - ⌛️",
"message_id"=>$message_id,
]);
for($d=0;$d<count($getmes_id);$d++){
//for($i=0;$i<count($getids);$i++){
$ex = explode("==", $getmes_id[$d]);
$getmes_id1=$ex['1'];
$getids1=$ex['0'];
file_get_contents("https://api.telegram.org/bot$token/deleteMessage?chat_id=$getids1&message_id=$getmes_id1");
//}
}
unlink("data/oo".$message_id.".txt");
unlink("ms/$message_id.txt");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"🔝 - تم حذف المنشور من جميع القنوات ياصديقي - ☑️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($data == "uplink"){
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"⏳ - جاري رفع المنشور انتضر قليلا... - ⌛️",
"message_id"=>$message_id,
]);
$text=file_get_contents("data/oo".$message_id.".txt");
unlink("ms/$message_id.txt");
for($d=0;$d<count($getmes_id);$d++){
//for($i=0;$i<count($getids);$i++){
$ex = explode("==", $getmes_id[$d]);
$getmes_id1=$ex['1'];
$getids1=$ex['0'];
file_get_contents("https://api.telegram.org/bot$token/deleteMessage?chat_id=$getids1&message_id=$getmes_id1");
$get =bot('SendMessage', [
'chat_id' => $getids1,
'text'=>$text,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true
 
]);
$msg_id = $get->result->message_id;
//$msg = $message_id;
file_put_contents("ms/$message_id.txt",$getids1."==". $msg_id."\n", FILE_APPEND);
//}
}

bot("editmessagetext",[
"chat_id"=>$chat_id,
"text"=>"$text",
'parse_mode'=>MarkDown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🗑 - حذف المنشور - 🗑",'callback_data'=>"delelink"]],
[['text'=>"🔄 - رفع المنشور - 🔄",'callback_data'=>"uplink"]],
]])
]);
}
//========
if($data == "sendfwd"){
file_put_contents("unll.txt", "okfwd");
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"📮 - ارسل الان المنشور الذي تريد  اعاده توجيهه ياصديقي - 📮",
"message_id"=>$message_id,
]);
}

if(!$data and $unll == "okfwd"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"⏳ - جاري توجيه المنشور انتضر قليلا... - ⌛️",
]);
$msg = $message_id+1;
file_put_contents("data/oo".$msg.".txt",$text);
for($i=0;$i<count($getids);$i++){

$get=bot('ForwardMessage',[
	'chat_id'=>$getids[$i],
	'from_chat_id'=>$chat_id,
	'message_id'=>$message_id
	]);
$msg_id = $get->result->message_id;
file_put_contents("ms/$msg.txt",$getids[$i]."==". $msg_id."\n", FILE_APPEND);
}
file_put_contents("unll.txt", "");

bot("editmessagetext",[
"chat_id"=>$chat_id,
"text"=>"تم التوجيه لهذا المنشور👆",
'parse_mode'=>html,
'disable_web_page_preview'=>true,
"message_id"=>$message_id+1,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🗑 - حذف التوجيه - 🗑",'callback_data'=>"delelink"]],
[['text'=>"🔄 - رفع التوجيه - 🔄",'callback_data'=>"upfwd"]],
]])
]);
}
if($data == "upfwd"){
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"⏳ - جاري رفع التوجيه انتضر قليلا... - ⌛️",
"message_id"=>$message_id,
]);
$text=file_get_contents("data/oo".$message_id.".txt");
unlink("ms/$message_id.txt");
for($d=0;$d<count($getmes_id);$d++){
//for($i=0;$i<count($getids);$i++){
$ex = explode("==", $getmes_id[$d]);
$getmes_id1=$ex['1'];
$getids1=$ex['0'];
//file_get_contents("https://api.telegram.org/bot$token/deleteMessage?chat_id=$getids1&message_id=$getmes_id1");

$get=bot('ForwardMessage',[
	'chat_id'=>$getids1,
	'from_chat_id'=>$getids1,
	'message_id'=>$getmes_id1
	]);
$msg_id = $get->result->message_id;
//$msg = $message_id;
file_put_contents("ms/$message_id.txt",$getids1."==". $msg_id."\n", FILE_APPEND);
file_get_contents("https://api.telegram.org/bot$token/deleteMessage?chat_id=$getids1&message_id=$getmes_id1");
//}
}

bot("editmessagetext",[
"chat_id"=>$chat_id,
"text"=>"تم رفع التوجيه 👆",
'parse_mode'=>html,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🗑 - حذف التوجيه - 🗑",'callback_data'=>"delelink"]],
[['text'=>"🔄 - رفع التوجيه - 🔄",'callback_data'=>"upfwd"]],
]])
]);
}
//==========
if($data == "sendhtml"){
file_put_contents("unll.txt", "okhtml");
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"📮 - ارسل الان المنشور ياصديقي - 📮",
"message_id"=>$message_id,
]);
}
if($text and !$data and $unll == "okhtml"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"⏳ - جاري نشر المنشور انتضر قليلا... - ⌛️",
]);
$msg = $message_id+1;
file_put_contents("data/oo".$msg.".txt",$text);
for($i=0;$i<count($getids);$i++){

$get =bot('SendMessage', [
'chat_id' => $getids[$i],
'text'=>$text,
'parse_mode'=>"html",
'disable_web_page_preview'=>true
 
]);
$msg_id = $get->result->message_id;
file_put_contents("ms/$msg.txt",$getids[$i]."==". $msg_id."\n", FILE_APPEND);
}
file_put_contents("unll.txt", "");
bot("editmessagetext",[
"chat_id"=>$chat_id,
"text"=>"$text",
'parse_mode'=>html,
'disable_web_page_preview'=>true,
"message_id"=>$message_id+1,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🗑 - حذف المنشور - 🗑",'callback_data'=>"delelink"]],
[['text'=>"🔄 - رفع المنشور - 🔄",'callback_data'=>"uphtml"]],
]])
]);
}
if($data == "uphtml"){
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"⏳ - جاري رفع المنشور انتضر قليلا... - ⌛️",
"message_id"=>$message_id,
]);
$text=file_get_contents("data/oo".$message_id.".txt");
unlink("ms/$message_id.txt");
for($d=0;$d<count($getmes_id);$d++){
//for($i=0;$i<count($getids);$i++){
$ex = explode("==", $getmes_id[$d]);
$getmes_id1=$ex['1'];
$getids1=$ex['0'];
file_get_contents("https://api.telegram.org/bot$token/deleteMessage?chat_id=$getids1&message_id=$getmes_id1");
$get =bot('SendMessage', [
'chat_id' => $getids1,
'text'=>$text,
'parse_mode'=>"html",
'disable_web_page_preview'=>true
 
]);
$msg_id = $get->result->message_id;
//$msg = $message_id;
file_put_contents("ms/$message_id.txt",$getids1."==". $msg_id."\n", FILE_APPEND);
//}
}

bot("editmessagetext",[
"chat_id"=>$chat_id,
"text"=>"$text",
'parse_mode'=>html,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🗑 - حذف المنشور - 🗑",'callback_data'=>"delelink"]],
[['text'=>"🔄 - رفع المنشور - 🔄",'callback_data'=>"uphtml"]],
]])
]);
}
//========
if($data == "res"){
file_put_contents("data/yeslist.txt", "");
file_put_contents("data/lista.php", '<?php'."\n".'$getlist = json_encode(['."\n".'"inline_keyboard"=>['."\n");
file_put_contents("data/nolist.txt", "");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"🔄 - جاري فحص القنوات - 🔃",
"message_id"=>$message_id,
]);
for($i=0;$i<count($getids);$i++){
$ok = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChatAdministrators?chat_id=$getids[$i]"))->ok;
if($ok == 1){
$json1 = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$getids[$i]"))->result;
$user1 = $json1->username; 
$userl = "@".$user1." - ";
$name1 = $json1->title;  
file_put_contents("data/yeslist.txt", "$userl", FILE_APPEND);
file_put_contents("data/lista.php", "\n".'[["text"=>"'.$name1.'", "url"=>"https://t.me/'.$user1.'"]],', FILE_APPEND);
}
if($ok != 1){
$json2 = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$getids[$i]"))->result;
$user2 = $json2->username; 
$useri = "@".$user2." - ";
file_put_contents("data/nolist.txt", "$useri", FILE_APPEND);
}
}
$yes = file_get_contents("data/yeslist.txt");
$no = file_get_contents("data/nolist.txt");
file_put_contents("data/lista.php", "\n]]);", FILE_APPEND);
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"🔺 - القنوات المشاركة في الدعم - 🔺\n[▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪]\n".$yes."\n🔻 - القنوات الملغي شتراكاته - 🔻\n[▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪]\n".$no,
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($data == "add"){
file_put_contents("unll.txt", "add");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"📬 - ارسل الان معرف القناة - 📩",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}

if($text and !$data and $unll == "add" ){
$json = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$text"))->result->id;
if(!in_array($json, $getids)){
file_put_contents("data/ids.txt", "$json\n", FILE_APPEND);
//file_put_contents("unll.txt", "");
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"🔝 - تم اضافة القناة بنجاح - ☑️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}else
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"☑️ - القناة مشاركة بتأكيد عزيزي - 👁‍🗨",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($data == "dele"){
file_put_contents("unll.txt", "dele");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"📬 - ارسل الان معرف القناة - 📩",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($text and !$data and $unll == "dele"){
$json = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$text"))->result->id;
$i = file_get_contents("data/ids.txt");
$i = str_replace($json, ' ', $i);
$i = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $i);
file_put_contents('data/ids.txt', $i);
file_put_contents("unll.txt", "");
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"🔇 - تم حذف القناة بنجاح - ☑️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($data == "delech"){
file_put_contents("data/ids.txt", "");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"🔄 - تم حذف جميع القنوات - 🗑",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($data == "ban"){
file_put_contents("unll.txt", "ban");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"📬 - ارسل الان معرف القناة - 📩",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($text and !$data and $unll == "ban" ){
$json = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$text"))->result->id;
$i = file_get_contents("data/ids.txt");
$i = str_replace($json, ' ', $i);
$i = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $i);
file_put_contents('data/ids.txt', $i);
file_put_contents("data/ban.txt", "$json\n", FILE_APPEND);
file_put_contents("unll.txt", "ban");
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"❌ - تم حظر القناة - ❌",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($data == "unban"){
file_put_contents("unll.txt", "unban");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"📬 - ارسل الان معرف القناة - 📩",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($text and !$data and $unll == "unban"){
$json = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$text"))->result->id;
$i = file_get_contents("data/ban.txt");
$i = str_replace($json, ' ', $i);
$i = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $i);
file_put_contents('data/ban.txt', $i);
file_put_contents("data/ids.txt", "$json\n", FILE_APPEND);
file_put_contents("unll.txt", "");
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"💢 - تم رفع الحظر القناة - 💢",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($data == "listban"){
file_put_contents("data/banall.txt", "");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"🔄 - جاري فحص القنوات - 🔃",
"message_id"=>$message_id,
]);
for($i=0;$i<count($getban);$i++){
$json1 = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$getban[$i]"))->result;
$user1 = $json1->username; 
$userl = "@".$user1." - "; 
file_put_contents("data/banall.txt", "$userl", FILE_APPEND);
}
$banall = file_get_contents("data/banall.txt");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"❌ - قائمة القنوات المحظورة - ❌\n[▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪▪]\n".$yes,
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($data == "editstart"){
file_put_contents("unll.txt", "setstart");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"📮 - ارسل الترحيب الذي تريد وضعه - 📩",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($text and !$data and $unll == "setstart"){
file_put_contents("data/start.txt", "$text");
file_put_contents("unll.txt", "");
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"♻️ - تم تعديل الرسالة الترحيب - ☑️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($data == "editlist"){
file_put_contents("unll.txt", "setlist");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"📮 - ارسل النص رئس اللستة - 📊",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($text and !$data and $unll == "setlist"){
file_put_contents("data/text.txt", "$text");
file_put_contents("unll.txt", "");
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"☑️ - تم وضع رئس الى اللستة - 🔝",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
if($data == "resfull"){
file_put_contents("data/banall.txt", "");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"⏳ - جاري حذف الملفات المؤقته انتضر قليلاً... - ⌛️",
"message_id"=>$message_id,
]);
$files = scandir('code');
$file = scandir('start');
for($l=0;$l<count($file);$l++){
unlink("start/$file[$l]");
for($i=0;$i<count($files);$i++){
unlink("code/$files[$i]/code.php");
unlink("code/$files[$i]/lista.php");
unlink("code/$files[$i]/file_id.txt");
unlink("code/$files[$i]/textlist.txt");
unlink("code/$files[$i]/text.txt");
unlink("code/$files[$i]/txt.txt");
Rmdir("code/$files[$i]");
unlink("mark/$files[$i]");
unlink("data/nolist.txt");
unlink("data/yeslist.txt");
unlink("data/banall.txt");
unlink("data/lista.php");
}
}
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"🔋 - لقد حذف جميع ملفات الغير هامة - ☑️",
"message_id"=>$message_id,
'reply_markup'=>$back
]);
}
}
//الاوامر العادية
$ba = json_encode(['inline_keyboard'=>[[['text'=>"↩️ - رجوع - ↪️",'callback_data'=>"ba"]],]]);
$start = file_get_contents("start/l$from_id.txt");
if($data == "ba"){
file_put_contents("start/l$from_id.txt", "");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>$getstart."\n\n🔘 - صنع كود (ماركداون - انلاين) - ☑️",
"message_id"=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"➕ - صنع منشور - 🔘",'callback_data'=>"start"]],
[['text'=>"🎩 - اشتراك في الدعم - ✨",'callback_data'=>"setch"]],
]])
]);
}
if($text == "عادي"){
file_put_contents("start/l$from_id.txt", "");
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>$getstart."\n\n🔘 - صنع كود (ماركداون - انلاين) - ☑️",
"message_id"=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"➕ - صنع منشور - 🔘",'callback_data'=>"start"]],
[['text'=>"🎩 - اشتراك في الدعم - ✨",'callback_data'=>"setch"]],
]])
]);
}
if($data == "setch"){
file_put_contents("start/l$from_id.txt", "add");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'parse_mode'=>'HTML',
'disable_web_page_preview'=>true,
'text'=>"⏬ - اهلا قوانين الاشتراك يجب تطبق - ⏬
╣▪ان تكون قناتك لا تقل عن ".$users[1]." - 🔰
╣▪التزام في وقت الدعم وعدم المخالفة - ⚠️
╣▪في حال قمة بـ المخالفة يتم حظر قناتك - ❌
╣▪ارسل معرف القناة فقط للاشتراك - 🔰
╝▪للاستفسار يرجئ مراسلتي - 🎩",
"message_id"=>$message_id,
'reply_markup'=>$ba
]);
}
$ok = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChatMemberscount?chat_id=$text"))->result;
$admins = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChatAdministrators?chat_id=$text"))->ok;
$ch_id = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$text"))->result->id;

if($text and !$data and $start == "add" and $ok > $users[0] and $admins == 1 and !in_array($ch_id, $getids) and !in_array($ch_id, $getban)){
file_put_contents("data/ids.txt", "$ch_id\n", FILE_APPEND);
file_put_contents("start/l$from_id.txt", "");
bot("editmessagetext",[
"chat_id"=>$chat_id,
"text"=>"🔝 - تم اضافة القناة بنجاح - ☑️",
"message_id"=>$message_id-1,
'reply_markup'=>$ba
]);
}

if($text and !$data and $start == "add" and $ok > $users[0] and $admins != 1 and !in_array($ch_id, $getban)){
bot("editmessagetext",[
"chat_id"=>$chat_id,
"text"=>"
⁉️ - عفوا عزيزي البوت لست ادمن - 👁‍🗨
☑️ - ارفع البوت ادمن في قناتك ثمة حاول مجدداً - ↪️
",
"message_id"=>$message_id-1,
'reply_markup'=>$ba
]);
}

if($text and !$data and $start == "add" and $ok > $users[0] and $admins == 1 and in_array($ch_id, $getids) and !in_array($json, $getban)){
bot("editmessagetext",[
"chat_id"=>$chat_id,
"text"=>"☑️ - القناة مشاركة بتأكيد عزيزي - 👁‍🗨",
"message_id"=>$message_id-1,
'reply_markup'=>$ba
]);
}

if($text and !$data and $start == "add" and $ok < $users[0] and !in_array($ch_id, $getban) and !in_array($ch_id, $getids)){
bot("editmessagetext",[
"chat_id"=>$chat_id,
"text"=>"🚫 - عذرا عدد قناتك قليل - ⁉️",
"message_id"=>$message_id-1,
'reply_markup'=>$ba
]);
}

if($text and !$data and $start == "add" and $ok > $users[0] and in_array($ch_id, $getban)){
bot("editmessagetext",[
"chat_id"=>$chat_id,
"text"=>"🚫 - عذرا قناتك قامة بلمخالفة وتم حظرها - ❌",
"message_id"=>$message_id-1,
'reply_markup'=>$ba
]);
}

if($data == "start"){
unlink("code/$from_id/text.txt");
unlink("code/$from_id/textlist.txt");
mkdir("code/$from_id");
file_put_contents("start/l$from_id.txt", "code");
file_put_contents("code/$from_id/lista.php", "");
file_put_contents("code/$from_id/code.php", "");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"
🌹 - ارسل الان رئس الكود - 🎩
╣▪بـ امكانك استخدام جميع الوسائط مثلا - ⏬
╣(نص - بصمة - فيديو - صورة - صوت - متحركة)
⏬ - الان يمكنك صنع كود - ⏬
╣▪ملاحضة انتبة جيدا اذا قمة بصنع كود
╣▪سيتم حذف الكود القبلة
╣▪سيتم تثبيت الكود الجديد الى دعم ايضاً
╝▪اي اقتراح يرجئ مراسلتي
",
'parse_mode'=>HTML,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
]);
}
$lllll = "💎 - الان ارسل دكم الكيبورد - ⏬\n🔮 - دكمة جوه دكمة كـ مثال - ↙️\n\nHi = t.me/Team_SD\nHello = t.me/Team_SD\n\n🏮 - دكمة بصف دكمة كـ مثال - ↙️\n\nHi = t.me/Team_SD + Hello = t.me/Team_SD\n\n📌 - اي اقتراح يرجئ مراسلتي";

if($text and !$data and $start == "code"){
file_put_contents("code/$from_id/tepe_code.txt","text");
file_put_contents("code/$from_id/code.php", '<?php'."\n".'bot("answerInlineQuery",[ "inline_query_id"=>$update->inline_query->id, "results"=>json_encode([[ "type"=>"article", "id"=>base64_encode(rand(5,555)), "title"=>"ارسال النص 💌", "input_message_content"=>[ "message_text"=>"'.$text.'"], "parse_mode"=>"HTML", "disable_web_page_preview"=>true, "reply_markup"=>[
"inline_keyboard"=>['."\n");
file_put_contents("start/l$from_id.txt", "gooo");
file_put_contents("code/$from_id/textlist.txt", $text);
bot('sendmessage',[
'chat_id'=>$chat_id, 
'parse_mode'=>HTML,
'disable_web_page_preview'=>true,
'text'=>$lllll
]);
}

if($update->message->photo and !$data and $start == "code"){
file_put_contents("code/$from_id/tepe_code.txt","sendphoto");
$file_id = $update->message->photo[1]->file_id;
file_put_contents("code/$from_id/code.php", '<?php'."\n".'bot("answerInlineQuery",[ "inline_query_id"=>$update->inline_query->id, "cache_time"=>"'.$message_id.'", "results"=>json_encode([[ "type"=>"photo", "id"=>base64_encode(rand(5,555)), "photo_url"=>"'.$file_id.'", "thumb_url"=>"'.$file_id.'", "caption"=>"'.$txt.'", "reply_markup"=>[ "inline_keyboard"=>['."\n");
file_put_contents("code/$from_id/text.txt", $file_id);
file_put_contents("code/$from_id/txt.txt", $txt);
file_put_contents("start/l$from_id.txt", "gooo");
bot('sendmessage',[
'chat_id'=>$chat_id, 
'parse_mode'=>HTML,
'disable_web_page_preview'=>true,
'text'=>$lllll
]);
}
if($update->message->document and !$data and $start == "code"){
file_put_contents("code/$from_id/tepe_code.txt","senddocument");
$file_id = $update->message->document->file_id;
file_put_contents("code/$from_id/code.php", '<?php'."\n".'bot("answerInlineQuery",[ "inline_query_id"=>$update->inline_query->id, "cache_time"=>"'.$message_id.'", "results"=>json_encode([[ "type"=>"gif", "id"=>base64_encode(rand(5,555)), "gif_url"=>"'.$file_id.'", "thumb_url"=>"'.$file_id.'", "caption"=>"'.$txt.'", "reply_markup"=>[ "inline_keyboard"=>['."\n");
file_put_contents("code/$from_id/text.txt", $file_id);
file_put_contents("code/$from_id/txt.txt", $txt);
file_put_contents("start/l$from_id.txt", "gooo");
bot('sendmessage',[
'chat_id'=>$chat_id, 
'parse_mode'=>HTML,
'disable_web_page_preview'=>true,
'text'=>$lllll
]);
}
if($update->message->sticker and !$data and $start == "code"){
file_put_contents("code/$from_id/tepe_code.txt","sendsticker");
$file_id = $update->message->sticker->file_id;
file_put_contents("code/$from_id/code.php", '<?php'."\n".'bot("answerInlineQuery",[ "inline_query_id"=>$update->inline_query->id, "cache_time"=>"'.$message_id.'", "results"=>json_encode([[ "type"=>"sticker", "id"=>base64_encode(rand(5,555)), "sticker_file_id"=>"'.$file_id.'", "thumb_url"=>"'.$file_id.'", "caption"=>"'.$txt.'", "reply_markup"=>[ "inline_keyboard"=>['."\n");
file_put_contents("code/$from_id/text.txt", $file_id);
file_put_contents("code/$from_id/txt.txt", $txt);
file_put_contents("start/l$from_id.txt", "gooo");
bot('sendmessage',[
'chat_id'=>$chat_id, 
'parse_mode'=>HTML,
'disable_web_page_preview'=>true,
'text'=>$lllll
]);
}
if($update->message->voice and !$data and $start == "code"){
file_put_contents("code/$from_id/tepe_code.txt","sendvoice");
$file_id = $update->message->voice->file_id;
file_put_contents("code/$from_id/code.php", '<?php'."\n".'bot("answerInlineQuery",[ "inline_query_id"=>$update->inline_query->id, "cache_time"=>"'.$message_id.'", "results"=>json_encode([[ "type"=>"voice", "id"=>base64_encode(rand(5,555)), "voice_file_id"=>"'.$file_id.'", "thumb_url"=>"'.$file_id.'", "caption"=>"'.$txt.'", "reply_markup"=>[ "inline_keyboard"=>['."\n");
file_put_contents("code/$from_id/text.txt", $file_id);
file_put_contents("code/$from_id/txt.txt", $txt);
file_put_contents("start/l$from_id.txt", "gooo");
bot('sendmessage',[
'chat_id'=>$chat_id, 
'parse_mode'=>HTML,
'disable_web_page_preview'=>true,
'text'=>$lllll
]);
}
if($update->message->audio and !$data and $start == "code"){
file_put_contents("code/$from_id/tepe_code.txt","sendaudio");
$file_id = $update->message->audio->file_id;
file_put_contents("code/$from_id/code.php", '<?php'."\n".'bot("answerInlineQuery",[ "inline_query_id"=>$update->inline_query->id, "cache_time"=>"'.$message_id.'", "results"=>json_encode([[ "type"=>"audio", "id"=>base64_encode(rand(5,555)), "audio_file_id"=>"'.$file_id.'", "thumb_url"=>"'.$file_id.'", "caption"=>"'.$txt.'", "reply_markup"=>[ "inline_keyboard"=>['."\n");
file_put_contents("code/$from_id/text.txt", $file_id);
file_put_contents("code/$from_id/txt.txt", $txt);
file_put_contents("start/l$from_id.txt", "gooo");
bot('sendmessage',[
'chat_id'=>$chat_id, 
'parse_mode'=>HTML,
'disable_web_page_preview'=>true,
'text'=>$lllll
]);
}
if($update->message->video and !$data and $start == "code"){
file_put_contents("code/$from_id/tepe_code.txt","sendvideo");
$file_id = $update->message->video->file_id;
file_put_contents("code/$from_id/code.php", '<?php'."\n".'bot("answerInlineQuery",[ "inline_query_id"=>$update->inline_query->id, "cache_time"=>"'.$message_id.'", "results"=>json_encode([[ "type"=>"video", "id"=>base64_encode(rand(5,555)), "video_file_id"=>"'.$file_id.'", "thumb_url"=>"'.$file_id.'", "caption"=>"'.$txt.'", "reply_markup"=>[ "inline_keyboard"=>['."\n");
file_put_contents("code/$from_id/text.txt", $file_id);
file_put_contents("code/$from_id/txt.txt", $txt);
file_put_contents("start/l$from_id.txt", "gooo");
bot('sendmessage',[
'chat_id'=>$chat_id, 
'parse_mode'=>HTML,
'disable_web_page_preview'=>true,
'text'=>$lllll
]);
}

if($text != "/start" and !$data and $start == "gooo"){
$ex = explode("\n", $text);
$getfull = file_get_contents("code/$from_id/txt.txt");
$gettxt = file_get_contents("code/$from_id/textlist.txt");
$getfile_id = file_get_contents("code/$from_id/text.txt");
file_put_contents("code/$from_id/lista.php", '<?php'."\n".'$list = json_encode(['."\n".'"inline_keyboard"=>['."\n");

for($i=0;$i<count($ex);$i++){
$h = explode("\n", $text);
$ooo = str_replace("http://", "", $h[$i]);
$oo = str_replace("https://", "", $ooo);
$o = str_replace("+ ", "\n", $oo);
$u = explode("\n", $o);
$n = count($u);

if(preg_match("/^(.*) = (.*)/", $o, $ch) and $n == 1){
file_put_contents("code/$from_id/lista.php", "\n".'[["text"=>"'.$ch[1].'", "url"=>"'.$ch[2].'"]],', FILE_APPEND);
file_put_contents("code/$from_id/code.php", "\n".'[["text"=>"'.$ch[1].'", "url"=>"'.$ch[2].'"]],', FILE_APPEND);
}
if(preg_match("/^(.*) = (.*)\n(.*) = (.*)/", $o, $ch) and $n == 2){
file_put_contents("code/$from_id/lista.php", "\n".'[["text"=>"'.$ch[1].'", "url"=>"'.$ch[2].'"],["text"=>"'.$ch[3].'", "url"=>"'.$ch[4].'"]],', FILE_APPEND);
file_put_contents("code/$from_id/code.php", "\n".'[["text"=>"'.$ch[1].'", "url"=>"'.$ch[2].'"],["text"=>"'.$ch[3].'", "url"=>"'.$ch[4].'"]],', FILE_APPEND);
}
if(preg_match("/^(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)/", $o, $ch) and $n == 3){
file_put_contents("code/$from_id/lista.php", "\n".'[["text"=>"'.$ch[1].'", "url"=>"'.$ch[2].'"],["text"=>"'.$ch[3].'", "url"=>"'.$ch[4].'"],["text"=>"'.$ch[5].'", "url"=>"'.$ch[6].'"]],', FILE_APPEND);
file_put_contents("code/$from_id/code.php", "\n".'[["text"=>"'.$ch[1].'", "url"=>"'.$ch[2].'"],["text"=>"'.$ch[3].'", "url"=>"'.$ch[4].'"],["text"=>"'.$ch[5].'", "url"=>"'.$ch[6].'"]],', FILE_APPEND);
}
if(preg_match("/^(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)/", $o, $ch) and $n == 4){
file_put_contents("code/$from_id/lista.php", "\n".'[["text"=>"'.$ch[1].'", "url"=>"'.$ch[2].'"],["text"=>"'.$ch[3].'", "url"=>"'.$ch[4].'"],["text"=>"'.$ch[5].'", "url"=>"'.$ch[6].'"],["text"=>"'.$ch[7].'", "url"=>"'.$ch[8].'"]],', FILE_APPEND);
file_put_contents("code/$from_id/code.php", "\n".'[["text"=>"'.$ch[1].'", "url"=>"'.$ch[2].'"],["text"=>"'.$ch[3].'", "url"=>"'.$ch[4].'"],["text"=>"'.$ch[5].'", "url"=>"'.$ch[6].'"],["text"=>"'.$ch[7].'", "url"=>"'.$ch[8].'"]],', FILE_APPEND);
}
if(preg_match("/^(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)/", $o, $ch) and $n == 5){
file_put_contents("code/$from_id/lista.php", "\n".'[["text"=>"'.$ch[1].'", "url"=>"'.$ch[2].'"],["text"=>"'.$ch[3].'", "url"=>"'.$ch[4].'"],["text"=>"'.$ch[5].'", "url"=>"'.$ch[6].'"],["text"=>"'.$ch[7].'", "url"=>"'.$ch[8].'"],["text"=>"'.$ch[9].'", "url"=>"'.$ch[10].'"]],', FILE_APPEND);
file_put_contents("code/$from_id/code.php", "\n".'[["text"=>"'.$ch[1].'", "url"=>"'.$ch[2].'"],["text"=>"'.$ch[3].'", "url"=>"'.$ch[4].'"],["text"=>"'.$ch[5].'", "url"=>"'.$ch[6].'"],["text"=>"'.$ch[7].'", "url"=>"'.$ch[8].'"],["text"=>"'.$ch[9].'", "url"=>"'.$ch[10].'"]],', FILE_APPEND);
}
if(preg_match("/^(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)/", $o, $ch) and $n == 6){
file_put_contents("code/$from_id/lista.php", "\n".'[["text"=>"'.$ch[1].'", "url"=>"'.$ch[2].'"],["text"=>"'.$ch[3].'", "url"=>"'.$ch[4].'"],["text"=>"'.$ch[5].'", "url"=>"'.$ch[6].'"],["text"=>"'.$ch[7].'", "url"=>"'.$ch[8].'"],["text"=>"'.$ch[9].'", "url"=>"'.$ch[10].'"],["text"=>"'.$ch[11].'", "url"=>"'.$ch[12].'"]],', FILE_APPEND);
file_put_contents("code/$from_id/code.php", "\n".'[["text"=>"'.$ch[1].'", "url"=>"'.$ch[2].'"],["text"=>"'.$ch[3].'", "url"=>"'.$ch[4].'"],["text"=>"'.$ch[5].'", "url"=>"'.$ch[6].'"],["text"=>"'.$ch[7].'", "url"=>"'.$ch[8].'"],["text"=>"'.$ch[9].'", "url"=>"'.$ch[10].'"],["text"=>"'.$ch[11].'", "url"=>"'.$ch[12].'"]],', FILE_APPEND);
}
if(preg_match("/^(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)/", $o, $ch) and $n == 7){
file_put_contents("code/$from_id/lista.php", "\n".'[["text"=>"'.$ch[1].'", "url"=>"'.$ch[2].'"],["text"=>"'.$ch[3].'", "url"=>"'.$ch[4].'"],["text"=>"'.$ch[5].'", "url"=>"'.$ch[6].'"],["text"=>"'.$ch[7].'", "url"=>"'.$ch[8].'"],["text"=>"'.$ch[9].'", "url"=>"'.$ch[10].'"],["text"=>"'.$ch[11].'", "url"=>"'.$ch[12].'"],["text"=>"'.$ch[13].'", "url"=>"'.$ch[14].'"]],', FILE_APPEND);
file_put_contents("code/$from_id/code.php", "\n".'[["text"=>"'.$ch[1].'", "url"=>"'.$ch[2].'"],["text"=>"'.$ch[3].'", "url"=>"'.$ch[4].'"],["text"=>"'.$ch[5].'", "url"=>"'.$ch[6].'"],["text"=>"'.$ch[7].'", "url"=>"'.$ch[8].'"],["text"=>"'.$ch[9].'", "url"=>"'.$ch[10].'"],["text"=>"'.$ch[11].'", "url"=>"'.$ch[12].'"],["text"=>"'.$ch[13].'", "url"=>"'.$ch[14].'"]],', FILE_APPEND);
}
if(preg_match("/^(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)\n(.*) = (.*)/", $o, $ch) and $n == 8){
file_put_contents("code/$from_id/lista.php", "\n".'[["text"=>"'.$ch[1].'", "url"=>"'.$ch[2].'"],["text"=>"'.$ch[3].'", "url"=>"'.$ch[4].'"],["text"=>"'.$ch[5].'", "url"=>"'.$ch[6].'"],["text"=>"'.$ch[7].'", "url"=>"'.$ch[8].'"],["text"=>"'.$ch[9].'", "url"=>"'.$ch[10].'"],["text"=>"'.$ch[11].'", "url"=>"'.$ch[12].'"],["text"=>"'.$ch[13].'", "url"=>"'.$ch[14].'"],["text"=>"'.$ch[15].'", "url"=>"'.$ch[16].'"]],', FILE_APPEND);
file_put_contents("code/$from_id/code.php", "\n".'[["text"=>"'.$ch[1].'", "url"=>"'.$ch[2].'"],["text"=>"'.$ch[3].'", "url"=>"'.$ch[4].'"],["text"=>"'.$ch[5].'", "url"=>"'.$ch[6].'"],["text"=>"'.$ch[7].'", "url"=>"'.$ch[8].'"],["text"=>"'.$ch[9].'", "url"=>"'.$ch[10].'"],["text"=>"'.$ch[11].'", "url"=>"'.$ch[12].'"],["text"=>"'.$ch[13].'", "url"=>"'.$ch[14].'"],["text"=>"'.$ch[15].'", "url"=>"'.$ch[16].'"]],', FILE_APPEND);
}
}
file_put_contents("start/l$from_id.txt", "");
file_put_contents("code/$from_id/lista.php", "\n".']]);', FILE_APPEND);
file_put_contents("code/$from_id/code.php", "\n".']]]])]);', FILE_APPEND);

include "code/$from_id/lista.php";
$sens=file_get_contents("code/$from_id/tepe_code.txt");
$ss=str_replace("send","",$sens);
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"$gettxt",
'parse_mode'=>HTML,
'disable_web_page_preview'=>true,
"reply_markup"=>$list
]);
bot($sens,[
"chat_id"=>$chat_id,
"$ss"=>"$getfile_id",
'caption'=>"$getfull",
"reply_markup"=>$list
]);
/*
bot("sendvideo",[
"chat_id"=>$chat_id,
"video"=>"$getfile_id",
'caption'=>"$getfull",
"reply_markup"=>$list
]);
bot('sendsticker',[
'chat_id'=>$chat_id,
'sticker'=>"$getfile_id",
'caption'=>"$getfull",
"reply_markup"=>$list
]);
bot('sendvoice',[
'chat_id'=>$chat_id,
'voice'=>"$getfile_id",
'caption'=>"$getfull",
"reply_markup"=>$list
]);
*/
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"`@listcodebot $from_id`",
'parse_mode'=>markdown,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"➕ - صنع منشور - 🔘",'callback_data'=>"start"]],
[['text'=>'🔻 - شارك المنشور - 🔺', 'switch_inline_query'=>"$from_id"]],
]])
]);	
}
?> 