@extends('layouts.admin')

@section('title', 'افزودن محصول | نکسا شاپ')

@section('content')

    <div class="mb-6 flex items-center gap-3">
        <a href="{{ route('admin.products.index') }}" class="text-sm text-neutral-500 hover:text-brand">محصولات</a>
        <span class="text-neutral-300">/</span>
        <h1 class="text-lg font-bold text-neutral-900">افزودن محصول جدید</h1>
    </div>

    <form method="POST" action="{{ route('admin.products.store') }}" class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-sm">
        @csrf

        <x-product-form />

        <div class="mt-8 flex items-center gap-3">
            <button type="submit" class="rounded-full bg-brand px-6 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-brand-dark">
                ذخیره محصول
            </button>
            <a href="{{ route('admin.products.index') }}" class="text-sm font-medium text-neutral-500 hover:text-neutral-700">انصراف</a>
        </div>
    </form>

@endsection
