<?php
// 　自己評価結果の取得
$selfeval_times_sql = 'SELECT id from {isselfeval} WHERE year = ? AND subject = ?';
$selfeval_times = $DB->get_records_sql("${selfeval_times_sql} ORDER BY times DESC", array($issetgoal->year, $issetgoal->subject));
$selfeval_count = count($selfeval_times);
$selfeval_column = 'A.*, B.rubric_1 AS rubric_1_consider, B.rubric_2 AS rubric_2_consider, B.rubric_3 AS rubric_3_consider, B.rubric_4 AS rubric_4_consider, B.rubric_5 AS rubric_5_consider, B.rubric_6 AS rubric_6_consider, B.rubric_7 AS rubric_7_consider, B.rubric_8 AS rubric_8_consider, B.rubric_9 AS rubric_9_consider, B.rubric_10 AS rubric_10_consider, B.rubric_11 AS rubric_11_consider';
$selfeval_records_sql = "SELECT ${selfeval_column} from {isselfeval_rubrics} as A LEFT OUTER JOIN {isselfeval_consider} as B ON A.isselfeval_id = B.isselfeval_id WHERE A.user_id = ? AND A.isselfeval_id IN (${selfeval_times_sql}) ORDER BY A.isselfeval_id DESC";
$selfeval_records = $DB->get_records_sql($selfeval_records_sql, array($USER->id ,$issetgoal->year, $issetgoal->subject));

// 他者評価結果の所得
$peereval_time = 'SELECT id FROM {ispeereval} WHERE year = ? AND subject = ? ORDER BY times DESC LIMIT 1';
$peereval_column = 'id, user_id, ispeereval_id, peer_id, rubric_1 rubric_5, rubric_2 rubric_6, rubric_3 rubric_9, rubric_4, rubric_5 rubric_7, rubric_6 rubric_8, comment';
$peereval_records_sql = "SELECT * FROM {ispeereval_rubrics} WHERE peer_id = ?";
$peereval_records = $DB->get_records_sql($peereval_records_sql, array($USER->id));
$peer_name = array('Aさん', 'Bさん', 'Cさん', 'Dさん', 'Eさん', 'Fさん');

var_dump($DB->get_records_sql($peereval_time, array($issetgoal->year, $issetgoal->subject)));

echo "</br></br></br>";

var_dump($peereval_records); 
?>