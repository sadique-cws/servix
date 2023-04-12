<?php

namespace App\Http\Livewire;

use App\Models\Staff;
use Livewire\Component;
use App\Models\Request As RequestModel;

class ViewRequest extends Component
{
    public $search = '';
    public function render()
    {
        return view('livewire.view-request',[
            'requests' => RequestModel::where('technician_id', '<>', null)->where('owner_name',"LIKE","%".$this->search."%")->get(),
            "staffs" => Staff::all(),
        ]);
    }
}
