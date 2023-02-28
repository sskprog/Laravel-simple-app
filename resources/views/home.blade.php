@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Домашняя страница</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @auth
                        Вы авторизовались. Можете начать работу.
                    @endauth
                    @guest
                    <a href="{{ route('login') }}">Авторизуйтесь</a>, чтобы начать работу.
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
