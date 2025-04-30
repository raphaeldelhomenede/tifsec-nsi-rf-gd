def renverse(chaine_de_caracteres):
    if chaine_de_caracteres is not str:
        return "Ceci n'est pas une chaîne de caractères!"
    else:
        return chaine_de_caracteres[::-1]

print(renverse("78"))