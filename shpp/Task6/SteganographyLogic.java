package com.shpp.task6.ychekan;

import acm.graphics.GImage;

/**
 * Created by ret284 on 05.06.2016.
 */

public class SteganographyLogic {
    /**
     * Given a GImage containing a hidden message, finds the hidden message
     * contained within it and returns a boolean array containing that message.
     * <p>
     * A message has been hidden in the input image as follows. For each pixel
     * in the image, if that pixel has a red component that is an even number,
     * the message value at that pixel is false. If the red component is an odd
     * number, the message value at that pixel is true.
     *
     * @param source The image containing the hidden message.
     * @return The hidden message, expressed as a boolean array.
     */
    public static boolean[][] findMessage(GImage source) {
        int[][] pixels = source.getPixelArray();
        boolean[][] result = new boolean[pixels.length][pixels[0].length];
        for (int rows = 0; rows < pixels.length; ++rows) {
            for (int cols = 0; cols < pixels[rows].length; ++cols) {
                int colorRed = GImage.getRed(pixels[rows][cols]);
                result[rows][cols] = (colorRed % 2 != 0) ? true : false;
            }
        }
        return result;
    }

    /**
     * Hides the given message inside the specified image.
     * <p>
     * The image will be given to you as a GImage of some size, and the message
     * will be specified as a boolean array of pixels, where each white pixel is
     * denoted false and each black pixel is denoted true.
     * <p>
     * The message should be hidden in the image by adjusting the red channel of
     * all the pixels in the original image. For each pixel in the original
     * image, you should make the red channel an even number if the message
     * color is white at that position, and odd otherwise.
     * <p>
     * You can assume that the dimensions of the message and the image are the
     * same.
     * <p>
     *
     * @param message The message to hide.
     * @param source  The source image.
     * @return A GImage whose pixels have the message hidden within it.
     */
    public static GImage hideMessage(boolean[][] message, GImage source) {
        int[][] pixels = source.getPixelArray();
        for (int rows = 0; rows < pixels.length; ++rows) {
            for (int cols = 0; cols < pixels[rows].length; ++cols) {
                /** Get up color value in rows and cols */
                int colorGreen = GImage.getGreen(pixels[rows][cols]);
                int colorBlue = GImage.getBlue(pixels[rows][cols]);
                int colorRed = GImage.getRed(pixels[rows][cols]);
                /** Change red color */
                if (message[rows][cols])
                    changeRed(colorRed);
                /** Set new parameters RGB */
                pixels[rows][cols] = GImage.createRGBPixel(colorRed, colorGreen, colorBlue);
            }
        }
        return new GImage(pixels);
    }

    /**
     * Method for to increase by one red color
     */
    private static int changeRed(int colorRed) {
        colorRed = (colorRed % 2 != 0) ? colorRed - 1: colorRed + 1;
        return colorRed;
    }
}

