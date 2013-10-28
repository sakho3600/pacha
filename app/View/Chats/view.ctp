
<div id="page-container" class="row">
	
	<div id="page-content">
		
		<div class="chats view content">

                    <div class="btn-toolbar pull-right">
                        <div class="btn-group">
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span> '.__('Modifier Chat'), array('action' => 'edit', $chat['Chat']['id']), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                            <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span> '.__('Supprimer Chat'), array('action' => 'delete', $chat['Chat']['id']), array('class' => 'btn btn-default', 'escape' => FALSE), __('Are you sure you want to delete # %s?', $chat['Chat']['id'])); ?>                        </div>
                        <div class="btn-group">
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span> '.__('Retour à la liste'), array('action' => 'index'), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                        </div>
                    </div>
                    <h2><?php  echo __('Fiche Chat').': '.$chat['Chat']['unique']; ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($chat['Chat']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Nom'); ?></strong></td>
		<td>
			<?php echo h($chat['Chat']['nom']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Nom2'); ?></strong></td>
		<td>
			<?php echo h($chat['Chat']['nom2']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Naissance'); ?></strong></td>
		<td>
			<?php echo h($chat['Chat']['naissance']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Identification'); ?></strong></td>
		<td>
			<?php echo h($chat['Chat']['identification']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Race'); ?></strong></td>
		<td>
			<?php echo h($chat['Chat']['race']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Robe'); ?></strong></td>
		<td>
			<?php echo h($chat['Chat']['robe']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Sexe'); ?></strong></td>
		<td>
			<?php echo h($chat['Chat']['sexe']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Etat'); ?></strong></td>
		<td>
			<?php echo h($chat['Chat']['etat']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Deces'); ?></strong></td>
		<td>
			<?php echo h($chat['Chat']['deces']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Accueil'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($chat['Accueil']['nom'], array('controller' => 'accueils', 'action' => 'view', $chat['Accueil']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

                <div style="margin-top: 20px">&nbsp;</div>
                
					
			<div class="related" style="margin-top: 40px">

                                <div class="btn-group btn-group-xs pull-right">
                                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span> '.__('Créer Adoption'), array('controller' => 'adoptions', 'action' => 'add'), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                                </div>
				<h3><?php echo __('Adoptions liés:'); ?></h3>
				
				<?php if (!empty($chat['Adoption'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
											<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nom'); ?></th>
		<th><?php echo __('Adresse'); ?></th>
		<th><?php echo __('Telephone'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Date Debut'); ?></th>
		<th><?php echo __('Date Fin'); ?></th>
									<th class="actions col-md-2"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($chat['Adoption'] as $adoption): ?>
		<tr>
			<td><?php echo $adoption['id']; ?></td>
			<td><?php echo $adoption['nom']; ?></td>
			<td><?php echo $adoption['adresse']; ?></td>
			<td><?php echo $adoption['telephone']; ?></td>
			<td><?php echo $adoption['email']; ?></td>
			<td><?php echo $adoption['date_debut']; ?></td>
			<td><?php echo $adoption['date_fin']; ?></td>
			<td class="actions">
			<?php echo $this->Html->link('<span class="glyphicon glyphicon-file"></span> '.__('Fiche'), array('controller' => 'adoptions', 'action' => 'view', $adoption['id']), array('class' => 'btn btn-default btn-xs', 'escape' => FALSE)); ?>
			<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span> '.__('Modifier'), array('controller' => 'adoptions', 'action' => 'edit', $adoption['id']), array('class' => 'btn btn-default btn-xs', 'escape' => FALSE)); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
			</div><!-- /.related -->

					
			<div class="related" style="margin-top: 40px">

                                <div class="btn-group btn-group-xs pull-right">
                                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span> '.__('Créer Commentaire'), array('controller' => 'commentaires', 'action' => 'add'), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                                </div>
				<h3><?php echo __('Commentaires liés:'); ?></h3>
				
				<?php if (!empty($chat['Commentaire'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
											<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Auteur'); ?></th>
		<th><?php echo __('Texte'); ?></th>
		<th><?php echo __('Source'); ?></th>
									<th class="actions col-md-2"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($chat['Commentaire'] as $commentaire): ?>
		<tr>
			<td><?php echo $commentaire['id']; ?></td>
			<td><?php echo $commentaire['date']; ?></td>
			<td><?php echo $commentaire['auteur']; ?></td>
			<td><?php echo $commentaire['texte']; ?></td>
			<td><?php echo $commentaire['source']; ?></td>
			<td class="actions">
			<?php echo $this->Html->link('<span class="glyphicon glyphicon-file"></span> '.__('Fiche'), array('controller' => 'commentaires', 'action' => 'view', $commentaire['id']), array('class' => 'btn btn-default btn-xs', 'escape' => FALSE)); ?>
			<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span> '.__('Modifier'), array('controller' => 'commentaires', 'action' => 'edit', $commentaire['id']), array('class' => 'btn btn-default btn-xs', 'escape' => FALSE)); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
			</div><!-- /.related -->

					
			<div class="related" style="margin-top: 40px">

                                <div class="btn-group btn-group-xs pull-right">
                                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span> '.__('Créer Rappel'), array('controller' => 'rappels', 'action' => 'add'), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                                </div>
				<h3><?php echo __('Rappels liés:'); ?></h3>
				
				<?php if (!empty($chat['Rappel'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
											<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Echeance'); ?></th>
		<th><?php echo __('Affectation'); ?></th>
		<th><?php echo __('Texte'); ?></th>
		<th><?php echo __('Source'); ?></th>
		<th><?php echo __('Ok'); ?></th>
									<th class="actions col-md-2"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($chat['Rappel'] as $rappel): ?>
		<tr>
			<td><?php echo $rappel['id']; ?></td>
			<td><?php echo $rappel['echeance']; ?></td>
			<td><?php echo $rappel['affectation']; ?></td>
			<td><?php echo $rappel['texte']; ?></td>
			<td><?php echo $rappel['source']; ?></td>
			<td><?php echo $rappel['ok']; ?></td>
			<td class="actions">
			<?php echo $this->Html->link('<span class="glyphicon glyphicon-file"></span> '.__('Fiche'), array('controller' => 'rappels', 'action' => 'view', $rappel['id']), array('class' => 'btn btn-default btn-xs', 'escape' => FALSE)); ?>
			<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span> '.__('Modifier'), array('controller' => 'rappels', 'action' => 'edit', $rappel['id']), array('class' => 'btn btn-default btn-xs', 'escape' => FALSE)); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
			</div><!-- /.related -->

					
			<div class="related" style="margin-top: 40px">

                                <div class="btn-group btn-group-xs pull-right">
                                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span> '.__('Créer Soin'), array('controller' => 'soins', 'action' => 'add'), array('class' => 'btn btn-default', 'escape' => FALSE)); ?>                                </div>
				<h3><?php echo __('Soins liés:'); ?></h3>
				
				<?php if (!empty($chat['Soin'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
											<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Date Debut'); ?></th>
		<th><?php echo __('Date Fin'); ?></th>
		<th><?php echo __('Nature'); ?></th>
		<th><?php echo __('Veterinaire'); ?></th>
		<th><?php echo __('Montant'); ?></th>
									<th class="actions col-md-2"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($chat['Soin'] as $soin): ?>
		<tr>
			<td><?php echo $soin['id']; ?></td>
			<td><?php echo $soin['type']; ?></td>
			<td><?php echo $soin['date_debut']; ?></td>
			<td><?php echo $soin['date_fin']; ?></td>
			<td><?php echo $soin['nature']; ?></td>
			<td><?php echo $soin['veterinaire']; ?></td>
			<td><?php echo $soin['montant']; ?></td>
			<td class="actions">
			<?php echo $this->Html->link('<span class="glyphicon glyphicon-file"></span> '.__('Fiche'), array('controller' => 'soins', 'action' => 'view', $soin['id']), array('class' => 'btn btn-default btn-xs', 'escape' => FALSE)); ?>
			<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span> '.__('Modifier'), array('controller' => 'soins', 'action' => 'edit', $soin['id']), array('class' => 'btn btn-default btn-xs', 'escape' => FALSE)); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
			</div><!-- /.related -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
