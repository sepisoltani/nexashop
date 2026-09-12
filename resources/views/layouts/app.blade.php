<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'نکسا شاپ | فروشگاه لوازم دیجیتال')</title>
    <meta name="description" content="نکسا شاپ، فروشگاه آنلاین لوازم دیجیتال و جانبی؛ هدفون، کیبورد، ماوس و لوازم رومیزی با کیفیت و قیمت مناسب.">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-neutral-50 font-sans text-neutral-900 antialiased">

    <header class="sticky top-0 z-30 border-b border-neutral-200 bg-white/90 backdrop-blur">
        <div class="mx-auto flex max-w-6xl items-center justify-between gap-4 px-4 py-4 sm:px-6">
            <a href="{{ route('home') }}" class="flex items-center gap-2 text-xl font-bold text-neutral-900">
                <span class="flex size-9 items-center justify-center rounded-xl bg-brand text-white">N</span>
                نکسا شاپ
            </a>

            <nav class="hidden items-center gap-8 text-sm font-medium text-neutral-600 sm:flex">
                <a href="{{ route('home') }}" class="transition hover:text-brand {{ request()->routeIs('home') ? 'text-brand' : '' }}">خانه</a>
                <a href="{{ route('products.index') }}" class="transition hover:text-brand {{ request()->routeIs('products.*') ? 'text-brand' : '' }}">محصولات</a>
            </nav>

            <a href="{{ route('products.index') }}" class="rounded-full bg-brand px-5 py-2 text-sm font-semibold text-white shadow-sm shadow-brand/30 transition hover:bg-brand-dark">
                مشاهده فروشگاه
            </a>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="mt-20 border-t border-neutral-200 bg-white">
        <div class="mx-auto max-w-6xl px-4 py-10 sm:px-6">
            <div class="flex flex-col items-center justify-between gap-6 sm:flex-row">
                <div>
                    <div class="flex items-center gap-2 text-lg font-bold text-neutral-900">
                        <span class="flex size-8 items-center justify-center rounded-lg bg-brand text-white">N</span>
                        نکسا شاپ
                    </div>
                    <p class="mt-2 max-w-sm text-sm leading-6 text-neutral-500">
                        فروشگاه لوازم دیجیتال؛ انتخابی مطمئن برای خرید هدفون، کیبورد، ماوس و لوازم جانبی رومیزی.
                    </p>
                </div>

                <nav class="flex flex-wrap items-center justify-center gap-x-8 gap-y-2 text-sm text-neutral-600">
                    <a href="{{ route('home') }}" class="hover:text-brand">خانه</a>
                    <a href="{{ route('products.index') }}" class="hover:text-brand">محصولات</a>
                    <a href="{{ route('admin.login') }}" class="hover:text-brand">ورود مدیر</a>
                </nav>
            </div>

            <p class="mt-8 border-t border-neutral-100 pt-6 text-center text-xs text-neutral-400">
                تمامی حقوق برای نکسا شاپ محفوظ است &copy; {{ now()->format('Y') }}
            </p>
        </div>
    </footer>

</body>
</html>
