@extends('admin.layouts.app')
@section('title', 'FAQs')

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admins.faqs.index') }}">FAQs</a></li>
                        <li class="breadcrumb-item active">Modifier</li>
                    </ol>
                </div>
                <h4 class="page-title">Modifier FAQ</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="">
        <div class="card card-body">

            <form action="{{ route('admins.faqs.update', $faq->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
				
                <input hidden name="type" value="landlord">
                <div class="mb-4"></div>

                <div class="form-group">
                    <label>Titre <em>*</em></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                        placeholder="e.g. Excellente expérience client" value="{{ old('title', $faq->title) }}" />
                    @error('title')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Description <em>*</em></label>
                    <textarea rows="5" class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description', $faq->description) }}</textarea>
                    @error('description')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-secondary">Sauvegarder</button>
                </div>

            </form>
        </div>
    </div>

@endsection
