package eu.theunitry.navicula.fragments;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.LinearLayout;
import android.widget.TextView;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import eu.theunitry.navicula.FragmentMain;
import eu.theunitry.navicula.R;
import eu.theunitry.navicula.WebRequest;

public class Post extends FragmentMain {

    private int postId;

    public Post(int postId) {

        setPostId(postId);
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {

        return inflater.inflate(R.layout.fragment_post, container, false);
    }

    @Override
    public void onViewCreated(View view, Bundle savedInstanceState) {

        WebRequest jsonAsync = new WebRequest(this, "api-example.json", "GET");
        jsonAsync.execute();
    }

    @Override
    public void onRequestCompleted(JSONArray response) {

        try {
            //BlogItem blogItem = new BlogItem(this);
            JSONObject post = response.getJSONObject(getPostId());

            ((TextView) getActivity().findViewById(R.id.textViewPostTitle)).setText(post.getString("title"));
            ((TextView) getActivity().findViewById(R.id.textViewPostText)).setText(post.getString("body"));
            ((TextView) getActivity().findViewById(R.id.textViewPostDate)).setText(post.getString("created_at"));

        } catch (JSONException e) {
            e.printStackTrace();
        }

    }

    public int getPostId() {
        return this.postId;
    }

    public void setPostId(int postId) {
        this.postId = postId;
    }
}