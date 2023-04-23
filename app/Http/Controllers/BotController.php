<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BotController extends Controller
{
    public function post(Request $request)
    {
        $token = "6137521058:AAEJ7LWRwRp2TcylMIWaCKI80oXpnbX01Sk";
        $chat_id = "-1001936066262";

        $data = $request->data;

        $txt = '';

        foreach ($data as $key => $item) {
            foreach ($item as $key => $item) {
                if (is_array($item)) {
                    foreach ($item as $key => $value) {
                        $txt .= "<b>" . $key . ":</b> " . $value . "%0A";
                    }
                } else {
                    $txt .= $item . "%0A";
                }
            }
        }

        $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}", "r");

        if ($sendToTelegram) {
            return response()->json(['success' => 'Ваше сообщение отправлено, скоро с вами свяжется специалист.']);
        } else {
            return response()->json(['errors' => 'Ваше сообщение не отправлено, попробуйте снова']);
        }
    }
}
