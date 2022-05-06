<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8" />
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../../img/favicon.png">
    <meta name="csrf-param" content="_csrf-frontend">
    <meta name="csrf-token" content="diywBnrefiln8UehLqrSeONCfYVCeJr3xzlOLoy-IU8_AdVOOIQcEDWidIx8_oc-sR0wxw0P_bC9SyBNu8xpAA==">
    <title>Apollo</title>
    <link rel="stylesheet" href="../../css/add_form.css">
    <link rel="stylesheet" href="../../css/media.css" media="only screen and (max-width:840px)">
</head>

<body>
@if ($errors->any())
     @foreach ($errors->all() as $error)
         <div>{{$error}}</div>
     @endforeach
 @endif
    <h2>Заповніть інформацію</h2>
    <p>І вона буде додана до бази даних</p>

    <div class="container">
        <form action="/forms/create_scientific_points" method="POST">
        @csrf
            <div class="row">
                <div class="col-25">
                    <label for="student">ПІБ</label>
                </div>
                <div class="col-75">
                    <select id="student" name="student">
                        <option value="0">...</option>
                        @foreach ($students as $student)
                        <option value="{{$student->id}}">{{$student->fullname}}</option>
                        @endforeach
                        <!-- <option value="0">Коваленко Анна Георгіївна</option>
                        <option value="1">Коваленко Анна Георгіївна</option>
                        <option value="2">Дігтяр Євгеній Ігоревич</option>
                        <option value="3">Куценко Євгеній Ігоревич</option>
                        <option value="4">Дробаха Віктор Валерійович</option> -->
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="akademic_mark">Академічна робота</label>
                </div>
                <div class="col-75">
                    <input type="number" id="akademic_mark" name="akademic_mark" placeholder="..." required>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="scientific_mark">Наукова робота</label>
                </div>
                <div class="col-75">
                    <input type="number" id="scientific_mark" name="scientific_mark" placeholder="..." required>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label class="form-check-label" for="flexCheckDefault">Завантажений скан</label>
                </div>
                <div class="col-75">
                    <select name="scan_added">
                        <option value="0">...</option>
                        <option value="1">Так</option>
                        <option value="2">Ні</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label class="form-check-label" for="flexCheckDefault">Завантажити скан</label>
                </div>
                <div class="col-75">
                    <input class="btn_down" type="file" value="Завантажити скан">
                </div>
            </div>
            <div class="row">
                <input class="btn_edit" type="submit" value="Додати">
            </div>
        </form>
    </div>

</body>

</html>