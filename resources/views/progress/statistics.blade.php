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
            <form id="form-w0" class="filter-form" action="/progress/statistics" method="POST">
                <input type="hidden" name="_csrf-frontend" value="Rh5oVtSGF-e0xqfX6V5LfS5ynBdrX-U-luXwvFfkFzMRTTADncc6lOL09oKwMjoKWUbPVBFnpHrAiZ2MLqFwdQ==">

                @csrf

                <div class="filter-form-fields-content row">
                    <div class="form-group col-md-3">
                        <label>Факультет</label>
                        <select id="ratingform-facultyid" class="form-control" name="department">
                            <option value="">--Факультет--</option>
                            @foreach ($departments as $department)
                            <option @if ($department->id == $departmentId) selected @endif value="{{$department->id}}">{{$department->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-1">
                        <label>Курс</label>
                        <select id="ratingform-course" class="form-control" name="course">
                            <option value="">--Курс--</option>
                            @foreach ($courses as $course)
                            <option @if ($course->id == $courseId) selected @endif value="{{$course->id}}">{{$course->number}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-5">
                        <label>Група</label>
                        <select id="ratingform-streamid" class="form-control" name="group">
                            <option value="">--Група--</option>
                            @foreach ($groups as $group)
                            <option @if ($group->id == $groupId) selected @endif value="{{$group->id}}">{{$group->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-success" type="submit"> Знайти </button>
            </form>
        </div>
    </div>
</div>
<div id="w2" class="card shadow mb-2">
    <div class="card-body">
        @if ($other !== 0)
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
                    ['Підвищена', {{$upperScholarship}}],
                    ['Звичайна', {{$scholarshipAmount}}],
                    ['Соціальна', {{$socialCount}}],
                    ['Не нараховується', {{$other}}]
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
        @endif
    </div>
</div>
@endsection