package com.shpp.task5.ychekan;

import com.shpp.cs.a.console.TextProgram;

import java.io.*;
import java.util.ArrayList;
import java.util.Scanner;

/**
 * Created by ret284 on 30.05.2016.
 */

public class Word extends TextProgram {
    private static final String DIRECTORY_FILE = "C:\\Users\\ret284\\IdeaProjects\\Task5\\src\\en-dictionary.txt";

    public void run() {
        ArrayList<String> arrList = readDataFile();
        while (true) {
            String inputLetter = readLine("Enter your letters: ");
            println(searchWord(inputLetter, arrList));
        }
    }

    private String searchWord(String Letter, ArrayList<String> arrList) {
        String result = null;
        if (Letter.length() == 3) {
            /** The input stream are converted to lowercase characters and divide by */
            char[] letterChar = Letter.toLowerCase().toCharArray();
            result = "";
            for (int i = 0; i < arrList.size() - 1; ++i) {
                //String str = arrList.get(i);
                char[] arrayChar = arrList.get(i).toCharArray();
                int k = 0;
                for (int j = 0; j < arrayChar.length - 1; ++j) {
                    if (arrayChar[j] == letterChar[k]) {
                        ++k;
                        if (k == 3) {
                            result += arrList.get(i) + "\n";
                            break;
                        }
                    }
                }
            }
            if (result.length() == 0) {
                result = "Sorry, Words such letters is not! :-(";
            }
        } else
            result = "You have entered more or less 3 symbols";
        return result;
    }

    /**
     * The method for read file and push in array
     */
    private ArrayList<String> readDataFile() {
        try (Scanner readerFile = new Scanner(new File(DIRECTORY_FILE))) {
            ArrayList<String> list = new ArrayList<>();
            while (readerFile.hasNext())
                list.add(readerFile.nextLine());
            readerFile.close();
            return list;
        } catch (FileNotFoundException e) {
            e.printStackTrace();
        }
        return null;
    }
}
