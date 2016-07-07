package ServerMonitor;

import java.util.*;
import java.text.*;

import com.mongodb.*;
import com.mongodb.client.MongoDatabase;
import com.mongodb.util.JSON;
import org.bson.Document;

/**
 * Created by John on 5/16/16.
 */

public class MetricsDao {

    // make this method synchronized to handle concurrency in multithreading
    public synchronized void storeMetrics(String node, String metrics){
        // Connect to mongodb server
        MongoClient mongoClient = new MongoClient("localhost" , 27017);

        // Now connect to your databases
        MongoDatabase db = mongoClient.getDatabase("test");
        System.out.println("Connect to database successfully");

        // parse json string to json object
        DBObject dbObject = (DBObject) JSON.parse(metrics);
        DateFormat dateFormat = new SimpleDateFormat("yyyy/MM/dd HH:mm:ss");
        Date date = new Date();

        // update the metrics field
        db.getCollection("Servers").updateOne(new Document("node", node),
                new Document("$set", new Document("metrics", dbObject)));

        // update the timestamp field
        db.getCollection("Servers").updateOne(new Document("node", node),
                new Document("$set", new Document("timestamp", dateFormat.format(date))));

//        // insert one document into the database
//        db.getCollection("Servers").insertOne(
//                new Document("node", node)
//                        .append("metrics", dbObject)
//                        .append("timestamp", dateFormat.format(date)));
    }
}
