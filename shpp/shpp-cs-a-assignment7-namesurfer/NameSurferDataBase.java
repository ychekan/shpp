package com.shpp.cs.namesurfer;

/*
 * File: NameSurferDataBase.java
 * -----------------------------
 * This class keeps track of the complete database of names.
 * The constructor reads in the database from a file, and
 * the only public method makes it possible to look up a
 * name and get back the corresponding NameSurferEntry.
 * Names are matched independent of case, so that "Eric"
 * and "ERIC" are the same names.
 */

import java.io.File;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Scanner;

public class NameSurferDataBase implements com.shpp.cs.namesurfer.NameSurferConstants {
    private ArrayList<NameSurferEntry> list = new ArrayList<>();

	/* Constructor: NameSurferDataBase(filename) */

    /**
     * Creates a new NameSurferDataBase and initializes it using the
     * data in the specified file.  The constructor throws an error
     * exception if the requested file does not exist or if an error
     * occurs as the file is being read.
     */
    public NameSurferDataBase(String filename) {
        /** Read files (db) and add in array */
        try {
            Scanner scanFile = new Scanner(new File(filename));
            while (scanFile.hasNext())
                list.add(new NameSurferEntry(scanFile.nextLine()));
            scanFile.close();// Close connect in file
        } catch (IOException e) {
            e.printStackTrace();
            System.out.println("Error is : -" + e);
        }
    }

	/* Method: findEntry(name) */

    /**
     * Returns the NameSurferEntry associated with this name, if one
     * exists.  If the name does not appear in the database, this
     * method returns null.
     */
    public NameSurferEntry findEntry(String name) {
        /** The search in equals value name in file (db) and enter users */
        for (NameSurferEntry value : list)
        /** Do not forget for registers word */
            if (value.getName().toLowerCase().equals(name.toLowerCase()))
                return value;
        return null;
    }
}

