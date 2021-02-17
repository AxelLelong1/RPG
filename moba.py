import webbrowser

# Trouve les stats d'un champion sur lol
champion = input("Quel champion ?")
url = str('https://www.leaguespy.gg/league-of-legends/champion/'+champion+'/stats')
webbrowser.open(url)