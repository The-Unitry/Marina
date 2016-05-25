package eu.theunitry.navicula;

import android.support.design.widget.NavigationView;
import android.view.*;

import java.util.ArrayList;
import java.util.HashMap;

/**
 * Created by Allan on 21-5-2016.
 */
public class MenuManager {

    private Menu menu;
    private HashMap<String, ArrayList<Integer>> menus = new HashMap<String, ArrayList<Integer>>();
    private String currentMenu;
    private static ArrayList<Integer>
            menuItems = new ArrayList<Integer>(),
            visitorMenu = new ArrayList<Integer>(),
            userMenu = new ArrayList<Integer>();

    public MenuManager(Menu menu) {
        setMenu(menu);

        menuItems.add(R.id.nav_home);
        menuItems.add(R.id.nav_myInfo);
        menuItems.add(R.id.nav_myBoats);
        menuItems.add(R.id.nav_addBoats);
        menuItems.add(R.id.nav_myBoxes);
        menuItems.add(R.id.nav_rentBox);
        menuItems.add(R.id.nav_reserveCrane);
        menuItems.add(R.id.nav_login);
        menuItems.add(R.id.nav_register);
        menuItems.add(R.id.nav_logout);

        visitorMenu.add(R.id.nav_home);
        visitorMenu.add(R.id.nav_login);
        visitorMenu.add(R.id.nav_register);

        userMenu.add(R.id.nav_home);
        userMenu.add(R.id.nav_myInfo);
        userMenu.add(R.id.nav_myBoats);
        userMenu.add(R.id.nav_myBoxes);
        userMenu.add(R.id.nav_rentBox);
        userMenu.add(R.id.nav_reserveCrane);
        userMenu.add(R.id.nav_logout);

        menus.put("debug", menuItems);
        menus.put("visitor", visitorMenu);
        menus.put("user", userMenu);
    }

    public void switchMenu(String menu) {
        setCurrentMenu(menu);
        update();
    }

    public void update() {
        for (Integer menuItem:
                menuItems) {
            MenuItem item = menu.findItem(menuItem);
            item.setVisible(false);
        }

        for (Integer menuItem:
                menus.get(getCurrentMenu())) {
            MenuItem item = menu.findItem(menuItem);
            item.setVisible(true);
        }
    }

    public Menu getMenu() {
        return this.menu;
    }

    public void setMenu(Menu menu) {
        this.menu = menu;
    }

    public String getCurrentMenu() {
        return this.currentMenu;
    }

    public void setCurrentMenu(String currentMenu) {
        this.currentMenu = currentMenu;
    }
}
