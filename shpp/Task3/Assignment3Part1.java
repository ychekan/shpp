package com.shpp.task3.ychekan;

import com.shpp.cs.a.console.TextProgram;
import java.util.Scanner;

public class Assignment3Part1 extends TextProgram {
    private static final String LAST_SRART = "You needed to train hard for at least ";
    private static final String LAST_FINISH = " more day(s) a week!";
    private static final String GOOD_JOB_CARDIOVACULAR = "Great job! You've done enough exercise for cardiovacular health.";
    private static final String GOOD_JOB_PRESSURE = "Great job! You've done enough exercise to keep a low blood pressure.";

    private void InputTime(){// Read value from user
        int CountCardiovacular = 0;// Value day < 30 minutes in day, default zero
        int CountPressure = 0;// Value day < 40 minutes in day, default zero
        for(int i = 1; i <= 7; ++i) {
            System.out.print("How many minutes did you do on day " + i + "? ");
            Scanner scanTime = new Scanner(System.in);
            int name_i = 0;// if user not input any number value, his time to this day = 0 & print messing
            if (scanTime.hasNextInt()) {// The check whether the number
                name_i = scanTime.nextInt();
                if(name_i >= 30){
                    CountCardiovacular++;
                }
                if(name_i >= 40){
                    CountPressure++;
                }
            } else {
                System.out.println("Sorry, but it's not number");
            }
        }
        ResultDay(CountCardiovacular, CountPressure);
    }
    private void ResultDay(int Cardiovacular, int Pressure){// The check result to sport and print result
        System.out.println("Cardiovacular health:");
        CheckForDaay(Cardiovacular, 5 , GOOD_JOB_CARDIOVACULAR);
        System.out.println("Blood pressure:");
        CheckForDaay(Pressure, 3, GOOD_JOB_PRESSURE);
    }
    private void CheckForDaay(int Day, int MinDay,String CONST_Output){// The check from last day to good life
        if(Day < MinDay){
            int Result = MinDay - Day;
            System.out.println(LAST_SRART + Result + LAST_FINISH);
        }
        else{
            System.out.println(CONST_Output);
        }
    }
    public void run(){
        InputTime();
    }
}
