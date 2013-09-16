<?php
$this->breadcrumbs=array(
	'Players'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Player', 'url'=>array('index')),
	array('label'=>'Create Player', 'url'=>array('create')),
	array('label'=>'Update Player', 'url'=>array('update', 'id'=>$model->ID)),
	//array('label'=>'Manage Player', 'url'=>array('admin')),
);

$criteria = new CDbCriteria;
$criteria->condition = '`to` = '.$model->ID.' OR `from` = '.$model->clubID;
$model2 = History::model()->findAll($criteria);

if(count($model2) == 0)
{
	$this->menu[] = array('label'=>'Delete Player', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?'));
}

?>

<h1>View Player #<?php echo $model->ID; ?></h1>

<?php 
/*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'clubID',
		'name',
		'age',
		'nation',
	),
)); */

echo $this->renderPartial('_view', array('data'=>$model));

?>
