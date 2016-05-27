package eu.theunitry.navicula.fragments;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.FrameLayout;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import eu.theunitry.navicula.FragmentMain;
import eu.theunitry.navicula.R;
import eu.theunitry.navicula.WebRequest;

public class BlogItem extends FragmentMain implements View.OnClickListener {

    private Blog blog;

    public BlogItem() {}

    public BlogItem(Blog blog) {
        this.blog = blog;
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {

        return inflater.inflate(R.layout.card_post, container, false);
    }

    @Override
    public void onViewCreated(View view, Bundle savedInstanceState) {

        this.blog.onItemCreated(this);
    }

    @Override
    public void onClick(View view) {
        //getMainActivity().switchFragment(getMainActivity().getMenuItem(R.id.nav_post));
    }
}