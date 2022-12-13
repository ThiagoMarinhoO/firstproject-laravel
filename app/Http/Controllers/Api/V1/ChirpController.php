<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreChirpsRequest;
use App\Http\Resources\V1\ChirpResource;
use App\Models\Chirp;

class ChirpController extends Controller
{
    //
    public function index(){
        return ChirpResource::collection(Chirp::all());
    }

    public function show(Chirp $chirp){
        return new ChirpResource($chirp);
    }

    public function store(StoreChirpsRequest $request){
        Chirp::create($request->validated());

        return response()->json('Chirp Created');
    }

    public function update(StoreChirpsRequest $request, Chirp $chirp){
        $chirp->update($request->validated());

        return response()->json('Chirp Updated');
    }

    public function destroy(Chirp $chirp){
        $chirp->delete();

        return response()->json('Chirp Deleted');
    }
}