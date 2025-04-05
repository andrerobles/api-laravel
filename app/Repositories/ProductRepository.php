<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    /**@var Product $model */
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $products = $this->model->all();
        return response()->json($products);
    }

    public function store($name, $description, $price, $total)
    {
        $newproduct = new product([
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'total' => $total
        ]);

        $newproduct->save();
        return response()->json($newproduct);
    }

    public function show($id) {
        $product = $this->model->findOrFail($id);
        return response()->json($product);
    }

    public function update($id, $name, $description, $price, $total)
    {
        $product = $this->model->findOrFail($id);
        $product->name = $name;
        $product->description = $description;
        $product->price = $price;
        $product->total = $total;
        $product->save();

        return response()->json($product);
    }

    public function destroy($id) {
        $product = $this->model->findOrFail($id);
        $product->delete();

        return response()->json($product::all());
    }
}

?>