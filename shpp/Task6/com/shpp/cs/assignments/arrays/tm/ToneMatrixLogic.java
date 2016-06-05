package com.shpp.cs.assignments.arrays.tm;

public class ToneMatrixLogic {

    /**
     * Given the contents of the tone matrix, returns a string of notes that should be played
     * to represent that matrix.
     *
     * @param toneMatrix The contents of the tone matrix.
     * @param column     The column number that is currently being played.
     * @param samples    The sound samples associated with each row.
     * @return A sound sample corresponding to all notes currently being played.
     */
    public static double[] matrixToMusic(boolean[][] toneMatrix, int column, double[][] samples) {
        /**  The array to store result tone flow. */
        double[] result = new double[ToneMatrixConstants.sampleSize()];
        for (int rows = 0; rows < toneMatrix.length; ++rows) {
            if (toneMatrix[rows][column])
                for (int i = 0; i < samples[rows].length; ++i)
                    result[i] += samples[rows][i];
        }
        return normalizeVolume(result);
    }

    private static double[] normalizeVolume(double[] inputArr) {
        double maxElement = getMaxElement(inputArr);
        /** Normalize the values of tonality */
        if (maxElement != 0) {
            for (int i = 0; i < inputArr.length; ++i) {
                inputArr[i] /= maxElement;
            }
            return inputArr;
        } else
            return inputArr;
    }

    private static double getMaxElement(double[] maxArr) {
        /** We are looking for the maximum value of the array */
        double maxElement = Math.abs(maxArr[0]);
        for (int i = 1; i < maxArr.length; ++i) {
            maxElement = (Math.abs(maxArr[i]) > maxElement) ? Math.abs(maxArr[i]) : maxElement;
        }
        return maxElement;
    }
}
