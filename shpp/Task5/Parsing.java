package com.shpp.task5.ychekan;

import com.shpp.cs.a.console.TextProgram;
import java.io.File;
import java.io.FileNotFoundException;
import java.util.ArrayList;
import java.util.Scanner;

/**
 * Created by ret284 on 31.05.2016.
 */
public class Parsing extends TextProgram {
    private static final String MY_DIRECTORY = "C:\\Users\\ret284\\IdeaProjects\\Task5\\src\\";

    public void run() {
        println(extractColumn("food-origins.csv", 0));
    }

    private ArrayList<String> extractColumn(String filename, int columnIndex) {
        String fileName = new String(MY_DIRECTORY + filename);
        ArrayList<String> listResult = new ArrayList<>();
        String virgule = ",";// Enter virgule
        char kavichki = '"';
        String startRes = "[";// for clarity
        String endRes = "]";
        try (Scanner scan = new Scanner(new File(fileName))) {
            ArrayList<String> list = new ArrayList<>();
            while (scan.hasNext())
                list.add(scan.nextLine());
            scan.close();
            String result = null;
            for (int i = 0; i < list.size(); ++i) {
                String srtingList = list.get(i);
                char[] charList = srtingList.toCharArray();
                result = "";
                int startMassiv = columnIndex * (srtingList.indexOf(virgule) + 1);
                int check = srtingList.indexOf(kavichki);
                for (int k = startMassiv; k < srtingList.length() - 1; ++k) {
                    int indMassiv = srtingList.indexOf(virgule);
                    if (k == indMassiv) {
                        break;
                    }
                    if (k == check) {
                        charList[k] = charList[k + 1];
                        ++k;
                    }
                    result = result + charList[k];
                }
                listResult.add(startRes + result + endRes);
            }
        } catch (FileNotFoundException e) {
            //e.printStackTrace();
        }
        return listResult;
    }
}
