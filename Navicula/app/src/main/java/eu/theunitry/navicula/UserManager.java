package eu.theunitry.navicula;

import java.util.ArrayList;
import java.util.HashMap;

/**
 * Created by Allan on 21-5-2016.
 */
public class UserManager {

    private boolean loggedIn;

    public HashMap<String, Object> login(String username, String password) {
        // WHERE THE MAGIC HAPPENS
        HashMap<String, Object> results = new HashMap<String, Object>();
        results.put("success", true);

        return results;
    }

    public boolean isLoggedIn() {
        return this.loggedIn;
    }

    public void setLoggedIn(boolean loggedIn) {
        this.loggedIn = loggedIn;
    }
}
