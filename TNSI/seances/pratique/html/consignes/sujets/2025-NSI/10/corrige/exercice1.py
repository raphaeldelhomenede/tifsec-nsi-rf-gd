def recherche(tab, n):
    attemps = 0
    for i in tab:
        if i == n:
            return attemps
        attemps += 1

print(recherche([2, 3, 4, 5, 6], 5))
print(recherche([2, 3, 4, 6, 7], 5))
