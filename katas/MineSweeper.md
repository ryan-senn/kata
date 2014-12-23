# Mine Sweeper

1. Given an input string consisting of dots and stars, replace the dots that are touching a star with x.


    Input: "*.*....**" -> Output: "*x*x..x**"
    Input: "..**..*.*" -> Output: ".x**xx*x*"
    Input: "*...*.**." -> Output: "*x.x*x**x"

2. This time around, replace the dots with the amount of stars that they touch.
    Input: "*.*....**" -> Output: "*2*1001**"
    Input: "..**..*.*" -> Output: "01**11*2*"
    Input: "**..*.**." -> Output: "**11*2**1"

3. Given a two line input, check for dots that are touching a star either horizontally or vertically and replace them with x
    Input:  "*.*.....\n
             ..*...*."
    Output: "*x*x..x.\n
             xx*x.x*x"

4. Do the same with 8 lines

5. Replace the dots with the number of stars that they are touching