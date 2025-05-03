def nbr_occurrences(lettres, chaine_de_caracteres):
    if type(chaine_de_caracteres) != str or type(lettres) != str:
        return "ceci est une chaine de caractères"
    else:
        occurrences = 0
        for lettre in chaine_de_caracteres:
            if lettre == lettres:
                occurrences += 1

        return occurrences


print(nbr_occurrences("", ""))