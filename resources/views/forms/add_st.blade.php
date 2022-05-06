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
            <!-- <option value="13">Аспірантура</option>
            <option value="14">Навчально-науковий інститут електричної інженерії та інформаційних техноголій</option>
            <option value="15">Навчально-науковий інститут механічної інженерії, транспорту та природничих наук</option>
            <option value="4">Факультет економіки і управління</option>
            <option value="6">Факультет права, гуманітарних і соціальних наук</option>
            <option value="7">Навчальний відділ</option> -->
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
            <!-- <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option> -->
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
            <!-- <option value="2536">БТ-18-1</option>
            <option value="2534">ЕО-18-1</option>
            <option value="2656">ПМс-19-1</option>
            <option value="2538">ФТ-18-1</option>
            <option value="2542">ЦБ-18-1</option>
            <option value="2663">АТс-19-2з</option>
            <option value="2753">ГЗс-19-1з</option>
            <option value="2657">ПМс-19-1з</option>
            <option value="2543">ЦБ-18-1з</option> -->
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
        <input class="btn_edit" type="submit" value="Додати">
      </div>
    </form>
  </div>

</body>

</html>