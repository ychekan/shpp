package com.shpp.task3.ychekan;

import com.shpp.cs.a.console.TextProgram;

public class Assignment3Part5 extends TextProgram{
    public void run(){
        int MoneyLuser = 1;
        int MoneyLucky = 0;
        int countGame = 0;
        int result = 0;
        while(MoneyLucky <= 20){
            System.out.println("This game, you earned $" + MoneyLuser);
            System.out.println("Your total is " + (MoneyLuser + MoneyLucky));
            double Chois = Math.random() * 2;
            result = MoneyLucky + MoneyLuser; // Over result games
            countGame++;// The count for game pieces
            if(Chois < 1){
                MoneyLuser *= 2;
            }

            else if(Chois > 1){
                MoneyLucky += MoneyLuser;
            }
        }
        System.out.println("It took " + countGame + " games to earn " + result);
    }
}
