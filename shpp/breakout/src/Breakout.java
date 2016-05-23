package com.shpp.task4.ychekan;

import acm.util.RandomGenerator;
import com.shpp.cs.a.graphics.WindowProgram;
import acm.graphics.*;
import java.awt.*;
import java.awt.event.MouseEvent;

/**
 * Created by Yurii Chekan on 22.05.2016.
 */

public class Breakout extends WindowProgram {
    /** Width and height of application window in pixels */
    public static final int APPLICATION_WIDTH = 400;
    public static final int APPLICATION_HEIGHT = 600;

    /** Dimensions of game board (usually the same) */
    private static final int WIDTH = APPLICATION_WIDTH;
    private static final int HEIGHT = APPLICATION_HEIGHT;

    /** Dimensions of the paddle */
    private static final int PADDLE_WIDTH = 60;
    private static final int PADDLE_HEIGHT = 10;

    /** Offset of the paddle up from the bottom */
    private static final int PADDLE_Y_OFFSET = 30;

    /** Number of bricks per row */
    private static final int NBRICKS_PER_ROW = 10;

    /** Number of rows of bricks */
    private static final int NBRICK_ROWS = 10;

    /** Separation between bricks */
    private static final int BRICK_SEP = 4;

    /** Width of a brick */
    private static final int BRICK_WIDTH =
            (WIDTH - (NBRICKS_PER_ROW - 1) * BRICK_SEP) / NBRICKS_PER_ROW;

    /** Height of a brick */
    private static final int BRICK_HEIGHT = 8;

    /** Radius of the ball in pixels */
    private static final int BALL_RADIUS = 10;

    /** Offset of the top brick row from the top */
    private static final int BRICK_Y_OFFSET = 70;

    /** Number of turns */
    private static final int NTURNS = 3;

    /**Ball velocity*/
    private double vx, vy;

    /** Speed ball from how in move on window */
    private static final double SPEED = 3.0;

    /** The paint in paddle*/
    private GRect paddle;

    /** Pause in game*/
    private static final int PAUSE = 5;

    /**Font for text in game*/
    private Font font(){
        Font fontToText = new Font("Courier", Font.BOLD, 30);
        return fontToText;
    }
    /** Main method for play teh game */
    public void run() {
        for(int raund = 1; raund <= NTURNS; ++raund){
            setUpGame();
            playTheGame();
            if (brickCounter == 0) {
                GameBall.setVisible(false);
                Winner();
                break;
            }
            if (brickCounter > 0) {
                removeAll();
            }
        }
        if(brickCounter > 0) {
            GameOver();
        }
    }

    /** This we paint paddle */
    private void drawPaddle() {
        /**
        * @param ParameterX = first ( default ) position in window
        * @param Default_Y = use for fixate position on axes Y, default value
        * */
        double ParameterX = getWidth() / 2 - PADDLE_WIDTH / 2;
        double Default_Y =  getHeight() - PADDLE_Y_OFFSET - PADDLE_HEIGHT;
        paddle = new GRect (ParameterX, Default_Y, PADDLE_WIDTH, PADDLE_HEIGHT);
        paddle.setFilled(true);
        add(paddle);/** Output piddle*/
        addMouseListeners();/** Attach paddle to mouse*/
    }

    /** Objects type GOval */
    private GOval GameBall;

    /** Create a ball which we will play */
    private void MyBall(){
        /**
         * Paint ball in center position
         * Color CYAN
         * */
        GameBall = new GOval(BALL_RADIUS * 2, BALL_RADIUS * 2);/** diameter = 2 * Radius*/
        GameBall.setFilled(true);
        GameBall.setColor(Color.CYAN);
        add(GameBall, (WIDTH - BALL_RADIUS) / 2, (HEIGHT - BALL_RADIUS) / 2);
    }

    /** Assign a parameter to be changed relatively moving the mouse and will manage paddle */
    public void mouseMoved(MouseEvent event) {
        /**
        * @param event.getX() - PADDLE_WIDTH / 2 = check coordinates mouse
         * and if coordinates X less from half side then stop in last left or right position
         * Paddle not go to limit on window
        * */
        if ((event.getX() < (getWidth() - PADDLE_WIDTH / 2)) && (event.getX() > PADDLE_WIDTH / 2)) {
            paddle.setLocation(event.getX() - PADDLE_WIDTH / 2, getHeight() - PADDLE_Y_OFFSET - PADDLE_HEIGHT);
        }
    }

    /**Parameters brick */
    private void Paddle(Color color, int X, int Y){
        /** Paint brick*/
        paddle = new GRect(BRICK_WIDTH, BRICK_HEIGHT);
        paddle.setFilled(true);
        paddle.setColor(color);
        add(paddle, X, Y);
    }

    private void LineBricks() {
        /**
         * This method use parameter BRICK_WIDTH & BRICK_HEIGHT for build brick!
         * @param coordinates X = i * (BRICK_SEP + BRICK_WIDTH) + BRICK_SEP / 2 - coordinates X for brick,
         *          where i step of brick from axis X
         *          BRICK_SEP / 2 - first step in left border
         *          (BRICK_SEP + BRICK_WIDTH) - new step for building brick
         * @param coordinates Y = BRICK_Y_OFFSET + j * (BRICK_HEIGHT + BRICK_SEP)
         *           BRICK_Y_OFFSET - first step from up border
         *           j * (BRICK_HEIGHT + BRICK_SEP) - new steps fron building brickS
         **/
        for (int j = 0; j < NBRICK_ROWS; ++j) {
            for (int i = 0; i < NBRICKS_PER_ROW; ++i) {
                Color color = new Color(i * 20, j * 20, i * j);
                Paddle(color, i * (BRICK_SEP + BRICK_WIDTH) + BRICK_SEP / 2, BRICK_Y_OFFSET + j * (BRICK_HEIGHT + BRICK_SEP));
            }
        }
    }

    /** The get in vector for move ball on game*/
    private void getBallVelocity() {
        /** Random search value for position ball */
        RandomGenerator rgen = RandomGenerator.getInstance();
        vx = rgen.nextDouble(1.0, 3.0);
        if (rgen.nextBoolean(0.5)){
            vx =- vx;
        }
        vy = SPEED;
    }

    /** Count brick for game */
    private int brickCounter = NBRICK_ROWS * NBRICKS_PER_ROW;

    /** Move ball in game */
    private void moveBall() {
        /** Ball move in coordinate vx and vy, this move result break out from paddle or wall */
        GameBall.move(vx, vy);
        /** Check coordinate ball and wall. If shi closest to 0 then move turn out side */
        if ((GameBall.getX() - vx <= 0 && vx < 0 ) || (GameBall.getX() + vx >= (getWidth() - BALL_RADIUS * 2) && vx > 0)) {
            vx =- vx;
        }
        /** Check of axes Y  */
        if ((GameBall.getY() - vy <= 0 && vy < 0)) {
            vy =- vy;
        }
        /** Check for other object */
        GObject collider = getCollidingObject();
        if (collider == paddle) {

            if(GameBall.getY() >= getHeight() - PADDLE_Y_OFFSET - PADDLE_HEIGHT - BALL_RADIUS * 2
                    && GameBall.getY() < getHeight() - PADDLE_Y_OFFSET - PADDLE_HEIGHT - BALL_RADIUS * 2 + 4) {
                vy =- vy;
            }
        }
        else if (collider != null) {
            remove(collider);
            --brickCounter;
            vy =- vy;
        }
        pause(PAUSE);
    }

    /**This method for  */
    private GObject getCollidingObject() {
        if((getElementAt(GameBall.getX(), GameBall.getY())) != null) {
            return getElementAt(GameBall.getX(), GameBall.getY());
        }
        else if (getElementAt( (GameBall.getX() + BALL_RADIUS * 2), GameBall.getY()) != null ){
            return getElementAt(GameBall.getX() + BALL_RADIUS * 2, GameBall.getY());
        }
        else if(getElementAt(GameBall.getX(), (GameBall.getY() + BALL_RADIUS * 2)) != null ){
            return getElementAt(GameBall.getX(), GameBall.getY() + BALL_RADIUS * 2);
        }
        else if(getElementAt((GameBall.getX() + BALL_RADIUS * 2), (GameBall.getY() + BALL_RADIUS * 2)) != null ){
            return getElementAt(GameBall.getX() + BALL_RADIUS * 2, GameBall.getY() + BALL_RADIUS * 2);
        }
        /** Return null if there object no present, default value */
            else{
            return null;
        }
    }

    /** This method paint on main objects in window */
    private void setUpGame(){
        LineBricks();
        drawPaddle();
        MyBall();
    }

    /** Method for move game  */
    private void playTheGame(){
        waitForClick();
        getBallVelocity();
        while(true){
            moveBall();
            if(GameBall.getY() >= getHeight()) {
                brickCounter = NBRICK_ROWS * NBRICKS_PER_ROW;
                break;
            }
            if(brickCounter == 0){
                break;
            }
        }
    }

    /** Objects type GLabel */
    private GLabel text;

    /** Print messing for winner users */
    private void Winner(){
        text = new GLabel("Your WINNER :)", getWidth() / 2, getHeight() / 2);
        text.setFont(font());
        text.move(- text.getWidth() / 2, - text.getHeight());
        text.setColor(Color.RED);
        add(text);
    }

    /** Print messing for game over */
    private void GameOver(){
        text = new GLabel("Game Over :(", getWidth() / 2, getHeight() / 2);
        text.setFont(font());
        text.move( - text.getWidth() / 2, - text.getHeight());
        text.setColor(Color.RED);
        add(text);
    }
}