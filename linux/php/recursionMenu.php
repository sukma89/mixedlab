<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Menu Recursion</title>
<style type="text/css">
div {
	margin:0 0 0 20px;
	border-left:1px solid #CCC;
}

span {
	display:block;
	padding:0 0 5px;
}
</style>
</head>

<body>

<?php
$menu = array(
	array('id'=>1, 'name'=>'TopM 1', 'parent'=>0),
	array('id'=>2, 'name'=>'SubM 1-1', 'parent'=>1),
	array('id'=>3, 'name'=>'SubM 1-1-1', 'parent'=>2),
	array('id'=>4, 'name'=>'SubM 1-1-2', 'parent'=>2),
	array('id'=>5, 'name'=>'TopM 2', 'parent'=>0),
	array('id'=>6, 'name'=>'TopM 3', 'parent'=>0),
	array('id'=>7, 'name'=>'TopM 4', 'parent'=>0),
	array('id'=>8, 'name'=>'SubM 1-2', 'parent'=>1),		
	array('id'=>9, 'name'=>'SubM 2-1', 'parent'=>5),		
	array('id'=>10, 'name'=>'SubM 2-2', 'parent'=>5),		
	array('id'=>11, 'name'=>'SubM 2-1-1', 'parent'=>9),		
	array('id'=>12, 'name'=>'SubM 1-1-2-1', 'parent'=>4),		
	array('id'=>13, 'name'=>'SubM 1-1-2-1-1', 'parent'=>12),
	array('id'=>14, 'name'=>'SubM 1-1-2-1-2', 'parent'=>12),	
	array('id'=>15, 'name'=>'SubM 1-1-2-1-3', 'parent'=>12),	
	);

function printMItem ($item) {
	$html = '<div>';
	$html .= '<span>' . $item['name'] . '</span>';

	$sub = getSubM($item['id']);

	if (is_array($sub) && count($sub) > 0) {
		foreach ($sub as $sm) {
			$html .= printMItem($sm);
		}
	}	

	$html .= '</div>';
	return $html;
}

function getSubM ($id) {
	global $menu;

	$sub = array();

	foreach ($menu as $m) {
		if ($m['parent'] == $id) {
			$sub[] = $m;
		}	
	}

	return $sub;
}


function printMenu ($menu) {
	$html = '';

	foreach ($menu as $m) {
		if ($m['parent'] == 0) {
			$html .= printMItem($m);
		}
	}

	return $html;
}

echo printMenu($menu);
?>
</body>
</html>

