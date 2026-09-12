@extends('layouts.admin')

@section('title', 'مدیریت محصولات | نکسا شاپ')

@section('content')

    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold text-neutral-900">محصولات</h1>
        <a href="{{ route('admin.products.create') }}" class="rounded-full bg-brand px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-brand-dark">
            + افزودن محصول
        </a>
    </div>

    <div class="overflow-hidden rounded-2xl border border-neutral-200 bg-white shadow-sm">
        <table class="w-full text-right text-sm">
            <thead class="border-b border-neutral-200 bg-neutral-50 text-neutral-500">
                <tr>
                    <th class="px-4 py-3 font-medium">محصول</th>
                    <th class="px-4 py-3 font-medium">دسته‌بندی</th>
                    <th class="px-4 py-3 font-medium">قیمت</th>
                    <th class="px-4 py-3 font-medium">موجودی</th>
                    <th class="px-4 py-3 font-medium">ویژه</th>
                    <th class="px-4 py-3 font-medium"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-neutral-100">
                @forelse ($products as $product)
                    <tr>
                        <td class="flex items-center gap-3 px-4 py-3">
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="size-10 rounded-lg object-cover">
                            <span class="font-medium text-neutral-800">{{ $product->name }}</span>
                        </td>
                        <td class="px-4 py-3 text-neutral-600">{{ $product->category }}</td>
                        <td class="px-4 py-3 text-neutral-600">{{ number_format($product->price) }} تومان</td>
                        <td class="px-4 py-3 text-neutral-600">{{ $product->stock }}</td>
                        <td class="px-4 py-3">
                            @if ($product->is_featured)
                                <span class="rounded-full bg-brand/10 px-2.5 py-1 text-xs font-medium text-brand">ویژه</span>
                            @else
                                <span class="text-neutral-300">—</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-end gap-3">
                                <a href="{{ route('admin.products.edit', $product) }}" class="font-medium text-brand hover:text-brand-dark">ویرایش</a>
                                <form method="POST" action="{{ route('admin.products.destroy', $product) }}" onsubmit="return confirm('آیا از حذف این محصول مطمئن هستید؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-500 hover:text-red-600">حذف</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-8 text-center text-neutral-400">هنوز محصولی ثبت نشده است.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $products->links() }}
    </div>

@endsection
