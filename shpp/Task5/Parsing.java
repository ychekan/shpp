package com.shpp.task5.ychekan;

import com.shpp.cs.a.console.TextProgram;

import java.io.File;
import java.io.FileNotFoundException;
import java.util.ArrayList;
import java.util.Scanner;

/**
 * Created by ret284 on 03.07.2016.
 */

public class Parsing extends TextProgram {
    /**
     * Directory for file .scv
     * */
    private static final String MY_DIRECTORY = "C:\\Users\\ret284\\IdeaProjects\\Task5\\src\\";

    public void run() {
        //println(extractColumn("food-origins.csv", 0));
        println(extractColumn("food-origins.csv", 1));
    }

    /**
     * The method for read and separation file
     */
    private ArrayList<String> extractColumn(String filename, int columnIndex) {
        try {
            ArrayList<String> result = new ArrayList<>();
            ArrayList<String> list = new ArrayList<>();
            Scanner scan = new Scanner(new File(MY_DIRECTORY + filename));
            while (scan.hasNext())
                list.add(scan.nextLine());
            scan.close();
            // The check on the splitter dividing line
            for (int i = 0; i < list.size(); ++i) {
                result.add(checkStr(list.get(i)).get(columnIndex));
            }
            return result;
        } catch (FileNotFoundException e) {
            e.printStackTrace();
        }
        return null;
    }

    /**
     * The method for correct separation line in the cell
     */
    private ArrayList<String> checkStr(String str) {
        ArrayList<String> result = new ArrayList<>();
        String cell = "";
        String[] limit = str.split(",");
        for (int i = 0; i < limit.length; i++) {
            if (limit[i].charAt(0) == '\"' && limit[i].charAt(limit[i].length() - 1) != '\"')
                cell = limit[i];
            if (limit[i].charAt(0) != '\"' && limit[i].charAt(limit[i].length() - 1) == '\"') {
                cell = cell + "," + limit[i];
                result.add(cell);
                cell = "";
            }
            if (cell != "")
                cell = limit[i];
            else
                result.add(limit[i]);
        }
        return result;
    }
}
