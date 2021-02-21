<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Contac;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


<<<<<<< HEAD
public function getData() {

    $data = DB::table('contacs')->get();

    return response()->json($data);
=======


public function getData() {

  $data = DB::table('contacs')->get();

  return response()->json($data);
>>>>>>> ffbaea2c71c854b2ef02cf1a1e891bbffeba86f3
}


public function saveData(Request $request){
<<<<<<< HEAD
    $data = $request->json()->all();

    $new = new Contac;
    $new->name = $data['name'];
    $new->mail = $data['mail'];
    $new->save();

    return response()->json($data);
=======
  $data = $request->json()->all();

  $new = new Contac;
  $new->name = $data['name'];
  $new->mail = $data['mail'];
  $new->save();

  return response()->json($data);
>>>>>>> ffbaea2c71c854b2ef02cf1a1e891bbffeba86f3
}



public function ajax_delete(Request $request){

$for_delete = $request->json()->all();

$delete = Contac::find($for_delete['id']);
$delete->delete();

$data = DB::table('contacs')->get();
return response()->json($data);

}


<<<<<<< HEAD




=======
>>>>>>> ffbaea2c71c854b2ef02cf1a1e891bbffeba86f3
}


