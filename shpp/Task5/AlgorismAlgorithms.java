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
        int tenWhole = 0;
        String result = "";
        if (n1.isEmpty() || n2.isEmpty())
            println("Enter string !");
        else {
            int lengthN1 = n1.length();
            int lengthN2 = n2.length();

            int MaxLength = (lengthN1 <= lengthN2) ? lengthN2 : lengthN1;
            /** Max length string */
            char[] n1char = n1.toCharArray();
            char[] n2char = n2.toCharArray();
            for (int i = 0; i < MaxLength; ++i) {
                /**  */
                int N1 = (lengthN1 > i) ? getNumberInString(n1char[lengthN1 - 1 - i]) : 0;
                int N2 = (lengthN2 > i) ? getNumberInString(n2char[lengthN2 - 1 - i]) : 0;
                if (N1 + N1 != 0) {
                    int Result = N1 + N2 + tenWhole;
                    if (Result > 9) {
                        int resultUnits = Result % 10;
                        tenWhole = (Result - resultUnits) / 10;
                        result = Integer.toString(resultUnits) + result;
                    } else
                        result = Integer.toString(Result) + result;
                }
                else {
                    System.out.println("In your number does not match the format. Did you enter a zero before the number");
                    break;
                }
            }
        }
        if (tenWhole > 0)
            result = Integer.toString(tenWhole) + result;
        return result;
    }

    private Integer getNumberInString(char strChar) {
        int N = Integer.parseInt(String.valueOf(strChar));
        return N;
    }
}