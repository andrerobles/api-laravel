<?php
namespace App\Repositories\Contracts;

interface ProductRepositoryInterface
{
    public function index();
    public function store($name, $description, $price, $total);
    public function show($id);
    public function update($id, $name, $description, $price, $total);
    public function destroy($id);
}