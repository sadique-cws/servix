<?php

namespace App\Http\Controllers;

use App\Models\touch_with_us;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Request as RequestModel;
use PDF;


class HomeController extends Controller
{
    public function index():View{
        return view('homepage');
    }
    public function contactUs(Request $req){
        if($req->method() == "POST"){
            $data = $req->validate([
                'first_name' => 'required',
                'last_name' => 'nullable',
                'contact' => 'required|integer|digits:10',
                'company' => 'nullable',
                'email' => 'required|email',
                'subject' => 'required',
                'message' => 'required',
                'inspired_from' => 'required',
                
            ]);
            touch_with_us::create($data);
            return redirect()->back();
        }
        return view('contact');
    }
    public function learn():View{
        return view('learn');
    }
    
    public function warranty():View{
        return view('warrantyTerms');
    }
    public function privacyPolicy():View{
        return view('privacypolicy');
    }
    public function ourTeam():View{
        return view('ourTeam');
    }
    public function termsAndCondition():View{
        return view('termsAndCondition');
    }
    

    public function register():View{
        return view('register');
    }

    public function reciving(Request $req, $id): View
    {
        $data['item']=RequestModel::where("id",$id)->first();
        return view('receipt.receipt',$data);

    }
    public function reciptPdf(Request $req, $id): View
    {
        $data['item']=RequestModel::where("id",$id)->first();
        $pdf=PDF::loadView('receipt.receipt',$data);

        return $pdf->download('receipt-'.$id.'.pdf');

    }

    public function view():View{
        return view('receipt.view');
    }

    
    
}
