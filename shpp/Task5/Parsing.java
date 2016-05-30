package com.shpp.task5.ychekan;

import com.shpp.cs.a.console.TextProgram;

import java.io.File;
import java.io.FileNotFoundException;
import java.util.ArrayList;
import java.util.Scanner;

/**
 * Created by ret284 on 30.05.2016.
 */
public class Parsing extends TextProgram {
    private static final String MY_DIRECTORY = "C:\\Users\\ret284\\IdeaProjects\\Task5\\src\\";

    public void run() {
        println(extractColumn("food-origins.csv", 1));
    }

    private ArrayList<String> extractColumn(String filename, int columnIndex) {
        String fileName = new String(MY_DIRECTORY + filename);
        ArrayList<String> listResult = new ArrayList<>();
        String virgule = ",";
        try (Scanner scan = new Scanner(new File(fileName))) {
            ArrayList<String> list = new ArrayList<>();
            while (scan.hasNext())
                list.add(scan.nextLine());
            scan.close();
            String result = null;
            for (int i = 0; i < list.size(); ++i) {
                //char[] charList = list.get(i).toCharArray();
                String str = list.get(i);
                char[] charList = str.toCharArray();
                result = "";
                int startMassiv = columnIndex * str.indexOf(virgule);
                int stopMassiv = virgule.indexOf(virgule, startMassiv + 1);

                //int stopMassiv = lastIndexOf(virgule);
                println(stopMassiv);
                for (int k = startMassiv + 1; k < 10; ++k) {
                    int indMassiv = str.indexOf(virgule);
                    if (k == indMassiv) {
                        break;
                    }
                    result = result + charList[k];
                }
                listResult.add(result);
            }
        } catch (FileNotFoundException e) {
            //e.printStackTrace();
        }
        return listResult;
    }


}
