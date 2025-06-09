def nombre_de_mots(phrase):
    nb_mots = 0
    for i in phrase:
        if i == " " or i == ".":
            nb_mots += 1
    return nb_mots

print(nombre_de_mots('Cet exercice est simple.'))
print(nombre_de_mots('Le point d exclamation est séparé !'))
print(nombre_de_mots('Combien de mots y a t il dans cette phrase ?'))
print(nombre_de_mots('Fin.'))
