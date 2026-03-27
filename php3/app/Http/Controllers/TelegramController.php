<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{
    public function handle(Request $request)
    {
        // 1. Nhận dữ liệu
        $duLieuTuTelegram = Telegram::getWebhookUpdate();
        $tinNhan = $duLieuTuTelegram->getMessage();

        if (!$tinNhan) {
            return response()->json(['trang_thai' => 'khong_co_tin_nhan']);
        }

        $idCanGuiLai = $tinNhan->getChat()->getId();
        $noiDungNguoiTaGo = $tinNhan->getText();
        $tenNguoiGui = $tinNhan->getFrom()->getFirstName();
       
        
        switch (strtolower($noiDungNguoiTaGo)) { 

            case '/start':
                $cauTraLoi = "Chào $tenNguoiGui! Tôi là <b>Azox</b>.";
                break;

            case 'menu':
                $cauTraLoi = "Danh sách lệnh của mình đây:\n1. Git\n2. Gõ 'thong tin' để xem ID của bạn\n3. Link group telegram";
                break;

            case 'xin chào, chào, hello, hi':
                $cauTraLoi = "Chào bạn $tenNguoiGui nha! Chúc bạn một ngày code vui vẻ!";
                break;
            case 'link web':
                $cauTraLoi = "
                <tg-spoiler>
                https://t.me/webguild\nhttps://t.me/webbeks
                </tg-spoiler>";
                break;
            case 'thong tin':
                $cauTraLoi = "Tên Telegram của bạn là: $tenNguoiGui \nID bảo mật của bạn là: $idCanGuiLai";
                break;
            case '1':
                $cauTraLoi = "https://github.com/ydangnie/php3_-Laravel-vue";
                break;
            default:
                
                $cauTraLoi = "Dạ, mình chưa được lập trình để hiểu câu: '$noiDungNguoiTaGo'. Bạn gõ 'menu' thử xem sao nhé!";
                break;
        }

        // 4. Ra lệnh cho Bot gửi tin nhắn đi
        Telegram::sendMessage([
            'chat_id' => $idCanGuiLai,
            'text' => $cauTraLoi,
            'parse_mode' => 'HTML',
            'protect_content' => true,
           

        ]);

        return response()->json(['trang_thai' => 'thanh_cong']);
    }
}
