package com.shpp.cs.namesurfer;

/*
 * File: NameSurferGraph.java
 * ---------------------------
 * This class represents the canvas on which the graph of
 * names is drawn. This class is responsible for updating
 * (redrawing) the graphs whenever the list of entries changes
 * or the window is resized.
 */

import acm.graphics.*;

import java.awt.event.*;
import java.util.*;
import java.awt.*;

public class NameSurferGraph extends GCanvas
        implements com.shpp.cs.namesurfer.NameSurferConstants, ComponentListener {
    ArrayList<NameSurferEntry> list = new ArrayList<>();


    /**
     * Creates a new NameSurferGraph object that displays the data.
     */
    public NameSurferGraph() {
        addComponentListener(this);
    }


    /**
     * Clears the list of name surfer entries stored inside this class.
     */
    public void clear() {
        list.clear();
        update();
    }

    /**
     * Adds a new NameSurferEntry to the list of entries on the display.
     * Note that this method does not actually draw the graph, but
     * simply stores the entry; the graph is drawn by calling update.
     */
    public void addEntry(NameSurferEntry numberEntry) {
        list.add(numberEntry);
        update();
    }

    /**
     * Updates the display image by deleting all the graphical objects
     * from the canvas and then reassembling the display according to
     * the list of entries. Your application must call update after
     * calling either clear or addEntry; update is also called whenever
     * the size of the canvas changes.
     */
    public void update() {
        removeAll();
        drawGrid();
        drawGraph();
    }

    /**
     * Draw grad in window program
     */
    public void drawGrid() {
        /** For vertical lines */
        drawVerticalLines();
        /** For horizontal lines */
        drawHorizontalLines();
        /** For draw decades */
        drawNDecades();
    }

    /**
     * Draw vertical lines in the graph
     */
    public void drawVerticalLines() {
        double yFirst = 0;
        double ySecond = getHeight();
        double x = getWidth() / NDECADES;
        for (int i = 0; i < NDECADES; ++i) {
            GLine newVertical = new GLine(i * x, yFirst, i * x, ySecond);
            newVertical.setColor(Color.BLACK);
            add(newVertical);
        }
    }

    /**
     * Draw horizontal lines in graph
     */
    private void drawHorizontalLines() {
        add(new GLine(0, getHeight() - GRAPH_MARGIN_SIZE, getWidth(), getHeight() - GRAPH_MARGIN_SIZE));
        add(new GLine(0, GRAPH_MARGIN_SIZE, getWidth(), GRAPH_MARGIN_SIZE));
    }

    /**
     * Draw decades in graph
     */
    private void drawNDecades() {
        double x = getWidth() / NDECADES;
        double y = getHeight() - GRAPH_MARGIN_SIZE / 4;
        for (int i = 0; i < NDECADES; ++i) {
            int numberDecade = START_DECADE;
            numberDecade += i * 10;
            add(new GLabel(Integer.toString(numberDecade), 2 + i * x, y));
        }
    }

    /**
     * The make draw all graphs in array list
     */
    private void drawGraph() {
        Color[] colors = {Color.BLUE, Color.RED, Color.MAGENTA, Color.ORANGE};
        int colorCounter = 0;
        for (NameSurferEntry entry : list) {
            Color color = colors[colorCounter];
            if (entry != null) {
                drawCurrentGraph(entry, color);
                colorCounter++;
                if (colorCounter == colors.length)
                    colorCounter = 0;
            }
        }
    }

    /** Draw coordinate in array list */
    private void drawCurrentGraph(NameSurferEntry entry, Color color) {

        /** Coordinate Y */
        double coordinateYtoRange = (double) (getHeight() - GRAPH_MARGIN_SIZE * 2) / MAX_RANK;

        /** First coordinate */
        double startX = 0;
        double startY = (entry.getRank(0) == 0) ? getHeight() - GRAPH_MARGIN_SIZE : (entry.getRank(0) * coordinateYtoRange) + GRAPH_MARGIN_SIZE;

        for (int i = 0; i < NDECADES - 1; ++i) {
            double endX = (i + 1) * getWidth() / NDECADES;
            double endY = (entry.getRank(i + 1) == 0) ? getHeight() - GRAPH_MARGIN_SIZE : entry.getRank(i + 1) * coordinateYtoRange + GRAPH_MARGIN_SIZE;

            /** Draw is line to name */
            GLine line = new GLine(startX, startY, endX, endY);
            line.setColor(color);
            add(line);

            /** Print name and count names in this period */
            drawName(entry.getName(), entry.getRank(i), startX, startY, color);

            /** For start to next step in positions end this */
            startX = endX;
            startY = endY;
        }
        /** End line in graph */
        drawName(entry.getName(), entry.getRank(NDECADES - 1), startX, startY, color);
    }

    /**
     * Draw name in graph
     */
    private void drawName(String name, int rank, double x, double y, Color color) {
        GLabel label = new GLabel(name + " " + rank, x, y);
        label.setFont("Times New Roman");

        /** Or rang 0 then * */
        if (rank == 0) {
            label.setLabel(name + " *");
        }

        label.setColor(color);
        add(label);
    }

    /* Implementation of the ComponentListener interface */
    public void componentHidden(ComponentEvent e) {
    }

    public void componentMoved(ComponentEvent e) {
    }

    public void componentResized(ComponentEvent e) {
        update();
    }

    public void componentShown(ComponentEvent e) {
    }
}
