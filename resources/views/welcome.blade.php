@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-1 text-green-800" style="display:none">Академ. групи </h1>
    <nav aria-label="breadcrumb">
    </nav>

    <div id="w1">
        <div id="w2" class="card shadow mb-2">
            <div class="card-body">
                <h1>Wellcome, to Apollo, @if (isset($_SESSION['worker'])) {{$_SESSION['worker']['name']}} @else Гість @endif</h1>
            </div>
        </div>
    </div>
</div>
@endsection