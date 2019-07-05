<link rel="stylesheet" type="text/css" href="./style.css">
<script type="text/javascript" src="./javascript/jquery-3.3.1.min.js"></script>
<script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>

<!-- グラフのライブラリの読み込み -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#form">フォーム</a></li>
  <li><a data-toggle="tab" href="#charts">全体の傾向</a></li>
  <li><a data-toggle="tab" href="#list">ルーブリック登録一覧</a></li>
</ul>

<div class="tab-content">
  <div id="form" class="tab-pane fade fade in active">
    <?php require_once("{$CFG->dirroot}/mod/issetgoal/setgoal_form.php"); ?>
  </div>

  <div id="charts" class="tab-pane fade">
    <?php require_once("{$CFG->dirroot}/mod/issetgoal/teachers_charts.php"); ?>
  </div>

  <div id="list" class="tab-pane fade">
    <?php require_once("{$CFG->dirroot}/mod/issetgoal/teachers_list.php"); ?>
  </div>
</div>