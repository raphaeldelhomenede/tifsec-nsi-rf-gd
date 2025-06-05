def nbr_occurrences(caractere, chaine_de_caracteres):
    nb_occurrences = 0
    for i in chaine_de_caracteres:
        if caractere == i:
            nb_occurrences += 1
    return nb_occurrences

print(nbr_occurrences("o", "bonjour"))
print(nbr_occurrences("b", "Bébé"))
print(nbr_occurrences("B", "Bébé"))
print(nbr_occurrences(" ", "Hello world !"))
