<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBarangRequest;

class BarangController extends Controller
{
    public function index()
    {
        return Barang::where('user_id', Auth::id())->get();
    }

    public function store(StoreBarangRequest $request)
    {
        return Barang::create(array_merge($request->validated(), ['user_id' => Auth::id()]));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::where('user_id', Auth::id())->findOrFail($id);
        $barang->update($request->all());
        return $barang;
    }

    public function destroy($id)
    {
        Barang::where('user_id', Auth::id())->findOrFail($id)->delete();
        return response()->json(['status'=>'deleted']);
    }
}
