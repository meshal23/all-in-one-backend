<?php

namespace App\Http\Controllers\ItemBrandController;

use App\Http\Controllers\Controller;
use App\Services\ItemBrandService;
use Illuminate\Http\Request;

class ItemBrandController extends Controller
{
    public $itemBrandService;

    public function __construct(ItemBrandService $itemBrandService)
    {
        $this->itemBrandService = $itemBrandService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $this->itemBrandService->getAllItemBrands($request);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->itemBrandService->storeItemBrand($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
