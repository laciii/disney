<?php

$myanswers = Array();

$file = 'html_test.txt';
$open = fopen($file, 'r');
if ($open) {
	$i = 1;
	while (($line = fgets($open)) !== false) {
		$line = str_replace('<', '&lt;', $line);
		$line = str_replace('>', '&gt;', $line);

		if($line[0] == ' ' && strlen($line) > 2 && !strpos($line, 'Answer')) {
			echo '<input type="radio" name="question'.$i.'">'.$line.'<br/>';

		} else if(strpos($line, 'EQUAL')) {
			echo $line.'asd <input type="text" name="question'.$i.'"><br/>';

		} else if($line[0] == ' ' && strlen($line) > 2 && strpos($line, 'Answer')) {
			echo '<input type="text" name="question'.$i.'"><br/>';

		} else if($line[0] == ' ' && strlen($line) > 2 && strpos($line, 'PLEASE')) {
			echo 'asd<input type="text" name="question'.$i.'"><br/>';

		} else if(strlen($line) > 2) {
			echo '<span class="question">'.$line.'</span><br/>';
			$i++;
		}
	}

    fclose($open);
} else {
	echo "File cannot be opened.";
} 
?>
