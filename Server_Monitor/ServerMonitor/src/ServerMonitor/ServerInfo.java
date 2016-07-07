package ServerMonitor;

import java.util.concurrent.ConcurrentHashMap;
import java.util.concurrent.ExecutorService;
import java.util.concurrent.Executors;
import java.util.concurrent.TimeUnit;

/**
 * Created by John on 5/16/16.
 */

public class ServerInfo {
    public ConcurrentHashMap<String, String> getMetrics(String nodeList, String pattern) throws InterruptedException {
        // create thread pool with limit 100 threads
        // number of threads can be optimized according to actual cpu and memory resources
        ExecutorService executor = Executors.newFixedThreadPool(100);

        // execute the threads
        ServerInfoThread theTask = new ServerInfoThread(nodeList, pattern);
        executor.execute(theTask);

        // shut down the execution
        executor.shutdown();

        // wait until all tasks are finished. If not, cutoff time is set to 70s
        executor.awaitTermination(70, TimeUnit.SECONDS);
        return theTask.getMap();
    }
}

