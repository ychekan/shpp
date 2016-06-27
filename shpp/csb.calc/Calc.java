package com.shpp.cs.a.calculator;

import com.shpp.cs.a.console.TextProgram;

import java.util.ArrayDeque;
import java.util.Deque;
import java.util.Scanner;
import java.util.StringTokenizer;


/**
 * Created by ret284 on 25.06.2016.
 */
public class Calc extends TextProgram {

    public void run() {
        calculet();
    }

    /**
     * The building all logic
     */
    private void calculet() {
        System.out.println("The operations: +, -, *, /, ^.");
        while (true) {
            String strInPars = parserStr(readFormula());
            System.out.println(" = " + calculeted(strInPars));
        }
    }

    /**
     * Counting the total value of the formula
     *
     * @param str - string after parser
     */
    private double calculeted(String str) {
        double resA = 0;
        double resB = 0;
        String stackTm;
        Deque<Double> stack = new ArrayDeque<>();
        StringTokenizer strStack = new StringTokenizer(str);
        while (strStack.hasMoreTokens()) {
            try {
                stackTm = strStack.nextToken().trim();
                if (1 == stackTm.length() && isOperator(stackTm.charAt(0))) {
                    if (stack.size() < 2) {
                        System.out.println("Error is count date in stack " + stackTm);
                    }
                    resB = stack.pop();
                    resA = stack.pop();
                    switch (stackTm.charAt(0)) {
                        case '+':
                            resA += resB;
                            break;
                        case '-':
                            resA -= resB;
                            break;
                        case '/':
                            resA /= resB;
                            break;
                        case '*':
                            resA *= resB;
                            break;
                        /*case '%':
                            resA %= resB;
                            break;*/
                        case '^':
                            resA = Math.pow(resA, resB);
                            break;
                        /*case '^':
                            resA = powNumber(resA, resB);
                            break;*/
                        default:
                            System.out.println("Error operation is not available! Sorry !");
                    }
                    stack.push(resA);
                } else {
                    resA = Double.parseDouble(stackTm);
                    stack.push(resA);
                }
            } catch (Exception e) {
                System.out.println("Error is - " + e);
            }
        }
        if (stack.size() > 1) {
            System.out.println("Error, count operator not equals the number of operands!");
        }
        return stack.pop();
    }

    /**
     * In order not to use Math.pow()
     */
    private double powNumber(double base, double exponent) {
        long result = 1; // The value = base^exponent, default 1 (if exponent = 0, value = 1) (value type long form big number)
        if (exponent > 0) { // From positive exponent
            for (int i = 1; i <= exponent; ++i) {
                result *= base;
            }
        } else if (exponent < 0) {// From negative exponent
            for (int i = 1; i <= (-exponent); ++i) {
                result *= base;
            }
            result = 1 / result;
        }
        return result;
    }

    /**
     * The parser sting input users from operator or number
     */
    private String parserStr(String str) {
        StringBuilder strBuildStack = new StringBuilder("");
        StringBuilder strBuildOut = new StringBuilder("");
        char calcIn;
        char calTm;
        for (int i = 0; i < str.length(); ++i) {
            calcIn = str.charAt(i);
            if (isOperator(calcIn)) {
                while (strBuildStack.length() > 0) {
                    calTm = strBuildStack.substring(strBuildStack.length() - 1).charAt(0);
                    if (isOperator(calTm) && (isOperatorPriority(calcIn) <= isOperatorPriority(calTm))) {
                        strBuildOut.append(" ").append(calTm).append(" ");
                        strBuildStack.setLength(strBuildStack.length() - 1);
                    } else {
                        strBuildOut.append(" ");
                        break;
                    }
                }
                strBuildOut.append(" ");
                strBuildStack.append(calcIn);
            } else if ('(' == calcIn)
                strBuildStack.append(calcIn);
            else if (')' == calcIn) {
                calTm = strBuildStack.substring(strBuildStack.length() - 1).charAt(0);
                while ('(' != calTm) {
                    if (strBuildStack.length() < 1)
                        System.out.println("Error");
                    strBuildOut.append(" ").append(calTm);
                    strBuildStack.setLength(strBuildStack.length() - 1);
                    calTm = strBuildStack.substring(strBuildStack.length() - 1).charAt(0);
                }
                strBuildStack.setLength(strBuildStack.length() - 1);
            } else
                strBuildOut.append(calcIn); // if symbol not operator then to add he output string
        }
        while (strBuildStack.length() > 0) {
            strBuildOut.append(" ").append(strBuildStack.substring(strBuildStack.length() - 1));
            strBuildStack.setLength(strBuildStack.length() - 1);
        }
        return strBuildOut.toString();
    }

    /**
     * The checks whether the current symbol of the operator priority
     */
    private byte isOperatorPriority(char operations) {
        byte priorityCh = 1;
        if (operations == '^')
            priorityCh = 3;
        else if (operations == '*' || operations == '/' || operations == '%')
            priorityCh = 2;
        return priorityCh;
    }

    /**
     * The checks whether the current symbol of the operator
     */
    private boolean isOperator(char calcIn) {
        boolean cal = (calcIn == '-' || calcIn == '+' || calcIn == '*' || calcIn == '/') ? true : false;
        return cal;
    }

    /**
     * Read input string
     */
    private String readFormula() {
        System.out.print(">> ");
        Scanner scan = new Scanner(System.in);
        String readL = scan.nextLine();
        if (readL.isEmpty())
            System.out.println("String is empty! Try again!");
        return readL;
    }
}