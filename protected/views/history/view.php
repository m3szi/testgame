<?php
$this->breadcrumbs=array(
	'Histories'=>array('index'),
	$model->ID,
);

$this->menu=array(
	array('label'=>'List History', 'url'=>array('index')),
	array('label'=>'Replacement', 'url'=>array('create')),
	array('label'=>'Update History', 'url'=>array('update', 'id'=>$model->ID)),
);

if($model->isLastReplacementForPlayer($model->playerID, $model->ID)) 
{
	$this->menu[] = array('label'=>'Delete History', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?'));
}

?>

<h1>View History #<?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		array('label'=>'Player','value'=>$model->player->name),
		array('label'=>'From','value'=>$model->club2->name),
		array('label'=>'To','value'=>$model->club1->name),
		'date',
		'amount',
	),
)); ?>
