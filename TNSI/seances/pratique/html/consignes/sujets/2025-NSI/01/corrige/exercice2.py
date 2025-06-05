def nombre_suivant(s):
    '''Renvoie le nombre suivant de celui representé par s
    en appliquant le procédé de lecture.'''
    resultat = ''
    chiffre = s[0]
    compte = 1
    for i in range(1, len(s)):
        if s[i] == chiffre:
            compte = compte + 1
        else:
            resultat += f"{compte}" + chiffre
            chiffre = s[i]
            compte = 1
    lecture_chiffre = f"{compte}" + chiffre
    resultat += lecture_chiffre
    return resultat

print(nombre_suivant('1211'))
print(nombre_suivant('311'))
