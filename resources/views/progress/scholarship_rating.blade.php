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
                            </select>
                        </div>
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
                    <tr class="table-success" data-key="0">
                        <td>1</td>
                        <td>Будній Олег Ігорович</td>
                        <td>Звичайна</td>
                        <td>84.5</td>
                        <td>91.67</td>
                        <td>2</td>
                    </tr>
                    <tr class="table-success" data-key="1">
                        <td>2</td>
                        <td>Ціома Олександр Вікторович</td>
                        <td>Звичайна</td>
                        <td>82.38</td>
                        <td>91.53</td>
                        <td>0</td>
                    </tr>
                    <tr class="table-warning" data-key="2">
                        <td>3</td>
                        <td>Таран Костянтин Сергійович</td>
                        <td>Звичайна</td>
                        <td>70.25</td>
                        <td>72.5</td>
                        <td>5</td>
                    </tr>
                    <tr class="" data-key="3">
                        <td>4</td>
                        <td>Середа Олексій Сергійович</td>
                        <td></td>
                        <td>67.89</td>
                        <td>75.43</td>
                        <td>0</td>
                    </tr>
                </tbody>
            </table>
            <!-- END TABLE -->

            <div class="btn-report" href="#" data-toggle="collapse">
                <img class="fas fa-fw fa-report" src="../../img/report.svg" alt=" ">
                <span class="btn_text">Сформувати звіт</span>
            </div>
            </ul>
        </div>
    </div>
</div>
@endsection