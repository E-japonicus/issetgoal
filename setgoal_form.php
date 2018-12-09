<?php
// 前回の自己評価結果の取得
$last_sql = 'SELECT RU.* FROM (SELECT * FROM {isselfeval_rubrics} WHERE user_id = ?) RU INNER JOIN (SELECT * FROM {isselfeval} WHERE year = ? AND subject = ?) SE ON SE.id = RU.isselfeval_id ORDER BY timecreated DESC LIMIT 1;';
// $last_sql = 'SELECT * FROM {isselfeval_rubrics} WHERE user_id = ? AND isselfeval_id = (SELECT id from {isselfeval} WHERE year = ? AND subject = ? ORDER BY times DESC LIMIT 1);';
$last_time_records = $DB->get_record_sql($last_sql, array($USER->id, $issetgoal->year, $issetgoal->subject));

?>
<h1>今回あなたが達成したい基準を選択してください</h1>
<div style="padding: 20px 0px;">
前回の自己評価の結果→<span class="last-time">前回</span>
</div>

<link rel="stylesheet" type="text/css" href="./style.css">
<script type="text/javascript" src="./javascript/jquery-3.3.1.min.js"></script>

<div>


<table class="table table-bordered sticky">
	<tbody>
		<tr>
			<th style="text-align:center" width="50%">良問の基準</th>
			<th style="text-align:center" width="50%">演習目標</th>
		</tr>
		<tr>
			<td><?php echo get_string('good_quiz_help', 'issetgoal')?></td>
			<td><?php echo nl2br($issetgoal->target);?></td>
		</tr>
	</tbody>
</table>

<form method="post" action="" name="selfeval_rubrics">
    <table class="table table-bordered table-checked" style="height:200px;">
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
                    <th width="2%">
                        <?php echo $i ?>
                    </th>
                    <th>
                        <?php echo get_string("rubric[{$i}]", 'issetgoal')?>
                    </th>
                    <?php for ($j=0; $j < 4; $j++) :?>
                        <?php if (get_string("rubric[{$i}]_score{$j}", 'issetgoal') === '') :?>
                            <td></td>
                        <?php else:?>
                        <!-- 前回の結果のspanを表示 -->
        				<?php $last_time_label =  ($last_time_records->{"rubric_{$i}"} === "{$j}") ? '</br></br><span class="last-time">前回の自己評価</span>' : '' ?>

                        <td>
                            <label style="display: block; width:100%; height:100%;">
                                <input type="radio" name="rubric_<?php echo $i?>" value="<?php echo $j?>" required>
                                <?php echo get_string("rubric[{$i}]_suffix", 'issetgoal').get_string("rubric[{$i}]_score{$j}", 'issetgoal') ?>
                                <?php echo $last_time_label ?>
                            </label>
                        </td>
                        <?php endif;?>                    
                    <?php endfor; ?>
                </tr>              
            <?php endfor; ?>
            
        </tbody>
    </table>
    <button class="submit-button" name="rubrics_submit">目標を登録する</button>
    </form>
</div>

<script>
// ラジオボタン背景色
$(function(){
    $('.table-checked :radio').change(
        function() { 
            $('.table-checked td :radio').closest('td').removeClass('this-time');
            $('.table-checked td :checked').closest('td').addClass('this-time');
        }
    ).trigger('change');
});
</script>