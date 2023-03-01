@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-start mb-2">
                <h2>Просмотр</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-primary" href="{{ route('companies.index') }}"> Назад</a>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="col-12 col-lg-8 ">
            <div class="card mb-3">
                <div class="card-header">
                    <strong>Карточка компании</strong>
                </div>
                <div class="row g-0">
                    <div class="col-md-2">
                        <img src="{{ $company->logo ?  asset($company->logo) : asset('logos/no-image.jpg')}}"
                            class="img-fluid rounded-start" alt="logo">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title" id="company-name">{{$company->name}}</h4>
                            <div class="row">
                                <div class="col-4">
                                    <p>Адрес</p>
                                </div>
                                <div class="col-8">
                                    <p id="company-address">{{$company->address}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <p>E-mail</p>
                                </div>
                                <div class="col-8">
                                    <p>{{$company->email}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <p>Сотрудники</p>
                                </div>
                                <div class="col-8">
                                    <p id="employees">{{$employees}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <p>Здесь должна быть Яндекс карта с адресом компании и списком привязанных сотрудников. Но так как без
                реального API-ключа это работать все равно не будет, то размещаю здесь просто JavaScript код, для
                создания карты.</p>
            <hr>
<pre>
<?php
echo <<<JS
    //Сначала получим все необходимые данные о компании для создания карты
    var companyAddress = document.getElementById('company-address').textContent; // Адрес компании
    var companyName = document.getElementById('company-name').textContent; // Название компании
    var employees = document.getElementById('employees').textContent; // Список сотрудников
    var iconContent = companyName + '\\n' + employees; // создаем содержимое для иконки

    // чтобы центр карты при инициализации совпадал c адресом компании сначала воспользуемся сервисом geocode
    var url = new URL("http://geocode-maps.yandex.ru/1.x/?apikey=yourAPIkey&geocode=&results=1"); //создаем URL (ключ нужно вставить реальный)
    url.searchParams.set('geocode', companyAddress); // устанавливаем в значение geocode адрес компании
    var response = await fetch(url.toString()); // отправляем запрос на сервис geocode
    var coordinates = await response.text(); // получаем ответ
    // Полученные данные вставить в init карты вместо center

    ymaps.ready(init);

    function init() {
        var myMap = new ymaps.Map('map', {
            center: [55.753994, 37.622093],
            zoom: 9
        });

        // Поиск координат компании.
        ymaps.geocode(companyAddress, {
            /**
             * Опции запроса
             * @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/geocode.xml
             */
            // Сортировка результатов от центра окна карты.
            // boundedBy: myMap.getBounds(),
            // strictBounds: true,
            // Вместе с опцией boundedBy будет искать строго внутри области, указанной в boundedBy.
            // Если нужен только один результат, экономим трафик пользователей.
            results: 1
        }).then(function (res) {
                // Выбираем первый результат геокодирования.
                var firstGeoObject = res.geoObjects.get(0),
                    // Координаты геообъекта.
                    coords = firstGeoObject.geometry.getCoordinates(),
                    // Область видимости геообъекта.
                    bounds = firstGeoObject.properties.get('boundedBy');

                firstGeoObject.options.set('preset', 'islands#darkBlueDotIconWithCaption');
                // Получаем строку с адресом и выводим в иконке геообъекта.
                firstGeoObject.properties.set('iconCaption', firstGeoObject.getAddressLine());

                // Добавляем первый найденный геообъект на карту.
                myMap.geoObjects.add(firstGeoObject);
                // Масштабируем карту на область видимости геообъекта.
                myMap.setBounds(bounds, {
                    // Проверяем наличие тайлов на данном масштабе.
                    checkZoomRange: true
                });

                // Добавляем свою метку со списком сотрудников и названием компании
                var myPlacemark = new ymaps.Placemark(coords, {
                iconContent: iconContent,
                balloonContent: ''
                }, {
                preset: 'islands#blueStretchyIcon'
                });
                myMap.geoObjects.add(myPlacemark);
            });
}
JS
?>
</pre>
        </div>
    </div>
</div>

@endsection