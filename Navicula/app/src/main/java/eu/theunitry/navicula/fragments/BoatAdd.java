package eu.theunitry.navicula.fragments;

import android.os.Bundle;
import android.text.TextUtils;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Spinner;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;

import eu.theunitry.navicula.FragmentMain;
import eu.theunitry.navicula.MenuManager;
import eu.theunitry.navicula.R;
import eu.theunitry.navicula.WebRequest;

public class BoatAdd extends FragmentMain implements View.OnClickListener {

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

        Button button = (Button) getActivity().findViewById(R.id.buttonRegisterBoat);
        button.setOnClickListener(this);

        RadioGroup radioGroupSpecies = (RadioGroup) getActivity().findViewById(R.id.radioGroupBoatSpecies);
        radioGroupSpecies.setOnClickListener(this);

    }

    @Override
    public void onClick(View v) {

        Spinner spinner = (Spinner) getActivity().findViewById(R.id.spinnerBoatColor);
        String spinnerText = spinner.getSelectedItem().toString();

        RadioGroup radioGroupSpecies = (RadioGroup) getActivity().findViewById(R.id.radioGroupBoatSpecies);
        int selectedId = radioGroupSpecies.getCheckedRadioButtonId();
        RadioButton checkedRadioButton = (RadioButton) getActivity().findViewById(selectedId);
        String radioButtontext = checkedRadioButton.getText().toString();

        HashMap<String, String> par = new HashMap<String, String>();
        par.put("boatName", getStringValue(R.id.editTextBoatName));
        par.put("boatBrand", getStringValue(R.id.editTextBoatBrand));
        par.put("boatType", getStringValue(R.id.editTextBoatType));
        par.put("boatColor", spinnerText);
        par.put("boatDimensionsLength", getStringValue(R.id.editTextDimensionsLength));
        par.put("boatDimensionsWidth", getStringValue(R.id.editTextDimensionsWidth));
        par.put("boatDimensionsHeigth", getStringValue(R.id.editTextDimensionsHeigth));
        par.put("boatSpecies", radioButtontext);
        par.put("boatPeople", getStringValue(R.id.editTextBoatPeople));

        WebRequest jsonAsync = new WebRequest(this, "api-example.json", "POST", par);
        jsonAsync.execute();
    }

    @Override
    public void onRequestCompleted(JSONArray jsonObject){
        try {
            for(int i=0; i < jsonObject.length(); i++) {

                JSONObject jObject = jsonObject.getJSONObject(i);

                if (jObject.getBoolean("success")) {

                    //Create login message
                    Toast.makeText(getActivity().getApplicationContext(), "@string/boat_add_success", Toast.LENGTH_SHORT).show();
                    getMainActivity().switchFragment(getMainActivity().getMenuItem(R.id.nav_myBoats));

                }
                else{
                    Toast.makeText(getActivity().getApplicationContext(), "@string/action_logIn_failed", Toast.LENGTH_SHORT).show();
                }

            } // End Loop
        } catch (JSONException e) {
            System.out.println("Exception: " + e);
        }
    }

}