package eu.theunitry.navicula.fragments;

import android.os.Bundle;
import android.app.Fragment;
import android.support.v7.widget.CardView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.FrameLayout;
import android.widget.LinearLayout;
import android.widget.RelativeLayout;
import android.widget.TextView;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;

import eu.theunitry.navicula.FragmentMain;
import eu.theunitry.navicula.R;
import eu.theunitry.navicula.WebRequest;

public class Blog extends FragmentMain implements View.OnClickListener {

    private HashMap<LinearLayout, Integer> posts = new HashMap<LinearLayout, Integer>();

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

        LinearLayout myLayout = (LinearLayout) getActivity().findViewById(R.id.blogLayout);

        for (int i = 0; i < response.length(); i++) {
            try {
                //BlogItem blogItem = new BlogItem(this);
                JSONObject post = response.getJSONObject(i);
                //System.out.println("Response: " + post.getInt("id"));

                LinearLayout ll = (LinearLayout) LayoutInflater.from(getActivity().getApplicationContext()).inflate(R.layout.card_post, null, false);

                myLayout.addView(ll);

                TextView title = (TextView) ((RelativeLayout) ((CardView) ((FrameLayout) ll.getChildAt(0)).getChildAt(0)).getChildAt(0)).getChildAt(1);
                title.setText(post.getString("title"));

                TextView date = (TextView) ((RelativeLayout) ((CardView) ((FrameLayout) ll.getChildAt(0)).getChildAt(0)).getChildAt(0)).getChildAt(0);
                date.setText(post.getString("created_at"));

                TextView content = (TextView) ((RelativeLayout) ((CardView) ((FrameLayout) ll.getChildAt(0)).getChildAt(0)).getChildAt(0)).getChildAt(2);
                content.setText(post.getString("description"));

                //FrameLayout post = (FrameLayout) getActivity().findViewById(R.id.frameLayout);
                ll.setOnClickListener(this);

                posts.put(ll, i);

            } catch (JSONException e) {
                e.printStackTrace();
            }
        }

        //FrameLayout post = (FrameLayout) getActivity().findViewById(R.id.frameLayout);
        //post.setOnClickListener(this);
    }

    public void onItemCreated(BlogItem blogItem) {
        LinearLayout postView = (LinearLayout) blogItem.getView();
        ((LinearLayout) getActivity().findViewById(R.id.blogLayout)).addView(postView);
        System.out.println("Should work #BLOG58");

    }

    @Override
    public void onClick(View view) {

        getActivity().getFragmentManager().beginTransaction().replace(R.id.content_frame, new Post(posts.get((LinearLayout) view))).commit();
        //getMainActivity().switchFragment(getMainActivity().getMenuItem(R.id.nav_post));
    }
}