package com.shpp.cs.Task2.ychekan;

import acm.graphics.*;
import java.awt.*;
import com.shpp.cs.a.graphics.WindowProgram;
public class Assignment2Part5 extends WindowProgram{
    /* The number of rows and columns in the grid, respectively. */
    private static final int NUM_ROWS = 4;
    private static final int NUM_COLS = 4;
    /* The width and height of each box. */
    private static final double BOX_SIZE = 40;
    public static final int APPLICATION_WIDTH = 350;
    public static final int APPLICATION_HEIGHT = 350;
    /* The horizontal and vertical spacing between the boxes. */
    private static final double BOX_SPACING = 10;
    public void BuildBox(int ArgBox, int Arg){// Building one line box
        GRect rect = new GRect(ArgBox * (BOX_SIZE + BOX_SPACING) + BOX_SIZE / 2, Arg * (BOX_SIZE + BOX_SPACING) + BOX_SIZE / 2, BOX_SIZE, BOX_SIZE);
        rect.setFilled(true);
        rect.setColor(Color.BLACK);
        add(rect);
    }
    public void run() {
        for(int j = 0; j < NUM_ROWS; ++j) {
            for (int i = 0; i < NUM_COLS; ++i) {
                BuildBox(i, j);
            }
        }
    }
}