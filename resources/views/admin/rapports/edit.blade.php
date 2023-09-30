@extends('admin.layouts.app')
@section('title', 'Edit Rapport')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    {{-- <li class="breadcrumb-item"><a href="{{ route('admin.property.index')}}">{{ $apartment->property->name}}</a></li> --}}
                    {{-- <li class="breadcrumb-item "><a href="">Appartement {{ $apartment->id}}</a></li> --}}
                    <li class="breadcrumb-item"><a href="{{ route('admin.rapportIndex', ['id' => $apartment->id]) }}">Rapports</a></li>
                    <li class="breadcrumb-item active">Edit Rapport</li>
                </ol>
            </div>
            <h4 class="page-title text-capitalize">Edit Rapport</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="col-lg-8">
    <div class="card-box">
        <form action="{{ route('admin.rapports.update', $rapport->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>PDF Document</label>
                <input type="file" class="form-control" id="pdf_document" accept="application/pdf" name="pdf_document">
                @error('pdf_document')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-secondary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('footer_script')
<script></script>
@endsection