package com.shpp.task5.ychekan;

import com.shpp.cs.a.console.TextProgram;


/**
 * Created by ret284 on 28.05.2016.
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
        String result = "";
        int Des = 0;
        int n1Length = n1.length();
        int n2Length = n2.length();
        int MaxLength = (n1Length < n2Length) ? n2Length : n1Length;
        for (int i = MaxLength - 1; i >= 0; --i) {
            int N1 = 0;
            if (i < n1Length)
                N1 = Integer.parseInt(n1.substring(i, i + 1));
            int N2 = 0;
            if (i < n2Length)
                N2 = Integer.parseInt(n2.substring(i, i + 1));
            int Result = N1 + N2 + Des;
            if (Result > 9) {
                int res = Result % 10;
                Des = (Result - res) / 10;
                result = res + result;
            } else {
                result = "" + Result;
            }
        }
        result = Des + result;
        return result;
    }
}