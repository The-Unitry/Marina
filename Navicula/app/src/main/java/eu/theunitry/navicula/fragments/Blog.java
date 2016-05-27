package eu.theunitry.navicula.fragments;

import android.os.Bundle;
import android.app.Fragment;
import android.support.v7.widget.CardView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.FrameLayout;
import android.widget.LinearLayout;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import eu.theunitry.navicula.FragmentMain;
import eu.theunitry.navicula.R;
import eu.theunitry.navicula.WebRequest;

public class Blog extends FragmentMain implements View.OnClickListener {

    public Blog() {
        setFAB(true);
    }

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
                BlogItem blogItem = new BlogItem(this);
                JSONObject post = response.getJSONObject(i);
                System.out.println("Response: " + post.getInt("id"));
            } catch (JSONException e) {
                e.printStackTrace();
            }
        }

        FrameLayout post = (FrameLayout) getActivity().findViewById(R.id.frameLayout);
        post.setOnClickListener(this);
    }

    public void onItemCreated(BlogItem blogItem) {
        LinearLayout postView = (LinearLayout) blogItem.getView();
        ((LinearLayout) getActivity().findViewById(R.id.blogLayout)).addView(postView);
        System.out.println("awugfsyue");
    }

    @Override
    public void onClick(View view) {
        getMainActivity().switchFragment(getMainActivity().getMenuItem(R.id.nav_post));
    }
}