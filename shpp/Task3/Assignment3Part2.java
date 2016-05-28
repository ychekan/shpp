package com.shpp.task3.ychekan;

import com.shpp.cs.a.console.TextProgram;
import java.util.Scanner;

public class Assignment3Part2 extends TextProgram {
    private void ReadNumber(){// Enter user number & check in
        System.out.print("Enter a number: ");
        Scanner scan = new Scanner(System.in);
        if(scan.hasNextInt()) {//
            int InputNumber = scan.nextInt();
            if(InputNumber >= 0) {
                PairNumber(InputNumber);
                System.out.println("End");
            }
        }
        else{
            System.out.println("Sorry, but it's not number");
        }
    }
    private void PairNumber(int Number) {
        while (Number > 1){
            if (Number % 2 == 0) {
                System.out.println(Number + " is even so I take half: " + Number / 2);
                Number = Number / 2;
            } else {
                System.out.println(Number + " is odd so I make 3n + 1: " + (Number * 3 + 1));
                Number = Number * 3 + 1;
            }
        }
    }
    public void run(){
        ReadNumber();
    }
}
