<?php

namespace App\Http\Controllers\Seller;

use App\Models\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class SellerTransactionController extends ApiController
{
    public function __construct()
    {
        parent::__construct();

        $this->middleware('can:view,seller')->only('index');
        $this->middleware('scope:read-general')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Seller $seller)
    {
        $transactions = $seller->products()->whereHas('transactions')->with('transactions')->get()->pluck('transactions')->collapse();

        return $this->showAll($transactions);
    }
}
