package eu.theunitry.navicula;

import java.util.ArrayList;
import java.util.HashMap;

/**
 * Created by Allan on 21-5-2016.
 */
public class UserManager {

    private boolean loggedIn;

    public HashMap<String, String> login(String username, String password) {
        // WHERE THE MAGIC HAPPENS
        HashMap<String, String> results = new HashMap<String, String>();
        results.put("success", "true");

        return results;
    }

    public void logout() {
        // WHERE THE MAGIC HAPPENS
        setLoggedIn(false);
    }

    public boolean isLoggedIn() {
        return this.loggedIn;
    }

    public void setLoggedIn(boolean loggedIn) {
        this.loggedIn = loggedIn;
    }
}
