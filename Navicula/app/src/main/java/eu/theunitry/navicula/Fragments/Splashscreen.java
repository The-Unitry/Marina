package eu.theunitry.navicula.fragments;

import android.os.Bundle;
import android.os.Handler;
import android.support.design.internal.NavigationMenu;
import android.support.v4.widget.DrawerLayout;
import android.view.Gravity;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ProgressBar;

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

        final Handler handler = new Handler();
        handler.postDelayed(new Runnable() {
            boolean reverse = false;
            public void run() {
                ProgressBar bar = (ProgressBar) getActivity().findViewById(R.id.progressBar);
                if (reverse == true){
                    if(bar.getProgress() < 100){
                        bar.setProgress(bar.getProgress() + 1);
                    }
                    else{
                        reverse = false;
                    }
                }else if (reverse == false){
                    if(bar.getProgress() > 0){
                        bar.setProgress(bar.getProgress() - 1);
                    }
                    else{
                        reverse = true;
                    }
                }

                //calling postdelayed again
                handler.postDelayed(this, 100);       //added this line
            }
        }, 100);

        return inflater.inflate(R.layout.splashscreen, container, false);
    }

}
