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

  <h2>Заповніть інформацію</h2>
  <p>І вона буде додана до бази даних</p>

  <div class="container">
    <form action="/forms/create_rat" method="POST">
      @csrf
      <div class="row">
        <div class="col-25">
          <label for="finance">Фінансування</label>
        </div>
        <div class="col-75">
          <select id="finance" name="finance">
            <option value="0">--Фінансування--</option>
            @foreach ($finances as $finance)
            <option value="{{$finance->id}}">{{$finance->title}}</option>
            @endforeach
            <!-- <option value="1">Бюджет</option>
            <option value="2">Контракт</option> -->
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="student">ПІБ Студента</label>
        </div>
        <div class="col-75">
          <select id="student" name="student">
            <option value="0">...</option>
            @foreach ($students as $student)
            <option value="{{$student->id}}">{{$student->fullname}}</option>
            @endforeach
            <!-- <option value="123">Деменко Анна Георгіївна</option>
            <option value="124">Дігтяр Євгеній Ігоревич</option>
            <option value="125">Дмитренко Олег Олександрович</option> -->
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="semester">Семестр</label>
        </div>
        <div class="col-75">
          <select id="semester" name="semester">
            <option value="">--Оберіть Семестр--</option>
            <optgroup label="2021, 4 курс">
              <option value="7">7</option>
              <option value="8">8</option>
            </optgroup>
            <optgroup label="2020, 3 курс">
              <option value="5">5</option>
              <option value="6">6</option>
            </optgroup>
            <optgroup label="2019, 2 курс">
              <option value="3">3</option>
              <option value="4">4</option>
            </optgroup>
            <optgroup label="2018, 1 курс">
              <option value="1">1</option>
              <option value="2">2</option>
            </optgroup>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="total_mark">Загальний бали</label>
        </div>
        <div class="col-75">
          <input type="number" id="total_mark" name="total_mark" placeholder="..." required>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="credit">Залік</label>
        </div>
        <div class="col-75">
          <input type="number" id="credit" name="credit" placeholder="..." required>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="exam">Екзамен</label>
        </div>
        <div class="col-75">
          <input type="number" id="exam" name="exam" placeholder="..." required>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label class="form-check-label" for="flexCheckDefault">Вчасно складена сесія</label>
        </div>
        <div class="col-75">
          <select name="session_done">
            <option value="0">...</option>
            <option value="1">Так</option>
            <option value="2">Ні</option>
          </select>
        </div>
      </div>

      <div class="row">
        <input class="btn_edit" type="submit" value="Додати">
      </div>



    </form>
  </div>

</body>

</html>