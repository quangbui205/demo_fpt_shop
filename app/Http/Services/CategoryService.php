<?php


namespace App\Http\Services;


use App\Http\Repositories\CategoryRepository;

class CategoryService
{
    protected $categoryRepo;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepo= $categoryRepository;
    }

    public function getAll()
    {
        return $this->categoryRepo->getAll();
    }
}
