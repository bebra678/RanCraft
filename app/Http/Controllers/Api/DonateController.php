<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Donate;
use Illuminate\Http\Response;
use App\Http\Requests\StoreDonateRequest;
use App\Models\DonateList;
use Illuminate\Support\Facades\Auth;

class DonateController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('createApplication');
    }
    public function index()
    {
        $data = Donate::all();
        if(!$data)
        {
            return response()->json('Список запросов на донат пуст');
        }
        return $data;
    }

    public function store(StoreDonateRequest $request)
    {
//        $data = $request->validated();
//        //$data = Donate::Create($request->validated());
//        $donate = DonateList::where('id', $data['donate'])->first();
//        $data['donate'] = $donate['name'];
//        Donate::firstOrCreate($data);
//        $message = 'Игрок'.' '.$data['nick'].' сделал запрос на донат:'.' '.$data['donate'].'.'.'Цена: '.$donate['price'].' .'.'Тип оплаты: '.$data['type_payment'];
//        file_get_contents('https://api.telegram.org/bot6617492895:AAEjVeXMghllC0_E_EUxoF7JaZyFJeOJCxM/sendMessage?chat_id=-1002042695958&text='.$message);
//        return $data;
    }

    public function show(string $id)
    {
        $data = Donate::find($id);
        if(!$data)
        {
            return response()->json('Такого запроса на донат не существует');
        }
        return $data;
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        $data = Donate::find($id);
        if(!$data)
        {
            return response()->json('Такого запроса на донат не существует');
        }
        $data->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function createApplication(StoreDonateRequest $request)
    {
        $user = User::findOrFail(Auth::id());
        $data = $request->validated();
        $donate = DonateList::find($request['donate']);
        if(!$donate)
        {
            return response()->json('Такого доната не существует', 422);
        }
        Donate::Create([
            'user_id' => $user['id'],
            'nick' => $user['nick'],
            'donate' => $donate['name'],
            'type_payment' => $data['type_payment'],
            'contact' => $data['contact'],
            'price' => $donate['price'],
        ]);
        $message = 'Игрок'.' '.$user['nick'].'('. $user['id'].')'.' сделал запрос на донат: '.$donate['name'].'. '.'Цена: '.$donate['price'].'. '.'Тип оплаты: '.$data['type_payment'].'. '.'Контакты для связи:'.$data['contact'];
        file_get_contents('https://api.telegram.org/bot6617492895:AAEjVeXMghllC0_E_EUxoF7JaZyFJeOJCxM/sendMessage?chat_id=-1002042695958&text='.$message);
        return response()->json($data, 200);
    }
}
