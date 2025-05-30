""" Les consignes sont sur https://tifsec-nsi.rf.gd/TNSI/?session=Sujet5Exercice2 """
def dichotomie(tab, x):
    """
    tab: tableau d'entiers trié dans l'ordre croissant
    x : nombre entier
    La fonction renvoie True si tab contient x et False sinon """
    debut = 0
    fin = len(tab) - 1
    while debut <= fin:
        m = ...
        if x == tab[m]:
            return ...
        if x > tab[m]:
            debut = m + 1
        else:
            fin = ...
    return ...