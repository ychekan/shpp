package com.shpp.cs.assignments.arrays.hg;

public class HistogramEqualizationLogic {
    private static final int MAX_LUMINANCE = 255;

    /**
     * Given the luminances of the pixels in an image, returns a histogram of the frequencies of
     * those luminances.
     * <p/>
     * You can assume that pixel luminances range from 0 to MAX_LUMINANCE, inclusive.
     *
     * @param luminances The luminances in the picture.
     * @return A histogram of those luminances.
     */
    public static int[] histogramFor(int[][] luminances) {
        /** For pixel luminance range */
        int[] result = new int[MAX_LUMINANCE + 1];
        /** Cycle for incrementing value */
        for (int rows = 0; rows < luminances.length; ++rows)
            for (int cols = 0; cols < luminances[rows].length; ++cols)
                ++result[luminances[rows][cols]];
        return result;
    }

    /**
     * Given a histogram of the luminances in an image, returns an array of the cumulative
     * frequencies of that image.  Each entry of this array should be equal to the sum of all
     * the array entries up to and including its index in the input histogram array.
     * <p/>
     * For example, given the array [1, 2, 3, 4, 5], the result should be [1, 3, 6, 10, 15].
     *
     * @param histogram The input histogram.
     * @return The cumulative frequency array.
     */
    public static int[] cumulativeSumFor(int[] histogram) {
        /** For to store sum of all early value in the array */
        int resultSumAllElements = 0;
        /** Array to save frequency */
        int[] arrFrequency = new int[histogram.length];
        /** Cycle for output value frequency */
        for (int i = 0; i < histogram.length; ++i) {
            resultSumAllElements += histogram[i];
            arrFrequency[i] = resultSumAllElements;
        }
        return arrFrequency;
    }

    /**
     * Returns the total number of pixels in the given image.
     *
     * @param luminances A matrix of the luminances within an image.
     * @return The total number of pixels in that image.
     */
    public static int totalPixelsIn(int[][] luminances) {
        return luminances.length * luminances[0].length;
    }

    /**
     * Applies the histogram equalization algorithm to the given image, represented by a matrix
     * of its luminances.
     * <p/>
     * You are strongly encouraged to use the three methods you have implemented above in order to
     * implement this method.
     *
     * @param luminances The luminances of the input image.
     * @return The luminances of the image formed by applying histogram equalization.
     */
    public static int[][] equalize(int[][] luminances) {
        /** Array to store luminance of the image formed by using histogram compensation */
        int[][] newLuminances = new int[luminances.length][luminances[0].length];
        /** For save histogram of luminance  */
        int[] histgramForLum = histogramFor(luminances);
        /** Array for save cumulative frequency */
        int[] cumulativeFr = cumulativeSumFor(histgramForLum);
        /** For overall count of pixels in that image */
        int totalPixelsInLuminances = totalPixelsIn(luminances);
        /** Cycle  */
        for (int rows = 0; rows < luminances.length; ++rows)
            for (int cols = 0; cols < luminances[rows].length; ++cols) {
                newLuminances[rows][cols] = MAX_LUMINANCE * cumulativeFr[luminances[rows][cols]] / totalPixelsInLuminances;
            }
        return newLuminances;
    }
}
