def ajoute_dictionnaires(d1, d2):
    d = {}
    for cle in d1:
        d[cle] = d1[cle]
    for cle in d2:
        if cle in d:
            d[cle] += d2[cle]
        else:
            d[cle] = d2[cle]
    return d

print(ajoute_dictionnaires({1: 5, 2: 7}, {2: 9, 3: 11}))
print(ajoute_dictionnaires({}, {2: 9, 3: 11}))
print(ajoute_dictionnaires({1: 5, 2: 7}, {}))
