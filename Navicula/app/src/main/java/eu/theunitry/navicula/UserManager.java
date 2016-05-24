package eu.theunitry.navicula;

import java.util.ArrayList;
import java.util.HashMap;

/**
 * Created by Allan on 21-5-2016.
 */
public class UserManager {

    private boolean loggedIn;
    private User user;

    public HashMap<String, String> login(String username, String password) {
        // WHERE THE MAGIC HAPPENS
        HashMap<String, String> results = new HashMap<String, String>();
        results.put("success", "true");
        results.put("firstname", "John");
        results.put("surname", "Doe");

        user = new User();
        user.setFirstname(results.get("firstname"));
        user.setSurname(results.get("surname"));

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

    public User getUser() {
        return this.user;
    }

    public void setUser(User user) {
        this.user = user;
    }
}
