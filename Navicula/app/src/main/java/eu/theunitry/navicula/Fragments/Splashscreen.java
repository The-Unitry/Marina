package eu.theunitry.navicula.fragments;

import android.os.Bundle;
import android.os.Handler;
import android.support.design.internal.NavigationMenu;
import android.support.v4.widget.DrawerLayout;
import android.util.DisplayMetrics;
import android.view.Gravity;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.ProgressBar;
import android.widget.RadioButton;
import android.widget.TextView;

import org.w3c.dom.Text;

import java.io.SyncFailedException;

import eu.theunitry.navicula.FragmentMain;
import eu.theunitry.navicula.MainActivity;
import eu.theunitry.navicula.R;

public class Splashscreen extends FragmentMain {

    public ProgressBar bar;

    public Splashscreen() {
        setFAB(false);
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {

        DrawerLayout draw = (DrawerLayout) getActivity().findViewById(R.id.drawer_layout);
        //draw.setDrawerLockMode(DrawerLayout.LOCK_MODE_LOCKED_CLOSED);

        getMainActivity().getSupportActionBar().hide();

        //Run progress bar
        runProgressBar(10);

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
                ProgressBar bar = (ProgressBar) getMainActivity().findViewById(R.id.progressBar);
                ImageView icon = (ImageView) getMainActivity().findViewById(R.id.imageView3);
                TextView progressText = (TextView) getMainActivity().findViewById(R.id.progressText);
                ImageView earth = (ImageView) getMainActivity().findViewById(R.id.imageView2);

                //Make sure the pivot point is only set once
                if (loopOnce != true){

                    float newPivotPointY = earth.getY() + earth.getHeight() / 2 ;
                    icon.setPivotY(newPivotPointY / 3 + icon.getPivotY() - icon.getHeight() / 5);

                    icon.setY(icon.getY() - icon.getY() / 100);
                    loopOnce = true;

                }

                //Move elements
                if(!willWork){
                    if(bar.getProgress() < bar.getMax()) {
                        bar.setProgress(bar.getProgress() + 1);
                        progressText.setText(bar.getProgress() + "%");
                    }
                    willWork = true;
                }
                else{
                    if(icon.getRotation() <= 360){
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
