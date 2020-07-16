<table class="table table-bordered">
	<tbody>
		<tr>
			<th style="text-align:center" rowspan="2" width="15%">規準</th>
			<th style="text-align:center" colspan="4">基準</th>
			<th style="text-align:center" rowspan="2">全体の傾向</th>
		</tr>
		<tr>
			<th style="text-align:center" width="15%">レベル０</th>
			<th style="text-align:center" width="15%">レベル１</th>
			<th style="text-align:center" width="15%">レベル２</th>
			<th style="text-align:center" width="15%">レベル３</th>
		</tr>
		<?php for ($i=1; $i <= 8 ; $i++): ?>
			<tr>
				<th><?php echo get_string("rubric[{$i}]", 'isselfeval')?></th>
				<?php for ($j=0; $j < 4; $j++) : ?>
				<!-- ルーブリックの取得 -->
				<?php ${"dis_rubric_".$j} = (get_string("rubric[{$i}]_score{$j}", 'isselfeval') === '') ? '' : get_string("rubric[{$i}]_suffix", 'isselfeval').get_string("rubric[{$i}]_score{$j}", 'isselfeval') ?>
				<td>
					<?php echo ${"dis_rubric_".$j} ?>
				</td>
				<?php endfor; ?>
				<!-- グラフの描写 -->
				<td><?php echo "<canvas height='180' id='rubric-graph-{$i}'></canvas>"?></td>
			</tr>			
		<?php endfor; ?>
		
	</tbody>
</table>

<!-- 円グラフの読み込み -->
<?php include_once './create_pie_chart.php' ?>