package com.shpp.task4.ychekan;

import acm.util.RandomGenerator;
import com.shpp.cs.a.graphics.WindowProgram;
import acm.graphics.*;

import java.awt.*;
import java.awt.event.MouseEvent;

/**
 * Created by ret284 on 22.05.2016. edition 29.06.2016
 */

public class Breakout extends WindowProgram {

    /**
     * Width and height of application window in pixels
     */
    public static final int APPLICATION_WIDTH = 400;
    public static final int APPLICATION_HEIGHT = 600;

    /**
     * Dimensions of game board (usually the same)
     */
    private static final int WIDTH = APPLICATION_WIDTH;
    private static final int HEIGHT = APPLICATION_HEIGHT;

    /**
     * Dimensions of the paddle
     */
    private static final int PADDLE_WIDTH = 60;
    private static final int PADDLE_HEIGHT = 10;

    /**
     * Displacement from the bottom of the paddle
     */
    private static final int PADDLE_Y_OFFSET = 30;

    /**
     * Number of bricks per row
     */
    private static final int NBRICKS_PER_ROW = 5;

    /**
     * Number of rows
     */
    private static final int NBRICK_ROWS = 10;

    /**
     * Separation between bricks
     */
    private static final int BRICK_SEP = 4;

    /**
     * Width of a brick
     */
    private static final int BRICK_WIDTH =
            (WIDTH - (NBRICKS_PER_ROW - 1) * BRICK_SEP) / NBRICKS_PER_ROW;

    /**
     * Height of a brick
     */
    private static final int BRICK_HEIGHT = 8;

    /**
     * Radius of the ball in pixels
     */
    private static final int BALL_RADIUS = 10;

    /**
     * Diameter ball
     */
    private static final int BALL_RADIUS_DUBLE = BALL_RADIUS * 2;

    /**
     * Displacement of the first row of bricks from the top
     */
    private static final int BRICK_Y_OFFSET = 70;

    /**
     * Number of turns
     */
    private static final int NUM_TURNS = 3;

    /**
     * The range of values for a random function
     */
    private static final double MIN_RANGE_RANDOM = 1.0;
    private static final double MAX_RANGE_RANDOM = 3.0;

    /**
     * Speed ball from how in move on window
     */
    private static final double SPEED = 3.0;

    /**
     * Pause in game
     */
    private static final int PAUSE = 5;

    /**
     * Speed the ball
     */
    private double vx, vy;

    /**
     * The draw in paddle
     */
    private GRect paddle;

    /**
     * For the construction of the ball
     */
    private GOval ball;

    /**
     * Count brick for game
     */
    private int countBricks = NBRICK_ROWS * NBRICKS_PER_ROW;

    /**
     * Main method for play teh game
     */
    public void run() {
        drawBrick();
        drawPaddle();
        for (int raundGame = 0; raundGame < NUM_TURNS; ++raundGame) {
            drawBall();
            playTheGame();
            if (countBricks == 0) {
                ball.setVisible(false);
                break;
            }
        }
        removeAll();
        if (countBricks == 0)
            sendMesseg("You win :)");
        if (countBricks > 0)
            sendMesseg("Sorry! Game Over :(");
    }

    /**
     * This method use parameter BRICK_WIDTH & BRICK_HEIGHT for draw bricks
     **/
    private void drawBrick() {
        for (int j = 0; j < NBRICK_ROWS; ++j) {
            for (int i = 0; i < NBRICKS_PER_ROW; ++i) {
                Color color = new Color(i * 15, j * 15, i * j);
                /**
                 * Colors vary depending on the number
                 * */
                drawPaddle(color, i * (BRICK_SEP + BRICK_WIDTH) + BRICK_SEP / 2, BRICK_Y_OFFSET + j * (BRICK_HEIGHT + BRICK_SEP));
            }
        }
    }

    /**
     * Drawing paddle
     */
    private void drawPaddle() {
        /**
         * @param parameterX = first ( default ) position in window
         * @param defaultY = use for fixate position on axes Y, default value
         * */
        double parameterX = (getWidth() - PADDLE_WIDTH) / 2;
        double defaultY = getHeight() - PADDLE_Y_OFFSET - PADDLE_HEIGHT;
        paddle = new GRect(parameterX, defaultY, PADDLE_WIDTH, PADDLE_HEIGHT);
        paddle.setFilled(true);
        add(paddle);
        addMouseListeners();
    }

    /**
     * Drawing ball
     */
    private void drawBall() {
        /**
         * Paint ball in center display
         * Color CYAN
         * */
        ball = new GOval(BALL_RADIUS_DUBLE, BALL_RADIUS_DUBLE);
        ball.setFilled(true);
        ball.setColor(Color.CYAN);
        add(ball, (WIDTH - BALL_RADIUS) / 2, (HEIGHT - BALL_RADIUS) / 2);
    }

    /**
     * Drawing brick
     */
    private void drawPaddle(Color color, int inputX, int inputY) {
        paddle = new GRect(BRICK_WIDTH, BRICK_HEIGHT);
        paddle.setFilled(true);
        paddle.setColor(color);
        add(paddle, inputX, inputY);
    }

    /**
     * Assign a parameter to be changed relatively moving the mouse and will manage paddle
     */
    public void mouseMoved(MouseEvent event) {
        /**
         * @param event.getX() - PADDLE_WIDTH / 2 = check coordinates mouse
         * and if coordinates X less from half side then stop in last left or right position
         * Paddle not go to limit on window
         * */
        if ((event.getX() < (getWidth() - PADDLE_WIDTH / 2)) && (event.getX() > PADDLE_WIDTH / 2))
            paddle.setLocation(event.getX() - PADDLE_WIDTH / 2, getHeight() - PADDLE_Y_OFFSET - PADDLE_HEIGHT);
    }

    /**
     * The get in vector for move ball on game
     */
    private void getBallVelocity() {
        RandomGenerator rgen = RandomGenerator.getInstance();
        vx = rgen.nextDouble(MIN_RANGE_RANDOM, MAX_RANGE_RANDOM);
        vy = SPEED ;
    }

    /**
     * Move ball in game
     */
    private void moveBall() {
        /** Ball move in coordinate vx and vy, this move result break out from paddle or wall */
        ball.move(vx, vy);
        /** Check coordinate ball and wall. If she closest to 0 then move turn out side */
        if (ball.getX() - vx <= 0 && vx < 0 || ball.getX() + vx >= (getWidth() - BALL_RADIUS * 2) && vx > 0)
            vx = -vx;
        /** Check of axes Y  */
        if ((ball.getY() - vy <= 0 && vy < 0))
            vy = -vy;
        /** Check for other object */
        GObject collider = getCollidingObject();
        if (collider == paddle) {
            if (ball.getY() >= getHeight() - PADDLE_Y_OFFSET - PADDLE_HEIGHT - BALL_RADIUS * 2
                    && ball.getY() < getHeight() - PADDLE_Y_OFFSET - PADDLE_HEIGHT - BALL_RADIUS / 2)
                vy = -vy;
        } else if (collider != null) {
            remove(collider);
            --countBricks;
            vy = -vy;
        }
        pause(PAUSE);
    }

    /**
     * The check four points of the ball  for colliding with any objects
     */
    private GObject getCollidingObject() {
        double ballX = ball.getX();
        double ballY = ball.getY();
        if ((getElementAt(ballX, ballY)) != null)
            return getElementAt(ballX, ballY);
        else if (getElementAt((ballX + BALL_RADIUS_DUBLE), ballY) != null)
            return getElementAt(ballX + BALL_RADIUS_DUBLE, ballY);
        else if (getElementAt(ballX, (ballY + BALL_RADIUS_DUBLE)) != null)
            return getElementAt(ballX, ballY + BALL_RADIUS_DUBLE);
        else if (getElementAt((ballX + BALL_RADIUS_DUBLE), (ballY + BALL_RADIUS_DUBLE)) != null)
            return getElementAt(ballX + BALL_RADIUS_DUBLE, ballY + BALL_RADIUS_DUBLE);
        /** Return null if there object no present, default value */
        else
            return null;
    }

    /**
     * Method for move game
     */
    private void playTheGame() {
        waitForClick();
        getBallVelocity();
        while (true) {
            moveBall();
            if (ball.getY() > getHeight())
                break;
            if (countBricks == 0)
                break;
        }
    }

    /**
     * Print messing for winner users
     */
    private void sendMesseg(String message) {
        GLabel text = new GLabel(message, getWidth() / 2, getHeight() / 2);
        text.setFont(font());
        text.move(-text.getWidth() / 2, -text.getHeight());
        text.setColor(Color.RED);
        add(text);
    }

    /**
     * Font for text in game
     */
    private Font font() {
        Font fontToText = new Font("Courier", Font.BOLD, 30);
        return fontToText;
    }
}
