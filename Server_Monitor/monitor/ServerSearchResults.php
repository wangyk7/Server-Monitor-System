<html>
<title>Search Results</title>
<body bgcolor="#FAEBD7">  
<center>
<font color="#000000">  

<br/><br/>
<font size="6" color="#000000">Search Results</font>
<br/><br/>
<p>Developed by: Yongkai Wang</p>
<br/><br/>
<b><p></p></b>

<?php
    // receive the inputs from ServerSearch.php
    $Server1=$_POST[Server1];
    $Server2=$_POST[Server2];
    $Server3=$_POST[Server3];
    $Server4=$_POST[Server4];
    $Server5=$_POST[Server5];

    $Pattern=$_POST[Pattern];

    // Create a Mongo conenction
    $mongo = new MongoClient("mongodb://localhost");
     
    // Choose the database and collection
    $db = $mongo->test;
    $coll = $db->Servers;
    
    $query = array("node" => "$Server1");
    $result = $coll->findOne($query);
?>

<!-- create a table to display the results -->
<table style='table-layout: fixed; width: 80%' border='1'>
<tr>
<th><font color="#000000" face="Arial, Helvetica, sans-serif">server</font></th>
<th><font color="#000000" face="Arial, Helvetica, sans-serif">cpu core1</font></th>
<th><font color="#000000" face="Arial, Helvetica, sans-serif">cpu core2</font></th>
<th><font color="#000000" face="Arial, Helvetica, sans-serif">used</font></th>
<th><font color="#000000" face="Arial, Helvetica, sans-serif">free</font></th>
<th><font color="#000000" face="Arial, Helvetica, sans-serif">timestamp</font></th>
</tr>

<!-- results for server1 -->
<tr>
<td><font color="#000000" face="Arial, Helvetica, sans-serif"><?php echo $Server1; ?></font></td>
<td><font color="#000000" face="Arial, Helvetica, sans-serif"><?php echo $result[metrics][cpu][core1]; ?></font></td>
<td><font color="#000000" face="Arial, Helvetica, sans-serif"><?php echo $result[metrics][cpu][core2]; ?></font></td>
<td><font color="#000000" face="Arial, Helvetica, sans-serif"><?php echo $result[metrics][mem][used]; ?></font></td>
<td><font color="#000000" face="Arial, Helvetica, sans-serif"><?php echo $result[metrics][mem][free]; ?></font></td>
<td><font color="#000000" face="Arial, Helvetica, sans-serif"><?php echo $result[timestamp]; ?></font></td>
</tr>

<!-- results for server2 -->
<?php
    $query = array("node" => "$Server2");
    $result = $coll->findOne($query);
?>
<tr>
<td><font color="#000000" face="Arial, Helvetica, sans-serif"><?php echo $Server2; ?></font></td>
<td><font color="#000000" face="Arial, Helvetica, sans-serif"><?php echo $result[metrics][cpu][core1]; ?></font></td>
<td><font color="#000000" face="Arial, Helvetica, sans-serif"><?php echo $result[metrics][cpu][core2]; ?></font></td>
<td><font color="#000000" face="Arial, Helvetica, sans-serif"><?php echo $result[metrics][mem][used]; ?></font></td>
<td><font color="#000000" face="Arial, Helvetica, sans-serif"><?php echo $result[metrics][mem][free]; ?></font></td>
<td><font color="#000000" face="Arial, Helvetica, sans-serif"><?php echo $result[timestamp]; ?></font></td>
</tr>

<!-- results for server3 -->
<?php
    $query = array("node" => "$Server3");
    $result = $coll->findOne($query);
?>
<tr>
<td><font color="#000000" face="Arial, Helvetica, sans-serif"><?php echo $Server3; ?></font></td>
<td><font color="#000000" face="Arial, Helvetica, sans-serif"><?php echo $result[metrics][cpu][core1]; ?></font></td>
<td><font color="#000000" face="Arial, Helvetica, sans-serif"><?php echo $result[metrics][cpu][core2]; ?></font></td>
<td><font color="#000000" face="Arial, Helvetica, sans-serif"><?php echo $result[metrics][mem][used]; ?></font></td>
<td><font color="#000000" face="Arial, Helvetica, sans-serif"><?php echo $result[metrics][mem][free]; ?></font></td>
<td><font color="#000000" face="Arial, Helvetica, sans-serif"><?php echo $result[timestamp]; ?></font></td>
</tr>

<!-- results for server4 -->
<?php
    $query = array("node" => "$Server4");
    $result = $coll->findOne($query);
?>
<tr>
<td><font color="#000000" face="Arial, Helvetica, sans-serif"><?php echo $Server4; ?></font></td>
<td><font color="#000000" face="Arial, Helvetica, sans-serif"><?php echo $result[metrics][cpu][core1]; ?></font></td>
<td><font color="#000000" face="Arial, Helvetica, sans-serif"><?php echo $result[metrics][cpu][core2]; ?></font></td>
<td><font color="#000000" face="Arial, Helvetica, sans-serif"><?php echo $result[metrics][mem][used]; ?></font></td>
<td><font color="#000000" face="Arial, Helvetica, sans-serif"><?php echo $result[metrics][mem][free]; ?></font></td>
<td><font color="#000000" face="Arial, Helvetica, sans-serif"><?php echo $result[timestamp]; ?></font></td>
</tr>

<!-- results for server5 -->
<?php
    $query = array("node" => "$Server5");
    $result = $coll->findOne($query);
?>
<tr>
<td><font color="#000000" face="Arial, Helvetica, sans-serif"><?php echo $Server5; ?></font></td>
<td><font color="#000000" face="Arial, Helvetica, sans-serif"><?php echo $result[metrics][cpu][core1]; ?></font></td>
<td><font color="#000000" face="Arial, Helvetica, sans-serif"><?php echo $result[metrics][cpu][core2]; ?></font></td>
<td><font color="#000000" face="Arial, Helvetica, sans-serif"><?php echo $result[metrics][mem][used]; ?></font></td>
<td><font color="#000000" face="Arial, Helvetica, sans-serif"><?php echo $result[metrics][mem][free]; ?></font></td>
<td><font color="#000000" face="Arial, Helvetica, sans-serif"><?php echo $result[timestamp]; ?></font></td>
</tr>
</table>  

<br/>
<br/>
<form action="ServerSearch.php" method="post">
<input type="submit" value="Return" name="Return">
</form>

</font>
</center>
</body>
</html>