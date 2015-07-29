<?php
echo $this->set('title_for_layout', 'IVMIS Setup');
$this->Html->addCrumb('IMVIS Setup', array('controller' => 'pages', 'action' => 'setup'));
$this->Html->addCrumb('Configurations', array('controller' => 'configurations', 'action' => 'index'));
$this->Html->addCrumb('New Configuration Variable', array('controller' => 'configurations', 'action' => 'add'));
$i = 0;
foreach ($categories as $category) {
    unset($categories[$i++]);
    $categories[$category] = $category;
}
?>
<div class="configurations form">
    <?php
    echo $this->Form->create('Configuration');
    ?>
    <div class="row">
        <div class="large-6 columns"><?php echo $this->Form->input('category', array('options' => $categories)); ?></div>
        <div class="large-6 columns"><?php echo $this->Form->input('name'); ?></div>
    </div>
    <div class="row">
        <div class="large-6 columns"><?php echo $this->Form->input('type', array('options' => $types)); ?></div>
        <div class="large-6 columns"><?php echo $this->Form->input('editable'); ?></div>
    </div>
    <?php
    echo $this->Form->input('options');
    echo $this->Form->input('value');
    echo $this->Form->input('default_value');
    echo $this->Form->end(__('Submit'));
    ?>
</div>