<?php
echo $this->set('title_for_layout', 'Store Setup');
$this->Html->addCrumb('Store Setup', array('controller' => 'pages', 'action' => 'setup'));
$this->Html->addCrumb('Configurations', array('controller' => 'configurations', 'action' => 'index'));
$this->Menu->addContextMenuItem('New Configuration Variable', null, array('controller' => 'configurations', 'action' => 'add'));
$this->Menu->addContextMenuItem('Install', null, array('controller' => 'configurations', 'action' => 'install'));
?>
<?php echo $this->Form->create('Configuration', array('type' => 'get', 'url' => array('page' => null))); ?>
<div class="row collapse">
    <div class="large-2 medium-2 columns"><span class="prefix">Filter</span></div>
    <div class="large-4 medium-4 columns"><?php echo $this->Form->input('category', array('empty' => true, 'options' => array_combine($categories, $categories), 'value' => @$this->request->query['category'], 'label' => false, 'placeholder' => 'by patient name')); ?></div>
    <div class="large-4 medium-4 columns"><?php echo $this->Form->input('name', array('required' => false, 'value' => @$this->request->query['name'], 'empty' => 'by name', 'label' => false,)); ?></div>
    <div class="large-2 medium-2 columns"><?php echo $this->Form->button('Search', array('class' => 'button postfix', 'style' => 'margin-top:0px;')); ?></div>
</div>
<?php echo $this->Form->end(); ?>
<?php if (!empty($this->request->query)): ?>
    <p class="panel">Showing results matching <?php echo ($this->request->query['category'] ? "category <strong>{$this->request->query['category']}</strong>" : ''); ?> <?php echo ($this->request->query['name'] ? "name <strong>{$this->request->query['name']}</strong>" : ''); ?>. <?php echo $this->Html->link('Click here to reset search.', array('action' => 'index'), array('class' => '')); ?></p>
<?php endif; ?>
<div class="configurations index">
    <table class="full-width rowlight">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('category'); ?></th>
                <th><?php echo $this->Paginator->sort('name'); ?></th>
                <th><?php echo $this->Paginator->sort('value'); ?></th>
                <th><?php echo $this->Paginator->sort('description'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($configurations as $configuration): ?>
                <tr>
                    <td><?php echo h($configuration['Configuration']['category']); ?></td>
                    <td><?php echo h($configuration['Configuration']['name']); ?></td>
                    <td><?php echo $this->Text->truncate($configuration['Configuration']['value']); ?>&nbsp;</td>
                    <td><?php echo h($configuration['Configuration']['description']); ?></td>
                    <td class="actions">
                        <?php echo ($configuration['Configuration']['editable'] ? $this->Html->link(__('Edit'), array('action' => 'edit', $configuration['Configuration']['id'])) : ''); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php echo $this->element('paginator'); ?>
</div>