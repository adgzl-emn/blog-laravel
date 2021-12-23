<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;


class Iletisim extends Controller
{
    public function index() {
        $data['categories'] = Category::where('status',1)->inRandomOrder()->get();
        return view('front/iletisim',$data);
    }

    public function create(Request $request){
        $request->validate([
            'title' => 'min:2'
        ]);

        $contact = new Contact;
        $contact->name = $request->name;
        $contact->mail = $request->mail;
        $contact->title = $request->title;
        $contact->contact = $request->icerik;
        $contact->save();
        toastr()->success('Mesaj İçin Teşekkürler');

        return redirect()->route('iletisim');
    }

}
