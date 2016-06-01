package eu.theunitry.navicula.fragments;

import android.os.Bundle;
import android.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;

import eu.theunitry.navicula.FragmentMain;
import eu.theunitry.navicula.R;
import eu.theunitry.navicula.WebRequest;

public class UserView extends FragmentMain implements View.OnClickListener {
    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        return inflater.inflate(R.layout.fragment_user_view, container, false);
    }
    @Override
    public void onViewCreated(View view, Bundle savedInstanceState) {
        Button button = (Button) getActivity().findViewById(R.id.buttonSave);
        button.setOnClickListener(this);
    }
    @Override
    public void onClick(View view) {

        HashMap<String, String> par = new HashMap<String, String>();
        par.put("firstName", getStringValue(R.id.editTextFirstName));
        par.put("lastname", getStringValue(R.id.editTextLastName));
        par.put("email", getStringValue(R.id.editTextEmail));
        par.put("adress", getStringValue(R.id.editTextAdress));
        par.put("houseNumber", getStringValue(R.id.editTextHouseNumber));
        par.put("houseNumberAddition", getStringValue(R.id.editTextHouseNumberAddition));
        par.put("phone", getStringValue(R.id.editTextPhone));

        WebRequest jsonAsync = new WebRequest(this, "requestvoorwijzigenvangegevens", "POST", par);
        jsonAsync.execute();

    }
    @Override
    public void onRequestCompleted(JSONArray jsonObject){
        try {
            for(int i=0; i < jsonObject.length(); i++) {

                JSONObject jObject = jsonObject.getJSONObject(i);

                if (jObject.getBoolean("success")) {

                    //Create success message
                    Toast.makeText(getActivity().getApplicationContext(), getString(R.string.user_data_success), Toast.LENGTH_SHORT).show();
                    getMainActivity().switchFragment(getMainActivity().getMenuItem(R.id.nav_myInfo));

                }
                else{
                    Toast.makeText(getActivity().getApplicationContext(), getString(R.string.action_logIn_failed), Toast.LENGTH_SHORT).show();
                }

            } // End Loop
        } catch (JSONException e) {
            System.out.println("Exception: " + e);
        }
    }
}