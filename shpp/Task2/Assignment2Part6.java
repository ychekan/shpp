package com.shpp.cs.Task2.ychekan;

import acm.graphics.*;
import java.awt.*;
import com.shpp.cs.a.graphics.WindowProgram;

public class Assignment2Part6 extends WindowProgram{
    // The parameter window programs
    public static final int APPLICATION_WIDTH = 770;
    public static final int APPLICATION_HEIGHT = 300;
    // Color round
    private static final Color COLOR_ROUND = new Color(0, 254, 15);
    // Color border
    private static final Color COLOR_BORDER = new Color(200, 8, 15);
    //Size border
    private static final double SIZE_BORDER = 2;
    // Radius round
    private static final double RADIUS_ROUND = 100;
    public void BuildRound(double x, double y){
        // The paint border for round
        GOval BorderRound = new GOval(x, y, 2 * (RADIUS_ROUND + SIZE_BORDER), 2 * (RADIUS_ROUND + SIZE_BORDER));
        BorderRound.setFilled(true);
        BorderRound.setColor(COLOR_BORDER);
        add(BorderRound);
        // The paint main round
        GOval oval = new GOval(x + SIZE_BORDER, y + SIZE_BORDER, 2 * RADIUS_ROUND, 2 * RADIUS_ROUND);
        oval.setFilled(true);
        oval.setColor(COLOR_ROUND);
        add(oval);
    }
    public void run(){// Main method for run program
        for(int i = 0; i < 3; ++i) {
            BuildRound(i * (2 * RADIUS_ROUND + RADIUS_ROUND / 4), RADIUS_ROUND / 2);
            BuildRound(i * (2 * RADIUS_ROUND + RADIUS_ROUND / 4) + RADIUS_ROUND, 0);
        }
    }
}
