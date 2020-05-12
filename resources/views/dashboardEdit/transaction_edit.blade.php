@extends('layouts.master')
@section('title', 'Edit - transaction')
@section('content')

<!-- Content -->
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!--  /Traffic -->
        <div class="clearfix"></div>
        <!-- Orders -->
        <div class="orders">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Edit Transaction {{$transaction->code}}</strong>
                        </div>
                        <div class="card-body">
                            <form action="/transaction/{{$transaction->id}}" method="POST">
                                {{-- @method('PUT') --}}
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="control-label mb-1">nama</label>
                                    <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" autofocus autocomplete="off" value="{{ old('name')? old('name') : $transaction->name }}">

                                    @error('name')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email" class="control-label mb-1">Email</label>
                                    <input id="email" name="email" type="text" class="form-control @error('email') is-invalid @enderror"  autocomplete="off" value="{{ old('email')? old('email') : $transaction->email}}">

                                    @if ($errors->has('email'))
                                        <p class="alert alert-danger">{{$errors->first('email')}}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="no_hp" class="control-label mb-1">No HP</label>
                                    <input id="no_hp" name="no_hp" type="number" class="form-control @error('no_hp') is-invalid @enderror"  autocomplete="off" value="{{ old('no_hp')? old('no_hp') : $transaction->no_hp}}">

                                    @if ($errors->has('no_hp'))
                                        <p class="alert alert-danger">{{$errors->first('no_hp')}}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="address" class="control-label mb-1">Alamat</label>
                                    <input id="address" name="address" type="text" class="form-control @error('address') is-invalid @enderror"  autocomplete="off" value="{{ old('address')? old('address') : $transaction->address}}">

                                    @error('address')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name="_method" value="PUT">
                                    <button type="submit" class="btn btn-md btn-info float-right">Edit Transaksi</button>
                                </div>

                            </form>
                            <!-- /.table-stats -->
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <!-- /.orders -->
        <!-- /#add-category -->
    </div>
    <!-- .animated -->
</div>

@endsection
