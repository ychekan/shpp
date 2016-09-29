<html>
<head>
    <title>404 Not Found Page</title>
    <script type="text/javascript">


        var quotes = [{
            quote: 'Java is to JavaScript what Car is to Carpet.',
            author: 'Chris Heilmann',
            link: '#'
        }, {
            quote: 'It\'s hard enough to find an error in your code when you\'re looking for it, it\'s even harder when you\'ve assumed your code is error-free.',
            author: 'Steve McConnell',
            link: 'https://en.wikipedia.org/wiki/Steve_McConnell'
        }, {
            quote: 'If debugging is the process of removing software bugs, then programming must be the process of putting them in.',
            author: 'Edsger Dijkstra',
            link: 'https://en.wikipedia.org/wiki/Edsger_W._Dijkstra'
        }, {
            quote: 'Walking on water and developing software from a specification are easy if both are frozen.',
            author: 'Edward V Berard',
            link: 'https://en.wikiquote.org/wiki/Edward_V._Berard'
        }, {
            quote: 'Debugging is twice as hard as writing the code in the first place. Therefore, if you write the code as cleverly as possible, you are, by definition, not smart enough to debug it.',
            author: 'Brian Kernighan',
            link: 'https://en.wikipedia.org/wiki/Brian_Kernighan'
        }, {
            quote: 'It\'s not at all important to get it right the first time. It\'s vitally important to get it right the last time.',
            author: 'David Thomas',
            link: 'https://en.wikipedia.org/wiki/Dave_Thomas_(programmer)'
        }, {
            quote: 'Should array indices start at 0 or 1? My compromise of 0.5 was rejected without, I thought, proper consideration.',
            author: 'Stan Kelly-Bootle',
            link: 'https://en.wikipedia.org/wiki/Stan_Kelly-Bootle'
        }, {
            quote: 'Always code as if the guy who ends up maintaining your code will be a violent psychopath who knows where you live.',
            author: 'Rick Osborne',
            link: '#'
        }, {
            quote: 'Any fool can write code that a computer can understand. Good programmers write code that humans can understand.',
            author: 'Martin Fowler',
            link: 'https://en.wikipedia.org/wiki/Martin_Fowler'
        }, {
            quote: 'Software sucks because users demand it to.',
            author: 'Nathan Myhrvold',
            link: 'https://en.wikipedia.org/wiki/Nathan_Myhrvold'
        }, {
            quote: 'Linux is only free if your time has no value. ',
            author: 'Jamie Zawinski',
            link: 'https://en.wikipedia.org/wiki/Jamie_Zawinski'
        }, {
            quote: 'The first 90p of the code accounts for the first 90p of the development time. The remaining 10p of the code accounts for the other 90p of the development time.',
            author: 'Tom Cargill',
            link: 'https://en.wikipedia.org/wiki/Ninety-ninety_rule'
        }, {
            quote: 'Programming can be fun, so can cryptography, however they should not be combined.',
            author: 'Ben Shneiderman',
            link: 'https://en.wikipedia.org/wiki/Ben_Shneiderman'
        }, {
            quote: 'Copy and paste is a design error.',
            author: 'David Parnas',
            link: 'https://en.wikipedia.org/wiki/David_Parnas'
        }, {
            quote: 'Before software can be reusable it first has to be usable.',
            author: 'Ralph Johnson',
            link: 'https://en.wikipedia.org/wiki/Ralph_Johnson_(computer_scientist)'
        }, {
            quote: 'When someone says \'I want a programming language in which I need only say what I want done\', give him a lollipop.',
            author: 'Alan Perlis',
            link: 'https://en.wikipedia.org/wiki/Alan_Perlis'
        }, {
            quote: 'Computers are good at following instructions, but not at reading your mind.',
            author: 'Donald Knuth',
            link: 'https://en.wikipedia.org/wiki/Donald_Knuth'
        }, {
            quote: 'Any code of your own that you haven\'t looked at for six or more months might as well have been written by someone else.',
            author: 'Eagleson\'s law',
            link: '#'
        }];

        // array for random numbers
        var arrRandomNum = [];

        function randomQuotes() {

            // private variables
            var i = 0;
            var minNum = 0;
            var maxNum = quotes.length;
            var resultQuote;
            var element = document.getElementById('quote');

            // random number
            var randomNum = 0;

            // checks if there are more new quotes
            if (arrRandomNum.length != maxNum) {

                // do if random number doesnt exists in array
                while (arrRandomNum.indexOf(randomNum) > -1) {
                    randomNum = Math.floor(Math.random() * (maxNum - minNum)) + minNum;
                    console.log('Random number generated!');
                    console.log('random number is: ' + randomNum);
                }

                // push random number in array
                arrRandomNum.push(randomNum);

                // output in HTML, if author has link or if not
                if (quotes[randomNum].link == '#') {
                    resultQuote = element.innerHTML = '<p>' + quotes[randomNum].quote + '</p>' + '<footer><a href="#" class="author">' + quotes[randomNum].author + '</a><span class="cursor blink">&#9646;</span></footer>';
                    console.log('author, no link');
                } else {
                    resultQuote = element.innerHTML = '<p>' + quotes[randomNum].quote + '</p>' + '<footer><a href="' + quotes[randomNum].link + '" target="_blank" class="author">' + quotes[randomNum].author + '</a><span class="cursor blink">&#9646;</span></footer>';
                }

                // make tweet button with quote
                tweetButton(randomNum);

            } else {
                // output in HTML
                resultQuote = element.innerHTML = '<div class="warning"><span>WARNING</span><p> No more new quotes <span class="cursor blink">&#9646;</span></p></div>';
                console.log('No more new quotes!');
            }

            console.log(arrRandomNum);
            console.log('random number is: ' + randomNum);



            // MEM

            memAddClass(randomNum);


            //returns output in HTML

            var j = 0;
            var i = 1;
            var isTag;
            var text;
            function type(){

                text = resultQuote.slice(0, i++);

                if (text === resultQuote) return;

                element.innerHTML = text+'&#9646;';

                var char = text.slice(-1);

                if( char === '<' ) isTag = true;
                if( char === '>' ) isTag = false;

                if (isTag) return type();
                setTimeout(type, 20);
            }

            return type();
            //return resultQuote;
        }

        // click animation function
        function clickAnimation(x) {
            var element = x ;

            element.className = 'btn';
            element.className += ' clicked';
            setTimeout(function() {
                element.className = 'btn';
            }, 1000);

        }

        // adds class to ram element on html
        function memAddClass(randomNum){
            document.getElementById(randomNum).className = 'opened';
        }

        // function for adding tweet button
        function tweetButton(x){
            var tweetElement = document.getElementById('tweet-wrapper');
            tweetElement.innerHTML = '';
            return tweetElement.innerHTML = '<a href="https://twitter.com/intent/tweet?text='+quotes[x].quote+'-'+quotes[x].author+'" class="btn" target="_blank">Tweet Quote</a>';
        }


        var quoteElement = document.getElementById('newQuoteBtn');
        var tweetElement = document.getElementById('tweet');
        // on page load run one time
        randomQuotes();

        // on button click run function
        quoteElement.addEventListener('click', function() {
            clickAnimation(quoteElement);
            randomQuotes();
        });
        tweetElement.addEventListener('click',function(){clickAnimation(tweetElement)});
    </script>
    <style>
        // mixins
        @mixin neon-border($color,$rgba,$inset,$x,$y){
        // $color - border color, $rgba - shadow, $inset - true/false
                                                                border: 2px solid $color;
            @if $inset == 'true' {
                -webkit-box-shadow: 0px 0px $x $y $rgba, inset 0px 0px $x $y $rgba;
                -moz-box-shadow:    0px 0px $x $y $rgba, inset 0px 0px $x $y $rgba;
                box-shadow:         0px 0px $x $y $rgba, inset 0px 0px $x $y $rgba;
            }@else if $inset == 'false'{
            -webkit-box-shadow: 0px 0px $x $y $rgba;
            -moz-box-shadow:    0px 0px $x $y $rgba;
            box-shadow:         0px 0px $x $y $rgba;
        }
        }

        /* colors */
        $bukner : #141f23;
        $black-pearl : #051D29;
        $spray: #93EDF5;
        $picton-blue: #4BA0E3;
        $iceberg:#d9f2f4;
        $dairy-cream:#F7E3AF;
        $blosom: #D4AFB9;
        $burnt-siennaRGBA:rgba(240, 93, 94, 0.78);
        $cream-canRGBA: rgba(239, 199, 97, 0.78);
        $curious-blueRGBA: rgba(16, 81, 139, 0.78);
        $aquaRGBA: rgba(0, 255, 255, 0.83);
        $transparent1:rgba(0, 0, 0, 0.1);
        $transparent2:rgba(0, 0, 0, 0.2);



        // typography
           h1{
               font-family: 'Black Ops One', cursive;
               font-size: 22px;
               margin: 10px;
               floar:left;
           }

        h2{
            font-family: 'Black Ops One', cursive;
            font-size: 30px;
            margin: 10px;
        }

        // links
           a{
               color: $iceberg;
               text-decoration: none;


           }

        .author{
            float: right;

        &::before{
             content:'[ ';
         }
        &::after{
             content:' ]';
         }
        }


        // buttons
           a.btn, .btn.twitter-share-button{
               text-decoration: none;
               text-transform: uppercase;
               text-shadow: none;
               font-weight: bold;
               color:black;
               background: $spray;
           @include neon-border($spray,$curious-blueRGBA,'false',4px,2px);
               margin: 5px;

        &:hover{
             background: transparent;
             color: $spray;
             text-shadow: 0px 0px 5px $aquaRGBA;
         }
        &.clicked{
             -webkit-animation: BtnClick 1s linear ;
             -moz-animation: BtnClick 1s linear  ;
             animation: BtnClick 1s linear ;

        @-webkit-keyframes BtnClick {
            0%{background:$spray; color:black;}
            25%{background:transparent; color:$spray;}
            50%{background:$spray; color:black;}
            75%{background:transparent; color:$spray;}
            100%{background:$spray; color:black;}

        }
        @-moz-keyframes BtnClick {
            0%{background:$spray; color:black;}
            25%{background:transparent; color:$spray;}
            50%{background:$spray; color:black;}
            75%{background:transparent; color:$spray;}
            100%{background:$spray; color:black;}
        }
        @keyframes BtnClick {
            0%{background:$spray; color:black;}
            25%{background:transparent; color:$spray;}
            50%{background:$spray; color:black;}
            75%{background:transparent; color:$spray;}
            100%{background:$spray; color:black;}
        }
        }
        }

        .float-left{
            float:left;

        }
        .clear{
            clear: both;
        }



        .borders{
        @include neon-border($picton-blue,$curious-blueRGBA,'true',4px,2px);
        }
        .borders.red{
        @include neon-border($blosom,$burnt-siennaRGBA,'true',4px,2px);
        }

        // body

           body{
               color: #93edf5;
               font-family: 'Source Code Pro', monospace;
               text-shadow: 0px 0px 5px $aquaRGBA;

               background: $black-pearl;
               background: -moz-repeating-linear-gradient(90deg,$transparent1 1px,$transparent1 4px,$transparent2 5px,$transparent2 8px),$black-pearl;
               background: -webkit-repeating-linear-gradient(90deg,$transparent1 1px,$transparent1 4px,$transparent2 5px,$transparent2 8px),$black-pearl;//linear-gradient(2deg, #141f23, #051d29, #141f23);
               background: -o-repeating-linear-gradient(90deg,$transparent1 1px,$transparent1 4px,$transparent2 5px,$transparent2 8px),$black-pearl;
               background: -repeating-linear-gradient(90deg,$transparent1 1px,$transparent1 4px,$transparent2 5px,$transparent2 8px),$black-pearl;
               background-size: 300% 300%;

           // animation

           -webkit-animation: ScanLine 10s ease-in-out infinite;
               -moz-animation: ScanLine 10s ease-in-out infinite;
               animation: ScanLine 10s ease-in-out infinite;

        @-webkit-keyframes ScanLine {
            0%{background-position:51% 0%; opacity: 0.8}
            10%{opacity: 0.5;}
            20%{opacity: 0.9}
            30%{opacity: 0.7}
            40%{opacity: 0.9}
            50%{background-position:50% 100%;opacity: 1}
            60%{opacity: 0.9}
            70%{opacity: 0.6}
            80%{opacity: 0.9}
            90%{opacity: 0.8}
            100%{background-position:51% 0%;opacity: 0.9}
        }
        @-moz-keyframes ScanLine {
            0%{background-position:51% 0%; opacity: 0.8}
            10%{opacity: 0.5}
            20%{opacity: 0.9}
            30%{opacity: 0.7}
            40%{opacity: 0.9}
            50%{background-position:50% 100%;opacity: 1}
            60%{opacity: 0.9}
            70%{opacity: 0.6}
            80%{opacity: 0.9}
            90%{opacity: 0.8}
            100%{background-position:51% 0%;opacity: 0.9}
        }
        @keyframes ScanLine {
            0%{background-position:51% 0%; opacity: 0.8}
            10%{opacity: 0.5}
            20%{opacity: 0.9}
            30%{opacity: 0.7}
            40%{opacity: 0.9}
            50%{background-position:50% 100%;opacity: 1}
            60%{opacity: 0.9}
            70%{opacity: 0.6}
            80%{opacity: 0.9}
            90%{opacity: 0.8}
            100%{background-position:51% 0%;opacity: 0.9}
        }
        }


        // main container
           .container{
               margin: 0 auto;
               min-width: 400px;
               max-width: 680px;
        .quote-machine{
            width: 550px;
            float: left;
        }
        }


        .wrapper{
            margin: 50px auto 0 auto;
            padding: 2px;

        // wrapper glitch animation
        -webkit-animation: Glitch 10s ease-in-out infinite;
            -moz-animation: Glitch 10s ease-in-out infinite;
            animation: Glitch 10s ease-in-out infinite;

        @-webkit-keyframes Glitch {
            0%{}
            9.9%{-webkit-transform:skew(0deg);}
            10%{-webkit-transform:skew(1deg);}
            10.1%{-webkit-transform:skew(0deg);}
            89.9%{-webkit-transform:skew(0deg);}
            90%{-webkit-transform:skew(-4deg);}
            90.1%{-webkit-transform:skew(0deg);}
            100%{}
        }
        @-moz-keyframes Glitch {
            0%{}
            9.9%{-webkit-transform:skew(0deg);}
            10%{-webkit-transform:skew(1deg);}
            10.1%{-webkit-transform:skew(0deg);}
            89.9%{-webkit-transform:skew(0deg);}
            90%{-webkit-transform:skew(-4deg);}
            90.1%{-webkit-transform:skew(0deg);}
            100%{}
        }
        @keyframes Glitch {
            0%{}
            9.9%{-webkit-transform:skew(0deg);}
            10%{-webkit-transform:skew(1deg);}
            10.1%{-webkit-transform:skew(0deg);}
            89.9%{-webkit-transform:skew(0deg);}
            90%{-webkit-transform:skew(-4deg);}
            90.1%{-webkit-transform:skew(0deg);}
            100%{}
        }
        }

        header{
            margin-bottom: 2px;
            height: 50px;

        span{
            margin: -16px 3px 0 0;
            float: right;
            clear: both;
        }
        }

        main{
            margin-bottom: 2px;
            padding: 15px;
        }

        blockquote{
            font-size: 16px;
            min-height: 200px;
            margin: 10px;
        }


        // warning
           .warning{
               padding-top: 10px;
               opacity: 0.8;
               text-align: center;
        >span{
             background: $blosom;
             color: black;
             font-weight: bold;
             text-transform: uppercase;
             text-shadow: none;
         }
        }

        .cursor{
            background: trasparent;
            color: $spray;
            text-shadow: 0px 0px 5px $aquaRGBA;
            opacity: 1;

        &.blink{
             -webkit-animation: Blink 2s ease infinite;
             -moz-animation: Blink 2s ease infinite;
             animation: Blink 2s ease infinite;

        @-webkit-keyframes Blink {
            0%{opacity: 0}
            50%{opacity: 1}
            100%{opacity: 0}
        }
        @-moz-keyframes Blink {
            0%{opacity: 0}
            50%{opacity: 1}
            100%{opacity: 0}
        }
        @keyframes Blink {
            0%{opacity: 0}
            50%{opacity: 1}
            100%{opacity: 0}
        }
        }
        }

        // mem module

           .mem{
               width: 105px;
               margin-left: 5px;
               float: left;
        .module{
            opacity: 0.8;
            margin: 3px 3px 0px 3px;
            display: inline-block;
            background: $spray;
        @include neon-border($spray,$aquaRGBA,'false',2px,1px);
            width: 6px;
            height: 16px;
        }

        }

        .opened{
            color:$blosom;
            text-shadow: 0px 0px 5px $burnt-siennaRGBA;
        .module{
            transition: background 2s,border 2s;
            background: $blosom;
        @include neon-border($blosom,$burnt-siennaRGBA,'false',2px,1px);
        }
        }

        .page-author{
            text-align:center;

        }

    </style>
</head>
<link href="https://fonts.googleapis.com/css?family=Black+Ops+One|Source+Code+Pro" rel="stylesheet">
<div class="container">
    <!-- random quote machine -->
    <div class="wrapper quote-machine borders">
        <header class="borders">
            <h1>Random Programmers Quote Machine</h1>
            <span class="version borders">ver:1.1</span>
        </header>
        <main class="borders">
            <div class="block">
                <blockquote id="quote"></blockquote>
                <a href="#" id="newQuoteBtn" class="btn">New quote</a>
          <span id="tweet-wrapper">
            <a id="tweet" href="https://twitter.com/intent/tweet?" class="btn" target="_blank">Tweet Quote</a>
          </span>
            </div>
        </main>
        <footer class="borders">
            <p class="page-author">Coded and designed by <a href="http://markostefanovic.github.io/" target="_blank">[
                    Marko Stefanovic ]</a> for FreeCodeCamp © 2016</p>
        </footer>
    </div>

    <!-- JSON objects -->
    <div class="wrapper mem borders">
        <div class="cells">
            <header><h2>MEM.</h2></header>
            <div class="borders red">
                <div class="float-left">
                    <div id="0"><span class="module"></span><br/>/</div>
                    <div id="1"><span class="module"></span><br/>/</div>
                    <div id="2"><span class="module"></span><br/>/</div>
                </div>
                <div class="float-left">
                    <div id="3"><span class="module"></span><br/>/</div>
                    <div id="4"><span class="module"></span><br/>/</div>
                    <div id="5"><span class="module"></span><br/>/</div>
                </div>
                <div class="float-left">
                    <div id="6"><span class="module"></span><br/>/</div>
                    <div id="7"><span class="module"></span><br/>/</div>
                    <div id="8"><span class="module"></span><br/>/</div>
                </div>
                <div class="float-left">
                    <div id="9"><span class="module"></span><br/>/</div>
                    <div id="10"><span class="module"></span><br/>/</div>
                    <div id="11"><span class="module"></span><br/>/</div>
                </div>
                <div class="float-left">
                    <div id="12"><span class="module"></span><br/>/</div>
                    <div id="13"><span class="module"></span><br/>/</div>
                    <div id="14"><span class="module"></span><br/>/</div>
                </div>
                <div class="float-left">
                    <div id="15"><span class="module"></span><br/>/</div>
                    <div id="16"><span class="module"></span><br/>/</div>
                    <div id="17"><span class="module"></span><br/>/</div>
                </div>
                <div class="clear"></div>
            </div>

        </div>
    </div>

</div>
</html>