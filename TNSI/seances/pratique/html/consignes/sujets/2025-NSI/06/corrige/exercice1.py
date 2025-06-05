def liste_puissances(a, n):
    liste_de_puissances = 1
    tab = []
    for _ in range(n):
        liste_de_puissances *= a
        tab.append(liste_de_puissances)
    return tab

def liste_puissances_borne(a, borne):
    liste_de_puissances = 1
    tab = []
    while liste_de_puissances < borne:
        tab.append(liste_de_puissances)
        liste_de_puissances *= a
    return tab[1:]

print(liste_puissances(3, 5))
print(liste_puissances(-2, 4))
print(liste_puissances_borne(2, 16))
print(liste_puissances_borne(2, 17))
print(liste_puissances_borne(5, 5))
