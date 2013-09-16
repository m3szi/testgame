<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'player-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'clubID'); ?>
		<?php //echo $form->dropDownList($model,'clubID', array('akarmi'=>'valami', 'csöcs'=>'asd'), array('prompt'=>'Select location')); ?>
		<?php 
			if($model->isNewRecord) 
			{
				echo $form->dropDownList($model,'clubID',CHtml::listData(Club::model()->findAll(), 'ID', 'name')); 
			} else 
			{
				$model2 = Club::model()->find('id=:club_id', array(':club_id'=>$model->clubID));echo $model2['name'];
			}
		?>
		<?php echo $form->error($model,'clubID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>125)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'age'); ?>
		<?php echo $form->textField($model,'age'); ?>
		<?php echo $form->error($model,'age'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nation'); ?>
		<?php echo $form->textField($model,'nation',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'nation'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->