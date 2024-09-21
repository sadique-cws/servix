<?php

namespace App\Http\Controllers;

use App\Models\Receptioner;
use App\Models\Staff;
use App\Models\touch_with_us;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Request as RequestModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Hash;
class AdminController extends Controller
{
    public function index(Request $req): View
    {
        return view('admin.dashboard');
    }


    public function adminlogin(Request $req)
    {
        if ($req->method() == "POST") {
            $this->validate($req, [
                'email' => 'required|email',
                'password' => 'required',
            ]);

          
            $credentials = $req->only('email', 'password');
            if (Auth::guard('admin')->attempt($credentials)) {
                return redirect()->route("admin.panel");
            } else {
                return redirect()->back()->with("alert", "Invalid email or password.");
            }
            dd($credentials);
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
            'type_id' => 'required',
            'aadhar' => 'required',
            'pan' => 'required',
            'address' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'required',
        ]);
        $data['status'] = 1;
        if ($request->image != null) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $imageName);
            $data['image'] = $imageName;
        }
        Staff::create($data);
        return redirect()->route('admin.staff.manage');

    }

    public function delete($id): RedirectResponse
    {
        Staff::where('id', $id)->delete();
        return redirect()->route('admin.staff.manage');
    }
    public function crmDelete($id): RedirectResponse
    {
        Receptioner::where('id', $id)->delete();
        return redirect()->route('receptioner.showAllreceptioner');
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
        $data['Types'] = Type::all();
        return view("admin.insertStaff", $data);
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
            'type_id' => 'required',
            'aadhar' => 'required',
            'pan' => 'required',
            'address' => 'required',

        ]);
        $data['status'] = ($req->status) ? 1 : 0;
        $id = $req->id;
        Staff::where('id', $id)->update($data);
        return redirect()->route('admin.staff.manage');
    }


    public function search(Request $req): View
    {
        $search = $req->search;
        $data = Staff::where('name', 'LIKE', "%$search%")->paginate(8);
        return view('admin/manageStaff', ['staffs' => $data]);
    }

    public function searchRequest(Request $req): View
    {
        $search = $req->search;
        $data = RequestModel::where('name', 'LIKE', "%$search%")->paginate(8);
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
        $data['new'] = RequestModel::where('technician_id', NULL)->orderBy('created_at', 'DESC')->paginate(8);
        $data['title'] = "All New Request";
        $data['dateFilter'] = "all";
        return view('admin/allnewRequest', $data);
    }
    public function manageRequest()
    {

        return view('admin.manageRequest');
    }
    public function filterRequest(Request $req)
    {
        if ($req->search == "all") {

            $data['totalRequest'] = RequestModel::where('technician_id', '<>', null)->paginate(8);
        } else {
            $data['totalRequest'] = RequestModel::where('technician_id', $req->search)->paginate(8);

        }
        $data['staffs'] = Staff::all();
        // dd($req->search);

        return view('admin.manageRequest', $data);

    }

    public function dateFilter(Request $req)
    {
        $date = \Carbon\Carbon::createFromFormat('Y-m-d', $req->End);
        $date->addDays();
        $formattedDate = $date->format('Y-m-d');
        $data['new'] = RequestModel::select("*")->whereBetween('created_at', [$req->startAt, $formattedDate])
            ->paginate(8);
        $data['title'] = "Date between Request";
        return view('admin/allnewRequest', $data);
    }
    public function filterBySelect(Request $req)
    {
        // $date = \Carbon\Carbon::now();
        // $date->subDays(7);
        // $formattedDate = $date->format('Y-m-d');
        // dd($formattedDate);
        // last month code 
        // User::whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->get(['name','created_at']);

        $data['dateFilter'] = $req->dateFilter;


        switch ($req->dateFilter) {
            case 'today':
                $data['new'] = RequestModel::whereDate('created_at', Carbon::today())->paginate(8);
                $data['title'] = "Today Request";

                break;
            case 'yesterday':
                $data['new'] = RequestModel::whereDate('created_at', Carbon::yesterday())->paginate(8);
                $data['title'] = "yesterday Request";
                break;
            case 'this_week':
                $data['new'] = RequestModel::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->paginate(8);
                $data['title'] = "This Week Request";
                break;
            case 'this_month':
                $data['new'] = RequestModel::whereMonth('created_at', Carbon::now()->month)->paginate(8);
                $data['title'] = "This Month Request";
                break;
            case 'last_month':
                $data['new'] = RequestModel::whereMonth('created_at', Carbon::now()->subMonth()->month)->paginate(8);
                $data['title'] = "Last Month Request";
                break;
            case 'this_year':
                $data['new'] = RequestModel::whereYear('created_at', Carbon::now()->year)->paginate(8);
                $data['title'] = "This Year Request";
                break;
            case 'last_year':
                $data['new'] = RequestModel::whereYear('created_at', Carbon::now()->subYear()->year)->paginate(8);
                $data['title'] = "Last Year Request";
                break;

            default:
                $data['new'] = RequestModel::all();
                $data['title'] = "All New Request";

                break;

        }
        return view('admin/allnewRequest', $data);

    }
    public function filterByInput(Request $req)
    {

        $data['search_value'] = $req->search;
        $data['new'] = RequestModel::where('owner_name', "LIKE", "%" . $req->search . "%")->paginate(8);
        $data['title'] = 'Search Record';
        $data['dateFilter'] = 'All';
        return view('admin/allnewRequest', $data);
    }

    // show datas 
    public function confirmedRequest(Request $req)
    {

        $data['new'] = RequestModel::where('status', 1)
            ->orderBy('created_at', 'DESC')->paginate(8);
        $data['title'] = "Confirm Requests";
        return view("admin.requests", $data);
    }
    public function rejectedRequest(Request $req)
    {

        $data['new'] = RequestModel::where('status', 3)
            ->orderBy('created_at', 'DESC')->paginate(8);
        $data['title'] = "rejected Requests";
        return view("admin.requests", $data);
    }
    public function pendingRequest(Request $req)
    {

        $data['new'] = RequestModel::where('status', 0)
            ->orderBy('created_at', 'DESC')->paginate(8);
        $data['title'] = "pending Requests";
        return view("admin.requests", $data);
    }
    public function deliveredRequest(Request $req)
    {

        $data['new'] = RequestModel::where('status', 5)
            ->orderBy('created_at', 'DESC')->paginate(8);
        $data['title'] = "Delivered Requests";
        return view("admin.requests", $data);
    }

    // show Work Done Request
    public function workDoneRequests()
    {

        $data['new'] = RequestModel::where('status', 4)->orderBy('created_at', 'DESC')->paginate(8);
        $data['title'] = "Total WorkDoneRequests";
        return view("admin.requests", $data);

    }
    public function globalSearch(Request $req)
    {
        $data['search_value'] = "";
        $data['new'] = RequestModel::where('service_code', "LIKE", "%" . $req->search . "%")
            ->orWhere('contact', 'like', '%' . $req->search . '%')
            ->orWhere('owner_name', 'like', '%' . $req->search . '%')->paginate(8);
        $data['title'] = 'Search Record';
        $data['dateFilter'] = 'All';
        return view('admin/requests', $data);
    }

    public function messages()
    {
        $data['touch_with_us'] = touch_with_us::paginate(10);
        return view('admin.messages', $data);
    }
    public function messagesRead($id)
    {
        $item = touch_with_us::where('id', $id)->first();
        $item->isRead = 1;
        $item->save();
        return view('admin.messagesView', compact("item"));

    }



}