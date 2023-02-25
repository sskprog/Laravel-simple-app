@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-start mb-2">
                <h2>Просмотр</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-primary" href="{{ route('employees.index') }}"> Назад</a>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="col-12 col-lg-8 ">
            <div class="card mb-3">
                <div class="card-header">
                    <strong>Карточка сотруднмка</strong>
                </div>
                <div class="row g-0">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title">{{$employee->emp_name}}</h4>
                            <div class="row">
                                <div class="col-4">
                                    <p>Место работы</p>
                                </div>
                                <div class="col-8">
                                    <p>{{$employee->company->name}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <p>E-mail</p>
                                </div>
                                <div class="col-8">
                                    <p>{{$employee->email}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <p>Телефон</p>
                                </div>
                                <div class="col-8">
                                    <p>{{$employee->phone}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection