@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-start mb-2">
                <h2>Редактировать</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-primary" href="{{ route('employees.index') }}"> Назад</a>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="col-12 col-lg-6 ">
            <form action="{{ route('employees.update',$employee->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('employees._form', compact('companies', 'employee'))
            </form>
        </div>
    </div>
</div>
@endsection