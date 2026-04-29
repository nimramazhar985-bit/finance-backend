<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return Transaction::with('category')->get();
    }

    public function store(Request $request)
    {
        return Transaction::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $t = Transaction::find($id);

        if (!$t) {
            return response()->json(['message' => 'Not found'], 404);
        }

        $t->update($request->all());
        return $t;
    }

    public function destroy($id)
    {
        return Transaction::destroy($id);
    }
}