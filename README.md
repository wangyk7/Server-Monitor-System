### Server Monitor

The web application is used for monitoring large amount of servers. The user interface is based on PHP, and the back end is based on Java and MongoDB.

Server_Monitor/monitor - PHP code for web  
              /ServerMonitor - Java code for back end  
              /Data - server metrics & user info  
              /screenshot - screenshot of an example  

### Tools & Environment
* PHP & MAMP
* Java & IntelliJ IDE
* MongoDB 
* System: OSX 10.11.4

### Preparation
* Start the mongoDB server.
* In mongo shell, import servers.json and admin.json to the database. "servers.json" is the data of 100 server metrics made up by myself for testing. "admin.json" is the user info for login.

### Search Servers
* To use the application, put the PHP under MAMP htdocs directory, and start Apache Server. 
* In Chrome, enter "http://localhost/monitor/", then we will get to the login page.
* Enter "Username: johnny, Password: 8847" to login, and now we are in the page to serach nodes.
* Search node from node1 to node100, and the results are displayed in a formated chart.

### Design Considerations
* Since the metric obtained from HTTP endpoint is json file, I use MongoDB here. The json file can be stored and retrieved quickly in the document-oriented database.
* Assume that the web application will be used frequently by the administrator, I write the back-end to update the database every 2 minutes, so that the query from web is simplified. The web will only retrieve the database and output the results. Compared with "query, get, update and output" each time, the response will be more efficient.
* The Java code is used to get metric for every server, and update the database regularly assuming that the whole server list and search pattern are given before.  
* Multithreading in Java is used to speed up the execution and also avoid to trap in a dead server. Since the program executes every 2 minutes, I assume that generally the process to grab servers finishes within 70s, and the process to update database finishes within 30s. if time is out, they will be terminated for next execution.  
* Thread pool is used here to create large number of threads quickly, and the pool limit is set to 100, which can be optimized further according to cpu resource and memory space.



