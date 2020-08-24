<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryService;
use App\Http\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;
    protected $categoryService;
    public function __construct(ProductService $productService,
                                CategoryService $categoryService)
    {
        $this->productService=$productService;
        $this->categoryService= $categoryService;
    }

    public function index()
    {
        $products = $this->productService->getAll();
        return view('product.list',compact('products'));
    }

    public function create()
    {
        $categories = $this->categoryService->getAll();
        return view('product.add',compact('categories'));
    }

    public function store(Request $request)
    {
        $this->productService->store($request);
        return redirect()->route('product.list');
    }

    public function edit($id)
    {
        $product = $this->productService->findById($id);
        $categories = $this->categoryService->getAll();
        return view('product.edit',compact('product','categories'));
    }

    public function update(Request $request,$id)
    {
        $this->productService->update($request,$id);
        return redirect()->route('product.list');
    }

    public function delete($id)
    {
        $this->productService->delete($id);
        return redirect()->route('product.list');
    }
}
