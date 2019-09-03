@extends('layouts.master')

@section('title')
  <title>Edit Kategori</title>
@endsection

@section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">        
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manajemen Kategori</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Kategori</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            @card
              @slot('title')
              Edit
              @endslot

              @if (session('error'))
                @alert(['type' => 'danger'])
                  {!! session('error') !!}
                @endalert
              @endif

              <form action="{{ route('kategori.update', $categories->id) }}" method="POST" role="form">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                  <label for="name">Kategori</label>
                  <input type="text" name="name" id="name" class="form-control" value="{{ $categories->name }}" required>
                </div>
                <div class="form-group">
                  <label for="description">Deskripsi</label>
                  <textarea name="description" id="description" cols="5" rows="5" class="form-control">{{ $categories->description }}</textarea>
                </div>
                <div class="form-group">
                  <button class="btn btn-success">
                    Update
                  </button>
                </div>
              </form>
              @slot('footer')
              
              @endslot
            @endcard
          </div>
        </div>
      </div>
    </section>

  </div>
  @endsection