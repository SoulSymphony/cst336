<!DOCTYPE html>
<html>
    <head>
        <title> Quote Finder </title>
         <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <style>
            body {
                text-align: center;
                font-size: 2em;
            }
            #quotes{
                width:600px;
                margin:0 auto;
                text-align: left;
            }
        </style>
    </head>
    <body>

      <div class="jumbotron">
            <h1> Famous Quote Finder </h1>
      </div>
      
      <form>
         Enter Quote Keyword <input type="text" name="keyword" value="" /><br><br>
         Category:
                 <select name="category">
                     <option value=""> Select One </option>
                     <option >Humor</option><option >Life</option><option >Motivation</option><option >Philosophy</option><option >Reflection</option>                 </select><br><br>
          Order  <br>
              <input type="radio" name="orderBy" value="az"
                /> A-Z <br>
              <input type="radio" name="orderBy" value="za"
                /> Z-A <br>
              
            <br>
            
            <input type="submit" value="Display Quotes!"/>

      </form>
      
      
      <hr>
      
      <div id="quotes">
      Be less curious about people and more curious about ideas.<i> (Marie Curie) </i><br>Tell me and I forget. Teach me and I remember. Involve me and I learn.<i> (Benjamin Franklin) </i><br>Look up at the stars and not down at your feet. Try to make sense of what you see, and wonder about what makes the universe exist. Be curious.<i> (Stephen Hawking) </i><br>The past, like the future, is indefinite and exists only as a spectrum of possibilities.<i> (Stephen Hawking) </i><br>We are all born ignorant, but one must work hard to remain stupid.<i> (Benjamin Franklin) </i><br>Great spirits have always encountered violent opposition from mediocre minds.<i> (Albert Einstein) </i><br>Two things are infinite: the universe and human stupidity; and I'm not sure about the universe.<i> (Albert Einstein) </i><br>Live as if you were to die tomorrow. Learn as if you were to live forever.<i> (Mahatma Gandhi) </i><br>All that I am, or hope to be, I owe to my angel mother.<i> (Abraham Lincoln) </i><br>The weak can never forgive. Forgiveness is the attribute of the strong.<i> (Mahatma Gandhi) </i><br>Imagination is more important than knowledge<i> (Albert Einstein) </i><br>You cannot escape the responsibility of tomorrow by evading it today.<i> (Abraham Lincoln) </i><br>Where there is love, there is life<i> (Mahatma Gandhi) </i><br>Everybody is a genius. But if you judge a fish by its ability to climb a tree, it will live its whole life believing that it is stupid.<i> (Albert Einstein) </i><br>Good advice is always certain to be ignored, but that's no reason not to give it.<i> (Agatha Christie) </i><br>Nothing in life is feared, it is only to be understood. Now is the time to understand more, so that we may fear less.
<i> (Marie Curie) </i><br>Keep your face to the sunshine and you cannot see the shadows.<i> (Helen Keller) </i><br>All my life through, the new sights of Nature made me rejoice like a child.<i> (Marie Curie) </i><br>Science is not only a disciple of reason but, also, one of romance and passion.<i> (Stephen Hawking) </i><br>One never notices what has been done; one can only see what remains to be done.<i> (Marie Curie) </i><br>In a gentle way, you can shake the world <i> (Mahatma Gandhi) </i><br>There are sadistic scientists who hurry to hunt down errors instead of establishing the truth.<i> (Marie Curie) </i><br>      </div>
      
    </body>
</html>