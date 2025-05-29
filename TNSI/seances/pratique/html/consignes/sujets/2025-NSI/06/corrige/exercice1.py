def liste_puissances(a,n):
    tab = []
    liste_puissances = 1
    for _ in range(n):
        liste_puissances *= a
        tab.append(liste_puissances)
    return tab

def liste_puissances_borne(a, borne):
    tab = []
    tab1 = []
    liste_puissances = 1
    while liste_puissances < borne:
        liste_puissances *= a
        tab.append(liste_puissances)
    for i in range(len(tab)-1):
        tab1.append(tab[i])
    return tab1

print(liste_puissances(3, 5))
print(liste_puissances(-2,4))
print(liste_puissances_borne(2, 16))
print(liste_puissances_borne(2, 17))
print(liste_puissances_borne(5, 5))
