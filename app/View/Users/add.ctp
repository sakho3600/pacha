
<div id="page-container" class="row">
	
	<div id="page-content">
		<div class="users form">
                    
                    		
			<?php echo $this->MyForm->create('User', array('inputDefaults' => array('label' => false), 'role' => 'form')); ?>
				<fieldset>

                                    <div class="btn-toolbar pull-right">
                                                                                <div class="btn-group">
                                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span> '.__('Retour à la liste'), array('action' => 'index'), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                                        </div>
                                    </div>
                    
                                                                        <h2><?php  echo __('Ajouter User'); ?></h2>
                                    			<div class="form-group">
	<?php echo $this->MyForm->label('username', 'Identifiant');?>
		<?php echo $this->MyForm->input('username', array('class' => 'form-control', 'value' => (empty($default_username)?null:$default_username))); ?>
</div><!-- .form-group -->

<div class="form-group">
	<?php echo $this->MyForm->label('password', 'Mot de passe');?>
		<?php echo $this->MyForm->input('password', array('class' => 'form-control', 'value' => (empty($default_password)?null:$default_password))); ?>
</div><!-- .form-group -->

<div class="form-group">
	<?php echo $this->MyForm->label('initiales', 'Initiales');?>
		<?php echo $this->MyForm->input('initiales', array('class' => 'form-control', 'value' => (empty($default_initiales)?null:$default_initiales))); ?>
</div><!-- .form-group -->

<div class="form-group">
	<?php echo $this->MyForm->label('level', 'Niveau d\'accès');?>
		<?php echo $this->MyForm->input('level', array('class' => 'form-control', 'value' => (empty($default_level)?null:$default_level))); ?>
</div><!-- .form-group -->

				</fieldset>
			<?php echo $this->MyForm->submit(__('Enregistrer'), array('class' => 'btn btn-large btn-primary')); ?>
<?php echo $this->MyForm->end(); ?>
			
		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
