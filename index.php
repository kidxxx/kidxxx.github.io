<?php

$ch = curl_init();
$curlurl = "https://k1080.net".$_GET['url'];
$referurl = "https://k1080.net/";
$ip=mt_rand(11, 191).".".mt_rand(0, 240).".".mt_rand(1, 240).".".mt_rand(1, 240);   //随机ip
$agentarry=[
    //PC端的UserAgent
    "safari 5.1 – MAC"=>"Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.11 (KHTML, like Gecko) Chrome/20.0.1132.57 Safari/536.11",
    "safari 5.1 – Windows"=>"Mozilla/5.0 (Windows; U; Windows NT 6.1; en-us) AppleWebKit/534.50 (KHTML, like Gecko) Version/5.1 Safari/534.50",
    "Firefox 38esr"=>"Mozilla/5.0 (Windows NT 10.0; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0",
    "IE 11"=>"Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; .NET4.0C; .NET4.0E; .NET CLR 2.0.50727; .NET CLR 3.0.30729; .NET CLR 3.5.30729; InfoPath.3; rv:11.0) like Gecko",
    "IE 9.0"=>"Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0",
    "IE 8.0"=>"Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0)",
    "IE 7.0"=>"Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0)",
    "IE 6.0"=>"Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)",
    "Firefox 4.0.1 – MAC"=>"Mozilla/5.0 (Macintosh; Intel Mac OS X 10.6; rv:2.0.1) Gecko/20100101 Firefox/4.0.1",
    "Firefox 4.0.1 – Windows"=>"Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1",
    "Opera 11.11 – MAC"=>"Opera/9.80 (Macintosh; Intel Mac OS X 10.6.8; U; en) Presto/2.8.131 Version/11.11",
    "Opera 11.11 – Windows"=>"Opera/9.80 (Windows NT 6.1; U; en) Presto/2.8.131 Version/11.11",
    "Chrome 17.0 – MAC"=>"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_0) AppleWebKit/535.11 (KHTML, like Gecko) Chrome/17.0.963.56 Safari/535.11",
    "傲游（Maxthon）"=>"Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Maxthon 2.0)",
    "腾讯TT"=>"Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; TencentTraveler 4.0)",
    "世界之窗（The World） 2.x"=>"Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1)",
    "世界之窗（The World） 3.x"=>"Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; The World)",
    "360浏览器"=>"Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; 360SE)",
    "搜狗浏览器 1.x"=>"Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; SE 2.X MetaSr 1.0; SE 2.X MetaSr 1.0; .NET CLR 2.0.50727; SE 2.X MetaSr 1.0)",
    "Avant"=>"Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Avant Browser)",
    "Green Browser"=>"Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1)",
    //移动端口
    "safari iOS 4.33 – iPhone"=>"Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_3_3 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8J2 Safari/6533.18.5",
    "safari iOS 4.33 – iPod Touch"=>"Mozilla/5.0 (iPod; U; CPU iPhone OS 4_3_3 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8J2 Safari/6533.18.5",
    "safari iOS 4.33 – iPad"=>"Mozilla/5.0 (iPad; U; CPU OS 4_3_3 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8J2 Safari/6533.18.5",
    "Android N1"=>"Mozilla/5.0 (Linux; U; Android 2.3.7; en-us; Nexus One Build/FRF91) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1",
    "Android QQ浏览器 For android"=>"MQQBrowser/26 Mozilla/5.0 (Linux; U; Android 2.3.7; zh-cn; MB200 Build/GRJ22; CyanogenMod-7) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1",
    "Android Opera Mobile"=>"Opera/9.80 (Android 2.3.4; Linux; Opera Mobi/build-1107180945; U; en-GB) Presto/2.8.149 Version/11.10",
    "Android Pad Moto Xoom"=>"Mozilla/5.0 (Linux; U; Android 3.0; en-us; Xoom Build/HRI39) AppleWebKit/534.13 (KHTML, like Gecko) Version/4.0 Safari/534.13",
    "BlackBerry"=>"Mozilla/5.0 (BlackBerry; U; BlackBerry 9800; en) AppleWebKit/534.1+ (KHTML, like Gecko) Version/6.0.0.337 Mobile Safari/534.1+",
    "WebOS HP Touchpad"=>"Mozilla/5.0 (hp-tablet; Linux; hpwOS/3.0.0; U; en-US) AppleWebKit/534.6 (KHTML, like Gecko) wOSBrowser/233.70 Safari/534.6 TouchPad/1.0",
    "UC标准"=>"NOKIA5700/ UCWEB7.0.2.37/28/999",
    "UCOpenwave"=>"Openwave/ UCWEB7.0.2.37/28/999",
    "UC Opera"=>"Mozilla/4.0 (compatible; MSIE 6.0; ) Opera/UCWEB7.0.2.37/28/999",
    "微信内置浏览器"=>"Mozilla/5.0 (Linux; Android 6.0; 1503-M02 Build/MRA58K) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/37.0.0.0 Mobile MQQBrowser/6.2 TBS/036558 Safari/537.36 MicroMessenger/6.3.25.861 NetType/WIFI Language/zh_CN",
   // ""=>"",
 
];
//$useragent="Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.11 (KHTML, like Gecko) Chrome/20.0.1132.57 Safari/536.11";  //要得到类似这样useranget 可以自定义
$useragent=$agentarry[array_rand($agentarry,1)];  //随机浏览器useragent
$header = array(
    'CLIENT-IP:'.$ip,
    'X-FORWARDED-FOR:'.$ip,
);    //构造ip
curl_setopt($ch, CURLOPT_URL, $curlurl); //要抓取的网址
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_REFERER, $referurl);  //模拟来源网址
curl_setopt($ch, CURLOPT_USERAGENT, $useragent); //模拟常用浏览器的useragent
 
$page_content = curl_exec($ch);
curl_close($ch);
//echo $page_content;


	$d2 =  strstr ( $page_content,  '"url_next":"' );
    $ds2 =  strstr ( $d2 ,  '","from":"niuxyun"',true );
    //echo $ds2;
    $a2=substr($ds2,12);
//echo $a2;
$data = @file_get_contents("http://jx.yizhimianfei.cn/g1.php?url=".$a2);
 
	$d =  strstr ( $data ,  '/file_u/' );
    $ds =  strstr ( $d ,  '";',true );
    //echo $ds;
    //$a2=substr($ds2,21);
    //echo "\r\n";
     //echo $a2;
    
$data1 = @file_get_contents("https://g.shumafen.cn/api/".$ds);
 
	$d1 =  strstr ( $data1 ,'video src=' );
	//echo $d1;
    $ds1 =  strstr ( $d1 , '" controls="controls"',true );
    //echo $ds1;

$a21=substr($ds1,11);
//echo $a21;





//header_array = get_headers($a21, true);
//$size = $header_array['Content-Length'];
//echo $size;

while(httpcodeCheck($a21)!==200){
curl_setopt($ch, CURLOPT_URL, $curlurl); //要抓取的网址
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_REFERER, $referurl);  //模拟来源网址
curl_setopt($ch, CURLOPT_USERAGENT, $useragent); //模拟常用浏览器的useragent
 
$page_content = curl_exec($ch);
curl_close($ch);
//echo $page_content;


	$d2 =  strstr ( $page_content,  '"url_next":"' );
    $ds2 =  strstr ( $d2 ,  '","from":"niuxyun"',true );
    //echo $ds2;
    $a2=substr($ds2,12);



 $data = @file_get_contents("http://jx.yizhimianfei.cn/g1.php?url=".$a2);
 
	$d =  strstr ( $data ,  '/file_u/' );
    $ds =  strstr ( $d ,  '";',true );
    //echo $ds;
    //$a2=substr($ds2,21);
    //echo "\r\n";
     //echo $a2;
    
$data1 = @file_get_contents("https://g.shumafen.cn/api/".$ds);
 
	$d1 =  strstr ( $data1 ,'video src=' );
	//echo $d1;
    $ds1 =  strstr ( $d1 , '" controls="controls"',true );
    //echo $ds1;

$a21=substr($ds1,11);
}


function httpcodeCheck($url){
	  $ch = curl_init();
	  $timeout =3;
	  curl_setopt($ch, CURLOPT_TIMEOUT, 3);
	  curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
	  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	  curl_setopt($ch, CURLOPT_HEADER, 1);
	  curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,$timeout);
	  curl_setopt($ch,CURLOPT_URL,$url);
	  curl_exec($ch);
	  return $httpcode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
	  curl_close($ch);
	}












?>
<html>
<head>
    <meta charset="utf-8">
    <!--<script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>-->
    <meta name="referrer" content="same-origin">
    <meta name="viewport" content="initial-scale=1.0,user-scalable=no">
</head>
<body>
<div style="width:100%;height:100%" id="player">
</div>
<body background="clouds.gif">
<body background="https://www.bde4.com/images/play_window_pic.png">
<style type="text/css">
    body, html, .dplayer {
        padding: 0;
        margin: 0;
        width: 100%;
        height: 100%;
        background-color:#000;
    }
    a {
        text-decoration: none;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
<script src="https://cdn.bootcss.com/flv.js/1.4.2/flv.min.js"></script>
<script src="http://jx.yizhimianfei.cn/js/DPlayer.min.js"></script>
<link rel="stylesheet" href="https://cdn.staticfile.org/dplayer/1.25.0/DPlayer.min.css">
<script type="text/javascript">
    var buffering=false;
    var last_time='';
    var now_time='';
    var same_time=0;
    var isiPad = navigator.userAgent.match(/iPad|iPhone|Android|Linux|iPod/i) != null;
    if(isiPad){
        document.getElementById('player').innerHTML = '<video src="<?php echo $a21; ?>" x5-video-player-type="h5" controls="controls" preload="preload" poster="" width="100%" height="100%" x-webkit-airplay="allow"></video>';
    }else {
        var dplayer = new DPlayer({
            element: document.getElementById("player"),
            autoplay: 0,
            video: {
                url: "<?php echo $a21; ?>"
            }
        });

    }
</script>
</html>
