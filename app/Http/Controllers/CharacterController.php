<?php

namespace App\Http\Controllers;

use App\Http\Requests\characterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CharacterController extends Controller
{
    function index(Request $request) {

        $data = $query =DB::query()->from("characters");
        $count =$data->count();
        $page = $request->page ?? 1;
        $apiBaseURL = "https://rickandmortyapi.com/api/character" ?? env("APP_URL")."/api/characters";
        $info = [
            "count" => $count,
            "pages" => ceil($count /20),
            "next" => $page < ceil($count /20) ? $apiBaseURL."?page=".($page+1) : null,
            "prev" => $page > 1 ? $apiBaseURL."?page=".($page-1) : null,
        ];
        $result = $data->limit(20)->get();
           foreach ($result as $key => $value) {
            $result[$key]->origin = json_decode($value->origin);
            $result[$key]->location = json_decode($value->location);
            $result[$key]->episode = json_decode($value->episode);
        }
        return response()->json([ "info"=> $info ,"results" => $result ] , 200);
    }
    function  save( characterRequest $request){

        $data = $request->validated();
        $data['origin'] = json_encode($data['origin'], JSON_UNESCAPED_SLASHES);
        $data['location'] = json_encode($data['location'], JSON_UNESCAPED_SLASHES);
        $data['episode'] = json_encode($data['episode'], JSON_UNESCAPED_SLASHES);
        $data['created'] = date("Y-m-d H:i:s");
         DB::table("characters")->insert($data);
       return response()->json(["msj" => "character create "] , 201);
    }
    function update(characterRequest $request )
    {
        $query =DB::query()->from("characters")->where("id" , $request->id);

        if (!$query->exists()) {
            return response()->json(['message' => 'character not found'], 404);
        }
        $data = $request->validated();
        $data['origin'] = json_encode($data['origin'], JSON_UNESCAPED_SLASHES);
        $data['location'] = json_encode($data['location'], JSON_UNESCAPED_SLASHES);
        $data['episode'] = json_encode($data['episode'], JSON_UNESCAPED_SLASHES);
        $query->update($data);

        return response()->json(["message" => "character update "] , 200);
    }

    function delete(Request $request)
    {
        $query =DB::query()->from("characters")->where("id" , $request->id);

        if (!$query->exists()) {
            return response()->json(['message' => 'character not found'], 404);
        }
        $query->delete();

        return response()->json(["message" => "character delete "] , 200);
    }

}
