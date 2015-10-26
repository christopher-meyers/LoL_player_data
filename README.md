LoL_player_data
===============

This is a summer project that I am working on based on the video game *League of Legends*.  
Currently, you can enter a player name and various information about this player will be parsed and presented to you.  This information includes: summoner name, level, region, icon and a listing of all game mode stats
that the player has earned.

[Click here for a demo](http://chrismeyers.info/projects/LoL_player_data/web/main.php?name=Moshi&region=na)

##Usage:

1. Create a folder in the root directory named 'notes'.
2. Create a .txt file inside the 'notes' directory entitled 'key.txt'.
3. Enter your api key into the 'key.txt' file (key can be found at https://developer.riotgames.com/)
   * Make sure there are no spaces before, after, or in the 'key.txt' file.
5. Use the form in **web/index.php** to search for a player.
4. Alternatively, '**web/main.php'** can be invoked directly by appending a few url paramters:
   * EX: `/web/main.php?name=SUMMONER_NAME_HERE&region=REGION_HERE`
     * Summoner name with spaces: use either **+** or **%20** to separate words or **omit spaces**.
     * Valid regions = {BR, EUNE, EUW, KR, LAN, LAS, NA, OCE, RU, TR}.  Case insensitive.


##Legal

LoL_player_data isn’t endorsed by Riot Games and doesn’t reflect the views or opinions of Riot Games or anyone officially involved in producing or managing *League of Legends*. *League of Legends* and Riot Games are trademarks or registered trademarks of Riot Games, Inc. *League of Legends* © Riot Games, Inc.
