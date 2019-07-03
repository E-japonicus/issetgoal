<?php
// 今回の設定された目標の取得
$setgoal_records = $DB->get_record('issetgoal_rubrics', $composite_key);

// 自己・他者評価結果の取得
include './get_records_sql.php';

?>

<link rel="stylesheet" type="text/css" href="./style.css">
<script type="text/javascript" src="./javascript/jquery-3.3.1.min.js"></script>
<script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>

<h1>今回あなたが登録した目標</h1>

<div class="sticky">
    <table class="table table-bordered" style="background-color:#fcfff9">
        <tbody>
            <tr>
                <th style="text-align:center" width="50%">相互評価用チェックリスト</th>
                <th style="text-align:center" width="50%">演習目標(作問の要件)</th>
            </tr>
            <tr>
                <td><?php echo get_string('good_quiz_help', 'issetgoal')?></td>
                <td><?php echo nl2br($issetgoal->target);?></td>
            </tr>
        </tbody>
    </table>
</div>

<table class="table table-bordered table-checked" style="height:200px;">
	<thead style="background: #f8f8f8;">
		<tr>
			<th style="text-align:center" rowspan="2"width="15%">規準</th>
			<th style="text-align:center" colspan="4">基準</th>
		</tr>
		<tr>
			<th style="text-align:center" width="15%">レベル０</th>
			<th style="text-align:center" width="15%">レベル１</th>
			<th style="text-align:center" width="15%">レベル２</th>
			<th style="text-align:center" width="15%">レベル３</th>
			
		</tr>
	</thead>
	<tbody>
		<?php for ($i=1; $i <= 11 ; $i++): ?>
		<tr height="200">
			<th>
				<?php echo get_string("rubric[{$i}]", 'issetgoal')?>
			</th>
			<?php for ($j=0; $j < 4; $j++) :?>
			<?php $setgoal_label = ($setgoal_records->{"rubric_{$i}"} === "{$j}") ? 'this-time' : '' ?>
			<td class="<?php echo $setgoal_label ?>">
				<label style="display: block; width:100%; height:100%;">
					<?php echo get_string("rubric[{$i}]_score{$j}", 'issetgoal') ?>
					<!-- 自己評価結果のラベル -->
					<?php 
					$selfeval_count = count($selfeval_times);
					// 第x回自己評価
					foreach ($selfeval_times as $selfeval_time) :
						// 自己評価結果
						foreach ($selfeval_records as $selfeval_record) :
							// 取得した自己評価の回数が一致
							if ($selfeval_time->id === $selfeval_record->isselfeval_id) {
								// x回自己評価のラベル出力
								echo (($selfeval_record->{"rubric_{$i}"} === "{$j}") ? "</br></br><span class='time-label self-${selfeval_count}'>${selfeval_count}回自己評価</span>" : '');
							}
						endforeach;
						$selfeval_count--;
					endforeach;
					?>
					<!-- 他者評価ラベル -->
					<?php 
					$k = 0;
					foreach ($peereval_records as $peereval_record) :
							echo (($peereval_record->{"rubric_{$i}"} === "{$j}") ? "</br></br><span class='time-label peer-eval'>{$peer_name[$k]}からの評価</span>" : '');
							$k++;
					endforeach;
					?>
				</label>
			</td>                
			<?php endfor;?>		
		</tr>
		<?php endfor; ?>
	</tbody>
</table>
<!-- 
<form method="post" action="" name="selfeval_consider_edit">
	<button class="submit-button" name="consider_edit">自己評価が変化した理由を編集する</button>
</form> -->
