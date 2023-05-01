<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Manage Request</h3>

            <div class="card-tools">

                <div class="input-group input-group-sm d-flex">
                    <form class="mr-3">
                        <select wire:model="filter" class="form-control float-right">

                            <option value="all">All Request</option>

                            @foreach ($staffs as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </form>

                    <input type="text" wire:model="search"
                        class="form-control float-right w-100"placeholder="Search">
                </div>
            </div>
        </div>


        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 61vh !important">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>

                        <th>Service code</th>
                        <th>Owner name</th>
                        <th>Product name</th>

                        <th>Contact</th>
                        <th>Type</th>

                        <th>Problem</th>
                        <th>status</th>
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
                                <span class="font-weight-bold">({{ $item->technician->name }})</span>
                            </td>
                            <td>{{ $item->problem }}</td>
                            <td><span class="font-weight-bold   rounded px-2 py-1
                                " style="color:{{StatusColor($item->status)}}; ">{{ $item->getStatus() }}</span></td>
                            <td>

                                <a data-toggle="modal" data-target="#view{{ $item->id }}" role="button"
                                    class=" btn btn-info"><i class="fas fa-eye"></i> View</a>
                                <div class="modal fade " id="view{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable "
                                        role="document">
                                        <div class="modal-content ">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">All new
                                                    Request</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="flex-row col-12">
                                                    <table class="table">
                                                        <tr>
                                                            <th>Service Code</th>
                                                            <td class="text-uppercase">{{ $item->service_code }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Owner Name</th>
                                                            <td>{{ $item->owner_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Product Name</th>
                                                            <td>{{ $item->product_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Brand</th>
                                                            <td>{{ $item->brand }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Contact</th>
                                                            <td>{{ $item->contact }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Email</th>
                                                            <td>{{ $item->email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Status</th>
                                                            <td><span class="font-weight-bold   rounded px-2 py-1
                                                                " style="color:{{StatusColor($item->status)}}; ">{{ $item->getStatus() }}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Serial No</th>
                                                            <td>{{ $item->serial_no ? "$item->serial_no" : 'N/A' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>MAC No</th>
                                                            <td>{{ $item->MAC ? "$item->MAC" : 'N/A' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Problem</th>
                                                            <td>{{ $item->problem ? "$item->problem" : 'N/A' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Remark</th>
                                                            <td>{{ $item->remark ? "$item->remark" : 'N/A' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Color</th>
                                                            <td>{{ $item->color }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Estimate_delivery </th>
                                                            <td>{{ $item->estimate_delivery ? date('d M Y', strtotime($item->estimate_delivery)) : 'N/A' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Create At</th>
                                                            <td>{{ $item->created_at ? date('d M Y', strtotime($item->created_at)) : 'N/A' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Last update</th>
                                                            <td>{{ $item->updated_at ? date('d M Y', strtotime($item->updated_at)) : 'N/A' }}
                                                            </td>
                                                        </tr>
                                                        @if ($item->date_of_delivery)
                                                            <tr>
                                                                <th>Date of delivery</th>
                                                                <td>{{ $item->date_of_delivery ? date('d M Y', strtotime($item->date_of_delivery)) : 'N/A' }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Delivered By</th>
                                                                <td>{{ $item->delivered_by ? "$item->delivered_by" : 'N/A' }}
                                                                </td>
                                                            </tr>
                                                        @endif
                                                        <tr>
                                                            <th>Product Image</th>
                                                            <td>
                                                                @if ($item->image)
                                                                    <img src="{{ asset('storage/uploads/' . $item->image) }}"
                                                                        style="height: 80px; width:100px;"
                                                                        class="img-thumbnail">
                                                                @else
                                                                    <span>No image found!</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                               

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class=" " style="justify-items: center; display: flex; justify-content: center">
            {{$requests->links()}}
        </div>
    </div>
