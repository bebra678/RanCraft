<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDonateRequest;
use Illuminate\Http\Request;
use App\Models\DonateList;
use Illuminate\Http\Response;
use App\Http\Requests\StoreDonateListRequest;
use Illuminate\Support\Facades\Storage;

class DonateListController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('index', 'show');
    }
    public function index()
    {
        return DonateList::all();
    }

    public function store(StoreDonateRequest $request)
    {
        //$data = DonateList::Create($request->validated());
        $data = $request->validated();
        if($data['photo'])
        {
            $data['photo'] = Storage::put('/images', $data['photo']);
        }
        DonateList::firstOrCreate($data);
        return $data;
    }

    public function show(string $id)
    {
        return DonateList::findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        $data = DonateList::findOrFail($id);
        $data->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
