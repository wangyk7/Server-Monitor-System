<html>
<title>Search the Servers</title>
<body bgcolor="#FAEBD7">  
<center>
<font color="#000000">  

<br/><br/>
<font size="6" color="#000000">Search the Servers</font>
<br/><br/>
<p>Developed by: Yongkai Wang</p>
<br/><br/>
<b><p>Note: You may search multiple servers at the same time.</p></b>

<!-- input 5 servers name and the search pattern-->
<form action="ServerSearchResults.php" method="post">
Server 1
<input name="Server1" size="30" maxlength="30">
<br/>

Server 2
<input name="Server2" size="30" maxlength="30">
<br/>

Server 3
<input name="Server3" size="30" maxlength="30">
<br/>

Server 4
<input name="Server4" size="30" maxlength="30">
<br/>

Server 5
<input name="Server5" size="30" maxlength="30">
<br/>

<br/>
Search Pattern
<input name="Pattern" size="30" maxlength="30">
<br/>

<br/><br/>
<input type="submit" value="Submit" name="Submit">
</form>

<form action="index.php" method="post">
<input type="submit" value="Cancel" name="Cancel">
</form>

</font>
</center>
</body>
</html>