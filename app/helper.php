<?php

use App\Models\Country;
use App\Models\Guest;
use App\Models\Setting;
use App\Models\User;
use App\Models\UserDevice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;

function admin_permissions()
{
    return [
        'admin'         => ['all'],
        'site'          => ['edit'],
        'guest'         => ['all'],
        'wishlist'      => ['all'],
        'social_media'  => ['all', 'add', 'edit', 'delete'],
        'banks'         => ['all', 'add', 'edit', 'delete'],
        'log'           => ['all'],
        'notifications' => ['all'],
        'groups'        => ['all', 'add', 'edit', 'delete'],
        'admins'        => ['all', 'add', 'edit', 'delete'],
        'users'         => ['all', 'add', 'edit', 'delete'],
        'reports'       => ['all'],
        'ads'           => ['all', 'add', 'edit', 'delete'],
        'slider'        => ['all', 'add', 'edit', 'delete'],
        'pages'         => ['all', 'add', 'edit', 'delete'],
        'contact'       => ['all'],
        'sizes'         => ['all', 'add', 'edit', 'delete'],
        'colors'        => ['all', 'add', 'edit', 'delete'],
        'category'      => ['all', 'add', 'edit', 'delete'],
        'product_type'  => ['all', 'add', 'edit', 'delete'],
        'product_brand' => ['all', 'add', 'edit', 'delete'],
        'tutorials'     => ['all', 'add', 'edit', 'delete'],
        'mall'          => ['all', 'add', 'edit', 'delete'],
        'stors'         => ['all', 'add', 'edit', 'delete'],
        'offers'        => ['all', 'add', 'edit', 'delete'],
    ];
}

function sidebar()
{
    include __DIR__ . '/sidebar.php';
    return $menu;
}



function api_response($data = null, $message = "", $status = "success", $status_code = 200)
{

    $response = [
        'status'  => $status ? 1 : 0,
        'message' => $message,
        'data'    => $data,
    ];
    try {
        if ($data) {
            $pagination = api_model_set_pagenation($data);
            if ($pagination) {
                $response['pagination'] = $pagination;
            } else {
                foreach ($data as $key => $row) {
                    if (is_string($key)) {
                        $pagination = api_model_set_pagenation($row);
                        if ($pagination) {
                            $response['pagination'] = $pagination;
                            break;
                        }
                    }
                }
            }
        }
    } catch
    (\Throwable $th) {
        //throw $th;
    }
    return response()->json($response, $status_code);
}

// function setTokenLang()
// {
//     $user = current_user();
//     $lang = request()->header('Lang');
//     if (isset($user->token) && $lang) {
//         $user->update(['lang' => $lang]);
//     } elseif (auth('api')->check()) {
//         $device = $user->device()->first() ?? new UserDevice();
//         $device->user_id = $user->id;
//         $device->token = request()->header('FbToken');
//         $device->platform = request()->header('Platform') ?? $device->platform ?? 'android';
//         $user->lang = $lang;
//         $device->save();
//         $user->save();
//     }
// }
if (!function_exists('api_model_set_pagenation')) {

    function api_model_set_pagenation($model)
    {
        if (is_object($model) && count((array)$model)) {
            try {
                $pagination['total'] = $model->total();
                $pagination['lastPage'] = $model->lastPage();
                $pagination['perPage'] = $model->perPage();
                $pagination['currentPage'] = $model->currentPage();
                return $pagination;
            } catch (\Exception$e) {
            }
        }
        return null;
    }
}

function send_sms($phone, $message)
{
    $username = "TBD ";
    $password = "TBD ";
    $cstId = "TBD ";
    $sender = "TBD ";
    $body = urlencode($message);
    $nums = $phone;

    $url = "https://www.smsbox.com/SMSGateway/Services/Messaging.asmx/Http_SendSMS?username={$username}&password={$password}&customerId={$cstId}&senderText={$sender}&messageBody={$body}&recipientNumbers={$nums}&isBlink=false&isFlash=false";
    $response = null;
    try {
        $response = file_get_contents($url);
    } catch (\Throwable$th) {
        //throw $th;
    }
    return $response;
}

function getLang($model, $col, $path = null)
{
    $lang = request()->header('Lang') ?? app()->getLocale() ?? 'ar';
    $val = trim(str_replace("\r\n", "", $model->{$lang . '_' . $col}));
    if (!$val) {
        return "";
    }

    return $path ? url($path . '/' . $val) : $val;
}

function send_mail($content)
{
    try {
        Mail::send('Html.view', $content, function ($mail) use ($content) {
            $mail->to($content['email'], $content['name']);
            $mail->subject($content['title']);
        });
    } catch (\Throwable$th) {
        //throw $th;
    }
}

function page_types()
{
    return [
        'page'   => __('Page'),
        'about'  => __('About us'),
        'policy' => __('Policy'),
        'terms'  => __('Terms'),
    ];
}

function current_user()
{
    $user = auth('api')->user();
    $guest = null;
    if ($token = request()->header('FbToken')) {
        $guest = Guest::firstOrCreate(['token' => $token]);
    }
    if ($guest && $user) {
        $guest->cart()->update(['user_id' => $user->id]);
    }
    if (!$user && !$guest) {
        return api_response(null, __('Header token is required'), 0);
    }
    return $user ?? $guest;
}

function get_currency()
{
    return __('KWD');
}

function app_setting($key, $default = '')
{
    return Setting::where('key', $key)->first()->value ?? $default;
}

function RealIpAddress()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
        $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote = $_SERVER['REMOTE_ADDR'];

    if (filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }

    return $ip;
}

function send_fcm($tokens, $platfrom, $title, $message, $model = 'general', $model_id = null, $topic = null)
{
    // dd($tokens, $message, $order_id);
    ob_start();
    $url = "https://fcm.googleapis.com/fcm/send";
    $serverKey = env('FCM_SERVER_KEY');
    //dd($serverKey);
    $notification = array(
        'text'         => $message,
        'title'        => $title ?? app_setting('title'),
        'body'         => $message,
        'type'         => $model,
        'id'           => (string)$model_id ?? '10101',
        'sound'        => 'default',
        'badge'        => '1',
        'click_action' => $model,
    );
    $tokens = (array)$tokens;
    if ($platfrom == 'android') {
        // $notification = array_unique($notification);
    } else {
        $notification['alert'] = [
            "title"          => $title ?? app_setting('title'),
            "body"           => $message,
            "text"           => $message,
            "action-loc-key" => "PLAY",
        ];
    }
    if ($topic) {
        $arrayToSend = array(
            'to'           => "/topics/$topic",
            // 'registration_ids' => $tokens,
            'notification' => $notification,
            'data'         => $notification,
            'priority'     => 'high',
        );
    } else {
        $arrayToSend = array(
            'registration_ids' => $tokens,
            'notification'     => $notification,
            'data'             => $notification,
            'priority'         => 'high',
        );
    }

    // dd($notification);

    // if ($platfrom == 'ios') {
    //     $arrayToSend = array(
    //         'registration_ids' => $tokens,
    //         'notification' => $notification,
    //         'data' => ['click_action' => "FLUTTER_NOTIFICATION_CLICK" , "id" => $id],
    //         'priority' => 'high',
    //     );
    // } else {
    //     // return true;
    //     $arrayToSend = array(
    //         'registration_ids' => $tokens,
    //         'data' => $notification,
    //         'priority' => 'high',
    //     );
    // }
    $json = json_encode($arrayToSend);
    $headers = array();
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'Authorization: key=' . $serverKey;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    //Send the request
    $response = curl_exec($ch);
    if (request('testi')) {
        dd($response, $tokens, $notification, $arrayToSend, $platfrom);
    }
    //Close request
    if ($response === false) {
        // die('FCM Send Error: ' . curl_error($ch));
    }
    // dd($json);
    curl_close($ch);
    ob_end_clean();
    return true;
}

function social_types()
{
    return [
        'facebook'  => __('Facebook'),
        'twitter'   => __('Twitter'),
        'instagram' => __('Instagram'),
    ];
}

function not_admin()
{
    return strpos(request()->url(), '/admin') === false;
}

function getCountry()
{
    $countryId = request()->header('CountryID') ?? 1;
    if (not_admin()) {
        $countryDefault = Country::select('id', 'currency', 'tax')->first();
        $country = Country::where('id', $countryId)->select('id', 'currency', 'tax')->first();
        return $country ?? $countryDefault;
    }

}

function setToken()
{
    $user = auth('api')->user();
    if (auth('api')->check()) {
        $device = $user->device()->first() ?? new UserDevice();
        $device->user_id = $user->id;
        $device->token = request()->header('FbToken');
        $device->platform = request()->header('Platform') ?? $device->platform ?? 'android';
        $device->save();
    }
}

function getDays()
{
    return [
        'Saturday'  => __('Saturday'),
        'Sunday'    => __('Sunday'),
        'Monday'    => __('Monday'),
        'Tuesday'   => __('Tuesday'),
        'Wednesday' => __('Wednesday'),
        'Thursday'  => __('Thursday'),
        'Friday'    => __('Friday'),
    ];
}

function getWeekDays()
{
    return [
        'Saturday',
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
    ];
}
