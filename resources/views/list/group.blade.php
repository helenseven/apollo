@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-1 text-green-800" style="display:none">Академ. групи </h1>
    <nav aria-label="breadcrumb">
        <ol id="w5" class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Список</li>
            <li class="breadcrumb-item active" aria-current="page">Академ. групи</li>
        </ol>
    </nav>

    <div id="w1">
        <div id="w2" class="card shadow mb-2">
            <div class="card-body">
                <form id="filter-form" class="filter-form" action="/time-table/group?type=0" method="POST">
                    <input type="hidden" name="_csrf-frontend" value="WwgAoP7vvZ0LlOqa79nl8pAjQXxUbbzU-vFecIyTJN0ZPFjvj52Lz0PMm6-rqoSYpEk0DC0q67KRxRpd-9ptjA==">
                    <div class="filter-form-fields-content row">
                        <div class="form-group col-md-3">
                            <label>Факультет</label>
                            <select id="timetableform-facultyid" class="form-control" name="TimeTableForm[facultyId]">
                                <option value="">--Факультет--</option>
                                @foreach ($departments as $department)
                                <option value="{{$department->id}}">{{$department->title}}</option>
                                @endforeach
                                <!-- <option value="13">Аспірантура</option>
                                <option value="14">Навчально-науковий інститут електричної інженерії та інформаційних техноголій</option>
                                <option value="15" selected>Навчально-науковий інститут механічної інженерії, транспорту та природничих наук</option>
                                <option value="4">Факультет економіки і управління</option>
                                <option value="6">Факультет права, гуманітарних і соціальних наук</option>
                                <option value="7">Навчальний відділ</option> -->
                            </select>
                        </div>
                        <div class="form-group col-md-1">
                            <label>Курс</label>
                            <select id="listform-course" class="form-control" name="ListForm[course]">
                                <option value="">--Курс--</option>
                                @foreach ($courses as $course)
                                <option value="{{$course->id}}">{{$course->number}}</option>
                                @endforeach
                                <!-- <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4" selected>4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option> -->
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label>Група</label>
                            <select id="listform-groupid" class="form-control" name="ListForm[groupId]">
                                <option value="">--Група--</option>
                                @foreach ($groups as $group)
                                <option value="{{$group->id}}">{{$group->title}}</option>
                                @endforeach
                                <!-- <option value="2536">БТ-18-1</option>
                                <option value="2534">ЕО-18-1</option>
                                <option value="2656" selected>ПМс-19-1</option>
                                <option value="2538">ФТ-18-1</option>
                                <option value="2542">ЦБ-18-1</option>
                                <option value="2663">АТс-19-2з</option>
                                <option value="2753">ГЗс-19-1з</option>
                                <option value="2657">ПМс-19-1з</option>
                                <option value="2543">ЦБ-18-1з</option> -->
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- TABLE -->
    <div id="w4" class="card shadow mb-2">
        <div class="card-body">
            <div class="table-responsive">
                <div id="w3" class="grid-view">
                    <table class="table table-bordered table-hover table-sm">
                        <thead>
                            <tr class="table-secondary">
                                <th>№</th>
                                <th>Студент</th>
                                <th>№ картки студента</th>
                                <th>№ заліковки</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr data-key="39270">
                                <td>{{$student->id}}</td>
                                <td>{{$student->fullname}}</td>
                                <td>{{$student->card_number}}</td>
                                <td>{{$student->zalikovka_number}}</td>
                                <td class="button">
                                    <div class="btn-table">
                                        <a href="/forms/edit_st/{{$student->id}}" class="btn-link">
                                            <img class="fas fa-fw fa-edit" src="../../img/fas fa-fw fa-edit.svg" alt=" ">
                                            <span class="btn_text">Редагувати</span></a>
                                    </div>
                                </td>
                                @endforeach
                                <!-- <td>1</td>
                                <td>Деменко Анна Георгіївна</td>
                                <td>57682</td>
                                <td>191024</td>
                                <td class="button">
                                    <div class="btn-table">
                                        <a href="/forms/edit_st" class="btn-link">
                                            <img class="fas fa-fw fa-edit" src="../../img/fas fa-fw fa-edit.svg" alt=" ">
                                            <span class="btn_text">Редагувати</span></a>
                                    </div>
                                </td>
                            </tr>
                            <tr data-key="39316">
                                <td>2</td>
                                <td>Дігтяр Євгеній Ігоревич</td>
                                <td>54263</td>
                                <td>191025</td>
                                <td class="button">
                                    <div class="btn-table">
                                        <a href="/forms/edit_st" class="btn-link">
                                            <img class="fas fa-fw fa-edit" src="../../img/fas fa-fw fa-edit.svg" alt=" ">
                                            <span class="btn_text">Редагувати</span></a>
                                    </div>
                                </td>
                            </tr>
                            <tr data-key="39315">
                                <td>3</td>
                                <td>Дмитренко Олег Олександрович</td>
                                <td>57489</td>
                                <td>191026</td>
                                <td class="button">
                                    <div class="btn-table">
                                        <a href="/forms/edit_st" class="btn-link">
                                            <img class="fas fa-fw fa-edit" src="../../img/fas fa-fw fa-edit.svg" alt=" ">
                                            <span class="btn_text">Редагувати</span></a>
                                    </div>
                                </td>
                            </tr>
                            <tr data-key="39314">
                                <td>4</td>
                                <td>Дробаха Віктор Валерійович</td>
                                <td>45817</td>
                                <td>191027</td>
                                <td class="button">
                                    <div class="btn-table">
                                        <a href="/forms/edit_st" class="btn-link">
                                            <img class="fas fa-fw fa-edit" src="../../img/fas fa-fw fa-edit.svg" alt=" ">
                                            <span class="btn_text">Редагувати</span></a>
                                    </div>
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END TABLE -->

            <div class="btn-add" data-toggle="collapse">
                <a href="/forms/add_st" class="btn-link">
                    <img class="fas fa-fw fa-add" src="../../img/fas fa-fw fa-add.svg" alt=" ">
                    <span class="btn_text">Додати</span></a>
            </div>
        </div>
    </div>
</div>
@endsection