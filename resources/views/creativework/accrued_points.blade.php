@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-1 text-green-800" style="display:none">Творчі бали:Нараховані бали </h1>
    <nav aria-label="breadcrumb">
        <ol id="w5" class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Творчі бали</li>
            <li class="breadcrumb-item active" aria-current="page">Нараховані бали</li>
        </ol>
    </nav>

    <div id="w1">
        <div id="w2" class="card shadow mb-2">
            <div class="card-body">
                <form id="filter-form" class="filter-form" action="/creativework/accrued_points" method="POST">

                    @csrf

                    <input type="hidden" name="_csrf-frontend" value="WwgAoP7vvZ0LlOqa79nl8pAjQXxUbbzU-vFecIyTJN0ZPFjvj52Lz0PMm6-rqoSYpEk0DC0q67KRxRpd-9ptjA==">
                    <div class="filter-form-fields-content row">
                        <div class="form-group col-md-3">
                            <label>Факультет</label>
                            <select id="timetableform-facultyid" class="form-control" name="department">
                                <option value="">--Факультет--</option>
                                @foreach ($departments as $department)
                                <option @if ($department->id == $departmentId) selected @endif value="{{$department->id}}">{{$department->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-1">
                            <label>Курс</label>
                            <select id="listform-course" class="form-control" name="course">
                                <option value="">--Курс--</option>
                                @foreach ($courses as $course)
                                <option @if ($course->id == $courseId) selected @endif value="{{$course->id}}">{{$course->number}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label>Група</label>
                            <select id="listform-groupid" class="form-control" name="group">
                                <option value="">--Група--</option>
                                @foreach ($groups as $group)
                                <option @if ($group->id == $groupId) selected @endif value="{{$group->id}}">{{$group->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-success" type="submit"> Знайти </button>
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
                                <th>Громадська активність</th>
                                <th>Досягнення у спорті та творчих конкурсах</th>
                                <th>@if (isset($_SESSION['worker']))
                                    Завантажений скан
                                    @endif</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr data-key="39270">
                                <td>{{$student->id}}</td>
                                <td>{{$student->fullname}}</td>
                                <td>{{$student->public_mark}}</td>
                                <td>{{$student->creat_achieviment_mark}}</td>
                                <td>@if (isset($_SESSION['worker']))
                                    @if($student->scan_added == 1) <img class="scanres" src="../../img/tick.svg" alt=" ">@else <img class="scanres" src="../../img/cross.svg" alt=" "> @endif
                                    @endif</td>
                                <td class="button">
                                    @if (isset($_SESSION['worker']))
                                    <div class="btn-table">
                                        <a href="/forms/edit_creative_points/{{$student->id}}" class="btn-link">
                                            <img class="fas fa-fw fa-edit" src="../../img/fas fa-fw fa-edit.svg" alt=" ">
                                            <span class="btn_text">Редагувати</span></a>
                                    </div>
                                    <div class="btn-table" href="#">
                                        <a href="/creativework/get_scan/{{$student->id}}" class="btn-link">
                                            <img class="fas fa-fw fa-view" src="../../img/view.svg" alt=" ">
                                            <span class="btn_text">Перегляд скану</span></a>
                                    </div>
                                    @endif
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                @if (isset($_SESSION['worker']))
                <div class="btn-add" data-toggle="collapse">
                    <a href="/forms/add_creative_points" class="btn-link">
                        <img class="fas fa-fw fa-add" src="../../img/fas fa-fw fa-add.svg" alt=" ">
                        <span class="btn_text">Додати</span></a>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- END TABLE -->
</div>
@endsection