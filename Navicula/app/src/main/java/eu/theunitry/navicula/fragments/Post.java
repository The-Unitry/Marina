package eu.theunitry.navicula.fragments;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import eu.theunitry.navicula.FragmentMain;
import eu.theunitry.navicula.R;
import eu.theunitry.navicula.WebRequest;

public class Post extends FragmentMain {

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {

        return inflater.inflate(R.layout.fragment_post, container, false);
    }
}