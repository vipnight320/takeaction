<?php
// 現在の年月日を取得
$year = date('Y');
$month = date('n');
$today = date('j');

    $start_date = date("Y-m-01", time());
    $end_date = date("Y-m-t", time());
    $api_key = 'AIzaSyB1s0zbXK1v6PLz-PSkdOfZF4njs0Fw7PY';
    $holidays_id = 'japanese__ja@holiday.calendar.google.com';
    $holidays_url = sprintf(
        'https://www.googleapis.com/calendar/v3/calendars/%s/events?'.
        'key=%s&timeMin=%s&timeMax=%s&maxResults=%d&orderBy=startTime&singleEvents=true',
        $holidays_id,
        $api_key,
        $start_date,
        $end_date,
        //取得する祝日の件数
        30  
    );
    function getApiDataCurl($url){
        $option = [
            CURLOPT_RETURNTRANSFER => true, //文字列として返す
            CURLOPT_TIMEOUT        => 5, // タイムアウト時間
        ];
        if( $results = curl_init($holidays_url, true)){

        $results = json_decode($results);
        curl_setopt_array($results, $option);
        $json    = curl_exec($results);
        $info    = curl_getinfo($results);
        $errorNo = curl_errno($results);

        // OK以外はエラーなので空白配列を返す
        if ($errorNo !== CURLE_OK) {
            // 詳しくエラーハンドリングしたい場合はerrorNoで確認
            // タイムアウトの場合はCURLE_OPERATION_TIMEDOUT
            return [];
        }

        // 200以外のステータスコードは失敗とみなし空配列を返す
        if ($info['http_code'] !== 200) {
            return [];
        }
            $holidays = array();
            foreach($results->items as $item)
                $date = strtotime((string) $item->start->date);
                $title = (string) $item->summary;
                $holidays[date('Y-m-d', $date)] = $title;
            ksort($holidays);
            var_dump($date);
            var_dump($title);
            var_dump($holidays);
        }
    }
?>


