@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-1 text-green-800" style="display:none">Успішність:Статистика</h1>
    <nav aria-label="breadcrumb">
        <ol id="w5" class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Успішність</li>
            <li class="breadcrumb-item active" aria-current="page">Статистика</li>
        </ol>
    </nav>

    <div id="w1" class="card shadow mb-2">
        <div class="card-body">
            <form id="form-w0" class="filter-form" action="/progress/rating" method="POST">
                <input type="hidden" name="_csrf-frontend" value="Rh5oVtSGF-e0xqfX6V5LfS5ynBdrX-U-luXwvFfkFzMRTTADncc6lOL09oKwMjoKWUbPVBFnpHrAiZ2MLqFwdQ==">
                <div class="filter-form-fields-content row">
                    <div class="form-group col-md-3">
                        <label>Факультет</label>
                        <select id="ratingform-facultyid" class="form-control" name="RatingForm[facultyId]">
                            <option value="">--Факультет--</option>
                            <option value="13">Аспірантура</option>
                            <option value="14">Навчально-науковий інститут електричної інженерії та інформаційних техноголій</option>
                            <option value="15">Навчально-науковий інститут механічної інженерії, транспорту та природничих наук</option>
                            <option value="4" selected="">Факультет економіки і управління</option>
                            <option value="6">Факультет права, гуманітарних і соціальних наук</option>
                            <option value="7">Навчальний відділ</option>
                        </select>
                    </div>
                    <div class="form-group col-md-1">
                        <label>Курс</label>
                        <select id="ratingform-course" class="form-control" name="RatingForm[course]">
                            <option value="">--Курс--</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4" selected="">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>
                    <div class="form-group col-md-5">
                        <label>Група</label>
                        <select id="ratingform-streamid" class="form-control" name="RatingForm[streamId]">
                            <option value="">--Потік--</option>
                            <option value="2254">ЕК-18-1</option>
                            <option value="2269">МК-18-1</option>
                            <option value="2287">МК-18-1з</option>
                            <option value="2268">МН-18-1</option>
                            <option value="2271" selected="">МН-18-1з</option>
                            <option value="2262">ОбОп-18-1з</option>
                            <option value="2270">ТР-18-1</option>
                            <option value="2265">ФБС-18-1</option>
                            <option value="2422">ФБС-19-1кзс(2к)</option>
                        </select>
                    </div>
            </form>
        </div>
    </div>
</div>
<div id="w2" class="card shadow mb-2">
    <div class="card-body">
        <div id="statisticchart">
        </div>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            // Load google charts
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            // Draw the chart and set the chart values
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Scholarships', 'Students per scholarships'],
                    ['Підвищена', 8],
                    ['Звичайна', 6],
                    ['Соціальна', 4],
                    ['Не нараховується', 6]
                ]);

                // Optional; add a title and set the width and height of the chart
                var options = {
                    'title': 'Стипендія',
                    'width': 800,
                    'height': 400
                };

                // Display the chart inside the <div> element with id="statisticchart"
                var chart = new google.visualization.PieChart(document.getElementById('statisticchart'));
                chart.draw(data, options);
            }
        </script>
    </div>
</div>
@endsection