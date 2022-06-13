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
function del($nomi){
        array_map('unlink', glob("step/$nomi.*"));
    }
    function put($fayl, $nima){
        file_put_contents("$fayl", "$nima");
    }
    

    function pstep($cid,$zn){
        file_put_contents("step/$cid.step",$zn);
    }

    function step($cid){
        $step = file_get_contents("step/$cid.step");
        $step += 1;
        file_put_contents("step/$cid.step",$step);
    }

    function nextTx($cid,$txt){
        $step = file_get_contents("step/$cid.txt");
        file_put_contents("step/$cid.txt","$step\n$txt");
    }

    function ty($ch){
        return bot('sendChatAction', [
            'chat_id' => $ch,
            'action' => 'typing',
        ]);
    }

    function ACL($callbackQueryId, $text = null, $showAlert = false)
    {
        return bot('answerCallbackQuery', [
            'callback_query_id' => $callbackQueryId,
            'text' => $text,
            'show_alert' => $showAlert,
        ]);
    }



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


$update = json_decode(file_get_contents('php://input'));
    $message = $update->message;
    $cid = $message->chat->id;
    $cidtyp = $message->chat->type;
    $miid = $message->message_id;
    $name = $message->chat->first_name;
    $user = $message->from->username;
    $tx = $message->text;
    $callback = $update->callback_query;
    $mmid = $callback->inline_message_id;
    $mes = $callback->message;
    $mid = $mes->message_id;
    $cmtx = $mes->text;
    $mmid = $callback->inline_message_id;
    $idd = $callback->message->chat->id;
    $cbid = $callback->from->id;
    $cbuser = $callback->from->username;
    $data = $callback->data;
    $ida = $callback->id;
    $cqid = $update->callback_query->id;
    $cbins = $callback->chat_instance;
    $cbchtyp = $callback->message->chat->type;
    $step = file_get_contents("step/$cid.step");
    $menu = file_get_contents("step/$cid.menu");
    $stepe = file_get_contents("step/$cbid.step");
    $menue = file_get_contents("step/$cbid.menu");
    // mkdir("step");


// TEST INPUT DATA FOR SQL INJECTIONS
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$maxsulatkeys = json_encode([
        'resize_keyboard'=>true,
        'keyboard' => [
          
            [['text' => "BLACK SHIMMER (ZXS09119)"],],
            [['text' => "WHITE PEARL (ZXS201118)"],],
            [['text' => "WHITE SHIMMER (ZXS201117)"],],
            [['text' => "😔 Bekor qilish"],],
           
        ]
    ]);

    $otex = "😔 Bekor qilish";

    $keys = json_encode([
        'resize_keyboard'=>true,
        'keyboard' => [
          
            [['text' => "ℹ️ Biz haqimizda"],['text' => "📞 Aloqa"],],
            //ℹ️ Biz haqimizda
            
            [['text' => "📍 Manzil"],['text' => "Online buyurtma berish"],],
             [['text' => "Maxsulotlar"],['text' => "🤝 Hamkorlar"],],
        ]
    ]);

    $otmen = json_encode([
        'resize_keyboard'=>true,
        'keyboard'=>[
            [['text'=>"$otex"],],
        ]
    ]);

    $manzil = json_encode(
        ['inline_keyboard' => [
        [['callback_data' => "😊 Awesome", 'text' => "😊 Awesome"],['callback_data' => "😕 So-so", 'text' => "😕 So-so"],],
        ]
    ]);

    $kurs = json_encode([
        'resize_keyboard' => true,
        'keyboard' => [
            [['text' => ""], ['text' => ""],],
             [['text' => ""], ['text' => ""],],
              [['text' => ""], ['text' => ""],],
     
        ]
    ]);
    
    $count = json_encode([
        'resize_keyboard' => true,
        'keyboard' => [
            [['text' => "10шт"], ['text' => "20шт"], ['text' => "50шт"], ['text' => "80шт"],],
            [['text' => "100шт"], ['text' => "200шт"],['text' => "500шт"],['text' => "800шт"],],
            [['text' => "1000шт"], ['text' => "2000шт"], ['text' => "5000шт"], ['text' => "8000шт"],],
            [['text' => "😔 Bekor qilish"],],
        ]
    ]);

    $tasdiq = json_encode(
        ['inline_keyboard' => [
            [['callback_data' => "ok", 'text' => "Ha 👍"],['callback_data' => "clear", 'text' => "Yo'q 👎"],],
        ]
    ]);

    if(isset($tx)){
        ty($cid);
    }



    if($tx == "/start"){
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Assalomu alaykum, $name!*\nGolden Quartz Stone MCHJ xizmatlaridan foydalanmoqdasiz",
            'parse_mode' => 'markdown',
            'reply_markup' => $keys,
        ]);
    }



    if ($tx == "ℹ️ Biz haqimizda") {
        bot('sendMessage', [
            'chat_id' => $cid,
            'text'=>"*Golden Quartz Stone MCHJ *\nQarshida sun'iy tosh ishlab chiqarish jarayonida jahon yetkazib beruvchilaridan eng zamonaviy uskunalar qo'llanilmoqda, bu esa yuqori texnologik sun'iy kvarts toshini ishlab chiqarish imkonini beradi.Mahsulotlarimiz turli sohalarda talabga ega. Kvarts toshlari xarid qilish markazlarida, shifoxonalarda, banklarda, idoralarda, mehmonxonalarda va oddiy uylarda ishlatilishi mumkin. Maxsus xususiyatlar to'plami tufayli sun'iy kvarts toshlari yorqinligi va rangini yo'qotmasdan uzoq vaqt davom etadi va uning past radioaktivligi bilan ajralib turadi.",
            'parse_mode' => 'markdown',
            'reply_markup' => $keys,
        ]);
    }

    if ($tx == "📞 Aloqa") {
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Biz bilan bog'lanish \nGolden Quartz Stone MCHJ *\n\n*📞 Tel.: +998 (95) 145-80-01 \n📧 E-mail: 1suvonovnurbek@gmail.com\n*🌐 Sayt: [https://gqs.uz]\n\n*Ijtimoiy tarmoqlarda:*\nTelegram: [t.me/Major099]\nInstagram: [https://www.instagram.com/goldenquartzstone/]\n\n[https://instagram.com/goldenquartzstone?igshid=YmMyMTA2M2Y=]",
            'parse_mode' => 'markdown',
            'reply_markup' => $keys,
        ]);
    }
    //38.85547689781331, 65.75550385053513

    if ($tx == "📍 Manzil") {
        bot('sendLocation', [
            'chat_id' => $cid,
            'latitude' => 38.85547689781331, 
            'longitude' => 65.75550385053513,
            'reply_markup' => $keys,
        ]);
        // $pdf = curl_file_create('itcenterimg.jpg', 'application/jpg');
        // bot('sendPhoto',[
        //     'chat_id'  => $cid,
        //     'photo' => $pdf,
        //     'caption'  => "Bizning manzil",
        // ]);
    }
        
    
    if ($tx == "Maxsulotlar") {
            $png = curl_file_create('1.png', 'application/png');
            bot('sendDocument',[
                'chat_id'=> $cid,
                'document' => $png,
                'caption'  => "Type: ZXS09119
Color: BLACK SHIMMER"
            ]);
            $png = curl_file_create('2.png', 'application/png');
            bot('sendDocument',[
                'chat_id'=> $cid,
                'document' => $png,
                'caption'  => "Type: ZXS201118
Color: WHITE PEARL"
            ]);
            $png = curl_file_create('3.png', 'application/png');
            bot('sendDocument',[
                'chat_id'=> $cid,
                'document' => $png,
                'caption'  => "Type: ZXS201117
Color: WHITE SHIMMER"
            ]);
            exit();
    }
   
   if ($tx == "🤝 Hamkorlar") {
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "*Bizning hamkorimiz: \nYadro *\n*📞 Tel.: +998 (99) 114-41-04 \n📧 E-mail: dnorqobilovtuit@gmail.com\n*🌐 Sayt: [https://yadrocoder.uz]\n\n*Ijtimoiy tarmoqlarda:*\nTelegram: [t.me/yadrocoder]",
            'parse_mode' => 'markdown',
            
        ]);
    }




 // register uchun
    if($tx == "Online buyurtma berish"){
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "F.I.O kiriting?\n(Masalan : Dilshodbek Norqobilov)",
            'parse_mode' => 'markdown',
            'reply_markup' => $otmen,
        ]);
        pstep($cid,"0");
        put("step/$cid.menu","register");
    }



    if($step == "0" and $menu == "register"){
        if($tx == $otex){}else{
            bot('sendMessage', [
                'chat_id' => $cid,
                'text' => "Qaysi maxsulotni buyuritma qilmoqchisiz?\n(Menudan tanglang  ... )",
                'parse_mode' => 'markdown',
                'reply_markup' => $maxsulatkeys,
            ]);
        nextTx($cid, "Mijoz F.I.O: ".$tx);
        step($cid);
        }
    }

    if($step == "1" and $menu == "register"){
        if($tx == $otex){}else{
            bot('sendMessage', [
                'chat_id' => $cid,
                'text' => "Mahsulot hajmi qancha bo'lishini xohlaysiz?\n(Menudan tanglang  ...)",
                'parse_mode' => 'markdown',
                'reply_markup' => $count,
            ]);
            nextTx($cid, "Mahsulot nomi: ".$tx);
            step($cid);
        }
    }
    

    

    if($step == "2" and $menu == "register"){
        bot('sendMessage', [
                'chat_id' => $cid,
                'text' => "Telefon raqamingizni kiriting?\n(Masalan : +99899 1234567)",
                'parse_mode' => 'markdown',
                'reply_markup' => $otmen,
            ]);
        nextTx($cid, "🎥 Taklif va e'tirozlaringiz: ".$tx);
        step($cid);
    }
    
    

    if($step == "3" and $menu == "register"){
        if($tx == $otex){}else{
            if(true){
            bot('sendMessage', [
                    'chat_id'=>$cid,
                    'text'=>"*Ma'lumotlar muvaffaqiyatli saqlandi*, Iltimos bot faoliyatini baholang?",
                    'parse_mode'=>'markdown',
                    'reply_markup' => $manzil,
                ]);
                nextTx($cid, "📞 Aloqa: ".$tx);
                step($cid);
            }else{
                bot('sendMessage', [
                'chat_id' => $cid,
                'text' => "Iltimos  quydagi formatda kiriting?\n(Masalan : +99899 1234567)",
                'parse_mode' => 'markdown',
                'reply_markup' => $otmen,
            ]);
            }
        }
    }

    if(isset($data) and $stepe == "4" and $menue == "register"){
        ACL($ida);
        $baza = file_get_contents("step/$cbid.txt");
        bot('sendMessage',[
            'chat_id'=>$cbid,
            'text'=>"<b>Sizning anketa tayyor bo'ldi, barchasi ma'lumotlaringiz tasdiqlaysizmi?</b>
            $baza\n☑️ Rating : $data",
            'parse_mode'=>'html',
            'reply_markup'=>$tasdiq,
        ]);
        nextTx($cbid, "👌 Rating: ".$data);
        step($cbid);
    }
//1252183667
    if($data == "ok" and $stepe == "5" and $menue == "register"){
        ACL($ida);
        $baza = file_get_contents("step/$cbid.txt");
        // bot('sendMessage',[
        //     'chat_id'=>$cbid,
        //     'text'=>"<b>Yangi tinglovchi!</b>Username: @$cbuser <a href='tg://user?id=$cbid'>Zaxira profili</a><code>$baza</code>",
        //     'parse_mode'=>'html',
        // ]);
        // bot('sendMessage',[
        //     'chat_id'=>$adminhelp,
        //     'text'=>"<b>Yangi tinglovchi!</b>
        //     Username: @$cbuser
        //     <a href='tg://user?id=$cbid'>Zaxira profili</a>$baza",
        //     'parse_mode'=>'html',
        // ]);
        
        
        
        $temp_key = "".time()."2".rand();
        $st = $pdo->prepare("INSERT INTO bots ( `chatid` , `izoh`, `tempkey`) VALUES (:chat_id,:izoh,:tempkey)");
        $st->bindParam(":chat_id", $cbid);
        $st->bindParam(":izoh",   $baza);
        $st->bindParam(":tempkey",  $temp_key);
        $exec = $st->execute();
        $st = $pdo->prepare("SELECT * FROM bots WHERE tempkey=:tempkey");
        $st->bindParam(":tempkey", $temp_key);
        $st->execute();
        $users  = $st->fetchAll();
        
        
        foreach($users as $user){
            
            bot('sendMessage',[
            'chat_id'=>"1756598493",
            'text'=>"<b>Buyuritma telegram bot orqali qabul qilindi</b>\nBuyurtma raqami #".$user['ids']."\nBuyurtma vaqti: ".substr($user['regtime'],0,19)."\n✅ Sizning anketangiz xodimlarimizga muvaffaqiyatli jo'natildi, qisqa fursatlarda sizga aloqaga chiqamiz! E'tiboringiz uchun rahmat\n.".$baza,
            'parse_mode'=>'html',
            'reply_markup'=>$keys,
        ]);
            
        bot('sendMessage',[
            'chat_id'=>$cbid,
            'text'=>"<b>Buyuritma telegram bot orqali qabul qilindi</b>\nBuyurtma raqami #".$user['ids']."\nBuyurtma vaqti: ".substr($user['regtime'],0,19)."\n✅ Sizning anketangiz xodimlarimizga muvaffaqiyatli jo'natildi, qisqa fursatlarda sizga aloqaga chiqamiz! E'tiboringiz uchun rahmat\n".$baza,
            'parse_mode'=>'html',
            'reply_markup'=>$keys,
        ]);

        }
        
        
        del($cbid);
    }
    if($tx == $otex or $data == "clear"){
    ACL($ida);
    del($cbid);
    del($cid);
    if(isset($tx)) $url = "$cid";
    if(isset($data)) $url = "$cbid";
    bot('sendMessage', [
    'chat_id'=>$url,
    'text'=>"Anketa bekor qilindi!",
    'reply_markup'=>$keys,
    ]);
    }









