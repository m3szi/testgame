<?php
$this->breadcrumbs=array(
	'Histories'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List History', 'url'=>array('index')),
	array('label'=>'Replacement', 'url'=>array('create')),
	array('label'=>'View History', 'url'=>array('view', 'id'=>$model->ID)),
);
?>

<h1>Update History <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>