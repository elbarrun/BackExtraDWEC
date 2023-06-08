<?php

namespace App\Http\Controllers;

use App\Models\Peticione;
use App\Models\Reserva;
use App\Models\Extra;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ReservaController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }

        return Reserva::all();
    }

    public function misReservas()
    {
        try {
            $user = Auth::user();

        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }

        return Reserva::where('user_id', $user->id)->get()();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|int',
            'coche_id' => 'required|int',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'precio_total' => 'required|numeric',
        ]);
        if($validator->fails()){
            return response()->json($validator->messages(), 400);
        }
        $reserva = Reserva::create([
            'user_id' => $request->get('user_id'),
            'coche_id' => $request->get('coche_id'),
            'fecha_inicio' => $request->get('fecha_inicio'),
            'fecha_fin' => $request->get('fecha_fin'),
            'precio_total' => $request->get('precio_total'),
            'estado' => 'pendiente',
        ]);
        return response()->json(['message' => 'Reserva Created', 'data' => $reserva], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function show(Reserva $reserva)
    {
        try {

        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }

        return $reserva;
    }


    public function show_coche(Reserva $reserva)
    {
        try {

        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
        return $reserva->coche();
    }

    public function show_user(Reserva $reserva)
    {
        try {

        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
        return $reserva->user();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reserva $reserva)
    {
        try {
            $reserva->delete();
        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
        return $reserva;
    }

    public function aniadirExtra(Reserva $reserva, Extra $extra){
        try {
            $reserva->extras()->attach($extra->id);

        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
        return "ok";
    }
}
