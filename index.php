<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="#">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>萬年曆作業</title>
  <style>
    /*請在這裹撰寫你的CSS*/
    * {
      box-sizing: border-box;
    }

    .main-background {
      background-color: #666666;
    }

    .container {
      width: 80%;
      border: 1px solid black;
      height: 800px
    }

    .left-character {
      height: 600px;
      width: 30%;
      margin-top: 100px;
      margin-right: 40px;
    }

    .right-calendar {
      height: 600px;
      width: 60%;
      margin-top: 100px;
    }

    .row {
      justify-content: center;
    }

    .nextmonth,
    .premonth {
      text-decoration: none;
    }

    .premonth:hover,
    .nextmonth:hover {
      color: burlywood;
    }

    table {
      border-collapse: collapse;
      width: 80%;
    }

    td:nth-child(1),
    td:nth-child(7) {
      background-color: pink;
    }

    table td {
      border: 1px solid #ccc;
      padding: 3px 9px;
    }

    .calendar{
      margin-left: 100px;
      text-align: center;
    }
  </style>
</head>

<body class="main-background">
  <?php
  /*請在這裹撰寫你的萬年曆程式碼*/
  $cal = [];

  $month = (isset($_GET['m'])) ? $_GET['m'] : date("n");
  $year = (isset($_GET['y'])) ? $_GET['y'] : date("Y");

  $nextMonth = $month + 1;
  $preMonth = $month - 1;
  $nextYear = $year;
  $preYear = $year;

  if ($nextMonth == 13) {
    $nextMonth = 1;
    $nextYear = $year + 1;
  }
  if ($preMonth == 0) {
    $preMonth = 12;
    $preYear = $year - 1;
  }

  $firstDay = $year . "-" . $month . "-1";
  $firstDayWeek = date("w", strtotime($firstDay));
  $monthDays = date("t", strtotime($firstDay));
  $lastday = $year . "-" . $month . "-" . $monthDays;
  $spaceDays = $firstDayWeek;
  // 日 一 二 三 四 五 六
  // spaceDays代表空白天數 例如 今天星期六  前面有6天
  $weeks = ceil(($monthDays + $spaceDays) / 7);
  // weeks 算出這個月有幾周
  // ceil函式 => 無條件進位
  for ($i = 0; $i < $spaceDays; $i++) {
    $cal[] = '';
  }
  for ($i = 0; $i < $monthDays; $i++) {
    $cal[] = date("j", strtotime("$i days", strtotime($firstDay)));
  }

  

  ?>
  <h1>萬年曆</h1>

  <div class="container">
    <div class="row">
      <div class="col-4 bg-primary rounded-4 left-character">
        角色
      </div>
      <div class="col-8 bg-warning rounded-4 right-calendar">
        萬年曆
        <div class="calendar">
          <div style="display:flex;width:80%;justify-content:space-between;align-items:center">

            <a href="?y=<?= $preYear; ?>&m=<?= $preMonth; ?>" class="premonth">
              <i class="fa-solid fa-arrow-left"></i>
              上一個月
            </a>

            <h1><?= $year; ?> 年 <?= $month; ?> 月份</h1>

            <a href="?y=<?= $nextYear; ?>&m=<?= $nextMonth; ?>" class="nextmonth">下一個月
              <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
          <table>
            <tr>
              <td>日</td>
              <td>一</td>
              <td>二</td>
              <td>三</td>
              <td>四</td>
              <td>五</td>
              <td>六</td>
            </tr>
            <?php
            foreach ($cal as $i => $day) {
              if ($i % 7 == 0) {
                echo "<tr>"; 
                               
              }
              
              echo "<td>$day</td>";
              
              if ($i % 7 == 6) {
                echo "</tr>";
              }              
            }
              
            ?>

          </table>
        </div>
      </div>
    </div>
  </div>




</body>

</html>