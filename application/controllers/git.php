<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Git extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}


	public function pull()
	{

		// GitHub will hit us with POST (http://help.github.com/post-receive-hooks/)

		$_POST['payload'] = file_get_contents('php://input');

		#var_dump($_POST['payload']);
		#var_dump(json_decode($_POST['payload']));

		$bar = "----------------------------------";

		if (! empty($_POST['payload'])) {

			$payload = json_decode($_POST['payload']);
			#v($payload);

			// which branch was committed?
			// $branch = substr($payload->ref, strrpos($payload->ref, '/') + 1);

			// If your website directories have the same name as your repository this would work.
			// $repository = $payload->repository->name;

			$git_base_dir = $this->config->item('git_base_dir');
			#v($git_base_dir);

			$git_repo_name= $this->config->item('git_repo_name');
			#v($git_base_dir);

			//$cmd = "cd $git_base_dir ; git pull 2>&1";
			$cmd = "cd $git_base_dir ; git stash 2>&1 ; git pull 2>&1";
			$result = exec($cmd, $out, $err);

			/*
			if ($git_repo_name == $repository)	
			{
				$cmd = "cd $git_base_dir ; git stash 2>&1 ; git pull 2>&1";
				$result = exec($cmd, $out, $err);
				#v($out);
			}
			else 
			{
				$out = array(
					"repo names DO NOT match. My repo name is: $git_repo_name , incoming repo name is: $repository",
					" will NOT do pull",
				);	
			}
			*/


			header('Content-Type: application/json');
			echo json_encode($out);

			$out = implode("\n", $out);

			file_put_contents("$git_base_dir/git.log", "\n\n$bar\n" . date(DATE_RFC2822) . "\n$bar\n\n" . $out . "\n\n" . urldecode($_POST['payload']), FILE_APPEND);

		}

	}

}

?>
