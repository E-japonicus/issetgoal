<?php
// 今回の設定された目標の取得
$this_time_records = $DB->get_record('issetgoal_rubrics', $composite_key);
// 前回の自己評価結果の取得
$last_sql = 'SELECT * FROM {isselfeval_rubrics} WHERE user_id = ? AND isselfeval_id = (SELECT id from {isselfeval} WHERE year = ? AND subject = ? ORDER BY times DESC LIMIT 1);';
$last_time_records = $DB->get_record_sql($last_sql, array($USER->id, $issetgoal->year, $issetgoal->subject));
?>

<link rel="stylesheet" type="text/css" href="./style.css">

<h1>今回あなたが登録した目標</h1>
<div style="padding: 20px 0px;">
今回登録した目標→<span class="this-time">&emsp;&emsp;</span>
前回の自己評価→<span class="last-time">前回</span>
</div>

<table class="table table-bordered">
	<tbody>
		<tr>
            <th style="text-align:center" rowspan="2" colspan="2" width="15%">規準</th>
            <th style="text-align:center" colspan="4">基準</th>
        </tr>
        <tr>
            <th style="text-align:center" width="15%">レベル０</th>
            <th style="text-align:center" width="15%">レベル１</th>
            <th style="text-align:center" width="15%">レベル２</th>
            <th style="text-align:center" width="15%">レベル３</th> 
        </tr>
		<?php for ($i=1; $i <= 11 ; $i++): ?>
			<tr height="150">
				<th width="2%"><?php echo $i ?></th>
				<th><?php echo get_string("rubric[{$i}]", 'issetgoal')?></th>
				<?php for ($j=0; $j < 4; $j++) : ?>
				<!-- ルーブリックの取得 -->
				<?php ${"dis_rubric_".$j} = (get_string("rubric[{$i}]_score{$j}", 'issetgoal') === '') ? '' : get_string("rubric[{$i}]_suffix", 'issetgoal').get_string("rubric[{$i}]_score{$j}", 'issetgoal') ?>
				<!-- 今回の結果のセルの色を変える -->
				<?php $this_time_class = ($this_time_records->{"rubric_{$i}"} === "{$j}") ? 'this-time' : '' ?>
				<!-- 前回の結果のspanを表示 -->
				<?php $last_time_label =  ($last_time_records->{"rubric_{$i}"} === "{$j}") ? '</br></br><span class="last-time">前回の自己評価</span>' : '' ?>

				<td class=<?php echo $this_time_class ?>>
					<?php echo ${"dis_rubric_".$j} ?>
					<?php echo $last_time_label ?>
				</td>
				<?php endfor; ?>
			</tr>			
		<?php endfor; ?>
		
	</tbody>
</table>