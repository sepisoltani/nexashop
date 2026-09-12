@extends('layouts.app')

@section('title', $product->name.' | نکسا شاپ')

@section('content')

    <section class="mx-auto max-w-6xl px-4 py-10 sm:px-6">
        <nav class="mb-6 text-sm text-neutral-500">
            <a href="{{ route('home') }}" class="hover:text-brand">خانه</a>
            <span class="mx-1">/</span>
            <a href="{{ route('products.index') }}" class="hover:text-brand">محصولات</a>
            <span class="mx-1">/</span>
            <span class="text-neutral-700">{{ $product->name }}</span>
        </nav>

        <div class="grid gap-10 lg:grid-cols-2">
            <div class="overflow-hidden rounded-3xl bg-neutral-100 shadow-sm">
                <img
                    src="{{ asset($product->image) }}"
                    alt="{{ $product->name }}"
                    class="aspect-square w-full object-cover"
                >
            </div>

            <div class="flex flex-col">
                <span class="text-sm font-medium text-brand">{{ $product->category }}</span>
                <h1 class="mt-2 text-3xl font-extrabold text-neutral-900">{{ $product->name }}</h1>

                <p class="mt-4 text-lg leading-7 text-neutral-500">{{ $product->short_description }}</p>

                <div class="mt-6 flex items-center gap-4">
                    <span class="text-3xl font-extrabold text-neutral-900">{{ number_format($product->price) }} تومان</span>

                    @if ($product->stock > 0)
                        <span class="rounded-full bg-emerald-50 px-3 py-1 text-sm font-medium text-emerald-600">
                            {{ $product->stock }} عدد موجود
                        </span>
                    @else
                        <span class="rounded-full bg-red-50 px-3 py-1 text-sm font-medium text-red-500">ناموجود</span>
                    @endif
                </div>

                <button type="button" class="mt-8 w-full rounded-full bg-brand px-8 py-3.5 text-center text-base font-semibold text-white shadow-lg shadow-brand/30 transition hover:bg-brand-dark sm:w-auto">
                    افزودن به سبد خرید
                </button>

                <div class="mt-10 border-t border-neutral-200 pt-8">
                    <h2 class="text-lg font-bold text-neutral-900">توضیحات محصول</h2>
                    <p class="mt-3 leading-8 text-neutral-600">{{ $product->description }}</p>
                </div>

                <div class="mt-8 border-t border-neutral-200 pt-8">
                    <h2 class="text-lg font-bold text-neutral-900">مشخصات فنی</h2>
                    <ul class="mt-3 space-y-2 text-sm text-neutral-600">
                        @foreach ($product->specifications() as $spec)
                            <li class="flex items-center gap-2">
                                <span class="size-1.5 rounded-full bg-brand"></span>
                                {{ $spec }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

@endsection
