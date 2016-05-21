package eu.theunitry.navicula.fragments;

import android.os.Bundle;
import android.app.Fragment;
import android.support.design.widget.CoordinatorLayout;
import android.support.design.widget.FloatingActionButton;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import eu.theunitry.navicula.FragmentMain;
import eu.theunitry.navicula.MainActivity;
import eu.theunitry.navicula.R;

public class LoginForm extends FragmentMain {

    public LoginForm() {
        setFAB(false);
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {

        return inflater.inflate(R.layout.fragment_login_form, container, false);
    }

}