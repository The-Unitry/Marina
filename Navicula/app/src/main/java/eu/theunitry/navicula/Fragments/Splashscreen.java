package eu.theunitry.navicula.fragments;

import android.os.Build;
import android.os.Bundle;
import android.os.Handler;
import android.support.v4.widget.DrawerLayout;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.ProgressBar;
import android.widget.TextView;

import java.util.Random;

import eu.theunitry.navicula.FragmentMain;
import eu.theunitry.navicula.R;

public class Splashscreen extends FragmentMain {

    public Splashscreen() {
        setFAB(false);
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {

        DrawerLayout draw = (DrawerLayout) getActivity().findViewById(R.id.drawer_layout);
        draw.setDrawerLockMode(DrawerLayout.LOCK_MODE_LOCKED_CLOSED);

        getMainActivity().getSupportActionBar().hide();

        //Run progress bar
        runProgressBar(20);

        return inflater.inflate(R.layout.splashscreen, container, false);
    }

    public void runProgressBar(final int time){

        final Handler handler = new Handler();
        handler.postDelayed(new Runnable() {

            boolean loopOnce = false;
            boolean willWork = false;
            int willWorkToo = 0;

            public void run() {
                //Declare all View elements
                ImageView icon = (ImageView) getMainActivity().findViewById(R.id.iconImage);
                TextView progressText = (TextView) getMainActivity().findViewById(R.id.progressText);
                ImageView earth = (ImageView) getMainActivity().findViewById(R.id.planetImage);
                TextView quote = (TextView) getMainActivity().findViewById(R.id.quoteText);


                //Make sure the pivot point is only set once
                if (!loopOnce){

                    float newPivotPointY = earth.getY() + earth.getHeight() / 2 ;

                    icon.setPivotX((earth.getWidth() / 2 + earth.getX() / 4) / 10 + icon.getHeight() / 3);

                    icon.setPivotY(newPivotPointY / 3 + icon.getPivotY() - icon.getHeight() / 5);

                    int currentapiVersion = android.os.Build.VERSION.SDK_INT;
                    if (currentapiVersion <= Build.VERSION_CODES.KITKAT){
                        icon.setVisibility(View.GONE);
                    }

                    icon.setY(icon.getY() - icon.getY() / 100);

                    int random = new Random().nextInt(8);

                    switch (random){
                        case 0:
                            quote.setText(getResources().getString(R.string.splash_quote_one));
                            break;
                        case 1:
                            quote.setText(getResources().getString(R.string.splash_quote_two));
                            break;
                        case 2:
                            quote.setText(getResources().getString(R.string.splash_quote_three));
                            break;
                        case 3:
                            quote.setText(getResources().getString(R.string.splash_quote_four));
                            break;
                        case 4:
                            quote.setText(getResources().getString(R.string.splash_quote_five));
                            break;
                        case 5:
                            quote.setText(getResources().getString(R.string.splash_quote_six));
                            break;
                        case 6:
                            quote.setText(getResources().getString(R.string.splash_quote_seven));
                            break;
                        case 7:
                            quote.setText(getResources().getString(R.string.splash_quote_eight));
                            break;
                        case 8:
                            quote.setText(getResources().getString(R.string.splash_quote_ten));
                            break;
                        case 9:
                            quote.setText(getResources().getString(R.string.splash_quote_one));
                            break;
                    }

                    loopOnce = true;

                }

                ProgressBar bar = (ProgressBar) getMainActivity().findViewById(R.id.progressBar);

                //Move elements
                if(!willWork){
                    if(bar.getProgress() < bar.getMax()) {
                        bar.setProgress(bar.getProgress() + 1);
                        progressText.setText(bar.getProgress() + "%");
                    }
                    willWork = true;
                }
                else{
                    if(icon.getRotation() <= 358){
                        if (willWorkToo == 0){
                            icon.setRotation(icon.getRotation() + 4);
                            willWorkToo++;
                        }
                        else if(willWorkToo == 1){
                            icon.setRotation(icon.getRotation() + 3);
                            willWorkToo++;
                        }
                        else {
                            icon.setRotation(icon.getRotation() + 4);
                            willWorkToo = 0;
                        }
                    }
                    willWork = false;
                }

                if (bar.getProgress() != bar.getMax()) {
                    //Calling postdelayed again
                    handler.postDelayed(this, time);
                }
            }
        }, time);
    }
}
