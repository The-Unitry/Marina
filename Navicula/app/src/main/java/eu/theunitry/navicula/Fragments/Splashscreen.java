package eu.theunitry.navicula.fragments;

import android.os.Bundle;
import android.app.Fragment;
import android.support.design.widget.FloatingActionButton;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import eu.theunitry.navicula.FragmentMain;
import eu.theunitry.navicula.MainActivity;
import eu.theunitry.navicula.R;

public class Splashscreen extends FragmentMain {
    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {

        ((MainActivity) getActivity()).hideFab();
        return inflater.inflate(R.layout.splashscreen, container, false);
    }
}
