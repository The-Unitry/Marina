package eu.theunitry.navicula.fragments;

import android.os.Bundle;
import android.app.Fragment;
import android.support.design.widget.CoordinatorLayout;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;

import java.util.ArrayList;
import java.util.HashMap;

import eu.theunitry.navicula.FragmentMain;
import eu.theunitry.navicula.MainActivity;
import eu.theunitry.navicula.MenuManager;
import eu.theunitry.navicula.R;

public class LoginForm extends FragmentMain implements View.OnClickListener {

    public LoginForm() {
        setFAB(false);
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {

        return inflater.inflate(R.layout.fragment_login_form, container, false);
    }

    @Override
    public void onViewCreated(View view, Bundle savedInstanceState) {
        Button button = (Button) getActivity().findViewById(R.id.buttonLogin);
        button.setOnClickListener(this);
    }


    @Override
    public void onClick(View view) {
        switch (view.getId()) {
            case R.id.buttonLogin:
                handleLogin(getUserManager().login("", ""));
                break;
        }
    }

    public void handleLogin(HashMap<String, String> results) {

        if (results.get("success") == "true") {
            MenuManager menu = getMainActivity().getMenuManager();
            menu.switchMenu("user");

            getMainActivity().switchFragment(menu.getMenu().findItem(R.id.nav_home));
            getUserManager().setLoggedIn(true);
        }
    }
}