<?php

$string = json_decode(file_get_contents('php://input'));


function objectToArray( $object )
{
    if( !is_object( $object ) && !is_array( $object ) )
    {
        return $object;
    }
    if( is_object( $object ) )
    {
        $object = get_object_vars( $object );
    }
    return array_map( 'objectToArray', $object );
}


$result = objectToArray($string);
$user_id = $result['message']['from']['id'];
$text = $result['message']['text'];
$token = '417073580:AAE3NmIKjUlWpciCicfVgKH0f2OANU5uw7U';


$keyboard = array(
		'keyboard' => array(
			array("معرفی صنعت گرانول"),
				array("ایمیل", "وب سایت"),
				array("سفارشات", "تلفن های تماس","محصولات"),
		),'one_time_keyboard'=>true,'resize_keyboard'=>true);
$keyboard = json_encode($keyboard);


switch ($text) {
	case 'معرفی صنعت گرانول':
		$text_reply = "صنعت گرانول یک شرکت پیشرو در تولید تخصصی انواع گرانول و مستربچ می باشد که همگام با اهداف مدیریتی و با بهره گیری از تکنولوژی نوین و تجهیزات پیشرفته با بیش از چهار دهه تجربه در این زمینه، بستری را فراهم آورده تا محصولات خود را با بالاترین استاندارد و بهترین کیفیت در اختیار مصرف کنندگان قرار دهد.

پیشرفت، خلاقیت، کیفیت از اصول اولیه شرکت صنعت گرانول جهت بهبود مداوم در افزایش بازارهای رقابتی است و این شرکت توانسته با سرمایه گذاری بر روی پرسنل و دراختیار داشتن مهندسین متخصص، خطوط و تجهیزات پیشرفته و استفاده از تجربه و امکانات زیربنایی مدرن و فن آوری های پیشرفته طیف گسترده ای از شید رنگی را مطابق نیاز مشتریان عزیز شبیه سازی کرده و به عرضه تولید برساند که در همین راستا در سال 1380 موفق به اخذ گواهینامه ایزو 9002 از مؤسسه QMI   کانادا گردیده است.






@sanatgranule";
		break;




	case 'وب سایت':
		$text_reply = "http://sanat-granule.ir";
		break;

case 'ایمیل':
		$text_reply = "sanatgranule.qom@gmail.com";
		break;

case 'تلفن های تماس':
		$text_reply = "تلفن : 02536647513  و 02536647514  همراه : 09121519357";
		break;

case 'محصولات':
		$text_reply = "http://sanat-granule.ir";
		break;

case 'سفارشات':
		$text_reply = "@sanatgranule_qom ";
		break;




	
	default:
		$text_reply ="لطفاً گزینه مورد نظر را انتخاب نمائید";
		break;





}



$url = 'https://api.telegram.org/bot'.$token .'/sendMessage?text='.$text_reply.'&chat_id='.$user_id.'&reply_markup='.$keyboard;
$res = file_get_contents($url);
