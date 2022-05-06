@extends('layouts.app')
@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-1 text-gray-800" style="display:none">Список: Кафедри</h1>
    <nav aria-label="breadcrumb">
        <ol id="w6" class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Список</li>
            <li class="breadcrumb-item active" aria-current="page">Кафедри</li>
        </ol>
    </nav>

    <div id="w0">
        <div id="w1" class="card shadow mb-2">
            <div class="card-body">
                <form id="form-w0" class="filter-form" action="/list/chair" method="POST">
                    <input type="hidden" name="_csrf-frontend" value="t-7UchhQYIBkiVrSUnkCEWdPq7FuK0mxUdkRlr9bt2_12ow9aSJW0izRK-cWCmN7UyXewRdsHtc67VW7yBL-Pg==">
                    <div class="filter-form-fields-content row">
                        <div class="form-group col-md-3">
                            <label>Кафедра</label>
                            <select id="listform-chairid" class="form-control" name="ListForm[chairId]">
                                <option value="">--Кафедра--</option>
                                @foreach ($chairs as $chair)
                                <option value="{{$chair->id}}">{{$chair->title}}</option>
                                @endforeach
                                <!-- <option value="">--Кафедра--</option>
                                <option value="45">Автоматизації та інформаційних систем</option>
                                <option value="1">Автомобілів і тракторів</option>
                                <option value="47">Екології та біотехнологій</option>
                                <option value="43" selected>Елетротехніки</option>
                                <option value="38">Здоров&#039;я людини та фізична культура</option>
                                <option value="44">Комп&#039;ютерної інженерії та елетроніки</option>
                                <option value="46">Машинобудування</option>
                                <option value="40">Обліку і фінансів</option>
                                <option value="49">Фундаментальних і галузевих юридичних наук</option>
                                <option value="48">Цивільної безпеки, охорони праці, геодезії та землеустрою</option>
                                <option value="4">Економіки</option>
                                <option value="16">Філології та видавничої справи</option>
                                <option value="15">Інформатики і вищої математики</option>
                                <option value="14">Менеджменту</option>
                                <option value="26">Перекладу</option>
                                <option value="7">Систем автоматичного управління і електроприводу</option>
                                <option value="5">Психології, педагогіки та філософії</option>
                                <option value="33">Транспортних технологій</option>
                                <option value="17">Гуманітарних наук, культури і мистецтва</option>
                                <option value="42">Бізнесу адміністрування, маркетингу і туризму</option>
                                <option value="22">Навчальний відділ</option> -->
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="w3" class="card shadow mb-2">
        <div class="card-body">

            <!-- TABLE -->
            <div class="table-responsive">
                <div id="w2" class="grid-view">
                    <table class="table table-bordered table-hover table-sm">
                        <thead>
                            <tr class="table-secondary">
                                <th>№</th>
                                <th>Викладач</th>
                                <th>Посада</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($chairWorkers as $chairWorker)
                            <tr data-key="151">
                                <td>{{$chairWorker->id}}</td>
                                <td>{{$chairWorker->fullname}}</td>
                                <td>{{$chairWorker->title}}</td>
                                <td class="button">
                                    <div class="btn-table" href="#">
                                        <a href="/forms/edit_ch/{{$chairWorker->id}}" class="btn-link">
                                            <img class="fas fa-fw fa-edit" src="../../img/fas fa-fw fa-edit.svg" alt=" ">
                                            <span class="btn_text">Редагувати</span></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            <!-- <tr data-key="151">
                                <td>1</td>
                                <td>Андрусів Жанна Сергіївна</td>
                                <td>доц</td>
                                <td class="button">
                                    <div class="btn-table" href="#">
                                    <a href="/forms/edit_ch" class="btn-link">
                                        <img class="fas fa-fw fa-edit" src="../../img/fas fa-fw fa-edit.svg" alt=" ">
                                        <span class="btn_text">Редагувати</span></a>
                                    </div>
                                </td>
                            </tr>
                            <tr data-key="192">
                                <td>2</td>
                                <td>Войцеховський Устим Леонідович</td>
                                <td>проф</td>
                                <td>
                                    <div class="btn-table" href="#">
                                    <a href="/forms/edit_ch" class="btn-link">
                                        <img class="fas fa-fw fa-edit" src="../../img/fas fa-fw fa-edit.svg" alt=" ">
                                        <span class="btn_text">Редагувати</span></a>
                                    </div>
                                </td>
                            </tr>
                            <tr data-key="13">
                                <td>3</td>
                                <td>Нечитайло Кузьма Богуславович</td>
                                <td>проф</td>
                                <td>
                                    <div class="btn-table" href="#">
                                    <a href="/forms/edit_ch" class="btn-link">
                                        <img class="fas fa-fw fa-edit" src="../../img/fas fa-fw fa-edit.svg" alt=" ">
                                        <span class="btn_text">Редагувати</span></a>
                                    </div>
                                </td>
                            </tr>
                            <tr data-key="395">
                                <td>4</td>
                                <td>Крук Євфросинія Мстиславівна</td>
                                <td>ст.викл</td>
                                <td>
                                    <div class="btn-table" href="#">
                                    <a href="/forms/edit_ch" class="btn-link">
                                        <img class="fas fa-fw fa-edit" src="../../img/fas fa-fw fa-edit.svg" alt=" ">
                                        <span class="btn_text">Редагувати</span></a> 
                                    </div>
                                </td>
                            </tr>
                            <tr data-key="953">
                                <td>5</td>
                                <td>Цісик Емма Тихонівна</td>
                                <td>доц</td>
                                <td>
                                    <div class="btn-table" href="#">
                                        <a href="/forms/edit_ch" class="btn-link">
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
                <a href="/forms/add_ch" class="btn-link">
                    <img class="fas fa-fw fa-add" src="../../img/fas fa-fw fa-add.svg" alt=" ">
                    <span class="btn_text">Додати</span></a>
            </div>
        </div>
    </div>
</div>
@endsection