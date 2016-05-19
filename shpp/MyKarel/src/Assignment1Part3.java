package com.shpp.ychekan;

import com.shpp.karel.KarelTheRobot;

public class Assignment1Part3 extends KarelTheRobot{
    public void turnAround() throws Exception{// Turn of 180 deg
        turnLeft();
        turnLeft();
    }
    public void run() throws Exception{//
        putBeeper();// Put down one beeper in first case
        while(frontIsClear()){// Go to over side
            move();
        }
        putBeeper();// Put beeper in last case
        turnAround();
        while(beepersPresent()){
            RoundGo();
        }
    }
    public void RoundGo() throws Exception{// Pick and put down beeper for find center
            move();
            while(noBeepersPresent()){// His need for beeper move in empty case of left & right side
                move();
            }
            pickBeeper();
            turnAround();
            move();
            if(noBeepersPresent()){// Check to show beeper this case, need for not put down 2 beeper & correct finish
                putBeeper();
            }
            else{
                move();
            }
    }
}