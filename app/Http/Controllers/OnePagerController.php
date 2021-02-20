<?php

namespace App\Http\Controllers;

use App\Offer;
use Illuminate\Http\Request;
use App\Mail\Greet;
use Illuminate\Support\Facades\Mail;



class OnePagerController extends Controller
{

    public function newsletter(Request $request){
        $new_offer  = new Offer;
        $new_offer->save_mail($request);

        Mail::to($request->mail)->send(new Greet($request->mail));
        return redirect()->route('onepager_new')->with('success' , 'Pogledajte Vaš inbox!');
    }

    public function show_onepager_new(){
        return view('vir');
    }
}//kraj
