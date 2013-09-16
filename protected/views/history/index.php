<?php
$this->breadcrumbs=array(
	'Histories',
);

$this->menu=array(
	array('label'=>'Replacement', 'url'=>array('create')),
);
?>

<h1>Histories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
