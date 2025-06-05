def indices_maxi(tab):
    maxi = tab[0]
    for i in tab:
        if i > maxi:
            maxi = i

    tab1 = []
    for i in range(len(tab)):
        if tab[i] == maxi:
            tab1.append(i)
    return maxi, tab1

print(indices_maxi([1, 5, 6, 9, 1, 2, 3, 7, 9, 8]))
print(indices_maxi([7]))
