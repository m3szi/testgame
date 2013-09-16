<?php
$this->breadcrumbs=array(
	'Clubs'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Club', 'url'=>array('index')),
	array('label'=>'Create Club', 'url'=>array('create')),
	array('label'=>'Update Club', 'url'=>array('update', 'id'=>$model->ID)),
);

$model2 = Player::model()->find('clubID=:club_id', array(':club_id'=>$model->ID));

$criteria = new CDbCriteria;
$criteria->condition = '`to` = '.$model->ID.' OR `from` = '.$model->ID;
$model3 = History::model()->findAll($criteria);

if(count($model2) == 0 && count($model3) == 0)
{
	$this->menu[] = array('label'=>'Delete Club', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?'));
}
?>

<h1>View Club #<?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'name',
		'age',
	),
)); ?>
