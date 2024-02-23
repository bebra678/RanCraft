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
        $data = DonateList::all();
        if(!$data)
        {
            return response()->json('Список донатов пуст');
        }
        return $data;
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
        $data = DonateList::find($id);
        if(!$data)
        {
            return response()->json('Такого доната не существует');
        }
        return $data;
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        $data = DonateList::find($id);
        if(!$data)
        {
            return response()->json('Такого доната не существует');
        }
        $data->delete();
        return response()->json('Донат '.$data['name'].'('.$data['id'].')'.' был удален');
    }
}
