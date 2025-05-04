""" Les consignes sont sur https://tifsec-nsi.rf.gd/TNSI/?session=Sujet4Exercice2 """
def crible(n):
    """Renvoie un tableau contenant tous les nombres premiers plus petits que n."""
    premiers = []
    tab = [True] * n
    tab[0], tab[1] = False, False
    for i in range(n):
        if tab[i]:
            premiers.append(i)
            multiple = i * 1
            while multiple < n:
                tab[multiple] = False
                multiple = multiple + i
    return premiers

print(crible(7))