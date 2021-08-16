<?php
include "connectionstring.php";

$sql = "select complain_desc,complain_desc_id from complain_description_details where complain_id='".$_POST['complaintypeid']."'";

echo '<option value="">Select Complain Description</option>';
foreach($conn->query($sql) as $var)
{
?>
  <option value="<?php echo $var['complain_desc_id']?>"><?php echo $var['complain_desc']?></option>
  
<?php } ?>