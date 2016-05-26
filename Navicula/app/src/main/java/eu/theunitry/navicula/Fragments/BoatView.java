package eu.theunitry.navicula.fragments;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;

import eu.theunitry.navicula.FragmentMain;
import eu.theunitry.navicula.R;

public class BoatView extends FragmentMain implements View.OnClickListener {

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        super.onCreateView(inflater, container, savedInstanceState);
        return inflater.inflate(R.layout.fragment_boat_view, container, false);
    }

    @Override
    public void onViewCreated(View view, Bundle savedInstanceState) {
        Button button = (Button) getActivity().findViewById(R.id.buttonAddBoat);
        button.setOnClickListener(this);
    }
    @Override
    public void onClick(View view) {

        getMainActivity().switchFragment(getMainActivity().getMenuItem(R.id.nav_addBoats));

    }
}