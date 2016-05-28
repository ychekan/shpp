package com.shpp.ychekan;

import com.shpp.karel.KarelTheRobot;

public class Assignment1Part2 extends KarelTheRobot{
    public void run() throws Exception{// Step from check colon
        turnLeft();
        checkBeeperColon();
        NextColon();
    }
    public void turnAround() throws Exception{// Turn to 180 Deg
        turnLeft();
        turnLeft();
    }
    public void buildColonInBeeper() throws Exception{
        while(frontIsClear()){// check to present beeper in this colon
            if(beepersPresent()){
                move();
                if(noBeepersPresent()){
                    checkPresentBeeper();
                }
            } else {
                move();
            }
        }
    }
    public void checkBeeperColon() throws Exception{// check to step on step
        buildColonInBeeper();
        turnAround();
        buildColonInBeeper();
    }
    public void checkPresentBeeper() throws Exception{ // If empty, to page down beeper
        putBeeper();
    }
    public void NextColon() throws Exception{// Back to start positoin and go to next colon
        if(frontIsBlocked()){// For Karel return to building colon
            if(leftIsClear()){// This is to moment beeper go to East-South position
                turnLeft();
                move();
                run();
            }
        }
    }
}

