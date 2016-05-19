package com.shpp.ychekan;

import com.shpp.karel.KarelTheRobot;

public class Assignment1Part1 extends KarelTheRobot{
    public void run() throws Exception{//This script for key-step
        while(notFacingSouth()){//return for move in page down
            turnLeft();
        }
        move();
        turnLeft();//turn for exit face
        while(noBeepersPresent()){//go to straight way
            move();
        }
        takeBeeper();
    }
    public void takeBeeper() throws Exception{// Take up newspaper to hand Karel
        pickBeeper();
        homeWay();
    }
    public void homeWay() throws Exception{//Return to start position
        while(notFacingWest()){
            turnLeft();
        }
        while(frontIsClear()){
            move();
        }
        while(leftIsClear()){
            turnLeft();
        }
        move();
    }
}