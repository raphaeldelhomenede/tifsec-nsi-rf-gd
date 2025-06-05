def echange(tab, i, j):
    '''Echange les éléments d'indice i et j dans le tableau tab.'''
    temp = tab[i]
    tab[i] = tab[j]
    tab[j] = temp

def tri_bulles(tab):
    '''Trie le tableau tab dans l'ordre croissant
    par la méthode du tri à bulles.'''
    n = len(tab)
    for i in range(n-1):
        for j in range(n-1-i):
            if tab[j] > tab[j+1]:
                echange(tab, j, j+1)

    return tab

print(tri_bulles([]))
print(tri_bulles([9, 3, 7, 2, 3, 1, 6]))
print(tri_bulles([9, 7, 4, 3]))
