
    var selectedWord= "";
    var selectedHint="";
    var board = [];
    var remainingGuesses=6;
    var words=["snake", "monkey", "beetle"];
    
    
    var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

    
    
    
 window.onload = startGame();
 


$(".letter").click(function()
{
    checkLetter($(this).attr("id"));
});


    
    
    function initBoard()
    {
        
        for (var letter in selectedWord)
        {
            board.push("_");
        }
        
    }
    
    
    
    // console.log(words[0]);
    
    function startGame()
    {
        pickWord();
        initBoard();
        createLetters();
        updateBoard();
    }
    
function pickWord()
{
       var randomInt= Math.floor(Math.random() * words.length);
    selectedWord = words[randomInt].toUpperCase();
}
    
    
    function createLetters()
    {
        for(var letter of alphabet)
        {
            $("#letters").append("<button class='letter' id='" + letter + "'>" + letter + "</button>");
        }
    }
    
    
    
    
    function checkLetter(letter)
    {
        var positions = new Array();
        
        for(var i=0; i< selectedWord.length; i++)
        {
            if(letter == selectedWord[i])
            {
                positions.push(i);
            }
        }
        
        if(positions.length >0)
        {
            updateWord(positions, letter);
        }
        else
        {
            remainingGuesses = remainingGuesses - 1;
        }
        
        
        
    }
    
    function updateWord(positions, letter)
    {
        for(var pos of positions)
        {
            board[pos] = letter;
        }
        
    
        updateBoard();
        
        
    }
    
    
    
    
    
    
    
 function updateBoard()
 {
     
     $("#word").empty();
     
     
      for(var letter of board)
    {
        document.getElementById("word").innerHTML += letter + " ";
        
    }
 }