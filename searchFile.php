<html>
	<head>
		<title>seacrchFile</title>
	</head>
	<body>
		<form action="" method="post">
			<p> �ļ����ң�ע�����ִ�Сд��</p>
			<p>·����<input type="text" name="path" /></p>
			<p>���ң�<input type="text" name="key" /></p>
			<p><input type="submit" name="sub" value=" �� ʼ " /></p>
		</form>
	</body>
</html>

<?php
	$name = 'hellow';
	echo "the $name";
	echo 'the $name';
	if(!empty($_POST['path']) && !empty($_POST['key'])){
		$findFile = $_POST['key'];
		
		function searchFile($dirName){
			if( $handle = @opendir("$dirName")){
				while(false !== ($item=readdir($handle))){
					if ( $item != "." && $item != ".." ) {
					if(is_dir("$dirName/$item")){
						searchFile("$dirName/$item");
					}else{
						if(strstr($item,$GLOBALS['findFile'])){
							echo " <span><b> $dirName/$item </b></span><br />\n";
						}
					}
				}
				}
				
			closedir($handle);
				if(strstr($dirName,$GLOBALS['findFile'])){
					$loop = explode($GLOBALS['findFile'],$dirName);
					$countArr = count($loop)-1;
				if(empty($loop[$countArr])){
					echo " <span style='color:blue;'><b> $dirName </b></span><br />\n";
					
				}
				}
			}else{
				die("û�д�·��");
			}
		}
	
		searchFile($_POST['path']);
	}
	?>