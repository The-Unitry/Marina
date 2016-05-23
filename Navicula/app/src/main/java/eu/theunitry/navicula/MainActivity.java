package eu.theunitry.navicula;

import android.app.FragmentManager;
import android.os.Bundle;
import android.support.design.widget.CoordinatorLayout;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.view.View;
import android.support.design.widget.NavigationView;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.view.WindowManager;

import java.util.ArrayList;

import eu.theunitry.navicula.fragments.Blog;
import eu.theunitry.navicula.fragments.LoginForm;
import eu.theunitry.navicula.fragments.RegistrationForm;
import eu.theunitry.navicula.fragments.RentBoxes;
import eu.theunitry.navicula.fragments.Splashscreen;

public class MainActivity extends AppCompatActivity implements NavigationView.OnNavigationItemSelectedListener {

    private FloatingActionButton fab;
    private NavigationView navigationView;
    private boolean fabShown = true;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        fab = (FloatingActionButton) findViewById(R.id.fab);
        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                FragmentManager fm = getFragmentManager();
                NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);

                fm.beginTransaction().replace(R.id.content_frame, new RentBoxes()).commit();
                navigationView.setCheckedItem(R.id.nav_rentBox);
            }
        });

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.setDrawerListener(toggle);
        toggle.syncState();

        navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);

        getWindow().addFlags(WindowManager.LayoutParams.FLAG_KEEP_SCREEN_ON);

        getFragmentManager().beginTransaction().replace(R.id.content_frame, new Blog()).commit();
        navigationView.setCheckedItem(R.id.nav_home);

        MenuManager menuManager = new MenuManager(navigationView.getMenu());
        menuManager.switchMenu("debug");

    }

    @Override
    public void onBackPressed() {
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        if (drawer.isDrawerOpen(GravityCompat.START)) {
            drawer.closeDrawer(GravityCompat.START);
        } else {
            super.onBackPressed();
        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.main, menu);

        FragmentManager fm = getFragmentManager();
        fm.beginTransaction().replace(R.id.content_frame, new Blog()).commit();
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }

    @SuppressWarnings("StatementWithEmptyBody")
    @Override
    public boolean onNavigationItemSelected(MenuItem item) {
        // Handle navigation view item clicks here.
        FragmentManager fm = getFragmentManager();

        int id = item.getItemId();

        FragmentMain fragment;

        switch (id) {
            case R.id.nav_home:
                fragment = new Blog();
                break;
            case R.id.nav_myInfo:
                fragment = new Blog();
                break;
            case R.id.nav_myBoats:
                fragment = new Blog();
                break;
            case R.id.nav_rentBox:
                fragment = new RentBoxes();
                break;
            case R.id.nav_reserveCrane:
                fragment = new Blog();
                break;
            case R.id.nav_login:
                fragment = new LoginForm();
                break;
            case R.id.nav_register:
                fragment = new RegistrationForm();
                break;
            case R.id.splashscreen:
                fragment = new Splashscreen();
                break;
            default:
                fragment = new Blog();
                break;
        }
        fm.beginTransaction().replace(R.id.content_frame, fragment).commit();
        getSupportActionBar().setTitle(navigationView.getMenu().findItem(id).getTitle().toString());

        if (fragment.hasFAB()) {
            showFab();
        } else {
            hideFab();
        }

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }

    @Override
    public boolean onPrepareOptionsMenu(Menu menu) {
        MenuItem item= menu.findItem(R.id.action_settings);
        item.setVisible(false);
        super.onPrepareOptionsMenu(menu);
        return true;
    }

    public void showFab() {
        if (getFab().getVisibility() == View.GONE) {
            getFab().show();
        }
    }

    public void hideFab() {
        if (getFab().getVisibility() == View.VISIBLE) {
            getFab().hide();
        }
    }

    public FloatingActionButton getFab() {
        return this.fab;
    }

    public void setFab(FloatingActionButton fab) {
        this.fab.show();
    }
}
