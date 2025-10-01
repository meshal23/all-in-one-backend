<?php

namespace App\Http\Controllers\ItemMasterController;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemMasterRequest\ItemMasterRequest;
use App\Interfaces\ItemMasterInterface;
use App\Services\ItemMasterService;
use Illuminate\Http\Request;

class ItemMasterController extends Controller
{
    public $itemMasterService;

    public function __construct(ItemMasterService $itemMasterService)
    {
        $this->itemMasterService = $itemMasterService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $this->itemMasterService->getItems($request);
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
    public function store(ItemMasterRequest $request)
    {
        return $this->itemMasterService->storeItem($request);
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

    public function searchItem(Request $request)
    {
        return $this->itemMasterService->searchItem($request);
    }
}
