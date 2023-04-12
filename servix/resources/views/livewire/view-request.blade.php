<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Manage Request</h3>

            <div class="card-tools">

                <div class="input-group input-group-sm d-flex">
                    <form  class="mr-3">
                        <select wire:model="filter"  class="form-control float-right">
                            
                            <option value="all">All Request</option>

                            @foreach ($staffs as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </form>

                        <input type="text" wire:model="search" class="form-control float-right w-100"placeholder="Search">
                </div>
            </div>
        </div>
       

        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <thead>
            <tr>
     
                <th>Service code</th>
                <th>Owner name</th>
                <th>Product name</th>
              
                <th>Contact</th>
                <th>Type</th>
                
                <th>Problem</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requests as $item)
                <tr>
                   
                    <td class="text-uppercase">{{ $item->service_code }}</td>
                    <td>{{ $item->owner_name }}</td>
                    <td>{{ $item->product_name }}</td>
                  
                    <td>{{ $item->contact }}</td>
                    <td>
                        {{ $item->type->typename }}
                        <span class="font-weight-bold">({{$item->technician->name}})</span>
                    </td>
                    <td>{{ $item->problem }}</td>
                    <td>
            
                        <a data-toggle="modal" data-target="#view{{ $item->id }}" role="button"
                            class=" btn btn-info"><i class="fas fa-eye"></i> View</a>
                        <div class="modal fade " id="view{{ $item->id }}" tabindex="-1" role="dialog"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered " role="document">
                                <div class="modal-content bg-info">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">All new
                                            Request</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="d-flex flex-row col-12">
                                            <div class="col-6">
                                                <div class="border border-dark p-1 text-center">
                                                    <label for="">ID</label>
                                                    <h5>{{ $item->id }}</h5>
                                                </div>
                                                <div class="border border-dark p-1 text-center">
                                                    <label for=""><span></span>Email</label>
                                                    <h5>{{ $item->email }}</h5>
                                                </div>
                                                <div class="border border-dark p-1 text-center">
                                                    <label for="">Product Name</label>
                                                    <h5>{{ $item->product_name }}</h5>
                                                </div>
                                                <div class="border border-dark p-1 text-center">
                                                    <label for="">
                                                       
                                                        Email</label>
                                                    <h5>{{ $item->email }}</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="border border-dark p-1 text-center">
                                                    <label for="">Owner Name</label>
                                                    <h5>{{ $item->owner_name }}</h5>
                                                </div>
                                                <div class="border border-dark p-1 text-center">
                                                    <label for="">Contact</label>
                                                    <h5>{{ $item->contact }}</h5>
                                                </div>
                                                <div class="border border-dark p-1 text-center">
                                                    <label for="">Brand</label>
                                                    <h5>{{ $item->brand }}</h5>
                                                </div>
                                                <div class="border border-dark p-1 text-center ">
                                                    <label for="">
                                                        
                                                        Service Code</label>
                                                    <h5>{{ $item->service_code }}</h5>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="text-center border-dark border">
                                            <label for="">Problem</label>
                                            <h5>{{ $item->problem }}</h5>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- Delete button  --}}
                        <a href="{{ route('admin.request.delete', $item->id) }}" role="button"
                            class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>