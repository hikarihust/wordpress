<?php 
	include_once './data.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Cache-Control" content="no-store" />
<title>Show HTML</title>
<link rel='stylesheet' href='./css/http.css' type='text/css' media='all' />
</head>
<body>

<h1>Hiển thị các bài viết</h1>
<?php 
	foreach ($data as $item){
?>
	<div class="item">
		<h2>
			<a href="#"><?php echo '[' . $item['id'] . '] ' . $item['title'];?></a>
		</h2>
		<div>
			Author: <?php echo $item['author_id']?> | 
			Status: <?php echo $item['status']?>
		</div>
		<p><?php echo $item['content'];?></p>
	</div>
<?php 
	}
?>
</body>
</html>