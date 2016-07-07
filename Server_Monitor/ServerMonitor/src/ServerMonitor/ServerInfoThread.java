package ServerMonitor;

import java.io.*;
import java.net.URL;
import java.nio.charset.Charset;
import java.util.concurrent.ConcurrentHashMap;

import org.json.JSONException;

/**
 * Created by John on 5/30/16.
 */

public class ServerInfoThread implements Runnable {
    private String nodeList;
    private String pattern;
    private ConcurrentHashMap<String, String> map;

    public ServerInfoThread(String nodeList, String pattern) {
        this.nodeList = nodeList;
        this.pattern = pattern;
        this.map = new ConcurrentHashMap<>();
    }

    @Override
    public void run(){
        // get the string before "{" and after "}"
        int one = pattern.indexOf("{"), two = pattern.lastIndexOf("}");
        String s1 = pattern.substring(0, one), s2 = pattern.substring(two+1);
        String[] arr = nodeList.split(", ");

        // get json from HTTP endpoints
        for(String s : arr){
            String url = s1 + s + s2;
            try {
                map.put(s, readJson(url));
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
    }

    // return the map
    public ConcurrentHashMap<String, String> getMap() {
        return map;
    }

    // read json from url
    private String readJson(String url) throws IOException, JSONException {
        URL realURL = new URL(url);
        InputStream is = realURL.openStream();
        try {
            BufferedReader br = new BufferedReader(new InputStreamReader(is, Charset.forName("UTF-8")));
            return readAll(br);
        } finally {
            is.close();
        }
    }

    // helper function for readJson
    private String readAll(Reader br) throws IOException {
        StringBuilder sb = new StringBuilder();
        int tmp;
        while ((tmp = br.read()) != -1) {
            sb.append((char) tmp);
        }
        return sb.toString();
    }
}



