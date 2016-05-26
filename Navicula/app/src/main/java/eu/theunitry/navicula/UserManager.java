package eu.theunitry.navicula;

import java.util.ArrayList;
import java.util.HashMap;

/**
 * Created by Allan on 21-5-2016.
 */
public class UserManager {

    private boolean loggedIn;
    private User user = new User();

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
