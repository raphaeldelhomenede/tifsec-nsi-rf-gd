def recherche(tab, n):
    count = -1
    for i in tab:
        count += 1
        if i == n:
            return count

print(recherche([2, 3, 4, 5, 6], 5))
print(recherche([2, 3, 4, 6, 7], 5))