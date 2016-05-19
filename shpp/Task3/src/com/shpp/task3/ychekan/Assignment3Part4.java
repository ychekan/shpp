package com.shpp.task3.ychekan;

import acm.graphics.GRect;
import com.shpp.cs.a.graphics.WindowProgram;
import java.awt.*;

public class Assignment3Part4 extends WindowProgram{
    private static final double BRICK_HEIGHT = 20;// Height block for building
    private static final double BRICK_WIDTH = 20;// Width block for building
    private static final int BRICKS_IN_BASE = 10;// Base in page down
    private static final int INSIDE_WIDTH = 2;// Width border block
    private void Block(int IndexX, int IndexY){
        double xParameter = (getWidth() - IndexY * BRICK_WIDTH) / 2 + IndexX * BRICK_WIDTH;
        double yParameter = getHeight() - (BRICKS_IN_BASE -  IndexY + 1)* BRICK_HEIGHT;
        /**
        * This parameters count X and Y coordinates
        *
        * */
        // The build border for block
        GRect rectPiramida = new GRect(xParameter, yParameter, BRICK_WIDTH, BRICK_HEIGHT);
        rectPiramida.setFilled(true);
        rectPiramida.setColor(Color.BLACK);
        add(rectPiramida);
        // The build center for block
        GRect rectPiramidaInside = new GRect(xParameter + INSIDE_WIDTH, yParameter + INSIDE_WIDTH, BRICK_WIDTH - 2 * INSIDE_WIDTH, BRICK_HEIGHT - 2 * INSIDE_WIDTH);
        rectPiramidaInside.setFilled(true);
        rectPiramidaInside.setColor(Color.WHITE);
        add(rectPiramidaInside);
    }
    public void run(){
        for(int i = 1; i <= BRICKS_IN_BASE; ++i){
            for(int j = 1; j <= i; ++j){
                Block(j, i);
            }
            System.out.println("");
        }
    }
}
