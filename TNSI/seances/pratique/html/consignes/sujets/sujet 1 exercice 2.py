""" Les consignes sont sur https://tifsec-nsi.rf.gd/TNSI/?session=Sujet1Exercice2 """
def echange(tab, i, j):
    """Echange les éléments d'indice i et j dans le tableau tab."""
    temp = ...
    tab[i] = ...
    tab[j] = ...

def tri_bulles(tab):
    """Trie le tableau tab dans l'ordre croissant par la méthode du tri à bulles."""
    n = len(tab)
    for i in range(...):
        for j in range(...):
            if  ... > ...:
                echange(tab, j, ...)

tab = []
tri_bulles(tab)
print(tab)