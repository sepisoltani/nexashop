<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::latest()->paginate(10);

        return view('admin.products.index', [
            'products' => $products,
        ]);
    }

    public function create(): View
    {
        return view('admin.products.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateProduct($request);
        $validated['slug'] = Str::slug($validated['slug'] ?? '' ?: $validated['name']);
        $validated['is_featured'] = $request->boolean('is_featured');

        Product::create($validated);

        return redirect()
            ->route('admin.products.index')
            ->with('status', 'محصول با موفقیت ایجاد شد.');
    }

    public function edit(Product $product): View
    {
        return view('admin.products.edit', [
            'product' => $product,
        ]);
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $this->validateProduct($request, $product);
        $validated['slug'] = Str::slug($validated['slug'] ?? '' ?: $validated['name']);
        $validated['is_featured'] = $request->boolean('is_featured');

        $product->update($validated);

        return redirect()
            ->route('admin.products.index')
            ->with('status', 'محصول با موفقیت ویرایش شد.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('status', 'محصول با موفقیت حذف شد.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validateProduct(Request $request, ?Product $product = null): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:products,slug'.($product ? ",{$product->id}" : ''),
            ],
            'short_description' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'integer', 'min:0'],
            'image' => ['required', 'string', 'max:2048'],
            'category' => ['required', 'string', 'max:255'],
            'stock' => ['required', 'integer', 'min:0'],
            'is_featured' => ['nullable', 'boolean'],
        ], [
            'required' => 'وارد کردن :attribute الزامی است.',
            'max' => ':attribute نباید بیشتر از :max کاراکتر باشد.',
            'min' => ':attribute نباید کمتر از :min باشد.',
            'integer' => ':attribute باید یک عدد صحیح باشد.',
            'unique' => 'این :attribute قبلاً استفاده شده است.',
        ], [
            'name' => 'نام محصول',
            'slug' => 'نامک (slug)',
            'short_description' => 'توضیح کوتاه',
            'description' => 'توضیحات',
            'price' => 'قیمت',
            'image' => 'تصویر',
            'category' => 'دسته‌بندی',
            'stock' => 'موجودی',
        ]);
    }
}
