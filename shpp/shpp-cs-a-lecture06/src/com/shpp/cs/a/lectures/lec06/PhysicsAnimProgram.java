package com.shpp.cs.a.lectures.lec06;

import acm.graphics.GOval;
import com.shpp.cs.a.graphics.WindowProgram;

import java.awt.*;

public class PhysicsAnimProgram extends WindowProgram {
    /* The size of the ball. */
    private static final double BALL_SIZE = 50;

    /* The amount of time to pause between frames (48fps). */
    private static final double PAUSE_TIME = 1000.0 / 48;

    /* The initial horizontal velocity of the ball. */
    private static final double HORIZONTAL_VELOCITY = 1.0;

    /* Gravitational acceleration. */
    private static final double GRAVITY = 0.425;

    /* Elasticity. */
    private static final double ELASTICITY = 0.75;

    public void run() {
        GOval ball = makeBall();
        add(ball);
        bounceBall(ball);
    }

    /**
     * Creates a ball that can be bounced, placing it in the upper-left corner
     * of the screen.
     *
     * @return A ball that can be bounced.
     */
    private GOval makeBall() {
        GOval ball = new GOval(0, 0, BALL_SIZE, BALL_SIZE);
        ball.setFilled(true);
        ball.setColor(Color.BLUE);
        return ball;
    }

    /**
     * Simulates a bouncing ball.
     *
     * @param ball The ball to bounce.
     */
    private void bounceBall(GOval ball) {
		/* Track the downward velocity (dy is short for "delta-y.") */
        double dy = 0;

		/* This loops forever. Maybe we should change it to stop when the
		 * ball rolls off the right side of the screen!
		 */
        while (true) {
			/* Move the ball by the current velocity. */
            ball.move(HORIZONTAL_VELOCITY, dy);

			/* Gravity pulls downward, increasing downward acceleration. */
            dy += GRAVITY;

			/* If the ball drops below the floor, we turn it around. There's
			 * a tricky case to watch out for - if the ball is already in
			 * the floor, we don't turn it around.
			 */
            if (ballBelowFloor(ball) && dy > 0 ) {
                dy *= -ELASTICITY; // 10 * -(0.5) ==> -5
            }

            pause(PAUSE_TIME);
        }
    }

    /**
     * Determines whether the ball has dropped below floor level.
     *
     * @param ball The ball to test.
     * @return Whether it's fallen below the floor.
     */
    private boolean ballBelowFloor(GOval ball) {
        return ball.getY() + ball.getHeight() >= getHeight();
    }
}
