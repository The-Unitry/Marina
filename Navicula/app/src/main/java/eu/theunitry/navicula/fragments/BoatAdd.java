package eu.theunitry.navicula.fragments;

import android.os.Bundle;
import android.text.TextUtils;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;

import eu.theunitry.navicula.FragmentMain;
import eu.theunitry.navicula.R;

public class BoatAdd extends FragmentMain {

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {

        return inflater.inflate(R.layout.fragment_boat_add, container, false);

    }

    @Override
    public void onViewCreated(View view, Bundle savedInstanceState) {

        Spinner spinner = (Spinner) getActivity().findViewById(R.id.spinnerBoatColor);
        ArrayAdapter<CharSequence> adapter = ArrayAdapter.createFromResource(getActivity(), R.array.boat_add_boat_color, android.R.layout.simple_spinner_item);
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinner.setAdapter(adapter);

    }

}