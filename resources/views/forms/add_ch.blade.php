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
    <form action="/forms/create_ch" method="POST">
    @csrf
      <div class="row">
        <div class="col-25">
          <label for="chair">Кафедра</label>
        </div>
        <div class="col-75">
          <select id="chair" name="chair">
            <option value="">--Кафедра--</option>
            @foreach ($chairs as $chair)
            <option value="{{$chair->id}}">{{$chair->title}}</option>
            @endforeach
            <!-- <option value="45">Автоматизації та інформаційних систем</option>
            <option value="1">Автомобілів і тракторів</option>
            <option value="47">Екології та біотехнологій</option>
            <option value="43">Елетротехніки</option>
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

      <div class="row">
        <div class="col-25">
          <label for="fullname">ПІБ</label>
        </div>
        <div class="col-75">
          <input type="text" id="fullname" name="fullname" placeholder="Викладача..." required>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="position">Посада</label>
        </div>
        <div class="col-75">
          <select id="position" name="position">
            <option value="0">...</option>
            <option value="1">доц.</option>
            <option value="2">проф.</option>
            <option value="3">ст.викл</option>
            <option value="4">асист.</option>
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