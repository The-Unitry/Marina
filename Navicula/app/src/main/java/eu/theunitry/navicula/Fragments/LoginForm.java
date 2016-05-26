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
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;

import eu.theunitry.navicula.FragmentMain;
import eu.theunitry.navicula.MainActivity;
import eu.theunitry.navicula.MenuManager;
import eu.theunitry.navicula.R;
import eu.theunitry.navicula.WebRequest;

public class LoginForm extends FragmentMain implements View.OnClickListener {

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
                handleLogin();
                break;
        }
    }

    public void handleLogin() {

        //TODO: Handle Request
        HashMap<String, String> par = new HashMap<String, String>();
        par.put("email", "a");
        par.put("password", "a");

        WebRequest req = new WebRequest(this, "login.php", "POST", par);
        req.execute();
    }
    @Override
    public void onRequestCompleted(JSONArray jsonObject){
        try {
            for(int i=0; i < jsonObject.length(); i++) {

                JSONObject jObject = jsonObject.getJSONObject(i);

                if (jObject.getBoolean("success") == true) {

                    //Set user details
                    getUserManager().getUser().setId(jObject.getInt("id"));
                    getUserManager().getUser().setRole(jObject.getInt("role"));
                    //--
                    getUserManager().getUser().setFirstname(jObject.getString("firstName"));
                    getUserManager().getUser().setInsertion(jObject.getString("insertion"));
                    getUserManager().getUser().setSurname(jObject.getString("surname"));
                    //--
                    getUserManager().getUser().setEmail(jObject.getString("email"));
                    getUserManager().getUser().setPhoneNumber(jObject.getString("phoneNumber"));
                    //--
                    getUserManager().getUser().setAddress(jObject.getString("address"));
                    getUserManager().getUser().setCity(jObject.getString("city"));
                    getUserManager().getUser().setZipcode(jObject.getString("zipcode"));

                    //Create login message
                    String message = getString(R.string.action_loggedIn).replace("[FIRST_NAME]", getUserManager().getUser().getFirstname());
                    Toast.makeText(getActivity().getApplicationContext(), message, Toast.LENGTH_SHORT).show();

                    //Switch to user menu
                    MenuManager menu = getMainActivity().getMenuManager();
                    menu.switchMenu("user");

                    getMainActivity().switchFragment(menu.getMenu().findItem(R.id.nav_home));
                    getUserManager().setLoggedIn(true);
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