package com.shpp.cs.Task2.ychekan;

import acm.graphics.*;
import java.awt.*;
import com.shpp.cs.a.graphics.WindowProgram;

public class Assignment2Part2 extends WindowProgram {
    public static final int APPLICATION_WIDTH = 100;
    public static final int APPLICATION_HEIGHT = 100;
    private void PaintOval(int x, int y, int Width, int Height){// Paint four round in corners? black color
        GOval OvalPaint = new GOval(x, y, Width, Height);
        OvalPaint.setFilled(true);
        OvalPaint.setColor(Color.BLACK);
        add(OvalPaint);
    }
    private void PaintRect(int xPosition, int yPosition){// Paint square, white color
        GRect rect = new GRect((xPosition / 2), (yPosition / 2), 2 * xPosition, 2 * yPosition);
        rect.setFilled(true);
        rect.setColor(Color.WHITE);
        add(rect);
    }
    public void run() {// Building in overall image
        int xPosition = getWidth()/3;
        int yPosition = getHeight()/3;
        PaintOval(0, 0, xPosition, yPosition);
        PaintOval(0, 2 * yPosition, xPosition, yPosition);
        PaintOval(2 * xPosition, 0, xPosition, yPosition);
        PaintOval(2 * xPosition, 2 * yPosition, xPosition, yPosition);
        PaintRect(xPosition, yPosition);
    }
}