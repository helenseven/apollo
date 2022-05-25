@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-1 text-green-800" style="display:none">Успішність:Загальний рейтинг</h1>
    <nav aria-label="breadcrumb">
        <ol id="w5" class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Успішність</li>
            <li class="breadcrumb-item active" aria-current="page">Загальний рейтинг</li>
        </ol>
    </nav>
    <div id="w0">
        <div id="w1" class="card shadow mb-2">
            <div class="card-body">
                <form id="form-w0" class="filter-form" action="/progress/rating" method="POST">

                    @csrf

                    <input type="hidden" name="_csrf-frontend" value="Rh5oVtSGF-e0xqfX6V5LfS5ynBdrX-U-luXwvFfkFzMRTTADncc6lOL09oKwMjoKWUbPVBFnpHrAiZ2MLqFwdQ==">
                    <div class="filter-form-fields-content row">
                        <div class="form-group col-md-3">
                            <label>Факультет</label>
                            <select id="ratingform-facultyid" class="form-control" name="department">
                                <option value="">--Факультет--</option>
                                @foreach ($departments as $department)
                                <option  @if ($department->id == $departmentId) selected @endif value="{{$department->id}}">{{$department->title}}</option>
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
                                <option  @if ($group->id == $groupId) selected @endif value="{{$group->id}}">{{$group->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-2 col-sm-3">
                            <label>Семестр</label>
                            <select id="ratingform-period" class="form-control submit" name="RatingForm[period]">
                                <option value="">--Оберіть Семестр--</option>
                                <optgroup label="2021, 4 курс">
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                </optgroup>
                                <optgroup label="2020, 3 курс">
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </optgroup>
                                <optgroup label="2019, 2 курс">
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </optgroup>
                                <optgroup label="2018, 1 курс">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </optgroup>
                            </select>
                        </div>
                        <button class="btn btn-success" type="submit"> Знайти </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- TABLE -->
<div id="w2" class="card shadow mb-2">
    <div class="card-body">
        <table class="table table-bordered table-hover table-sm">
            <thead>
                <tr class="table-secondary">
                    <th>Рейтинг</th>
                    <th>Фінансування</th>
                    <th>Студент</th>
                    <th>Заг. бали</th>
                    <th>Залік</th>
                    <th>Єкз.</th>
                    <th>Вчасно складена сесія</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                @foreach($students as $student)
                <tr data-key="39270">
                    <td>{{$student->id}}</td>
                    <td>{{$student->title}}</td>
                    <td>{{$student->fullname}}</td>
                    <td>{{$student->total_mark}}</td>
                    <td>{{$student->credit}}</td>
                    <td>{{$student->exam}}</td>
                    <td>@if($student->session_done == 1) <img class="scanres" src="../../img/tick.svg" alt=" ">@else <img class="scanres" src="../../img/cross.svg" alt=" "> @endif</td>
                    <td class="button">
                        @if (isset($_SESSION['worker']))
                        <div class="btn-table">
                            <a href="/forms/edit_rat/{{$student->id}}" class="btn-link">
                                <img class="fas fa-fw fa-edit" src="../../img/fas fa-fw fa-edit.svg" alt=" ">
                                <span class="btn_text">Редагувати</span></a>
                        </div>
                        @endif
                    </td>
                </tr>
                <?php $i++ ?>
                @endforeach

            </tbody>
        </table>
        <!-- END TABLE -->
        <div>
            @if (isset($_SESSION['worker']))
            <div class="btn-add" data-toggle="collapse">
                <a href="/forms/add_rat" class="btn-link">
                    <img class="fas fa-fw fa-add" src="../../img/fas fa-fw fa-add.svg" alt=" ">
                    <span class="btn_text">Додати</span></a>
            </div>
            <div class="btn-report" href="#" data-toggle="collapse" data-target="#w8-collapse1" aria-expanded="false" aria-controls="w8-collapse1">
                <a href="/progress/rating/get_zvit" class="btn-link">
                    <img class="fas fa-fw fa-report" src="../../img/report.svg" alt=" ">
                    <span class="btn_text">Сформувати звіт</span></a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection