def enumere(tab):
    d = {}
    for i in range(len(tab)):
        if tab[i] in d:
            d[tab[i]].append(i)
        else:
            d[tab[i]] = [i]
    return d

print(enumere([]))
print(enumere([1, 2, 3]))
print(enumere([1, 1, 2, 3, 2, 1]))
