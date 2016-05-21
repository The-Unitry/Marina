package eu.theunitry.navicula;

import android.app.Fragment;
import android.support.design.widget.FloatingActionButton;

/**
 * Created by Allan on 19-5-2016.
 */
public class FragmentMain extends Fragment {

    private boolean FAB = true;

    public boolean hasFAB() {
        return this.FAB;
    }

    public void setFAB(boolean FAB) {
        this.FAB = FAB;
    }
}
