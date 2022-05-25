@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-1 text-green-800" style="display:none">Успішність:Стипендіальний рейтинг</h1>
    <nav aria-label="breadcrumb">
        <ol id="w5" class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Успішність</li>
            <li class="breadcrumb-item active" aria-current="page">Стипендіальний рейтинг</li>
        </ol>
    </nav>

    <div id="w0">
        <div id="w1" class="card shadow mb-2">
            <div class="card-body">
                <form id="form-w0" class="filter-form" action="/progress/scholarship_rating" method="POST">

                    @csrf

                    <input type="hidden" name="_csrf-frontend" value="Rh5oVtSGF-e0xqfX6V5LfS5ynBdrX-U-luXwvFfkFzMRTTADncc6lOL09oKwMjoKWUbPVBFnpHrAiZ2MLqFwdQ==">
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
</div>

<div id="w4" class="card shadow mb-2">
    <div class="card-body">
        <label class="h5 font-weight-bold" style="text-decoration:underline">Виконано умови на отримання:</label>
        <table class="table table-borderless table-sm">
            <tbody>
                <tr>
                    <th class="table-success">Підвищена стипендія</th>
                    <th class="table-warning">Звичайна стипендія</th>
                    <th class="table-primary">Соціальна стипендія</th>
                    <th class="">Немає стипендії</th>
                </tr>
            </tbody>
        </table>

        <!-- TABLE -->
        <div id="w3" class="grid-view">
            <table class="table table-bordered table-hover table-sm">
                <thead>
                    <tr class="table-secondary">
                        <th>#</th>
                        <th>Студент</th>
                        <th>Стипендія</th>
                        <th>Академ.бал</th>
                        <th>Серевньозваж.бал</th>
                        <th>Додатковий бал</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    @foreach($students as $student)
                    <tr @if($student->benefit == 1) class="table-primary" @elseif($i == 1) class="table-success" @elseif($i !== 1 && $i <= $scholarshipAmount) class="table-warning" @endif data-key="39270">
                            <td>{{$student->id}}</td>
                            <td>{{$student->fullname}}</td>
                            <td>@if($student->benefit == 1)Соціальна @elseif($i == 1) Підвищена @elseif($i !== 1 && $i <= $scholarshipAmount) Звичайна @endif</td>
                            <td>{{$student->total_mark}}</td>
                            <td>{{$student->credit}}</td>
                            <td>{{$student->additional_score}}</td>
                    </tr>
                    <?php $i++ ?>
                    @endforeach
                </tbody>
            </table>
            <!-- END TABLE -->
            <div>
                @if (isset($_SESSION['worker']))
                <div class="btn-report" href="#" data-toggle="collapse">
                    <a href="/progress/scholarship_rating/get_zvit" class="btn-link">
                        <img class="fas fa-fw fa-report" src="../../img/report.svg" alt=" ">
                        <span class="btn_text">Сформувати звіт</span>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection