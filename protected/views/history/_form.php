<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'history-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'playerID'); ?>
		<?php 
			if($model->isNewRecord) {
				echo $form->dropDownList(
					$model,
					'playerID',
					CHtml::listData(Player::model()->findAll(), 'ID', 'name'),
					array(
						'prompt' => 'Válassz játékost',
						'value' => '0',
						'ajax'  => array(
								'type'  => 'POST',
								'url' => CController::createUrl('History/Dynamiccities/'),
								'update'=>'#History_to',
								'data' => array("playerID" => "js:this.value"),
						)
					)
				);  
			} else echo $model->player->name;
		?>
		<?php echo $form->error($model,'playerID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'to'); ?>
		<?php 
			if($model->isNewRecord || $model->isLastReplacementForPlayer($model->playerID, $model->ID)) 
			{
				
				echo $form->dropDownList($model,'to',CHtml::listData(Club::model()->findAll(), 'ID', 'name'));  
			
			} else echo $model->club1->name;
		?>
		<?php echo $form->error($model,'to'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount'); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->