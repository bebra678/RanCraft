<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Donate;
use Illuminate\Http\Response;
use App\Http\Requests\StoreDonateRequest;
use App\Models\DonateList;

class DonateController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('store', 'show');
    }
    public function index()
    {
        return Donate::all();
    }

    public function store(StoreDonateRequest $request)
    {
        $data = $request->validated();
        //$data = Donate::Create($request->validated());
        $donate = DonateList::where('id', $data['donate'])->first();
        $data['donate'] = $donate['name'];
        Donate::firstOrCreate($data);
        $message = 'Игрок'.' '.$data['nick'].' сделал запрос на донат:'.' '.$data['donate'].'.'.'Цена: '.$donate['price'].' .'.'Тип оплаты: '.$data['type_payment'];
        file_get_contents('https://api.telegram.org/bot6617492895:AAEjVeXMghllC0_E_EUxoF7JaZyFJeOJCxM/sendMessage?chat_id=-1002042695958&text='.$message);
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

    public function createApplication(StoreDonateRequest $request, string $id)
    {
        $user = User::findOrFail($id);
        $data = $request->validated();
        $donate = DonateList::findOrFail($request['donate']);
        Donate::Create([
            'user_id' => $user['id'],
            'nick' => $user['nick'],
            'donate' => $donate['name'],
            'type_payment' => $data['type_payment'],
            'contact' => $data['contact'],
        ]);
        $message = 'Игрок'.' '.$user['nick'].'('. $user['id'].')'.' сделал запрос на донат: '.$data['donate'].'. '.'Цена: '.$donate['price'].'. '.'Тип оплаты: '.$data['type_payment'].'. '.'Контакты для связи:'.$data['contact'];
        file_get_contents('https://api.telegram.org/bot6617492895:AAEjVeXMghllC0_E_EUxoF7JaZyFJeOJCxM/sendMessage?chat_id=-1002042695958&text='.$message);
        return response()->json($data, 200);
    }
}
