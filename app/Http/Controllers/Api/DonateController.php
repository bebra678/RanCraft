<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donate;
use Illuminate\Http\Response;
use App\Http\Requests\StoreDonateRequest;

class DonateController extends Controller
{
    public function index()
    {
        return Donate::all();
    }

    public function store(StoreDonateRequest $request)
    {
        $data = Donate::Create($request->validated());
        return $data;
    }

    public function show(string $id)
    {
        return Donate::findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        $data = Donate::findOrFail($id);
        $data->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
