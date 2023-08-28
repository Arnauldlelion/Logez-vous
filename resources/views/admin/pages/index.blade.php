@extends('admin.layouts.app')
@section('title', 'Pages')

@section('content')
     
     <!-- start page title -->
     <div class="row">
          <div class="col-12">
               <div class="page-title-box">
                    <div class="page-title-right">
                         <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                              <li class="breadcrumb-item active">Pages</li>
                         </ol>
                    </div>
                    <h4 class="page-title">Pages</h4>
               </div>
          </div>
     </div>
     <!-- end page title -->
     
     
     <div class="row">
          
          <div class="col-md-12 col-lg-12">
               <div class="card card-body">
          
                    <div class="table-responsive">
                         <table class="table table-bordered table-sm">
                              <thead>
                              <tr>
                                   <th>S/N</th>
                                   <th>Title</th>
                                   <th>Content</th>
                                   <th>Edit</th>
                              </tr>
                              </thead>
                              <tbody>
                                   <span class="text-light">{{$index = 0}}</span>
                                   @forelse($pagecontents as $page)
                                        <tr>
                                             <td>{{$loop->index + 1}}</td>
                                             <td>{{ $page->title }}</td>
                                             <td>{{ Str::limit(strip_tags($page->content), 150) }}</td>
                                             <td>
                                                <a href="{{ route('admin.pages.edit', $page->id) }}"
                                                    class="btn btn-secondary btn-sm"><i class="fa fa-edit"></i></a>
                                             </td>
                                        </tr>
                                   @empty
                                        <tr>
                                             <td colspan="100%" class="text-center">No Page Content Found</td>
                                        </tr>
                                   @endforelse
                              </tbody>
                         </table>
                    </div>
               </div>
          </div>
     </div>
@endsection