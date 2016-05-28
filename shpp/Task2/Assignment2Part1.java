package com.shpp.ychekan;

import java.util.Scanner;

public class Assignment2Part1 {
    public static double SqrtNumber(double Number){// Seach sqrt value
        double Result = Math.sqrt(Number);
        return Result;
    }
    public static double Discriminanta(double a, double b, double c){ // Discriminanta for to equation
        double ResultD = (b * b) - (4 * (a * c));
        return ResultD;
    }
    public static void main(String[] args){
        System.out.print("Please enter a: ");// input and read first value
        Scanner scanOneNumber = new Scanner(System.in);
        double FirstNumber = scanOneNumber.nextDouble();
        System.out.print ("Please enter b: ");// input and read second value
        Scanner scanTwoNumber = new Scanner(System.in);
        double SecondNumber = scanTwoNumber.nextDouble();
        System.out.print("Please enter c: ");// input and read three value
        Scanner scanThreeNumber = new Scanner(System.in);
        double ThreeNumber = scanThreeNumber.nextDouble();
        double D = Discriminanta(FirstNumber, SecondNumber, ThreeNumber);
        if(D > 0){
            double ResultX_1 = ((- (SecondNumber) + SqrtNumber(D)))/(2 * FirstNumber);
            double ResultX_2 = ((- (SecondNumber) - SqrtNumber(D)))/(2 * FirstNumber);
            System.out.println("There are two roots: " + ResultX_1 + " and " + ResultX_2);
        }
        else if(D < 0){
            System.out.println("There are no real roots");//String ResultX_1 =
        }
        else if(D == 0){
            double ResultX_1 = (-(SecondNumber/(2 * FirstNumber)));
            System.out.println("There is one root: " + ResultX_1);
        }
    }
}
