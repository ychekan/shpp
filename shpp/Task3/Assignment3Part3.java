package com.shpp.task3.ychekan;

import com.shpp.cs.a.console.TextProgram;
import java.util.Scanner;

public class Assignment3Part3 extends TextProgram{
    private double raiseToPower(double base, int exponent){//
        long Result = 1;// The value = base^exponent, default 1 (if exponent = 0, value = 1) (value type long form big number)
        if(exponent > 0){// From positive exponent
            for(int i = 1; i <= exponent; ++i){
                Result *= base;
            }
        }
        else if(exponent < 0){// From negative exponent
            for(int i = 1; i <= (- exponent); ++i){
                Result *= base;
            }
            Result = 1 / Result;
        }
        return Result;
    }
    public void run(){
        System.out.print("Enter your number: ");// Print & enter base
        Scanner scanBase = new Scanner(System.in);
        double ScanBase = scanBase.nextDouble();
        System.out.print("Enter your exponent: ");// Print & enter exponent
        Scanner scanExponent = new Scanner(System.in);
        int ScanExponent = scanExponent.nextInt();
        System.out.println(raiseToPower(ScanBase, ScanExponent));// Print result
    }
}
