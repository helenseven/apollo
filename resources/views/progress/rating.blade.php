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
                    <input type="hidden" name="_csrf-frontend" value="Rh5oVtSGF-e0xqfX6V5LfS5ynBdrX-U-luXwvFfkFzMRTTADncc6lOL09oKwMjoKWUbPVBFnpHrAiZ2MLqFwdQ==">
                    <div class="filter-form-fields-content row">
                        <div class="form-group col-md-3">
                            <label>Факультет</label>
                            <select id="ratingform-facultyid" class="form-control" name="RatingForm[facultyId]">
                                <option value="">--Факультет--</option>
                                @foreach ($departments as $department)
                                <option value="{{$department->id}}">{{$department->title}}</option>
                                @endforeach
                                <!-- <option value="13">Аспірантура</option>
                                <option value="14">Навчально-науковий інститут електричної інженерії та інформаційних техноголій</option>
                                <option value="15">Навчально-науковий інститут механічної інженерії, транспорту та природничих наук</option>
                                <option value="4" selected="">Факультет економіки і управління</option>
                                <option value="6">Факультет права, гуманітарних і соціальних наук</option>
                                <option value="7">Навчальний відділ</option> -->
                            </select>
                        </div>
                        <div class="form-group col-md-1">
                            <label>Курс</label>
                            <select id="ratingform-course" class="form-control" name="RatingForm[course]">
                                <option value="">--Курс--</option>
                                @foreach ($courses as $course)
                                <option value="{{$course->id}}">{{$course->number}}</option>
                                @endforeach
                                <!-- <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4" selected="">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option> -->
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <label>Група</label>
                            <select id="ratingform-streamid" class="form-control" name="RatingForm[streamId]">
                                <option value="">--Група--</option>
                                @foreach ($groups as $group)
                                <option value="{{$group->id}}">{{$group->title}}</option>
                                @endforeach
                                <!-- <option value="2254">ЕК-18-1</option>
                                <option value="2269">МК-18-1</option>
                                <option value="2287">МК-18-1з</option>
                                <option value="2268">МН-18-1</option>
                                <option value="2271" selected="">МН-18-1з</option>
                                <option value="2262">ОбОп-18-1з</option>
                                <option value="2270">ТР-18-1</option>
                                <option value="2265">ФБС-18-1</option>
                                <option value="2422">ФБС-19-1кзс(2к)</option> -->
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
                        <div class="btn-table">
                            <a href="/forms/edit_rat/{{$student->id}}" class="btn-link">
                                <img class="fas fa-fw fa-edit" src="../../img/fas fa-fw fa-edit.svg" alt=" ">
                                <span class="btn_text">Редагувати</span></a>
                        </div>
                    </td>
                    @endforeach
                    <!-- 
                <tr>
                    <td class="text-center">1</td>
                    <td class="text-center">Б</td>
                    <td>Таран Костянтин Сергійович</td>
                    <td class="text-center">5</td>
                    <td class="text-center">4,8</td>
                    <td class="text-center">5</td>
                    <td class="text-center">
                        <img class="scanres" src="../../img/cross.svg" alt=" ">
                    </td>
                    <td class="button">
                        <div class="btn-table" href="#">
                            <a href="/forms/edit_rat" class="btn-link">
                                <img class="fas fa-fw fa-edit" src="../../img/fas fa-fw fa-edit.svg" alt=" ">
                                <span class="btn_text">Редагувати</span></a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">2</td>
                    <td class="text-center">Б</td>
                    <td>Безугла Ангеліна Анатоліївна</td>
                    <td class="text-center">4,9</td>
                    <td class="text-center">4,3</td>
                    <td class="text-center">4,9</td>
                    <td class="text-center">
                        <img class="scanres" src="../../img/cross.svg" alt=" ">
                    </td>
                    <td class="button">
                        <div class="btn-table" href="#">
                            <a href="/forms/edit_rat" class="btn-link">
                                <img class="fas fa-fw fa-edit" src="../../img/fas fa-fw fa-edit.svg" alt=" ">
                                <span class="btn_text">Редагувати</span></a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">2</td>
                    <td class="text-center">Б</td>
                    <td>Білоус Аліна Сергіївна</td>
                    <td class="text-center">4,2</td>
                    <td class="text-center">4</td>
                    <td class="text-center">4,2</td>
                    <td class="text-center">
                        <img class="scanres" src="../../img/tick.svg" alt=" ">
                    </td>
                    <td class="button">
                        <div class="btn-table" href="#">
                            <a href="/forms/edit_rat" class="btn-link">
                                <img class="fas fa-fw fa-edit" src="../../img/fas fa-fw fa-edit.svg" alt=" ">
                                <span class="btn_text">Редагувати</span></a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">3</td>
                    <td class="text-center">К</td>
                    <td>Борисов Олексій Сергійович</td>
                    <td class="text-center">4</td>
                    <td class="text-center">4</td>
                    <td class="text-center">3,8</td>
                    <td class="text-center">
                        <img class="scanres" src="../../img/tick.svg" alt=" ">
                    </td>
                    <td class="button">
                        <div class="btn-table" href="#">
                            <a href="/forms/edit_rat" class="btn-link">
                                <img class="fas fa-fw fa-edit" src="../../img/fas fa-fw fa-edit.svg" alt=" ">
                                <span class="btn_text">Редагувати</span></a>
                        </div>
                    </td>
                </tr>
                <tr> -->
            </tbody>
        </table>
        <!-- END TABLE -->
        <div>
            <div class="btn-add" data-toggle="collapse">
                <a href="/forms/add_rat" class="btn-link">
                    <img class="fas fa-fw fa-add" src="../../img/fas fa-fw fa-add.svg" alt=" ">
                    <span class="btn_text">Додати</span></a>
            </div>
            <div class="btn-report" href="#" data-toggle="collapse" data-target="#w8-collapse1" aria-expanded="false" aria-controls="w8-collapse1">
                <a href="#" class="btn-link">
                    <img class="fas fa-fw fa-report" src="../../img/report.svg" alt=" ">
                    <span class="btn_text">Сформувати звіт</span></a>
            </div>
        </div>
    </div>
</div>
@endsection