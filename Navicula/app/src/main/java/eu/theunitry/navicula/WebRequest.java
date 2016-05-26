package eu.theunitry.navicula;

import android.os.AsyncTask;
import android.util.Log;

import org.apache.http.NameValuePair;
import org.json.JSONArray;
import org.json.JSONException;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.io.UnsupportedEncodingException;
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLEncoder;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Iterator;
import java.util.List;
import java.util.Map;

/**
 * Created by Allan on 24-5-2016.
 */
public class WebRequest extends AsyncTask<Void, Void, String> {

    private FragmentMain fragment;
    private Exception exception;
    private String apiBaseURL = "http://allandewit.xyz/";
    private String apiURL;
    private String requestMethod;
    private HashMap<String, String> params = null;

    public WebRequest(FragmentMain fragment, String apiURL, String requestMethod) {
        this.fragment = fragment;
        this.apiURL = apiBaseURL + apiURL;
        this.requestMethod = requestMethod;
    }

    public WebRequest(FragmentMain fragment, String apiURL, String requestMethod, HashMap<String, String> params) {
        this(fragment, apiURL, requestMethod);
        this.params = params;
    }

    @Override
    protected String doInBackground(Void... urls) {

        try {
            URL url = new URL(this.apiURL);
            HttpURLConnection urlConnection = (HttpURLConnection) url.openConnection();
            urlConnection.setReadTimeout(10000);
            urlConnection.setConnectTimeout(15000);
            urlConnection.setRequestMethod(this.requestMethod);
            urlConnection.setDoInput(true);
            urlConnection.setDoOutput(true);

            if (params != null) {
                OutputStream os = urlConnection.getOutputStream();
                BufferedWriter writer = new BufferedWriter(new OutputStreamWriter(os, "UTF-8"));
                writer.write(getQuery(params));
                writer.flush();
                writer.close();
                os.close();

                urlConnection.connect();
            }

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
        if (response == null) {
            response = "THERE WAS AN ERROR";
        }
        try {
            JSONArray object = new JSONArray(response);
            this.fragment.onRequestCompleted(object);
        } catch (JSONException e) {
            System.out.println("Exception: " + e);
        }
    }

    private String getQuery(HashMap<String, String> params) throws UnsupportedEncodingException {
        StringBuilder result = new StringBuilder();
        boolean first = true;

        for (Map.Entry<String, String> param : params.entrySet())
        {
            if (first)
                first = false;
            else
                result.append("&");

            result.append(URLEncoder.encode(param.getKey(), "UTF-8"));
            result.append("=");
            result.append(URLEncoder.encode(param.getValue(), "UTF-8"));
        }

        return result.toString();
    }

    private void sendRequest(){

    }

}