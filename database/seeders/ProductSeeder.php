<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'هدفون بی‌سیم Nova X',
                'slug' => 'nova-x-headphones',
                'short_description' => 'هدفون بی‌سیم با کیفیت صدای استودیویی و باتری ۳۰ ساعته',
                'description' => 'هدفون بی‌سیم Nova X برای کسانی طراحی شده که به کیفیت صدا اهمیت می‌دهند. با درایورهای ۴۰ میلی‌متری، صدای بم عمیق و فرکانس‌های بالای شفاف را تجربه خواهید کرد. گوشی‌های نرم و هدبند قابل تنظیم آن، استفاده طولانی‌مدت را بدون خستگی ممکن می‌کند. باتری داخلی تا ۳۰ ساعت پخش موسیقی با یک بار شارژ را پشتیبانی می‌کند و اتصال بلوتوث ۵.۲ پایداری بی‌نظیری در فاصله تا ۱۰ متر ارائه می‌دهد.',
                'price' => 2850000,
                'image' => 'images/products/nova-x-headphones.jpg',
                'category' => 'هدفون و ایرباد',
                'stock' => 24,
                'is_featured' => true,
            ],
            [
                'name' => 'کیبورد مکانیکی KeyPro K2',
                'slug' => 'keypro-k2-keyboard',
                'short_description' => 'کیبورد مکانیکی کامپکت با سوییچ قابل تعویض و نور RGB',
                'description' => 'کیبورد مکانیکی KeyPro K2 با چیدمان کامپکت ۷۵ درصد، فضای کمتری روی میز کار اشغال می‌کند بدون آنکه از کلیدهای کاربردی صرف‌نظر کند. سوییچ‌های هات‌سواپ این کیبورد امکان تعویض بدون نیاز به لحیم‌کاری را فراهم می‌کنند و بدنه آلومینیومی آن حس تایپ محکم و باکیفیتی ایجاد می‌کند. نور پس‌زمینه RGB با چندین حالت قابل تنظیم، ظاهری حرفه‌ای به میز کار شما می‌بخشد.',
                'price' => 4200000,
                'image' => 'images/products/keypro-k2-keyboard.jpg',
                'category' => 'کیبورد',
                'stock' => 15,
                'is_featured' => true,
            ],
            [
                'name' => 'ماوس بی‌سیم Aero M1',
                'slug' => 'aero-m1-mouse',
                'short_description' => 'ماوس بی‌سیم سبک با دقت بالا، مناسب کار و گیمینگ',
                'description' => 'ماوس بی‌سیم Aero M1 با وزن سبک و طراحی ارگونومیک، برای استفاده طولانی‌مدت در محیط کار یا گیمینگ ساخته شده است. سنسور اپتیکال با دقت ۱۶۰۰۰ DPI امکان کنترل دقیق در هر شرایطی را فراهم می‌کند و اتصال بی‌سیم ۲.۴ گیگاهرتز، تأخیر نزدیک به صفر ارائه می‌دهد. باتری داخلی آن تا ۷۰ ساعت با یک بار شارژ دوام می‌آورد.',
                'price' => 1650000,
                'image' => 'images/products/aero-m1-mouse.jpg',
                'category' => 'ماوس',
                'stock' => 32,
                'is_featured' => true,
            ],
            [
                'name' => 'پایه لپ‌تاپ FlexStand',
                'slug' => 'flexstand-laptop-stand',
                'short_description' => 'پایه آلومینیومی تاشو برای بهبود ارگونومی محیط کار',
                'description' => 'پایه لپ‌تاپ FlexStand از آلومینیوم درجه‌یک ساخته شده و ارتفاع و زاویه قابل تنظیم دارد تا لپ‌تاپ شما را در بهترین موقعیت برای کاهش فشار روی گردن و کمر قرار دهد. طراحی تاشوی آن حمل و جابه‌جایی را بسیار ساده می‌کند و پایه‌های ضدلغزش، ثبات کامل روی هر سطحی را تضمین می‌کنند. با اکثر لپ‌تاپ‌های ۱۱ تا ۱۷ اینچی سازگار است.',
                'price' => 890000,
                'image' => 'images/products/flexstand-laptop-stand.jpg',
                'category' => 'لوازم جانبی دسکتاپ',
                'stock' => 40,
                'is_featured' => false,
            ],
            [
                'name' => 'وب‌کم Full HD VisionCam',
                'slug' => 'visioncam-webcam',
                'short_description' => 'وبکم فول‌اچ‌دی با میکروفون داخلی برای تماس‌های تصویری واضح',
                'description' => 'وب‌کم VisionCam با ضبط ویدیوی فول‌اچ‌دی ۱۰۸۰p و نرخ فریم روان، کیفیت تصویر حرفه‌ای را به تماس‌های تصویری و پخش زنده شما اضافه می‌کند. میکروفون استریوی داخلی صدای واضح ضبط می‌کند و کلیپ قابل تنظیم آن روی هر مانیتور یا لپ‌تاپی به‌راحتی نصب می‌شود. تنظیم خودکار نور در شرایط مختلف نوری تصویری متعادل ارائه می‌دهد.',
                'price' => 3100000,
                'image' => 'images/products/visioncam-webcam.jpg',
                'category' => 'وبکم',
                'stock' => 18,
                'is_featured' => true,
            ],
            [
                'name' => 'هاب USB-C مدل Connect 7',
                'slug' => 'connect7-usb-hub',
                'short_description' => 'هاب ۷ پورت USB-C برای اتصال هم‌زمان چند دستگاه جانبی',
                'description' => 'هاب USB-C مدل Connect 7 با ۷ پورت متنوع شامل HDMI، USB 3.0، کارت‌خوان و پورت شارژ سریع، تمام نیازهای اتصال جانبی لپ‌تاپ‌های مدرن را پوشش می‌دهد. بدنه فلزی آن در برابر گرما و ضربه مقاوم است و طراحی جمع‌وجور آن حمل روزمره را بسیار راحت می‌کند. با مک‌بوک و اکثر لپ‌تاپ‌های دارای پورت USB-C سازگار است.',
                'price' => 1450000,
                'image' => 'images/products/connect7-usb-hub.jpg',
                'category' => 'هاب و اتصالات',
                'stock' => 27,
                'is_featured' => false,
            ],
            [
                'name' => 'شارژر فست شارژ ChargePro 67',
                'slug' => 'chargepro-67-charger',
                'short_description' => 'شارژر دیواری ۶۷ وات با قابلیت شارژ سریع، همراه کابل',
                'description' => 'شارژر ChargePro 67 با توان ۶۷ وات، گوشی‌های هوشمند و لپ‌تاپ‌های سبک را در کوتاه‌ترین زمان ممکن شارژ می‌کند. فناوری شارژ سریع GaN حرارت تولیدی را کاهش داده و بازدهی انرژی را افزایش می‌دهد. طراحی کوچک و سبک آن، همراه‌بردن روزمره را بسیار آسان می‌سازد و همراه کابل مناسب عرضه می‌شود.',
                'price' => 590000,
                'image' => 'images/products/chargepro-charger.jpg',
                'category' => 'شارژر و کابل',
                'stock' => 60,
                'is_featured' => false,
            ],
            [
                'name' => 'اسپیکر بلوتوثی BoomBox Mini',
                'slug' => 'boombox-mini-speaker',
                'short_description' => 'اسپیکر بلوتوثی قابل‌حمل با صدای قدرتمند و باتری طولانی',
                'description' => 'اسپیکر بلوتوثی BoomBox Mini صدایی پرقدرت و باس عمیق را در بدنه‌ای فشرده و قابل‌حمل ارائه می‌دهد. مقاومت در برابر آب و گردوغبار آن استفاده در فضای باز را بدون نگرانی ممکن می‌کند و باتری داخلی تا ۱۲ ساعت پخش موسیقی مداوم را پشتیبانی می‌کند. اتصال بلوتوث پایدار امکان جفت‌شدن سریع با گوشی و لپ‌تاپ را فراهم می‌کند.',
                'price' => 3650000,
                'image' => 'images/products/boombox-speaker.jpg',
                'category' => 'اسپیکر',
                'stock' => 12,
                'is_featured' => true,
            ],
            [
                'name' => 'ست لوازم جانبی رومیزی DeskKit',
                'slug' => 'deskkit-desk-organizer',
                'short_description' => 'ست سازمان‌دهی میز کار شامل جاقلمی و نگهدارنده موبایل',
                'description' => 'ست DeskKit میز کار شما را مرتب و کارآمد نگه می‌دارد. این ست شامل جاقلمی، نگهدارنده موبایل و محفظه‌ای برای وسایل کوچک است که از چوب و فلز باکیفیت ساخته شده‌اند. طراحی مینیمال آن با هر دکوراسیونی هماهنگ می‌شود و به شما کمک می‌کند وسایل ضروری را همیشه در دسترس داشته باشید.',
                'price' => 450000,
                'image' => 'images/products/deskkit-organizer.jpg',
                'category' => 'لوازم جانبی دسکتاپ',
                'stock' => 35,
                'is_featured' => false,
            ],
            [
                'name' => 'ایرپاد بی‌سیم AirBuds Pro',
                'slug' => 'airbuds-pro-earbuds',
                'short_description' => 'ایرباد بی‌سیم با حذف نویز فعال و کیس شارژ همراه',
                'description' => 'ایرپاد بی‌سیم AirBuds Pro با فناوری حذف نویز فعال، محیط اطراف را حذف کرده و تجربه شنیداری غرق‌کننده‌ای ارائه می‌دهد. طراحی داخل‌گوشی آن با اکثر گوش‌ها تناسب دارد و کیس شارژ همراه، تا ۲۴ ساعت پخش موسیقی اضافه را در سفر تأمین می‌کند. اتصال خودکار به دستگاه‌های اپل و اندروید را ساده می‌کند.',
                'price' => 5200000,
                'image' => 'images/products/airbuds-pro-earbuds.jpg',
                'category' => 'هدفون و ایرباد',
                'stock' => 20,
                'is_featured' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(['slug' => $product['slug']], $product);
        }
    }
}
