<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**@var ProductRepositoryInterface */
    protected $repository;

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $itemsPerPage = $request->has('items_per_page') ? (int) $request->input('items_per_page') : 15;
        $sortBy = $request->has('sort_by') ? $request->input('sort_by') : 'name';
        $direction = $request->has('direction') ? $request->input('direction') : 'desc';

        return $this->repository->index($itemsPerPage, $sortBy, $direction);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required',
            'total' => 'required',
        ]);

        return $this->repository->store(
            $request->get('name'),
            $request->get('description'),
            $request->get('price'),
            $request->get('total')
        );
    }

    public function show($id)
    {
        return $this->repository->show($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required',
            'total' => 'required'
        ]);

        return $this->repository->update(
            $id,
            $request->get('name'),
            $request->get('description'),
            $request->get('price'),
            $request->get('total')
        );
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }
}
