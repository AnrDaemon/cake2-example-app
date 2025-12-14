<h2>Добавить UTM</h2>
<?php
echo $this->Form->create('Utm');
echo $this->Form->input('source');
echo $this->Form->input('medium');
echo $this->Form->input('campaign');
echo $this->Form->input('content');
echo $this->Form->input('term');
echo $this->Form->end('Сохранить');
?>
