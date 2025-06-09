def recherche(tab, n):
    occurences = [None]
    indice = 0
    for i in tab:
        if i == n:
            occurences.append(indice)
        indice += 1
    occurences = occurences[::-1]
    return occurences[0]

print(recherche([5, 3],1))
print(recherche([2,4],2))
print(recherche([2,3,5,2,4],2))
