<?php
$this->breadcrumbs=array(
	'Clubs',
);

$this->menu=array(
	array('label'=>'Create Club', 'url'=>array('create')),
);
?>

<h1>Clubs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
