<h1>Edit Event</h1>
<?php
echo $this->Form->create('Event');
echo $this->Form->input('name');
echo $this->Form->input('instructor',array('row'=>'3'));
echo $this->Form->input('id',array('type'=>'hidden'));
echo $this->Form->end('Save Post');
?>
