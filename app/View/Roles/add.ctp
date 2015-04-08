<!-- app/View/Users/add.ctp -->
<div class="users form">

<?php echo $this->Form->create('Role');?>
    <fieldset>
        <?php echo $this->Form->input('name');
        echo $this->Form->input('status');
		
		echo $this->Form->submit('Add User', array('class' => 'form-submit',  'title' => 'Click here to add the user') ); 
?>
    </fieldset>
<?php echo $this->Form->end(); ?>