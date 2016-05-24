package eu.theunitry.navicula.fragments;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import eu.theunitry.navicula.FragmentMain;
import eu.theunitry.navicula.R;

public class BoatAdd extends FragmentMain {
    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {


        return inflater.inflate(R.layout.fragment_boat_add, container, false);
    }
}