<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    public function save_mail($request){

        $request->validate([
            'mail' => 'email|required',
        ]);

        $new_offer = new Offer;
        $new_offer->mails = $request->mail;
        $new_offer->save();
    }
}
