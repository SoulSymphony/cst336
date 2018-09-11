<!DOCTYPE html>
<html>
<!--

First Website
and comment
in html
(comments can span multiple lines)

-->

<!-- This is the head -->
<!-- All styles and javascript go inside the head -->
    <head>
        <meta char=”utf-8” />
        <title> Michael Velasquez: Personal Portfolio</title>
        
        
       
       <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
<!-- closing head -->

    <!-- This is the body -->
    <!-- This is where we place the content of our website -->
    <body BGCOLOR="BLACK">
        <header>
            <h1> Michael Velasquez</h1>
        </header>
        <nav>
            <hr width="50%" />
            <a href="/index.php">Home</a>
            <a href="labs/lab1/about.php"><b>About</b></a>
            <a href="/contact.php">Contact</a>
        </nav>
        
        <br /><br />
        
       <div id="content">
       
       <table>
           <tr id="table-header">
               <td><strong>Programming Language</strong></td>
                <td><strong>Years Experience</strong></td>
           </tr>
           
            <tr class="table-row">
                <td>Java</td>
                <td>2</td>
              
           </tr>
           
           <tr class="table-row">
                <td>C++</td>
                <td>3</td>
              
           </tr>
           
           <tr class="table-row">
                <td>PHP</td>
                <td>1</td>
              
           </tr>
           
           
           
       </table>
       
       
       <ul>
           <li><span class="hobby">Video games</span>: I own 5 consoles and like Action/Jrpg one of my favorites is Dark Souls</li>
           <li><span class="hobby">Music</span>:I listen to whatever music but my favorite genre is symphonic metal</li>
           <li><span class="hobby">Food</span>: Favorite would be cheesecake</li>
           <li><span class="hobby">Pets</span>: I have 2 dogs and one cat</li>
       </ul>
       
       
       </div>
        
        <!-- This is the footer -->
        <!-- The footer goes inside the body but not always -->
        <footer>
            <hr>
            CST 336. 2018&copy; Velasquez<br />
            <strong>Disclaimer:</strong> The information in the this webpage is fictitious <br />
            It is being used for academic purpose only.
            
            
            
            <figure>
            <img src="/cst336/labs/lab1/img/csu.jpg" alt="Picture of csumb logo" />
            </figure>
            
        </footer>
        <!-- closing footer -->
        
    </body>
    <!-- closing body -->

</html>