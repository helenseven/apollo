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

                    @csrf

                    <input type="hidden" name="_csrf-frontend" value="t-7UchhQYIBkiVrSUnkCEWdPq7FuK0mxUdkRlr9bt2_12ow9aSJW0izRK-cWCmN7UyXewRdsHtc67VW7yBL-Pg==">
                    <div class="filter-form-fields-content row">
                        <div class="form-group col-md-3">
                            <label>Кафедра</label>
                            <select id="listform-chairid" class="form-control" name="chair">
                                <option value="">--Кафедра--</option>
                                @foreach ($chairs as $chair)
                                <option @if ($chair->id == $chairId) selected @endif value="{{$chair->id}}">{{$chair->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-success" type="submit"> Знайти </button>
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
                                    @if (isset($_SESSION['worker']))
                                    <div class="btn-table" href="#">
                                        <a href="/forms/edit_ch/{{$chairWorker->id}}" class="btn-link">
                                            <img class="fas fa-fw fa-edit" src="../../img/fas fa-fw fa-edit.svg" alt=" ">
                                            <span class="btn_text">Редагувати</span></a>
                                    </div>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END TABLE -->
            <div>
                @if (isset($_SESSION['worker']))
                <div class="btn-add" data-toggle="collapse">
                    <a href="/forms/add_ch" class="btn-link">
                        <img class="fas fa-fw fa-add" src="../../img/fas fa-fw fa-add.svg" alt=" ">
                        <span class="btn_text">Додати</span></a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection