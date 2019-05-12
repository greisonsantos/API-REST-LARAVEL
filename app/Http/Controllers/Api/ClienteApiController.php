<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Database\Console\Migrations\ResetCommand;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storege;

class ClienteApiController extends Controller
{
    //
    public function __construct(Cliente $cliente, Request $request)
    {
        $this->cliente = $cliente;
        $this->request = $request;
    }

    public function index()
    {
        $data = $this->cliente->all();
        return response()->json($data);
    }


    public function store(Request $request)
    {
        $this->validate($request, $this->cliente->rules());

        $dataForm = $request->all();
        $data = $this->cliente->create($dataForm);

        return response()->json($data);
    }


    public function show($id)
    {
        if (!$data = $this->cliente->find($id)) {
            return response()->json(['error' => 'Nada foi encontrado'], 404);
        } else {
            return response()->json($data);
        }
    }


    public function update(Request $request, $id)
    {
        if (!$data = $this->cliente->find($id)) {
            return response()->json(['error' => 'Nada foi encontrado'], 404);
        }

        $this->validate($request, $this->cliente->rules());

        $dataForm = $request->all();

        $data =update($dataForm);

        return response()->json($data);
    }

    public function destroy($id)
    {
        if (!$data = $this->cliente->find($id)) {
            return response()->json(['error' => 'Nada foi encontrado'], 404);
        }

        $data->delete();
        return response()->json(['success' => 'Deletado com Sucesso !']);
    }
}
