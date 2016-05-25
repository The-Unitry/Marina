package eu.theunitry.navicula.fragments;

import android.os.Bundle;
import android.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import eu.theunitry.navicula.FragmentMain;
import eu.theunitry.navicula.R;
import eu.theunitry.navicula.WebRequest;

public class Blog extends FragmentMain {
    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {

        return inflater.inflate(R.layout.fragment_blog, container, false);
    }

    @Override
    public void onViewCreated(View view, Bundle savedInstanceState) {

        WebRequest jsonAsync = new WebRequest(this, "api-example.json", "GET");
        jsonAsync.execute();
    }

    @Override
    public void onRequestCompleted(JSONArray response) {
        for (int i = 0; i < response.length(); i++) {
            try {
                JSONObject post = response.getJSONObject(i);
                System.out.println("Response: " + post.getInt("id"));
            } catch (JSONException e) {
                e.printStackTrace();
            }
        }
    }
}