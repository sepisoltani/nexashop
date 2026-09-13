@extends('layouts.app')

@section('title', 'نکسا شاپ | فروشگاه لوازم دیجیتال')

@section('content')

    <section class="relative overflow-hidden bg-white">
        <div class="mx-auto grid max-w-6xl items-center gap-10 px-4 py-16 sm:px-6 sm:py-24 lg:grid-cols-2">
            <div class="text-center lg:text-right">
                <span class="inline-block rounded-full bg-brand/10 px-4 py-1 text-sm font-medium text-brand">
                    فروشگاه لوازم دیجیتال
                </span>

                <h1 class="mt-6 text-4xl font-extrabold leading-tight text-neutral-900 sm:text-5xl">
                    لوازم جانبی که<br class="hidden sm:block">
                    <span class="text-brand">تجربه کار و بازی</span> شما را بهتر می‌کند
                </h1>

                <p class="mx-auto mt-6 max-w-md text-base leading-7 text-neutral-500 lg:mx-0">
                    از هدفون و کیبورد گرفته تا لوازم جانبی رومیزی؛ نکسا شاپ محصولاتی با کیفیت مطمئن و قیمت منصفانه برای میز کار شما فراهم کرده است.
                </p>

                <div class="mt-8 flex flex-col items-center justify-center gap-4 sm:flex-row lg:justify-start">
                    <a href="{{ route('products.index') }}" class="w-full rounded-full bg-brand px-8 py-3 text-center text-sm font-semibold text-white shadow-lg shadow-brand/30 transition hover:bg-brand-dark sm:w-auto">
                        مشاهده محصولات
                    </a>
                </div>
            </div>

            <div class="relative mx-auto w-full max-w-md">
                <div class="absolute -inset-4 -z-10 rounded-[2.5rem] bg-brand/10 blur-2xl"></div>
                <img
                    src="{{ asset('images/products/nova-x-headphones.jpg') }}"
                    alt="هدفون بی‌سیم Nova X"
                    class="aspect-square w-full rounded-3xl object-cover shadow-xl"
                >
            </div>
        </div>
    </section>

    @if ($categories->isNotEmpty())
        <section class="mx-auto max-w-6xl px-4 py-10 sm:px-6">
            <div class="flex flex-wrap items-center justify-center gap-3">
                @foreach ($categories as $category)
                    <span class="rounded-full border border-neutral-200 bg-white px-4 py-2 text-sm font-medium text-neutral-600">
                        {{ $category }}
                    </span>
                @endforeach
            </div>
        </section>
    @endif

    @if ($featuredProducts->isNotEmpty())
        <section class="mx-auto max-w-6xl px-4 py-10 sm:px-6">
            <div class="mb-8 flex items-end justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-neutral-900">محصولات ویژه</h2>
                    <p class="mt-1 text-sm text-neutral-500">پرطرفدارترین لوازم جانبی این هفته</p>
                </div>
                <a href="{{ route('products.index') }}" class="text-sm font-semibold text-brand hover:text-brand-dark">مشاهده همه ←</a>
            </div>

            <div class="grid grid-cols-2 gap-4 sm:gap-6 md:grid-cols-4">
                @foreach ($featuredProducts as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </section>
    @endif

    <section class="mx-auto max-w-6xl px-4 py-16 sm:px-6">
        <div class="grid gap-6 rounded-3xl bg-neutral-900 px-6 py-12 text-center text-white sm:grid-cols-3 sm:text-right">
            <div>
                <p class="text-lg font-bold">ارسال سریع</p>
                <p class="mt-2 text-sm leading-6 text-neutral-300">ارسال به سراسر کشور در کوتاه‌ترین زمان</p>
            </div>
            <div>
                <p class="text-lg font-bold">ضمانت اصالت کالا</p>
                <p class="mt-2 text-sm leading-6 text-neutral-300">تمامی محصولات دارای گارانتی معتبر هستند</p>
            </div>
            <div>
                <p class="text-lg font-bold">پشتیبانی مطمئن</p>
                <p class="mt-2 text-sm leading-6 text-neutral-300">پاسخ‌گویی به سوالات شما پیش و پس از خرید</p>
            </div>
        </div>
    </section>

@endsection
