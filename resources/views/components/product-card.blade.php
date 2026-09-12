@props(['product'])

<a href="{{ route('products.show', $product) }}" class="group flex flex-col overflow-hidden rounded-2xl border border-neutral-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
    <div class="aspect-square overflow-hidden bg-neutral-100">
        <img
            src="{{ asset($product->image) }}"
            alt="{{ $product->name }}"
            loading="lazy"
            class="size-full object-cover transition duration-300 group-hover:scale-105"
        >
    </div>

    <div class="flex flex-1 flex-col gap-2 p-4">
        <span class="text-xs font-medium text-brand">{{ $product->category }}</span>
        <h3 class="font-semibold text-neutral-900">{{ $product->name }}</h3>
        <p class="line-clamp-2 flex-1 text-sm leading-6 text-neutral-500">{{ $product->short_description }}</p>

        <div class="mt-2 flex items-center justify-between">
            <span class="font-bold text-neutral-900">{{ number_format($product->price) }} تومان</span>

            @if ($product->stock > 0)
                <span class="text-xs font-medium text-emerald-600">موجود</span>
            @else
                <span class="text-xs font-medium text-red-500">ناموجود</span>
            @endif
        </div>
    </div>
</a>
