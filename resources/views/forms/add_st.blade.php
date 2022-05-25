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
    <form action="/forms/create_st" method="POST">
      @csrf
      <div class="row">
        <div class="col-25">
          <label for="departments">Факультет</label>
        </div>
        <div class="col-75">
          <select id="department" name="department">
            <option value="">--Факультет--</option>
            @foreach ($departments as $department)
            <option value="{{$department->id}}">{{$department->title}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="course">Курс</label>
        </div>
        <div class="col-75">
          <select id="course" name="course">
            <option value="">--Курс--</option>
            @foreach ($courses as $course)
            <option value="{{$course->id}}">{{$course->number}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="group">Група</label>
        </div>
        <div class="col-75">
          <select id="group" name="group">
            <option value="">--Група--</option>
            @foreach ($groups as $group)
            <option value="{{$group->id}}">{{$group->title}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="fullname">ПІБ</label>
        </div>
        <div class="col-75">
          <input type="text" id="fullname" name="fullname" placeholder="Cтудента.." required>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="card_number">№ картки студента</label>
        </div>
        <div class="col-75">
          <input type="number" id="card_number" name="card_number" placeholder="№..." required>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="card_number">№ заліковки студента</label>
        </div>
        <div class="col-75">
          <input type="number" id="zalikovka_number" name="zalikovka_number" placeholder="№..." required>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label class="form-check-label" for="flexCheckDefault">Наявні пільги</label>
        </div>
        <div class="col-75">
          <select name="benefit">
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