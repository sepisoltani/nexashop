<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'پنل مدیریت | نکسا شاپ')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-neutral-50 font-sans text-neutral-900 antialiased">

    <header class="border-b border-neutral-200 bg-white">
        <div class="mx-auto flex max-w-5xl items-center justify-between gap-4 px-4 py-4 sm:px-6">
            <a href="{{ route('admin.products.index') }}" class="flex items-center gap-2 text-lg font-bold text-neutral-900">
                <span class="flex size-8 items-center justify-center rounded-lg bg-brand text-sm text-white">N</span>
                پنل مدیریت نکسا شاپ
            </a>

            <div class="flex items-center gap-4 text-sm">
                <a href="{{ route('home') }}" target="_blank" class="text-neutral-500 hover:text-brand">مشاهده فروشگاه</a>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="rounded-full border border-neutral-300 px-4 py-1.5 font-medium text-neutral-600 transition hover:border-red-300 hover:text-red-500">
                        خروج
                    </button>
                </form>
            </div>
        </div>
    </header>

    <main class="mx-auto max-w-5xl px-4 py-10 sm:px-6">
        @if (session('status'))
            <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                {{ session('status') }}
            </div>
        @endif

        @yield('content')
    </main>

</body>
</html>
