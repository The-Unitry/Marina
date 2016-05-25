package eu.theunitry.navicula;

import android.os.AsyncTask;
import android.util.Log;

import org.json.JSONArray;
import org.json.JSONException;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

/**
 * Created by Allan on 24-5-2016.
 */
public class WebRequest extends AsyncTask<Void, Void, String> {

    private FragmentMain fragment;
    private Exception exception;
    private String apiBaseURL = "http://allandewit.xyz/";
    private String apiURL;

    public WebRequest(FragmentMain fragment, String apiURL) {
        this.fragment = fragment;
        this.apiURL = apiBaseURL + apiURL;
    }

    @Override
    protected String doInBackground(Void... urls) {

        try {
            URL url = new URL(this.apiURL);
            HttpURLConnection urlConnection = (HttpURLConnection) url.openConnection();
            try {
                BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(urlConnection.getInputStream()));
                StringBuilder stringBuilder = new StringBuilder();
                String line;
                while ((line = bufferedReader.readLine()) != null) {
                    stringBuilder.append(line).append("\n");
                }
                bufferedReader.close();
                return stringBuilder.toString();
            }
            finally{
                urlConnection.disconnect();
            }
        }
        catch(Exception e) {
            Log.e("ERROR", e.getMessage(), e);
            return null;
        }

    }

    protected void onPostExecute(String response) {
        response = response.toString();
        if (response == null) {
            response = "THERE WAS AN ERROR";
        }
        try {
            JSONArray object = new JSONArray(response);
            this.fragment.onRequestCompleted(object);
        } catch (JSONException e) {
            System.out.println(e);
        }
    }

}