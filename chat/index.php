<?php
error_reporting(0);
if(!$_POST["prompt"]){
   echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div>
    <form method="post"><textarea name="prompt"></textarea><button type="submit">easy</button></form>
    </div>
</body>
</html>';
}

session_reset();
session_start();
// if(session_id()==null || session_id() == 1){
//     session_regenerate_id();
// }

function RequestGpt(){
    // yc iam create-token
    // echo shell_exec('curl -H "Authorization: Bearer y0_AgAAAABE4orcAATuwQAAAAD0XWanDyJuBnTTR9ikxp53_fKnYcS1614" "https://resource-manager.api.cloud.yandex.net/resource-manager/v1/clouds"');
   
    // $IAM_TOKEN = "t1.9euelZrGypnMnpyUipCYm8aRx8ySzu3rnpWalM3Ny4qJy4nHyszMj4qPxo_l9PcUHV9T-e8yBjiM3fT3VEtcU_nvMgY4jM3n9euelZrNy5vLnZaJm5jIkcyZkZ2Xku_8xeuelZrNy5vLnZaJm5jIkcyZkZ2Xkg.9FNizpV6XWw1VZBQxf0is11CJxUobhQxY_2_oal-IVA-QXYsXplcXmEVtYAG8_DzjviMyEO34kr5_TJvR1zTCQ";
    $IAM_TOKEN = json_decode(shell_exec('curl -d "{\"yandexPassportOauthToken\":\"y0_AgAAAABE4orcAATuwQAAAAD0XWanDyJuBnTTR9ikxp53_fKnYcS1614\"}" "https://iam.api.cloud.yandex.net/iam/v1/tokens"'),true)["iamToken"];
    // echo shell_exec('export IAM_TOKEN="yc iam create-token"');
    // echo $IAM_TOKEN;
    // echo $IAM_TOKEN;
    // echo "<br>";

    $gpt_request = json_decode(shell_exec('curl --request POST -H "Content-Type: application/json" -H "Authorization: Bearer '.$IAM_TOKEN.'" -H "x-folder-id: b1gm2djijbbmmkvafti8" -d "@./gpt_files/gpt_body_'.session_id().'.json" "https://llm.api.cloud.yandex.net/foundationModels/v1/completion"'),true);
    if($gpt_request["error"]["grpcCode"]==16){
        print_r($gpt_request);
    }

    // print_r($gpt_request);
    $gpt_text = $gpt_request["result"]["alternatives"][0]["message"]["text"]; // Сгенерированый текст

    $gpt_InpToken = $gpt_request["result"]["usage"]["inputTextTokens"]; //Количество токенов сообщения
    $gpt_CmpToken = $gpt_request["result"]["usage"]["completionTokens"]; //Количество токенов задачи
    $gpt_TtlToken = $gpt_request["result"]["usage"]["totalTokens"]; //Общие количество токенов

    $gpt_modal = $gpt_request["result"]["modelVersion"]; // Версия модели (это скорее отладочная инфа, которая нигде не используеться)
    // P.S. если версия модели резко смениться модель забудет предыдущие сообщения

    $gpt_role = $gpt_request["result"]["alternatives"][0]["role"]; // Роль отправленного сообщения, инфы пока нет

    // Нижние используються в случае если Stream = true, и идёт остлеживание генерации
    $gpt_status = $gpt_request["result"]["alternatives"][0]["status"]; // Статус отправки

    function SendMessage($gpt_request){
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($gpt_request,JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    // Бан фильтр от Яндекса
    if($gpt_request["error"]["grpcCode"]==3){
        echo json_encode($array["result"]["alternatives"][0]["message"]["text"] = "Переформулируйте вопрос",JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    } else{
        SendMessage($gpt_request);
    }

   
}

function CreateRequest($text){
    $Request = [];
    $Request["modelUri"] = "gpt://b1gm2djijbbmmkvafti8/yandexgpt-lite";
    $Request["completionOptions"]["stream"] = false;
    $Request["completionOptions"]["temperature"] = 0.6;
    $Request["completionOptions"]["maxTokens"] = "2000";

    $Request["messages"][0]["role"] = "system";
    $Request["messages"][0]["text"] = "Ты ассистент, для помощи при выборе подходящего варианта дома на сайте Дом тим, использующий сервис от domik.space, ПЫТАЙСЯ СОКРОЩАТЬ СВОЙ ОТВЕТ ДО 2 ПРЕДЛОЖЕНИЙ";

    $Request["messages"][1]["role"] = "user";
    $Request["messages"][1]["text"] = $text;

    $Request = json_encode($Request,JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

    $json_file = fopen('./gpt_files/gpt_body_'.session_id().'.json',"w+");

    fwrite($json_file,$Request);
}

if ($_POST["prompt"]!="prompt"){
    CreateRequest($_POST["prompt"]);
    RequestGpt();
}else{
    echo "what";
}