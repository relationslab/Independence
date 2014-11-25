<h1>Add Event</h1>
<?php
echo $this->Form->create('Event');
echo $this->Form->input('name');
echo $this->Form->input('place');
echo $this->Form->input('instructor');
echo $this->Form->input('date');
echo $this->Form->end('Save Event');
?>
