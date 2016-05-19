package com.shpp.task3.ychekan;

import acm.graphics.*;
import com.shpp.cs.a.graphics.WindowProgram;
import java.awt.*;

public class Assignment3Part6 extends WindowProgram {
    private static final double DELTA_X = 156;
    private static final double DELTA_Y = 2;
    private static final double PAUSE_TIME = 1000;
    public void run(){
        GRect Tees = new GRect(28, 40, 10, 25);
        Tees.setFilled(true);
        Tees.setColor(Color.BLACK);
        add(Tees);

        GRect Nosse = new GRect(28, 40, 10, 25);
        Nosse.setFilled(true);
        Nosse.setColor(Color.BLACK);
        add(Nosse);

        GArc lineFace = new GArc(224, 224, 209, 292);
        lineFace.setFilled(true);
        lineFace.setColor(Color.BLACK);
        add(lineFace, 0, 0);

        GArc lineCenter = new GArc(220, 220, 210, 290);
        lineCenter.setFilled(true);
        lineCenter.setColor(Color.YELLOW);
        add(lineCenter, 2, 2);

        GOval ovalEasy = new GOval(80, 30, 20, 20);
        ovalEasy.setFilled(true);
        ovalEasy.setColor(Color.RED);
        add(ovalEasy);
        for(int i = 5; i >= 0; --i){
            Tees.move(DELTA_X, DELTA_Y);
            Nosse.move(DELTA_X, DELTA_Y);
            lineFace.move(DELTA_X, DELTA_Y);
            lineCenter.move(DELTA_X, DELTA_Y);
            ovalEasy.move(DELTA_X, DELTA_Y);
            pause(PAUSE_TIME);
            if (i <= 2) {
                GLabel StringDisplay = new GLabel("Be happy, tech Java :)", getWidth() / 8, getHeight() - getHeight() / 2);
                StringDisplay.setFont("LONDON-50");
                StringDisplay.setColor(Color.RED);
                add(StringDisplay);
            }
        }
    }
}