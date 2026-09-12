<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'slug', 'short_description', 'description', 'price', 'image', 'category', 'stock', 'is_featured'])]
class Product extends Model
{
    /** @use HasFactory<ProductFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'price' => 'integer',
            'stock' => 'integer',
            'is_featured' => 'boolean',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * A short list of generic display specifications based on the product's category.
     *
     * @return array<int, string>
     */
    public function specifications(): array
    {
        return match ($this->category) {
            'هدفون و ایرباد' => ['اتصال: بلوتوث ۵.۲', 'گارانتی: ۱۸ ماه', 'رنگ: مشکی'],
            'کیبورد' => ['نوع سوییچ: مکانیکی هات‌سواپ', 'اتصال: بی‌سیم و سیمی', 'گارانتی: ۱۲ ماه'],
            'ماوس' => ['سنسور: اپتیکال ۱۶۰۰۰ DPI', 'اتصال: بی‌سیم ۲.۴ گیگاهرتز', 'گارانتی: ۱۲ ماه'],
            'وبکم' => ['کیفیت تصویر: Full HD 1080p', 'میکروفون: استریوی داخلی', 'گارانتی: ۱۲ ماه'],
            'هاب و اتصالات' => ['تعداد پورت: ۷', 'جنس بدنه: آلومینیوم', 'گارانتی: ۱۲ ماه'],
            'شارژر و کابل' => ['توان: ۶۷ وات', 'فناوری: شارژ سریع GaN', 'گارانتی: ۱۲ ماه'],
            'اسپیکر' => ['مقاومت: ضدآب و گردوغبار', 'باتری: تا ۱۲ ساعت پخش', 'گارانتی: ۱۲ ماه'],
            default => ['جنس بدنه: باکیفیت و بادوام', 'مناسب استفاده روزمره', 'گارانتی: ۱۲ ماه'],
        };
    }
}
