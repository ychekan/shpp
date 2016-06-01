package com.shpp.task5.ychekan;

import com.shpp.cs.a.console.TextProgram;

import java.util.regex.Pattern;
import java.util.regex.Matcher;


/**
 * Created by ret284 on 24.05.2016.
 */
public class SyllableCounting extends TextProgram {
    public void run() {
        /* Repeatedly prompt the user for a word and print out the estimated
         * number of syllables in that word.
         */
        while (true) {
            String word = readLine("Enter a single word: ");
            println("  Syllable count: " + syllablesIn(word));
        }
    }

    /**
     * Given a word, estimates the number of syllables in that word according to the
     * heuristic specified in the handout.
     *
     * @param word A string containing a single word.
     * @return An estimate of the number of syllables in that word.
     */
    private int syllablesIn(String word) {
        int result = 0;
        char e = 'e';
        int wordLength = word.length(); /** Overall length string */
        if (wordLength > 0) {/** If not empty string */
            for (int i = 0; i < wordLength; ++i) {
                if (checkWord(word.substring(i, i + 1))) { /** Check first letter */
                    ++result;
                    if (i < wordLength - 1 && checkWord(word.substring(i + 1, i + 2))) { /** If double litter in RexEx [eyuioaEYUIOA] */
                        --result;
                    }
                }
            }
            /** If last letter = e or penultimate letter not have RexEx  */
            if (word.charAt(wordLength - 1) == e && result > 1 && !checkWord(word.substring(wordLength - 2, wordLength - 1)))
                --result;
        } else
            println("Sorry, empty string!");
        return result;
    }

    /** Boolean method for check accessory in RexEx  */
    private boolean checkWord(String str) {
        Pattern patternReg = Pattern.compile("[eyuioaEYUIOA]");
        Matcher match = patternReg.matcher(str);
        boolean fount = match.matches();
        return fount;
    }
}