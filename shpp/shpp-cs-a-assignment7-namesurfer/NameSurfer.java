package com.shpp.cs.namesurfer;

/*
 * File: NameSurfer.java
 * ---------------------
 * When it is finished, this program will implements the viewer for
 * the baby-name database described in the assignment handout.
 */

import com.shpp.cs.a.simple.SimpleProgram;
import javax.swing.*;
import java.awt.event.ActionEvent;

public class NameSurfer extends SimpleProgram implements com.shpp.cs.namesurfer.NameSurferConstants {

    private JLabel label;
    private JTextField textField;
    private JButton buttonClear;
    private JButton buttonGraph;
    protected NameSurferGraph graph;
    protected NameSurferDataBase db;

    /**
     * This method has the responsibility for reading in the data base
     * and initializing the interactors at the top of the window.
     */
    public void init() {
        /** The make to string name */
        label = new JLabel("Name :");
        add(label, NORTH);

        /** The make to form for enter name */
        textField = new JTextField(30);
        add(textField, NORTH);
        textField.addActionListener(this);

        /** The make button in name Graph */
        buttonGraph = new JButton("Graph");
        add(buttonGraph, NORTH);

        /** The make button in name Clear */
        buttonClear = new JButton("Clear");
        add(buttonClear, NORTH);

        /** The make to draw in graph */
        graph = new NameSurferGraph();
        add(graph);

        addActionListeners();

        /** The make to read and add to NameSurferDataBase */
        db = new NameSurferDataBase(NAMES_DATA_FILE);
    }


	/* Method: actionPerformed(e) */

    /**
     * This class is responsible for detecting when the buttons are
     * clicked, so you will have to define a method to respond to
     * button actions.
     */
    public void actionPerformed(ActionEvent e) {
        String cmd = e.getActionCommand();
        if (cmd.equals("Clear")) {
            graph.clear();
            graph.update();
        } else {
            String nextName = textField.getText();
            NameSurferEntry rangName = db.findEntry(nextName);
            if (rangName != null) {
                graph.addEntry(rangName);
                graph.update();

            }
        }
    }
}
