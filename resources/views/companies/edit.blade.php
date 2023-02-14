@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-start mb-2">
                <h2>Редактировать</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-primary" href="{{ route('companies.index') }}"> Назад</a>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="col-12 col-lg-6 ">
            @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
            @endif
            <form action="{{ route('companies.update',$company->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Название</label>
                    <input type="text" class="form-control" name="name" placeholder="Название компании"
                        value="{{ $company->name }}">
                    @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Электронная почта</label>
                    <input type="text" class="form-control" name="email" placeholder="Электронная почта"
                        value="{{ $company->email }}">
                    @error('email')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Адрес</label>
                    <input type="text" class="form-control" name="address" placeholder="Адрес компании"
                        value="{{ $company->address }}">
                    @error('address')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="file" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>

            </form>
        </div>
    </div>
</div>
{{-- <div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Company</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('companies.index') }}" enctype="multipart/form-data">
                    Back</a>
            </div>
        </div>
    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
    @endif
    <form action="{{ route('companies.update',$company->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Company Name:</strong>
                    <input type="text" name="name" value="{{ $company->name }}" class="form-control"
                        placeholder="Company name">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Company Email:</strong>
                    <input type="email" name="email" class="form-control" placeholder="Company Email"
                        value="{{ $company->email }}">
                    @error('email')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Company Address:</strong>
                    <input type="text" name="address" value="{{ $company->address }}" class="form-control"
                        placeholder="Company Address">
                    @error('address')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
    </form>
</div> --}}
@endsection