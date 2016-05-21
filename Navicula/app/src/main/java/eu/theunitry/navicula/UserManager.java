package eu.theunitry.navicula;

import java.util.ArrayList;
import java.util.HashMap;

/**
 * Created by Allan on 21-5-2016.
 */
public class UserManager {

    private boolean loggedIn;

    public ArrayList<HashMap<String, String>> login(String username, String password) {
        // WHERE THE MAGIC HAPPENS
        ArrayList<HashMap<String, String>> results = new ArrayList<HashMap<String, String>>();
        HashMap<String, String> result = new HashMap<String, String>();
        result.put("success", "true");

        results.add(result);
        return results;
    }

    public boolean isLoggedIn() {
        return this.loggedIn;
    }

    public void setLoggedIn(boolean loggedIn) {
        this.loggedIn = loggedIn;
    }
}
