@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Список компаний</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('companies.create') }}"> Создать</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    @if ($message = Session::get('error'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
    @endif
    <table id="companies-table" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Логотип</th>
                <th>Название</th>
                <th>Email</th>
                <th>Адрес</th>
                <th width="280px">Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
            <tr>
                <td>{{ $company->id }}</td>
                <td><img src="{{ asset($company->logo)}}" height="40" alt="logo"></td>
                <td>{{ $company->name }}</td>
                <td>{{ $company->email }}</td>
                <td>{{ $company->address }}</td>
                <td>
                    <form action="{{ route('companies.destroy',$company->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('companies.edit',$company->id) }}">Редактировать</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function () {
        $('#companies-table').DataTable({
            "language": {
            "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
            },
        });
    });
</script>
@endsection