package com.shpp.cs.Task2.ychekan;

import acm.graphics.*;
import java.awt.*;
import com.shpp.cs.a.graphics.WindowProgram;

public class Assignment2Part4 extends WindowProgram {
    public static final double APPLICATION_WIDTH = 300;
    public static final double APPLICATION_HEIGHT = 300;
    private static final int FLAG_POSITION = 0;// The marker for 0 - horizontal, 1 - vertical flag
    private static final Color CARDINAL_FIRST = new Color(196, 30, 58);// Color first line
    private static final Color CARDINAL_SECOND = new Color(12, 155, 10);// Color second line
    private static final Color CARDINAL_THIRD = new Color(20, 15, 196);// Color third line
    private static final GLabel NAME_COUNTRY = new GLabel("Flag of Belgiym");
    public void LineInFlag(int i, Color colors){// Paint to line in flag! i- this is coefficient line position
        double xSize = APPLICATION_WIDTH / 5.0;
        double ySize = APPLICATION_HEIGHT / 5.0;
        if (FLAG_POSITION == 1) {
            double Xsize = xSize;
            double Ysize = getHeight() - ySize;
            GRect rectFirst = new GRect(i * xSize, ySize / 2, Xsize, Ysize);
            rectFirst.setFilled(true);
            rectFirst.setColor(colors);
            add(rectFirst);
        }
        else{
            double Xsize = APPLICATION_WIDTH - xSize;
            double Ysize = ySize;
            GRect rectFirst = new GRect(xSize / 2, i * ySize, Xsize, Ysize);
            rectFirst.setFilled(true);
            rectFirst.setColor(colors);
            add(rectFirst);
        }
    }
    public void TextToFlag(){// For output name is country
        double sizeW = getWidth();
        double sizeH = getHeight();
        add(NAME_COUNTRY, APPLICATION_WIDTH - APPLICATION_WIDTH / 10, APPLICATION_HEIGHT - APPLICATION_HEIGHT / 20);
        System.out.print( sizeW + "dfg " + sizeH);

    }
    public void run() {
        LineInFlag(1, CARDINAL_FIRST);
        LineInFlag(2, CARDINAL_SECOND);
        LineInFlag(3, CARDINAL_THIRD);
        TextToFlag();

    }
}
