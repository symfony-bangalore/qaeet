<form method='post'>
<table>
<?php echo $form ?>
<tr><td colspan=2><button type='submit'>Submit!</button></td></tr>
</table>
</form>

<?php
var_dump($sf_data->getRaw('result'));