<table width="80%" border="1">
    <tr>
    <td>Title</td>
    
    <td>View</td>
    </tr>
    <?php
    include "conn.php";
 $sql="SELECT * FROM fileup";
 $result_set=mysql_query($sql);
 while($row=mysql_fetch_array($result_set))
 {
  ?>
        <tr>
        <td><?php echo $row['title'] ?></td>
        <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
        </tr>
        <?php
 }
 ?>
</table>