<?php
echo $this->set('title_for_layout', 'IVMIS Setup');
$this->Html->addCrumb('IMVIS Setup', array('controller' => 'pages', 'action' => 'setup'));
$this->Html->addCrumb('Configurations', array('controller' => 'configurations', 'action' => 'index'));
$this->Html->addCrumb('Edit Configuration Variable: ' . $this->Form->value('Configuration.name'), array('controller' => 'configurations', 'action' => 'edit', $this->Form->value('Configuration.id')));
?>
<div class="configurations form">
    <dl>
        <dt>Configuration</dt>
        <dd><?php echo $configuration['Configuration']['name']; ?></dd>
        <dt>Description</dt>
        <dd><?php echo $configuration['Configuration']['description']; ?></dd>
    </dl>
    <?php
    echo $this->Form->create('Configuration');
    $inputOptions = array('type' => "textarea", 'label' => $configuration['Configuration']['name']);
    if ($configuration['Configuration']['type'] == 'boolean')
        $inputOptions['type'] = "checkbox";
    elseif ($configuration['Configuration']['type'] == 'number') {
        $inputOptions['type'] = "number";
        $inputOptions['step'] = "0.01";
    } elseif ($configuration['Configuration']['type'] == 'select') {
        $inputOptions['options'] = json_decode($configuration['Configuration']['options'], true);
        $inputOptions['type'] = "select";
    } elseif ($configuration['Configuration']['type'] == 'timezone') {
        foreach (timezone_identifiers_list() as $timezone) {
            list($continent, $city) = explode('/', $timezone);
            $inputOptions['options'][$continent][$timezone] = $city;
        }
        $inputOptions['type'] = "select";
    }
    echo $this->Form->input('value', $inputOptions);
    echo $this->Form->input('id');
    echo $this->Form->end(__('Submit'));
    ?>
</div>