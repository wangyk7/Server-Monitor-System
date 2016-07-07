package ServerMonitor;

import java.io.IOException;
import java.util.Timer;
import java.util.TimerTask;
import java.util.concurrent.*;

/**
 * Created by John on 5/30/16.
 */

public class MonitorControl {

    private static MonitorControl mc;

    public static void main( String args[] ) throws IOException, InterruptedException {
        // require one argument to start the application
        String s = args[0];

        // start the server monitor
        if (s.equals("start")) {
            // initialize monitor controller
            mc = new MonitorControl();

            // set up the monitor task for timer
            Task task = new Task();

            // schedule task to run every 2 minutes
            Timer timer = new Timer();
            timer.scheduleAtFixedRate(task, 0, 120000);
        } else {
            return;
        }
    }

    private static class Task extends TimerTask{
        @Override
        public void run() {
            try {
                mc.regularUpdate();
            } catch (InterruptedException e) {
                e.printStackTrace();
            }
        }
    }

    private void regularUpdate() throws InterruptedException {
        // Assume we are given all the nodes and the urlPattern
        String list = "node1, node2, node3, node4, node5, node6, node7";
        String urlPattern = "http://{node}/metrics";

        // get the metrics JSON from HTTP using multithreading within 70s
        // if time is out, it will terminate the execution
        ServerInfo si = new ServerInfo();
        ConcurrentHashMap<String, String> map = si.getMetrics(list, urlPattern);

        // update the database using multithreading within 30s
        // if time is out, it will terminate the execution
        DBControl dbc = new DBControl();
        dbc.updateDB(map);
    }
}
