package eu.theunitry.navicula.fragments;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Toast;

import eu.theunitry.navicula.FragmentMain;
import eu.theunitry.navicula.MenuManager;
import eu.theunitry.navicula.R;

public class Logout extends FragmentMain {
    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {

        Toast.makeText(getActivity().getApplicationContext(), getString(R.string.action_loggedOut), Toast.LENGTH_SHORT).show();

        getUserManager().logout();
        MenuManager menu = getMainActivity().getMenuManager();
        menu.switchMenu("visitor");

        getMainActivity().switchFragment(menu.getMenu().findItem(R.id.nav_home));

        return inflater.inflate(R.layout.fragment_blog, container, false);
    }
}