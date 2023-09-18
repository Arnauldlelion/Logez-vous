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
                    <h4 class="page-title">Modifier {{$page->title}} Page</h4>
               </div>
          </div>
     </div>


     <div class="container">
            <div class="card p-4">
                <form action="{{ route('admin.pages.update', $page->id)}}" method="post">

                    @csrf
                    <div class="form-group">
                        <label for="content">Contenu</label>
                        <textarea name="content" class="form-control tiny-textarea" id="" rows="5">{{ old('content', $page->content)}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="content_fr">Contenu Fr</label>
                        <textarea name="content_fr" class="form-control tiny-textarea" id="" rows="5">{{ old('content_fr', $page->content_fr)}}</textarea>
                    </div>

                    @method('PUT')
                    <input type="submit" class="btn btn-primary" value="Update Page">
                </form>
            </div>
     </div>

@endsection