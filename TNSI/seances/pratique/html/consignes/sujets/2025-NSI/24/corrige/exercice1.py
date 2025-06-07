def enumere(tab):
    enumere = {}
    for i in range(len(tab)):
        if tab[i] in enumere:
            enumere[tab[i]].append(i)
        else:
            enumere[tab[i]] = [i]
    return enumere

print(enumere([]))
print(enumere([1, 2, 3]))
print(enumere([1, 1, 2, 3, 2, 1]))
