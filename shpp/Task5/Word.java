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
        while (true) {
            String Letters = readLine("Enter your letters: ");
            println(searchWord(Letters));
        }
    }

    private String searchWord(String Letter) {
        String result = null;
        if (Letter.length() == 3) {
            /** The input stream are converted to lowercase characters and divide by */
            char[] letterChar = Letter.toLowerCase().toCharArray();
            result = "";
            try (Scanner readerFile = new Scanner(new File(DIRECTORY_FILE))) {
                ArrayList<String> list = new ArrayList<>();
                while (readerFile.hasNext())
                    list.add(readerFile.nextLine());
                readerFile.close();
                /** Check the letters on entering the word */
                for (int i = 0; i < list.size() - 1; ++i) {
                    String str = list.get(i);
                    char[] arrayChar = str.toCharArray();
                    int k = 0;
                    for (int j = 0; j < arrayChar.length - 1; ++j) {
                        if (arrayChar[j] == letterChar[k]) {
                            ++k;
                            if (k == 3) {
                                result += list.get(i) + "\n";
                                break;
                            }
                        }
                    }
                }
                println("Sorry. No there is no match");
            } catch (FileNotFoundException e) {
                //e.printStackTrace();
            }
        } else
            println("You have entered more or less 3 symbols");
        return result;
    }


}
