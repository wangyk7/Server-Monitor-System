package ServerMonitor;

import java.util.Map;
import java.util.concurrent.ConcurrentHashMap;

/**
 * Created by John on 5/30/16.
 */

public class DBControlThread implements Runnable {
    private ConcurrentHashMap<String, String> map;

    public DBControlThread(ConcurrentHashMap<String, String> map) {
        this.map = map;
    }

    @Override
    public void run(){
        // update data in the database
        MetricsDao md = new MetricsDao();
        for (Map.Entry<String, String> entry : map.entrySet()) {
            String node = entry.getKey();
            String matric = entry.getValue();
            md.storeMetrics(node, matric);
        }
    }
}
