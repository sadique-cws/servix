<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Request as RequestModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(Request $req): View
    {
        $data = RequestModel::all();
        $count = $data->count();
        return view('admin.dashboard', ['staffs' => $data]);
    }


    public function adminlogin(Request $req)
    {
        if ($req->method() == "POST") {
            $data = $req->only(["email", "password"]);

            if (Auth::guard("admin")->attempt($data)) {
                return redirect()->route("admin.panel");
            } else {
                return redirect()->back();
            }
        }
        return view('admin.adminLogin');
    }

    public function adminlogout(Request $req)
    {
        Auth::guard("admin")->logout();
        return redirect()->back();
    }

    public function staffUpload(Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:App\Models\Staff,email|email',
            'contact' => 'required|integer|unique:App\Models\Staff,contact|digits:10',
            'salary' => 'required',
            'type' => 'required',
            'aadhar' => 'required',
            'pan' => 'required',
            'address' => 'required',
            'status' => 'required',
            'password' => 'required',
        ]);

        Staff::create($data);
        return redirect()->route('admin.staff.manage');

    }

    public function delete($id): RedirectResponse
    {
        Staff::where('id', $id)->delete();
        return redirect()->route('admin.staff.manage');
    }

    public function deleteRequest($id): RedirectResponse
    {
        RequestModel::where('id', $id)->delete();
        return redirect()->route('admin.newRequest.manage');
    }

    public function manageStaff(Request $req)
    {
        $data['staffs'] = Staff::all();
        return view('admin/manageStaff', $data);
    }

    public function insertStaff(Request $req)
    {
        return view("admin.insertStaff");
    }

    public function editStaff($id)
    {
        $data = Staff::where('id', $id)->first();
        return view("admin.editStaff", compact('data'));
    }

    public function viewStaff($id)
    {
        $data = Staff::where('id', $id)->first();
        return view("admin.viewStaff", compact('data'));
    }


    public function update(Request $req)
    {
        $data = $req->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'salary' => 'required',
            'type' => 'required',
            'aadhar' => 'required',
            'pan' => 'required',
            'address' => 'required',
            'status' => 'required',
            'password' => 'required',
        ]);

        $id = $req->id;
        Staff::where('id', $id)->update($data);
        return redirect()->route('admin.staff.manage');
    }

    public function search(Request $req): View
    {
        $search = $req->search;
        $data = Staff::where('name', 'LIKE', "%$search%")->get();
        return view('admin/manageStaff', ['staffs' => $data]);
    }

    public function searchRequest(Request $req): View
    {
        $search = $req->search;
        $data = RequestModel::where('name', 'LIKE', "%$search%")->get();
        return view('admin.newRequest.manage', ['new' => $data]);
    }



    public function status(Request $req, Staff $staff)
    {
        $staff->status = !$staff->status;
        $staff->save();

        return redirect()->back();

    }

    public function allnewRequest(Request $req)
    {
        $data['new'] = RequestModel::all();
        return view('admin/allnewRequest', $data);
    }
    public function manageRequest()
    {
        $data['totalRequest'] = RequestModel::where('technician_id', '<>', null)->get();
        $data['staffs'] = Staff::all();

        return view('admin.manageRequest', $data);
    }
    public function filterRequest(Request $req)
    {
        if ($req->search == "all") {
           
            $data['totalRequest'] = RequestModel::where('technician_id', '<>', null)->get();
        } else {
            $data['totalRequest'] = RequestModel::where('technician_id', $req->search)->get();

        }
        $data['staffs'] = Staff::all();
        // dd($req->search);

        return view('admin.manageRequest', $data);

    }
}