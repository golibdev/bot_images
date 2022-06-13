<?php




ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

// // PDO BASED DATABASE CONFIGURATIONS
$db_con   = 'mysql:dbname=gqsuz_smart;host=localhost;charset=utf8mb4';
$password = 'dilshodbek##2022';
$user     = 'gqsuz_dilshodbek';
$pdo      = new PDO($db_con, $user, $password);
$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );


define('API_KEY', '5361165161:AAFesOAbivWIEHwDbnVcO_CHZYs_MvXuLzk');

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



$icon_ph = "📞";
$icon_user = "🙎‍♂️";
$icon_email = "📥";
$icon_comment = "✍️";
$icon_time = "⏰";




if ($_SERVER['REQUEST_METHOD']=='POST') {
    $fullname = $_POST["fullname"];
    $phonenumber = $_POST["phonenumber"];
    // $email = $_POST["email"];
    $comment = $_POST["comment"];
    $currentTimeinSeconds = time(); 
    $currentDate = date('Y-m-d H:i:s', $currentTimeinSeconds);
  if($fullname!=""){
    $eee = "1756598493";
    $temp_key = "".time()."2".rand();
    $st = $pdo->prepare("INSERT INTO baza ( `chatid` ,  `fio` , `phone`, `izoh`, `tempkey`) VALUES (:chat_id,:fio,:phone,:izoh,:tempkey)");
    $st->bindParam(":chat_id", $eee);
    $st->bindParam(":fio",   $fullname);
    $st->bindParam(":phone",   $phonenumber);
    $st->bindParam(":izoh",   $comment);
    $st->bindParam(":tempkey",  $temp_key);
    $exec = $st->execute();
     
    $st = $pdo->prepare("SELECT * FROM baza WHERE tempkey=:tempkey");
    $st->bindParam(":tempkey", $temp_key);
    $st->execute();
    $users  = $st->fetchAll();
      
    foreach($users as $user){
        //  Dilshod
    bot('sendMessage',[
        'chat_id'=> '1756598493',
        'text'   => "<b>Sayt orqali qabul qilindi</b>\nBuyurtma raqami #".$user['ids']."\n".$icon_time." Sana : <b>".substr($user['regtime'],0,19)."</b>\n".$icon_user." F.I.O <b>".$user['fio']."</b>\n".$icon_ph." Telefon raqami: <b>".$user['phone']."</b>\n".$icon_comment." Izoh: <b>".$user['izoh']."</b>",
        'parse_mode' => "HTML"
    ]);
    bot('sendMessage',[
        'chat_id'=> '647237292',
        'text'   => "<b>Sayt orqali qabul qilindi</b>\nBuyurtma raqami #".$user['ids']."\n".$icon_time." Sana : <b>".substr($user['regtime'],0,19)."</b>\n".$icon_user." F.I.O <b>".$user['fio']."</b>\n".$icon_ph." Telefon raqami: <b>".$user['phone']."</b>\n".$icon_comment." Izoh: <b>".$user['izoh']."</b>",
        'parse_mode' => "HTML"
    ]);
    bot('sendMessage',[
        'chat_id'=> '201708816',
        'text'   => "<b>Sayt orqali qabul qilindi</b>\nBuyurtma raqami #".$user['ids']."\n".$icon_time." Sana : <b>".substr($user['regtime'],0,19)."</b>\n".$icon_user." F.I.O <b>".$user['fio']."</b>\n".$icon_ph." Telefon raqami: <b>".$user['phone']."</b>\n".$icon_comment." Izoh: <b>".$user['izoh']."</b>",
        'parse_mode' => "HTML"
    ]);
    
    }
    
    // //Maruf
    // bot('sendMessage',[
    //     'chat_id'=> '647237292',
    //     'text'   => $icon_time." Sana : <b>".$currentDate."</b>\n".$icon_user." F.I.O <b>".$fullname."</b>\n".$icon_ph." Telefon raqami: <b>".$phonenumber."</b>\n".$icon_comment." Izoh: <b>".$comment."</b>",
    //     'parse_mode' => "HTML"
    // ]);
    // // Nurbek
    // bot('sendMessage',[
    //     'chat_id'=> '201708816',
    //     'text'   => $icon_time." Sana : <b>".$currentDate."</b>\n".$icon_user." F.I.O <b>".$fullname."</b>\n".$icon_ph." Telefon raqami: <b>".$phonenumber."</b>\n".$icon_comment." Izoh: <b>".$comment."</b>",
    //     'parse_mode' => "HTML"
    // ]);
    
    header("Location: https://gqs.uz/index.html",true, 301); 
    exit();
  }
}

