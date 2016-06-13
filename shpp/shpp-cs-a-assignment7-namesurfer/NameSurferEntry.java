package com.shpp.cs.namesurfer;

/*
 * File: NameSurferEntry.java
 * --------------------------
 * This class represents a single entry in the database.  Each
 * NameSurferEntry contains a name and a list giving the popularity
 * of that name for each decade stretching back to 1900.
 */

public class NameSurferEntry implements com.shpp.cs.namesurfer.NameSurferConstants {
    private String name = null;
    private int[] arrRange = new int[NDECADES];

	/* Constructor: NameSurferEntry(line) */

    /**
     * Creates a new NameSurferEntry from a data line as it appears
     * in the data file.  Each line begins with the name, which is
     * followed by integers giving the rank of that name for each
     * decade.
     */
    public NameSurferEntry(String line) {
        String[] splitedLine = line.split(" ");
        name = splitedLine[0];
        for (int i = 1; i < splitedLine.length; i++)
            arrRange[i - 1] = Integer.parseInt(splitedLine[i]);
    }

    /**
     * Returns the name associated with this entry.
     */
    public String getName() {
        return name;
    }

    /**
     * Returns the rank associated with an entry for a particular
     * decade.  The decade value is an integer indicating how many
     * decades have passed since the first year in the database,
     * which is given by the constant START_DECADE.  If a name does
     * not appear in a decade, the rank value is 0.
     */
    public int getRank(int decade) {
        return arrRange[decade];
    }

    /**
     * Returns a string that makes it easy to see the value of a
     * NameSurferEntry.
     */
    public String toString() {
        String result = "";
        for (int value : arrRange)
            result += value;
        return name + "[" + result + "]";
    }
}

