<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ورود مدیر | نکسا شاپ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen items-center justify-center bg-neutral-50 font-sans text-neutral-900 antialiased">

    <div class="w-full max-w-sm px-4">
        <div class="mb-8 flex flex-col items-center gap-2">
            <span class="flex size-12 items-center justify-center rounded-2xl bg-brand text-xl font-bold text-white">N</span>
            <h1 class="text-xl font-bold text-neutral-900">ورود به پنل مدیریت نکسا شاپ</h1>
        </div>

        <form method="POST" action="{{ route('admin.login.store') }}" class="space-y-5 rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm">
            @csrf

            <div>
                <label for="email" class="mb-1.5 block text-sm font-medium text-neutral-700">ایمیل</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="w-full rounded-xl border border-neutral-300 px-4 py-2.5 text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-brand/20"
                >
                @error('email')
                    <p class="mt-1.5 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="mb-1.5 block text-sm font-medium text-neutral-700">رمز عبور</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    class="w-full rounded-xl border border-neutral-300 px-4 py-2.5 text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-brand/20"
                >
            </div>

            <label class="flex items-center gap-2 text-sm text-neutral-600">
                <input type="checkbox" name="remember" class="rounded border-neutral-300 text-brand focus:ring-brand/20">
                مرا به خاطر بسپار
            </label>

            <button type="submit" class="w-full rounded-full bg-brand px-6 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-brand-dark">
                ورود
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-neutral-500">
            <a href="{{ route('home') }}" class="hover:text-brand">بازگشت به فروشگاه</a>
        </p>
    </div>

</body>
</html>
