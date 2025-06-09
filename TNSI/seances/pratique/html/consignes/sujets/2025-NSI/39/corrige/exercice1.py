def moyenne(tab):
    somme = 0
    nb_de_nb = 0
    for i in tab:
        somme += i
        nb_de_nb += 1
    if nb_de_nb == 0:
        return None
    return somme / nb_de_nb

print(moyenne([5,3,8]))
print(moyenne([1,2,3,4,5,6,7,8,9,10]))
print(moyenne([]))
