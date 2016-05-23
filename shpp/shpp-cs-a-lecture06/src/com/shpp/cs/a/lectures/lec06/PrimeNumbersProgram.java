package com.shpp.cs.a.lectures.lec06;

import com.shpp.cs.a.console.TextProgram;

public class PrimeNumbersProgram extends TextProgram {

    @Override
    public void run() {
        int c = readInt("enter some number: ");
        boolean isSimple = checkIfSimple(c);
        if (isSimple) {
            println("very simple");
        } else {
            println("ohh.. not simple");
        }

    }

    private boolean checkIfSimple(int number) {
        if (number <= 2) {
            return true;
        }

        for (int i = 2; i< number; i++) {
            if (number % i == 0)
                return false;
        }

        return true;
    }
}
