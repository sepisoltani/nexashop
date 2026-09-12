@extends('layouts.app')

@section('title', 'محصولات | نکسا شاپ')

@section('content')

    <section class="mx-auto max-w-6xl px-4 py-12 sm:px-6">
        <div class="mb-10 text-center">
            <h1 class="text-3xl font-extrabold text-neutral-900">همه محصولات</h1>
            <p class="mt-2 text-sm text-neutral-500">مجموعه کامل لوازم جانبی دیجیتال نکسا شاپ</p>
        </div>

        @if ($products->isEmpty())
            <p class="text-center text-neutral-500">در حال حاضر محصولی برای نمایش وجود ندارد.</p>
        @else
            <div class="grid grid-cols-2 gap-4 sm:gap-6 md:grid-cols-3">
                @foreach ($products as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>

            <div class="mt-10">
                {{ $products->links() }}
            </div>
        @endif
    </section>

@endsection
