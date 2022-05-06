@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-1 text-green-800" style="display:none">Інше: Довідка </h1>
    <nav aria-label="breadcrumb">
        <ol id="w5" class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Інше</li>
            <li class="breadcrumb-item active" aria-current="page">Довідка</li>
        </ol>
    </nav>
    <div id="w1">
        <div id="w2" class="card shadow mb-2">
            <div class="card-body">
                <div class="info-deanery">
                    <span>Контакти деканату:<br>
                        +38 (056) 370-36-19<br>
                        dir.personal@krnu.edu.ua<br>
                        Адреса:<br>
                        м. Кременчук, Першотравнева вулиця, 20
                    </span>
                </div>
                <div class="info-texapollo">
                    <span>Технічна підтримка:<br>
                        Відділ по роботі з клієнтами:<br>
                        +38 (063) 733-49-35<br>
                        apollo@gmail.com
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection