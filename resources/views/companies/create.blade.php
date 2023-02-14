@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-start mb-2">
                <h2>Создать</h2>
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
            <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Название</label>
                    <input type="text" class="form-control" name="name" placeholder="Название компании"
                        value="{{ old('name') }}">
                    @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Электронная почта</label>
                    <input type="text" class="form-control" name="email" placeholder="Электронная почта"
                        value="{{ old('email') }}">
                    @error('email')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Адрес</label>
                    <input type="text" class="form-control" name="address" placeholder="Адрес компании"
                        value="{{ old('address') }}">
                    @error('address')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="file" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Создать</button>

            </form>
        </div>
    </div>
</div>
@endsection