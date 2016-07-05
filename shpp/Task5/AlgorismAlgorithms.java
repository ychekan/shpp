package com.shpp.task5.ychekan;

import com.shpp.cs.a.console.TextProgram;


/**
 * Created by ret284 on 03.07.2016.
 */

public class AlgorismAlgorithms extends TextProgram {
    public void run() {
        /* Sit in a loop, reading numbers and adding them. */
        while (true) {
            String n1 = readLine("Enter first number:  ");
            String n2 = readLine("Enter second number: ");
            println(n1 + " + " + n2 + " = " + addNumericStrings(n1, n2));
            println();
        }
    }

    /**
     * Given two string representations of nonnegative integers, adds the
     * numbers represented by those strings and returns the result.
     *
     * @param n1 The first number.
     * @param n2 The second number.
     * @return A String representation of n1 + n2
     */
    private String addNumericStrings(String n1, String n2) {
        int ten = 0;
        String result = "";
        if (n1.isEmpty() || n2.isEmpty())
            println("Enter string !");
        else {
            if (n1.length() != n2.length()) {
                int difference = n1.length() - n2.length();
                if (difference > 0)
                    for (int i = 0; i < Math.abs(difference); ++i)
                        n2 = "0" + n2;
                if (difference < 0)
                    for (int i = 0; i < Math.abs(difference); ++i)
                        n1 = "0" + n1;
            }
            for (int i = n1.length() - 1; i >= 0; --i) {
                int intN1 = getIntFromStr(n1.charAt(i));
                int intN2 = getIntFromStr(n2.charAt(i));
                int resultInt = intN1 + intN2 + ten;
                String resultStr = Integer.toString(resultInt);
                if (resultStr.length() > 1) {
                    ten = Character.getNumericValue(resultStr.charAt(0));
                    result = resultStr.charAt(1) + result;
                    if (i == 0)
                        result = resultStr.charAt(0) + result;
                } else {
                    ten = 0;
                    result = resultStr.charAt(0) + result;
                }
            }
        }

        return result;
    }

    /**
     * Convert from char to the int
     */
    private int getIntFromStr(char num) {
        return num - '0';
    }
}