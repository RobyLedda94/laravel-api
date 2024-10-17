<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator; // importo validator
use Illuminate\Support\Facades\Mail;
use App\Models\Lead; // utilizzo il model
use App\Mail\NewContact;




class LeadController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        // Validazione dei dati in ingresso
        $validator = Validator::make($data, [
            'name' => ['required', 'max:100'],
            'surname' => ['required', 'max:100'],
            'email' => ['required', 'max:100'],
            'contact' => ['required', 'max:100'],         
        ],
        $errors = [
            'name.require' => 'Inserire il nome',
            'surname.require' => 'Inserire il cognome',
            'email.require' => 'Inserire email',
            'contact.require' => 'Inserire il contatto',
            'name.max' => 'Il nome non deve superare :max caratteri',
            'surname.max' => 'Il cognome non deve superare :max caratteri',
            'email.max' => 'L\' email non deve superare :max caratteri',
            'contact.max' => 'Il contatto non deve superare :max caratteri',
        ]);
        // controllo degli errori
        if($vadidator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }
        // se non ci sono errori creo un nuovo record nel db
        $new_lead = new Lead();
        $new_lead->fill($data);
        $new_lead->save();

        // invio la mail

        Mail::to('info@laravelapi.it')->send(new NewContact($new_lead));

        return respose()->json([
            'success' => true,
        ]);

    }
}
