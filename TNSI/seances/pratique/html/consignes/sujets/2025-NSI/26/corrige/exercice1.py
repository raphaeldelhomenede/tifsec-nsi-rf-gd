def ajoute_dictionnaires(d1, d2):
    d0 = []
    d = {}
    for i, j in d1.items():
        d0.append((i, j))
    for i, j in d2.items():
        d0.append((i, j))

    for i, j in d0:
        if i in d:
            d[i] += j
        else:
            d[i] = j

    return d

print(ajoute_dictionnaires({1: 5, 2: 7}, {2: 9, 3: 11}))
print(ajoute_dictionnaires({}, {2: 9, 3: 11}))
print(ajoute_dictionnaires({1: 5, 2: 7}, {}))
