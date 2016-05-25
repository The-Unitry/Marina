package eu.theunitry.navicula;

import android.app.Fragment;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.view.LayoutInflater;
import android.view.ViewGroup;

import org.json.JSONArray;

/**
 * Created by Allan on 19-5-2016.
 */
public class FragmentMain extends Fragment {

    private boolean FAB = true;
    private UserManager userManager;

    public FragmentMain() {
        setUserManager(MainActivity.userManager);
    }

    public boolean hasFAB() {
        return this.FAB;
    }

    public void setFAB(boolean FAB) {
        this.FAB = FAB;
    }

    public UserManager getUserManager() {
        return this.userManager;
    }

    public void setUserManager(UserManager userManager) {
        this.userManager = userManager;
    }

    public MainActivity getMainActivity() {
        return (MainActivity) getActivity();
    }

    public void onRequestCompleted(JSONArray jsonObject) {}

}
