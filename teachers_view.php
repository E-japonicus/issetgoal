<link rel="stylesheet" type="text/css" href="./style.css">
<script type="text/javascript" src="./javascript/jquery-3.3.1.min.js"></script>
<script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>

<!-- グラフのライブラリの読み込み -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>



<!-- タブボタン部分 -->
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a href="#tab1" class="nav-link active" data-toggle="tab">フォーム</a>
    </li>
    <li class="nav-item">
      <a href="#tab2" class="nav-link" data-toggle="tab">全体の傾向</a>
    </li>
    <li class="nav-item">
      <a href="#tab3" class="nav-link" data-toggle="tab">ルーブリック登録一覧</a>
    </li>
  </ul>

  <!--タブのコンテンツ部分-->
  <div class="tab-content">
    <div id="tab1" class="tab-pane active">
      <?php require_once("{$CFG->dirroot}/mod/issetgoal/setgoal_form.php"); ?>
    </div>
    <div id="tab2" class="tab-pane">
      <?php require_once("{$CFG->dirroot}/mod/issetgoal/teachers_charts.php"); ?>
    </div>
    <div id="tab3" class="tab-pane">
      <?php require_once("{$CFG->dirroot}/mod/issetgoal/teachers_list.php"); ?>
    </div>
  </div>