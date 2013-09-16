<?php
$this->breadcrumbs=array(
	'Histories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List History', 'url'=>array('index')),
);
?>

<h1>Create History</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>