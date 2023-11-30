<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVariantRequest;
use App\Models\Variant;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    public function index()  {
        $variants =  Variant::all();
        return view('screens.admin.variants.index', compact('variants'));
    }
    function create()  {
        return view('screens.admin.variants.create');
    }

    function store(StoreVariantRequest $request)  {
        // dd($request->sanitized());
        foreach($request->sanitized() as $req)
        {
            Variant::create($req);
        }
        return back();
    }

}
