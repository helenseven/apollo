@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-1 text-gray-800" style="display:none">Робочий план: Спеціальності </h1>
    <nav aria-label="breadcrumb">
        <ol id="w5" class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Робочий план</li>
            <li class="breadcrumb-item active" aria-current="page">Спеціальності</li>
        </ol>
    </nav>
    <div id="w0">
        <div id="w1" class="card shadow mb-2">
            <div class="card-body">
                <form id="filter-form" class="filter-form" action="/workplan/speciality" method="POST">
                    <input type="hidden" name="_csrf-frontend" value="PtZ1-WWWPyxnxB8UXPNEnNCIFvfXitYTU8LUgE6nrK584i22FOQJfi-cbiEYgCX25OJjh67NgXU49pCtOe7l_w==">
                    <div class="filter-form-fields-content row">
                        <div class="form-group col-md-3">
                            <label>Факультет</label>
                            <select id="workplanform-facultyid" class="form-control" name="WorkPlanForm[facultyId]">
                                <option value="">--Факультет--</option>
                                @foreach ($departments as $department)
                                <option value="{{$department->id}}">{{$department->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-1">
                            <label>Курс</label>
                            <select id="workplanform-course" class="form-control" name="WorkPlanForm[course]">
                                <option value="">--Курс--</option>
                                @foreach ($courses as $course)
                                <option value="{{$course->id}}">{{$course->number}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <label>Група</label>
                            <select id="workplanform-streamid" class="form-control" name="WorkPlanForm[streamId]">
                                <option value="">--Група--</option>
                                @foreach ($groups as $group)
                                <option value="{{$group->id}}">{{$group->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-success" type="submit"> Знайти </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="w2" class="card shadow mb-2">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-bordered table-striped table-hovered">
                    <thead class="table-secondary">
                        <tr>
                            <th rowspan="2">#</th>
                            <th rowspan="2">Дисципліна</th>
                            <th rowspan="2">ECTS</th>
                            <th colspan="6">Годин за планом</th>
                            <th rowspan="2">Экз</th>
                            <th rowspan="2">Зач</th>
                            <th rowspan="2">КП</th>
                            <th rowspan="2">КР</th>
                            <th rowspan="2">Кафедра</th>
                            <th rowspan="2">Примітка</th>
                        </tr>
                        <th>Всього</th>
                        <th>Лк</th>
                        <th>Пз</th>
                        <th>Сем</th>
                        <th>Лб</th>
                        <th>КнЧ</th>
                        <tr></tr>
                    </thead>
                    <tbody>
                        @foreach($workplans as $workplan)
                        <tr data-key="39270">
                            <td>{{$workplan->id}}</td>
                            <td>{{$workplan->title}}</td>
                            <td>{{$workplan->ects}}</td>
                            <td>{{$workplan->total}}</td>
                            <td>{{$workplan->lections}}</td>
                            <td>{{$workplan->practice}}</td>
                            <td>{{$workplan->seminars}}</td>
                            <td>{{$workplan->laboratory}}</td>
                            <td>{{$workplan->knch}}</td>
                            <td>{{$workplan->exam}}</td>
                            <td>{{$workplan->credit}}</td>
                            <td>{{$workplan->term_project}}</td>
                            <td>{{$workplan->tests}}</td>
                            <td>{{$workplan->chair_title}}</td>
                            <td>{{$workplan->notes}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="annotation-block" class="fade modal" role="dialog" tabindex="-1" aria-hidden="true" aria-labelledby="annotation-block-label">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="annotation-block-label" class="modal-title"></h5>
                </div>
                <div class="modal-body"></div>
            </div>
        </div>
    </div>
</div>
@endsection