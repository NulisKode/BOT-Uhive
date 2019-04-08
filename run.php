<?php
// Ilyasa Fathur Rahman
// SGB-Team Reborn
set_time_limit(0);
error_reporting(0);
        function generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
        function getStr($string,$start,$end){
            $str = explode($start,$string);
            $str = explode($end,$str[1]);
            return $str[0];
        }
echo '####################################';
echo "\r\n";
echo '# Copyright : @ilyasa48 | SGB-Team #';
echo "\r\n";
echo '####################################';
echo "\r\n";
echo 'Masukkan Kode Referral (CD4Z9Q) : '; 
$code = trim(fgets(STDIN)); 
echo 'Masukkan Jumlah : '; 
$jumlah = trim(fgets(STDIN)); 
$i=1;
while($i <= $jumlah){
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://namefake.com/english-united-states/random/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Authority: namefake.com';
$headers[] = 'Cache-Control: max-age=0';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36 OPR/58.0.3135.118';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8';
$headers[] = 'Referer: https://namefake.com/english-united-states/random/f6f1c0e9b2f57e26695ea6d9997a5584';
$headers[] = 'Accept-Encoding: gzip, deflate, br';
$headers[] = 'Accept-Language: en-GB,en-US;q=0.9,en;q=0.8';
$headers[] = 'Cookie: _ga=GA1.2.1721516464.1553701505; _gid=GA1.2.703743984.1553878514; _gat=1';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);

$fullname = getStr($result, 'Generate</button></div></form><hr><h2>', '</h2>');
$device_key = generateRandomString(16);
$device_name = generateRandomString(5);
$fcm_token = "fX5ISvkoaIY:APA91bHEd1LwVw2kh90D6vd83zSbCpiY1dhBAZsx7pAd9MpeJRTSOQoffzq43kWc6M7D34r_wvqMPq8BCwIWBvpLwpZMwu1qHI7a3Vd7kY8ngaIm1dp93gzOaT-".generateRandomString(17);
$username = getStr($result, 'Username</div><div class="rght_h46">', '</div>');
$username = $username.generateRandomString(3);
$email = $username."@gmail.com";
$password = generateRandomString(8);

echo "\r\n";
echo "[$i] [".date('h:i:s')."] Mendaftar-kan Akun...";
echo "\r\n";

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://webapp.uhive.com/api/v1/users/signup');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"device":{"device_key":"'.$device_key.'","device_name":"samsung SM-'.$device_name.'","fcm_token":"'.$fcm_token.'","os_type":"2","os_version":"22","timezone_offset":420},"email":"'.$email.'","signup_extra_info":{"invitation_code":"'.$code.'"},"language":"en","name":"'.$fullname.'","password":"'.$password.'"}');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Host: webapp.uhive.com';
$headers[] = 'Skip_authorization: true';
$headers[] = 'Buildno: 2_0.5.4';
$headers[] = 'Content-Type: application/json; charset=UTF-8';
$headers[] = 'User-Agent: okhttp/3.10.0';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);

if(preg_match('/access_token/', $result)){
    echo "[$i] [".date('h:i:s')."] Berhasil";
    echo "\r\n";
}else if(preg_match('/error_message/', $result)){
    echo "[$i] [".date('h:i:s')."] Gagal";
    echo "\r\n";
}else{
    echo "[$i] [".date('h:i:s')."] Terjadi Kesalahan";
    echo "\r\n";
}


$i++;
}
