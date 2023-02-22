@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Список сотрудников</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('employees.create') }}"> Создать</a>
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
    <table id="employees-table" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>ФИО</th>
                <th>Компания</th>
                <th>Email</th>
                <th>Телефон</th>
                <th width="130px">Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->fullname }}</td>
                <td>{{ $employee->company->name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->phone }}</td>
                <td>
                    <form action="{{ route('employees.destroy',$employee->id) }}" method="POST" id="delete-employee-form">
                        <a class="btn btn-primary fs-5" href="{{ route('employees.show',$company->id) }} "
                            title="Просмотр">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a class="btn btn-success fs-5" href="{{ route('employees.edit',$company->id) }}"
                            title="Редактировать" id="temp">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger fs-5" title="Удалить">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function () {
        $('#employees-table').DataTable({
            "language": {
            "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
            },
        });
        $('#delete-company-form > button').click(function(event){
            event.preventDefault();
            if (window.confirm('Действительно удалить запись?')){
                $('#delete-company-form').submit();
            }
            else return false;
        })
    });
</script>
@endsection