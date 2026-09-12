@props(['product' => null])

@php
    $value = fn (string $field, $default = '') => old($field, $product?->$field ?? $default);
@endphp

<div class="grid gap-6 sm:grid-cols-2">
    <div class="sm:col-span-2">
        <label for="name" class="mb-1.5 block text-sm font-medium text-neutral-700">نام محصول</label>
        <input id="name" name="name" type="text" value="{{ $value('name') }}" required
            class="w-full rounded-xl border border-neutral-300 px-4 py-2.5 text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-brand/20">
        @error('name') <p class="mt-1.5 text-sm text-red-500">{{ $message }}</p> @enderror
    </div>

    <div class="sm:col-span-2">
        <label for="slug" class="mb-1.5 block text-sm font-medium text-neutral-700">نامک (slug) — اختیاری</label>
        <input id="slug" name="slug" type="text" value="{{ $value('slug') }}" placeholder="در صورت خالی بودن، خودکار از نام ساخته می‌شود" dir="ltr"
            class="w-full rounded-xl border border-neutral-300 px-4 py-2.5 text-left text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-brand/20">
        @error('slug') <p class="mt-1.5 text-sm text-red-500">{{ $message }}</p> @enderror
    </div>

    <div class="sm:col-span-2">
        <label for="short_description" class="mb-1.5 block text-sm font-medium text-neutral-700">توضیح کوتاه</label>
        <input id="short_description" name="short_description" type="text" value="{{ $value('short_description') }}" required
            class="w-full rounded-xl border border-neutral-300 px-4 py-2.5 text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-brand/20">
        @error('short_description') <p class="mt-1.5 text-sm text-red-500">{{ $message }}</p> @enderror
    </div>

    <div class="sm:col-span-2">
        <label for="description" class="mb-1.5 block text-sm font-medium text-neutral-700">توضیحات کامل</label>
        <textarea id="description" name="description" rows="4" required
            class="w-full rounded-xl border border-neutral-300 px-4 py-2.5 text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-brand/20">{{ $value('description') }}</textarea>
        @error('description') <p class="mt-1.5 text-sm text-red-500">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="price" class="mb-1.5 block text-sm font-medium text-neutral-700">قیمت (تومان)</label>
        <input id="price" name="price" type="number" min="0" value="{{ $value('price') }}" required
            class="w-full rounded-xl border border-neutral-300 px-4 py-2.5 text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-brand/20">
        @error('price') <p class="mt-1.5 text-sm text-red-500">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="stock" class="mb-1.5 block text-sm font-medium text-neutral-700">موجودی</label>
        <input id="stock" name="stock" type="number" min="0" value="{{ $value('stock', 0) }}" required
            class="w-full rounded-xl border border-neutral-300 px-4 py-2.5 text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-brand/20">
        @error('stock') <p class="mt-1.5 text-sm text-red-500">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="category" class="mb-1.5 block text-sm font-medium text-neutral-700">دسته‌بندی</label>
        <input id="category" name="category" type="text" value="{{ $value('category') }}" required
            class="w-full rounded-xl border border-neutral-300 px-4 py-2.5 text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-brand/20">
        @error('category') <p class="mt-1.5 text-sm text-red-500">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="image" class="mb-1.5 block text-sm font-medium text-neutral-700">مسیر یا آدرس تصویر</label>
        <input id="image" name="image" type="text" value="{{ $value('image') }}" placeholder="images/products/example.jpg" dir="ltr" required
            class="w-full rounded-xl border border-neutral-300 px-4 py-2.5 text-left text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-brand/20">
        <p class="mt-1.5 text-xs text-neutral-400">می‌تواند مسیر داخل پوشه public یا یک آدرس اینترنتی کامل باشد.</p>
        @error('image') <p class="mt-1.5 text-sm text-red-500">{{ $message }}</p> @enderror
    </div>

    <div class="sm:col-span-2">
        <label class="flex items-center gap-2 text-sm text-neutral-700">
            <input type="checkbox" name="is_featured" value="1" @checked($value('is_featured', false)) class="rounded border-neutral-300 text-brand focus:ring-brand/20">
            نمایش به‌عنوان محصول ویژه در صفحه اصلی
        </label>
    </div>
</div>
