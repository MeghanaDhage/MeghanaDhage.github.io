<!DOCTYPE html>
<html>
<head>
	<title>Assignment2</title>
</head>
<body>
<h2>Assignment 2</h2>
<form action="Assignment2.php" method="POST">
<label><h3>Enter your text in textbox and submit...</h3></label></br>
<textarea rows="5" cols="50" name="para"></textarea>
<button type="submit" name="submit">SUBMIT</button></br>
</form>
<?php
// paragraph is taken from user
if (isset($_POST['para'])) {
    $para = $_POST['para'];
}

$str=$para;
$new=split_sentences($str, ".");
$c=0;
// total number of sentence is stored in variable $c
foreach ($new as $i)
{
	$c++;
}

$max=0;
// words are counted for each sentense
for($i=0;$i<$c;$i++)
{
	$wcnt=str_word_count($new[$i]);
	if($wcnt>$max)
	{
		$max=$wcnt;
	}
}
echo "<h4>The maximum number of words in largest sentence is ".$max."</h4>";
// Sentences are splitted
function split_sentences($str, $end_of_sentence_characters) {
    $inside_quotes = false;
    $buffer = "";
    $result = array();
    for ($i = 0; $i < strlen($str); $i++) {
        $buffer .= $str[$i];
        if ($str[$i] === '"') {
            $inside_quotes = !$inside_quotes;
        }
        if (!$inside_quotes) {
            if (preg_match("/[.?!]/", $str[$i])) {
                $result[] = $buffer;
                $buffer = "";
            }
        }
    }
    return $result;
}
?>
</body>
</html>
