package com.shpp.ychekan;

import com.shpp.karel.KarelTheRobot;

public class Assignment1Part4 extends KarelTheRobot {
    public void turnRight() throws Exception{//This is method to need for turn right
        turnLeft();
        turnLeft();
        turnLeft();
    }
    public void checkToEndSide() throws Exception{
        if(facingEast()){// choise side the turn left
            if(leftIsClear()){
                turnLeft();
                if(frontIsClear()){// if left-side not is blocked, then to go one strep
                    move();
                    turnLeft();
                }
            }
            if(leftIsBlocked()){ // for finish
                turnRight();
                move();
            }
        }
        else {
            if(rightIsClear()){
                turnRight();
                if (frontIsClear()){
                    move();
                    turnRight();
                }
            }
            if(rightIsBlocked()){
                turnLeft();
                move();
            }
        }
    }
    public void Step() throws Exception{ //One step and check for turn left or right side
        if(frontIsClear()){
            move();
        }
        else{
            checkToEndSide();
        }
    }
    public void run() throws Exception{//Go to world for check and put down beeper
        while(noBeepersPresent()){
            putBeeper();
            Step();
            Step();
        }
    }
}