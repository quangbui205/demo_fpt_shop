<?php


namespace App\Http\Services;


use App\Http\Repositories\ProductRepository;
use App\Product;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    protected $productRepo;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepo=$productRepository;
    }

    public function getAll()
    {
        return $this->productRepo->getAll();
    }

    public function findById($id)
    {
        return $this->productRepo->findById($id);
    }

    public function store($request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->qty = $request->qty;
        $product->category_id = $request->category_id;
        if($request->hasFile('image'))
        {

            $path = $request->file('image')->store('images','public');
            $product->image = $path;
        }
        $this->productRepo->save($product);
    }

    public function update($request,$id)
    {
        $product = $this->productRepo->findById($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->qty = $request->qty;
        $product->category_id = $request->category_id;
        if($request->hasFile('image'))
        {
            $productImage = $product->image;
            if($productImage)
            {
                Storage::delete('/public/storage/'.$productImage);
            }
            $imageNew = $request->file('image')->store('images','public');
            $product->image = $imageNew;
        }
        $this->productRepo->save($product);
    }

    public function delete($id)
    {
        $product = $this->productRepo->findById($id);
        $this->productRepo->delete($product);
    }

}
