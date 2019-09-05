@extends('layouts.master')

@section('title')
  <title>Manajemen Kategori</title>
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
        <div class="col-md-4">
          @card
            @slot('title')
            Tambah
            @endslot

            @if (session('error'))
              @alert(['type' => 'danger'])
                {!! session('error') !!}
              @endalert
            @endif

            <form action="{{ route('kategori.store') }}" class="form" method="POST">
              @csrf
              <div class="form-group">
                <label for="name">Kategori</label>
                <input type="text" name="name" id="name" class="form-control " required>
              </div>
              <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description" cols="5" rows="5" class="form-control "></textarea>
              </div>
              <div class="form-group">
                <button class="btn btn-primary">
                  Simpan
                </button>
              </div>
            </form>
            @slot('footer')

            @endslot
          @endcard
        </div>
        <div class="col-md-8">
          @card
            @slot('title')
              List Kategori
            @endslot

            @if (session('success')) 
              @alert(['type' => 'success'])
                {!! session('success') !!}
              @endalert
            @endif

            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>   
                    <td>#</td>
                    <td>Kategori</td>
                    <td>Deskripsi</td>
                    <td>Aksi</td>
                  </tr>
                </thead>
                <tbody>
                  @php $no = 1; @endphp
                  @forelse ($categories as $row)
                  <tr>
                  <td>{{ $row->no }}</td>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->description }}</td>
                  <td>
                    <form action="{{ route('kategori.destroy', $row->id) }}" method="post">
                      @csrf
                      <input type="hidden" name="_method" value="DELETE">
                      <a href="{{ route('kategori.edit', $row->id) }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-edit"></i>
                      </a>

                      <button class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i>
                      </button>
                    </form>
                  </td>
                  </tr>
                  @empty
                    <tr>
                      <td colspan="4" class="text-center">
                        Tidak Ada Data
                      </td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
            @slot('footer')

            @endslot
          @endcard
        </div>
      </div>
    </div>
  </section>

</div> 
@endsection 