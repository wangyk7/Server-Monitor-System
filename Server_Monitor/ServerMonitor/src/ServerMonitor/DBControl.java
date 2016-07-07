package ServerMonitor;

import java.io.IOException;
import java.util.concurrent.ConcurrentHashMap;
import java.util.concurrent.ExecutorService;
import java.util.concurrent.Executors;
import java.util.concurrent.TimeUnit;

/**
 * Created by John on 5/15/16.
 */

public class DBControl {
    public void updateDB(ConcurrentHashMap<String, String> map) throws InterruptedException {
        // update data in the database & create thread pool for access database with limit 100 threads
        ExecutorService executor = Executors.newFixedThreadPool(100);

        // execute the threads
        DBControlThread update = new DBControlThread(map);
        executor.execute(update);

        // shut down the execution
        executor.shutdown();

        // wait until all tasks are finished. If not, cutoff time is 30s
        executor.awaitTermination(30, TimeUnit.SECONDS);
    }
}

