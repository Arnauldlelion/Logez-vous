@extends('admin.layouts.app')
@section('title', 'Dashboard')

@section('content')
     
     <!-- start page title -->
     <div class="row">
          <div class="col-12">
               <div class="page-title-box">
                    <div class="page-title-right">
                         <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                              <li class="breadcrumb-item active">Home</li>
                         </ol>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                    <div class="">
                         <div class="card card-body">
                              <div class="table-responsive">
                                   <table class="table table-bordered table-sm">
                                        <thead>
                                        <tr>
                                             <th>S/N</th>
                                             <th>Name</th>
                                             <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($landlords as $landlord)
                                             <tr>
                                                  <td>{{ $loop->index + 1 }}</td>
                                                  <td>{{ $landlord->name }}</td>
                                                  <td>
                                                       <div class="btn-group">
                                                            <a href="#"
                                                               class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i></a>
                                                            <a href="#"
                                                               data-toggle="modal"
                                                               data-target="#deleteModal{{ $landlord->id }}"
                                                               class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                       </div>
                                                  </td>
                                             </tr>
                                             
                                             
                                             {{-- <x-delete-modal
                                                       :id="$landlord->id"
                                                       :url="route('admins.landlords.destroy', $landlord->id)" /> --}}
                                        
                                        @empty
                                             <tr>
                                                  <td colspan="100%">No Records Found</td>
                                             </tr>
                                        @endforelse
                                        </tbody>
                                   </table>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <!-- end page title -->
     
@endsection