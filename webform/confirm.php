<?php
session_start();
$_SESSION['back'] = true;

$csrf_token = $_SESSION['token'];

$line_id = filter_input(INPUT_POST, 'line_id');
$genre = filter_input(INPUT_POST, 'genre');
$user_name = filter_input(INPUT_POST, 'user-name');
$tel = filter_input(INPUT_POST, 'tel');
$remarks = filter_input(INPUT_POST, 'remarks');
$genre_id = filter_input(INPUT_POST, 'genre_id');
$cal_id = filter_input(INPUT_POST, 'calId'.$genre_id);
$event_name = filter_input(INPUT_POST, 'eventName'.$genre_id);
$event_id = filter_input(INPUT_POST, 'eventId'.$genre_id);
$event_date = filter_input(INPUT_POST, 'eventDate'.$genre_id);
$event_time = filter_input(INPUT_POST, 'eventTime'.$genre_id);
$seats = filter_input(INPUT_POST, 'seats'.$genre_id);
$memo = filter_input(INPUT_POST, 'memo'.$genre_id);
$radio_date = filter_input(INPUT_POST, 'radio_date'.$genre_id);

$_SESSION['line_id'] = $line_id;
$_SESSION['genre'] = $genre;
$_SESSION['user-name'] = $user_name;
$_SESSION['tel'] = $tel;
$_SESSION['remarks'] = $remarks;
$_SESSION['cal-id'] = $cal_id;
$_SESSION['event-name'] = $event_name;
$_SESSION['event-id'] = $event_id;
$_SESSION['event-date'] = $event_date;
$_SESSION['event-time'] = $event_time;
$_SESSION['seats'] = $seats;
$_SESSION['memo'] = $memo;
$_SESSION['radio-date'] = $radio_date;
$_SESSION['genre-id'] = $genre_id;



// htmlspecialchars
function h($s) {
    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
  }
?>
<!DOCTYPE html>
<html lang="ja">

<head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-PPEK52GV28"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-PPEK52GV28');
</script>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>予約システム｜駿府の工房 匠宿 星と森 木育スペース</title>
  <meta name="description" content="駿府の工房 匠宿 星と森 木育スペースの予約システムです">
  <meta name="robots" content="nofollow">
  <meta property="og:title" content="駿府の工房 匠宿 星と森 木育スペースの予約システム">
  <meta property="og:description" content="駿府の工房 匠宿 星と森 木育スペースの予約システムです">
  <meta property="og:type" content="article">
  <meta name="twitter:card" content="summary_large_image">
  <link rel="stylesheet" href="./css/base.css">
  <link rel="stylesheet" href="./css/form.css">
</head>

<body>
  <div class="form-cover"></div>
  <div class="form-title">
    <!-- <h1>予約内容確認</h1> -->
    <p>下記の内容で予約を致します</p>
  </div>
  <div class="form-wrapper">
    <form action="./thanks.php" method="POST" enctype="multipart/form-data">
      <div class="form-controller">
          <label>
            <b>日程選択:</b>
          </label>
          <div class="form-group con-div">
            <?= h($radio_date) ?>
          </div>
      </div>
      <div class="form-controller">
        <label>
        <b>お名前:</b>
          </label>
          <div class="form-group con-div">
            <?= h($user_name) ?>
          </div>
      </div>
      <div class="form-controller">
        <label>
        <b>連絡先tel:</b>
        </label>
        <div class="form-group con-div">
          <?= h($tel) ?>
        </div>
      </div>
      <div class="form-controller">
        <label>
        <b>備考:</b>
        </label>
        <div class="form-group con-div">
            <?= nl2br($remarks) ?>
        </div>
      </div>
      <input type='hidden' name='line_id' id='line_id' value="<?= h($line_id) ?>">
      <input type='hidden' name='genre' id='genre' value="<?= h($genre) ?>">
      <input type='hidden' name='user_name' id='user_name' value="<?= h($user_name) ?>">
      <input type='hidden' name='tel' id='tel' value="<?= h($tel) ?>">
      <input type='hidden' name='remarks' id='remarks' value="<?= h($remarks) ?>">
      <input type='hidden' name='cal_id' id='cal_id' value="<?= h($cal_id) ?>">
      <input type='hidden' name='event_name' id='event_name' value="<?= h($event_name) ?>">
      <input type='hidden' name='event_id' id='event_id' value="<?= h($event_id) ?>">
      <input type='hidden' name='event_date' id='event_date' value="<?= h($event_date) ?>">
      <input type='hidden' name='event_time' id='event_time' value="<?= h($event_time) ?>">
      <input type='hidden' name='seats' id='seats' value="<?= h($seats) ?>">
      <input type='hidden' name='memo' id='memo' value="<?= h($memo) ?>">
      <input type="hidden" name="token" id="token"  value="<?= $csrf_token ?>">
      <div class="submit-button-s col-xs-3" style="padding-left: 0px;">
        <input type="button" value="戻る">
      </div>
      <div class="submit-button-s col-xs-6">
        <input type="submit" value="送信する" onClick="javascript:double(this)">
      </div>
    </form>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ja.js"></script>
<script src="./js/vendor/throttle-debounce.min.js"></script>
<script src="./js/vendor/holiday_jp.min.js"></script>
<script src="./js/post.js?v=0.1"></script>
<script>
    function double(btn){
        btn.disabled=true;
    }
</script>
</html>
