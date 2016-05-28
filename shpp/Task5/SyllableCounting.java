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
        int wordLength = word.length();
        Pattern patternReg = Pattern.compile("[eyuioaEYUIOA]");// R
        for (int i = 0; i < wordLength; ++i) {
            Matcher match = patternReg.matcher(word.substring(i, i + 1));
            boolean fount = match.matches();
            if (fount){
                if (i + 2 <= wordLength && !(word.charAt(wordLength - 1) == e)) {
                    Matcher match2 = patternReg.matcher(word.substring(i + 1, i + 2));
                    boolean fount2 = match2.matches();
                    if(fount2)
                        --result;
                }
                ++result;
            }
        }
        if (word.charAt(wordLength - 1) == e && result > 1)
            --result;
        return result;
    }
}